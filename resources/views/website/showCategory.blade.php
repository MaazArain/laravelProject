@include('website.links')
<style>

</style>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('website.header')
        <!-- end header section -->
<section class="product_section layout_padding">
    <div class="container">
       <div class="row">
            @foreach ($category as $cat)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                           <a href="{{ url('viewCategoies/' . $cat->id) }}">
                            <h1 class="text-uppercase font-monospace">{{ $cat->category_name }}</h1>
                            <img src="uploadCategory/{{ $cat->image }}" alt="">
                            <h5 class="card-title fw-bold">{{ $cat->title }}</h5>
                            <p class="card-text">{{ $cat->category_content }}</p>
                           </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>
      <!-- footer start -->
      @include('website.footer')
      <!-- jQery -->
      
      @include('website.script')
      <script>
 