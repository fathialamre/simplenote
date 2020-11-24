<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سوق الدواء الليبي</title>
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
          integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('authstyles/css/login.css')}}">

    <link rel="stylesheet" href="{{asset('website/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/templatemo-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/js/select2/css/select2.min.css') }}"/>

</head>
<body dir="rtl">
<!-- Page Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">
            <i class="fas fa-store mr-2"></i>
            سوق الدواء الليبي
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-4 {{ (request()->is('home')) ? 'active' : '' }}"
                       href="{{route('home')}}">الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4 {{ (request()->is('ads')) ? 'active' : '' }}"
                       href="{{route('ads.index')}}">إعلاناتي</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3 {{ (request()->is('flowers')) ? 'active' : '' }}"
                       href="{{route('flowers')}}">المتابعون</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4 {{ (request()->is('seen')) ? 'active' : '' }}"
                       href="{{route('seen')}}">شوهد</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4 {{ (request()->is('profile')) ? 'active' : '' }}"
                       href="{{route('profile')}}">حسابي</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll"
     data-image-src="{{asset('website/img/rsz_hero.jpg')}}">
    <form class="d-flex tm-search-form">
        <input class="form-control tm-search-input" type="search" placeholder="بحث" aria-label="Search">
        <button class="btn btn-outline-success tm-search-btn" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>
