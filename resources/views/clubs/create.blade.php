@extends('layouts.base')

@section('content')
<div class="container mt-4">
    <h2>Add Club</h2>
    <form action="{{ route('clubs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Club Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="head_coach_id" class="form-label">Head Coach</label>
            <select name="head_coach_id" id="head_coach_id" class="form-control">
                <option value="">None</option>
                @foreach($headCoaches as $coach)
                    <option value="{{ $coach->id }}" {{ old('head_coach_id') == $coach->id ? 'selected' : '' }}>{{ $coach->name }}</option>
                @endforeach
            </select>
            @error('head_coach_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Create Club</button>
        <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection 