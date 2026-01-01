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
                                <td><button class="btn btn-info view-containers" data-containers='@json($shipment->containers)' data-types='@json($containerTypes)'> View Containers </button></td>
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



<div class="modal fade" id="containersModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Containers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Container Type</th>
                            <th>Cost</th>
                        </tr>
                    </thead>
                    <tbody id="containersBody">
                        <!-- dynamic -->
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).on('click', '.view-containers', function() {

        let containers = $(this).data('containers');
        let typesMap = $(this).data('types');
        let tbody = '';

        if (containers.length === 0) {
            tbody = `<tr>
                    <td colspan="3" class="text-center">No Containers Found</td>
                 </tr>`;
        } else {
            containers.forEach((container, index) => {
                tbody += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${container.items}</td>
                    <td>${typesMap[container.types] ?? '-'}</td>
                    <td>${container.costs}</td>
                </tr>
            `;
            });
        }

        $('#containersBody').html(tbody);
        $('#containersModal').modal('show');
    });
</script>
@endsection