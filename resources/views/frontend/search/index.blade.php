@extends('layouts.frontend')

@section('content')
<main id="news-detail-wrapper">
    <section class="section-news-detail">
        <div class="container-master">
            <div class="news-detail">
                <div class="news-detail_left">

                    <div id="list-comment">
                        @foreach ($searchPostHome as $value)
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
                    <span class="ghim-title">Thông tin liên hệ:</span>
                    <div class="name">AFA Design - Thiết kế nội thất</div>
                    <ul>
                        <li><span>Hotline:</span> 0915 075 858</li>
                        <li><span>Email:</span> info@afa.com.vn</li>
                        <li><span>Address:</span> 27 Trần Duy Hưng, Trung Hòa, Cầu Giấy, Hà Nội.</li>
                    </ul>

                </div>

            </div>

        </div>
    </section>
</main>
@endsection
<script src="{{ asset('backend/js/jquery-1.8.3.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<script>
    $(document).ready(function() {
        $('#send-comment').click(function() {

            var content = $('#content-comment').val();
            var id_posts = $('#id_post').val();
            var url = $(this).attr('data-url');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    content,
                    id_posts
                },
                async: true,
                success: function(data) {
                    if (data.error) {
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