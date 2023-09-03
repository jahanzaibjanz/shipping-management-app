@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Shipment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('shipments.index') }}"> Back</a>
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
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form action="{{ route('shipments.store') }}" method="POST" class="form-horizontal form-material">
                                @csrf
                                <div class="form-group col-md-12" style="display: flex;">
                                
                                <select class="form-control" name="shipper_id" required>
                                    <option selected disabled>Select Shipper</option>
                                    @foreach($shippers as $shipper)
                                    <option value="{{$shipper->id}}">{{ $shipper->company_name }}</option>
                                    @endforeach
                                </select>
                                <select class="form-control" name="client_id" required>
                                <option selected disabled>Select Clients</option>
                                    @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{ $client->company_name }}</option>                                                                        
                                    @endforeach
                                </select>
                                <select class="form-control" name="shipping_line_id" required>
                                    <option selected disabled>Shipping Lines</option>
                                    @foreach($shippinglines as $shippingline)
                                    <option value="{{$shippingline->id}}">{{ $shippingline->name }}</option>
                                    @endforeach
                                </select>
                                <select class="form-control" name="agent_id" required>
                                    <option selected disabled>Agents</option>
                                    @foreach($agents as $agent)
                                    <option value="{{$agent->id}}">{{ $agent->agency_name }}</option>
                                    @endforeach
                                </select>
                                </div>

                                    <div class="form-group col-md-12" style="display: flex;">                                    
                                        <div class="form-group col-md-3">
                                        <label>Origin</label>                                            
                                            <input type="text" name="origin" class="form-control form-control-line" placeholder="Origin">
                                        </div>                                                                            
                                        <div class="form-group col-md-3">
                                        <label>Destination</label>
                                            <input type="text" name="destination" placeholder="Destination" class="form-control form-control-line" name="destination">
                                        </div>                                                       
                                        <div class="form-group col-md-3">
                                        <label>Shipment Date</label>                                                         
                                            <input type="date" name="shipment_date" class="form-control form-control-line">
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label>Delivery Date</label>                                        
                                            <input type="date" name="delivery_date" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                            <button class="btn btn-success">Add Shipment</button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

@endsection