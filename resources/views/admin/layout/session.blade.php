@if (Session::has('success'))
    <div role="alert" class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif (Session::has('fail'))
    <div role="alert" class="alert alert-danger">
        {{ session('fail') }}
    </div>
@endif
