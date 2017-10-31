@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    

     <div class="panel-heading container-fluid">
        <div class="form-group">
            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('compaign.index')}}">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>
            
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">Campaign Preview<b>{{$compaign->name_compaign}}</b></div>
            <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{Form::open(['class' => 'confirm-delete', 'route' => ['compaign.destroy', $compaign->id_compaign], 'method' => 'DELETE'])}}

                    {{ link_to_route('compaign.edit', 'edit', [$compaign->id_compaign], ['class' => 'btn btn-primary btn-xs']) }} | 

                    
                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
     <div class="panel-body">

        <table class="table table-bordered table-responsive">
            <tr>
                <th width="25%">Subject</th>
                <th width="75%">$compaign->name_compaign</th>
            </tr>
               <tr>
                    <td>From</td>
                    <td>dasda@dasdas.dasda</td>
                </tr>
            
                 <tr>
                    <td>To</td>
                    <td>$compaign->getSubscribersList()</td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td>$compaign->template->content_template</td>
                </tr>
        </table>

    </div>
        <div class="panel-body">
        {!! Form::model($compaign, ['url' => ['compaign.send', $send->id_send], 'method' => 'POST']) !!}

        @include('compaign._form_send')

        <div class="form-group">
            {!! Form::button('SEND THIS CAMPAIGN', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
     </div>

        {!! Form::close() !!}

        </div>
    



            </div>
        </div>
    </div>
@endsection
