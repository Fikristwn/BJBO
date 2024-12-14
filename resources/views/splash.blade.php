<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash Screen</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        /* Video background */
        #background-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; /* Pastikan video berada di belakang elemen lainnya */
        }

        /* Logo animasi */
        #splash-logo {
            width: 800px;
            height: 800px  /* Ukuran logo yang lebih kecil */
            height: auto;
            opacity: 0; /* Mulai dengan logo tersembunyi */
            transition: opacity 1s ease; /* Efek transisi untuk logo */
        }

        /* Animasi fade out untuk logo */
        @keyframes fadeOut {
            to {
                opacity: 0;
                visibility: hidden;
            }
        }
    </style>
</head>
<body>
    <!-- Video Background -->
    <video id="background-video" autoplay muted loop>
        <source src="{{ asset('video/bg.mp4') }}" type="video/mp4">
        <!-- Ganti dengan path video Anda -->
        Your browser does not support the video tag.
    </video>

    <!-- Logo -->
    <img src="{{ asset('images/bjbo(1).svg') }}" id="splash-logo" alt="Logo">

    <script>
        setTimeout(function() {
            // Setelah 2 detik, ubah opacity logo menjadi 1 (logo muncul)
            document.getElementById('splash-logo').style.opacity = 1;
        }, 1900); // Durasi delay 2 detik sebelum logo muncul

        setTimeout(function() {
            window.location.href = "layout"; // Ganti dengan route halaman utama Anda
        }, 3200); // Durasi video dan splash screen (4 detik)
    </script>
</body>
</html>
