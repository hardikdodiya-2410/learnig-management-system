@extends('layouts.app')

@section('title', 'All Users')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">All Users & Assigned Roles</h2>
        <a href="{{ route('admin.adduser') }}" class="btn btn-success">
            <i class="bi bi-person-plus me-1"></i> Add New User
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-striped table-bordered shadow-sm">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $index => $user)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @forelse($user->roles as $role)
                            <span class="badge bg-primary me-1">{{ $role->name }}</span>
                        @empty
                            <span class="text-muted">No Role Assigned</span>
                        @endforelse
                    </td>
                    <td class="text-nowrap">
                        @if(!in_array($user->id, $studentResultUserIds))
                            <a href="{{ route('admin.edituser', $user->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil-square me-1"></i> Edit
                            </a>
                        @else
                            <a href="{{ route('admin.detailresult', $user->id) }}" class="btn btn-sm btn-success">
                                <i class="bi bi-eye me-1"></i>  Result
                            </a>
                        @endif

                        <form action="{{ route('admin.deleteuser', $user->id) }}" method="POST" style="display:inline-block;" class="delete-user-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm delete-user-btn">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-end mt-4">
        {{ $users->links() }}
    </div>

</div>
<script>
    document.querySelectorAll('.delete-user-btn').forEach(btn => {
    btn.onclick = () => Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this user?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then(result => result.isConfirmed && btn.closest('form').submit());
    });
</script>
@endsection
