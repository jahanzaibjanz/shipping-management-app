@extends('layouts.app')
@section('content')
<div class="row">
                    <!-- column -->
                    <div class="col-12">                                                
                        <div class="d-flex align-items-left">
                            @can('shipper-create')
                            <a class="btn btn-success d-none d-lg-block m-l-15"
                                href="{{ route('shippers.create') }}">Create New Shipment</a>
                            @endcan
                        </div>
                        <div class="card">
                            <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                                <h4 class="card-title">Shippers/Shipping Agencies Table</h4>
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
                                        </thead>
                                        <tbody>
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
                                        </tbody>
                                    </table>
                                    {!! $shippers->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection