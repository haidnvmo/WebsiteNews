@extends('layouts.frontend')

@section('content')
        <main id="news-detail-wrapper">
            <section class="section-news-detail">
                <div class="container-master">
                    <div class="news-detail">
                        <div class="news-detail_left">
                            <h1 class="title">Tin tức</h1>
                            <h2 class="title-detail"></h2>
                            <div class="post-content">
                                <div style="text-align: center;margin-bottom: 20px;"><img style="width: 100%;" src="images/project/p10.jpg" alt=""></div>
                                {{ $getDetail->title }}
                                <div style="text-align: center;"><img style="width: 100%;" src="" alt=""></div>
                                
                            </div>
                            <div class="post-ghim">
                                <p>Cảm ơn các bạn đã theo dõi bài viết “bố cục văn phòng làm việc ảnh hưởng như thế nào tới nhân viên?” của AFA Design!</p>
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
                            <div class="content">
                                <div class="item">
                                    <div class="item-img">
                                        <a href="08-tin-tuc-chi-tiet.html" title="" class="imgc"><img src="images/news/n5.jpg" alt=""></a>
                                    </div>
                                    <div class="item-body">
                                        <h3 class="item-title"><a href="08-tin-tuc-chi-tiet.html" title="">Thi công nội thất văn phòng - AFA nâng tầm đẳng cấp cho chủ đầu tư</a></h3>
                                    </div>
                                </div>
                                <ul>
                                    <li><a href="08-tin-tuc-chi-tiet.html" title="">7 xu hướng hàng đầu ảnh hưởng đến thiết kế nội thất văn phòng làm việc p1</a></li>
                                    <li><a href="08-tin-tuc-chi-tiet.html" title="">5 cách bố trí cửa hàng văn phòng phẩm hiệu quả nhất</a></li>
                                    <li><a href="08-tin-tuc-chi-tiet.html" title="">10+ mẫu bố trí nội thất văn phòng đẹp hiện đại năm 2020</a></li>
                                </ul>
                            </div>
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