@extends('layouts.app')
@section('content')
<div class="row">
                    <!-- column -->
                    <div class="col-12">                                                
                        <div class="d-flex align-items-left">
                            @can('shippingline-create')
                            <a class="btn btn-success d-none d-lg-block m-l-15"
                                href="{{ route('shipping-lines.create') }}">Create New Shipping Line</a>
                            @endcan
                        </div>
                        <div class="card">
                            <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                                <h4 class="card-title">Shipping Lines</h4>
                                <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Shipping Lline</th>
                                            <th>Website</th>
                                            <th>Contact Number</th>
                                            <th>Address</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                        @foreach ($shippinglines as $shippingline)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $shippingline->name }}</td>
                                            <td>{{ $shippingline->website }}</td>
                                            <td>{{ $shippingline->contact_number }}</td>
                                            <td>{{ $shippingline->address }}</td>
                                            <td>
                                                <form action="{{ route('shipping-lines.destroy',$shippingline->id) }}" method="POST">                    
                                                    @can('shippingline-edit')
                                                    <a class="btn btn-primary" href="{{ route('shipping-lines.edit',$shippingline->id) }}">Edit</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('shippingline-delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $shippinglines->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection