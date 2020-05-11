@extends('master')
@section('content')
<section class="section-content">
    <div class="container">
        @foreach ($categories as $category)
                @foreach ($products as $product)
                @if($product->category_id==$category->id)
                <header class="section-heading ">
                    <h4 class="title-section  text-danger">{{ $category->name}}</h4>
                </header>
                <hr>
                @break
            @endif
                @endforeach
                
            <div class="row">
                @php
                    $dem=0;
                @endphp
                @foreach ($products as $product)
                    @if($product->category_id==$category->id&&$dem<4)
                        @if($product)
                        <div class="col-md-3">
                            <figure class="card card-product active">
                                
                                @if(Carbon\Carbon::now()->diffIndays($product->created_at)<=7 )
                                    <span class="badge-new"> Mới </span>
                                @endif
                                @if($product->sale>0)
                                    <span class="badge-offer"><b> -{{$product->sale}}%</b></span>
                                @endif                                                                 
                                <div class="img-wrap"> 
                                    <a href="{{url('product/'.$product->id)}}"><img src="{{ Voyager::image($product->image)}}"></a>
                                    <a class="btn-overlay" href="{{url('product/'.$product->id)}}"><i class="fa fa-search-plus"></i> Chi Tiết</a>
                                </div>
                                <figcaption class="info-wrap">
                                    <h6 class="title text-center"><a href="{{url('product/'.$product->id)}}">{{$product->name}}</a></h6>
                                    
                                    <div class="price-wrap">
                                        <a href="{{ url('add-to-cart/'.$product->id) }}" class="float-right" data-toggle="tooltip" data-placement="top" title="Mua"><i class="fas fa-shopping-cart mr-3"></i></a>
                                        @if($product->sale==0)
                                            <span class="price-new font-weight-bold">{{ number_format($product->price,0,',','.')}} VNĐ</span>
                                        @else
                                            <span class="price-new text-danger font-weight-bold">{{ number_format($product->price-$product->price*$product->sale/100,0,',','.')}} VNĐ</span>
                                            <del class="price-old font-weight-bold">{{ number_format($product->price,0,',','.')}} VNĐ</del>
                                        @endif
                                        
                                    </div> <!-- price-wrap.// -->
                                    
                                </figcaption>
                            </figure> <!-- card // -->
                        </div> <!-- col // -->
                        @endif
                        @php
                            $dem++;
                        @endphp
                    @endif
                @endforeach
            </div>           
        @endforeach   
                   
    </div>
</section>

@endsection