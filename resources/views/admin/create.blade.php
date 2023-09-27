<x-admin.app :title="$page_title">

    <div class="page-title-box">
        <div class="row align-items-center">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{ $page_title }}</h4>
                    <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Frist Name <span class="error">*</span></label>
                                <input name="first_name" type="text" class="form-control" required=""
                                    placeholder="Enter frist name" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Last Name <span class="error">*</span></label>
                                <input name="last_name" type="text" class="form-control" required=""
                                    placeholder="Enter last name" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Username <span class="error">*</span></label>
                                <input name="username" type="text" class="form-control" required=""
                                    placeholder="Enter username" value="{{ old('username') }}">
                                @error('username')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Email<span class="error">*</span></label>
                                <input name="email" type="email" class="form-control" required=""
                                    placeholder="Enter email address" value="{{ old('email') }}">
                                @error('email')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Mobile<span class="error">*</span></label>
                                <input name="phone" type="tel" class="form-control" required=""
                                    placeholder="Enter phone number" value="{{ old('phone') }}">
                                @error('phone')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Select Type<span class="error">*</span></label>
                                <select  name="type" class="form-control"   title="type" required>
                                    <option value=""  disabled selected>Please select type</option>
                                    <option  value="admin">Admin</option>
                                    <option value="moderator">Moderator</option>                                     
                                </select>
                                @error('phone')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Password<span class="error">*</span></label>
                                <input name="password" type="password" class="form-control" required=""
                                    placeholder="Enter password" value="{{ old('password') }}">
                                @error('password')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Confirm Password<span class="error">*</span></label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" placeholder="Password confirmation">
                                @error('password_confirmation')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                       

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
