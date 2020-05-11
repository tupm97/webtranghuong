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
                <table class="table table-bordered">
                    
                    <thead>
                        <tr>
                            <th>Tên Khách Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Mail</th>
                            <th>Tình Trạng</th>
                            <th>Ngày Mua</th>
                            <th>Kiểm Tra</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bills as $bill)
                            <tr>
                                <td>{{$bill->customer}}</td>
                                <td>{{$bill->phone}}</td>
                                <td>{{$bill->address}}</td>
                                <td>{{$bill->mail}}</td>
                                <td>{{$bill->status}}</td>
                                <td>{{$bill->created_at}}</td>
                                <td><a href="{{url('admin/viewBill/'.$bill->id)}}">Kiểm Tra</a></td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

