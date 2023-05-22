{{-- Được kế thừa header, footer từ layouts/shop (cha) --}}
@extends('layouts.shop')


{{-- Định nghĩa nội dung --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Shop</h1>
                <div class="mt-3 list-product">
                    <div class="row">
                        <h1>Kết quả tìm kiếm</h1>
                        <div class="product-list"></div>
                        {{-- @if($products->count() > 0)
                            <ul>
                                @foreach($products as $product)
                                    <li>{{ $product->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>No results found.</p>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
