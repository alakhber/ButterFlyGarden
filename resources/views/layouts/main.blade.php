<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

@include('main.partials._head')
<body>
    <div class="boxed blog">
        @include('main.partials._loader')
        @include('main.partials._header')
        @include('main.partials._nav')
        @yield('_content')
        @include('main.partials._footer')
    </div>
   @include('main.partials._scripts')
</body>
</html>