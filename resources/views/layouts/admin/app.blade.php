<!DOCTYPE html>
<html dir="ltr">
<head>
    @include('layouts.admin.header')
<body>
    <main class="hp-bg-color-dark-90 d-flex min-vh-100">
        @include('layouts.admin.sidebar')

        <div class="hp-main-layout">
            @include('layouts.admin.navbar')
            @include('layouts.admin.mobile-sidebar')

            <div class="hp-main-layout-content">
                <div class="row mb-32 g-32">
                   @yield('content')
                </div>
            </div>

            @include('layouts.admin.footer')
        </div>
    </main>

    @include('layouts.admin.extra')


  @include('layouts.admin.script')
</body>


</html>
