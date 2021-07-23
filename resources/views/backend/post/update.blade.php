@extends('layouts.backend')

@section('content')
<section class="login-block">
   <div class="container ">
      <div class="row ">
         <div class="col-md-4 col-md-offset-4 login-sec">
            <h2 class="text-center">Update News</h2>
            @include('components.alert')
            <form class="login-form" action='{{ route("post.update") }} ' method='POST' enctype="multipart/form-data">
               {{ csrf_field() }}
               {{ method_field('PATCH') }}
               <input type="hidden" name='id' value="{{ $editPost->id }}">
               <div class="form-group">
                  <label for="exampleInputEmail1" class="text-uppercase">Title <sup>*</sup></label>
                  <input type="text" name='title' value='{{ $editPost->title ? $editPost->title : "" }}' class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Slug <sup>*</sup></label>
                  <input type="text" name='slug' value='{{ $editPost->slug ? $editPost->slug : "" }}' class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Chuyên mục <sup>*</sup></label>
                  <select name="id_category" id="">
                     <option value="">Chọn chuyên mục</option>
                     @foreach ($category as $value)
                     <option value="{{ $value->id }}">{{ $value->name }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Descripton <sup>*</sup></label>
                  <input type="text" name='description' value='{{ $editPost->description ? $editPost->description : "" }}' class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Content <sup>*</sup></label>
                  <textarea name='content' value='{{ $editPost->description ? $editPost->description : "" }}'></textarea>
                  <script>
                     CKEDITOR.replace('content');
                  </script>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Image <sup>*</sup></label>
                  <input type="file" name='image' value='{{ $editPost->image ? $editPost->image : "" }}' class="form-control" placeholder="">
               </div>
               <div class="form-check col-md-offset-4">
                  <!-- <label class="form-check-label">
         <input type="checkbox" class="form-check-input">
         <small>Remember Me</small>
         </label> -->
                  <button type="submit" class="btn btn-login float-right">Update</button>
               </div>
            </form>
</section>

@endsection