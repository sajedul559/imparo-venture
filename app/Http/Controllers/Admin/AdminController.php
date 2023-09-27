<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\AdminRequest;

class AdminController extends Controller
{
    public function index()
    {

       $admins = Admin::orderby('id','desc')->get();
        return view('admin.index',compact('admins'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $page_title = 'Create admin';
        return view('admin.create',compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        Admin::create([
            'email' => $data['email'],
            'username' => $data['username'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'type'   => $data['type'],
            'status' => 'active',
            
        ]);
      
        $notify[] = ['success', 'Admin create successfully'];
        return redirect()->route('admin.index')->withNotify($notify);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AdminRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        $data = $request->validated();

        $admin = Admin::find($id);
        $attributes = [
            'email' => $data['email'],
            'username' => $data['username'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'type'   => $data['type'],
            'status' => 'active',
        ];
        
        if (!empty($data['password'])) {
            $attributes['password'] = Hash::make($data['password']);
        }
        
        $admin->update($attributes);
        $notify[] = ['success', 'Admin update successfully'];
        return redirect()->route('admin.index')->withNotify($notify);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      

    }
    public function delete($id)
    {
       $admin = Admin::find($id)->delete();
       $notify[] = ['success', 'Admin delete successfully'];
       return redirect()->back()->withNotify($notify);

    }

    public function adminLogout(Request $request)
    {
        try {
            if (Auth::guard('admin')->logout() || !Auth::guard('admin')->check()){

                return redirect()->route('admin.login');
            }
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return back()->withErrors('Incorrect Username or Password');
        }
    }
}
