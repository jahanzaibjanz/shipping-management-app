@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit shipment</h2>
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
        <div class="card-body">
            <form action="{{ route('shipments.update', $shipment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group col-md-12" style="display: flex;">
                    <div class="form-group col-md-3">
                        <label>Shipper</label>
                        <select name="shipper_id" class="form-control">
                            @foreach($shippers as $shipper)
                            <option value="{{ $shipper->id }}"
                                {{ $shipment->shipper_id == $shipper->id ? 'selected' : '' }}>
                                {{ $shipper->company_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Client</label>
                        <select name="client_id" class="form-control">
                            @foreach($clients as $client)
                            <option value="{{ $client->id }}"
                                {{ $shipment->client_id == $client->id ? 'selected' : '' }}>
                                {{ $client->company_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Shipping Line</label>
                        <select name="shipping_line_id" class="form-control">
                            @foreach($shippinglines as $shippingline)
                            <option value="{{ $shippingline->id }}"
                                {{ $shipment->shipping_line_id == $shippingline->id ? 'selected' : '' }}>
                                {{ $shippingline->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Agent</label>
                        <select name="agent_id" class="form-control">
                            @foreach($agents as $agent)
                            <option value="{{ $agent->id }}"
                                {{ $shipment->agent_id == $agent->id ? 'selected' : '' }}>
                                {{ $agent->agency_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12" style="display: flex;">
                    <div class="form-group col-md-3">
                        <label>Origin</label>
                        <input type="text" name="origin" class="form-control form-control-line" placeholder="Origin" value="{{ $shipment->origin }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Destination</label>
                        <input type="text" name="destination" placeholder="Destination" class="form-control form-control-line" name="destination" value="{{ $shipment->destination }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Shipment Date</label>
                        <input type="date" name="shipment_date" class="form-control form-control-line" value="{{ $shipment->shipment_date }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Delivery Date</label>
                        <input type="date" name="delivery_date" class="form-control form-control-line" value="{{ $shipment->delivery_date }}">
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Items</th>
                            <th>Container Type</th>
                            <th>Weight</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach($containers as $key => $container)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <input type="text"
                                    class="form-control"
                                    name="item[]"
                                    value="{{ $container->items }}">
                            </td>
                            <td>
                                <select class="form-control" name="containertype[]">
                                    @foreach($containertypes as $containertype)
                                    <option value="{{ $containertype->id }}"
                                        {{ $container->types == $containertype->id ? 'selected' : '' }}>
                                        {{ $containertype->type }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="cost[]" value="{{ $container->costs }}">
                            </td>
                            <td>
                                <button type="button" class="btn btn-success add-row">+</button>
                                <button type="button" class="btn btn-danger remove-row">x</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="form-group">
                    <button class="btn btn-success">Update Shipment</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).on('click', '.add-row', function() {
        let count = $('#tbody tr').length + 1;

        $('#tbody').append(`
        <tr>
            <td>${count}</td>
            <td><input type="text" name="item[]" class="form-control"></td>
            <td>
                <select name="containertype[]" class="form-control">
                    @foreach($containertypes as $containertype)
                        <option value="{{ $containertype->id }}">
                            {{ $containertype->type }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td><input type="text" name="cost[]" class="form-control"></td>
            <td>
                <button type="button" class="btn btn-success add-row">+</button>
                <button type="button" class="btn btn-danger remove-row">x</button>
            </td>
        </tr>
    `);
    });

    // remove row
    $(document).on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
    });
</script>
@endsection