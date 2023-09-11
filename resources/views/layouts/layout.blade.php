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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    @yield('head')
    @vite('resources/css/app.css')
    @livewireStyles

</head>
<body @yield('class-html')>

@include('layouts.header')
<main>
    @yield('content')
</main>
@include('layouts.footer')

@vite('resources/js/app.js')
@livewireScripts
@auth
    <script>
        const userMenuButtons = document.querySelectorAll('.user-menu-button');
        const userMenuButtonNotifications = document.querySelectorAll('.notification-user-menu');
        const menuItems = document.querySelectorAll('.dropdown-menu-dashboard');
        const menuItemsNotifications = document.querySelectorAll('.dropdown-menu-notification');

        if (userMenuButtons) {
            userMenuButtons.forEach(userMenuButton => {
                userMenuButton.addEventListener('click', function (event) {
                    closeMenu(menuItemsNotifications);
                    toggleMenu(menuItems);
                    event.stopPropagation();
                });
            });
        }
        if (userMenuButtonNotifications) {
//BEUGGG QUAND ON VA DANS LE PROFIL IL SAFFICHE RAPIDEMENT
            userMenuButtonNotifications.forEach(userMenuButtonNotification => {
                userMenuButtonNotification.addEventListener('click', function (event) {
                    toggleMenu(menuItemsNotifications);
                    closeMenu(menuItems);
                    event.stopPropagation();
                });
            });
        }


        const userPrimaryMenuButton = document.querySelectorAll('.open-primary-menu');
        const userPrimaryMenuButtonClose = document.querySelectorAll('.close-primary-menu');
        const contentPrimaryMenu = document.querySelectorAll('.primary-menu');
        const userMenuButtonMobile = document.querySelectorAll('.user-menu-button-mobile');
        const userMenuButtonNotificationMobile = document.querySelectorAll('.notification-user-menu-mobile');
        const menuItemsMobile = document.querySelectorAll('.dropdown-menu-dashboard-mobile');
        const menuItemsNotificationMobile = document.querySelectorAll('.dropdown-menu-notification-mobile');
        const overlay = document.querySelectorAll('.overlay');

        if (userMenuButtonMobile) {
            userMenuButtonMobile.forEach(button => {
                button.addEventListener('click', function (event) {
                    toggleMenu(menuItemsMobile);
                    closeMenu(menuItemsNotificationMobile);
                    event.stopPropagation();
                });
            });
        }

        if (overlay) {
            overlay.forEach(element => {
                element.addEventListener('click', function (event) {
                    toggleMenu(contentPrimaryMenu);
                    toggleMenu(overlay);
                    toggleMenu(userPrimaryMenuButton);
                    event.stopPropagation();
                });
            });
        }

        if (userPrimaryMenuButton) {
            userPrimaryMenuButton.forEach(button => {
                button.addEventListener('click', function (event) {
                    toggleMenu(contentPrimaryMenu);
                    closeMenu(menuItemsNotificationMobile);
                    closeMenu(menuItemsMobile);
                    closeMenu(userPrimaryMenuButton);
                    toggleMenu(overlay);
                    event.stopPropagation();
                });
            });
        }

        if (userPrimaryMenuButtonClose) {
            userPrimaryMenuButtonClose.forEach(button => {
                button.addEventListener('click', function (event) {
                    toggleMenu(contentPrimaryMenu);
                    closeMenu(userPrimaryMenuButton);
                    toggleMenu(overlay);
                    event.stopPropagation();
                });
            });
        }

        if (userMenuButtonNotificationMobile) {
            userMenuButtonNotificationMobile.forEach(button => {
                button.addEventListener('click', function (event) {
                    toggleMenu(menuItemsNotificationMobile);
                    closeMenu(menuItemsMobile);
                    event.stopPropagation();
                });
            });
        }

        function toggleMenu(element) {
            element.forEach(el => {
                el.classList.toggle('hidden');
            });
        }

        function closeMenu(element) {
            element.forEach(el => {
                el.classList.add('hidden');
            });
        }

        document.addEventListener('click', function () {
            closeMenu(menuItems);
            closeMenu(menuItemsNotifications);
            closeMenu(menuItemsMobile);
            closeMenu(menuItemsNotificationMobile);
        })
    </script>

@endauth
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
@yield('scripts')
</body>
</html>
