<?php

namespace App\Http\Controllers\Front;

use App\Models\HomePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public function homePageIndex(){
        $pages = HomePage::where('status','active')->get();
        return view('admin.home-page.index',compact('pages'));
    }
    public function homePageCreateForm(){
        return view('admin.home-page.create');
    }
    public function homePageStore(Request $request){
        if($request->image){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $path = "images/homepage";
            $file->move($path, $name);
        }

        HomePage::create([
            'title_one' => $request->title_one,
            'title_two' => $request->title_two,
            'image'     =>$name,

        ]);
        $notify[] = ['success', 'Page create successfully'];
        return redirect()->back()->withNotify($notify);

    }
    public function homePageEdit($id){
    $page = HomePage::find($id);
     return view('admin.home-page.edit',compact('page'));
    }

    public function homePageUpdate(Request $request,$id){
        $page = HomePage::find($id);
        if($request->image){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $path = "images/homepage";
            $file->move($path, $name);
        }

        if($request->image){

            if(File::exists('images/homepage/'.$job->image)){
              File::delete('images/job/'.$job->image);
          }
          $file = $request->file('image');
          $ext = $file->getClientOriginalExtension();
          $name = time().'.'.$ext;
          $path = "images/job";
          $file->move($path, $name);
          $job->image = $name;
      }

        $page->update([
            'title_one' => $request->title_one,
            'title_two' => $request->title_two,
        ]);
        $notify[] = ['success', 'Page update successfully'];
        return redirect()->back()->withNotify($notify);

    }

    public function projectPageCreateForm(){
        return view('admin.page.project.create');
    }
}
