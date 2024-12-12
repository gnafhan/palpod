<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Countdown</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/bg-countdown.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .countdown-container {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            max-width: 800px;
            width: 90%;
        }

        .title {
            color: #fff;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 4px;
            font-weight: 300;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .countdown-item {
            text-align: center;
            min-width: 100px;
        }

        .countdown-number {
            font-size: 3.5rem;
            font-weight: bold;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 0.5rem;
        }

        .countdown-label {
            color: #fff;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        @media (max-width: 768px) {
            .countdown {
                flex-wrap: wrap;
                gap: 1rem;
            }

            .countdown-item {
                min-width: 80px;
            }

            .countdown-number {
                font-size: 2.5rem;
            }

            .title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="countdown-container">
        <h1 class="title">Coming Soon</h1>
        <div class="countdown">
            <div class="countdown-item">
                <div class="countdown-number" id="days">00</div>
                <div class="countdown-label">Days</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="hours">00</div>
                <div class="countdown-label">Hours</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="minutes">00</div>
                <div class="countdown-label">Minutes</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="seconds">00</div>
                <div class="countdown-label">Seconds</div>
            </div>
        </div>
    </div>

    <script>
        // Set the date we're counting down to 13-12-2024 00:00:00
        const countDownDate = new Date("Dec 13, 2024 18:00:00").getTime();

        // Update the countdown every 1 second
        const countdown = setInterval(function() {
            const now = new Date().getTime();
            const distance = countDownDate - now;

            // Calculate days, hours, minutes and seconds
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the results
            document.getElementById("days").textContent = String(days).padStart(2, '0');
            document.getElementById("hours").textContent = String(hours).padStart(2, '0');
            document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
            document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');

            // If the countdown is finished, clear the interval
            if (distance < 0) {
                clearInterval(countdown);
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
</body>
</html>