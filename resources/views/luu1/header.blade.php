<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<img class="img-fluid" src="http://clever.vn/images/ads/1506149856_1438773174_logoclever5.png" alt="">
		</div>	       
		<div class="col-sm-4">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array)session('cart')) }}</span>
			</button>
			<!-- Modal -->
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
									<td class=" text-info">{{ $details['price'] }} VNĐ</td>
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
									<p>Tổng: <span class="text-info">{{ $total }} VNĐ</span></p>
								</div>
							</div>
						@endif

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
						<a type="button" href="{{ url('cart') }}" class="btn btn-primary">Đến Giỏ Hàng</a>
						<button type="button" class="btn btn-danger">Đặt Hàng</button>
					</div>
					</div>
				</div>
			</div>
		</div>	
	</div>	
</div>


<div class="container">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		<a class="navbar-brand" href="#">Hidden brand</a>
		{{menu('main_menu','bootstrap')}}	
	</div>
	</nav>
</div>


<div class="container">
	<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active" data-interval="1000">
			<img src="http://placehold.it/1000x300?text=1" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item" data-interval="2000">
			<img src="http://placehold.it/1000x300?text=2" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
			<img src="http://placehold.it/1000x300?text=3" class="d-block w-100" alt="...">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>


<div class="container">
		<div class="container text-center my-3">    
			<div class="row mx-auto my-auto">
				<div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
					<div class="carousel-inner w-100" role="listbox">
						<div class="carousel-item active">
							<div class="col-lg-2 col-md-3">
								<img class="img-fluid" src="http://placehold.it/350x180?text=1">
							</div>
						</div>
						<div class="carousel-item">
							<div class="col-lg-2 col-md-3">
								<img class="img-fluid" src="http://placehold.it/350x180?text=2">
							</div>
						</div>
						<div class="carousel-item">
							<div class="col-lg-2 col-md-3">
								<img class="img-fluid" src="http://placehold.it/350x180?text=3">
							</div>
						</div>
						<div class="carousel-item">
							<div class="col-lg-2 col-md-3">
								<img class="img-fluid" src="http://placehold.it/350x180?text=4">
							</div>
						</div>
						<div class="carousel-item">
							<div class="col-lg-2 col-md-3">
								<img class="img-fluid" src="http://placehold.it/350x180?text=5">
							</div>
						</div>
						<div class="carousel-item">
							<div class="col-lg-2 col-md-3">
								<img class="img-fluid" src="http://placehold.it/350x180?text=6">
							</div>
						</div>
					</div>           
				</div>
			</div> 
		</div>
</div>
