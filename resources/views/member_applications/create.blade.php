@extends('layouts.app')
@section('page-content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-primary border-radius-lg pt-4 pb-3" style="background: linear-gradient(195deg, #42a5f5, #1e88e5);">
                    <h6 class="text-white text-capitalize ps-3">Apply for Club Membership</h6>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('member-applications.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="club_id" class="form-label">Select Club</label>
                        <select name="club_id" id="club_id" class="form-control" required>
                            <option value="">-- Select Club --</option>
                            @foreach($clubs as $club)
                                <option value="{{ $club->id }}" {{ old('club_id') == $club->id ? 'selected' : '' }}>{{ $club->name }}</option>
                            @endforeach
                        </select>
                        @error('club_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Why do you want to join?</label>
                        <textarea name="reason" id="reason" class="form-control" rows="4" required>{{ old('reason') }}</textarea>
                        @error('reason')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Supporting Document (optional)</label>
                        <input type="file" name="file" id="file" class="form-control">
                        @error('file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Submit Application</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 