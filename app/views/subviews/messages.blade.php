@if (Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @foreach (Session::get('success') as $success)
            {{ $success; }}
        @endforeach
    </div>

    {{ Session::forget('success') }}
@endif

@if (Session::has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @foreach (Session::get('error') as $error)
            {{ $error; }}
        @endforeach
    </div>

    {{ Session::forget('error') }}
@endif