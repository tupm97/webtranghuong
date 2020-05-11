@extends('master')

@section('content')
@if(session('cart'))
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>       
                @endif
                    <?php $total = 0 ?>                        
                        <div class="center">
                                <table class="table table-bordered text-center table-hover">
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
                                        <?php $total += $details['price'] * $details['quantity'] ?>                              
                                    @endforeach
                                </table>
                        </div>                        
                        <hr>
                        <div>
                                <p class="text-center"><strong>Tổng  {{ number_format($total,0,',','.')}} VNĐ</strong></p>
                        </div>                                                                                
            </div>
                    
            <div class="col-sm-6">
                    <form class="form-group" action="{{url('/checkout')}}" method="post"}>
                        {{ csrf_field() }}
                    <table class="table  table-border table-hover">
                        <tbody>
                            <tr>
                               <th>Tên Khách Hàng</th>
                               <td><input required  type="text" name="customname" id="customname" placeholder="Vd: Nguyen Van A" class="form-control"></td> 
                            </tr>
                            <tr>
                               <th>Mail</th> 
                               <td><input required type="email" name="custommail" id="custommail" placeholder="VD: abc@gmail.com" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Số Điện Thoại</th>
                                <td><input required type="text" name="customphone" id="customphone" placeholder="Vd: 0988888888" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Địa Chỉ</th>
                                <td><input required type="text" name="customaddress" id="customaddress" placeholder="Vd: Số 1-Mộ Lao-Hà Đông" class="form-control"></td>
                            </tr>
                              
                        </tbody>
                    </table> 
                   
                        <div  class="center">
                            <input type="submit" value="Đặt Hàng" name="btnDatHang" id="btnDatHang" class="btn btn-success">
                        </div> 
                </form>
            </div>
           
        </div>
    </div>
@else
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
				@if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div> 
				@endif
            <strong>Chưa Có Sản Phẩm Trong Giỏ Hàng <a href="{{url('/')}}" class="btn btn-warning">Quay Lại</a></strong>
            </div>            
        </div>
    </div>
@endif
@endsection