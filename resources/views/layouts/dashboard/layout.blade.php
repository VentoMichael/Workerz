<!doctype html>
<html @yield('class-html') class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Workerz | Find and Hire Independent Workers</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Vento Michael">
    <meta name="language" content="French">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="copyright" content="{{env('APP_NAME')}}">
    <meta name="robots" content="index, follow">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    @yield('head')
    @vite('resources/css/app.css')
</head>
<body @yield('class-html')>

@include('layouts.dashboard.header')
<main>
    @yield('content')
</main>
@include('layouts.dashboard.footer')

    <script>
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenuButtonNotification = document.getElementById('notification-user-menu');
        const menuItems = document.getElementById('dropdown-menu-dashboard');
        const menuItemsNotification = document.getElementById('dropdown-menu-notification');

        userMenuButton.addEventListener('click', function(event) {
            toggleMenu(menuItems);
            closeMenu(menuItemsNotification);
            event.stopPropagation();
        });

        userMenuButtonNotification.addEventListener('click', function(event) {
            toggleMenu(menuItemsNotification);
            closeMenu(menuItems);
            event.stopPropagation();
        });

        // Close both modals when clicking outside
        document.addEventListener('click', function() {
            closeMenu(menuItems);
            closeMenu(menuItemsNotification);
        });

        const userPrimaryMenuButton = document.getElementById('openPrimaryMenu');
        const userPrimaryMenuButtonClose = document.getElementById('closePrimaryMenu');
        const contentPrimaryMenu = document.getElementById('primaryMenu');
        const userMenuButtonMobile = document.getElementById('user-menu-button-mobile');
        const userMenuButtonNotificationMobile = document.getElementById('notification-user-menu-mobile');
        const menuItemsMobile = document.getElementById('dropdown-menu-dashboard-mobile');
        const menuItemsNotificationMobile = document.getElementById('dropdown-menu-notification-mobile');
        const overlay = document.getElementById('overlay');

        userMenuButtonMobile.addEventListener('click', function(event) {
            toggleMenu(menuItemsMobile);
            closeMenu(menuItemsNotificationMobile);
            event.stopPropagation();
        });

        overlay.addEventListener('click', function(event) {
            toggleMenu(contentPrimaryMenu);
            toggleMenu(overlay);
            toggleMenu(userPrimaryMenuButton);
            event.stopPropagation();
        });

        userPrimaryMenuButton.addEventListener('click', function(event) {
            toggleMenu(contentPrimaryMenu);
            closeMenu(menuItemsNotificationMobile);
            closeMenu(menuItemsMobile);
            closeMenu(userPrimaryMenuButton);
            toggleMenu(overlay);
            event.stopPropagation();
        });

        userPrimaryMenuButtonClose.addEventListener('click', function(event) {
            toggleMenu(contentPrimaryMenu);
            closeMenu(userPrimaryMenuButton);
            toggleMenu(overlay);
            event.stopPropagation();
        });

        userMenuButtonNotificationMobile.addEventListener('click', function(event) {
            toggleMenu(menuItemsNotificationMobile);
            closeMenu(menuItemsMobile);
            event.stopPropagation();
        });

        // Close both modals when clicking outside
        document.addEventListener('click', function() {
            closeMenu(menuItemsMobile);
            closeMenu(menuItemsNotificationMobile);
        });

        function toggleMenu(element) {
            element.classList.toggle('hidden');
        }

        function closeMenu(element) {
            element.classList.add('hidden');
        }

    </script>

@yield('scripts')
</body>
</html>
