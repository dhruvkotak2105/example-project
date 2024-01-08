@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Document List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('document.create') }}">Create New Document</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Date</th>
            <th>Time</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($documents as $document)
        <tr>
            <td>{{ $document->name }}</td>
            <td>{{ $document->address }}</td>
            <td>{{ $document->date->format('d-m-Y') }}</td>
            <td>{{ $document->FormattedTime }}</td>
            <td>{{ $document->email }}</td>
            <td>
                <form action="{{ route('document.destroy',$document->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('document.show',$document->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('document.edit',$document->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{!! $documents->links() !!}
</div>
@endsection


