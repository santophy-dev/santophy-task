<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.scriptheader')

    <body data-topbar="dark"> 
        <div id="layout-wrapper">
            <div>
                @yield('content')
                <!-- <script src="{{url('assets/js/app.js')}}"></script> -->
            </div>
        </div>
        @include('layouts.footer')
    </body>
</html>
