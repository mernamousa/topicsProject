<section class="featured-section">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                @foreach($featuredSectionTopic1 as $topic)
                <div class="custom-block bg-white shadow-lg">
                    <a href="{{route('public.topic.show',['id' => $topic->id])}}">
                        <div class="d-flex">
                            <div>
                                

                                <h5 class="mb-2">{{$topic->topicTitle}}</h5>

                                <p class="mb-0">{{ Str::limit($topic->content, 100) }}...</p>
                            </div>

                            <span class="badge bg-design rounded-pill ms-auto">{{$topic->NoOfViews}}</span>
                        </div>

                        <img src="{{asset('admin/assets/images/topics/'.$topic->image)}}"
                            class="custom-block-image img-fluid" alt="">
                    </a>
                </div>
            </div>
            @endforeach
           
            <div class="col-lg-6 col-12">
                <div class="custom-block custom-block-overlay">
                    @foreach($featuredSectionTopic2 as $topic)
                    <div class="d-flex flex-column h-100">
                        <img src="{{asset('admin/assets/images/topics/'. $topic['image'])}}"
                            class="custom-block-image img-fluid" alt="">

                        <div class="custom-block-overlay-text d-flex">
                            <div>
                                
                                <h5 class="text-white mb-2">{{$topic->topicTitle}}</h5>

                                <p class="text-white">{{ Str::limit($topic->content, 100) }}...</p>

                                <a href="{{route('public.topic.show',['id' => $topic->id])}}" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                            </div>

                            <span class="badge bg-finance rounded-pill ms-auto">{{$topic->NoOfViews}}</span>
                        </div>
                        
                        <div class="social-share d-flex">
                            <p class="text-white me-4">Share:</p>

                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-pinterest"></a>
                                </li>
                            </ul>

                            <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                        </div>

                        <div class="section-overlay"></div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>