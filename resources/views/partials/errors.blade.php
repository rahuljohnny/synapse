@if (isset($errors)&& count($errors) > 0)
        <br>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            @foreach ($errors->all() as $error)
                <li><strong>{!! $error !!}</strong></li>
            @endforeach
        </div>
@endif

@if (Session::has('message'))
    <br>
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{Session::get('message')}}</strong>
    </div>
@endif

@if (Session::has('error'))
    <br>
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{Session::get('error')}}</strong>
    </div>
@endif