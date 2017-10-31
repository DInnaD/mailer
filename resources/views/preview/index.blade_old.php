@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    

     <div class="panel-heading container-fluid">
        <div class="form-group">
        <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('compaign.index', compact('compaign'))}}">
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
                <th width="25%">Attribute</th>
                <th width="75%">Value</th>
            </tr>
             
            
            @foreach ($preview->getAttributes() as $attribute => $value)
               <tr>
                    <td>{{$attribute}}</td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
                 <tr>
                    <td>Subject</td>
                    <td>$preview->getCompaignItem()</td>
                </tr>
                 
           @foreach ($preview->getAttributes() as $attribute => $value)
               <tr>
                    <td>{{$attribute}}</td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
                 <tr>
                    <td>From</td>
                    <td>$preview->getFromItem()</td>
                </tr>
                 
             
            
            @foreach ($preview->getAttributes() as $attribute => $value)
               <tr>
                    <td>{{$attribute}}</td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
                 <tr>
                    <td>To</td>
                    <td>$preview->getSubscribersList()</td>
                </tr>

            @foreach ($preview->getAttributes() as $attribute => $value)
               <tr>
                    <td>{{$attribute}}</td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
                 <tr>
                    <td>Message</td>
                    <td>$preview->getTemplateItem()</td>
                </tr>    
                 
        
    <div class="panel-body">
        {!! Form::open(['route' => ['preview.send', 'compaign' => $compaign]]) !!}

        @include('preview._form_send')
        <input type="hidden" name="created_by" value="{{Auth::id()}}">
        <div class="form-group">
            {!! Form::button('SEND THIS CAMPAIGN', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
        
    
</table>

</div>


            </div>
        </div>
    </div>
@endsection
