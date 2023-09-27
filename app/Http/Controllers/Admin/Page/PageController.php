<?php

namespace App\Http\Controllers\Admin\Page;

use File;
use App\Models\Page;
use App\Models\HomePage;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function homePageIndex(){
        $pages = HomePage::where('status','active')->orderby('id','desc')->get();
        return view('admin.home-page.index',compact('pages'));
    }
    public function homePageCreateForm(){
        return view('admin.home-page.create');
    }
    public function homePageStore(Request $request){
        $validated = $request->validate([
            'title_one' => ['required','max:100'],
            'title_two' =>['required','max:100'],
            'status' => ['required','max:100'],
            'image' => ['required','image','mimes:jpeg,jpg,png'],
        ]);
        if($request->image){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $path = "images/page/home";
            $file->move($path, $name);
        }

        HomePage::create([
            'title_one' => $request->title_one,
            'title_two' => $request->title_two,
            'status'    => $request->status,
            'image'     =>$name,

        ]);
        $notify[] = ['success', 'Page create successfully'];
        return redirect()->route('homePage.index')->withNotify($notify);

    }
    public function homePageEdit($id){
    $page = HomePage::find($id);
     return view('admin.home-page.edit',compact('page'));
    }

    public function homePageUpdate(Request $request,$id){
        $validated = $request->validate([
            'title_one' => ['sometimes','max:100'],
            'title_two' =>['sometimes','max:100'],
            'status' => ['sometimes','max:100'],
            'image' => ['sometimes','image','mimes:jpeg,jpg,png'],
        ]);
        $page = HomePage::find($id);

        if($request->image){

            if(File::exists('images/page/home/'.$page->image)){
              File::delete('images/page/home'.$page->image);
          }
          $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $path = "images/page/home";
            $file->move($path, $name);
      }else{
        $name = $page->image;
      }
        $page->update([
            'title_one' => $request->title_one,
            'title_two' => $request->title_two,
            'status'    => $request->status,
            'image'     =>$name?$name:$page->name,

        ]);
        $notify[] = ['success', 'Page update successfully'];
        return redirect()->route('homePage.index')->withNotify($notify);

    }
    public function homePageDelete($id){

      $homePage = HomePage::find($id);
      if($homePage->image){
        // dd($homePage->image);

            if(File::exists('images/page/home/'.$homePage->image)){
            File::delete('images/page/home/'.$homePage->image);
        }
      }
      $homePage->delete();
      $notify[] = ['success', 'Page delete successfully'];
        return redirect()->back()->withNotify($notify);
    
  }
    public function projectPageCreateForm(){
        return view('admin.page.project.create');
    }
    public function projectPageStore(PageRequest $request){
        $data = $request->validated();
        if(isset($data['image'])){
            $file = $data['image'];
            $ext = 'png';
            $name = time().'.'.$ext;
            $path = "images/page/project";
            $file->move($path, $name);
            $data['image'] = $name;
        }

        if(isset($data['specific_image'])){
            $file = $data['specific_image'];
            $ext = 'png';
            $name = time().'.'.$ext;
            $path = "images/page/projectspecific";
            $file->move($path, $name);
            $data['specific_image'] = $name;
        }

        $file = array();
        if(isset($data['galleryImage'])){
            
            foreach($data['galleryImage'] as $image){
                $file = $image;
                $filename =   $file['galleryImage'];

                $ext = 'png';
                $name = mt_rand(1000,1000000).'.'.$ext;
                $path = "images/page/projectgallery";
                $filename->move($path, $name);
                $images[] = $name;

                $data['galleryImage'] =$images;
                        
            }
        }
        if(isset($data['specification'])){
            foreach($data['specification'] as $specific){

                if(isset($specific['specification_key'])){
                   
                        $specifickey[]=$specific['specification_key'];
                        $data['specification_key'] = $specifickey;

                }
                if(isset($specific['specification_value'])){
                        $specificvalue[]=$specific['specification_value'];
                        $data['specification_value'] = $specificvalue;

                }                        
            }
        }
        
        $pageContent = ([
            //Banner Section Home Page
            "overview_text"        => isset($data['overview_text'])?$data['overview_text'] :null,
            "overview_title"     => isset($data['overview_title'])?$data['overview_title'] :null,
            "overview_description" => isset($data['overview_description'])?$data['overview_description'] :null,
            "specific_image"     =>isset($data['specific_image'])?$data['specific_image'] :null,
            "specification_key"  =>isset($data['specification_key'])?$data['specification_key'] :null,
            "specification_value"  =>isset($data['specification_value'])?$data['specification_value'] :null,
            "feature_title"  => isset($data['feature_title'])?$data['feature_title'] :null,
            "feature_description" => isset($data['feature_description'])?$data['feature_description'] :null,
            "galleryImage"   => isset($data['galleryImage'])?$data['galleryImage'] :null,

       ]);

    $data['content'] = $pageContent;

    Page::create($data);
        
        $notify[] = ['success', 'Page create successfully'];
        return redirect()->back()->withNotify($notify);

    }
    public function projectPageIndex(){
        $pages = Page::where('status','active')->get();
        return view('admin.page.project.index',compact('pages'));
    }
    
}
