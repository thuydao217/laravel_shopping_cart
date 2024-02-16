<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')
    <style type="text/css">
    label
    {
        display:inline-block ;
        width: 160px;
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
                <h1 style="text-align: center; font-size: 25px; padding-top:30px; padding-bottom:30px">Send Email to {{ $order -> email }}</h1>

                <form action="{{ url('send_user_email', $order -> id) }}" method="POST">

                    @csrf
                    <div style="padding-left: 35%; padding-bottom: 10px ">
                        <label for="">Email Greeting : </label>
                        <input style="color: black" type="text" name="greeting" placeholder="Enter Greeting">
                    </div>
                    <div style="padding-left: 35%; padding-bottom: 10px ">
                        <label for="">Email First Line : </label>
                        <input style="color: black" type="text" name="firstline" placeholder="Enter Fisrt Line">
                    </div>
                    <div style="padding-left: 35%; padding-bottom: 10px ">
                        <label for="">Email Body : </label>
                        <input style="color: black" type="text" name="body" placeholder="Enter Body">
                    </div>
                    <div style="padding-left: 35%; padding-bottom: 10px ">
                        <label for="">Email Button Name : </label>
                        <input style="color: black" type="text" name="button" placeholder="Enter Button Name">
                    </div>
                    <div style="padding-left: 35%; padding-bottom: 10px ">
                        <label for="">Email URL : </label>
                        <input style="color: black" type="text" name="URL" placeholder="Enter URL">
                    </div>
                    <div style="padding-left: 35%; padding-bottom: 10px ">
                        <label for="">Email Last Line : </label>
                        <input style="color: black" type="text" name="lastline" placeholder="Enter Last Line">
                    </div>
                    <div style="padding-left: 35%; padding-bottom: 10px ">
                        <label for="">Email Last Line : </label>
                        <input type="submit" value="Send Email" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
