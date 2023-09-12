@extends('layouts.app')
@section('content')
<div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="d-flex align-items-left">
            @can('shipment-create')
            <a class="btn btn-success d-none d-lg-block m-l-15" href="{{ route('shipments.create') }}">Create New Shipment</a>
            @endcan
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Shipments Table</h4>
                <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Shipper</th>
                                <th>Client</th>
                                <th>Shipping Line</th>
                                <th>Agent</th>
                                <th>origin</th>
                                <th>destination</th>
                                <th>Shipment Date</th>
                                <th>Delivery Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shipments as $shipment)
                            <tr>
                                <td>#</td>
                                <td>{{ $shipment->shipper}}</td>
                                <td>{{ $shipment->company_name}}</td>
                                <td>{{ $shipment->name}}</td>
                                <td>{{ $shipment->agency_name}}</td>
                                <td>{{ $shipment->origin}}</td>
                                <td>{{ $shipment->destination}}</td>
                                <td>{{ $shipment->shipment_date}}</td>
                                <td>{{ $shipment->delivery_date}}</td>
                                <td>
                                    <form action="{{ route('shipments.destroy',$shipment->id) }}" method="POST">
                                        @can('shipment-edit')
                                        <a class="btn btn-primary" href="{{ route('shipments.edit',$shipment->id) }}">Edit</a>
                                        @endcan


                                        @csrf
                                        @method('DELETE')
                                        @can('shipment-delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection