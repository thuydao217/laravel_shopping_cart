<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .label1
        {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            padding-top: 40px;
            padding-bottom: 30px;
        }
        .table_wraper
        {
            width: 1210px;
            height: 500px;
            overflow-x: auto;
            overflow-y: auto;
        }
        table
        {
            margin: auto;
            text-align: center;
            overflow-x: auto;

        }
        tr
        {
            border: 3px solid orange;
        }
        th
        {
            border: 3px solid orange;
            background: green;
            padding: 10px;
        }
        td
        {
            border: 1.5px solid orange;
            padding: 10px;
        }
        .img_size
        {
            object-fit: contain;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                    <h2 class="label1">All Order</h2>
                    <div style="display: flex; justify-content: center; padding-bottom: 20px; color: black">
                        <form action="{{ url('search') }}" method="GET">
                            @csrf
                            <input type="text" name="search" placeholder="Search for Order">
                            <input type="submit" name="Search" class="btn btn-outline-primary">
                        </form>
                    </div>
                    <div class="table_wraper">
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Product Title</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Payment Status</th>
                                <th>Delivery Status</th>
                                <th>Image</th>
                                <th>Delivered</th>
                                <th>Print PDF</th>
                                <th>Send Email</th>
                            </tr>

                            @forelse($order as $order)
                            <tr>
                                <td>{{ $order -> name }}</td>
                                <td>{{ $order -> email }}</td>
                                <td>{{ $order -> phone }}</td>
                                <td>{{ $order -> address }}</td>
                                <td>{{ $order -> product_title }}</td>
                                <td>{{ $order -> quantity }}</td>
                                <td>{{ $order -> price }}</td>
                                <td>{{ $order -> payment_status }}</td>
                                <td>{{ $order -> delivery_status }}</td>
                                <td><img class="img_size" src="/product/{{ $order -> image }}"></td>

                                @if($order -> delivery_status == 'processing')

                                    <td><a class="btn btn-success" onclick="return confirm('Are You Sure This Product Deliver Is Done?')" href="{{ url('delivered', $order -> id) }}">Delivered</a></td>

                                @else
                                    <td><p style="color: crimson">Delivered</p></td>

                                @endif
                                <td><a class="btn btn-secondary" href="{{ url('print_pdf',$order -> id) }}">Print</a></td>
                                <td><a class="btn btn-info" href="{{ url('send_email',$order -> id) }}">Send</a></td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="13">No data found</td>
                            </tr>
                            @endforelse

                        </table>
                    </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
