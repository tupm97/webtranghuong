<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xem Số Đơn Hàng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table>                    
                        <tr>
                            <th>Người Bán Hàng:</th>
                            <td><strong>PHẠM THỊ HƯƠNG </strong></td>
                        </tr>        
                        <tr>
                            <th>Tên Khách Hàng:</th>
                            <td><strong>{{$bill->customer}}</strong></td>
                        </tr>
                        <tr>
                            <th>Số Điện Thoại :</th>
                            <td><strong>{{$bill->phone}}</strong></td>
                        </tr>
                        <tr>
                            <th>Địa Chỉ:</th>
                            <td><strong>{{$bill->address}}</strong></td>
                        </tr>            
                </table>               
                <table class="table table-bordered">    
                    <thead>
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $tong=0;
                        @endphp
                        @foreach ($billdetails as $billdetail)
                            
                            @foreach ($data['products'] as $product)
                                @if($billdetail->product_id==$product->id)
                               <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$billdetail->quantity}}</td>
                                    <td>{{$billdetail->price}}</td>                               
                                </tr>
                                @php
                                    $tong+=$billdetail->quantity*$billdetail->price;
                                @endphp
                                @endif 
                            @endforeach                            
                        @endforeach 
                            <tr>
                                <td></td>
                                <td><strong> Tổng:{{ number_format($tong,0,',','.')}} VNĐ</strong></td>
                                <td></td>
                            </tr>                       
                    </tbody>
                </table>
               
            </div>
            
        </div>
        
    </div>
</body>
</html>

