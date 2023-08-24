@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Companies</h2>
            </div>
            <div class="pull-right">
                @can('client-create')
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Create New Companies</a>
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
	    @foreach ($clients as $client)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $client->company_name }}</td>
	        <td>{{ $client->contact_person }}</td>
            <td>{{ $client->contact_number }}</td>
            <td>{{ $client->address }}</td>
	        <td>
                <form action="{{ route('clients.destroy',$client->id) }}" method="POST">                    
                    @can('client-edit')
                    <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Edit</a>
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


    {!! $clients->links() !!}

@endsection