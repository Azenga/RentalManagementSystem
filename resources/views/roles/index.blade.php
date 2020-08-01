@extends('layouts.app')


@section('content')
    
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <h4 class="font-weight-bold">System Roles</h4>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Add Role</a>
    </div>

    @if ($roles->count())
        <div class="table-responsive mt-3">
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->title }}</td>
                            <td>{{ $role->created_at }}</td>
                            <td>{{ $role->updated_at }}</td>
                            <td class="flex">
                                <button class="btn btn-sm btn-primary">Edit</button>
                                <button class="btn btn-sm btn-danger ml-2">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        
    @endif
</div>
@endsection