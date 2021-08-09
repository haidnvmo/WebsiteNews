@extends('layouts.frontend')

@section('content')
<main id="news-wrapper">
    <div class="container-master">
        <div class="news-head">
            <div class="news-head_left">
                <div class="item">
                    @if($getPost)
                    <div class="item-img">
                        <a href="{{ route('home.detail', $getPost->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$getPost->image) }}" alt=""></a>
                    </div>
                    <div class="item-body">
                        <h3 class="item-title"><a href="{{ route('home.detail', $getPost->slug) }}" title="">{{ $getPost->title }}</a></h3>
                        <h4 class="desc">{{ $getPost->description }}</h4>
                    </div>
                    @endif
                </div>
            </div>
            <div class="news-head_right">
                <div class="box-item">
                    <h2 class="box-title">Bài viết nổi bật</h2>
                    <div class="box-content">
                        @foreach ($getPostHighLights as $value)
                        <ul>
                            <li><a href="{{ route('home.detail', $value->slug) }}" title="">{{ $value->title }}</a></li>

                        </ul>
                        @endforeach

                    </div>
                </div>
                <div class="box-item">
                    <h2 class="box-title">Bài viết mới nhất</h2>
                    <div class="box-content">
                        @foreach ($getPostNews as $value)
                        <ul>
                            <li><a href="{{ route('home.detail', $value->slug) }}" title="">{{ $value->title }}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="news-list">
            <div class="news-list_left">
                <div class="box-item">
                    <div class="item">
                        @foreach ($getPostData as $value)
                            <span style="color:red; font-size:20px">{{ $value->categories->name }}</span><br>
                            <div class="item-img"><br>
                                <a href="{{ route('home.detail', $value->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$value->image) }}" alt=""></a> <br>
                            </div>
                            <br>
                            <div class="item-body">
                                <h3 class="item-title"><a href="{{ route('home.detail', $value->slug) }}" title="">{{ $value->title  }}</a></h3>
                                <h4 class="desc">
                                    {{ $value->description }}
                                </h4><br><br>
                            </div>
                        @endforeach
                    </div>
                </div>

                <span style="text-align: center;">{{ $getPostData->links() }}</span>
            </div>
            <div class="news-list_right">
                <div class="list-item">
                    @if($getPostHotNews)
                    <h3 class="list-title"><a href="{{ route('home.detail',$getPostHotNews->slug) }}" title="">{{ $getPostHotNews->categories->name }}</a></h3>
                    <div class="list-content">
                        <div class="list-content_left">
                            <div class="item">
                                <div class="item-img">
                                    <a href="{{ route('home.detail',$getPostHotNews->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$getPostHotNews->image) }}" alt=""></a>
                                </div>
                                <div class="item-body">
                                    <h4 class="item-title"><a href="{{ route('home.detail',$getPostHotNews->slug) }}" title="">{{ $getPostHotNews->title  }}</a></h4>

                                </div>
                            </div>
                        </div>

                        <div class="list-content_right">
                            <ul>
                                @foreach ($getPostHotNews1 as $value)
                                <li><a href="{{ route('home.detail',$value->slug) }}" title="">{{ $value->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="list-item">
                    @if($getPostSport)
                    <h3 class="list-title"><a href="{{ route('home.detail',$getPostSport->slug) }}" title="">{{ $getPostSport->categories->name }}</a></h3>
                    <div class="list-content">
                        <div class="list-content_left">
                            <div class="item">
                                <div class="item-img">
                                    <a href="{{ route('home.detail',$getPostSport->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$getPostSport->image) }}" alt=""></a>
                                </div>
                                <div class="item-body">
                                    <h4 class="item-title"><a href="{{ route('home.detail',$getPostSport->slug) }}" title="">{{ $getPostSport->title  }}</a></h4>

                                </div>
                            </div>
                        </div>
                        <div class="list-content_right">

                            <ul>
                                @foreach ($getPostSport1 as $value)
                                <li><a href="{{ route('home.detail',$value->slug) }}" title="">{{ $value->title }}</a></li>
                                @endforeach
                            </ul>

                        </div>
                        @endif
                    </div>
                </div>
                <div class="list-item">
                    @if($getPostCultural)
                    <h3 class="list-title"><a href="{{ route('home.detail',$getPostCultural->slug) }}" title="">{{ $getPostCultural->categories->name }}</a></h3>
                    <div class="list-content">
                        <div class="list-content_left">
                            <div class="item">
                                <div class="item-img">
                                    <a href="{{ route('home.detail',$getPostCultural->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$getPostCultural->image) }}" alt=""></a>
                                </div>
                                <div class="item-body">
                                    <h4 class="item-title"><a href="{{ route('home.detail',$getPostCultural->slug) }}" title="">{{ $getPostCultural->title  }}</a></h4>

                                </div>
                            </div>
                        </div>
                        <div class="list-content_right">
                            <ul>
                                @foreach ($getPostCultural1 as $value)
                                <span style="font-size:10px;">{{ $value->created_at }}</span>
                                <li><a href="{{ route('home.detail',$value->slug) }}" title="">{{ $value->title }}</a></li>

                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="list-item">
                    @if($getPostProject)
                    <h3 class="list-title"><a href="{{ route('home.detail',$getPostCultural->slug) }}" title="">{{ $getPostProject->categories->name }}</a></h3>
                    <div class="list-content">
                        <div class="list-content_left">
                            <div class="item">
                                <div class="item-img">
                                    <a href="{{ route('home.detail',$getPostCultural->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$getPostProject->image) }}" alt=""></a>
                                </div>
                                <div class="item-body">
                                    <h4 class="item-title"><a href="{{ route('home.detail',$getPostProject->slug) }}" title="">{{ $getPostProject->title  }}</a></h4>

                                </div>
                            </div>
                        </div>
                        <div class="list-content_right">
                            <ul>
                                @foreach ($getPostProject1 as $value)
                                <span style="font-size:10px;">{{ $value->created_at }}</span>
                                <li><a href="{{ route('home.detail',$value->slug) }}" title="">{{ $value->title }}</a></li>

                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
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