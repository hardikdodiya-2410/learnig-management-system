@extends('layouts.app')

@section('title', 'All Roles and Permissions')

@section('content')
<div class="container-lg mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">All Roles and Assigned Permissions</h2>
        <a href="{{ route('admin.addrole') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Add New Role
        </a>
    </div>
    <table class="table table-striped table-bordered shadow-sm">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Role Name</th>
                <th scope="col">Permissions</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($roles as $index => $role)
                <tr>
                    <th scope="row">{{ $role->id }}</th>
                    <td class="text-capitalize"><strong>{{ $role->name }}</strong></td>
                    <td>
                        @if($role->permissions->isEmpty())
                            <span class="text-muted">No permissions assigned</span>
                        @else
                            @foreach($role->permissions as $permission)
                                <span class="badge bg-primary me-1 mb-1">{{ $permission->name }}</span>
                            @endforeach
                        @endif
                    </td>
                    <td class="text-nowrap">
                        <a href="{{ route('admin.editrole', $role->id) }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.deleterole', $role->id) }}" method="POST" style="display:inline-block;" class="delete-role-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm delete-role-btn">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center text-muted">No roles found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
      <div class="d-flex justify-content-end mt-4">
        {{ $roles->links() }}
    </div>
</div>
<script>
    document.querySelectorAll('.delete-role-btn').forEach(btn => {
    btn.onclick = () => Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this role?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then(result => result.isConfirmed && btn.closest('form').submit());
    });
</script>
@endsection
