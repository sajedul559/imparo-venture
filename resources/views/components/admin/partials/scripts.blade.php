<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/admin/js/metis.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/waves.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/sweetalert2@10.js') }}"></script>
{{-- <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> --}}


<!-- Vue js -->
{{-- @vite('resources/js/app.js') --}}
{{-- @vite('resources/js/app.js') --}}


{{ $topScript ?? '' }}

{{-- <script src="{{ asset('assets/admin/js/admin.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/admin/js/custom.js') }}"></script> --}}
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom-dev.js') }}"></script>
{{-- <script src="{{ asset('assets/admin/js/custom.js') }}"></script> --}}

{{ $bottomScript ?? '' }}
