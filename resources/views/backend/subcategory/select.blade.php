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
                                        <input style="margin: -10px;margin-bottom: 10px;" class="form-control" name="search" data-url="{{ route('subcategory.select') }}"  id="search-subcategory" placeholder="Search" type="text">
                                        <!-- <button type="button" style="padding:4px;" id="searchPost" class="btn btn-primary">Tìm kiếm</button> -->
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-table"></i>Table</li>
                        </ol>
                    </div>
                </div>
                <!-- page start-->
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">
                                <span style=""><a href="{{ route('subcategory.index') }}">Add Category</a></span>
                            </header>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>slug</th>
                                        <th>Category_id</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="list-subcategory">
                                    @include('backend.subcategory.ajax.data')
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
            $("#search-subcategory").keyup(function() {
                var name = $('#search-subcategory').val();
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
                        $('#list-subcategory tr').remove();
                        $("#list-subcategory").append(data.html);
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        alert('server not responding...');
                    });
            })
        });
    </script>