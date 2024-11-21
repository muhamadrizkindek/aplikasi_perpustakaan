<!DOCTYPE html>
<html lang="en">

<head>
    @include('layoutsUsers.head')
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

    {{--navbar--}}

    @include('layoutsUsers.navbar')

    {{--end navbar--}}

    {{--sidebar--}}

    @include('layoutsUsers.sidebar')

    {{--end navbar--}}

    {{--content--}}

    <div class="content-body">
        @yield('content')
    </div>

    {{--end content--}}

</div>

    @include('layoutsUsers.footer')
</body>
</html>
