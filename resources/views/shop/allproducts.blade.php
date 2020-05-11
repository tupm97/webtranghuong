@extends('master')
@section('content')
    <div class="container">   
        <div class="row">
            <div class="col-sm-3">       
                <div class="card card-filter">
                    <div class="card-title center"><strong class="font-weight-bold">Lọc Sản Phẩm</strong> </div>
                    <article class="card-group-item">
                        <header class="card-header">
                            <a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse22">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">Danh Mục</h6>
                            </a>
                        </header>
                        <div style="" class="filter-content collapse show" id="collapse22">
                            <div class="card-body">
                                    <form class="pb-3" action="{{url('/product/search')}}" method="POST">
                                        <div class="input-group">
                                        <input class="form-control" placeholder="Search" type="text" name="search">
                                            {{ csrf_field() }}
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                        </div>
                                        </form>
                
                                <ul class="list-unstyled list-lg">
                                        @foreach ($data['categories'] as $category) 
                                            @php
                                                $count=0;
                                            @endphp
                                            @foreach ($data['products'] as $product)
                                                @if($product->category_id==$category->id)
                                                    @php
                                                        $count++;
                                                    @endphp
                                                @endif
                                            @endforeach 
                                <li><a href="{{url('product/filter/'.$category->id)}}">{{$category->name}}<span class="float-right badge badge-light round">{{$count}}</span> </a></li>
                                       
                                        @endforeach
                                </ul>  
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse .// -->
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse33">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">Mức Giá</h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse33">
                            <div class="card-body">
                                <form action="product" method="POST" class="form-group">
                                <input type="range" 
                                class="custom-range" 
                                min="1" max="2000" 
                                name="inputRange" 
                                value="0"
                                id="inputRangeId"
                                oninput="outputRangeID.value=this.value*10000">                              
                                
                                <label>Giá Trị</label>
                                    <output class="form-control" 
                                        placeholder="0 VNĐ" 
                                        type="number" 
                                        name="outputRange" 
                                        min="0" 
                                        max="20000000" 
                                        step="10000"
                                        value="0"
                                        id="outputRangeID"
                                        oninput="inputRangeId.value/10000=this.value"
                                    ></output>  
                                    {{ csrf_field() }}   
                                    <input type="hidden" name="filterPrice" value="0">
                                    <input type="submit" class="btn btn-block btn-outline-primary" value="Lọc">                                                   
                                </form> <!-- form-row.// -->
                                
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse .// -->
                    </article> <!-- card-group-item.// -->
                </div>        
            </div> 
            <div class="col-sm-9">
                    <div class="row">
                            @foreach ($products as $product)                   
                            <div class="col-md-4">
                                <figure class="card card-product active">
                                    
                                    @if(Carbon\Carbon::now()->diffIndays($product->created_at)<=7 )
                                        <span class="badge-new"> Mới </span>
                                    @endif
                                    @if($product->sale>0)
                                        <span class="badge-offer"><b> -{{$product->sale}}%</b></span>
                                    @endif                                                                 
                                    <div class="img-wrap"> 
                                        <img src="{{ Voyager::image($product->image)}}">
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
                            </div><!-- col // -->     
                            @endforeach
                    </div>
            </div> 
        </div>   
    </div>
@endsection
