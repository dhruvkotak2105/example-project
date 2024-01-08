@extends('layouts.app')
<form method="POST" action="{{ route('profile.update',['profile' => auth()->user()->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="profile_image">Profile Image</label>
        <input id="profile_image" type="file" class="form-control" name="profile_image">
        @if ($user->profile_image)
            <span class="text-muted">{{ $user->profile_image }}</span>
        @endif
        <a href="{{ route('profile.preview-image') }}" target="_blank">Preview image</a>
    </div>

    <!-- Add other profile fields -->

    <button type="submit" class="btn btn-primary">Update Profile</button>
</form>
