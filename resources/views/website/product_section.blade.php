<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
         @if(Session::has('success'))
         <div class="alert alert-success">
               {{ session('success') }}
         </div>
         @endif
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
         @foreach ($product as $pro)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{ url('productDetails/' . $pro->id) }}" class="option1">
                        Product Details
                     </a>
                      <form action="{{ url('addCart/' . $pro->id) }}" method="POST">
                        @csrf
                        <div class="row">      
                         <div class="col-md-4">
                           <input type="number" name="quantity" value="1" min="1">
                         </div>
                         <div class="col-md-4">
                           <input type="submit" value="Add To Cart">
                         </div>
                        </div>   
                     </form>
                   </div>
                </div>
                <div class="img-box">
                   <img src="uploadProduct/{{ $pro->image }}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                     {{ $pro->title }}
                   </h5>
                   @if($pro->discount_price != null)
                  &nbsp;&nbsp;DiscountPrice:
                   <br>
                   <h6 class="text-danger" style="position: relative;top:20px;left:-70px;">
                     ${{ $pro->discount_price }}
                  </h6>
                   <h6 style="text-decoration:line-through; position: relative;left:-10px;top:-8px;">
                     PPrice:
                     <br>  
                     {{ $pro->price }}</h6>
                    @else
                   <h6>
                      ${{ $pro->price }}
                   </h6>
                   @endif
                </div>
             </div>
          </div>
         @endforeach
       </div>
       {{ $product->links('pagination::bootstrap-5') }}
      </div>
 </section>
 
 