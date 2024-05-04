@include('website.links')
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('website.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('website.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('website.shop')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('website.new_arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('website.product_section')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('website.subscribe_section')
      <!-- end subscribe section -->
      <!-- client section -->
        @include('website.testimonial')
      <!-- end client section -->
      <!-- footer start -->
      @include('website.footer')
      <!-- jQery -->
      @include('website.script')