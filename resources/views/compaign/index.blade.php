@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Campaigns</div>

                    <div class="panel-body">
                    {{--dd($id_send)--}}
                        {{ link_to_route('compaign.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                                <th width="5%">id</th>

                                <th width="15%">Name</th>        
                                <th width="15%">Template</th>
                                <th width="15%">Bunch</th>
                                <th width="15%">Description</th>
                                <th width="10%">Status</th>
                                <th width="10%">Time</th>
                                <th width="15%">Action</th>
                            </tr>
                            <tr>
                                <td colspan="8" class="light-green-background no-padding" title="Create new template">
                                    <div class="row centered-child">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </td>
                            </tr>
                           
                        @foreach ($compaigns as $model)
                            <tr>
                                <td>{{$model->id_compaign}}</td>

                                <td>{{$model->name_compaign}}</td>
                                <td>{{$model->template->name_template}}</td>
                                <td>{{$model->bunch->name_bunch}}</td>
                                <td>{{$model->description_compaign}}</td>
                                <td>{{$model->report_id}}</td>
                                
                                <td>{{$model->created_at}}</td>
                                
                                
                               
                                <td>
                                 {{--Form::open(['class' => 'confirm-delete', 'route' => ['compaign.preview', $model->id_compaign], 'method' => 'POST'])}}

                                 {{Form::button('send', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}

                                 {{Form::close()--}}

                                   


                                    {{Form::open(['class' => 'confirm-delete', 'route' => ['compaign.destroy', $model->id_compaign], 'method' => 'DELETE'])}}

                                    {{ link_to_route('preview.index', 'preview', [$model->id_compaign], ['class' => 'btn btn-success btn-xs']) }}
                           
                                    {{ link_to_route('compaign.show', 'info', [$model->id_compaign], ['class' => 'btn btn-success btn-xs']) }} |

                                    {{ link_to_route('compaign.edit', 'edit', [$model->id_compaign], ['class' => 'btn btn-success btn-xs']) }} |
                                    
                                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                    {{Form::close()}}
                                </td>

                            </tr>
                        @endforeach
                        <div class="text-center">
                            { !! $compaigns->render() !!}

                        </div>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
