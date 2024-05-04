@include('website.links')
<style>

</style>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('website.header')
        <!-- end header section -->
        {{-- Product Details Page is here Code --}}
        <div class="container ">
            <div class="row">
                  <div class="col-lg-6">
                     <div class="big-img">
                     <img src="/uploadProduct/{{ $product->image }}" class="img-fluid" alt="Product Image">
                     </div>
                 </div>
                 <div class="col-lg-1 d-flex  align-items-center">
                  <img src="../website/images/shirt2.jpg" class="img-thumbnail m-2" onclick="showImg(this.src)" alt="Small Image 1">
                  <img src="../website/images/shirt3.jpg" class="img-thumbnail m-2" onclick="showImg(this.src)" alt="Small Image 1">
                  <img src="../website/images/shirt4.jpg" class="img-thumbnail m-2"  onclick="showImg(this.src)" alt="Small Image 1">
                  <img src="../website/images/shirt5.jpg" class="img-thumbnail m-2" onclick="showImg(this.src)" alt="Small Image 1">
              </div>
                <div class="col-lg-6">
                    <h2 class="my-4 font-weight-bold">{{ $product->title }}</h2>
                    <p class="lead">{{ $product->description }}</p>
                    <div class="mb-3">
                   @if($product->discount_price != null)
                        <span class="h4" style="color:red;">${{ $product->discount_price }}</span>
                        <br>
                        <span class="h4" style="text-decoration:line-through;">${{ $product->price }}</span>
                    </div>
                    @else
                    <span class="h4" style="text-decoration:line-through;">${{ $product->price }}</span>
                    @endif
                    <div class="mb-3">
                     <span class="h4">{{ $product->category }}</span>
                 </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity:</label>
                        {{ $product->quantity }}
                    </div>
                    <form action="{{ url('addCart/' . $product->id) }}" method="POST">
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
        </div>
        <!-- footer start -->
        @include('website.footer')
        <!-- jQery -->
        
        @include('website.script')
        <script>
         let bigImg = document.querySelector('.big-img img');
            function showImg(pic)
            {
               bigImg.src = pic;
            }
        </script>
        