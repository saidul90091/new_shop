<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">

        @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">

                        <div class="img-box">
                            <img style="" src="products/{{$product->image}}" alt="card-image">
                        </div>
                        <div class="detail-box">
                            <h6>{{$product->title}}</h6>
                            <h6 class="border border-2 p-2"> Price: <span>{{$product->price}} </span></h6>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a class="btn btn-primary text-light btn-sm " href="{{url('details_product',$product->id)}}">Details</a>

                            <a class="btn btn-warning btn-sm" href="{{url('add_cart',$product->id)}}">Add to Cart</a>

                        </div>

                </div>
            </div>
           @endforeach
        </div>
        <div class="btn-box">
            <a href="">
                View All Products
            </a>
        </div>
    </div>
</section>
