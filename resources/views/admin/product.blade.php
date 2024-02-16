<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
        .in_color
        {
            color: black;
        }
        label
        {
            display: inline-block;
            width: 200px;
            text-align: left;
        }
        .di_design
        {
            padding-bottom: 15px;
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

                @if(session() -> has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session() -> get('message')}}
                </div>

                @endif

                <div class="di_center" style="text-align: center; padding-top:40px;">
                    <h1 style="font-size: 40px; padding-bottom: 40px;">Add Product</h1>

                    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="di_design">
                            <label>Product Title : </label>
                            <input type="text" class="in_color" name="title" placeholder="Enter a title" required="">
                        </div>

                        <div class="di_design">
                            <label>Product Description : </label>
                            <input type="text" class="in_color" name="description" placeholder="Enter a description" required="">
                        </div>

                        <div class="di_design">
                            <label>Product Price : </label>
                            <input type="number" class="in_color" name="price" placeholder="Enter product price" required="">
                        </div>

                        <div class="di_design">
                            <label>Discount Price : </label>
                            <input type="number" class="in_color" name="discount_price" placeholder="Enter discount price">
                        </div>

                        <div class="di_design">
                            <label>Product Quantity : </label>
                            <input type="number" class="in_color" name="quantity" min="0" placeholder="Enter product quantity" required="">
                        </div>

                        <div class="di_design">
                            <label>Product Catagory: </label>
                            <select class="in_color" name="catagory" required="">
                                <option value="" selected="">Add a catagory here</option>

                                @foreach ($catagory as $catagory)

                                <option value="{{ $catagory -> catagory_name}}">{{ $catagory -> catagory_name}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="di_design">
                            <label style="margin-left: 150px">Product Image Here : </label>
                            <input type="file" name="image" required="">
                        </div>

                        <div class="di_design">
                            <input type="submit" value="Add Product" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
