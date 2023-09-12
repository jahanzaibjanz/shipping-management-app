@extends('layouts.app')
@section('content')
<div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="d-flex align-items-left">
            @can('agent-create')
            <a class="btn btn-success d-none d-lg-block m-l-15" href="{{ route('agents.create') }}">Create New Agent/Agencies</a>
            @endcan
        </div>
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <h4 class="card-title">Agents / Agencies</h4>
                <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
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
                            </tbody>
                    </table>
                    {!! $agents->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection