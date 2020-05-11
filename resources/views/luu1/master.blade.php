<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content=" Name Company">
	<meta name="keywords" content="KeyWord">
	<meta name="description" content="Description">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Shop</title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="source/style/style.css">
	<link rel="stylesheet" href="source/style/ihover.css">
	<link rel="stylesheet" href="source/style/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	@media (max-width: 768px) {
		.carousel-inner .carousel-item > div {
			display: none;
		}
		.carousel-inner .carousel-item > div:first-child {
			display: block;
		}
	}
	.carousel-inner .carousel-item.active,
	.carousel-inner .carousel-item-next,
	.carousel-inner .carousel-item-prev {
		display: flex;
	}
	/* medium - display 4  */
	@media (min-width: 768px) {

		.carousel-inner .carousel-item-right.active,
		.carousel-inner .carousel-item-next {
		transform: translateX(25%);
		}
		
		.carousel-inner .carousel-item-left.active, 
		.carousel-inner .carousel-item-prev {
		transform: translateX(-25%);
		}
	}

	/* large - display 6 */
	@media (min-width: 992px) {
		
		.carousel-inner .carousel-item-right.active,
		.carousel-inner .carousel-item-next {
		transform: translateX(16.666%);
		}
		
		.carousel-inner .carousel-item-left.active, 
		.carousel-inner .carousel-item-prev {
		transform: translateX(-16.666%);
		}
	}

	.carousel-inner .carousel-item-right,
	.carousel-inner .carousel-item-left{ 
	transform: translateX(0);
	}


	</style>
</head>
<body>
	<!--banner-->
	<!--navbar-->
	@include('header')
	<!--end caroul-->
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				{{menu('main_menu','bootstrap')}}
			</div>
			<div class="col-sm-9">
				@yield('content')
			</div>
		</div>	
	</div>
	<!--call-->
	@include('contact')
    @yield('scripts')
	<!--footer-->'
	@include('footer')
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script>
		$('#recipeCarousel').carousel({
			interval: 1000
		})
		$('.carousel .carousel-item').each(function(){
			var minPerSlide = 4;
			var next = $(this).next();
			if (!next.length) {
			next = $(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo($(this));		
			for (var i=0;i<minPerSlide;i++) {
				next=next.next();
				if (!next.length) {
					next = $(this).siblings(':first');
				}
				
				next.children(':first-child').clone().appendTo($(this));
			}
		});
	</script>
	<script>		

		$(".update-cart").click(function (e) {
		e.preventDefault();			
		var ele = $(this);
			var quantity =ele.parents("tr").find(".quantity").val()>0?ele.parents("tr").find(".quantity").val():1;
			$.ajax({
			url: '{{ url('update-cart') }}',
			method: "patch",
			data: {
					_token: '{{ csrf_token() }}', 
					id: ele.attr("data-id"), 
					quantity: quantity
				},
			success: function (response) {
				window.location.reload();
			}
			});
		});

		$(".remove-from-cart").click(function (e) {
			e.preventDefault();

			var ele = $(this);

			if(confirm("Are you sure")) {
				$.ajax({
					url: '{{ url('remove-from-cart') }}',
					method: "DELETE",
					data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
					success: function (response) {
						window.location.reload();
					}
				});
			}
		});
	</script>
</body>
</html>