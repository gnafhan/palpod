<div class="podcast-card  text-white p-4" style="border-radius: 24px; height: 100vh; margin-bottom: 20px">
    <div class="row">
        <div class="col-12">
            <img src="/img-palpod.png" alt="Podcast Cover" class="img-fluid mb-4" style="width: 100%; border-radius: 16px;">
            
            <h2 class="mb-3" style="font-size: 30px">{{ $title }}</h2>
            
            {{-- <p class="text-muted mb-2">with {{ $authors }}</p> --}}
            
            <p class="mb-4">{{ $description }}</p>
            
            <div class="d-flex align-items-center mb-4">
                <span class="me-2">{{ $date }}</span>
                <div class="d-flex align-items-center">
                    <span class="me-2">{{ $rating }}</span>
                    @for($i = 0; $i < 5; $i++)
                        <i class="fa fa-star text-warning"></i>
                    @endfor
                </div>
            </div>
            
            <a href="#" class="text-info text-decoration-none">View Review</a>
            
            {{-- <div class="d-flex justify-content-between mt-4">
                <div class="d-flex gap-3">
                    <button class="btn btn-dark rounded-circle" style="width: 48px; height: 48px;">
                        <i class="fas fa-comment"></i>
                    </button>
                    <button class="btn btn-dark rounded-circle" style="width: 48px; height: 48px;">
                        <i class="fas fa-share-alt"></i>
                    </button>
                </div>
                <button class="btn btn-info rounded-circle" style="width: 48px; height: 48px;">
                    <i class="fas fa-pause"></i>
                </button>
            </div> --}}
        </div>
    </div>

    <style>
        .podcast-card {
            border-radius: 40px;
            background: #001416;
        }
        .btn-dark {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
        }
        .btn-dark:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .btn-info {
            background-color: #00B4D8;
            border: none;
            color: white;
        }
        .btn-info:hover {
            background-color: #0096c7;
            color: white;
        }
    </style>
</div>