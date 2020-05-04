<!DOCTYPE html>
<html lang="az">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title','Diyetoloqum')-{{$config->title}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('front/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{asset('front/css/clean-blog.min.css')}}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{asset($config->favicon)}}"/>
    <style>

        body{
            font-family: "Times New Roman", Times, serif!important;

        }
    </style>


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        @if($config->logo!=null)

            <a class="navbar-brand"  href="{{route('homepage')}}" style="font-weight:400;font-style: normal;">
                <img src="{{asset($config->logo)}}" width="50" style="border-radius: 120px">
                {{$config->title}}
            </a>

        @else
            <a class="navbar-brand" href="{{route('homepage')}}" style="font-family: SansSerif!important;">  {{$config->title}}</a>

        @endif
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menyu
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('homepage')}}" style="font-family: Segoe UI!important;">Əsas Səhifə</a>
                </li>
               @foreach($pages as $page)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('page',$page->slug)}}" style="font-family: Segoe UI!important;">{{$page->title}}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}" style="font-family: Segoe UI!important;">Əlaqə</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->

<header class="masthead" style="background-image: url('@yield('bg',asset('front/img/a1.jpg'))');width: 100%;">

    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="site-heading">
                    <h3 style="font-family: Times New Roman!important; font-size:24px;) {


                        }">@yield('title')</h3>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content -->
<div class="container">
    <div class="row">
