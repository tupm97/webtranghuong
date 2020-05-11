@extends('master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <img class="img-fluid text-center" max-height=300 src="{{ Voyager::image($product->image)}}" alt="san pham {{$product->name}}">
                             
            </div>
            <div class="col-sm-7">
                <div class="card-body border">
                    <h3 class="title mb-3">{{ $product->name}}</h3>                                   
                    @if($product->sale==0)
                        <span class="price-new font-weight-bold">Giá:{{ number_format($product->price,0,',','.')}}VNĐ</span>
                    @else
                        <span class="price-new text-danger font-weight-bold"> Giá:{{ number_format($product->price-$product->price*$product->sale/100,0,',','.')}} VNĐ</span>
                        <del class="price-old font-weight-bold">{{ number_format($product->price,0,',','.')}} VNĐ</del>
                    @endif          
                    <div class="rating-wrap">   
                        <ul class="rating-stars">
                            <li style="width:80%" class="stars-active"> 
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                            </li>
                            <li>
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                            </li>
                        </ul>
                        <div class="label-rating">{{$product->views}} lượt xem</div>
                        <div class="label-rating">{{$product->sold}} đã bán</div>
                    </div>
                    <div class="card-text font-weight-bold">
                        <hr>
                        <p><span>Mã Sản Phẩm:   {{$product->code}}</span></p>
                        <p>      Giao Hàng  :   <span class="text-primary">{{$product->shipment}}</span></p>
                        <p><span>Bảo Hành   :   {{$product->guarantee}}</span></p>
                        <p><span>Xuất Xứ    :   {{$product->origin}}</span></p>                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#chitietsanpham">Chi Tiết Sản Phẩm</a>
                                </li>                          
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="chitietsanpham">
                                    {!! $product->description !!}
                                </div>                            
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="text-center">
                        <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn  btn-outline-danger">Thêm Vào Giỏ Hàng</a>
                    </div>
                   
                </div>
            </div>
        </div>
        
    </div>

@endsection