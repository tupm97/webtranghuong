@extends('master')

@section('title', 'Product')

@section('content')

    <div class="container products">

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <div class="row">
            <div class="col-sm-12 row">
                @foreach($products as $product)
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="{{ Voyager::image( $product->image ) }}" class="img-fluid">                     
                        <div class="caption">
                            <h4>{{ $product->name}}</h4>
                            <p></p>
                            <p><strong>Price: </strong> {{ $product->price }}$</p>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="col-sm-12">
                <ul class="pagination justify-content-end">
                    @if($products->currentPage()!=1)
                        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                    @endif
                    @for ($i=1;$i<=$products->lastPage();$i++)
                        <li class="page-item {{$products->currentPage()==$i? 'active': ''}}"><a class="page-link" href="#">{{$i}}</a></li>
                    @endfor
                    @if($products->currentPage()!=$products->lastPage())
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    @endif
                </ul>
            </div>           
        </div><!-- End row -->

    </div>

@endsection