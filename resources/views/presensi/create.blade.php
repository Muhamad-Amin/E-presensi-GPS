<x-layouts.app>
    <x-slot:title>Dashboard</x-slot:title>
    <x-slot:styles>
        <style>
            .bungkus {
                margin-top: 70px;
            }

            .webcam-capture,
            .webcam-capture video {
                display: inline-block;
                width: 100% !important;
                margin: auto;
                height: auto !important;
                border-radius: 15px;

            }
        </style>
    </x-slot:styles>
    <x-slot:header>
        <div class="appHeader bg-primary text-light">
            <div class="left">
                <a href="javascript:;" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </div>
            <div class="pageTitle">{{ env('APP_NAME') ?? 'E-Presensi Geolocation' }}</div>
            <div class="right"></div>
        </div>
    </x-slot:header>
    <div class="row bungkus">
        <div class="col">
            <input type="hidden" id="lokasi">
            <div class="webcam-capture"></div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button id="takeabsen" class="btn btn-primary btn-block">
                <ion-icon name="camera-outline"></ion-icon>
                Absen Masuk
            </button>
        </div>
    </div>
    <x-slot:scripts>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"
            integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            Webcam.set({
                height: 480,
                width: 640,
                image_format: 'jpeg',
                jpeg_quality: 80
            });

            Webcam.attach('.webcam-capture');

            var lokasi = document.getElementById('lokasi');

            if (navigator.geolocation) {
                console.log("Browser support geolocation, mencoba request...");

                navigator.geolocation.getCurrentPosition(successCallback, errorCallback, {
                    enableHighAccuracy: true, // Paksa akurasi tinggi (GPS)
                    timeout: 5000, // Batas waktu 5 detik
                    maximumAge: 0 // Jangan pakai cache lokasi lama
                });
            } else {
                alert("Browser Anda tidak mendukung Geolocation");
            }

            function successCallback(position) {
                lokasi.value = position.coords.latitude + "," + position.coords.longitude;
            }

            function errorCallback(error) {
                // INI PENTING: Tampilkan kenapa error
                let msg = "";
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        msg = "Anda menolak akses lokasi. Harap izinkan di pengaturan browser.";
                        break;
                    case error.POSITION_UNAVAILABLE:
                        msg = "Informasi lokasi tidak tersedia (Sinyal GPS lemah).";
                        break;
                    case error.TIMEOUT:
                        msg = "Waktu permintaan habis (Timeout). Coba refresh.";
                        break;
                    default:
                        msg = "Terjadi error tidak dikenal: " + error.message;
                        break;
                }
                alert(msg); // Tampilkan alert agar user sadar
                console.error(msg);
            }
        </script>
    </x-slot:scripts>
</x-layouts.app>
