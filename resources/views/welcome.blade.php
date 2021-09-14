@extends('layouts.master')
@section('content')

    @include('partials._navbar')

    <div class="banner ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="caption">
                        <h2>Ecommerce HTML Template</h2>
                        <div class="line-dec"></div>
                        <p>Pixie HTML Template can be converted into your desired CMS theme. Total <strong>5 pages</strong>
                            included. You can use this Bootstrap v4.1.3 layout for any CMS.
                            <br><br>Please tell your friends about <a rel="nofollow"
                                href="https://www.facebook.com/tooplate/">Tooplate</a> free template site. Thank you. Photo
                            credit goes to <a rel="nofollow" href="https://www.pexels.com">Pexels website</a>.
                        </p>
                        <div class="main-button">
                            <a href="#">Order Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="featured-items">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h1>Nouveautés</h1>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @foreach ($produits as $produit)

                            <a href="#">
                                <div class="featured-item">
                                    <img src="
                                    /storage/product_images/{{ $produit->product_image }}" alt="Item 1">
                                    <div class="content">
                                        <h4>{{ $produit->product_name }}</h4>
                                        <h6>{{ $produit->product_price }} DA</h6>

                                    </div>
                             
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials._footer')

@endsection
