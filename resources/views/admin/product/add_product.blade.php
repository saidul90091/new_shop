<html>

<head>
    @include('admin.css')

    <style>
        input[type] {
            color: #c3bebe
        }

        textarea {
            width: 100%;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Dashboard</h2>
                </div>
            </div>

            <div class="mx-2">
                    <h2 class="">Add Catagory</h2>
                <div style="height:5px" class="bg-danger"></div>
            </div>

            <div class="border p-2 mt-3 container">

                    <h2>Add New Product</h2>

                <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Product Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Price</label>
                        <input type="text" name="price" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Product Category</label>
                        <br>
                        <select name="category" id="" required>
                            <option value="">Select category</option>

                            @foreach ($categorys as $category)
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Image</label><br>
                        <input type="file" name="image">
                    </div>


                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>

            </div>
            <!-- JavaScript files-->
            <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
            <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
            <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
            <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
            <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
            <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>

</html>
