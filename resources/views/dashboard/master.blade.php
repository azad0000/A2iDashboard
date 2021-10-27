@include('dashboard.includes.header')
    <body class="sb-nav-fixed">
        @include('dashboard.includes.navbar')
        <div id="layoutSidenav">
            @include('dashboard.includes.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
            </div>
            
        </div>
        @include('dashboard.includes.scripts')
    </body>
</html>
