@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Agents/Agencies</h2>
            </div>
            <div class="pull-right">
                @can('agent-create')
                <a class="btn btn-success" href="{{ route('agents.create') }}"> Create New Agent/Agencies</a>
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
            <th>Agent/Agencies Name</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($agents as $agent)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $agent->agency_name }}</td>
	        <td>{{ $agent->contact_number }}</td>
            <td>{{ $agent->address }}</td>
	        <td>
                <form action="{{ route('agents.destroy',$agent->id) }}" method="POST">                    
                    @can('agent-edit')
                    <a class="btn btn-primary" href="{{ route('agents.edit',$agent->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('agent-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $agents->links() !!}

@endsection