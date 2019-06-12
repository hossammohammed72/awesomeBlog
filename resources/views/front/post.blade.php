@extends('layouts.master')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{$post->images[0]->imageUrl()}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">{{$post->title}}</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{route('front.home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>{{$post->title}}<i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 order-lg-last ftco-animate">
            <h2 class="mb-3">{{$post->title}}</h2>
                <p>{{$post->content}}<p>
                @if(isset($post->images[1]))
                <img src="{{$post->images[1]->imageUrl()}}" alt="" class="img-fluid">
               @endif
                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                        @foreach($post->categories as $category)
                    <a href="{{$category->url()}}" class="btn btn-warning">{{$category->name}}</a>
                        
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 sidebar pr-lg-5 ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <ul class="categories">
                        <h3 class="heading mb-4">Categories</h3>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    for(var key in siteCategories)
        for(var count=0;count<siteCategories[key].length;count++){
            alert('hello');
        $('.categories').append('<li><a href="'+siteCategories[key][count].url+'">'+siteCategories[key][count].name+'<span>('+siteCategories[key][count].posts_count+')</span></a></li>');
        console.log(siteCategories[key][count].url);
        }
</script>
@append
