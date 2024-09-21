@extends('public.layouts.mainToCoLiTe')
@section('contentName')
        <title>Topic Listing Contact Page</title>
@endsection
@section('header')
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-5 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('public.index')}}">Homepage</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                    </ol>
                </nav>

                <h2 class="text-white">Testimonials</h2>
            </div>

        </div>
    </div>
</header>
@endsection

          
    @section('content')
            <section class="section-padding ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <h2 class="mb-4">What Our clients Says?</h2>
                        </div>
                    </div>
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($testmonials as $testmonial)
                            <div class="carousel-item {{$loop->first? 'active':''}}">
                                <div class="row mx-md-5">
                                    <div class="col-md-4 testimonials">
                                        <img class="d-block rounded-3"
                                            src="{{asset('admin/assets/images/testimonials/'. $testmonial['image'])}}"
                                            alt="First slide">
                                    </div>
                                    <div class="col-md-8 px-md-5 d-flex flex-column justify-content-center">
                                        <h3>{{$testmonial->name}}<br><strong class="date">{{$testmonial->created_at->format('d-m-Y')}}</strong></h3>
                                        <p class="text-muted">{{$testmonial->comment}}. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                    </div>
                </div>
            </section>
    @endsection
           
        