@extends('layouts.main')

@section('content')
<section class="row">
    <div class="col-xs-4 col-xs-offset-4">
        <h2 class="">{{{ $pageTitle }}}</h2>
        @include('subviews.messages')
        
        {{ Form::open(['route' => 'password.reminder.post', 'role' => 'form']); }}
            <fieldset>
                <div class="form-group">
                    {{ Form::label('inputEmail', 'Email', ['class' => 'control-label text-danger']) }}
                    {{ Form::email('email', null, ['id' => 'inputEmail', 'class' => 'form-control']); }}
                </div>
                {{ Form::submit('Send Reminder', ['class' => 'btn btn-primary pull-right']); }}
            </fieldset>
        {{ Form::close(); }}
    </div>
</section>
@stop

@section('javascripts')
    @include('javascripts.emailfocus')
@stop