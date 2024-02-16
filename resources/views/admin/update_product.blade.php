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
                    <h1 style="font-size: 40px; padding-bottom: 40px;">Update Product</h1>

                    <form action="{{ url('/update_product_confirm', $product -> id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="di_design">
                            <label>Product Title : </label>
                            <input type="text" class="in_color" name="title" placeholder="Enter a title" required="" value="{{ $product -> title }}">
                        </div>

                        <div class="di_design">
                            <label>Product Description : </label>
                            <input type="text" class="in_color" name="description" placeholder="Enter a description" required="" value="{{ $product -> description }}">
                        </div>

                        <div class="di_design">
                            <label>Product Price : </label>
                            <input type="number" class="in_color" name="price" placeholder="Enter product price" required="" value="{{ $product -> price }}">
                        </div>

                        <div class="di_design">
                            <label>Discount Price : </label>
                            <input type="number" class="in_color" name="discount_price" placeholder="Enter discount price" value="{{ $product -> discount_price }}">
                        </div>

                        <div class="di_design">
                            <label>Product Quantity : </label>
                            <input type="number" class="in_color" name="quantity" min="0" placeholder="Enter product quantity" required="" value="{{ $product -> quantity}}">
                        </div>

                        <div class="di_design">
                            <label>Product Catagory: </label>
                            <select class="in_color" name="catagory" required="">
                                <option value="{{ $product -> catagory}}" selected="">{{ $product -> quantity}}</option>
                                @foreach ($catagory as $catagory)

                                <option value="{{ $catagory -> catagory_name}}">{{ $catagory -> catagory_name}}</option>

                                @endforeach

                            </select>
                        </div>

                        <div class="di_design">
                            <label>Current Product Image : </label>
                            <img height="100" width="100" style="margin: auto;" src="/product/{{ $product -> image }}">
                        </div>

                        <div class="di_design">
                            <label style="margin-left: 150px">Change Product Image : </label>
                            <input type="file" name="image">
                        </div>

                        <div class="di_design">
                            <input type="submit" value="Update Product" class="btn btn-primary">
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
