@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <img src="{{ asset('storage/profile_images/' . $user->profile_image) }}" alt="Profile Image" class="img-fluid">
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                        <li class="list-group-item"><strong>Address:</strong> {{ $user->address ?: 'Not provided' }}</li>
                        <!-- Add other profile fields as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
