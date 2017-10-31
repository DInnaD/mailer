@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
               
                    <div class="panel-heading">Templates</div>

                    <div class="panel-body">
                    
                        {{ link_to_route('template.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}

                        <hr>
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                            
                                <th width="5%">id</th>
                                <th width="15%">Name</th>
                                <th width="25%">Content</th>
                                <th width="25%">Time</th>                                
                                <th width="25%">Actions</th>
                            </tr>
                            <tr>
                            
                                <td colspan="5" class="light-green-background no-padding" title="Create new template">
                                    <div class="row centered-child">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        
                        
                        @foreach ($templates as $model)
                            <tr>
                             
                                <td>{{$model->id_template}}</td>
                                <td>{{$model->name_template}}</td>
                                <td>{{$model->content_template}}</td>                                
                                <td>{{$model->created_at}}</td>
                                
                                
                                <!--??????????????????????????_templates-->
                                <td>
                                    {{Form::open(['class' => 'confirm-delete', 'route' => ['template.destroy', $model->id_template], 'method' => 'DELETE'])}}
                                    {{ link_to_route('template.show', 'info', [$model->id_template], ['class' => 'btn btn-info btn-xs']) }} |
                                    {{ link_to_route('template.edit', 'edit', [$model->id_template], ['class' => 'btn btn-success btn-xs']) }} |
                                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                    {{Form::close()}}
                                </td>

                            </tr>
                        @endforeach
                        

                        <div class="text-center">
                            { !! $templates->render() !!}

                        </div>
                   
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
