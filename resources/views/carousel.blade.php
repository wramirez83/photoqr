<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @foreach ($photos as $photo)
        @if($init == 0)
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$init}}" class="active" aria-current="true" aria-label="Slide {{$init}}"></button>
          @else
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$init}}" aria-label="Slide {{$init}}"></button>
        @endif
        <?php $init++?>
      @endforeach
    </div>
    <div class="carousel-inner">
      <?php $init = 0?>
      @foreach ($photos as $photo)
        @if($init == 0)
          <div class="carousel-item active">
            <img src="{{ asset('storage/img/'. $photo->url) }}" class="d-block w-100" alt="{{$photo->author}}">
            <div class="carousel-caption d-none d-md-block bg-dark" style="--bs-bg-opacity: .5;">
              <h5>{{$photo->author}}</h5>
              <p>{{$photo->description}}</p>
            </div>
          </div>
          @else
          <div class="carousel-item">
            <img src="{{ asset('storage/img/'. $photo->url) }}" class="d-block w-100" alt="{{$photo->author}}">
            <div class="carousel-caption d-none d-md-block bg-dark" style="--bs-bg-opacity: .5;">
              <h5>{{$photo->author}}</h5>
              <p>{{$photo->description}}</p>
            </div>
          </div>
        @endif
        
        
        <?php $init++?>
      @endforeach
      
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  
  <script>

})
  </script>