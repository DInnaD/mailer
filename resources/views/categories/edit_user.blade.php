@extends('layouts.app')

@section('content')

<div class="container">

  @component('components.breadcrumb_user')
    @slot('title') Edit category @endslot
    @slot('parent') Main @endslot
    @slot('active') Category @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('category.update', $category)}}" method="post">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}


    {{-- Form include --}}
    @include('categories.partials.form')
    
  </form>
</div>

@endsection