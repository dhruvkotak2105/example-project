@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Document</h2>
            </div>
        </div>
    </div>
<br>
    @if ($errors->any())
        <div class="alert alert-danger">
            There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('document.update', $document->id) }}" method="POST">
        @csrf
        @method('PATCH') <!-- Use PATCH method for update -->

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $document->name }}" autofocus>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $document->email }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="date"><strong>Date:</strong></label>
                   <input type="date" name="date" class="form-control" placeholder="Select Date" value="{{ $document->date->format('Y-m-d') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name"><strong>Time:</strong></label>
                    <input type="time" name="time" class="form-control" placeholder="Enter time" value="{{ $document->time }}">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="address"><strong>Address:</strong></label>
                    <input type="text" name="address" class="form-control" placeholder="Enter address" value="{{ $document->address }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
