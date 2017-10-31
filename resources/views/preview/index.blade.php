@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Preview for <b>{{$compaign->name_compaign}}</b></div>
                     <div class="centered-child col-md-9 col-sm-7 col-xs-6"></div>
                   
                    <div class="panel-body">
                        <div style="padding-bottom:10px;">
                        <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('compaign.index', compact('compaign'))}}">
                        <i class="fa fa-backward" aria-hidden="true"></i> back
                        </a>




                        </div></div></div></div></div></div> 