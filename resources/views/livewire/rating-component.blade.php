<?php
function timeAgo($time, $short = false){ 
  $SECOND = 1; 
  $MINUTE = 60 * $SECOND; 
  $HOUR = 60 * $MINUTE; 
  $DAY = 24 * $HOUR; 
  $MONTH = 30 * $DAY; 
  $before = time() - $time; 

  if($before < 0){ 
      return "not yet"; 
  } 

  if($short){ 
      if($before < 1 * $MINUTE){ 
          return ($before <5) ? "just now" : $before . " ago"; 
      } 

      if($before < 2 * $MINUTE){ 
          return "1m ago"; 
      } 

      if($before < 45 * $MINUTE){ 
          return floor($before / 60) . "m ago"; 
      } 

      if($before < 90 * $MINUTE){ 
          return "1h ago"; 
      } 

      if($before < 24 * $HOUR){ 
          return floor($before / 60 / 60). "h ago"; 
      } 

      if($before < 48 * $HOUR){ 
          return "1d ago"; 
      } 

      if($before < 30 * $DAY){ 
          return floor($before / 60 / 60 / 24) . "d ago"; 
      } 

      if($before < 12 * $MONTH){ 
          $months = floor($before / 60 / 60 / 24 / 30); 
          return $months <= 1 ? "1mo ago" : $months . "mo ago"; 
      }else{ 
          $years = floor  ($before / 60 / 60 / 24 / 30 / 12); 
          return $years <= 1 ? "1y ago" : $years."y ago"; 
      } 
  } 

  if($before < 1 * $MINUTE){ 
      return ($before <= 1) ? "just now" : $before . " seconds ago"; 
  } 

  if($before < 2 * $MINUTE){ 
      return "a minute ago"; 
  } 

  if($before < 45 * $MINUTE){ 
      return floor($before / 60) . " minutes ago"; 
  } 

  if($before < 90 * $MINUTE){ 
      return "an hour ago"; 
  } 

  if($before < 24 * $HOUR){ 
      return (floor($before / 60 / 60) == 1 ? 'about an hour' : floor($before / 60 / 60).' hours'). " ago"; 
  } 

  if($before < 48 * $HOUR){ 
      return "yesterday"; 
  } 

  if($before < 30 * $DAY){ 
      return floor($before / 60 / 60 / 24) . " days ago"; 
  } 

  if($before < 12 * $MONTH){ 
      $months = floor($before / 60 / 60 / 24 / 30); 
      return $months <= 1 ? "one month ago" : $months . " months ago"; 
  }else{ 
      $years = floor  ($before / 60 / 60 / 24 / 30 / 12); 
      return $years <= 1 ? "one year ago" : $years." years ago"; 
  } 

  return "$time"; 
}
?>


</style>
<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="modal show" tabindex="-1" role="dialog" style="display: block; --bs-modal-width: 800px; position: relative; z-index: 0; padding-top: 3rem;" >
  <div class="modal-dialog">
    <div class="modal-content mb-3 shadow rounded" style="border: none !important;">
      
    <form wire:submit="store">
      
      <div class="modal-body">
        <div class="mb-3"><iframe style="border-radius:12px" src="https://open.spotify.com/embed/show/{{$spotify->link}}?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe></div>
      @if (session()->has('success'))
    <div class="alert alert-success"style="width: 100%;" role="alert">
    {{session('success')}}
    </div>
    @endif
    <div class="d-flex justify-content-between">
    <!-- <label for="rating" class="form-label"></label> -->
    
<label class="form-label" ><h5>Leave a Review</h5></label>

          <div class="card-title" style="display: inline-block">
            <span>{{$rate}}</span>
        <span class="fa fa-star {{$rate >=0.5 ? 'checked' : ''}}"></span>
<span class="fa fa-star {{$rate >=1.5 ? 'checked' : ''}}"></span>
<span class="fa fa-star {{$rate >=2.5 ? 'checked' : ''}}"></span>
<span class="fa fa-star {{$rate >=3.5 ? 'checked' : ''}}"></span>
<span class="fa fa-star {{$rate >=4.5 ? 'checked' : ''}}"></span>
        </div>
    </div>
    <div class="mb-3" style="display:flex;align-items : center;">

    <label class="form-label">Your Rating </label>
    <fieldset style="display: inline-block;">
  <span class="star-cb-group" id="rating">
    <input type="radio" id="rating-5" wire:model="rating" name="rating" value="5" required/><label for="rating-5">5</label>
    <input type="radio" id="rating-4" wire:model="rating" name="rating" value="4" required/><label for="rating-4">4</label>
    <input type="radio" id="rating-3" wire:model="rating" name="rating" value="3" required/><label for="rating-3">3</label>
    <input type="radio" id="rating-2" wire:model="rating" name="rating" value="2" required/><label for="rating-2">2</label>
    <input type="radio" id="rating-1" wire:model="rating" name="rating" value="1" required/><label for="rating-1">1</label>
  </span>
</fieldset>
    </div>
    <div class="mb-3">
    <input type="text" class="form-control" wire:model="name" id="name" placeholder="Name" required>
    </div>
    
    <div class="mb-3">
    <textarea class="form-control" id="comment" rows="3" wire:model="comment"  placeholder="Leave your Review" required></textarea>
    </div>
    
    <div class="mb-3" style="display:flex;">
    <button type="submit" class="btn btn-outline-success" style="margin-left: auto;"><i class="fa fa-send"></i> Post</button>
    </div>
    
      </div>
      
    </form>
    
    </div>
    @if ($ratings)
        @foreach ($ratings as $rating)
        <div class="">
        <div class="card mb-3 shadow rounded" style="border: none !important; max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-1">
      <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" style="margin: 0.5rem;" class="img-fluid rounded-circle" alt="...">
    </div>
    <div class="col-md-11">
      <div class="card-body">
        <div class="card-title mb-2 d-flex justify-content-between" style="margin-top: 0.5rem;">
        <h6>{{$rating->name}}</h6>
        <div>
        <span class="fa fa-star {{$rating->rating>=1 ? 'checked' : ''}}"></span>
<span class="fa fa-star {{$rating->rating>=2 ? 'checked' : ''}}"></span>
<span class="fa fa-star {{$rating->rating>=3 ? 'checked' : ''}}"></span>
<span class="fa fa-star {{$rating->rating>=4 ? 'checked' : ''}}"></span>
<span class="fa fa-star {{$rating->rating>=5 ? 'checked' : ''}}"></span>
        </div>
        </div>
        <div class="card-text mb-3">{{$rating->comment}}</div>
        
        <div class="card-text"><small class="text-body-secondary">{{timeago(strtotime($rating->created_at))}}</small></div>
      </div>
    </div>
  </div>
</div>
</div>
        @endforeach
    @endif
      
  </div>
  
</div>
        
    
    
</div>

