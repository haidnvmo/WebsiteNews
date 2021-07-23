@extends('layouts.backend')

@section('content')
<section class="login-block">
   <div class="container ">
      <div class="row ">
         <div class="col-md-4 col-md-offset-4 login-sec">
            <h2 class="text-center">Comment</h2>
            @include('components.alert')
            <form class="login-form" action='' method='POST' enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="form-group">
                  <label for="exampleInputEmail1" class="text-uppercase">Name <sup>*</sup></label>
                  <input type="text" name='name' id="create-name" value='' class="form-control" placeholder="">
                  <span id="error-name"></span>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Content <sup>*</sup></label>
                  <input type="text" name='content' id="create-content" value='' class="form-control" placeholder="">
                  <span id="error-content"></span>
               </div>

               <select name="news_id" id="input" class="form-control" required="required">

                  @foreach($index as $value)
                  <option value="{{ $value->id }}">{{ $value->title }}</option>
                  @endforeach
               </select>

               <div class="form-check col-md-offset-4">
                  <!-- <label class="form-check-label">
         <input type="checkbox" class="form-check-input">
         <small>Remember Me</small>
         </label> -->
                  <button type="button" class="btn btn-login float-right">Thêm</button>
               </div>
            </form>
</section>

@endsection