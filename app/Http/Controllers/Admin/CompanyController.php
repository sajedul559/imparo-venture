<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys = Company::orderBy('id','desc')->get();
        return view('admin.company.index',compact('companys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
         return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);
        if(isset($data['image'])){
            $file = $data['image'];
            $ext = 'png';
            $name = time().'.'.$ext;
            $path = "images/company";
            $file->move($path, $name);
            $data['image'] = $name;
        }
        if(isset($data['intro_image'])){
            $file = $data['intro_image'];
            $ext = 'png';
            $name = time().'.'.$ext;
            $path = "images/company/intruduction";
            $file->move($path, $name);
            $data['intro_image'] = $name;
        }  
        if(isset($data['gallery'])){
            foreach($data['gallery'] as $content){
            
              
                
            if(isset($content['gallery_title'])){
                $gallery_title[]=$content['gallery_title'];    
            }  
            if(isset($content['gallery_description'])){
                $gallery_description[]=$content['gallery_description'];
            }   
                    
               
                                                
            }
            foreach($data['gallery'] as $progres){
                if(isset($progres['gallery_images'])){              
                        $file = $progres['gallery_images'];
                        // $filename =   $file['images'];        
                        $ext = 'png';
                        $name = mt_rand(1000,1000000).'.'.$ext;
                        $path = "images/company/gallery";
                        $file->move($path, $name);
                        $images[] = $name;
                        $gallery_images[] = $name;   
                }    
            }
             
        }
        $pageContent = ([        
            "image"   =>  isset($data['image'])?$data['image'] :null,
    
            "intro_title"   =>  isset($data['intro_title'])?$data['intro_title'] :null,
            "intro_description"   =>  isset($data['intro_description'])?$data['intro_description'] :null,
            "intro_image"   =>  isset($data['intro_image'])?$data['intro_image'] :null,


        
            "gallery_title"   => isset($gallery_title)?$gallery_title :null,
            "gallery_description"   => isset($gallery_description)?$gallery_description :null,
            "gallery_images"   =>isset($gallery_images)?$gallery_images :null,
            
       ]);
       $data['content'] = $pageContent;


      $project = Company::create($data);
      $notify[] = ['success', 'Company create successfully'];
        return redirect()->route('admin.company.index')->withNotify($notify);
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
        $company = Company::find($id);
        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $data = $request->validated();
        $company = Company::find($id);
        $data['slug'] = Str::slug($data['title']);
        if(isset($data['image'])){

            if(File::exists('images/company/'.$company->image)){
              File::delete('images/company/'.$company->image);
          }            
            $file = $data['image'];
            $ext = 'png';
            $name = time().'.'.$ext;
            $path = "images/company";
            $file->move($path, $name);
            $data['image'] = $name;
        }

        if(isset($data['intro_image'])){

            if(File::exists('images/company/intruduction/'.$company->image)){
              File::delete('images/company/intruduction/'.$company->image);
          }            
            $file = $data['intro_image'];
            $ext = 'png';
            $name = time().'.'.$ext;
            $path = "images/company/intruduction";
            $file->move($path, $name);
            $data['intro_image'] = $name;
        }

        if(isset($data['gallery'])){
            foreach($data['gallery'] as $content){               
                if(isset($content['gallery_title'])){
                    $gallery_title[]=$content['gallery_title'];    
                }  
                if(isset($content['gallery_description'])){
                    $gallery_description[]=$content['gallery_description'];
                }                
                                                
            }
            if(isset($content['gallery_images'])){
                if((isset($content['gallery_images'])) && isset($content['gallery_images_old'])){
                    if($content['gallery_images'] && $content['gallery_images_old']){
                        $file = $content['gallery_images'];            
                        $ext = 'png';
                        $name = mt_rand(1000,1000000).'.'.$ext;
                        $path = "images/company/gallery";
                        $file->move($path, $name);
                        $images[] = $name;
                        $gallery_images[] = $name;  
                    }
                }elseif(isset($content['gallery_images'])){
                    foreach($company->content['gallery_images'] as $image){
                        $gallery_images[] = $image;

                    }
                    $file = $content['gallery_images'];            
                        $ext = 'png';
                        $name = mt_rand(1000,1000000).'.'.$ext;
                        $path = "images/company/gallery";
                        $file->move($path, $name);
                        $images[] = $name;
                        $gallery_images[] = $name;  
                }else{
                    foreach($company->content['gallery_images'] as $image){
                        $gallery_images[] = $image;
                    }
                }
            }else{
                foreach($company->content['gallery_images'] as $image){
                    $gallery_images[] = $image;

                }
            }
        }
        $pageContent = ([        
            "image"   =>  isset($data['image'])?$data['image'] :$company->image,   
            "intro_title"   =>  isset($data['intro_title'])?$data['intro_title'] :$company->content['intro_title'],
            "intro_description"   =>  isset($data['intro_description'])?$data['intro_description'] :$company->content['intro_description'],
            "intro_image"   =>  isset($data['intro_image'])?$data['intro_image'] :$company->content['intro_image'],        
            "gallery_title"   => isset($gallery_title)?$gallery_title :$company->content['gallery_title'],
            "gallery_description"   => isset($gallery_description)?$gallery_description :$company->content['gallery_description'],
            "gallery_images"   =>isset($gallery_images)?$gallery_images :$company->content['gallery_images'],
            
       ]);
       $data['content'] = $pageContent;
      $company = Company::find($id);     
      $company->update($data);
      $notify[] = ['success', 'Company update successfully'];
        return redirect()->back()->withNotify($notify);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $company = Company::find($id);
        File::delete('images/company/'.$company->image);

        foreach ($company->content['gallery_images'] as $value) {
            // code
            if($value !== Null){
                File::delete('images/company/gallery/'.$value);
            }
    }
        $company->delete();
        $notify[] = ['success', 'Company delete successfully'];
        return redirect()->back()->withNotify($notify);
    }

    public function deleteGalleryImage(){
        $image =$_GET['image'];
         if(File::exists('images/company/gallery/'.$image)){
            File::delete('images/company/gallery/'.$image);
        }
    }
}
