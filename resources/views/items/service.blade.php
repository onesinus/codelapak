  <!-- Services Section -->
  <style>
    .sameWidthHeight {
      max-width:230px;
      max-height:100px;
      width: auto;
      height: auto;
    }
  </style>
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">Applications of the Month</h2>
      <hr class="divider my-4">
      <div class="row">
        @foreach($bestApps as $ba)
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <?php
              $ProductImg = asset('public/img/products/'.$ba->filename.'');
            ?>
            <img src="{{ $ProductImg }}" class="sameWidthHeight" alt="Application Image">
            <h3 class="h4 mb-2">{{$ba->category}}</h3>
            <p class="text-muted mb-0">{{$ba->name}}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>