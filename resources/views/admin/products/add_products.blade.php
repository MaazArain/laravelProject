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
                   
                    <h1 class="text-white text-center" id="add_category">Add Products</h1>
                    @if(Session::has('Success'))
                    <div class="alert alert-success text-dark">{{ session('Success') }}</div>
                    @endif
                    <form action="{{ url('/addProductPost') }}" method="POST" enctype="multipart/form-data" class="form" id="form_controls">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="text-white font-weight-bold">Title</label>
                            <input type="text" class="form-control text-white" placeholder="Enter a Categories  Please!" name="title" >
                        </div>
                        <div class="form-group text-dark">
                            <label for="title" class="text-white font-weight-bold">Description</label>
                            <textarea name="description" id="description"  cols="57" rows="5">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="text-white font-weight-bold">Add Category</label>
                               
                            <select name="category" id="" class="form-control bg-white">
                                
                                <option value="Enter Add Category" selected="" class="text-danger">Enter Add Category</option>
                                @foreach ($category as $cat)
                                <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="" class="text-white font-weight-bold">Product Quantity</label>
                            <input type="number" name="quantity" class="form-control bg-white" placeholder="Enter Product Quantity">
                        </div>
                        <div class="form-group">
                            <label for="" class="text-white font-weight-bold">Product Price</label>
                            <input type="text" name="price" class="form-control bg-white" placeholder="Enter Product price">
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="text-white font-weight-bold">Product DiscountPrice</label>
                            <input type="text" name="discount_price" class="form-control bg-white" placeholder="Enter Product Discount Price">
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="text-white font-weight-bold">Product Price</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="w-100 btn btn-danger text-white" name="submit">
                        </div>
                    </form>
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
