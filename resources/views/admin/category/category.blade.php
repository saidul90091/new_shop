<html>

<head>
    @include('admin.css')
    <style>
        .category_input {
            width: 400px;
            height: 42px;
            background: #e4e8ef;
            border-radius: 7px;
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
                <form action="{{ url('add_category') }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-between">
                        <h2 class="">Category Section</h2>
                        <div>
                            <input class="category_input" placeholder=" input your category" type="text"
                                name="category">
                            <input class="btn btn-light mb-1" type="submit" value="Add Category">
                        </div>
                    </div>
                    <div style="height:5px" class="bg-danger"></div>
                </form>
            </div>

            <div class="border p-2 mx-4 bg-secondary">
                <table class="table table table-dark table-striped">
                    <thead>
                        <tr class="bg-secondary">

                            <th scope="col">Category Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->category_name }}</td>
                                <td><a class="btn btn-success btn-sm"
                                        href="{{ url('edit_category', $data->id) }}">Edit</a></td>
                                <td><a class="btn btn-danger btn-sm" onclick="confermation(event)"
                                        href="{{ url('delete_category', $data->id) }}">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- JavaScript files-->

        <script>
            function confermation(ev) {
                ev.preventDefault();

                var urlToRedirect = ev.currentTarget.getAttribute('href');

                console.log(urlToRedirect)

                swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,

                    })
                    .then((willCancel) => {
                        if (willCancel) {
                            window.location.href = urlToRedirect;
                        }

                    })
            }
        </script>





        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
