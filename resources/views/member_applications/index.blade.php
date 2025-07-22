@extends('layouts.app')
@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-primary border-radius-lg pt-4 pb-3" style="background: linear-gradient(195deg, #42a5f5, #1e88e5);">
                    <h6 class="text-white text-capitalize ps-3">Membership Applications</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                @if(session('success'))
                    <div class="alert alert-success mx-4">{{ session('success') }}</div>
                @endif
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">No.</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Applicant</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Club</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Reason</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">File</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($applications as $app)
                                <tr>
                                    <td class="ps-3">{{ $loop->iteration }}</td>
                                    <td>{{ $app->user->name }}<br><small>{{ $app->user->email }}</small></td>
                                    <td>{{ $app->club->name }}</td>
                                    <td>{{ $app->reason }}</td>
                                    <td>
                                        @if($app->file_path)
                                            <a href="{{ asset('storage/' . $app->file_path) }}" target="_blank">View</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $app->status == 'approved' ? 'success' : ($app->status == 'rejected' ? 'danger' : 'secondary') }}">{{ ucfirst($app->status) }}</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('member-applications.update', $app) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select form-select-sm d-inline w-auto">
                                                <option value="pending" {{ $app->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="approved" {{ $app->status == 'approved' ? 'selected' : '' }}>Approve</option>
                                                <option value="rejected" {{ $app->status == 'rejected' ? 'selected' : '' }}>Reject</option>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        </form>
                                        <form action="{{ route('member-applications.destroy', $app) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-secondary text-sm">No Applications Available</td>
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