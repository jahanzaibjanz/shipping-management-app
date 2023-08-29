@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Shipping Lines</h2>
            </div>
            <div class="pull-right">
                @can('client-create')
                <a class="btn btn-success" href="{{ route('shipping-lines.create') }}"> Create New Shipping Line</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Shipping Lline</th>
            <th>Website</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($shippinglines as $shippingline)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $shippingline->name }}</td>
	        <td>{{ $shippingline->website }}</td>
            <td>{{ $shippingline->contact_number }}</td>
            <td>{{ $shippingline->address }}</td>
	        <td>
                <form action="{{ route('shipping-lines.destroy',$shippingline->id) }}" method="POST">                    
                    @can('client-edit')
                    <a class="btn btn-primary" href="{{ route('shipping-lines.edit',$shippingline->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('client-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $shippinglines->links() !!}

@endsection