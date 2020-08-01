@extends('layouts.app')


@section('content')

    <div class="container">
        <div>
            <a href="{{ route('roles.index') }}" class="btn btn-primary">Back To Roles</a>
        </div>

        <div class="row justify-content-center">
            <form class="col-md-8" action="{{ route('roles.store') }}" method="POST">

                <h4 class="font-weight-bold">Create New Role</h4>

                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Role Title" 
                            class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection