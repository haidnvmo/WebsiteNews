@extends('layouts.frontend')

@section('content')
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin:220px; ">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Bài viết</th>
                <th>Trạng thái</th>               
                <th>Action</th>
                <th><a href="{{ route('customerpost.index') }}">Thêm bài viết</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getPostCustomer as $value)
            <tr>
                <td>{{ $value->title }}</td>
                <td>{{ $value->status === 1 ? 'Đã được đăng' : 'Chờ xét duyệt' }}</td>
                <td><a href="{{ route('customerpost.edit', $value->id) }}">Edit</a>  <a href="{{ route('customerpost.delete', $value->id) }}">Delete</a> </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection