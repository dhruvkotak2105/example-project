@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Document</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('document.index') }}">Manage</a>
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

    <form action="{{ route('document.store') }}" id="documentForm" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" autofocus>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="date"><strong>Date:</strong></label>
                    <input type="date" name="date" class="form-control" placeholder="Select Date">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name"><strong>Time:</strong></label>
                    <input type="time" name="time" class="form-control" placeholder="Enter time" autofocus>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="address"><strong>Address:</strong></label>
                    <input type="text" name="address" class="form-control" placeholder="Enter address">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection
