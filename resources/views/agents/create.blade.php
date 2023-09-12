@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Agent/Agencies</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('agents.index') }}"> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
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
            <form action="{{ route('agents.store') }}" method="POST" class="form-horizontal form-material">
                @csrf
                <input name="user_id" type="hidden" value="{{ $user_id }}">
                <div class="form-group">
                    <label class="col-md-12">Agent Name:</label>
                    <div class="col-md-12">
                        <input type="text" name="agency_name" class="form-control" placeholder="Agency Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Contact Number:</label>
                    <div class="col-md-12">
                        <input type="text" name="contact_number" class="form-control" placeholder="Contact number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Address:</label>
                    <div class="col-md-12">
                        <textarea class="form-control" style="height:150px" name="address" placeholder="Address"></textarea>
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