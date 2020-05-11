<section class="section-content padding-y">
        <div class="container">
            
        <header class="section-heading ">
              <h4 class="title-section text-danger">SẢN PHẨM NỔI BẬT</h4>
            <hr>
         </header>
            
        </div>
    <div class="container text-center my-3">
        
        <div class="row mx-auto my-auto">
            <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner w-100" role="listbox">
                    @foreach ($data['goodProducts'] as $id=> $product)
                        @if($id==0)
                            <div class="carousel-item active">
                                <div class="col-lg-2 col-md-3">
                                <a href="{{url('product/'.$product->id)}}"><img class="img-fluid" src="{{Voyager::image($product->image)}}"></a>
                                </div>
                            
                            </div>
                        @elseif($id>0&&$id<6)
                            <div class="carousel-item">
                                <div class="col-lg-2 col-md-3">
                                    <a href="{{url('product/'.$product->id)}}"><img class="img-fluid" src="{{Voyager::image($product->image)}}"></a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    
                  
                </div> 
                <a class="carousel-control-prev text-left" href="#recipeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next text-faded text-right" href="#recipeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>          
            </div>
        </div> 
    </div><!-- end carsoul slide-->
</section>