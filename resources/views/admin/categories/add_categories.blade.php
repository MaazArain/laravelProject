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
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <h1 class="text-white text-center" id="add_category">Add Category</h1>
                    <form action="{{ url('/postCategory') }}" method="POST" class="form" id="form_controls" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control text-white" placeholder="Enter a Categories  Please!" name="category_name" value="{{ old('category_name') }}">
                            @error('category_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control text-white" placeholder="Enter a Title Categories Please!" name="title" value="{{ old('title') }}">
                            @error('title')
                            {{ $message }}
                        @enderror
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="category_content" class="form-control text-white" id="" cols="30" rows="10" placeholder="Enter Your Category Description"  value="{{ old('category_content') }}"></textarea>
                            @error('category_content')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Category Image</label>
                            <input type="file" class="form-control" name="image">
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
