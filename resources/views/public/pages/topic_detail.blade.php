@extends('public.layouts.mainToCoLiTe')
        @section('contentName')

        <title>Topic Detail Page</title>

        @endsection

        @section('header')

            <header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row justify-content-center align-items-center">

                        <div class="col-lg-5 col-12 mb-5">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('public.index')}}">Homepage</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">{{$topic->topicTitle}}</li>
                                </ol>
                            </nav>

                            <h2 class="text-white">Introduction to <br> {{$topic->topicTitle}}</h2>

                            <div class="d-flex align-items-center mt-5">
                                <a href="#topics-detail" class="btn custom-btn custom-border-btn smoothscroll me-4">Read More</a>
                                <a href="#" class="custom-icon bi-bookmark smoothscroll"></a>
                               {{-- noOfviews --}}
                                {{-- <p>Views: <span id="views-count">{{ $topic->NoOfViews }}</span></p>
 
                                <button id="increment-views-button">Increase Views</button>
                            
                                <script>
                                    $(document).ready(function() {
                                        $('#increment-views-button').click(function() {
                                            $.ajax({
                                                url: '{{ route('topics.incrementViews', $topic->id) }}',
                                                type: 'POST',
                                                data: {
                                                    _token: '{{ csrf_token() }}',
                                                },
                                                success: function(response) {
                                                    $('#views-count').text(response.views);
                                                },
                                                error: function(xhr) {
                                                    console.log('An error occurred:', xhr);
                                                }
                                            });
                                        });
                                    });
                                </script> --}}
                                  
                            </div>
                        </div>

                        <div class="col-lg-5 col-12">
                            <div class="topics-detail-block bg-white shadow-lg">
                                <img src="{{asset('admin/assets/images/topics/'.$topic->image)}}" class="topics-detail-block-image img-fluid">
                            </div>
                        </div>

                    </div>
                </div>
            </header>
        @endsection

        @section('content')
            <section class="topics-detail-section section-padding" id="topics-detail">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 m-auto">
                            <h3 class="mb-4">{{$topic->topicTitle}}</h3>


                            <p>{{$topic->content}}</p>

                        </div>

                    </div>
                </div>
            </section>


            <section class="section-padding section-bg">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-5 col-12">
                            <img src="{{asset('public/images/rear-view-young-college-student.jpg')}}" class="newsletter-image img-fluid" alt="">
                        </div>

                        <div class="col-lg-5 col-12 subscribe-form-wrap d-flex justify-content-center align-items-center">
                            <form class="custom-form subscribe-form" action="#" method="post" role="form">
                                <h4 class="mb-4 pb-2">Get Newsletter</h4>

                                <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address" required="">

                                <div class="col-lg-12 col-12">
                                    <button type="submit" class="form-control">Subscribe</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        @endsection
		
