@extends('layouts.main')

@section('content')
<section class="row">
    <div class="col-lg-12">
        <div class="panel-content bottom-margin">
            <div class="active">
                <div class="shadowed-bottom widget-front-title">
                    <h2 class="">404 Not Found</h2>
                </div>
                <div class="padded">
                    @include('subviews.messages')

                    <section class="row">
                        <div class="col-lg-12 alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            These are not the droids you are looking for.
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
@stop