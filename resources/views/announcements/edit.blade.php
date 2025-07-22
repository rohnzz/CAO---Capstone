@extends('layouts.app')
@section('page-content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-primary border-radius-lg pt-4 pb-3" style="background: linear-gradient(195deg, #42a5f5, #1e88e5);">
                    <h6 class="text-white text-capitalize ps-3">Edit Announcement</h6>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('announcements.update', $announcement) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $announcement->title) }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Content</label>
                        <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body', $announcement->body) }}</textarea>
                        @error('body')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Attachment (PDF/Image, optional)</label>
                        <input type="file" name="file" id="file" class="form-control" accept=".pdf,image/*">
                        @if($announcement->file_path)
                            <div class="mt-2">
                                <strong>Current:</strong>
                                @if(Str::endsWith($announcement->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                    <img src="{{ asset('storage/' . $announcement->file_path) }}" alt="Attachment" style="max-width: 80px; max-height: 80px;">
                                @else
                                    <a href="{{ asset('storage/' . $announcement->file_path) }}" target="_blank">Download</a>
                                @endif
                            </div>
                        @endif
                        @error('file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Announcement</button>
                    <a href="{{ route('announcements.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 