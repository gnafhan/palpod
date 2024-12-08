<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
          .fa-star {
            color: lightgoldenrodyellow;
          }
            .checked {
  color: yellow;
}
            /* fieldset {
  border: 0;
  background: #222;
  border-radius: 1px;
  padding: 1em 1.5em 0.9em;
  margin: 1em auto;
} */
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
  font-size:40px;
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
        </style>
    </head>
    <body>
    <div class="d-flex align-items-center text-white rounded-pill px-4 py-2" style="position:fixed; z-index: 2; width: 95%; background-color:teal; margin-top:1rem; transform: translateX(-50%); left: 50%;">
    <img class="rounded-circle" src="https://www.figma.com/file/byUZrI9RxByAqJTLKzEASa/image/13375f406ce6302d02f4ff9782784a973e7a6b49" alt="Logo" class="me-2" style="height: 40px;">
    <h5 class="fw-bold" style="padding-left: 0.25rem; margin-bottom:0">PALPOD</h5>
    </div>
    <div class="container">
    
    {{ $slot }}
    
    </div>
    <footer class="text-white py-3" style="background-color:teal">
    <div class="container d-flex justify-content-between align-items-center" style="margin-top: 1rem; margin-bottom: 1rem;">
      <small class="text-center">
        This website is powered by the Software Engineering Laboratory (Lab RPL) | DTEDI | Sekolah Vokasi | UGM
      </small>
      <div class="d-flex">
        <span class="ms-2 text-white"><img width="20px" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="rounded-circle" alt="..."></span>
        <span class="ms-2 text-white"><img width="20px" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="rounded-circle" alt="..."></span>
        <span class="ms-2 text-white"><img width="20px" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="rounded-circle" alt="..."></span>
      </div>
    </div>
  </footer>
    </body>
</html>
