@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Edit Shippers</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-primary" href="{{ route('shippers.index') }}"> Back</a>
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
			<form action="{{ route('shippers.update',$shipper->id) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<strong class="col-md-12">Company Name:</strong>
					<div class="col-md-12">
						<input type="text" name="company_name" value="{{ $shipper->company_name }}" class="form-control" placeholder="Company Name">
					</div>
				</div>
				<div class="form-group">
					<strong class="col-md-12">Contact Person:</strong>
					<div class="col-md-12">
						<input type="text" name="company_person" value="{{ $shipper->company_person }}" class="form-control" placeholder="Contact Person">
					</div>
				</div>
				<div class="form-group">
					<strong class="col-md-12">Contact number:</strong>
					<div class="col-md-12">
						<input type="text" name="contact_number" value="{{ $shipper->contact_number }}" class="form-control" placeholder="Contact Number">
					</div>
				</div>
				<div class="form-group">
					<strong class="col-md-12">Address:</strong>
					<div class="col-md-12">
						<textarea class="form-control" style="height:150px" name="address" placeholder="Address">{{ $shipper->address }}</textarea>
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