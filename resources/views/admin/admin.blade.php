@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="jumbotron text-center">
        <p><span class="label label-primary">Categories 0</span></p>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="jumbotron text-center">
        <p><span class="label label-primary">News 0</span></p>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="jumbotron text-center">
        <p><span class="label label-primary">Gests 0</span></p>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="jumbotron text-center">
        <p><span class="label label-primary">Today 0</span></p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <a class="btn btn-block btn-default" href="{{route('admin.category.create')}}">Create category</a>
      <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">First category</h4>
        <p class="list-group-item-text">Count news</p>
      </a>
    </div>
    <div class="col-sm-6">
      <a class="btn btn-block btn-default" href="{{route('admin.article.create')}}">Create news</a>
      <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">First news</h4>
        <p class="list-group-item-text">Category</p>
      </a>
    </div>    
  </div>
</div>

@endsection