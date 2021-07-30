@extends('layouts.backend')

@section('content')
<section class="login-block">
   <div class="container ">
      <div class="row ">
         <div class="col-md-4 col-md-offset-4 login-sec">
            <h2 class="text-center">Sub Category</h2>
            @include('components.alert')
            <form class="login-form" action="{{ route('subcategory.create') }}" method='POST' enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="form-group">
                  <label for="exampleInputEmail1" class="text-uppercase">Name <sup>*</sup></label>
                  <input type="text" name='name' class="form-control" placeholder="">
                  <span id="error-name"></span>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Slug <sup>*</sup></label>
                  <input type="text" name='slug' class="form-control" placeholder="">
                  <span id="error-slug"></span>
               </div>

               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Chuyên mục <sup>*</sup></label>
                  <select name="category_id" id="">
                     @foreach ($getCategory as $value)
                     <option value="{{ $value->id }}">{{ $value->name }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-check col-md-offset-4">
                  <button type="submit" id="createCategory" class="btn btn-primary">Thêm</button>
               </div>
            </form>
</section>

@endsection