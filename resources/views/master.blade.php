<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content=" Trang Hương - dev by manhtantna@gmail.com. mail me if you need the source code">
	<meta name="keywords" content="KeyWord">
	<meta name="description" content="Description">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Trang Hương</title>
	<base href="{{asset('/')}}">
	<link rel="shortcut icon" type="image/x-icon" href="https://tranghuongbuilding.com/storage/app/public/logofinal.png">

	<!-- jQuery -->
	<script src="resources/custom/js/jquery-2.0.0.min.js" type="text/javascript"></script>

	<!-- Bootstrap4 files-->
	<script src="resources/custom/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<link href="resources/custom/css/bootstrap.css" rel="stylesheet" type="text/css"/>

	<!-- Font awesome 5 -->
	<link href="resources/custom/fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">

	<!-- plugin: owl carousel  -->
	<link href="resources/custom/plugins/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href=".resources/custom/plugins/owlcarousel/assets/owl.theme.default.css" rel="stylesheet">
	<script src="resources/custom/plugins/owlcarousel/owl.carousel.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- custom style -->
	<link href="resources/custom/css/ui.css" rel="stylesheet" type="text/css"/>
	<link href="resources/custom/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />
	<link rel="stylesheet" href="resources/custom/css/mulslide.css">
	<link rel="stylesheet" href="resources/custom/css/base.css">
	<!-- custom javascript -->
	<script src="resources/custom/js/script.js" type="text/javascript"></script>

	<script type="text/javascript">
	/// some script

	// jquery ready start
	$(document).ready(function() {
		// jQuery code
		$('#recipeCarousel').carousel({
				interval: 4000
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
	}); 
	// jquery end
</script>
</head>
<body>
	<header class="section-header">
		@include('shop.header')
	</header> <!-- section-header.// -->
		
		@include('shop.slide')
		@include('shop.autoslide')
	<!-- ========================= SECTION SLIDE END// ========================= -->
	<!-- ========================= SECTION CONTENT// ========================= -->	
		@yield('content')
		@include('shop.recomender')	
	@include('shop.contact')
	<!-- ========================= SECTION CONTENT END ========================= -->
	@yield('script')
	<!-- ========================= FOOTER ========================= -->
	@include('shop.footer')
	<!-- ========================= FOOTER END // ========================= -->
	
	<script>		

		$(".update-cart").click(function (e) {
		e.preventDefault();			
		var ele = $(this);
			var quantity =ele.parents("tr").find(".quantity").val()>0?ele.parents("tr").find(".quantity").val():1;
			$.ajax({
			url: '/update-cart',
			type: "POST",
			data: {
					_token: '{{ csrf_token() }}', 
					id: ele.attr("data-id"), 
					quantity: quantity,
					_method:"PATCH"
				},
			success: function (response) {
				window.location.reload();
			}
			});
		});

		$(".remove-from-cart").click(function (e) {
			e.preventDefault();

			var ele = $(this);

			if(confirm("Xóa Sản Phẩm?")) {
				$.ajax({
					url: '/remove-from-cart',
					type: "POST",
					data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"),_method:"DELETE"},
					success: function (response) {
						window.location.reload();
					}
				});
			}
		});
	</script>
	</body>
</html>