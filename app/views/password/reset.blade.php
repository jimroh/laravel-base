@extends('layouts.main')

@section('content') 
    <section class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <h2 class="">{{{ $pageTitle }}}</h2>
                    
            @include('subviews.messages')
            
            {{ Form::open(['route' => 'password.reset.post', 'role' => 'form']); }}
                <fieldset>
                    <div class="form-group">
                        {{ Form::hidden('token', $token); }}
                        {{ Form::label('inputEmail', 'Email', ['class' => 'control-label text-danger']) }}
                        {{ Form::email('email', null, ['id' => 'inputEmail', 'class' => 'form-control']); }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('inputPassword', 'Password', ['class' => 'control-label text-danger']) }}
                        {{ Form::password('password', ['id' => 'inputPassword', 'class' => 'form-control']); }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('inputPasswordConfirmation', 'Confirm Password', ['class' => 'control-label text-danger']) }}
                        {{ Form::password('password_confirmation', ['id' => 'inputPasswordConfirmation', 'class' => 'form-control']); }}
                    </div>
                    {{ Form::submit('Reset Password', ['class' => 'btn btn-primary pull-right']); }}
                </fieldset>
            {{ Form::close(); }}
        </div>
    </section>
@stop

@section('javascripts')
    @include('javascripts.emailfocus')
@stop