
<div class="err">
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
</div>

<div class="msg">
    @if (Session::has('message'))
        <br>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong id="msg">{{Session::get('message')}}</strong>
        </div>
    @endif

</div>

<div class="err0">
    @if (Session::has('error'))
        <br>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{Session::get('error')}}</strong>
        </div>
    @endif
</div>

