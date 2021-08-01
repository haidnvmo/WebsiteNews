@extends('layouts.frontend')

@section('content')
<main id="news-wrapper">
    <div class="container-master">

        <h1 class="news-title">{{ $category->name }}</h1>

        <div class="news-head">
            <div class="news-head_left">
                @if ($posts)
                    @foreach ($posts as $value)
                    <div class="item">
                        <div class="item-img">
                            <a href="{{ route('home.detail',$value->slug) }}" rel="follow" title="Học ngay cách thiết kế mô hình văn phòng hiện đại của người Nhật" class="imgc"><img src="{{ asset('storage/avatars/'.$value->image) }}" alt="" title=""></a>
                        </div>
                        <div class="item-body">
                            <h3 class="item-title"><a href="{{ route('home.detail',$value->slug) }}" rel="follow" title="Học ngay cách thiết kế mô hình văn phòng hiện đại của người Nhật">{{ $value->title }}</a></h3>
                            <h4 class="desc"></h4>
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
<div class="container-master">
    <h1 class="research-title">Ebook</h1>
    <div class="post-content">
        Cuộc sống công sở chốn văn phòng chiếm tối thiểu từ 8 tiếng hoặc hơn nữa mỗi ngày. Có thể nói, văn phòng dường như trở thành ngôi nhà thứ hai của chúng ta. Cũng chính bởi vậy mà chất lượng không gian làm việc có tác động và ảnh hưởng lớn tới hiệu quả lao động nói riêng và thậm chí cả sức khỏe tâm sinh lý của con người nói chung. Không gian văn phòng thoải mái, môi trường làm việc thân thiện sẽ góp phần không nhỏ vào việc nâng cao hiệu quả lao động, giúp gắn kết các thành viên với nhau, gắn kết cá nhân với tập thể, gữa nhân viên với công ty. Mặt khác, văn phòng cũng là nơi hình ảnh thương hiệu của công ty, doanh nghiệp được khẳng định.
        <br> <br>
        Thấu hiểu điều đó, AFA Design đã nghiên cứu và tổng hợp những thông tin đa chiều từ đó đưa ra những tư vấn, định hướng chuyên sâu về muôn màu không gian văn phòng. Chúng tôi rất hy vọng công sức bé nhỏ này sẽ góp phần vào việc nâng cao chất lượng không gian làm việc của Việt Nam nói riêng và các nước trong khu vực nói chung. Điều này đánh dấu sự ra đời của ebook “360 không gian văn phòng”.
        <br> <br>
        <div style="text-align: center;"><img src="images/project/p12.jpg" alt=""></div>
        <br> <br>
        <h2 style="font-weight: bold;font-size: 18px;">Có gì trong cuốn ebook 360 Không gian văn phòng này?</h2>
        <br>
        <ul style="color:#D6D6D6;">
            <li style="list-style: inside; margin: 5px 0;">Lịch sử thiết kế không gian văn phòng</li>
            <li style="list-style: inside; margin: 5px 0;">Chìa khóa nâng cao hiệu quả lao động</li>
            <li style="list-style: inside; margin: 5px 0;">Thiết kế văn phòng và sức khỏe</li>
            <li style="list-style: inside; margin: 5px 0;">Thiết kế văn phòng và cảm xúc</li>
            <li style="list-style: inside; margin: 5px 0;">Không gian văn phòng và màu sắc văn hóa công ty</li>
            <li style="list-style: inside; margin: 5px 0;">Tối ưu hóa không gian văn phòng</li>
            <li style="list-style: inside; margin: 5px 0;">Các yếu tố tạo nên một không gian làm việc năng động, khuyến khích nhân viên làm việc hiệu quả</li>
            <li style="list-style: inside; margin: 5px 0;">Xu hướng thiết kế nội thất văn phòng hiện đại</li>
            <li style="list-style: inside; margin: 5px 0;">Các lỗi thiết kế văn phòng phổ biến thường gặp</li>
            <li style="list-style: inside; margin: 5px 0;">Những điều cần biết khi chuyển văn phòng</li>
            <li style="list-style: inside; margin: 5px 0;">8 lỗi cần tránh khi chuyển văn phòng</li>
            <li style="list-style: inside; margin: 5px 0;">Và rất nhiều điều khác nữa.</li>
        </ul>
        <br>
        <p>Linh đọc online: <a href="" title="" style="font-weight: 500">Click vào đây</a></p>
    </div>
</div>
</main>
<div class="action-fixed">
    <ul>
        <li>
            <a href="" title=""><img src="images/icon/s5.png" alt=""></a>
        </li>
        <li>
            <a href="" title=""><img src="images/icon/s4.png" alt=""></a>
        </li>
        <li>
            <a href="" title=""><img src="images/icon/s3.png" alt=""></a>
        </li>
        <li>
            <a href="" title=""><img src="images/icon/s2.png" alt=""></a>
        </li>
        <li>
            <a href="" title=""><img src="images/icon/s1.png" alt=""></a>
        </li>
    </ul>
</div>
</div>
@endsection