<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
      <title>Shopping Cart</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

      <style type="text/css">
        .center
        {
            margin: auto;
            width: 60%;
            text-align: center;
            padding: 30px;
        }
        tr, th, td
        {
            border: 1px solid grey;
        }
        th
        {
            background: aqua;
            font-size: 25px;
            padding: 5px;
        }
        .total
        {
            color: red;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->

         <!-- end slider section -->
        @if(session() -> has('message'))

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session() -> get('message')}}
            </div>

        @endif

            <div class="center">
                <table>
                    <tr>
                        <th>Product Tilte</th>
                        <th>Product Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>

                    <?php $totalprice = 0; ?>
                    @foreach($cart as $cart)
                    <tr>
                        <td>{{ $cart -> product_title }}</td>
                        <td>{{ $cart -> quantity }}</td>
                        <td>{{ $cart -> price }}đ</td>
                        <td><img src="/product/{{ $cart -> image }}" style="object-fit: contain; witdh: 200px; height: 200px;"></td>
                        <td><a onclick="return confirm('Are You Sure To Delete This?')" class="btn btn-danger" href="{{ url('remove_cart', $cart -> id) }}">Remove</a></td>
                    </tr>
                    <?php $totalprice = $totalprice + $cart -> price ?>
                    @endforeach
                    <tr class="total">
                        <th>Total Price: </td>
                        <th colspan="4">{{ $totalprice }}đ</td>
                    </tr>
                </table>
                <div>
                    <h1 style="font-size: 25px; padding: 15px;">Proceed to Order</h1>
                    <a href="{{ url('cash_order') }}" class="btn btn-danger">Cash On Delivery</a>
                    <a href="{{ url('stripe', $totalprice) }}" class="btn btn-danger">Pay Using Card</a>
                </div>
            </div>
      <!-- footer start -->
        @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
