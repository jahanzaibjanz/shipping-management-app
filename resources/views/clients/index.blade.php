@extends('layouts.app')
@section('content')
<div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="d-flex align-items-left">
            @can('client-create')
            <a class="btn btn-success d-none d-lg-block m-l-15" href="{{ route('clients.create') }}">Create New Client/Company</a>
            @endcan
        </div>
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <h4 class="card-title">Clients / Companies</h4>
                <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
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
                            </tbody>
                    </table>
                    {!! $clients->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection