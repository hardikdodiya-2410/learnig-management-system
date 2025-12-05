@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Role: <span class="text-capitalize">{{ $role->name }}</span></h2>
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
    <form action="{{ route('admin.editrole', $role->id) }}" method="POST" class="shadow p-4 bg-light rounded">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $role->name) }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Permissions</label>
            <div class="row">
                @foreach ($permissions as $permission)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" id="perm_{{ $permission->id }}" value="{{ $permission->name }}"{{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="perm_{{ $permission->id }}">
                                {{ ucfirst($permission->name) }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
            @error('permissions')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-pencil-square me-1"></i> Update Role
        </button>
    </form>
</div>
@endsection
