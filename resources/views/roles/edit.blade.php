@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Role</h2>
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
        <div class="card-body">
            <form method="POST" action="{{ route('roles.update', $role->id) }}" class="form-horizontal form-material">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <strong class="col-md-12">Role Name:</strong>
                    <div class="col-md-12">
                        <input type="text" name="name" value="{{ $role->name }}" placeholder="Role Name" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <strong class="col-md-12">Permission:</strong>
                    <div class="col-md-12">
                        <strong>Permission:</strong>
                        <br />
                        @foreach($permission as $value)
                        <label>
                            <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                            {{ $value->name }}
                        </label>
                        <br>
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