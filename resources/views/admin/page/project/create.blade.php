<x-admin.app >

    {{-- <div class="page-title-box">
        <div class="row align-items-center">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div> --}}
    <div class="row pt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Page Create Form</h4>
                    <form id="submitform" data-parsley-trigger="keyup" class="repeater"
                        action="{{ route('admin.projects.store') }} " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Page Title <span class="error">*</span></label>
                                    <input name="title" type="text" required="required" data-parsley-maxlength="30"
                                        class="form-control" placeholder="Enter page title" value="{{ old('title') }}">
                                    <input type="hidden" value="content" name="content">
                                    <input type="hidden" value="slug" name="slug">

                                    
                                    @error('title')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="">Category<span class="text-danger">*</span></label>
                                @if($categories->isNotEmpty())
                                <div id="englishValue1" class="">
                                    <select  name="category_id" class="form-control" id="category_id"  title="category_id">
                                        <option value=""  disabled selected>Please select</option>
                                            @foreach($categories as $categorie)
                                                <option  value="{{ $categorie->id }}">{{$categorie->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                @endif
                                @error('tag')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>    
                            <div class="mb-3 col-md-4">
                                <label for="">Feature<span class="text-danger">*</span></label>
                                @if($features->isNotEmpty())
                                <div id="englishValue1" class="">
                                    <select  name="feature_id[]" class="form-control" id="feature_id" multiple="multiple" title="feature_id">
                                        <option value=""  disabled>Please select</option>
                                            @foreach($features as $tag)
                                                <option @if(old('tag')==$tag->id) selected
                                                        @endif value="{{ $tag->id }}">{{$tag->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                @endif
                                @error('tag')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>                         
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Upload Project Image <span class="error">*</span><span
                                        class="subtext">(Min. Image Size (870 *500) PX)</span></label>
                                <div class="row m-0 p-0">
                                    <div class="col-md-10 ml-0 pl-0">
                                        <input type="file" class="filestyle" name="image" data-buttonname="btn-secondary"
                                        id="file-input" tabindex="-1"
                                        style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" >
                                        <div class="bootstrap-filestyle input-group">
                                            <div name="filedrag"
                                                style="position: absolute; width: 100%; height: 35px; z-index: -1;"></div>
                                            <input type="text" class="form-control p-2" id="input_text" placeholder="" disabled=""
                                                    style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                            <span class="group-span-filestyle input-group-btn" tabindex="0"><label
                                                    for="file-input"
                                                    style="margin-bottom: 0;" class="btn btn-info choose-btn"><span
                                                        class="buttonText"><i class="ti-export px-3"></i></span></label></span>
    
                                        </div>
                                    </div>
                                    {{-- <div id='img_contain col-md-4 px-2'>
                                        <img id="image-preview" align='middle' src=""
                                            alt="your image"
                                            title='' class="img-fluid" style="width: 50px;height:35px"/>
                                    </div> --}}
                                </div>
                                @error('image')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>    
                          
                           
                            <div class="mb-3 col-md-4">
                                <label for="">Status<span class="text-danger">*</span></label>
                              
                                <div id="englishValue1" class="">
                                    <select  name="status" class="form-control" required  title="status">
                                        <option value=""  disabled selected>Please select</option>
                                        <option value="residential" >Residential</option>
                                        <option value="commercial" >Commercial</option>
                                    </select>
                                </div>

                                @error('tag')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>  
                            <div class="mb-3 col-md-4">
                                <label for="">Address<span class="text-danger">*</span></label>
                              
                                <textarea rows="4" name="project_address" type="text" class="form-control"
                                                            value="{{ old('project_address') }}" required="required" placeholder="Enter who we are short description" ></textarea>

                                @error('tag')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>  
                            <div class="col-md-12" id="default">
                                <div id="accordion" class="accordion mt-4">
                                    <div class="card mb-0 border-0" id="card">
                                        <div class="card border-bottom-0">
                                            <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                                <a class="card-title" style="font-size:18px">
                                                    Overview Section
                                                </a>
                                            </div>
                                            <div id="collapseOne" class="collapse container mt-4 show" data-parent="#accordion">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Overview Text<span class="error">*</span></label>
                                                        <input name="overview_text" type="text" class="form-control slug-input" required="" placeholder="Name"
                                                            value="{{old('overview_text')}}">
                                                        @error('overview_text')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div> 
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Title<span class="error">*</span></label>
                                                        <input name="overview_title" type="text" class="form-control slug-input" required="" placeholder="Name"
                                                            value="{{old('overview_title')}}">
                                                        @error('overview_title')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div> 
                                                    <div class="col-md-12 mt-1 mb-3">
                                                        <label class="form-label">Short Description<span class="error">*</span></label>
                                                        <textarea rows="4" name="overview_description" type="text" class="form-control"
                                                            value="{{ old('overview_description') }}" required="required" placeholder="Enter who we are short description" ></textarea>
                                                    </div>
                                                </div>                                               
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" id="default">
                                <div id="accordion" class="accordion mt-4">
                                    <div class="card mb-0 border-0" id="card">
                                        <div class="card border-bottom-0">
                                            <div class="card-header collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="true">
                                                <a class="card-title" style="font-size:18px">
                                                     Specific section
                                                </a>
                                            </div>
                                            <div id="collapseTwo" class="collapse container mt-4 show" data-parent="#accordion">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Upload Specific Image <span class="error">*</span><span
                                                                class="subtext">(Min. Image Size (870 *500) PX)</span></label>

                                                        <input type="file" name="specific_image" class="form-control">
                                                       
                                                        @error('image')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div> 
                                                    
                                                </div>
                                                    <div class="mb-3">
                                                        {{-- <div id="specification">
                                                            <!--begin::Form group-->
                                                            <div class="form-group">
                                                                <div data-repeater-list="specification" id="Repeter">
                                                                    <div data-repeater-item class="repeater-item">
                                                                        <div class="form-group row">
                                                                            <div class="mb-3 col-md-5">
                                                                                <label for="">Specification Name<span class="text-danger">*</span></label>
                                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_key" placeholder="Enter specification name" required />
                            
                                                                                @error('skill_title')
                                                                                <p class="error">{{ $message }}</p>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_value" placeholder="Enter specification name" required />
                                                                            </div>
                                                                            <div class="col-md-2 mt-4 pt-1">

                                                                                <a href="javascript:;" data-repeater-delete  class="btn btn-primary ">
                                                                                    <i class="la la-trash-o"></i>Delete
                                                                                </a>
                                                                            </div>
                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Form group-->
                                                            <!--begin::Form group-->
                                                            <div class="form-group mt-2">
                                                                <a href="javascript:;" data-repeater-create class="btn btn-success" id="AddMorekkkk">
                                                                    <i class="la la-plus"></i>Add More Specifation
                                                                </a>
                                                            </div>
                                                            <!--end::Form group-->
                                                        </div> --}}

                                                        <div class="form-group row">
                                                            <div class="mb-3 col-md-5">
                                                                <label for="">Specification Name<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_key[]" value="Land Area" placeholder="Enter specification name" required />
            
                                                                @error('skill_title')
                                                                <p class="error">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_value[]" value="7395 sft" placeholder="Enter specification name" required />
                                                            </div>
                                                            
                                                            <div class="mb-3 col-md-5">
                                                                <label for="">Specification Name<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_key[]" value="Orientation" placeholder="Enter specification name" required />
            
                                                                @error('skill_title')
                                                                <p class="error">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_value[]" value="East" placeholder="Enter specification name" required />
                                                            </div>
                                                            
                                                            
                                                            
            
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="mb-3 col-md-5">
                                                                <label for="">Specification Name<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_key[]" value="Front Road" placeholder="Enter specification name" required />
            
                                                                @error('skill_title')
                                                                <p class="error">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_value[]" value="100 feet" placeholder="Enter specification name" required />
                                                            </div>
                                                            
                                                            <div class="mb-3 col-md-5">
                                                                <label for="">Specification Name<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_key[]" value="Apartment Size" placeholder="Enter specification name" required />
            
                                                                @error('skill_title')
                                                                <p class="error">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_value[]" value="4450 sft" placeholder="Enter specification name" required />
                                                            </div>                                                                  
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="mb-3 col-md-5">
                                                                <label for="">Specification Name<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_key[]" value="Living Floors" placeholder="Enter specification name" required />
            
                                                                @error('skill_title')
                                                                <p class="error">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_value[]" value="9" placeholder="Enter specification name" required />
                                                            </div>
                                                            
                                                            <div class="mb-3 col-md-5">
                                                                <label for="">Specification Name<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_key[]" value="Number of Parking" placeholder="Enter specification name" required />
            
                                                                @error('skill_title')
                                                                <p class="error">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_value[]" value="27" placeholder="Enter specification name" required />
                                                            </div>                                                                  
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="mb-3 col-md-5">
                                                                <label for="">Specification Name<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_key[]" value="Basement" placeholder="Enter specification name" required />
            
                                                                @error('skill_title')
                                                                <p class="error">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_value[]" value="2" placeholder="Enter specification name" required />
                                                            </div>
                                                            
                                                            <div class="mb-3 col-md-5">
                                                                <label for="">Specification Name<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_key[]" value="Nos of elevator" placeholder="Enter specification name" required />
            
                                                                @error('skill_title')
                                                                <p class="error">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_value[]" value="2" placeholder="Enter specification name" required />
                                                            </div>                                                                  
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="mb-3 col-md-5">
                                                                <label for="">Specification Name<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_key[]" value="Handover Date" placeholder="Enter specification name" required />
            
                                                                @error('skill_title')
                                                                <p class="error">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_value[]" value="2024" placeholder="Enter specification name" required />
                                                            </div>
                                                            
                                                            <div class="mb-3 col-md-5">
                                                                <label for="">Specification Name<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_key[]" value="Architect" placeholder="Enter specification name" required />
            
                                                                @error('skill_title')
                                                                <p class="error">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_value[]" value="Interform" placeholder="Enter specification name" required />
                                                            </div>                                                                  
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="mb-3 col-md-5">
                                                                <label for="">Specification Name<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_key[]" value="Architect Design" placeholder="Enter specification name" required />
            
                                                                @error('skill_title')
                                                                <p class="error">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-2 mb-md-0" name="specification_value[]" value="Dr Shamim Z Boshunia" placeholder="Enter specification name" required />
                                                            </div>                                                                
                                                        </div>
                            
                            
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" id="default">
                                <div id="accordion" class="accordion mt-4">
                                    <div class="card mb-0 border-0" id="card">
                                        <div class="card border-bottom-0">
                                            <div class="card-header collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="true">
                                                <a class="card-title" style="font-size:18px">
                                                     Gallery section
                                                </a>
                                            </div>
                                            <div id="collapseThree" class="collapse container mt-4 show" data-parent="#accordion">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <label class="active">Project Gellary Image</label>
                                                                <div class="input-images-1" style="padding-top: .5rem;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     {{-- <div class="mb-3">
                                                        <div class="mb-3 mr-5 col-md-12">
                                                            
                                                            <div class="mr-2" id="galleryImage">
                                                                <!--begin::Form group-->
                                                                <div class="form-group">
                                                                   
                                                                    <div data-repeater-list="galleryImage">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group row">
                            
                                                                                <div class="">
                                                                                    <label class="form-label" > Image</label>
                                                                                    <input type="file" class="form-control" name="galleryImage" >
                                                                                </div>
                                                                                <div class="col-md-2 mt-4 pt-1">
                            
                                                                                    <a href="javascript:;" data-repeater-delete  class="btn btn-primary ">
                                                                                        <i class="la la-trash-o"></i>Delete
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Form group-->
                            
                                                                <!--begin::Form group-->
                                                                <div class="form-group mt-2">
                                                                    <a href="javascript:;" data-repeater-create class="btn btn-success">
                                                                        <i class="la la-plus"></i>Add
                                                                    </a>
                                                                </div>
                                                                <!--end::Form group-->
                                                            </div>
                                                        </div>

                                                    </div> --}}
                                                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" id="default">
                                <div id="accordion" class="accordion mt-4">
                                    <div class="card mb-0 border-0" id="card">
                                        <div class="card border-bottom-0">
                                            <div class="card-header collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="true">
                                                <a class="card-title" style="font-size:18px">
                                                     Feature and Animate Section
                                                </a>
                                            </div>
                                            <div id="collapseFour" class="collapse container mt-4 show" data-parent="#accordion">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Title <span class="error">*</span></label>
                                                        <input name="feature_title" type="text" class="form-control slug-input" required="" placeholder="Name"
                                                            value="{{old('feature_title')}}">
                                                        @error('feature_title')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div> 
                                                    <div class="col-md-12 mt-1 mb-3">
                                                        <label class="form-label">Short Description<span class="error">*</span></label>
                                                        <textarea rows="4" name="feature_description" type="text" class="form-control"
                                                            value="{{ old('feature_description') }}" required="required" placeholder="Enter who we are short description" ></textarea>
                                                    </div>
                                                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" id="default">
                                <div id="accordion" class="accordion mt-4">
                                    <div class="card mb-0 border-0" id="card">
                                        <div class="card border-bottom-0">
                                            <div class="card-header collapsed" data-toggle="collapse" href="#collapseSeven" aria-expanded="true">
                                                <a class="card-title" style="font-size:18px">
                                                     Progress section
                                                </a>
                                            </div>
                                            <div id="collapseSeven" class="collapse container mt-4 show" data-parent="#accordion">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Title<span class="error">*</span></label>
                                                        <input name="progress_title" type="text" class="form-control slug-input" required="" placeholder="Name"
                                                            value="{{old('progress_title')}}">
                                                        @error('progress_title')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div> 
                                                    <div class="col-md-12 mt-1 mb-3">
                                                        <label class="form-label">Description<span class="error">*</span></label>
                                                        <textarea rows="4" name="progress_description" type="text" class="form-control"
                                                            value="{{ old('progress_description') }}" required="required" placeholder="Enter who we are short description" ></textarea>
                                                        @error('progress_description')
                                                          <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="mb-3 col-md-3">
                                                        <label for="">Progress Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control mb-2 mb-md-0" readonly name="progress_name[]" value="Test name" placeholder="Enter specification name" required />
    
                                                        @error('progress_name')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Progress Status<span class="text-danger">*</span></label>
                                                        <label class="form-label">Select Type<span class="error">*</span></label>
                                                        <select  name="progress_status[]" class="form-control"   title="status" required>
                                                            <option value=""  disabled selected>Please select type</option>
                                                            <option  value="completed">Completed</option>
                                                            <option value="in_Progress">In Progress</option>                                     
                                                            <option value="waiting">Waiting</option>                                     
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label for="">Progress Image<span class="text-danger">*</span></label>
                                                        {{-- <input type="file" class="form-control mb-2 mb-md-0" name=""  /> --}}
                                                        <input type="text" class="form-control mb-2 mb-md-0" readonly name="progress_images[]" value="pailing.png"   />

    
                                                        @error('progress_images')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-2 mt-4 pt-1">

                                                        <a href="javascript:;" data-repeater-delete  class="btn btn-primary ">
                                                            <i class="la la-trash-o"></i>Delete
                                                        </a>
                                                    </div>
    
                                                </div>
                                                    
                                                <div class="form-group row">
                                                    <div class="mb-3 col-md-3">
                                                        <label for="">Progress Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control mb-2 mb-md-0" readonly name="progress_name[]" value="Test name" placeholder="Enter specification name" required />
    
                                                        @error('progress_name')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Progress Status<span class="text-danger">*</span></label>
                                                        <label class="form-label">Select Type<span class="error">*</span></label>
                                                        <select  name="progress_status[]" class="form-control"   title="status" required>
                                                            <option value=""  disabled selected>Please select type</option>
                                                            <option  value="completed">Completed</option>
                                                            <option value="in_Progress">In Progress</option>                                     
                                                            <option value="waiting">Waiting</option>                                     
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label for="">Progress Image<span class="text-danger">*</span></label>
                                                        {{-- <input type="file" class="form-control mb-2 mb-md-0" name=""  /> --}}
                                                        <input type="text" class="form-control mb-2 mb-md-0" readonly name="progress_images[]" value="pailing.png"   />

    
                                                        @error('progress_images')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-2 mt-4 pt-1">

                                                        <a href="javascript:;" data-repeater-delete  class="btn btn-primary ">
                                                            <i class="la la-trash-o"></i>Delete
                                                        </a>
                                                    </div>
    
                                                </div>
                                                    
                                                <div class="form-group row">
                                                    <div class="mb-3 col-md-3">
                                                        <label for="">Progress Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control mb-2 mb-md-0" readonly name="progress_name[]" value="Test name" placeholder="Enter specification name" required />
    
                                                        @error('progress_name')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Progress Status<span class="text-danger">*</span></label>
                                                        <label class="form-label">Select Type<span class="error">*</span></label>
                                                        <select  name="progress_status[]" class="form-control"   title="status" required>
                                                            <option value=""  disabled selected>Please select type</option>
                                                            <option  value="completed">Completed</option>
                                                            <option value="in_Progress">In Progress</option>                                     
                                                            <option value="waiting">Waiting</option>                                     
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label for="">Progress Image<span class="text-danger">*</span></label>
                                                        {{-- <input type="file" class="form-control mb-2 mb-md-0" name=""  /> --}}
                                                        <input type="text" class="form-control mb-2 mb-md-0" readonly name="progress_images[]" value="pailing.png"   />

    
                                                        @error('progress_images')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-2 mt-4 pt-1">

                                                        <a href="javascript:;" data-repeater-delete  class="btn btn-primary ">
                                                            <i class="la la-trash-o"></i>Delete
                                                        </a>
                                                    </div>
    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="mb-3 col-md-3">
                                                        <label for="">Progress Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control mb-2 mb-md-0" readonly name="progress_name[]" value="Test name" placeholder="Enter specification name" required />
    
                                                        @error('progress_name')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Progress Status<span class="text-danger">*</span></label>
                                                        <label class="form-label">Select Type<span class="error">*</span></label>
                                                        <select  name="progress_status[]" class="form-control"   title="status" required>
                                                            <option value=""  disabled selected>Please select type</option>
                                                            <option  value="completed">Completed</option>
                                                            <option value="in_Progress">In Progress</option>                                     
                                                            <option value="waiting">Waiting</option>                                     
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label for="">Progress Image<span class="text-danger">*</span></label>
                                                        {{-- <input type="file" class="form-control mb-2 mb-md-0" name=""  /> --}}
                                                        <input type="text" class="form-control mb-2 mb-md-0" readonly name="progress_images[]" value="pailing.png"   />

    
                                                        @error('progress_images')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-2 mt-4 pt-1">

                                                        <a href="javascript:;" data-repeater-delete  class="btn btn-primary ">
                                                            <i class="la la-trash-o"></i>Delete
                                                        </a>
                                                    </div>
    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="mb-3 col-md-3">
                                                        <label for="">Progress Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control mb-2 mb-md-0" readonly name="progress_name[]" value="Test name" placeholder="Enter specification name" required />
    
                                                        @error('progress_name')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Progress Status<span class="text-danger">*</span></label>
                                                        <label class="form-label">Select Type<span class="error">*</span></label>
                                                        <select  name="progress_status[]" class="form-control"   title="status" required>
                                                            <option value=""  disabled selected>Please select type</option>
                                                            <option  value="completed">Completed</option>
                                                            <option value="in_Progress">In Progress</option>                                     
                                                            <option value="waiting">Waiting</option>                                     
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label for="">Progress Image<span class="text-danger">*</span></label>
                                                        {{-- <input type="file" class="form-control mb-2 mb-md-0" name=""  /> --}}
                                                        <input type="text" class="form-control mb-2 mb-md-0" readonly name="progress_images[]" value="pailing.png"   />

    
                                                        @error('progress_images')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-2 mt-4 pt-1">

                                                        <a href="javascript:;" data-repeater-delete  class="btn btn-primary ">
                                                            <i class="la la-trash-o"></i>Delete
                                                        </a>
                                                    </div>
    
                                                </div>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <button class="btn btn-primary waves-effect waves-lightml-2 me-2" id="showaccordion"
                                    type="submit">
                                    <i class="fa fa-save"></i> Submit
                                </button>
                                <a class="btn btn-secondary waves-effect" href="">
                                    <i class="fa fa-times"></i> Cancel
                                </a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="topStyle">
        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/css/image-uploader.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" type="text/css">

        <link href="{{ asset('assets/admin/css/parsley.min.css') }}">
        <style>
            .choose-btn {
                border-radius: 0px !important;
                border-end-end-radius: 5px !important;
                border-start-end-radius: 5px !important;
            }

            .accordion .card-header:after {
                font-family: 'FontAwesome';
                content: "\f068";
                float: right;
            }

            .accordion .card-header.collapsed:after {
                /* symbol for "collapsed" panels */
                content: "\f067";
            }
            #accordion #card {
                border-bottom: 0px solid #e9ecef !important;
            }
            .image-preview img{
                width: 40px;
                height:32px !important;
            }
            .parsley-errors-list.filled {
                display: block;
                position: absolute;
                top: 100%;
            }
            .parsley-errors-list > li {
                font-size: 12px;
                list-style: none;
                margin-top: 1px !important;
            }
        </style>
    </x-slot>
    <x-slot name="bottomScript">
        <script src="{{asset('assets/admin/js/init-summernote.js')}}"></script>
        <script src="{{asset('assets/admin/custom/custom.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.repeater.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" defer></script>
        <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/frontend/js/image-uploader.js') }}"></script>

        <script>
            function selectRefresh() {
              
            }
            $(document).ready(function() {
                $('.input-images-1').imageUploader();

                $("#feature_id").select2({
                    placeholder: "Select Your Category",
                });
                $(".post_tag").select2({
                    placeholder: "Select Your Blog Tag",
                    allowClear: true
                });

                selectRefresh();
                $('#galleryImage').repeater({
                    initEmpty: false,
                    defaultValues: {
                        'text-input': 'foo'
                    },
                    show: function () {
                        $(this).slideDown();
                    },
                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
                $('#specification').repeater({
                    initEmpty: false,
                    defaultValues: {
                        'text-input': 'foo'
                    },
                    show: function () {
                        $(this).slideDown();
                    },
                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
                $('#progress').repeater({
                    initEmpty: false,
                    defaultValues: {
                        'text-input': 'foo'
                    },
                    show: function () {
                        $(this).slideDown();
                    },
                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
                
                
                $("#file-input").change(function () {
                    readURL(this);
                    var filename = $('#file-input').val().split('\\').pop();
                    $('#input_text').val(filename);
                });

            });
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#image-preview').attr('src', e.target.result);
                            $('#image-preview').hide();
                            $('#image-preview').fadeIn(650);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                
        </script>
    </x-slot>
</x-admin.app>
