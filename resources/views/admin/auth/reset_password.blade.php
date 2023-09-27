<x-admin.master>

    <div class="home-btn d-none d-sm-block">
        <a href="{{ route('home') }}" class="text-white"><i class="fas fa-home h2"></i></a>
    </div>

    <!-- Begin page -->
    <div class="accountbg"></div>

    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-body">

                <div class="text-center">
                    <a href="{{ route('home') }}" class="logo">

                        <img src="{{ getImage('site_logo', 'logo') }}" alt="logo">
                    </a>
                </div>

                <div class="p-3">

                    <p>You can change your password</p>

                    <x-form class="form-horizontal m-t-30" action="{{ route('admin.password.update') }}">

                        <x-partials.input name="password" placeholder="Enter Password" title="New Password"
                            type="password" required>

                            @error('password')
                                <x-partials.alert type="error" message="Password is required"></x-partials.alert>
                            @enderror

                        </x-partials.input>

                        <x-partials.input name="password_confirmation" placeholder="Confirm Password"
                            title="Confirm Password" type="password" required>

                            @error('password_confirmation')
                                <x-partials.alert type="error" message="Confirm password is required"></x-partials.alert>
                            @enderror

                        </x-partials.input>

                        <input type="hidden" name="token" value="{{ $token }}">



                        <div class="form-group row m-t-20">

                            <div class="col-sm-4"></div>
                            <div class="col-sm-8 text-right">
                                <x-partials.button class="btn-primary" type="submit">
                                    Reset Password
                                </x-partials.button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20">
                                <a href="{{ route('admin.login') }}"><i class="mdi mdi-lock"></i> Back to Login</a>
                            </div>
                        </div>
                    </x-form>
                </div>

            </div>
        </div>

        <x-partials.ic_banner />

    </div>
    <!-- end wrapper-page -->
</x-admin.master>
