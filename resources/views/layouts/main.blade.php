@include('layouts.head')
@include('layouts.navbar')
@include('layouts.sidebar')
@yield('main')

@include('layouts.scripts')
@yield('additional-scripts')
@include('layouts.footer')
