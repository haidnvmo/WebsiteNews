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


                        {{ $getDetail->description }}
                    </div>
                    <div class="post-ghim">
                        <p>{!! $getDetail->content !!}</p>


                        <div id="comment">
                            <form novalidate="novalidate"  method="POST" role="form" style="margin-top: 50px;">
                                {{ csrf_field() }}
                                <legend  style="margin-bottom:15px;" >Bình Luận</legend>
                                <input type="hidden" id="id_post" name="id_posts" value="{{ $getDetail->id }}" />
                                <textarea name="content" id="content-comment" class="form-control" rows="3" placeholder="Viết bình luận" required="required"></textarea>
                                <span id="error"></span>
                                <button type="button" data-url="{{ route('comment.create') }}" id="send-comment" class="btn btn-primary" style="margin-top: 10px;">Đăng</button>
                            </form>
                        </div>
                        <div id="list-comment">
                            @include('frontend.detail.commentList')
                        </div>
                        <span class="ghim-title">Thông tin liên hệ:</span>
                        <div class="name">AFA Design - Thiết kế nội thất</div>
                        <ul>
                            <li><span>Hotline:</span> 0915 075 858</li>
                            <li><span>Email:</span> info@afa.com.vn</li>
                            <li><span>Address:</span> 27 Trần Duy Hưng, Trung Hòa, Cầu Giấy, Hà Nội.</li>
                        </ul>

                    </div>

                </div>
                <div class="news-detail_right" >
                    <h2 class="title">Bài viết nổi bật</h2>
                    
                    <div class="content">

                        <div class="item">
                           
                            <div class="item-img">
                                <a href="{{ route('home.detail', $getPostHighLights1->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$getPostHighLights1->image) }}" alt=""></a>
                            </div>
                        </div>
                        @if ($getPostHighLights)
                            @foreach ($getPostHighLights as $value)
                                <ul>
                                    <li><a href="{{ route('home.detail', $value->slug) }}" title="">{{ $value->title }}</a></li>

                                </ul>
                            @endforeach
                        @endif
                    </div>
                    
                    <h2 class="title" style="margin: 10px;margin-top: 35px;">Bài viết mới nhất</h2>
                    
                    <div class="content">
                        <div class="item">              
                            <div class="item-img">
                                <a href="{{ route('home.detail', $getPostNews1->slug) }}" title="" class="imgc"><img src="{{ asset('storage/avatars/'.$getPostNews1->image) }}" alt=""></a>
                            </div>
                        </div>
                        @if ($getPostHighLights)
                        @foreach ($getPostNews as $value)
                        <ul>
                            <li><a href="{{ route('home.detail', $value->slug) }}" title="">{{ $value->title }}</a></li>
                        </ul>
                        @endforeach
                        @endif   
                    </div>
                                            
                </div>
                
            </div>
    </section>
</main>
@endsection
<script src="{{ asset('backend/js/jquery-1.8.3.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<script>
    $(document).ready(function() {
        $('#send-comment').click(function() {
            var content = $('#content-comment').val();
            var id_posts = $('#id_post').val();   
            var url = $(this).attr('data-url');
            // var username = "tien";
            // var password = "Admin@123";
            // var url = "http://18.141.185.142:2358/api/v1/auth/login";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    // 'Content-Type': 'Application/json',
                    // 'Accept' : 'application/json'
                }
            });            
            $.ajax({
                url:url,
                type: "POST",
                data:{
                    content,
                    id_posts
                },
                async: true,
                success: function(data) {
                    console.log(data);
                    if(data.error) { 
                        alertify.success(data.error);
                     
                    } else {
                        $("#list-comment be-comment").remove();
                        $("#list-comment").append(data.html);
                        $('#content-comment').val('')
                    }     
                }
            });
        });
    })
</script>