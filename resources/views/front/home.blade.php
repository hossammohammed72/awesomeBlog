@extends('layouts.master')

@section('content')

<section class="home-slider owl-carousel">
@foreach($topcategories as $category)
        @foreach($topcategories[0]->posts as $post)
        <div class="slider-item">
            <div class="container">
                <div class="row d-flex slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="img" style="background-image: url({{$post->imageUrl}});"></div>

                    <div class="text d-flex align-items-center ftco-animate">
                        <div class="text-2 pb-lg-5 mb-lg-4 px-4 px-md-5">
                            <h3 class="subheading mb-3"></h3>
                            <h1 class="mb-5">{{$post->title}}</h1>
                        <p class="mb-md-5">{{substr($post->content,50)}}</p>
                            <p><a href="{{$post->url}}" class="btn btn-black px-3 px-md-4 py-3">Read More <span class="icon-arrow_forward ml-lg-4"></span></a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    @endforeach
    </section>
</section>
@foreach($topcategories as $category)
<section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7 heading-section ftco-animate">
                    <h2 class="mb-4"><span>{{$category->name}}</span></h2>
                </div>
            </div>
                <div class="col-md-12">
                    <div class="row">
                @foreach($category->posts as $post)
                        <div class="col-md-6 ftco-animate">
                            <div class="blog-entry">
                                <a href="{{$post->url}}" class="img d-flex align-items-end" style="background-image: url({{$post->imageUrl}});">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text pt-3">
                                <p class="meta d-flex"><span class="pr-3">{{substr($post->content,100)}}</span><span class="ml-auto pl-3">{{$post->formattedDate()}}</span></p>
                                    <h3><a href="{{$post->url}}">{{$post->title}}</a></h3>
                                    <p class="mb-0"><a href="{{$post->url}}" class="btn-custom">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endforeach
@endsection
