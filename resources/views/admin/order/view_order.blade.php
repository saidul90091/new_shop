<html>

<head>
    @include('admin.css')
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

            <div class="d-flex justify-content-between mx-2">
                <h2 class="">Order Details</h2>
            </div>

            <div style="height:5px" class="bg-danger"></div>

            <div class="border p-2 mt-2 mx-4 bg-secondary">
                <table class="table table table-dark table-striped">
                    <thead>
                        <tr class="bg-secondary">

                            <th scope="col">Customer name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Product title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">action</th>
                            <th scope="col">Print PDF</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->rec_address }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->product->title }}</td>
                                <td>{{ $order->product->price }}</td>
                                <td>
                                    <img style="width: 50px" src="products/{{ $order->product->image }}" alt="">
                                </td>
                                {{-- <td>{{$order->status}}</td> --}}
                                <td>

                                    @if ($order->status == 'success')

                                        <span style="color: green">{{$order->status}}</span>


                                    @elseif ($order->status == 'on the way')
                                        <span style="color: yellow">{{$order->status}}</span>

                                    @else

                                    <span>{{$order->status}}</span>

                                    @endif


                                </td>

                                <td>
                                    <a class="btn btn-success btn-sm" href="{{url('success',$order->id)}}">success</a>
                                    <a class="btn btn-warning btn-sm" href="{{url('on_the_way',$order->id)}}">On going</a>
                                </td>

                                <td><a class="btn btn-sm btn-outline-warning" href="{{url('print_pdf', $order->id)}}">pdf</a></td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

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
