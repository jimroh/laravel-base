@extends('layouts.main')

@section('content')
<section class="row">
    <div class="col-xs-4 col-xs-offset-4">
        <div class="panel-content bottom-margin">
            <div class="active">
                <div class="shadowed-bottom widget-front-title">
                    <h2 class="">{{{ $pageTitle }}}</h2>
                </div>
                <div class="padded">
                    @include('subviews.messages')

                    {{ Form::open(['route' => 'login.post', 'role' => 'form']); }}
                        <fieldset>
                            <div class="form-group">
                                {{ Form::label('inputUsername', 'Username', ['class' => 'control-label text-danger']) }}
                                {{ Form::text('username', null, ['id' => 'inputUsername', 'class' => 'form-control']); }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('inputPassword', 'Password', ['class' => 'control-label text-danger']) }}
                                {{ Form::password('password', ['id' => 'inputPassword', 'class' => 'form-control']); }}
                            </div>
                                        
                            <div class="form-group col-xs-8">
                                {{ Form::checkbox('remember_me', 1, true, ['id' => 'inputRememberMe']); }}
                                {{ Form::label('inputRememberMe', 'Stay Logged In', ['class' => 'control-label']) }}
                                    
                                <div class="clearfix"></div>

                                {{ link_to_route('password.reminder.get', 'Forgot Password?', $parameters = [], $attributes = []); }}
                            </div>
                            {{ Form::submit('Login', ['class' => 'btn btn-primary pull-right']); }}
                        </fieldset>
                    {{ Form::close(); }}
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('javascripts')
    @include('javascripts.usernamefocus')
@stop