@extends('layouts.master')

@section('content')
    @include('partials._navbar')
       <div class="featured container no-gutter my-5">  
          <div class="row posts ">
            @foreach ($produits as $produit)
              <div id="1" class="item new col-md-3 my-5">
                <a href="single-product.html">
                  <div class="featured-item">
                    <img src="
                    /storage/product_images/{{$produit->product_image}}" alt="">
                    <div class="content">
                      <h4>{{ $produit->product_name }}</h4>
                      <h6>{{ $produit->product_price }} DA</h6>

                  </div>
                  </div>
                </a>
              </div>
             @endforeach

          </div>
          <div class="d-flex justify-content-center">
            {!! $produits->links() !!}
        </div>
        
      </div>
    @include('partials._footer')

@endsection
