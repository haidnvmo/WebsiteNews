@extends('layouts.frontend')

@section('content')
<main id="news-detail-wrapper">
    <section class="section-news-detail">
        <div class="container-master">
            <div class="news-detail">
                <div class="news-detail_left">
                    <h1 class="title">{{ $getDetail->categories->name }}</h1>
                    <h2 class="title-detail"></h2>
                    
                    <div class="post-content">
                        <h2>{{ $getDetail->title }}</h2><br>
                        <div style="text-align: center;margin-bottom: 20px;"><img style="width: 100%;" src="{{ asset('storage/avatars/'.$getDetail->image) }}" alt=""></div><br>
                        
                        <div style="text-align: center;"><img style="width: 100%;" src="" alt=""></div>
                        {{ $getDetail->description }}
                    </div>
                    <div class="post-ghim">
                        <p>{!! $getDetail->content !!}</p>
                        <span class="ghim-title">Thông tin liên hệ:</span>
                        <div class="name">AFA Design - Thiết kế nội thất</div>
                        <ul>
                            <li><span>Hotline:</span> 0915 075 858</li>
                            <li><span>Email:</span> info@afa.com.vn</li>
                            <li><span>Address:</span> 27 Trần Duy Hưng, Trung Hòa, Cầu Giấy, Hà Nội.</li>
                        </ul>
                    </div>
                </div>
                <div class="news-detail_right">
                    <h2 class="title">Bài viết nổi bật</h2>
                    @if ($getPostHighLights)
                    <div class="content">
                       
                        <div class="item">
                            @foreach ($getPostHighLights as $value)
                            <div class="item-img">
                                <a href="{{ route('home.detail', $value->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$value->image) }}" alt=""></a>
                            </div>                        
                        </div>
                        <ul>
                            <li><a href="{{ route('home.detail', $value->slug) }}" title="">{{ $value->title }}</a></li>
                           
                        </ul>
                        @endforeach
                       
                    </div>
                  @endif                    
                </div>
            </div>
        </div>
    </section>
</main>

<div class="action-fixed">
    <ul>
        <li><a href="" title=""><img src="images/icon/s5.png" alt=""></a></li>
        <li><a href="" title=""><img src="images/icon/s4.png" alt=""></a></li>
        <li><a href="" title=""><img src="images/icon/s3.png" alt=""></a></li>
        <li><a href="" title=""><img src="images/icon/s2.png" alt=""></a></li>
        <li><a href="" title=""><img src="images/icon/s1.png" alt=""></a></li>
    </ul>
</div>

@endsection