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
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
                        <ul class="nav top-menu">
                            <li>
                                <form class="navbar-form" action="" method="GET">
                                    <div class="form-group">
                                        <input class="form-control" data-url="{{ route('post.select') }}" name="search" id="search-post" placeholder="Search" type="text">
                                        
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <!--  search form end -->
                    </div>
                    <br>
                 
                </div>
                </div>
                <!-- page start-->
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">
                                <span style=""><a href="{{ route('post.index') }}">Add Posts</a></span>
                            </header>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>description</th>
                                        <th>Image</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id="list-post">
                                    @include('backend.post.ajax.data')
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
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
            $('#search-post').keyup(function() {
                var title = $('#search-post').val();
                var url = $(this).attr('data-url');
                $.ajax({
                        url: url,
                        type: "GET",
                        data: { 
                            title
                        }
                    })
                    .done(function(data) {
                        if (data.html == " ") {
                            $('.ajax-load').html("No more records found");
                            return;
                        }
                        $('#list-post tr').remove();
                        $("#list-post").append(data.html);
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        alert('server not responding...');
                    });
            })

        })
    </script>