<nav class="navbar navbar-top navbar-expand-lg navbar-dark" style="background: #E5E5E5">
    <div class="container">				
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: black" href="./"
                onMouseOver="this.style.color='blue'"
                onMouseOut="this.style.color='black'"> <i class="fa fa-home">
                </i> Trang chủ </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black" href="{{url('/gioi-thieu')}}"
                onMouseOver="this.style.color='blue'"
                onMouseOut="this.style.color='black'"> Giới thiệu </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black" href="{{url('/product')}}"
                onMouseOver="this.style.color='blue'"
                onMouseOut="this.style.color='black'"> Sản phẩm </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black" href="{{url('/tin-tuc')}}"
                onMouseOver="this.style.color='blue'"
                onMouseOut="this.style.color='black'"> Tin tức </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black" href="{{url('/ve-chung-toi')}}"
                onMouseOver="this.style.color='blue'"
                onMouseOut="this.style.color='black'"> Về chúng tôi </a>
            </li>			
        </ul>
        <ul class="navbar-nav">				
        <li><a href="{{url('checkout')}}" class="nav-link" style="color: black" onMouseOver="this.style.color='blue'"
                onMouseOut="this.style.color='black'"> Đặt Hàng </a></li>
        </ul> <!-- list-inline //  -->	
        <div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
						 data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: #E5E5E5">
						<i class="icon icon_user"></i>	 
						Tài khoản
            <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
  				  	<li><a  href="#" >Đơn đặt hàng</a></li>
    					<li><a  href="#">Thông tin cá nhân</a></li>
    					<li><a  href="#">Thay đổi mật khẩu</a></li>
  					</ul>
				</div>
				<div class="d-flex justify-content-end">                        						
            <a href="#" class="widget-header pl-3 ml-3" data-toggle="modal" data-target="#exampleModalLong">
              <div class="icontext">
                <div class="icon-wrap icon-sm round border"><i class="fa fa-shopping-cart"></i></div>
                 </div>
														<!-- <span class="badge badge-pill badge-danger notify">{{ count((array)session('cart')) }}</span> -->
								<span>Giỏ hàng ({{ count((array)session('cart')) }}) </span>
          	</a>
              <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                      <h5 class="modal-title center" id="exampleModalLongTitle">Shopping Cart</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                     </button>
                     </div>
                   <div class="modal-body">
                      @if((array)session('cart'))
                    <table class="table table-striped">
                   <thead>
                  <tr>							
                  <th scope="col">Ảnh</th>
                  <th scope="col">Tên Sản Phẩm</th>
              	 <th scope="col">Số Lượng</th>
                <th scope="col">Giá</th>
                </tr>
              </thead>
            <tbody>
              @foreach((array)session('cart') as $id => $details)
             <tr>								
    					 <td><img src="{{ Voyager::image( $details['image'] ) }}" width=50 height=50 /></td>
            	 <td><p>{{ $details['name'] }}</p></td>
              <td>{{ $details['quantity'] }}</td>
              <td class=" text-info">{{ number_format($details['price'],0,',','.') }} VNĐ</td>
              </tr>
             @endforeach	
              </tbody>
            </table>	
            <div class="row">								
             <?php $total = 0 ?>
            @foreach((array)session('cart') as $id => $details)
             <?php $total += $details['price'] * $details['quantity'] ?>
           @endforeach
           <div class="col-sm-12 text-right">
            <p>Tổng: <span class="text-info">{{ number_format($total,0,',','.') }} VNĐ</span></p>
            </div>
            </div>
            @endif
                
          </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      <a type="button" href="{{ url('cart') }}" class="btn btn-primary">Đến Giỏ Hàng</a>
      <a type="button" href="{{url('checkout')}}" class="btn btn-danger">Đặt Hàng</a>
      </div>
     </div>
     </div>
      </div>

                </div>	
    </div> <!-- container //  -->
</nav>

<section class="header-main">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5-24 col-sm-5 col-8">
                <div class="brand-wrap inline-block">
                    <img class="logo" src="https://tranghuongbuilding.com/storage/app/public/logofinal.png" >
                    <strong class="logo-text text-danger fon-weight-bold">Trang Hương</strong>
                </div> <!-- brand-wrap.// -->
            </div>
            <div class="col-lg-13-24 col-sm-12 order-3 order-lg-2">
                <div class="box_content">
                    <a href="#" style="text-decoration: none">
                        <i class="icon icon_camket"></i>
                         <span style="display: inline-block; color: black">Chính sách <br> bảo hành</span>
                    </a>
                </div>
                <div class="box_content">
                    <a href="#" style="text-decoration: none">
                        <i class="icon icon_giaohang"></i>
                        <span style="display: inline-block; color: black">Giao hàng <br>toàn quốc</span>
                    </a>
                </div>
                <div class="box_content">
                    <a href="#" style="text-decoration: none">
                        <i class="icon icon_thanhtoan"></i>
                         <span style="display: inline-block; color: black">Thanh toán <br>tại nhà</span>
                    </a>
                </div>
                <div class="box_content">
                    <a href="#" style="text-decoration: none">
                        <i class="icon icon_doitra"></i>
                         <span style="display: inline-block; color: black">Đổi trả hàng <br>trong 30 ngày</span>
                    </a>
                </div>
            </div>  
            <!-- col.// -->
            <div class="col-lg-6-24 col-sm-7 col-4  order-2  order-lg-3">
                <div class="box_hour cufon txt_b txt_14 txt_center txt_yellow">
                    Mở cửa: <span class="txt_25">8h30 - 18h30</span>
                    <div class="txt_blue">Tất cả các ngày trong tuần</div>
                  </div>
            </div>  
            <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- container.// -->
</section> <!-- header-main .// -->