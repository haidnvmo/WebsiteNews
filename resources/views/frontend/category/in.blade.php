@extends('layouts.frontend')

@section('content')
<style>
.des-post{ 
    overflow: hidden;
    width: 350px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}

</style>
<main id="news-wrapper">
    <div class="container-master">
        <h1 class="news-title">{{ $category->name }}</h1>
        <div class="news-head">
            <div class="news-head_left">
                @if ($posts)
                    @foreach ($posts as $value)
                        <div class="item" style="min-height: 230px;">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="float: left;">
                                    <div class="item-img">
                                        <a href="{{ route('home.detail',$value->slug) }}" rel="follow"  class="img"><img src="{{ asset('storage/avatars/'.$value->image) }}" alt="" style="max-height:194px;width: 100%;object-fit: cover;"></a>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="float: left;">
                                    <div class="item-body" style="padding-top:0px;">
                                        <h3 class="item-title"><a href="{{ route('home.detail',$value->slug) }}" rel="follow" >{{ $value->title }}</a></h3>
                                        <p class="des-post">{{ $value->description }}</p>
                                        <h4 class="desc"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="news-head_right">
                <div class="box-item">
                    <h2 class="box-title">Bài viết nổi bật</h2>
                    <div class="box-content">
                        @foreach ($getPostHighLights as $value)
                        <ul>
                            <li><a href="{{ route('home.detail',$value->slug) }}" rel="follow" title="Văn phòng mở - kẻ thù của các CEO">{{ $value->title }} </a></li>
                        </ul>
                        @endforeach

                    </div>
                </div>
                <div class="box-item">
                    <h2 class="box-title">Bài viết mới nhất</h2>
                    <div class="box-content">
                        @foreach ($getPostNews as $value)
                        <ul>
                            <li><a href="{{ route('home.detail',$value->slug) }}" rel="follow" title="WHEN YOU SUSTAIN YOUR RESOURCES, THEY SUSTAIN YOU.">{{ $value->title }}</a></li>

                        </ul>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</main>
</div>
@endsection