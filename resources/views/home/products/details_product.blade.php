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


    <div class="container py-5">
        <div class="card mb-2" style="max-width: ;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/products/{{ $data->image }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->title }}</h5>
                        <p class="card-text">{{ $data->description }}</p>
                        <p class="card-text"><small class="text-body-secondary">Price: {{ $data->price }}</small></p>
                        <p class="card-text"><small class="text-body-secondary">Quantity: {{ $data->quantity}}</small></p>
                        <button class="btn btn-secondary">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-primary" href="{{ url('/') }}">Go back</a>
    </div>






    <!-- info section -->

    @include('home.footer')

    <!-- end info section -->



</body>

</html>
