@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome!</div>

                <div class="panel-body">
                    
                    <p>{{ Auth::user()->name }}</p>
                     


                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-1">
      <div class="text-center">
        <p1><span class="label label-primary">BLOG</span></p1>
      </div>
    </div>
   </div>
</div>    
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
    <div class="col-sm-4">
      <a class="btn btn-block btn-default" href="{{route('category.create')}}">Create category</a>
      <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">First category</h4>
        <p class="list-group-item-text">Count news</p>
      </a>
    </div>
    <div class="col-sm-4">
      <a class="btn btn-block btn-default" href="{{route('article.create')}}">Create news</a>
      <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">First news</h4>
        <p class="list-group-item-text">Category</p>
      </a>
    </div>
    <div class="col-sm-4">
      <a class="btn btn-block btn-default" href="{{  url('user/{user}/articles') }}">All short news</a>
      <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">All news</h4>
        <p class="list-group-item-text">Articles</p>
      </a>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-1">
      <div class="text-center">
        <p1><span class="label label-primary">INFOSAVER</span></p1>
      </div>
    </div>
   </div>
</div>
@endsection
