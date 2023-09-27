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
                    <h3 class="text-muted text-center">Forgot password</h3>



                    <x-form class="form-horizontal m-t-30" action="{{ route('admin.password.email') }}">

                        <x-partials.input name="email" placeholder="Enter Email" title="Email">

                            @error('email')
                                <x-partials.alert type="error" message="Email is required"></x-partials.alert>
                            @enderror

                        </x-partials.input>



                        <div class="form-group row m-t-20">

                            <div class="col-sm-4"></div>
                            <div class="col-sm-8 text-right">
                                <x-partials.button class="btn-primary" type="submit">
                                    Email Password Reset Link
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
