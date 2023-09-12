@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Add New Shipping Line</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-primary" href="{{ route('shipping-lines.index') }}"> Back</a>
		</div>
	</div>
</div>
@if($errors->any())
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
			<form action="{{ route('shipping-lines.store') }}" method="POST" class="form-horizontal form-material">
				@csrf
				<div class="form-group">
					<label class="col-md-12">Company Name</label>
					<div class="col-md-12">
						<input type="text" name="name" class="form-control form-control-line" placeholder="Shipping Line Name">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12">Website</label>
					<div class="col-md-12">
						<input type="text" name="website" class="form-control form-control-line" placeholder="Website">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12">Contact Number</label>
					<div class="col-md-12">
						<input type="text" name="contact_number" class="form-control form-control-line" placeholder="Contact Number">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12">Address</label>
					<div class="col-md-12">
						<textarea class="form-control form-control-line" style="height:150px" name="address" placeholder="Address"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection