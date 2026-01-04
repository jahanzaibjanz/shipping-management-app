@extends('layouts.app')
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Users</h4>
  </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row">
  <!-- column -->
  <div class="col-12">
    <div class="d-flex align-items-left">
      @can('user-create')
      <a class="btn btn-success d-none d-lg-block m-l-15"
        href="{{ route('users.create') }}">Create New User</a>
      @endcan
    </div>
    <div class="card">
      <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif

        <h4 class="card-title">Users Management</h4>
        <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th width="280px">Action</th>
              </tr>
              @foreach ($data as $key => $user)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @if(!empty($user->getRoleNames()))
                  @foreach($user->getRoleNames() as $v)
                  <label class="badge badge-success">{{ $v }}</label>
                  @endforeach
                  @endif
                </td>
                <td>
                  @can('user-edit')
                  <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                  @endcan
                  @can('user-delete')
                  <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                  @endcan
                </td>
              </tr>
              @endforeach
              </tbody>
          </table>
          {!! $data->render() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection