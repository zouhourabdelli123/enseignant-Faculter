<!DOCTYPE html>
<html lang="fr">
@include('dashbaord.head')

<body>

    <div class="dashboard-wrapper">
        @include('dashbaord.header')

        @include('dashbaord.sidebar')

        @yield('content')

        @include('dashbaord.footer')
    </div>
</body>

</html>
