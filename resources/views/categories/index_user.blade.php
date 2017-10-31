@extends('layouts.app')

@section('content')
<div class="container">
@component('components.breadcrumb_user')
	@slot('title') List categories @endslot
	@slot('parent') Main @endslot
	@slot('active') Categories @endslot
@endcomponent
<hr>

<a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i></a>
<table class="table table-striped">
	<thread>
	<th>Title</th>
	<th>Publicate</th>
	<th class="text-right">Actions</th>
	</thread>
	<tbody>
		@forelse ($categories as $category)
			<tr>
				<td>{{$category->title}}</td>
				<td>{{$category->published}}</td>
				<td class="text-right">
				<form onsubmit="if(confirm('delete?')){return true}else{return false}" action="{{route('admin.category.destroy', $category)}}" method="post">
				<input type="hidden" name="_method" value="DELETE">
				{{ csrf_friend()}}
				<a href="{{route('admin.categories.edit', $category)}}"><i class="fa fa-edit"></a>
				<button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
				</form>
			    </td>
				
			</tr>
		@empty
			<tr>
			<td colspan="3" class="text-center"><h2>Empty data</h2></td>
			</tr>
		@endforelse
</table>
</div>

@endsection