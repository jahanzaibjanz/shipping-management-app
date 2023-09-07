@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Shipping Line</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('shipping-lines.index') }}"> Back</a>
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
            <form action="{{ route('shipping-lines.update', $shipping_line->id) }}" method="POST"
                class="form-horizontal form-material">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="col-md-12">Shipping Line Name:</label>
                    <div class="col-md-12">
                        <input type="text" name="name" id="name" value="{{ $shipping_line->name }}"
                            class="form-control" placeholder="Shipping Line Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="website" class="col-md-12">Website:</label>
                    <div class="col-md-12">
                        <input type="text" name="website" id="website" value="{{ $shipping_line->website }}"
                            class="form-control" placeholder="Website">
                    </div>
                </div>

                <div class="form-group">
                    <label for="contact_number" class="col-md-12">Contact Number:</label>
                    <div class="col-md-12">
                        <input type="text" name="contact_number" id="contact_number"
                            value="{{ $shipping_line->contact_number }}" class="form-control"
                            placeholder="Contact Number">
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="col-md-12">Address:</label>
                    <div class="col-md-12">
                        <textarea class="form-control" id="address" style="height:150px" name="address"
                            placeholder="Address">{{ $shipping_line->address }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
