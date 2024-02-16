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
   </head>
   <body>
      <div class="hero_area">
        @include('sweetalert::alert')
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
        @include('home.why')
      <!-- end why section -->

      <!-- arrival section -->
        @include('home.arrival')
      <!-- end arrival section -->

      <!-- product section -->
        @include('home.product')
      <!-- end product section -->

      <!-- comment and reply system start here -->
      <div style="text-align:center; padding-bottom:30px">
        <h1 style="font-size: 30px; text-align: center; padding: 20px 0 20px 0;">Comment</h1>
        <form action="{{ url('add_comment') }}" method="POST">

            @csrf
            <textarea style="height: 150px; width: 600px; border-radius: 10px; resize: none" placeholder="Comment something here" name="comment"></textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="Comment">
        </form>
      </div>

      <div style="padding-left: 20%">
        <h1 style="font-size: 20px; padding-bottom: 20px;">All Comments</h1>
        @foreach ($comment as $comment)

        <div>
            <b>{{ $comment -> name }}</b>
            <p>{{ $comment -> comment }}</p>
            <a style="color: blue" href="javascript::void(0);" onclick="reply(this)" data-commentid="{{ $comment -> id }}">Reply</a>
            @foreach ($reply as $rep)
            @if ($rep -> comment_id == $comment -> id)

            <div style="padding-left: 3%; padding-bottom: 10px;">
                <b>{{ $rep -> name }}</b>
                <p>{{ $rep -> reply }}</p>
                <a style="color: blue" href="javascript::void(0);" onclick="reply(this)" data-commentid="{{ $comment -> id }}">Reply</a>
            </div>
            @endif
            @endforeach
        </div>

        @endforeach
        <!-- Reply Textbox-->
        <div class="replydiv" style="display: none" >
          <form action="{{ url('add_reply') }}" method="POST">
            @csrf
            <input type="text" id="commentid" name="commentid" hidden>
            <textarea name="reply" autocapitalize="none" style="width: 500px; height: 100px; resize: none; border-radius: 10px" placeholder="Write something here"></textarea>
            <br>
            <button type="submit" class="btn btn-warning">Reply</button>
            <a href="javascript:void(0)" class="btn" onclick="reply_close(this)">Close</a>
          </form>
        </div>
        <!-- End Reply Textbox-->
      </div>

      <!-- comment and reply system end here -->
      <!-- subscribe section -->
        @include('home.subcribe')
      <!-- end subscribe section -->
      <!-- client section -->
        @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
        @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

           Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
     </div>
     <!-- jQery -->
     <script type="text/javascript">
        function reply(caller)
        {
            document.getElementById('commentid').value = $(caller).attr('data-commentid');
            $('.replydiv').insertAfter($(caller));
            $('.replydiv').show();
        }
        function reply_close(caller)
        {
            $('.replydiv').hide();
        }
    </script>
     <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
     <script src="home/js/jquery-3.4.1.min.js"></script>
     <!-- popper js -->
     <script src="home/js/popper.min.js"></script>
     <!-- bootstrap js -->
     <script src="home/js/bootstrap.js"></script>
     <!-- custom js -->
     <script src="home/js/custom.js"></script>
  </body>
</html>
