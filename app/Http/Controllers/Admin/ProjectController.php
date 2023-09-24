<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Page;
use App\Models\Feature;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProjectFeature;
use App\Models\ProjectGallery;
use App\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id','desc')->get();
        return view('admin.page.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status','active')->get();
        $features = Feature::where('status','active')->get();
         return view('admin.page.project.create',compact('features','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(PageRequest $request)
    public function store(PageRequest $request)
    {
        $data = $request->validated();
         dd($data);
        $data['slug'] = Str::slug($data['title']);
        if(isset($data['image'])){
            $file = $data['image'];
            $ext = 'png';
            $name = time().'.'.$ext;
            $path = "images/page/project";
            $file->move($path, $name);
            $data['image'] = $name;
            $projectImage = $name;
        }
        if(isset($data['specific_image'])){
            $file = $data['specific_image'];
            $ext = 'png';
            $name = time().'.'.$ext;
            $path = "images/page/projectspecific";
            $file->move($path, $name);
            $data['specific_image'] = $name;
        }     
        // if(isset($data['specification'])){
        //     foreach($data['specification'] as $specific){

        //         if(isset($specific['specification_key'])){
                   
        //                 $specifickey[]=$specific['specification_key'];
        //                 $data['specification_key'] = $specifickey;
        //         }
        //         if(isset($specific['specification_value'])){
        //                 $specificvalue[]=$specific['specification_value'];
        //                 $data['specification_value'] = $specificvalue;
        //         }                        
        //     }
        // }

        // if(isset($data['specification_key'])){
        //     foreach($data['specification_key'] as $specifickey){

        //         $data['specification_key'] = $specifickey;
                                     
        //     }
        // }
        // if(isset($data['specification_value'])){
        //     foreach($data['specification_value'] as $specificvalue){
        //         $data['specification_value'] = $specificvalue;                     
        //     }
        // }

        
        if(isset($data['progress'])){
            foreach($data['progress'] as $progres){
                if(isset($progres['progress_name'])){
                        $progress_name[]=$progres['progress_name'];                       
                }  
                if(isset($progres['progress_status'])){
                    $progress_status[]=$progres['progress_status'];
                }                                    
            }
            // foreach($data['progress'] as $progres){
            //     if(isset($progres['progress_images'])){              
            //             $file = $progres['progress_images'];
            //             // $filename =   $file['images'];        
            //             $ext = 'png';
            //             $name = mt_rand(1000,1000000).'.'.$ext;
            //             $path = "images/page/project/progress";
            //             $file->move($path, $name);
            //             $images[] = $name;
            //             $progreImages[] = $name;   
            //     }    
            // }
             
        }
        $pageContent = ([            
            "project_image"   =>  isset($data['image'])?$data['image'] :null,
            "project_address"  => isset($data['project_address'])?$data['project_address'] :null,
            "overview_text"        => isset($data['overview_text'])?$data['overview_text'] :null,
            "overview_title"     => isset($data['overview_title'])?$data['overview_title'] :null,
            "overview_description" => isset($data['overview_description'])?$data['overview_description'] :null,
            "specific_image"     =>isset($data['specific_image'])?$data['specific_image'] :null,
            "specification_key"  =>isset($data['specification_key'])?$data['specification_key'] :null,
            "specification_value"  =>isset($data['specification_value'])?$data['specification_value'] :null,
            "feature_title"  => isset($data['feature_title'])?$data['feature_title'] :null,
            "feature_description" => isset($data['feature_description'])?$data['feature_description'] :null,
            "galleryImage"   => isset($data['images'])?$data['images'] :null,
            "progress_title"   => isset($data['progress_title'])?$data['progress_title'] :null,
            "progress_description"   => isset($data['progress_description'])?$data['progress_description'] :null,
            "progress_name"   => isset($progress_name)?$progress_name :null,
            "progress_status"   =>isset($progress_status)?$progress_status :null,
            "progress_images"   => isset($data['progress_images'])?$data['progress_images'] :null,
            // "progress_images"   =>isset($progreImages)?$progreImages :null,
            
       ]);
       $data['content'] = $pageContent;


      $project = Project::create($data);
      $file = array();
      if(isset($data['images'])){
          
          foreach($data['images'] as $image){
              $file = $image;
              // $filename =   $file['images'];

              $ext = 'png';
              $name = mt_rand(1000,1000000).'.'.$ext;
              $path = "images/page/projectgallery";
              $file->move($path, $name);
              $images[] = $name;

              ProjectGallery::create([
                'project_id' =>$project->id,
                'photo' =>$name
            ]);
              $data['images'] =$name;
                      
          }
      }

    if(isset($data['feature_id'])){
        foreach($data['feature_id'] as $feature){
            ProjectFeature::create([
                'project_id' =>$project->id,
                'feature_id' =>$feature
            ]);

        }
       
    }      
        $notify[] = ['success', 'Page create successfully'];
        return redirect()->back()->withNotify($notify);

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
        $categories = Category::where('status','active')->get();
        $features = Feature::where('status','active')->get();
        $project = Project::find($id);
        
       
        $gellary_image = ProjectGallery::where('Project_id',$id)->get();

        // dd($project->content);
        $project_feature_id = ProjectFeature::where('project_id',$project->id)->pluck('feature_id')->toArray();

        return view('admin.page.project.edit',compact('project','categories','features','project_feature_id','gellary_image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $data = $request->validated();
        $project = Project::find($id);
      if(isset($data['old'])){
        $projectGallery = ProjectGallery::whereNotIn('id',$data['old'])->where('project_id',$id)
        ->get();
        foreach ($projectGallery as $value) {
                // code
                if($value !== Null){
                    File::delete('images/page/projectgallery//'.$value->photo);
                    $value->delete();
                }
        }
      }
                 
        $data['slug'] = Str::slug($data['title']);

        if(isset($data['image'])){

            if(File::exists('images/page/project/'.$project->image)){
              File::delete('images/page/project/'.$project->image);
          }
          $file = $data['image'];
            $ext = 'png';
            $name = time().'.'.$ext;
            $path = "images/page/project";
            $file->move($path, $name);
            $data['image'] = $name;
            $projectImage = $name;
        }
        if(isset($data['specific_image'])){

            if(File::exists('images/page/projectspecific/'.$project->content['specific_image'])){
              File::delete('images/page/projectspecific/'.$project->content['specific_image']);
          }
          $file = $data['specific_image'];
            $ext = 'png';
            $name = time().'.'.$ext;
            $path = "images/page/projectspecific";
            $file->move($path, $name);
            $data['specific_image'] = $name;
        }else{
            $data['specific_image'] = $project->content['specific_image'];
        }

        $file = array();
        if(isset($data['images'])){
            
            foreach($data['images'] as $image){
                $file = $image;  
                $ext = 'png';
                $name = mt_rand(1000,1000000).'.'.$ext;
                $path = "images/page/projectgallery";
                $file->move($path, $name);
                $images[] = $name;
  
                ProjectGallery::create([
                  'project_id' =>$project->id,
                  'photo' =>$name
              ]);
                $data['images'] =$name;
                        
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
        if(isset($data['progress'])){
            foreach($data['progress'] as $progres){
                if(isset($progres['progress_name'])){
                        $progress_name[]=$progres['progress_name'];                       

                }  
                if(isset($progres['progress_status'])){
                    $progress_status[]=$progres['progress_status'];

                }                                  
            }
                        if(isset($progres['progress_images'])){
                            if((isset($progres['progress_images'])) && isset($progres['progress_images_old'])){
                                if($progres['progress_images'] && $progres['progress_images_old']){
                                    
                                    $file = $progres['progress_images'];
                      
                                    $ext = 'png';
                                    $name = mt_rand(1000,1000000).'.'.$ext;
                                    $path = "images/page/project/progress";
                                    $file->move($path, $name);
                                    $images[] = $name;
                                    $progreImages[] = $name;  
                                }
                            }elseif(isset($progres['progress_images'])){
                                foreach($project->content['progress_images'] as $image){
                                    $progreImages[] = $image;
    
                                }
                                $file = $progres['progress_images'];
                      
                                    $ext = 'png';
                                    $name = mt_rand(1000,1000000).'.'.$ext;
                                    $path = "images/page/project/progress";
                                    $file->move($path, $name);
                                    $images[] = $name;
                                    $progreImages[] = $name;  
                            }else{
                                foreach($project->content['progress_images'] as $image){
                                    $progreImages[] = $image;
    
                                }
                            }
                        }else{
                            foreach($project->content['progress_images'] as $image){
                                $progreImages[] = $image;

                            }
                        }
        }
        
        $pageContent = ([            
            "project_image"   =>  isset($data['image'])?$data['image'] :null,
            "project_address"  => isset($data['project_address'])?$data['project_address'] :null,
            "overview_text"        => isset($data['overview_text'])?$data['overview_text'] :null,
            "overview_title"     => isset($data['overview_title'])?$data['overview_title'] :null,
            "overview_description" => isset($data['overview_description'])?$data['overview_description'] :null,
            "specific_image"     =>isset($data['specific_image'])?$data['specific_image'] :null,
            "specification_key"  =>isset($data['specification_key'])?$data['specification_key'] :null,
            "specification_value"  =>isset($data['specification_value'])?$data['specification_value'] :null,
            "feature_title"  => isset($data['feature_title'])?$data['feature_title'] :null,
            "feature_description" => isset($data['feature_description'])?$data['feature_description'] :null,
            "galleryImage"   => isset($data['images'])?$data['images'] :null,
            "progress_images"   =>isset($progreImages)?$progreImages :null,
            "progress_title"   => isset($data['progress_title'])?$data['progress_title'] :null,
            "progress_description"   => isset($data['progress_description'])?$data['progress_description'] :null,
            "progress_name"   => isset($progress_name)?$progress_name :null,           
            "progress_status"   =>isset($progress_status)?$progress_status :null,

       ]);
       $data['content'] = $pageContent;


    //   $project = Project::create($data);
      $project = Project::find($id);
      $projectFeatures = $project->features;
      foreach($projectFeatures as $feature){
        $feature->delete();
      }
      $project->update($data);

    if(isset($data['feature_id'])){
        foreach($data['feature_id'] as $feature){
            ProjectFeature::create([
                'project_id' =>$project->id,
                'feature_id' =>$feature
            ]);

        }
       
    }
        
        $notify[] = ['success', 'Page update successfully'];
        return redirect()->back()->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project ::find($id);
        $project->projectGalleries->delete();
        $project->delete();
        $notify[] = ['success', 'Page delete successfully'];
        return redirect()->back()->withNotify($notify);
    }
    public function delete($id){
        $project = Project::find($id);
        $projectGalleries = $project->projectGalleries;
        foreach($projectGalleries as $gallery){
            $gallery->delete();
        }
        $project->delete();
        $notify[] = ['success', 'Page delete successfully'];
        return redirect()->back()->withNotify($notify);
    }
    public function ongoingProjects(){

        $data = Project::with('category')->orderBy('id','desc')->get();

        $projects = Project::whereHas('category',function($category){
            $category->where('slug','ongoing');
        })->orderBy('id','desc')->get();

        return view('admin.page.project.ongoing',compact('projects'));
    }
    public function upcomingProjects(){
        $projects = Project::whereHas('category',function($category){
            $category->where('slug','upcoming');
        })->orderBy('id','desc')->get();
        return view('admin.page.project.upcoming',compact('projects'));
    }
    public function completedProjects(){
        $projects = Project::whereHas('category',function($category){
            $category->where('slug','completed');
        })->orderBy('id','desc')->get();
        return view('admin.page.project.completed',compact('projects'));
    }
     public function deleteProgressImage(){
        $image =$_GET['image'];
         if(File::exists('images/page/project/progress/'.$image)){
            File::delete('images/page/project/progress/'.$image);
        }
    }
       
}
