<!doctype html>
<html class="h-100" dir="{{ GenericHelper::getSiteDirection() }}" lang="{{ session('locale') }}">
<head>
     <script src="{{ mix('js/app.js') }}" defer></script>
    @include('template.head')
</head>
<body class="d-flex flex-column">
    @include('elements.impersonation-header')
    @include('template.header')
    <div class="flex-fill">
        @yield('content')
    </div>
    @if (getSetting('compliance.enable_age_verification_dialog'))
        @include('elements.site-entry-approval-box')
    @endif
    @include('template.footer')
    @include('template.jsVars')

    <!-- Include your app.js file -->
   

    @include('template.jsAssets')
    @include('elements.language-selector-box')
</body>
</html>
