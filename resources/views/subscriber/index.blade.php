@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Subscribers for</div>
                    <div class="centered-child col-md-9 col-sm-7 col-xs-6">Subscribers for <b>{{ $bunch->name_bunch }}</b></div>
                    <div class="panel-body">
                        {{--dd($id_bunch) undifined--}}
                        {{ link_to_route('subscriber.create', 'create', [$bunch->id_bunch], ['class' => 'btn btn-info btn-xs']) }}
                         <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('subscriber.index')}}">
                        <i class="fa fa-backward" aria-hidden="true"></i> back
                        </a>
                        <div class="text-right"><i class="badge">{{ $bunch->subscribers->count() }}</i></div><br>
                        <hr>
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                            <!--95%-->
                                <th width="5%">id</th>
                                <th width="15%">First Name</th>
                                <th width="15%">Last Name</th>
                                <th width="20%">Email</th>
                                <th width="5%">Viewed</th>
                                <th width="5%">Unsubscrib</th>

                                
                                <th width="15%">Time</th>
                                <!--Actions-->
                                <th width="15%">Actions</th>
                            </tr>
                            <tr>
                            <!--colspan="4" id not-->
                                <td colspan="8" class="light-green-background no-padding" title="Create new template">
                                    <div class="row centered-child">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </td>
                            </tr>
                          
                            
                        @foreach ($subscribers as $model)
                            <tr>
                            
                                <td>{{$model->id_subscriber}}</td>
                                

                                <td>{{$model->firstname_subscriber}}</td>
                                <td>{{$model->lastname_subscriber}}</td>
                                <td>{{$model->email_subscriber}}</td>
                                 <td>{{$model->viewed_subscriber}}</td>
                                <td>{{$model->unsubscriber_subscriber}}</td>
                                
                                <td>{{$model->created_at}}</td>
                               
                                <!--??????????????????????????????????created_at_subscribers-->
                                <td>
                                    {{Form::open(['class' => 'confirm-delete', 'route' => ['subscriber.destroy', $model->id_subscriber], 'method' => 'DELETE'])}}
                                    {{ link_to_route('subscriber.show', 'info', [$model->id_subscriber], ['class' => 'btn btn-info btn-xs']) }} |
                                    {{ link_to_route('subscriber.edit', 'edit', [$model->id_subscriber], ['class' => 'btn btn-success btn-xs']) }} |
                                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                    {{Form::close()}}
                                </td>

                            </tr>
                        @endforeach
                        <div class="text-center">
                            { !! $subscribers->render() !!}

                        </div>
                             
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
