@extends('layouts.app')

@section('content')

<div class="container">

  @component('components.breadcrumb')
    @slot('title') Create category @endslot
    @slot('parent') Main @endslot
    @slot('active') Category @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('category.store')}}" method="post">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('categories.partials.form')
    
  </form>
</div>

@endsection