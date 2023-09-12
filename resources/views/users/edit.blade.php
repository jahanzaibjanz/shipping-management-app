@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit This User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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
            <form method="POST" action="{{ route('users.update', $user->id) }}" class="form-horizontal form-material">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <strong class="col-md-12">Full Name:</strong>
                    <div class="col-md-12">
                        <input type="text" name="name" value="{{ $user->name }}" placeholder="Full Name" class="form-control form-control-line" />
                    </div>
                </div>
                <div class="form-group">
                    <strong class="col-md-12">Email:</strong>
                    <div class="col-md-12">
                        <input type="text" name="email" value="{{ $user->email }}" placeholder="Email" class="form-control form-control-line" />
                    </div>
                </div>
                <div class="form-group">
                    <strong class="col-md-12">Password:</strong>
                    <div class="col-md-12">
                        <input type="password" name="password" placeholder="Password" class="form-control form-control-line" />
                    </div>
                </div>
                <div class="form-group">
                    <strong class="col-md-12">Confirm Password:</strong>
                    <div class="col-md-12">
                        <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role:</strong>
                        <select name="roles[]" class="form-control" multiple>
                            @foreach($roles as $role)
                            <option value="{{ $role }}" {{ in_array($role, $userRole) ? 'selected' : '' }}>
                                {{ $role }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection