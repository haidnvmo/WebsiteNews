@extends('layouts.backend')

@section('content')
<section class="login-block">
   <div class="container ">
      <div class="row ">
         <div class="col-md-10  login-sec">
            <h2 class="text-center">News</h2>

            @include('components.alert')

            <form class="login-form" action='{{ route("post.create") }} ' method='POST' enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="form-group">
                  <label for="exampleInputEmail1" class="text-uppercase">Title <sup>*</sup></label>
                  <input type="text" name='title' value="{{ old('title') }}" class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Chuyên mục <sup>*</sup></label>
                  <select name="id_category" id="">
                     <option value="">Chọn chuyên mục</option>
                     @foreach ($categories as $value)
                     <option value="{{ $value->id }}">{{ $value->name }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Slug <sup>*</sup></label>
                  <input type="text" name='slug' value='' class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Content <sup>*</sup></label>
                  <textarea name='content'></textarea>
                  <script>
                     CKEDITOR.replace('content');
                  </script>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Image </label>
                  <input type="file" name='image' value='' class="form-control" placeholder="">
               </div>
               {{-- <div class="form-group">
         <label for="exampleInputPassword1" class="text-uppercase">sort <sup>*</sup></label>
         <select name="sort" id="">
            <option value="">Sắp xếp Tin tức</option>
            <option value="1">Nổi bật</option>
            <option value="2">Mới nhất</option>
            @foreach ($categories as $value)
               <option value="{{ $value->id }}">{{ $value->name }}</option>
               @endforeach
               </select>
         </div> --}}
         <div class="form-group">
            <label for="exampleInputPassword1" class="text-uppercase">Descripton <sup>*</sup></label>
            <input type="text" name='description' value='{{ old('description') }}' class="form-control" placeholder="">
         </div>

         <div class="form-check col-md-offset-4">
            <!-- <label class="form-check-label">
         <input type="checkbox" class="form-check-input">
         <small>Remember Me</small>
         </label> -->
            <button type="submit" class="btn btn-login float-right">Thêm</button>
         </div>
         </form>
</section>

@endsection