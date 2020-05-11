<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đơn Hàng Mới</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row font-weight-bold">
            <p>Khách Hàng       :{{$custom['customname']}}</p>
            <p>Số Điện Thoại    :{{$custom['customphone']}}</p>
            <p>Địa Chỉ          :{{$custom['customaddress']}}</p>
            <p>Mail             :{{$custom['custommail']}}</p>
        </div>
        <div class="row">
                <table class="table table-border table-hover">
                    @php
                        $total=0;
                    @endphp
                    <tr class="font-weight-bold">
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                    </tr>
                    @foreach($data as $id => $details)
                        <tr >
                            <td>{{ $details['name'] }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>{{ $details['price'] }} VNĐ</td>
                        @php
                            $total+=$details['quantity']*$details['price'];
                        @endphp
                        </tr>                             
                    @endforeach
                    <tr>
                    <td>Tổng :{{ number_format($total,0,',','.')}} VNĐ</td>
                    </tr>
                </table>              
        </div>
    </div>
</body>
</html>