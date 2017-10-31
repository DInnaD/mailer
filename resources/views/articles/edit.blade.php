@extends('layouts.app') 
 
@section('content') 
 
<div class="container"> 
 
  @component('components.breadcrumb') 
    @slot('title') Edit news @endslot 
    @slot('parent') Main @endslot 
    @slot('active') News @endslot 
  @endcomponent 
 
  <hr /> 
 
  <form class="form-horizontal" action="{{route('article.update', $article)}}" method="post"> 
    <input type="hidden" name="_method" value="put"> 
    {{ csrf_field() }} 
 
    {{-- Form include --}} 
    @include('articles.partials.form') 
 
    <input type="hidden" name="modified_by" value="{{Auth::id()}}"> 
  </form> 
</div> 
 
@endsection 