@extends('layouts.app')

@section('content')
<div class="row">
                    <!-- column -->
                    <div class="col-12">                                                
                        <div class="d-flex align-items-left">
                            @can('role-create')
                            <a class="btn btn-success d-none d-lg-block m-l-15"
                                href="{{ route('roles.create') }}">Create New Role</a>
                            @endcan
                        </div>
                        <div class="card">
                            <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                                <h4 class="card-title">Roles Management</h4>
                                <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                            @foreach ($roles as $key => $role)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>            
                                                    @can('role-edit')
                                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                                    @endcan
                                                    @can('role-delete')
                                                    <form style="display:inline" action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                        <button type="submit" class="btn btn-danger">Delete</button>                                                   
                                                    </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>                                    
                                    {!! $roles->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection