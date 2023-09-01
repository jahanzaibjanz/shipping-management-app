@extends('layouts.app')

@section('content')

<div class="row">
                    <!-- column -->

                    <div class="col-12">
                        
                        
                        <div class="d-flex align-items-left">
                            <a class="btn btn-success d-none d-lg-block m-l-15"
                                href="{{ route('shipments.create') }}">Create New Shipment</a>
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
                                                <th>origin</th>
                                                <th>destination</th>
                                                <th>Shipment Date</th>
                                                <th>Delivery Date</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($shipments as $shipment) 
                                            <tr>
                                                <td>#</td>
                                                <td>{{ $shipment->shipper_id}}</td>
                                                <td>{{ $shipment->client_id}}</td>
                                                <td>{{ $shipment->shipping_line_id}}</td>
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
                                            <!-- <tr>
                                                <td>1</td>
                                                <td>Deshmukh</td>
                                                <td>Prohaska</td>
                                                <td>@Genelia</td>
                                                <td><span class="label label-danger">admin</span> </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Deshmukh</td>
                                                <td>Gaylord</td>
                                                <td>@Ritesh</td>
                                                <td><span class="label label-info">member</span> </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Sanghani</td>
                                                <td>Gusikowski</td>
                                                <td>@Govinda</td>
                                                <td><span class="label label-warning">developer</span> </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Roshan</td>
                                                <td>Rogahn</td>
                                                <td>@Hritik</td>
                                                <td><span class="label label-success">supporter</span> </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Joshi</td>
                                                <td>Hickle</td>
                                                <td>@Maruti</td>
                                                <td><span class="label label-info">member</span> </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Nigam</td>
                                                <td>Eichmann</td>
                                                <td>@Sonu</td>
                                                <td><span class="label label-success">supporter</span> </td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection