<!doctype html>
<html lang="en">

<head>
    <x-layouts.meta-tag></x-layouts.meta-tag>
    <title>E-Presensi Geolocation | Dashboard</title>
    <x-layouts.style />
</head>

<body style="background-color:#e9ecef;">

    <!-- loader -->
    <x-layouts.loader />
    <!-- * loader -->



    <!-- App Capsule -->
    <div id="appCapsule">
        {{ $slot }}

    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
    <x-layouts.button-nav />
    <!-- * App Bottom Menu -->

    <x-layouts.script />

</body>

</html>
