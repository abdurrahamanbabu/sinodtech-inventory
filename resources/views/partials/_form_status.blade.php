@if(Session::has('success'))
    <div class="row">
        <div class="col">
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
@endif

@if(Session::has('error'))
    <div class="row">
        <div class="col">
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        </div>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif