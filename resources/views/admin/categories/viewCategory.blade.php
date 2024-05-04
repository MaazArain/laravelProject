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
                        <div class="row justify-content-around">
                            <div class="col-lg-12">
                                @if(Session::has('Success'))
                                <div class="alert alert-danger text-dark">{{ session('success') }}</div>
                                @endif
                                <table class="table table-striped table-hover ">
                                    <thead>
                                        <tr>
                                        <th class="text-white">CategoryName</th>    
                                        <th class="text-white">Title</th>    
                                        <th class="text-white">CategoryContent</th>
                                        <th class="text-white">Image</th>    
                                        <th class="text-white">Actions</th>    
                                        </tr>    
                                    </thead>    
                                    @foreach ($viewData as $view)
                                    <tbody>
                                        <tr>
                                            <td class="text-white">{{ $view->category_name }}</td>
                                            <td class="text-white">{{ $view->title }}</td>
                                            <td class="text-white">{{ $view->category_content }}</td>
                                            <td class=""><img src="uploadCategory/{{ $view->image }}"></td>

                                            <td class="text-white">
                                                <a href="{{ url('deleteCategory/' . $view->id) }}" class="btn btn-danger text-white">Delete</a>    
                                            </td>
                                            <td><a href="{{ url('editCategory/' . $view->id) }}" class="text-white btn btn-success">Edit</a></td>
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
