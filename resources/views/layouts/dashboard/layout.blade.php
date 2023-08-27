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
<main class="mt-6 lg:mt-0">
    @yield('content')
</main>
@include('layouts.dashboard.footer')

    <script>

        const userMenuButtons = document.getElementById('user-menu-button');
        const userMenuButtonNotifications = document.getElementById('notification-user-menu');
        const menuItems = document.getElementById('dropdown-menu-dashboard');
        const menuItemsNotifications = document.getElementById('dropdown-menu-notification');

        if (userMenuButtons) {
            // Add click event listeners to user menu buttons
                userMenuButtons.addEventListener('click', function (event) {
                    console.log(userMenuButtons);
                    toggleMenu(menuItems);
                    closeMenu(menuItemsNotifications);
                    event.stopPropagation();
                });
        }

        if (userMenuButtonNotifications) {
                userMenuButtonNotifications.addEventListener('click', function (event) {
                    console.log(userMenuButtonNotifications);
                    toggleMenu(menuItemsNotifications);
                    closeMenu(menuItems);
                    event.stopPropagation();
                });
        }



        const userPrimaryMenuButton = document.getElementById('openPrimaryMenu');
        const userPrimaryMenuButtonClose = document.getElementById('closePrimaryMenu');
        const contentPrimaryMenu = document.getElementById('primaryMenu');

        const userMenuButtonMobile = document.getElementById('user-menu-button-mobile');
        const menuItemsMobile = document.getElementById('dropdown-menu-dashboard-mobile');

        const userMenuButtonNotificationMobile = document.getElementById('notification-user-menu-mobile');
        const menuItemsNotificationMobile = document.getElementById('dropdown-menu-notification-mobile');
        const overlay = document.getElementById('overlay');

        userMenuButtonMobile.addEventListener('click', function(event) {
            console.log(menuItemsMobile)
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
            toggleMenu(userPrimaryMenuButton);
            toggleMenu(overlay);
            event.stopPropagation();
        });

        userPrimaryMenuButtonClose.addEventListener('click', function(event) {
            toggleMenu(contentPrimaryMenu);
            toggleMenu(userPrimaryMenuButton);
            toggleMenu(overlay);
            event.stopPropagation();
        });

        userMenuButtonNotificationMobile.addEventListener('click', function(event) {
            console.log(menuItemsNotificationMobile)
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
