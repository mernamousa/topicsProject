
    @extends('public.layouts.mainToCoLiTe')
        @section('contentName')
        <title>Topic Listing Page</title>
        @endsection


        @section('header')

            <header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-5 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('public.index')}}">Homepage</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Topics Listing</li>
                                </ol>
                            </nav>

                            <h2 class="text-white">Topics Listing</h2>
                        </div>

                    </div>
                </div>
            </header>
        @endsection

          
        @section('content')

        <section class="section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h3 class="mb-4">Popular Topics</h3>
                        </div>
                        
                        <div class="col-lg-8 col-12 mt-3 mx-auto">
                            @foreach ($listeningTopics as $topic)
                            <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                                <div class="d-flex">
                                    <img src="{{asset('admin/assets/images/topics/'. $topic['image'])}}" class="custom-block-image img-fluid" alt="">

                                    <div class="custom-block-topics-listing-info d-flex">
                                        <div>
                                            <h5 class="mb-2">{{$topic->topicTitle}}</h5>

                                            <p class="mb-0">{{ Str::limit($topic->content, 100) }}...</p>

                                            <a href="{{route('public.topic.show',['id' => $topic->id])}}" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                                        </div>

                                        <span class="badge bg-design rounded-pill ms-auto">{{$topic->NoOfViews}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            
                        </div>

                        <div class="col-lg-12 col-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mb-0">
                                    @if($listeningTopics->count())
                                    {{ $listeningTopics->links('pagination::bootstrap-4') }}
                                     @else
                                    <p>No topics found.</p>
                                     @endif
                                    {{-- <li class="page-item">
                                        <a class="page-link" href="{{ $listeningTopics->links() }}" aria-label="Previous">
                                            <span aria-hidden="true">Prev</span>
                                        </a>
                                    </li> --}}
                                    
                                   {{--  @foreach($listeningTopics as $topic)
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    @endforeach  --}}              
    
                                    {{-- <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                        </a> --}}
                                    
                                    
                                    
                                    
                {{-- 
                <h1>Topics</h1>
                @if($topics->count())
                    <ul>
                        @foreach($topics as $topic)
                            <li>{{ $topic->title }}</li>
                        @endforeach
                    </ul>

                    <!-- Pagination Links -->
                    {{ $topics->links() }} <!-- This generates the pagination links -->
                @else
                    <p>No topics found.</p>
                @endif
                                                        
                                                        
                --}}
                                    {{-- </li> --}}
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
        </section>


        <section class="section-padding section-bg">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h3 class="mb-4">Trending Topics</h3>
                        </div>
                        @foreach($lisTrendingTopics as $latestTrend)
                        <div class="col-lg-6 col-md-6 col-12 mt-3 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="{{route('public.topic.show', ['id' => $latestTrend->id])}}">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">{{$latestTrend->topicTitle}}</h5>

                                            <p class="mb-0">{{ Str::limit($latestTrend->content, 70) }}...</p>
                                        </div>

                                        <span class="badge bg-finance rounded-pill ms-auto">{{$latestTrend->NoOfViews}}</span>
                                    </div>

                                    <img src="{{asset('admin/assets/images/topics/'.$latestTrend->image)}}" class="custom-block-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach

                        @foreach($lisTrendingTopic2 as $latestTrend2)
                        <div class="col-lg-6 col-md-6 col-12 mt-lg-3">
                            <div class="custom-block custom-block-overlay">
                                <div class="d-flex flex-column h-100">
                                    <img src="{{asset('admin/assets/images/topics/'.$latestTrend2->image)}}" class="custom-block-image img-fluid" alt="">

                                    <div class="custom-block-overlay-text d-flex">
                                        <div>
                                            <h5 class="text-white mb-2">{{$latestTrend2->topicTitle}}</h5>

                                            <p class="text-white">{{ Str::limit($latestTrend2->content, 70) }}...</p>

                                            <a href="{{route('public.topic.show', ['id' => $latestTrend2->id])}}" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                                        </div>

                                        <span class="badge bg-finance rounded-pill ms-auto">{{$latestTrend2->NoOfViews}}</span>
                                    </div>

                                    

                                    <div class="section-overlay"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
        </section>
        

        @endsection	