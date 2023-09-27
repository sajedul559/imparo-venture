<x-admin.app >

    <div class="row pt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Company Edit Form</h4>
                    <form id="submitform" data-parsley-trigger="keyup" class="repeater"
                        action="{{ route('admin.company.update',$company->id) }} " method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label class="form-label"> Title <span class="error">*</span></label>
                                    <input name="title" type="text" required="required" data-parsley-maxlength="30"
                                        class="form-control" placeholder="Enter  title" value="{{ $company->title ?? old('title') }}">
                                    <input type="hidden" value="content" name="content">
                                    <input type="hidden" value="slug" name="slug">

                                    
                                    @error('title')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                           
                                            
                           
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Upload Company Image <span class="error">*</span><span
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
                                    <div id='img_contain col-md-4 px-2'>
                                        <img id="image-preview" align='middle' src="{{asset('images/company/')}}/{{$company->image}}"
                                            alt="your image"
                                            title='' class="img-fluid" style="width: 50px;height:35px"/>
                                    </div>
                                </div>
                                @error('image')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>     
                          
                           
                            <div class="mb-3 col-md-4">
                                <label for="">Status<span class="text-danger">*</span></label>
                              
                                <div id="englishValue1" class="">
                                    <select  name="status" class="form-control" required  title="status">
                                    

                                        <option value="inactive" @if ($company->status == 'inactive') selected
                                            
                                            @endif>Inactive</option>
                                            <option value="active"  @if ($company->status == 'active') selected
                                                
                                                @endif>Active</option>
                                    </select>
                                </div>

                                @error('tag')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>  
                            
                          
                            <div class="col-md-12" id="default">
                                <div id="accordion" class="accordion mt-4">
                                    <div class="card mb-0 border-0" id="card">
                                        <div class="card border-bottom-0">
                                            <div class="card-header collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="true">
                                                <a class="card-title" style="font-size:18px">
                                                    INTRODUCTION DESIGN CONSULTANCY
                                                </a>
                                            </div>
                                            <div id="collapseTwo" class="collapse container mt-4 show" data-parent="#accordion">
                                                <div class="row">
                                                    <div class="mb-3 col-md-4">
                                                        <label for="">Title<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control mb-2 mb-md-0" value="{{$company->content['intro_title']}}" name="intro_title" placeholder="Enter title" required />
    
                                                        @error('intro_title')
                                                        <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Upload Introduction Image <span class="error">*</span><span
                                                                class="subtext">(Min. Image Size (870 *500) PX)</span></label>

                                                        <input type="file" name="intro_image" class="form-control">
                                                       
                                                        @error('image')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div> 
                                                    <div  class="col-md-2 pt-4" >
                                                        <img  align='middle' src="{{asset('images/company/intruduction/')}}/{{$company->content['intro_image']}}"
                                                            alt="your image"
                                                            title='' class="img-fluid" style="width: 50px;height:35px"/>
                                                    </div>
                                                    <div class="col-md-12 mt-1 mb-3">
                                                        <label class="form-label">Description<span class="error">*</span></label>
                                                        <textarea rows="4" name="intro_description" type="text" class="form-control"
                                                            value="{{ old('intro_description') }}" required="required" placeholder="Enter description...." >{{$company->content['intro_description']}}</textarea>
                                                        @error('intro_description')
                                                          <p class="error">{{ $message }}</p>
                                                        @enderror
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
                                                     Gallery section
                                                </a>
                                            </div>
                                            <div id="collapseSeven" class="collapse container mt-4 show" data-parent="#accordion">
                                                <div class="row">
                                                    
                                                </div>
                                                    <div class="mb-3">
                                                        <div id="gallery">
                                                            <!--begin::Form group-->
                                                            <div class="form-group">
                                                                <div data-repeater-list="gallery">
                                                                    @foreach ($company->content['gallery_description'] as $key => $data)

                                                                    <div data-repeater-item class="repeater-item" id="removeImages-{{$key}}">
                                                                        <div class="form-group row">
                                                                            <div class="mb-3 col-md-6">
                                                                                <label for="">Title<span class="text-danger">*</span></label>
                                                                                <input type="text" class="form-control mb-2 mb-md-0" name="gallery_title" value="{{$company->content['gallery_title'][$key]}}" placeholder="Enter title" required />
                            
                                                                                @error('gallery_title')
                                                                                <p class="error">{{ $message }}</p>
                                                                                @enderror
                                                                            </div>
                                                                           
                                                                            <div class="col-md-4">
                                                                                <label class="form-label" > Image</label>
                                                                               
                                                                                @if (isset($company->content['gallery_images'][$key]))
                                                                                    <input type="file" class="form-control" value="@isset($company->content['gallery_images'])
                                                                                    {{ $company->content['gallery_images'][$key]}}
                                                                                    @endisset" name="gallery_images" > 
                                                                                @else
                                                                                <input type="file" class="form-control mb-2 mb-md-0" name="gallery_images"  required />     
                                                                                @endif
                                                                                @if (isset($company->content['gallery_images'][$key]))
                                                                                <input type="hidden" id="imageOne" class="form-control" value="@isset($company->content['gallery_images'])
                                                                                {{ $company->content['gallery_images'][$key]}}
                                                                                 @endisset" name="gallery_images_old" >     
                                                                                @endif
                                                                                {{-- <img src="{{asset('images/company/gallery')}}/{{$company->content['gallery_images'] [$key]}}" class=" mt-4" height="35" width="50"alt=""> --}}

                                                                                
                                                                            </div>

                                                                            <div class="col-md-2 mt-4 pt-1">

                                                                                {{-- <a href="javascript:;" data-repeater-delete  class="btn btn-primary ">
                                                                                    <i class="la la-trash-o"></i>Delete
                                                                                </a> --}}
                                                                                @if (isset($company->content['gallery_images'][$key]))
                                                                                <a  class="btn btn-primary text-white"
                                                                                onclick="deleteGalleryImage({{$key}},'{{$company->content['gallery_images'][$key] }}')">
                                                                                    <i class="la la-trash-o"></i>Delete
                                                                                </a>
                                                                                @endif
                                                                            </div>
                                                                            <div class="mb-3 col-md-10">
                                                                                <label class="form-label">Description<span class="error">*</span></label>
                                                                                <textarea rows="8" cols="15" name="gallery_description" type="text" class="form-control"
                                                                                    value="{{ old('gallery_description') }}" required="required" placeholder="Enter who we are short description" >{{$company->content['gallery_description'][$key]}}</textarea>
                                                                                @error('gallery_description')
                                                                                  <p class="error">{{ $message }}</p>
                                                                                @enderror
                
                                                                            </div>
                                                                                                      
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <!--end::Form group-->
                                                            <!--begin::Form group-->
                                                            <div class="form-group mt-2">
                                                                <a href="javascript:;" data-repeater-create class="btn btn-success" id="AddMorekkkk">
                                                                    <i class="la la-plus"></i>Add More
                                                                </a>
                                                            </div>
                                                            <!--end::Form group-->
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
             function deleteGalleryImage (key,Image) {
            $('#removeImages-'+key).remove();
            var image =Image;

             $.ajax({
                    type:"GET",
                     url: '/admin/gallery-image-delete/',
                    data : { image : Image },
                    success: function(result) {
                        window.console.log('Successfully item deleted');
                    }
                });
           }
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
                $('#gallery').repeater({
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
