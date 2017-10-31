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
            
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">Campaign Preview<b>{{ $send->subject_send }}</b></div>
            <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{Form::open(['class' => 'confirm-delete', 'route' => array_merge(['send.destroy'], compact('compaign','send')), 'method' => 'DELETE'])}}
                    {{ link_to_route('send.edit', 'edit', [$send->id_send], ['class' => 'btn btn-primary btn-xs']) }} |
                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
     <div class="panel-body">

        <table class="table table-bordered table-responsive">
            <tr>
                <th width="25%">Attribute</th>
                <th width="75%">Value</th>
            </tr>
             <tr>
                    <td>Subscribers</td>
                    <td>$campaign->getSubscribersList()</td>
                </tr>
            
            @foreach ($send->getAttributes() as $attribute => $value)
               <tr>
                    <td>{{$attribute}}</td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
        </table>

    </div>
        <div class="panel-body">
        {!! Form::open(['url' => 'send.getPost']) !!}

        @include('send._form')

        <div class="form-group">
            {!! Form::button('SEND THIS CAMPAIGN', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

        </div>
    



            </div>
        </div>
    </div>
@endsection
