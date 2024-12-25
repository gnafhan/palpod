<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'PALPOD' }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <style>
          .fa-star {
            color: lightgoldenrodyellow;
          }
            .checked {
  color: yellow;
}
            .star-cb-group {
  /* remove inline-block whitespace */
  font-size: 0;
  /* flip the order so we can use the + and ~ combinators */
  unicode-bidi: bidi-override;
  direction: rtl;
  /* the hidden clearer */
}
.star-cb-group * {
  font-size: 1rem;
}
.star-cb-group > input {
  display: none;
}
.star-cb-group > input + label {
  /* only enough room for the star */
  display: inline-block;
  overflow: hidden;
  text-indent: 9999px;
  width: 1em;
  white-space: nowrap;
  cursor: pointer;
  font-size:20px;
}
.star-cb-group > input + label:before {
  display: inline-block;
  text-indent: -9999px;
  content: "☆";
  color: yellow;
}
.star-cb-group > input:checked ~ label:before, .star-cb-group > input + label:hover ~ label:before, .star-cb-group > input + label:hover:before {
  content: "★";
  color: yellow;
  text-shadow: 0 0 1px #333;
}
.star-cb-group > .star-cb-clear + label {
  text-indent: -9999px;
  width: .5em;
  margin-left: -.5em;
}
.star-cb-group > .star-cb-clear + label:before {
  width: .5em;
}
.star-cb-group:hover > input + label:before {
  content: "☆";
  color: yellow;
  text-shadow: none;
}
.star-cb-group:hover > input + label:hover ~ label:before, .star-cb-group:hover > input + label:hover:before {
  content: "★";
  color: yellow;
  text-shadow: 0 0 1px #333;
}

.btn-custom {
  background: linear-gradient(90.54deg, #51B2B8 0.47%, #155458 98.93%);
  color: white;
  font-weight: 600;
}

.btn-custom:hover {
    opacity: 0.8;
    color: white;
}

body{
  font-family: "Montserrat", sans-serif;
  font-optical-sizing: auto;
  font-weight: 400;
  font-style: normal;
}

.tweet {
  display: flex;
  align-items: flex-start;
  background-color: #f5f5f5;
  padding: 16px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.profile-img {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  overflow: hidden;
  margin-right: 16px;
}

.profile-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.username {
  font-weight: bold;
  margin-bottom: 8px;
}

.text {
  margin-bottom: 16px;
}

.engagement {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 14px;
  color: #666;
}

.likes {
  display: flex;
  align-items: center;
}

.likes i {
  margin-right: 4px;
}

.rating {
  display: flex;
  justify-content: flex-end;
  color: #ffd700;
  font-size: 20px;
}

.text-c-primary {
    color: #51B2B8;
}

.form-control:focus {
    box-shadow: none !important;
}


        </style>

    </head>
    <body>
    <div class="d-flex align-items-center text-white rounded-pill px-4 mt-3" style="position:relative; height: 80px; z-index: 2; width: 95%; background: linear-gradient(131.03deg, #51B2B8 -69.42%, #244F52 266.05%); top: 2%; transform: translateX(-50%); left: 50%;">
    <img class="rounded-circle" src="/logo.png" alt="Logo" class="me-4" style="height: 60px;">
    <h5 class="fw-bold fs-2" style="padding-left: 0.25rem; margin-bottom:0">PALPOD</h5>
    </div>
    <div class="container">

    {{ $slot }}

    </div>
    <footer class="text-white py-5" style="background: linear-gradient(94.04deg, #51B2B8 -12.98%, #244F52 114.69%)">
    <div class="container d-flex justify-content-between align-items-center" style="">
      <small class="text-center montserrat-font" style:"font-family: 'Montserrat'">
        This website is powered by the Software Engineering Laboratory (Lab RPL) | DTEDI | Sekolah Vokasi | UGM
      </small>
      <div class="d-flex">
        <span class="ms-2 text-white"><img width="20px" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="rounded-circle" alt="..."></span>
        <span class="ms-2 text-white"><img width="20px" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="rounded-circle" alt="..."></span>
        <span class="ms-2 text-white"><img width="20px" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="rounded-circle" alt="..."></span>
      </div>
    </div>
  </footer>
  @stack('script')
    </body>

</html>
