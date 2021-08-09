@extends('layouts.admin')
@section('content')

<body>
    <!-- container section start -->
    <section id="container" class="">
        <!--header start-->
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_table"></i>
                            <span>Tables</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="active" href="{{ route('category.select') }}">Category</a></li>
                            <li><a class="active" href="{{ route('post.select') }}">Post</a></li>
                            <li><a class="active" href="{{ route('subcategory.select') }}">Sub Category</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
            <section class="login-block">
    <div class="container ">
        <div class="row ">
            <div class="col-md-4 col-md-offset-4 login-sec">
                <h2 class="text-center">Category</h2>
                <!-- @include('components.alert') -->
                <form class="login-form" action="{{ route('category.create') }}" method='POST' enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Name <sup>*</sup></label>

                        <input type="text" onkeyup="ChangeToSlug();" id="name" name='name' class="form-control" placeholder="">
                        <span id="error"></span>
                        @error('name')
                        <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                        <span id="error-name"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase">Slug <sup>*</sup></label>
                        <input type="text" id="slug" name='slug' class="form-control" placeholder="">
                        @error('slug')
                        <div class="error" style="color:red;">{{ $message }}</div>
                        @enderror
                        <span id="error-slug"></span>
                    </div>
                    <div class="form-check col-md-offset-4">
                        <button type="submit" data-url="" id="createCategory" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
</section>
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
        <div class="text-right">
            <div class="credits">
                <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
            </div>
        </div>
    </section>
    @endsection
    <script src="{{ asset('backend/js/jquery-1.8.3.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#search-category").keyup(function() {
                var name = $('#search-category').val();
                var url = $(this).attr('data-url');
                console.log(name);
                $.ajax({
                        url: url,
                        type: "GET",
                        data: {
                            name
                        },
                    })
                    .done(function(data) {
                        if (data.html == " ") {
                            $('.ajax-load').html("No more records found");
                            return;
                        }
                        $('#list-category tr').remove();
                        $("#list-category").append(data.html);
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        alert('server not responding...');
                    });
            })
        });
    </script>