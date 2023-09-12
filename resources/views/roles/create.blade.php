@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="col-lg-12 col-xlg-12 col-md-12">
    <div class="card">
        <!-- Tab panes -->
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="POST" class="form-horizontal form-material">
                @csrf
                <div class="form-group">
                    <label class="col-md-12">Role Name</label>
                    <div class="col-md-12">
                        <input type="text" name="name" placeholder="Role Name" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Permission</label>
                    <div class="col-md-12">
                        <br>
                        @foreach($permission as $value)
                        <label>
                            <br>
                            <input type="checkbox" name="permission[]" value="{{$value->id}}" class="name" />
                            {{ $value->name }}
                        </label>
                        <br />
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection