<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <div>
                <form action="{{ url('view_product_search') }}" method="GET">

                    @csrf

                    <input style="width: 500px" type="text" name="search" placeholder="Search Products">

                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
        @if(session() -> has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session() -> get('message')}}
                </div>

                @endif
        <div class="row">

            @foreach ($product as $products)

            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ url('product_details',$products -> id) }}" class="option1">Product Details</a>
                            <form action="{{ url('/add_cart',$products -> id) }}" method="POST">

                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="number" name="quantity" value="1" min="1" >
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" value="Add to Cart">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="product/{{ $products -> image }}">
                    </div>
                    <div class="detail-box">
                        <h5>{{ $products -> title }}</h5>

                        @if($products -> discount_price != null)
                        <h6 style="color: green">{{ $products -> discount_price }} đ</h6>
                        <h6 style="text-decoration: line-through; color: red;">{{ $products -> price }} đ</h6>

                        @else

                        <h6 style="color: green">{{ $products -> price }} đ</h6>

                        @endif

                    </div>
                </div>
            </div>

            @endforeach

        </div>
        <span style="padding-top:20px; display: flex; justify-content: center;">
            {!! $product -> withQueryString() -> links('pagination::bootstrap-5')!!}
        </span>
    </div>
</section>
