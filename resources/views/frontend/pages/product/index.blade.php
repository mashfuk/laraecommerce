
@extends('frontend.layouts.master')

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
                    <h3>All Products</h3>
                  
                    @include('frontend.pages.product.partials.all_products')
                    
                </div>


            </div>
        </div>
    </div>

</div>


@endsection
{{--End side bar + content--}}