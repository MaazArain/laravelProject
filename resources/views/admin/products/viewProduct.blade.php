!DOCTYPE html>
<html lang="en">

<head>
    <!------Links include--------->
    @include('admin.links')
    <style>
        #form_controls{
            width: 500px;
            margin-bottom: 20px;
            margin: 20px 25rem;
        }
        #add_category{
            font-size: 205%;
            font-weight: bold;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .table{
            border: 5px solid white;
        }
        #set_content{
            position: relative;
            left: -240px;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                        <div class="container mt-5 ">
                        <div class="row justify-content-around" id="set_content">
                            <div class="col-lg-8">
                                @if(Session::has('Success'))
                                <div class="alert alert-danger text-dark">{{ session('Success') }}</div>
                                @endif
                                <table class="table table-striped table-hover ">
                                    <thead>
                                        <tr>
                                        <th class="text-white">Title</th>    
                                        <th class="text-white">Description</th>    
                                        <th class="text-white">CategoryName</th>    
                                        <th class="text-white">Quantity</th>
                                        <th class="text-white">Productprice</th>    
                                        <th class="text-white">DiscountPrice</th>    
                                        <th class="text-white">ProductImage</th>    
                                        <th class="text-white">Actions</th>    
                                        </tr>    
                                    </thead>   
                                    
                                    @if(Session::has('message'))
                                        <div class="alert alert-danger">
                                                {{session('message') }}
                                        </div>
                                    @endif
                                    @foreach($products as $product)
                                    <tbody>
                                        <tr class="text-white">
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->discount_price }}</td>
                                            <td><img src="uploadProduct/{{ $product->image }}" style="width: 70%; height:50px;"></td>
                                            <td><a href="{{ url('editProduct/' . $product->id) }}" class="btn btn-success">Edit</a></td>
                                            <td><a href="{{ url('delete_product/' . $product->id) }}"  class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                            </div>    
                        </div>       
                </div>
            </div>

        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
</body>
</html>
