<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        @include('home.css')
    </head>
</head>

<body>
    @include('home.header')

    <div class="container">
        <h1>My order</h1>
        <hr>

    <div class="border rounded p-3 my-5">
        <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Delevery Status</th>
                <th scope="col">Image</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ( $orders as $order )

              <tr>
                <td>{{$order->product->title}}</td>
                <td>{{$order->product->price}}</td>
                <td>{{$order->status}}</td>
                <td>
                    <img style="width:50px" src="products/{{$order->product->image}}" alt="">
                </td>

              </tr>

              @endforeach

            </tbody>
          </table>
    </div>

    </div>

    @include('home.footer')

</body>

</html>
