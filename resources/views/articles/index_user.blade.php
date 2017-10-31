@extends('layouts.app')


@section('content')
<div class="container"> 
 
  @component('components.breadcrumb') 
    @slot('title') Create news @endslot 
    @slot('parent') Main @endslot 
    @slot('active') News @endslot 
  @endcomponent 
 
  <hr /> 

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome!</div>

                <div class="panel-body">
                    <div class="list-group">
                    
                       
                               
                        @foreach($user->$articles as $article)
                            <div class="list-group-item">
                                <h4 class="list-group-item-heading">
                                <p>{{ $article->title }}</p><p style="color:red;">by {{ $article->owner->name }}</p>
                                </h4>
                                <p class="list-group-item-text">
                                {{ $article->description_short }}
                                </p>
                                <p class="list-group-item-text">
                                {{ $article->image_show }}
                                </p>
                                <p class="list-group-item-text">
                                {{ $article->created_by }}
                                </p>
                                <p class="list-group-item-text">
                                {{ link_to_route('articles.show_user', 'Get Article', null, ['class' => 'btn btn-info btn-xs']) }}
                                </p>
                                 
                            </div>
                        @endforeach        
        
                         
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')