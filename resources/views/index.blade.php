@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Store List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Address</th>
                    <th>Distance (km)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stores as $store)
                    <tr>
                        <td>{{ $store->title }}</td>
                        <td>{{ $store->address }}</td>
                        <td>{{ number_format($store->distance, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
