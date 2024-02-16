<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .di_center
        {
            text-align: center;
            padding-top: 40px;
        }
        .label1
        {
            font-size: 40px;
            padding-bottom: 30px;
        }
        .center{
            margin: auto;
            margin-top: 30px;
            width: 65%;
            text-align: center;
            border: 3px solid orange;
        }
        tr
        {
            border: 3px solid orange;
        }
        td
        {
            border: 3px solid orange;
            padding: 5px;
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

                    <div class="di_center">
                        <h2 class="label1">Add Catagory</h2>
                        <form action="{{ url('/add_catagory') }}" method="POST">

                            @csrf
                            <input style="color: black" type="text" name="catagory" placeholder="Enter Catagory Name">
                            <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
                        </form>
                    </div>

                    <table class="center">
                        <tr>
                            <td>Catagory Name</td>
                            <td>Action</td>
                        </tr>

                        @foreach ($data as $data)

                        <tr>
                            <td>{{ $data -> catagory_name}}</td>
                            <td><a onclick="return confirm('Are You Sure To Delete This?')" class="btn btn-danger" href="{{ url('delete_catagory', $data -> id)}}">Delete</a></td>
                        </tr>
                        @endforeach

                    </table>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
