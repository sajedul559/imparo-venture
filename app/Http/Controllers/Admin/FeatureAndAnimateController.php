<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Feature;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureAndAnimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::orderby('id','desc')->get();
        return view('admin.feature.index',compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:features|max:100',
            'image' =>['required','image', 'mimes:jpeg,jpg,png'],
            'status' => 'required | max:100',
        ]);
        if($request->image){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $path = "images/feature";
            $file->move($path, $name);
        }
        Feature::create([
            'name' => $request->name,
            'image' =>$name,
            'status' =>$request->status,
        ]);
        $notify[] = ['success', 'Feature create successfully'];
        return redirect()->route('featurs.index')->withNotify($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = Feature::find($id);
        return view('admin.feature.edit',compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['sometimes','max:100'],
            'image' =>['sometimes','image', 'mimes:jpeg,jpg,png'],
            'status' => ['sometimes','max:100'],
        ]);
        $feature = Feature::find($id);
        $feature->name = $request->name;
        $feature->status = $request->status;
        if($request->image){

            if(File::exists('images/feature/'.$feature->image)){
              File::delete('images/feature/'.$feature->image);
          }
          $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $path = "images/feature";
            $file->move($path, $name);
            $feature->image = $name;
      }
      $feature->save();
      $notify[] = ['success', 'Feature update successfully'];
      return redirect()->route('featurs.index')->withNotify($notify);
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $feature = Feature::find($id);
        if($feature->image){    
                if(File::exists('images/feature/'.$feature->image)){
                File::delete('images/feature/'.$feature->image);
            }
          }
          $feature->delete();
          $notify[] = ['success', 'Feature delete successfully'];
          return redirect()->back()->withNotify($notify);

    }
}
