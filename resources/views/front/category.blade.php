@extends('layouts.master')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{$category->imageUrl()}}');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h1 class="mb-3 bread">{{$category->name}}</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>{{$category->name}} <i class="ion-ios-arrow-forward"></i></span></p>
          <p class="breadcrumbs">
            {{$category->description}}
          </a>
        </div>
      </div>
    </div>
  </section>


<section class="ftco-section">
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                @foreach($category->posts as $post)
                    <div class="col-md-3 ftco-animate">
                        <div class="blog-entry">
                            <a href="{{$post->url()}}" class="img-2"><img src="{{$post->images()->get()[0]->imageUrl()}}" class="img-fluid" alt="Colorlib Template"></a>
                            <div class="text pt-3">
                                    <span class="ml-auto pl-3">{{$post->formattedDate()}}</span>
                                <p class="meta d-flex"><span class="pr-3">{{substr($post->content,100)}}</span></p>
                                <h3><a href="{{$post->url()}}">{{$post->title}} </a></h3>
                                <p class="mb-0"><a href="{{$post->url()}}" class="btn btn-black py-2">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
              <div class="col text-center">
                <div class="block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@append
