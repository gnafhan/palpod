<!DOCTYPE html>
<html lang="en">
<head>
    <title>Coming Soon TRPL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('cs/images/icons/favicon.ico') }}"/>
    
    {{-- CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('cs/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cs/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cs/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cs/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cs/vendor/countdowntime/flipclock.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cs/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cs/css/main.css') }}">
</head>
<body>
    <div class="bg-img1 size1 overlay1 p-b-35 p-l-15 p-r-15" style="background-image: url('{{ asset('cs/images/bg02.png') }}');">
        <div class="flex-col-c p-t-160 p-b-215 respon1">
            <div class="wrappic1">
                <a href="#">
                    <h1 style="color:white;"><b>PalPod</b></h1>
                </a>
            </div>

            <h3 class="l1-txt1 txt-center p-t-30 p-b-100">
                Coming Soon
            </h3>

            <div class="cd100"></div>
        </div>

        <div class="flex-w flex-c-m p-b-35">
            <a href="https://www.instagram.com/palpod.ugm?igsh=MTIzYm1nbGNyeTlqNw==" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
                <i class="fa fa-instagram"></i>
            </a>

            <a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
                <i class="fa fa-twitter"></i>
            </a>

            <a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
                <i class="fa fa-youtube-play"></i>
            </a>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('cs/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('cs/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('cs/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('cs/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('cs/vendor/countdowntime/flipclock.min.js') }}"></script>
    <script src="{{ asset('cs/vendor/countdowntime/moment.min.js') }}"></script>
    <script src="{{ asset('cs/vendor/countdowntime/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('cs/vendor/countdowntime/moment-timezone-with-data.min.js') }}"></script>
    <script src="{{ asset('cs/vendor/countdowntime/countdowntime.js') }}"></script>
    
    <script>
        $('.cd100').countdown100({
            endtimeYear: 0,
            endtimeMonth: 0,
            endtimeDate: 0,
            endtimeHours: 12,
            endtimeMinutes: 50,
            endtimeSeconds: 15,
            timeZone: "" 
        });
    </script>
    
    <script src="{{ asset('cs/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
