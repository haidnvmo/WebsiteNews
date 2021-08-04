@extends('layouts.frontend')

@section('content')

<form novalidate="novalidate" action="{{ route('customerpost.create') }}" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }}
    <div class="container">
    @include('components.alert')
        <p>Xin hãy nhập nội dung bài đăng</p>
        <hr>
        <div class="form-group">
            <label for="exampleInputEmail1"><b>Title</b></label>
            <input type="text" placeholder="Nhap Title" name="title" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"><b>Slug</b></label>
            <input type="text" placeholder="Nhập Slug" name="slug" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="text-uppercase">Chuyên mục <sup>*</sup></label>

            <select name="id_category" id="">

                <option value="">Chọn chuyên mục</option>
                @foreach ($getCategory as $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>

                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="text-uppercase">Content<sup>*</sup></label>
            <textarea name='content'></textarea>
            <script>
                CKEDITOR.replace('content');
            </script>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"><b>Image</b></label>
            <input type="file" name="image" required>
        </div>
            <br>
            <br>
        <div class="form-group">
            <label for="exampleInputEmail1"><b>Description</b></label>
            <input type="text"  placeholder="Nhập description" name="description" required>
        </div>
        <input type="hidden" name="customer_status" placeholder="" value="2" >
        <input type="hidden" name="status" placeholder="" value="2" >
        <div class="clearfix">
            <button type="submit" class="signupbtn">Gửi Bài Đăng</button>
        </div>
    </div>
</form>
@endsection