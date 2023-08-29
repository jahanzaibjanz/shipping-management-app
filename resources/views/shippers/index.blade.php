@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Shippers</h2>
            </div>
            <div class="pull-right">
                @can('client-create')
                <a class="btn btn-success" href="{{ route('shippers.create') }}"> Create New Shipper</a>
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
            <th>Company Name</th>
            <th>Contact Person</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($shippers as $shipper)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $shipper->company_name }}</td>
	        <td>{{ $shipper->company_person }}</td>
            <td>{{ $shipper->contact_number }}</td>
            <td>{{ $shipper->address }}</td>
	        <td>
                <form action="{{ route('shippers.destroy',$shipper->id) }}" method="POST">                    
                    @can('shipper-edit')
                    <a class="btn btn-primary" href="{{ route('shippers.edit',$shipper->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('shipper-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $shippers->links() !!}

@endsection