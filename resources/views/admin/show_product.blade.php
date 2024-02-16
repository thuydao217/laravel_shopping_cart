<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <style type="text/css">
        .center{
            margin: auto;
            width: 80%;
            border: 3px solid orange;
            margin-bottom: 30px;
        }
        .img_size
        {
            width: 200px;
            height: 150px;
            object-fit: contain;
        }
        th
        {
            background-color:forestgreen;
            border: 1.5px solid orange;
            padding: 10px;
        }
        td
        {
            border: 1.5px solid orange;
            padding: 10px;
        }
    </style>
    @include('admin.css')
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

                @if(session() -> has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session() -> get('message')}}
                </div>

                @endif

                <div class="di_center" style="text-align: center; padding-top:40px;">
                    <h1 style="font-size: 40px; padding-bottom: 40px;">Show Product</h1>

                    <table class="center">
                        <tr>
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Catagory</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Product Image</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>

                        @foreach ($product as $product)

                        <tr>
                            <td>{{ $product -> title }}</td>
                            <td>{{ $product -> description }}</td>
                            <td>{{ $product -> quantity }}</td>
                            <td>{{ $product -> catagory }}</td>
                            <td>{{ $product -> price }}</td>
                            <td>{{ $product -> discount_price }}</td>
                            <td>
                                <img class="img_size" src="/product/{{ $product -> image }}">
                            </td>

                            <td>
                                <a onclick="return confirm('Are You Sure To Delete This?')" class="btn btn-danger" href="{{ url('delete_product',$product -> id)}}">Delete</a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{ url('update_product',$product -> id) }}">Edit</a>
                            </td>
                        </tr>

                        @endforeach

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
