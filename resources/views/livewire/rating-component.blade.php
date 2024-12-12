<?php
function timeAgo($time, $short = false)
{
    $SECOND = 1;
    $MINUTE = 60 * $SECOND;
    $HOUR = 60 * $MINUTE;
    $DAY = 24 * $HOUR;
    $MONTH = 30 * $DAY;
    $before = time() - $time;

    if ($before < 0) {
        return "not yet";
    }

    if ($short) {
        if ($before < 1 * $MINUTE) {
            return $before < 5 ? "just now" : $before . " ago";
        }

        if ($before < 2 * $MINUTE) {
            return "1m ago";
        }

        if ($before < 45 * $MINUTE) {
            return floor($before / 60) . "m ago";
        }

        if ($before < 90 * $MINUTE) {
            return "1h ago";
        }

        if ($before < 24 * $HOUR) {
            return floor($before / 60 / 60) . "h ago";
        }

        if ($before < 48 * $HOUR) {
            return "1d ago";
        }

        if ($before < 30 * $DAY) {
            return floor($before / 60 / 60 / 24) . "d ago";
        }

        if ($before < 12 * $MONTH) {
            $months = floor($before / 60 / 60 / 24 / 30);
            return $months <= 1 ? "1mo ago" : $months . "mo ago";
        } else {
            $years = floor($before / 60 / 60 / 24 / 30 / 12);
            return $years <= 1 ? "1y ago" : $years . "y ago";
        }
    }

    if ($before < 1 * $MINUTE) {
        return $before <= 1 ? "just now" : $before . " seconds ago";
    }

    if ($before < 2 * $MINUTE) {
        return "a minute ago";
    }

    if ($before < 45 * $MINUTE) {
        return floor($before / 60) . " minutes ago";
    }

    if ($before < 90 * $MINUTE) {
        return "an hour ago";
    }

    if ($before < 24 * $HOUR) {
        return (floor($before / 60 / 60) == 1
            ? "about an hour"
            : floor($before / 60 / 60) . " hours") . " ago";
    }

    if ($before < 48 * $HOUR) {
        return "yesterday";
    }

    if ($before < 30 * $DAY) {
        return floor($before / 60 / 60 / 24) . " days ago";
    }

    if ($before < 12 * $MONTH) {
        $months = floor($before / 60 / 60 / 24 / 30);
        return $months <= 1 ? "one month ago" : $months . " months ago";
    } else {
        $years = floor($before / 60 / 60 / 24 / 30 / 12);
        return $years <= 1 ? "one year ago" : $years . " years ago";
    }

    return "$time";
} ?>

