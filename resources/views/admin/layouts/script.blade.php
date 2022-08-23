
@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js "></script>
    <script src="{{ asset('admin-asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-asset/js/mdb.min.js') }}"></script>
    <script src="{{ asset('sweetalert/sweetalert2.js') }}"></script>
    {{-- <script src="{{ asset('jalalidatepicker/persian-date.min.js') }}"></script> --}}

@show
@include('alerts.sweetalert.success')

@yield('scripts')
