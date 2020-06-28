
@extends('layouts.master')

{{--Start side bar + content--}}

@section('content')

<div class="container margin-top-20">

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">First item</a>
                    <a href="#" class="list-group-item list-group-item-action">Second item</a>
                    <a href="#" class="list-group-item list-group-item-action">Third item</a>
                </div>

            </div>
            <div class="col-md-8">

                <div class="widget">
                    <h3>Feature Products</h3>
                    <div class="row">
                        <div class="col-md-3 margin-top-20">
                            <div class="card" >
                                <img class="card-img-top feature-image" src="{{asset('images/products/'.'iphone.png')}}" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title">Iphone</h4>
                                    <p class="card-text">10000 Taka</p>
                                    <a href="#" class="btn btn-outline-warning">Add To Cart</a>
                                </div>
                            </div>   
                        </div>

                        <div class="col-md-3 margin-top-20">
                            <div class="card" >
                                <img class="card-img-top feature-image" src="{{asset('images/products/'.'iphone.png')}}" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title">Iphone</h4>
                                    <p class="card-text">10000 Taka</p>
                                    <a href="#" class="btn btn-outline-warning">Add To Cart</a>
                                </div>
                            </div>   
                        </div>

                        <div class="col-md-3 margin-top-20">
                            <div class="card" >
                                <img class="card-img-top feature-image" src="{{asset('images/products/'.'iphone.png')}}" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title">Iphone</h4>
                                    <p class="card-text">10000 Taka</p>
                                    <a href="#" class="btn btn-outline-warning">Add To Cart</a>
                                </div>
                            </div>   
                        </div>

                        <div class="col-md-3 margin-top-20">
                            <div class="card" >
                                <img class="card-img-top feature-image" src="{{asset('images/products/'.'iphone.png')}}" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title">Iphone</h4>
                                    <p class="card-text">10000 Taka</p>
                                    <a href="#" class="btn btn-outline-warning">Add To Cart</a>
                                </div>
                            </div>   
                        </div>

                        <div class="col-md-3 margin-top-20">
                            <div class="card" >
                                <img class="card-img-top feature-image" src="{{asset('images/products/'.'iphone.png')}}" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title">Iphone</h4>
                                    <p class="card-text">10000 Taka</p>
                                    <a href="#" class="btn btn-outline-warning">Add To Cart</a>
                                </div>
                            </div>   
                        </div>

                        <div class="col-md-3 margin-top-20">
                            <div class="card" >
                                <img class="card-img-top feature-image" src="{{asset('images/products/'.'iphone.png')}}" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title">Iphone</h4>
                                    <p class="card-text">10000 Taka</p>
                                    <a href="#" class="btn btn-outline-warning">Add To Cart</a>
                                </div>
                            </div>   
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>


@endsection
{{--End side bar + content--}}