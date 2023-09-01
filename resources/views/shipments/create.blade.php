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
                                
                                <select class="form-control">
                                    <option>Select Shipper</option>
                                    @foreach($shippers as $shipper)
                                    <option value="{{ $shipper->id }}">{{ $shipper->company_name }}</option>
                                    @endforeach
                                </select>
                                <select class="form-control">
                                <option>Select Clients</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->company_name }}</option>                                                                        
                                    @endforeach
                                </select>
                                <select class="form-control">
                                    <option>Shipping Lines</option>
                                    @foreach($shippinglines as $shippingline)
                                    <option value="{{ $shippingline->id }}">{{ $shippingline->name }}</option>
                                    @endforeach
                                </select>
                                <select class="form-control">
                                    <option>Agents</option>
                                    @foreach($agents as $agent)
                                    <option value="{{ $agent->id }}">{{ $agent->agency_name }}</option>
                                    @endforeach
                                </select>
                                </div>

                                    <div class="form-group col-md-12" style="display: flex;">                                    
                                        <div class="form-group col-md-4">
                                        <label>Origin</label>                                            
                                            <input type="text" class="form-control form-control-line" placeholder="Origin">
                                        </div>                                                                            
                                        <div class="form-group col-md-4">
                                        <label>Destination</label>
                                            <input type="email" placeholder="Destination" class="form-control form-control-line" name="destination">
                                        </div>                                                       
                                        <div class="form-group col-md-4">
                                        <label>Shipping Date</label>                                                         
                                            <input type="date" class="form-control form-control-line">
                                        </div>
                                    </div>

                                   
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="123 456 7890"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Message</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Select Country</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line">
                                                <option>London</option>
                                                <option>India</option>
                                                <option>Usa</option>
                                                <option>Canada</option>
                                                <option>Thailand</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

@endsection