@extends('layouts.app')
@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-primary border-radius-lg pt-4 pb-3" style="background: linear-gradient(195deg, #42a5f5, #1e88e5);">
                    <h6 class="text-white text-capitalize ps-3">Announcements</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                @if(session('success'))
                    <div class="alert alert-success mx-4">{{ session('success') }}</div>
                @endif
                <div class="d-flex justify-content-end mx-4 mb-2">
                    <a href="{{ route('announcements.create') }}" class="btn btn-primary">Add Announcement</a>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">No.</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Content</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Attachment</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($announcements as $a)
                                <tr>
                                    <td class="ps-3">{{ $loop->iteration }}</td>
                                    <td><h6 class="mb-0 text-sm">{{ $a->title }}</h6></td>
                                    <td>{{ Str::limit(strip_tags($a->body), 60) }}</td>
                                    <td>
                                        @if($a->file_path)
                                            @if(Str::endsWith($a->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                                <img src="{{ asset('storage/' . $a->file_path) }}" alt="Attachment" style="max-width: 80px; max-height: 80px;">
                                            @else
                                                <a href="{{ asset('storage/' . $a->file_path) }}" target="_blank">Download</a>
                                            @endif
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('announcements.edit', $a) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('announcements.destroy', $a) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-secondary text-sm">No Announcements Available</td>
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