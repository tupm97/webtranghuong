@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 table-responsive">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>       
                @endif
                @if(session('cart'))
                <table id="cart" class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th >Sản Phẩm</th>
                            <th >Giá</th>
                            <th>Số Lượng</th>
                            <th class="text-center">Thành Tiền</th>
                            <th>Cập Nhật</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>           
                        <?php $total = 0 ?>           
                   
                        @foreach(session('cart') as $id => $details)           
                            <?php $total += $details['price'] * $details['quantity'] ?>          
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs"><img src="{{ Voyager::image( $details['image'] ) }}" width="100" height="100" class="img-fluid"/></div>
                                        <div class="col-sm-9">
                                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                                        </div>
                                    </div><input type="hidden" name="_method" value="PUT">
                                </td>
                                <td data-th="Price">{{ number_format($details['price'],0,',','.') }} VNĐ</td>
                                <td data-th="Quantity">
                                    <input type="number" min="1" max="10" value="{{$details['quantity']  }}" class="form-control quantity" />
                                </td>
                                <td data-th="Subtotal" class="text-center">{{ number_format($details['price'] * $details['quantity'],0,',','.') }} VNĐ</td>
								<input type="hidden" name="_method" value="PATCH">
                                <td class="actions" data-th="">
									<input type="hidden" value="delete" name="_method" />
                                    <button class="btn btn-info  update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                                </td>
                                <td class="actions">
									<input type="hidden" value="delete" name="_method" />
                                    <button class="btn btn-danger remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif            
                    </tbody>                    
                </table>
            </div>
            @if(session('cart'))
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="float-left">
                                <table class="table-sm text-center table-hover">
                                    <tr>
                                        <th>Tên</th>
                                        <th>Số Lượng</th>
                                        <th>Giá</th>
                                    </tr>
                                    @foreach(session('cart') as $id => $details)
                                        <tr >
                                            <td>{{ $details['name'] }}</td>
                                            <td>{{ $details['quantity'] }}</td>
                                            <td>{{ number_format($details['price'],0,',','.') }} VNĐ</td>
                                        </tr>                             
                                    @endforeach
                                </table>
                        </div>
                        
                    </div>
                </div>
                <hr>
                <div>
                        <p class="text-center"><strong>Tổng  {{ number_format($total,0,',','.')}} VNĐ</strong></p>
                </div>
                <hr>
                <div class="row">
                    <div class="float-left">
                        <a href="{{ url('/') }}" class="btn btn-outline-danger"><i class="fa fa-angle-left"></i>Tiếp Tục Mua Hàng</a>
                    </div>
                    <div class="float-right">
                        <p><a href="{{ url('/checkout') }}" class="btn btn-success">Thanh Toán</a></p>
                    </div>
                </div>                          
                               
                
              
            </div>
            @else                     
                 
        </div>
        <div class="row">
               
            <div class="col-sm-12 text-center">
                <Strong>Giỏ Hàng Của Bạn Trống</Strong>
            </div>
        </div>
        @endif 
    </div>    

@endsection

@section('script')

@endsection