@push('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
<style>
    .fa-star {
            color: lightgoldenrodyellow;
        }
    .card-item {
        transition: background-color 0.3s ease;
        cursor: pointer;
        background-color: transparent !important;
    }
    .card-item:hover  {
        background-color: #001416 !important;
    }

    .hide_mobile {
        display: block;
    }

    .img-fluid2 {
        width: 80px;
        height: 80px;
       margin-end: 20px !important;
    }

    .container-2 {
        padding-left: 16px;
        padding-right: 16px;
    }

    .line-clamp-2{
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
    }

    .width-responsive {
        width: 70%;
    }

    @media (max-width: 768px) {
        .hide_mobile {
            display: none;
        }

        .card-item {
            background-color: #001416 !important;
        }
        .item-pod {
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .img-fluid2 {
            width: 100%;
            height: auto;
        }

        .text-listen {
            font-size: 28px !important;
        }

        .container-2{
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .width-responsive {
            width: 100%;
        }

    }
</style>
@endpush
<x-layouts.app>
    <div class=" p-0 my-4">
        <div class="container-2 d-flex gap-4">
            <div class="hide_mobile" style="width: 30%" >
                <livewire:side-component />
            </div>
            <div class="width-responsive">

            <h1 class="text-white mb-4 text-listen" style="font-size: 40px">Listen all episode Now!</h1>

            <div class="episodes">

                @foreach($episodes as $index => $episode)
                    <a href="{{ route('podcast.detail', $episode['id']) }}" class="card mb-3 card-item rounded" style="border: none !important; border-radius: 24px !important;">
                        <div class="card-body d-flex align-items-center item-pod gap-3">
                            <img src="/img-palpod.png" class="img-fluid2" alt="Episode thumbnail" style="object-fit: cover; border-radius: 12px" class="">
                            <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-secondary">Episode {{ $index + 1 }}</small>
                                    <small class="text-secondary">{{ $episode['published_at'] ? $episode['published_at']->format('d M Y') : '' }}</small>
                                </div>
                                <h5 class="card-title text-white mb-2">{{ $episode['title'] }}</h5>
                                <p class="card-text text-secondary mb-0 line-clamp-2">{{ $episode['description'] }}</p>
                            </div>
                            {{-- <button class="btn btn-custom rounded-circle ms-3" style="width: 48px; height: 48px">
                                <i class="fas fa-play"></i>
                            </button> --}}
                            </div>
                        </div>
                    </a>
                    <hr class="text-secondary">
                @endforeach
            </div>
            </div>
        </div>
    </div>
</x-layouts.app>