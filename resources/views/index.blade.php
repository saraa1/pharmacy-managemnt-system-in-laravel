<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pharmacy Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/index/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/index/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/index/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/index/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/index/owl.theme.default.min.css')}}">


    <link rel="stylesheet" href="{{asset('css/index/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/index/style.css')}}">

</head>

<body>

<div class="site-wrap">


    <div class="site-navbar py-2">

        <div class="search-wrap">
            <div class="container">
                <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                <form action="#" method="post">
                    <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                </form>
            </div>
        </div>

        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo">
                    <div class="site-logo">
                        <a href="{{url('/')}}" class="js-logo-clone">Pharma</a>
                    </div>
                </div>
                <div class="main-nav d-none d-lg-block">
                    <nav class="site-navigation text-right text-md-center" role="navigation">
                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="active"><a href="{{url('/')}}">Home</a></li>
                            @if (Auth::guest())
                                <li class="">
                                    <a href="{{route('login')}}">Login</a>

                                </li>

                                <li class="has-children">
                                    <a href="#">Register</a>
                                    <ul class="dropdown">
                                        <li><a href="{{route('register','1')}}">Staff</a></li>
                                        <li><a href="{{route('register','2')}}">Customer</a></li>

                                    </ul>
                                </li>

                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>

                                            <a class="ml-2" href="{{ url('/logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif


                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="site-blocks-cover" style="background-image: url({{asset('images/hero_1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                    <div class="site-block-cover-content text-center">
                        <h2 class="sub-title">Effective Medicine, New Medicine Everyday</h2>
                        <h1>Welcome To Pharma</h1>

                        {{--                        <p>--}}
                        {{--                            <a href="" class="btn btn-primary px-5 py-3">Shop Now</a>--}}
                        {{--                        </p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row align-items-stretch section-overlap">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap bg-primary h-100">
                        <a href="#" class="h-100">
                            <h5>Free <br> Shipping</h5>
                            {{--                            <p>--}}
                            {{--                                Amet sit amet dolor--}}
                            {{--                                <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>--}}
                            {{--                            </p>--}}
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap h-100">
                        <a href="#" class="h-100">
                            <h5>Season <br> Sale 50% Off</h5>
                            {{--                            <p>--}}
                            {{--                                Amet sit amet dolor--}}
                            {{--                                <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>--}}
                            {{--                            </p>--}}
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap bg-warning h-100">
                        <a href="#" class="h-100">
                            <h5>Buy <br> A Gift Card</h5>
                            {{--                            <p>--}}
                            {{--                                Amet sit amet dolor--}}
                            {{--                                <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>--}}
                            {{--                            </p>--}}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase">Popular Products</h2>
                </div>
            </div>

            <div class="row">
                @if(count($inventory)>0)
                    @foreach($inventory as $inventory)
                        @if($inventory->available_quantity>0)
                            <div class="col-sm-6 col-lg-4 mb-4 text-center">

                                {{--                        <div class="col-sm-6 col-lg-4 text-center item mb-4">--}}

                                <a href=""> <img height="300" width="250"
                                                 src="{{asset($inventory->medicine->image ? '/images/'.$inventory->medicine->image->path : "https://placehold.it/400x400")}}"
                                                 alt="Image"></a>
                                <h3 class="text-black-50"><a href="">{{$inventory->medicine->name}}</a></h3>
                                <p class="price">{{$inventory->medicine->price}} PKR</p>

                            </div>
                        @else
                            <div class="col-sm-6 col-lg-4 mb-4 text-center">
                                <span class="tag">Out Of Stock</span>

                                {{--                        <div class="col-sm-6 col-lg-4 text-center item mb-4">--}}

                                <a href=""> <img class="ml-3" height="300" width="250"
                                                 src="{{asset($inventory->medicine->image ? '/images/'.$inventory->medicine->image->path : "https://placehold.it/400x400")}}"
                                                 alt="Image"></a>
                                <h3 class="text-black-50"><a href="">{{$inventory->medicine->name}}</a></h3>
                                <p class="price">{{$inventory->medicine->price}} PKR</p>

                            </div>


                        @endif
                    @endforeach
                @else
                    <div class="col-sm-6 col-lg-4 text-center item mb-4">
                        <span class="tag">Sale</span>
                        <a href=""> <img src="{{asset('images/product_01.png')}}" alt="Image"></a>
                        <h3 class="text-dark"><a href="">Bioderma</a></h3>
                        <p class="price">
                            <del>95.00</del> &mdash; $55.00
                        </p>
                    </div>
                    <div class="col-sm-6 col-lg-4 text-center item mb-4">
                        <a href=""> <img src="{{asset('images/product_02.png')}}" alt="Image"></a>
                        <h3 class="text-dark"><a href="">Chanca Piedra</a></h3>
                        <p class="price">$70.00</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 text-center item mb-4">
                        <a href=""> <img src="{{asset('images/product_03.png')}}" alt="Image"></a>
                        <h3 class="text-dark"><a href="">Umcka Cold Care</a></h3>
                        <p class="price">$120.00</p>
                    </div>

                    <div class="col-sm-6 col-lg-4 text-center item mb-4">

                        <a href=""> <img src="{{asset('images/product_04.png')}}" alt="Image"></a>
                        <h3 class="text-dark"><a href="">Cetyl Pure</a></h3>
                        <p class="price">
                            <del>45.00</del> &mdash; $20.00
                        </p>
                    </div>
                    <div class="col-sm-6 col-lg-4 text-center item mb-4">
                        <a href=""> <img src="{{asset('images/product_05.png')}}" alt="Image"></a>
                        <h3 class="text-dark"><a href="">CLA Core</a></h3>
                        <p class="price">$38.00</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 text-center item mb-4">
                        <span class="tag">Sale</span>
                        <a href=""> <img src="{{asset('images/product_06.png')}}" alt="Image"></a>
                        <h3 class="text-dark"><a href="">Poo Pourri</a></h3>
                        <p class="price">
                            <del>$89</del> &mdash; $38.00
                        </p>
                    </div>
                @endif

            </div>
            @if(Auth::check())

                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <a href="{{route('medicine.index')}}" class="btn btn-primary px-4 py-3">View All Products</a>
                    </div>
                </div>
            @else
                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <a href="{{url('/login')}}" class="btn btn-primary px-4 py-3">View All Products</a>
                    </div>
                </div>

            @endif
        </div>
    </div>


    {{--    <div class="site-section bg-light">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row panel panel-default">--}}
    {{--                <div class="title-section panel-heading text-center col-12">--}}
    {{--                    <h2 class="text-uppercase">Comment Section </h2>--}}
    {{--                </div>--}}
    {{--                <div class="panel-body col-12">--}}

    {{--                @if(Auth::check())--}}

    {{--                    <!-- Comments Form -->--}}
    {{--                        @if(Session::has('comment_msg'))--}}
    {{--                            <p class="bg-dark text-white">{{session('comment_msg')}} </p>--}}

    {{--                        @endif--}}

    {{--                        <h5 class="card-header col-12">Leave a Comment:</h5>--}}


    {{--                        {!! Form::open(['method'=>'POST','action'=>'CommentController@store']) !!}--}}
    {{--                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">--}}


    {{--                        <div class="form-group card-body">--}}

    {{--                            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}--}}
    {{--                        </div>--}}
    {{--                        @if ($errors->has('body'))--}}
    {{--                            <span class="help-block text-danger">--}}
    {{--                                        <strong>{{ $errors->first('body') }}</strong>--}}
    {{--                                    </span>--}}
    {{--                        @endif--}}
    {{--                        <div class="form-group card-footer ">--}}
    {{--                            {!! Form::submit('Comment',['class'=>'btn btn-info pull-right']) !!}--}}
    {{--                        </div>--}}
    {{--                        {!! Form::close() !!}--}}
    {{--                    @endif--}}
    {{--                    @if(count($comment)>0)--}}
    {{--                        @foreach($comment as $comment)--}}

    {{--                        <!-- Single Comment -->--}}
    {{--                            <div class="media mb-4">--}}
    {{--                                <img height="50" class="rounded-circle"--}}
    {{--                                     src="{{'https://placehold.it/400x400'}}"--}}

    {{--                                     alt="">--}}
    {{--                                <div class="media-body">--}}
    {{--                                    <h5 class="mt-0 ml-2">{{$comment->name}}--}}
    {{--                                        <small>--}}
    {{--                                            {{$comment->created_at->diffForHumans()}}--}}
    {{--                                        </small></h5>--}}
    {{--                                    <p class="ml-2">{{$comment->body}}</p>--}}

    {{--                                    <!-- Nested Comment -->--}}

    {{--                                    @if(count(($reply=\App\CommentReplies::where('comment_id',$comment->id)->get()))> 0)--}}
    {{--                                        @foreach($reply as $replies)--}}


    {{--                                            <div class="media mt-4">--}}
    {{--                                                <img height="50" class="d-flex mr-3 rounded-circle"--}}
    {{--                                                     src="{{asset($replies->photo ? $replies->photo : "https://placeholder.it/40x40")}}"--}}
    {{--                                                     alt="">--}}
    {{--                                                <div class="media-body">--}}
    {{--                                                    <h5 class="media-heading">--}}
    {{--                                                        <small>{{$replies->created_at->diffForHumans()}}</small>--}}
    {{--                                                    </h5>--}}
    {{--                                                    <p>{{$replies->body}}</p>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}

    {{--                                        @endforeach--}}
    {{--                                    @endif--}}

    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        @endforeach--}}
    {{--                        @if(Auth::check())--}}
    {{--                            @if(Session::has('reply_msg'))--}}
    {{--                                <p class="bg-dark text-white"> {{session('reply_msg')}}</p>--}}
    {{--                            @endif--}}
    {{--                            <div class="comment-reply-container">--}}
    {{--                                <div class="comment-reply col-12 ">--}}

    {{--                                    {!! Form::open(['method'=>'POST','action'=>'CommentReplyController@store']) !!}--}}
    {{--                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">--}}

    {{--                                    <div class="form-group card-body">--}}
    {{--                                        {!! Form::label('body','Reply:') !!}--}}
    {{--                                        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}--}}
    {{--                                    </div>--}}
    {{--                                    <div class="form-group card-footer pull-right">--}}
    {{--                                        {!! Form::submit('Reply',['class'=>'btn btn-info']) !!}--}}
    {{--                                    </div>--}}
    {{--                                    {!! Form::close() !!}--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        @endif--}}
    {{--                    @endif--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}




    {{--            <div class="row">--}}
    {{--                <div class="col-md-12 block-3 products-wrap">--}}

    {{--                    <div class="nonloop-block-3 owl-carousel">--}}

    {{--                        @foreach($medicine as $med)--}}

    {{--                        <div class="text-center item m-4">--}}

    {{--                            <a href="shop-single.html">--}}
    {{--                                <img height="350" width="250"  src="{{asset($med->image ? '/images/'.$med->image->path : "https://placehold.it/400x400")}}" alt="">--}}
    {{--                            </a>--}}
    {{--                            <h3 class="text-dark"><a href="shop-single.html">{{$med->name}}</a></h3>--}}
    {{--                            <p class="price">{{$med->price}} PKR</p>--}}

    {{--                        </div>--}}


    {{--                        <div class="text-center item mb-4">--}}
    {{--                            <a href="shop-single.html"> <img src="{{asset('images/product_01.png')}}" alt="Image"></a>--}}
    {{--                            <h3 class="text-dark"><a href="shop-single.html">Umcka Cold Care</a></h3>--}}
    {{--                            <p class="price">$120.00</p>--}}
    {{--                        </div>--}}

    {{--                        <div class="text-center item mb-4">--}}
    {{--                            <a href="shop-single.html"> <img src="{{asset('images/product_02.png')}}" alt="Image"></a>--}}
    {{--                            <h3 class="text-dark"><a href="shop-single.html">Umcka Cold Care</a></h3>--}}
    {{--                            <p class="price">$120.00</p>--}}
    {{--                        </div>--}}

    {{--                        <div class="text-center item mb-4">--}}
    {{--                            <a href="shop-single.html"> <img src="{{asset('images/product_04.png')}}" alt="Image"></a>--}}
    {{--                            <h3 class="text-dark"><a href="shop-single.html">Umcka Cold Care</a></h3>--}}
    {{--                            <p class="price">$120.00</p>--}}
    {{--                        </div>--}}
    {{--                        @endforeach--}}

    {{--                    </div>--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


</div>


<div class="site-section " style="background-image: url({{'bg_1.jpg'}})">
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-12 mb-5 mb-lg-0">
                <a style="background-color: #0c7cd5;">
                    <div class="banner-1-inner  align-self-center">
                        <div class="title-section panel-heading ">

                            <h2 class="text-uppercase">Comment Section </h2>
                        </div>
                        <div class="panel-body text-black col-12">

                            @if(Auth::check())

                                @if(Session::has('comment_msg'))
                                    <p class="bg-dark text-white">{{session('comment_msg')}} </p>

                                @endif

                                <h5 class="card-header  col-12">Leave a Comment:</h5>


                                {!! Form::open(['method'=>'POST','action'=>'CommentController@store']) !!}
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


                                <div class="form-group card-body">

                                    {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
                                </div>
                                @if ($errors->has('body'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group card-footer ">
                                    {!! Form::submit('Comment',['class'=>'btn btn-info pull-right']) !!}
                                </div>
                                {!! Form::close() !!}



                            @endif





                        <!-- Comments Form -->
                            @if(count($comment)>0)
                                @foreach($comment as $key=> $comment)

                                <!-- Single Comment -->
                                    <div class="media m-4 col-12">
                                        <img height="50" class="rounded-circle"
                                             src="{{'https://placehold.it/400x400'}}"

                                             alt="">
                                        <div class="media-body">
                                            <h5 class="mt-0 text-black ml-2">{{$comment->name}}
                                                <small>
                                                    {{$comment->created_at->diffForHumans()}}
                                                </small></h5>
                                            <p class="ml-2 text-black">{{$comment->body}}</p>
                                            <div class="group-inline text-black">
                                                @if(count(($reply=\App\CommentReplies::where('comment_id',$comment->id)->get()))> 0)
                                                    <button type="button" class="btn btn-white text-black "
                                                            data-toggle="collapse" data-target="#view{{$key}}">View
                                                        Replies
                                                    </button>

                                                    <div id="view{{$key}}" class="collapse">
                                                        @foreach($reply as $replies)


                                                            <div class="media mt-4 col-12">
                                                                <img height="50" class="rounded-circle"
                                                                     src="{{'https://placehold.it/400x400'}}"
                                                                     alt="">
                                                                <div class="media-body">
                                                                    <h5 class="media-heading text-black ml-2">{{$replies->name}}
                                                                        <small>{{$replies->created_at->diffForHumans()}}</small>
                                                                    </h5>
                                                                    <p class="ml-2">{{$replies->body}}</p>
                                                                </div>
                                                            </div>

                                                        @endforeach
                                                    </div>
                                                @endif


                                                @if(Auth::check())
                                                    <button type="button" class="btn btn-white text-black ml-2 "
                                                            data-toggle="collapse" data-target="#demo{{$key}}">Reply
                                                    </button>
                                                    <div id="demo{{$key}}" class="collapse">

                                                        @if(Session::has('reply_msg'))
                                                            <p class="bg-dark text-white"> {{session('reply_msg')}}</p>
                                                        @endif
                                                        <div class="comment-reply-container">
                                                            <div class="comment-reply col-12 ">

                                                                {!! Form::open(['method'=>'POST','action'=>'CommentReplyController@store']) !!}
                                                                <input type="hidden" name="comment_id"
                                                                       value="{{$comment->id}}">

                                                                <div class="form-group card-body">
                                                                    {!! Form::label('body','Reply:') !!}
                                                                    {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                                                                </div>
                                                                <div class="form-group card-footer">
                                                                    {!! Form::submit('Reply',['class'=>'btn btn-info pull-right']) !!}
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>


                                                        @endif
                                                    </div>
                                            </div>


                                            <!-- Nested Comment -->


                                        </div>
                                    </div>
                                @endforeach
                                @else
                                <h3>No Comments Right now</h3>

                            @endif
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
                <h2 class="text-uppercase">Team Member</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center products-wrap">
                {{--                    <div class="nonloop-block-3 no-direction owl-carousel">--}}

                <div class="testimony">
                    <blockquote>
                        <img src="{{asset('images/jasim.JPG')}}" alt="Image"
                             class="  img-fluid w-25 mb-4 rounded-circle">
                        <p>&ldquo;Jasim Nawab &rdquo;</p>
                        <p>2016-EE-131</p>
                    </blockquote>

                </div>

            </div>
        </div>
    </div>
</div>


<footer class="site-footer" style="background-color: lightgreen">

    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-4 ml-4 mb-4 mb-lg-0">

                <div class="block-7">
                    <h1 class="footer-heading  mb-4">About Us</h1>
                    <p class="text-black">The pharmacy management system serves many purposes,
                        like customer can find desired medicines here as well as customer
                        can order its desired medicines and we guarantee original medicines.
                        We ensure fast delivery also. </p>
                </div>

            </div>


            <div class="col-md-7 pull-right ml-4 col-lg-4">
                <div class="block-5 mb-5">
                    <h3 class="footer-heading text-black mb-4">Contact Info</h3>
                    <ul class="text-black list-unstyled">
                        <li class="text-black address">UET,Lahore</li>
                        <li class="text-black phone">0332592969+</li>
                        <li class="text-black email">jasim.nawab@gmail.com</li>
                    </ul>
                </div>


            </div>
        </div>

    </div>

</footer>


<script src="{{asset('js/index/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/index/jquery-ui.js')}}"></script>
<script src="{{asset('js/index/popper.min.js')}}"></script>
<script src="{{asset('js/index/bootstrap.min.js')}}"></script>
<script src="{{asset('js/index/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/index/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/index/aos.js')}}"></script>

<script src="{{asset('js/index/main.js')}}"></script>


</body>

</html>