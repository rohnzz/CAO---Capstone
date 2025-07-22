@extends('layouts.app')
@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-primary border-radius-lg pt-4 pb-3" style="background: linear-gradient(195deg, #42a5f5, #1e88e5);">
                    <h6 class="text-white text-capitalize ps-3">Head Coaches</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                @if(session('success'))
                    <div class="alert alert-success mx-4">{{ session('success') }}</div>
                @endif
                <div class="d-flex justify-content-end mx-4 mb-2">
                    <a href="{{ route('head-coaches.create') }}" class="btn btn-primary">Add Head Coach</a>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">No.</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($headCoaches as $coach)
                                <tr>
                                    <td class="ps-3">{{ $loop->iteration }}</td>
                                    <td><h6 class="mb-0 text-sm">{{ $coach->name }}</h6></td>
                                    <td>{{ $coach->email }}</td>
                                    <td>
                                        <a href="{{ route('head-coaches.edit', $coach) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('head-coaches.destroy', $coach) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-secondary text-sm">No Head Coaches Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 