<div>
    <div class="modal show" tabindex="-1" role="dialog" style="display: block; --bs-modal-width: 800px; position: relative; z-index: 0;">
        <div class="modal-dialog" style="" >
            <div class="modal-content mb-3 shadow rounded" style="border: none !important; border-radius: 24px !important">
                <form wire:submit="store">
                    <iframe style="border-radius:28px" src="https://open.spotify.com/embed/episode/{{$spotify->link}}?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    <div class="modal-body">
                        @if (session()->has('success'))
                        <div class="alert alert-success" style="width: 100%;" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="d-flex justify-content-between">
                            <label class="form-label" style=""><h5 style="font-weight: 700">Leave a Review</h5></label>
                            <div class="card-title" style="display: inline-block">
                                <span>{{$rate}}</span>
                            <span class="fa fa-star {{$rate >=0.5 ? 'checked' : ''}}"></span>
                    <span class="fa fa-star {{$rate >=1.5 ? 'checked' : ''}}"></span>
                    <span class="fa fa-star {{$rate >=2.5 ? 'checked' : ''}}"></span>
                    <span class="fa fa-star {{$rate >=3.5 ? 'checked' : ''}}"></span>
                    <span class="fa fa-star {{$rate >=4.5 ? 'checked' : ''}}"></span>
                            </div>
                        </div>
                        <div class="mb-1" style="display:flex;align-items : center;">
                            <label class="form-label" style="margin-right: 10px; font-size: 16px">Your Rating </label>
                            <fieldset style="display: inline-block;">
                                <span class="star-cb-group" id="rating">
                                    <input type="radio" id="rating-5" wire:model="rating" name="rating" value="5" required /><label for="rating-5">5</label>
                                    <input type="radio" id="rating-4" wire:model="rating" name="rating" value="4" required /><label for="rating-4">4</label>
                                    <input type="radio" id="rating-3" wire:model="rating" name="rating" value="3" required /><label for="rating-3">3</label>
                                    <input type="radio" id="rating-2" wire:model="rating" name="rating" value="2" required /><label for="rating-2">2</label>
                                    <input type="radio" id="rating-1" wire:model="rating" name="rating" value="1" required /><label for="rating-1">1</label>
                                </span>
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <input type="text" style="border: 2px solid #155458; border-radius: 20px" class="form-control" wire:model="name" id="name" placeholder="Name" required>
                        </div>
                        <div class="mb-3">
                            <textarea style="border: 2px solid #155458; border-radius: 20px" class="form-control" id="comment" rows="3" wire:model="comment" placeholder="Leave your Review" required></textarea>
                        </div>
                        <div class="mb-3" style="display:flex;">
                            <button type="submit" class="btn btn-custom px-3" style="margin-left: auto;border-radius:25px;border: none !important;  font-weight: 600"><i class="fa fa-send"></i> Post</button>
                        </div>
                    </div>
                </form>
            </div>
            @if ($ratings)
            @foreach ($ratings as $key => $rating)
            <div class="">
                <div class="modal-content card mb-3 shadow" style="border: none !important; max-width: 100%; border-radius: 30px">
                    <div class="row g-0">
                        <div class="col-1 d-flex justify-content-end align-items-start" style="margin-top: 16px">
                            <img src="/avatar.png" style=" width: 50px" class="img-fluid rounded-circle" alt="...">
                        </div>
                        <div class="col-11">
                            <div class="card-body">
                                <div class="card-title mb-2 d-flex justify-content-between" style="margin-top: 0.5rem;">
                                    <h6>{{ $rating->name }}</h6>
                                    <div>
                                        <span class="fa fa-star {{ $rating->rating >= 1 ? 'checked' : '' }}"></span>
                                        <span class="fa fa-star {{ $rating->rating >= 2 ? 'checked' : '' }}"></span>
                                        <span class="fa fa-star {{ $rating->rating >= 3 ? 'checked' : '' }}"></span>
                                        <span class="fa fa-star {{ $rating->rating >= 4 ? 'checked' : '' }}"></span>
                                        <span class="fa fa-star {{ $rating->rating >= 5 ? 'checked' : '' }}"></span>
                                    </div>
                                </div>
                                <div class="card-text mb-3">{{ $rating->comment }}</div>
                                <div class="d-flex align-items-center">
                                    <div id="ic-thumb{{ $rating->id }}" style="cursor: pointer;" class="likes {{ $rating->isLiked ? 'text-c-primary' : '' }}">
                                      <i class="fa fa-thumbs-up"></i>
                                      <span>{{ $rating->countLikes }} likes</span>
                                    </div>
                                    <div id="ic-thumb-down{{ $rating->id }}" style="cursor: pointer; margin-left: 10px" class="likes {{ $rating->isDisliked ? 'text-c-primary' : '' }}">
                                      <i class="fa fa-thumbs-down"></i>
                                    </div>
                                    <!-- <div style="cursor: pointer; margin-left: 10px" class="likes">
                                        <span>Reply</span>
                                    </div> -->
                                </div>
                                <!-- <div class="mt-3">
                                    <div style="border: 2px solid #155458; border-radius: 28px; padding: 10px 12px 10px 12px" class="d-flex align-items-center justify-content-center">
                                        <input type="text" style="border: none !important; border-radius: 20px" class="form-control form-control-sm" placeholder="Write a reply..." />
                                        <div style="display:flex; flex-direction: row;">
                                            <button type="submit" class="btn btn-sm btn-custom px-3 py-2 d-flex align-items-center" style="margin-left: auto;border-radius:25px;border: none !important;  font-weight: 600"><i class="fa fa-send me-2"></i> Reply</button>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @push('script')
            <script>
                const iconThumb{{$rating->id}} = document.getElementById('ic-thumb' + '{{ $rating->id }}');
                iconThumb{{$rating->id}}.addEventListener('click', () => {

                    @this.call('like', '{{ $rating->id }}');
                });

                const iconThumbDown{{$rating->id}} = document.getElementById('ic-thumb-down' + '{{ $rating->id }}');
                iconThumbDown{{$rating->id}}.addEventListener('click', () => {
                    @this.call('dislike', '{{ $rating->id }}');
                });
            </script>

            @endpush
            @endforeach
            @endif
        </div>
    </div>
</div>
