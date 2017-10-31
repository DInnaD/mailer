<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            



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
                    
                                
                         @foreach($articles as $model)
                            <div class="list-group-item">
                                <h4 class="list-group-item-heading">
                                {{ $model->title }}
                                </h4>
                                <p class="list-group-item-text">
                                {{ $model->description_short }}
                                </p>
                                <p class="list-group-item-text">
                                {{ $model->image_show }}
                                </p>
                                <p class="list-group-item-text">
                                {{ $model->created_by }}
                                </p>
                            
                                <p><span>
                                    {{ link_to_route('articles.show', 'info', [$model->id], ['class' => 'btn btn-info btn-xs']) }} 
                                    </p></span>
                            </div>
                        @endfareach    
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</body>
</html>