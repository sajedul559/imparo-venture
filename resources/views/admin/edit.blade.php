<x-admin.app >

  
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title mb-3">{{ $page_title }}</h4> --}}
                    <form action="{{ route('admin.update', $admin->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Frist Name</label>
                                <input name="first_name" type="text" class="form-control" required=""
                                    placeholder="Enter frist name" value="{{ $admin->first_name ?? old('first_name') }}">
                                @error('first_name')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Last Name</label>
                                <input name="last_name" type="text" class="form-control" required=""
                                    placeholder="Enter last lame" value="{{ $admin->last_name ?? old('last_name') }}">
                                @error('last_name')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Username</label>
                                <input name="username" type="text" class="form-control" required=""
                                    placeholder="Enter username" value="{{ $admin->username ?? old('username') }}">
                                @error('username')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Emai</label>
                                <input name="email" type="email" class="form-control" required=""
                                    placeholder="Enter email address" value="{{ $admin->email ?? old('email') }}">
                                @error('email')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Mobile</label>
                                <input name="phone" type="tel" class="form-control" required=""
                                    placeholder="Enter phone number" value="{{ $admin->phone ?? old('phone') }}">
                                @error('phone')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Select Type<span class="error">*</span></label>
                                <select  name="type" class="form-control"   title="type" required>
                                    <option value=""  disabled selected>Please select type</option>
                                    <option @if ($admin->type == 'admin')
                                        selected
                                    @endif value="admin">Admin</option>
                                    <option @if ($admin->type == 'moderator')
                                        selected
                                    @endif value="moderator">Moderator</option>                                     
                                </select>
                                @error('phone')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Enter password"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" placeholder="Password confirmation">
                                @error('password_confirmation')
                                    <p class="error">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Upload User Image <span class="error">*</span><span
                                        class="subtext">(Min. Image Size (870 *500) PX)</span></label>
                                <div class="row m-0 p-0">
                                    <div class="col-md-10 ml-0 pl-0">
                                        <input type="file" class="filestyle" name="image"
                                            data-buttonname="btn-secondary" id="file-input" tabindex="-1"
                                            style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">
                                        <div class="bootstrap-filestyle input-group">
                                            <div name="filedrag"
                                                style="position: absolute; width: 100%; height: 35px; z-index: -1;">
                                            </div>
                                            <input type="text" value="{{ $item->image }}" class="form-control p-2"
                                                id="input_text" placeholder="" disabled=""
                                                style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                            <span class="group-span-filestyle input-group-btn" tabindex="0"><label
                                                    for="file-input" style="margin-bottom: 0;"
                                                    class="btn btn-info choose-btn"><span class="buttonText"><i
                                                            class="ti-export px-3"></i></span></label></span>
                                        </div>
                                    </div>
                                    <div id='img_contain col-md-4 px-2'>
                                        <img id="image-preview" align='middle'
                                            src="{{ get_storage_image('admin', Auth::guard('admin')->user()->image) }}"
                                            alt="your image" title='' class="img-fluid"
                                            style="width: 50px;height:35px" />
                                    </div>
                                </div>
                                @error('image')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label mb-2 w-100">Status <span class="error">*</span></label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="status_yes" name="status" class="form-check-input"
                                        value="{{ \App\Utils\GlobalConstant::STATUS_ACTIVE }}" name="status"
                                        class="custom-control-input" @if (\App\Utils\GlobalConstant::STATUS_ACTIVE == $item->status) checked @endif>
                                    <label class="mb-0" for="status_yes">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="status_no" name="status" class="form-check-input"
                                        value="{{ \App\Utils\GlobalConstant::STATUS_INACTIVE }}" name="status"
                                        class="custom-control-input" @if (\App\Utils\GlobalConstant::STATUS_INACTIVE == $item->status) checked @endif>
                                    <label class="mb-0" for="status_no">Inactive</label>
                                </div>
                            </div>

                        </div> --}}

                        <div class="mb-3">
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
    <x-slot name="topStyle">

        <style>
            .choose-btn {
                border-radius: 0px !important;
                border-end-end-radius: 5px !important;
                border-start-end-radius: 5px !important;
            }
        </style>
    </x-slot>
    <x-slot name="bottomScript">
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image-preview').attr('src', e.target.result);
                        $('#image-preview').hide();
                        $('#image-preview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(document).ready(function() {
                $("#file-input").change(function() {
                    readURL(this);
                    var filename = $('#file-input').val().split('\\').pop();
                    $('#input_text').val(filename);
               });
            });
        </script>
    </x-slot>
</x-admin.app>
