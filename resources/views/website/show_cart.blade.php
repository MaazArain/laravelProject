@include('website.links')
<style>
        .table{
            border:5px solid rgb(219, 221, 219);
        }
        .table tr,th,td{
            border:4px solid black;
        }
</style>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('website.header')
         <!-- end header section -->
         <!-- slider section -->
        @if (Session::has('success'))
            <div class="alert alert-success">
                    {{ session('success') }}
            </div>
        @endif
            <div class="container my-5">
                <div class="row justify-content-around" id="set_content">
                    <div class="col-lg-10">
                        @if(Session::has('delete'))
                        <div class="alert-danger">
                            {{ session('delete') }}
                        </div>
                        @endif
                        <table class="table table-hover" >
                            <thead>
                                <tr class="text-center">
                                    <th>ProductTitle</th>
                                    <th>ProductQuantity</th>
                                    <th>ProductPrice</th>
                                    <th>ProductImage</th>
                                    <th>TotalPrice</th>
                                    <th >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $car)       
                                <tr class="">
                                    <td>{{ $car->product_title }}</td>  
                                    <td>{{ $car->quantity }}</td>
                                    <td>{{ $car->price }}</td>
                                    <td><img src="uploadProduct/{{ $car->image }}" class="img-fluid" width="60px" height="60px"></td>
                                    <td>{{ $car->price * $car->quantity }}</td>
                                    <td class=""><a href="" class="btn btn-success">Edit</a> 
                                        <span class="pl-2"><a href="{{ url('delete_cart/' . $car->id) }}" id="remove_cart" class="btn btn-danger" >Delete</a></span></td>  
                                </tr>
                                @endforeach
                            <tr class="text-center" style="position: relative;left:553px;">
                                <td class="alert alert-success text-uppercase text-danger">subTotal Price</td>
                                <td class="text-white bg-dark fw-bold fs-4 font-monospace">{{ $subTotal }}</td>
                            </tr>
                        </tbody>
                        </table>

                        <div class="mb-2" style="border:5px solid black; padding:20px;position: relative;top:auto; left:650px;width:400px;">
                            <h1 class="text-danger fw-bold fs-4  mb-2"><b>Proceed To Order:<b></h1>
                            <a href="{{ url('/cash_order') }}" class="btn btn-danger">Cash On Delivery</a>
                            <a href="{{ url('stripe/' . $subTotal) }}" class="btn btn-danger">Pay Using Card</a>
                        </div>
                        <div>
                        </div>
                      

                    </div>
                </div>
            </div>
            
            <!-- end slider section -->
      </div>
      <!-- end client section -->
      <!-- footer start -->
      @include('website.footer')
      <!-- jQery -->
      @include('website.script')

<script>
    $(document).ready(function(){
        $(`#remove_cart`).click(function(){
            alert('Are U sure Remove THe Product!');
        });
    });
</script>
