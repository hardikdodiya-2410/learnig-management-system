@extends('layouts.app')

@section('title', 'Add Role')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Add New Role</h2>
        <a href="{{ route('admin.viewrole') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Back to Roles
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{ route('admin.addrole') }}" method="POST" class="shadow p-4 rounded bg-light">
        @csrf
        <div class="mb-3">
            <label for="role_name" class="form-label fw-semibold">Role Name <span class="text-danger">*</span></label>
            <input type="text" name="role_name" id="role_name" class="form-control" placeholder="Enter role name" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Assign Permissions <span class="text-danger">*</span></label>
            <div class="row">
                @foreach($permissions as $permission)
                    <div class="col-md-4">
                        <div class="form-check mb-2">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm{{ $permission->id }}" class="form-check-input">
                            <label class="form-check-label" for="perm{{ $permission->id }}">
                                {{ ucfirst(str_replace('_', ' ', $permission->name)) }}
                            </label>
                        </div>
                    </div>
                @endforeach
                @error('permissions')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Create Role
        </button>
    </form>
</div>
@endsection
