<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->

        @include('home.header')

        <!-- end header section -->
        <!-- slider section -->

        @include('home.slider')

        <!-- end slider section -->
    </div>
    <!-- end hero area -->
    <div class="container">
        <h1 class="mt-5">Cart Details</h1>
        <hr>
        <div class="row">
            <div class="col-8">

                <?php
                $value = 0;
                ?>

                @foreach ($cart as $cart)
                    <div class="card mb-3 mt-3" style="">
                        <div class="row g-0">
                            <div class="col-2 d-flex aligh-content-center">
                                <img style="height:100px" src="/products/{{ $cart->product->image }}"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-10">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3 d-flex align-items-center p-2">
                                            <h5 class="card-title">{{ $cart->product->title }}</h5>
                                        </div>
                                        <div class="col-3 d-flex align-items-center">
                                            <h5 class="card-title"> Price: {{ $cart->product->price }}</h5>
                                        </div>
                                        <div class="col-3 d-flex align-items-center justify-content-center">
                                            <button style="height: 30px" class="btn-sm">-</button>
                                            <p class="mt-3 mx-3">1</p>
                                            <button style="height: 30px" class="btn-sm">+</button>

                                        </div>

                                        <div class="col-3 d-flex align-items-center justify-content-end">
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ url('remove_cart', $cart->id) }}">X</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $value = $value + $cart->product->price;

                    ?>
                @endforeach

                <div class="mb-2 d-flex justify-content-end">
                    <a class="btn btn-secondary btn-sm" href="{{ url('/') }}">view all</a>
                </div>
            </div>

            <div class="col-4 mt-3">
                <div class="border p-3 sticky-top">
                    <h2>Total Price: {{ $value }}</h2>
                </div>


                <div class="border my-5 p-4">
                    <h4>Customer Information</h2>
                        <hr>
                    <form id="orderForm" action="{{url('order_confirm')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name:</label>
                            <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address:</label>
                            <textarea name="address"  id="" cols="35" rows="3" class="form-control">{{Auth::user()->address}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone:</label>
                            <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control">
                        </div>


                        <button type="submit" class="btn btn-primary btn-sm">Place Order</button>
                    </form>
                </div>
            </div>

        </div>


    </div>



    <!-- info section -->

    @include('home.footer')

    <!-- end info section -->

    <!-- JavaScript files-->



   

</body>

</html>
