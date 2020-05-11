<section class="bg2">
	<div class="container">
		<div class="row no-gutters ">
			<div class="col-lg-9 offset-lg-5-24">
			<nav class="navbar navbar-expand-lg navbar-light">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="main_nav">
					<form action="{{url('/product/search')}}" method="post" style="width: 50%">
              <div class="input-group w-100">
                  <select class="custom-select"  name="category_name">
                      <option value="">Loại</option><option value="codex">Đặc Biệt</option>
                      <option value="comments">Tốt Nhất</option>
                       <option value="content">Mới Nhất</option>
                	 </select>
                    <input type="text" name="search" class="form-control" style="width:60%;" placeholder="Search">
                            {{ csrf_field() }}
                  	<div class="input-group-append">
                    <button type="submit" class="btn btn-primary" >
                         <i class="fa fa-search"></i>
                        </button>
                      </div>
                    </div>
					</form>
				</div> <!-- collapse .// -->
			</nav>
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container .// -->
	</section>
	
	<!-- ========================= SECTION MAIN ========================= -->
	<section class="section-main bg padding-bottom ">
	<div>
	<div class="container">
		<div class="row no-gutters border border-top-0 bg-white">
			<aside class="col-lg-5-24 d-none d-md-block">
			<nav>
				<div class="title-category bg-blue white d-none d-lg-block" style="margin-top:-53px">
					<span class="font-weight-bold text-dark">Danh Mục Sản Phẩm </span>
				</div>
				<ul class="menu-category font-weight-bold">
					@foreach ($data['categories'] as $id=>$category)
						@if($id<6)
						<li class="has-submenu"> 
							<a class="nav-link " href="{{url('product/filter/'.$category->id)}}">{{$category->name}}</a>
							@php
								$subid=0;
							@endphp
							<ul class="submenu">
								@foreach ($data['categories'] as $subcategory)
									@if($subcategory->parent_id==$category->id)
										@if($subid<=6)
										<li> 
											<a class="nav-link" href="{{url('product/filter/'.$subcategory->id)}}">{{$subcategory->name}}
											</a>
										</li>
										@endif
										@php
											$subid++;
										@endphp
									@endif
								@endforeach
								@if($subid>6)
									<a class="nav-link" href="{{url('/product')}}">Nhiều Hơn</a>
									
								@endif
							</ul>
							
						</li>
						@else
							<ul class="submenu">
							<li> <a class="nav-link" href="{{url('product/filter/'.$category->id)}}"></a></li>
							</ul>
						@endif
					@endforeach					
					<li class="has-submenu"> <a href="#">Nhiều Hơn <i class="icon-arrow-right pull-right"></i></a>
						<ul class="submenu">																					
							@foreach ($data['categories'] as $id=>$category)
								@if($id>=6&& !$category->parent_id)
									<li> <a class="nav-link" href="{{url('product/filter/'.$category->id)}}">{{$category->name}}</a></li>
								@endif
							@endforeach
						</ul>
					</li>
				</ul>
			</nav>
			</aside> <!-- col.// -->
			<main class="col-lg-19-24">
			<!-- ========= intro aside ========= -->
				<div class="row no-gutters">
					<div class="col-lg-9 col-md-8">
				<!-- ================= main slide ================= -->
	
				<div class="owl-init slider-main owl-carousel" data-items="1" data-margin="1" data-nav="true" data-dots="false" data-interval="1000">
					@foreach ($data['banners'] as $banner)
						<div class="item-slide">
							<img src="{{Voyager::image($banner->image)}}">
						</div>
					@endforeach										
				</div>
	
				<!-- ============== main slidesow .end // ============= -->
					</div> <!-- col.// -->
					<div class="col-lg-3 col-md-4">
						
							<h6 class="text-center font-weight-bold text-danger">Hàng Bán Chạy</h6>
							<ul class="list-group list-group-flush">
								
								@foreach ($data['sellingProducts'] as $sellingProduct)
									<li class="list-group-item text-center">
										<div class="row">
										<div class="col-sm-4 col-4">
											<a href="{{url('product/'.$sellingProduct->id)}}"><img src="{{Voyager::image($sellingProduct->image)}}" alt="selling product " width=40 height=30></a>
											
											
										</div>
										<div class="col-sm-8 col-8 inline-block">
												@if($sellingProduct->sale==0)
												<span class="price-new text-danger font-weight-bold ">{{ number_format($sellingProduct->price,0,',','.')}} VNĐ</span>
												@else
												<span class="price-new text-danger font-weight-bold">
													{{number_format($sellingProduct->price-$sellingProduct->price*$sellingProduct->sale/100,0,',','.')}} VNĐ
												</span>
												@endif
											<h6 >{{$sellingProduct->name}}</h6>
										</div>	
									</div>							
									</li>
								@endforeach						
							</ul>
						
							
					</div> <!-- col.// -->
				</div> <!-- row.// -->
			<!-- ======== intro aside ========= .// -->
			</main> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container .//  -->
	</div>
	</section>