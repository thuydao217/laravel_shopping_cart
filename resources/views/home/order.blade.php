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
            padding: 30px;
            text-align: center;
        }
        tr
        {
            border: 3px solid grey;
        }
        th
        {
            padding: 5px;
            border: 1.5px solid grey;
            font-size: 20px;
            background-color: aqua;
        }
        td
        {
            padding: 5px;
            border: 1.5px solid grey;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
        <div class="center">
            <table>
                <tr>
                    <th>Product Tile</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Deliver Status</th>
                    <th>Image</th>
                    <th>Cancel Order</th>
                </tr>
                @foreach ($order as $order)

                <tr>
                    <td>{{ $order -> product_title }}</td>
                    <td>{{ $order -> quantity }}</td>
                    <td>{{ $order -> price }}</td>
                    <td>{{ $order -> payment_status }}</td>
                    <td>{{ $order -> delivery_status }}</td>
                    <td><img height="100" width="180" src="product/{{ $order -> image }}"></td>
                    <td>
                        @if ($order -> delivery_status == 'processing')

                        <a onclick="return confirm('Are You Sure to Delete this Order?')" style="color: white" class="btn btn-danger" href="{{ url('cancel_order',$order -> id) }}">Cancel</a>

                        @else
                        <p style="color: crimson">Not Allowed</p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
         <!-- end slider section -->
      </div>
      <!-- footer start -->
        @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
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

