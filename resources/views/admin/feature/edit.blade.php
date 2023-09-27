<x-admin.app>

    {{-- <div class="page-title-box">
        <div class="row align-items-center">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title mb-3">{{$page_title}}</h4> --}}
                    <form action="{{ route('featurs.update',$feature->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Name<span class="error">*</span></label>
                            <input name="name" type="text" class="form-control slug-input" required="" placeholder="Name"
                            value="{{ $feature->name ?? old('name') }}">
                            @error('name')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div> 

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Upload Image <span class="error">*</span></label>
                            <div class="row m-0 p-0">
                                <div class="col-md-10 ml-0 pl-0">
                                    <input type="file" class="filestyle" name="image" data-buttonname="btn-secondary"
                                    id="file-input" value="{{$feature->image}}" tabindex="-1"
                                    style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" >
                                    <div class="bootstrap-filestyle input-group">
                                        <div name="filedrag"
                                            style="position: absolute; width: 100%; height: 35px; z-index: -1;"></div>
                                        <input type="text" value="{{$feature->image}}" class="form-control p-2" id="input_text" placeholder="" disabled=""
                                                style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                        <span class="group-span-filestyle input-group-btn" tabindex="0"><label
                                                for="file-input"
                                                style="margin-bottom: 0;" class="btn btn-info choose-btn"><span
                                                    class="buttonText"><i class="ti-export px-3"></i></span></label></span>

                                    </div>
                                </div>
                                <div id='img_contain col-md-4 px-2'>
                                    <img id="image-preview" align='middle' src="{{asset('images/feature/')}}/{{$feature->image}}"
                                        alt="your image"
                                        title='' class="img-fluid" style="width: 50px;height:35px"/>
                                </div>
                            </div>
                            @error('image')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 ml-3">
                            <label class="form-label mb-2 w-100">Status <span class="error">*</span></label>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="status_yes" name="status" class="form-check-input"
                                       value="active" name="status"
                                       class="custom-control-input"
                                       @if( $feature->status =='active') checked @endif>
                                <label class="mb-0" for="status_yes">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="status_no" name="status" class="form-check-input"
                                       value="inactive" name="status"
                                       class="custom-control-input"
                                       @if( $feature->status =='inactive') checked @endif>
                                <label class="mb-0" for="status_no">Inactive</label>
                            </div>
                        </div>
                        <div class="mb-3 ml-3">
                            <div>
                                <button class="btn btn-primary waves-effect waves-lightml-2 mr-2" type="submit">
                                    <i class="fa fa-save"></i> Submit
                                </button>
                                <a class="btn btn-secondary waves-effect" href="#">
                                    <i class="fa fa-times"></i> Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <x-slot name="bottomScript">
        <script>
            $(document).ready(function() {
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
