<!DOCTYPE html>
<html lang="en" class="layout-static">
@include('control.partials._head')

<body>
    @include('control.partials._nav')
    <div class="page-content">
        @include('control.partials._left-side')
        <div class="content-wrapper">
            @yield('_content')
            @include('control.partials._footer')
        </div>
    </div>
    @include('control.partials._scripts')
</body>

</html>
