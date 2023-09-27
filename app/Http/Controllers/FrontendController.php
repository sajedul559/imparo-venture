<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Category;
use App\Models\HomePage;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function home(){

        $pages = HomePage::where('status','active')->get();
        $projects = Project::with('category')->orderBy('created_at','desc')->take(4)->get();
        return view('home',compact('pages','projects'));
    }

    public function about(){
        return view('about');
    }
    public function project($slug){
        $category = Category::where('slug',$slug)->first();
        
        $projects = $category->projects;
        return view('project',compact('projects','category'));
    }
    public function company(){
        $companys = Company::where('status','active')->get();
        return view('company',compact('companys'));
    }
    public function companyDetails($slug){
        
        $company = Company::where('status','active')->where('slug',$slug)->first();
        if($company){
            return view('company',compact('company'));
        }else{
            $notify[] = ['error', 'Company not found!'];
           return redirect()->back()->withNotify($notify);
        }
        
    }
    
    public function buyer(){
        return view('inquiry-buyers');
    }
    public function landowner(){
        return view('inquiry-landowners');
    }
    public function contact(){
        return view('contact');
    }
    public function projectDetails($slug){
        $project = Project::with('features','projectGalleries')->where('slug',$slug)->first();
        return view('project-details',compact('project'));
    }
    public function statusWiseProject($slug,$status){
        $category = Category::where('slug',$slug)->first();
        $projects = Project::where('status',$status)->where('category_id',$category->id)->get();
        return view('project',compact('projects','category'));
    }
    public function allProject(){
        
    }

    public function userContactStore(Request $request){

        // dd($request->all());
        $email =  'sajedulkhairul@gmail.com';
        $this->validate($request,[
            'email'     => 'email|max:250',
            'name'      => 'required|string|max:60',
            'message'   => 'required|string|max:120',
            'phone'     => 'nullable|string',
            'location'  => 'nullable|string',
            'size'      => 'nullable|string',
            'type'      => 'nullable|string',
            'status'    => 'nullable|string',
        ]);
        $user  = [
            'email'   => $request->email,
            'name'    => $request->name,
            'phone'   => $request->phone,
            'message' => $request->message,
        ];
        Contact::create([
            'email'   => $request->email,
            'name'    => $request->name,
            'message' => $request->message,
            'phone'   => $request->phone,
            'location'=> $request->location?$request->location:null,
            'size'=> $request->size?$request->size:null,
            'type'=> $request->type?$request->type:null,
            'status'=> $request->status?$request->status:null,

        ]);
        Mail::to($email)->send(new ContactMail($user));
       
        $notify[] = ['success', 'Thank you for contact with us.'];
        return redirect()->back()->withNotify($notify);

    }

    

}
