<!doctype html>
<html lang="en">

<head>
    <x-layouts.meta-tag></x-layouts.meta-tag>
    <title>{{ env('APP_NAME') ?? 'E-Presensi Geolocation' }} | {{ $title ?? null }}</title>
    <x-layouts.style />
    {{ $styles ?? null }}
</head>

<body style="background-color:#e9ecef;">

    <!-- loader -->
    <x-layouts.loader />
    <!-- * loader -->

    <!-- App Header -->
    {{ $header ?? null }}
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
        {{ $slot }}

    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
    <x-layouts.button-nav />
    <!-- * App Bottom Menu -->

    <x-layouts.script />

    {{ $scripts ?? null }}
</body>

</html>
