@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Subscribers for <b>{{ $bunch->name_bunch }}</b></div>
                     <div class="centered-child col-md-9 col-sm-7 col-xs-6"></div>
                   
                    <div class="panel-body">
                        <div style="padding-bottom:10px;">
                        <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('bunch.index', compact('bunch'))}}">
                        <i class="fa fa-backward" aria-hidden="true"></i> back
                        </a> 
                         <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                 
                {{ link_to_route('subscriber.create', 'create', [$bunch->id_bunch], ['class' => 'btn btn-info btn-xs']) }} 

                {{Form::open(['class' => 'confirm-delete', 'route' => ['bunch.destroy', $bunch->id_bunch], 'method' => 'DELETE'])}}
                    
                    {{ link_to_route('bunch.edit', 'edit', [$bunch->id_bunch], ['class' => 'btn btn-primary btn-xs']) }} |
                    
                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()}}
                                    
                                    
                </div>
            </div>
                      

                        

                        <div class="text-right"><i class="badge">{{ $bunch->subscribers->count() }}</i></div><br>
                        <hr>
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                            <!--95%-->
                                
                                <td width="15%">Subject</td>
                                <td width="15%">From</td>
                                <td width="15%">To</td>
                                <td width="5%">Message</td>
                                
                                
                            </tr>
                            <tr>
                            {!! Form::model($compaign, ['url' => ['compaign.send', $send->id_send], 'method' => 'POST']) !!}
    
        @include('compaign._form_send')

        <div class="form-group">
            {!! Form::button('SEND THIS CAMPAIGN', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
     </div>

        {!! Form::close() !!}
        </tr>
                            <tr>
                            <!--colspan="4" id not-->
                                <td colspan="9" class="light-green-background no-padding" title="Create new template">
                                    <div class="row centered-child">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </td>
                            </tr>
                          
                            
                        @foreach ($bunch->subscribers as $subscriber)
                            <tr>
                            
                                <td>{{$subscriber->id_subscriber}}</td>
                                

                                <td>{{$subscriber->firstname_subscriber}}</td>
                                <td>{{$subscriber->lastname_subscriber}}</td>
                                <td>{{$subscriber->email_subscriber}}</td>
                                <td>{{$subscriber->report_id->viewed}}</td>
                                <td>{{$subscriber->report_id}}</td>
                                <td>{{$subscriber->report_id}}</td>
                                
                                <td>{{$subscriber->created_at}}</td>
                              <th width="5%">Unsubscribe</th>
                                <th width="5%">Because</th>


                            </tr>
                        @endforeach
                        <div class="text-center">
                            { !! $subscribers->render() !!}

                        </div>
                             
                        </table>
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
                 
        
   
    
</table>

</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
