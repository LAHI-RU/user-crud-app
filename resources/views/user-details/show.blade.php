@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-4">User Details: {{ $userDetails->name }}</h1>
                <p><strong>Email:</strong> {{ $userDetails->email }}</p>
                <p><strong>Phone:</strong> {{ $userDetails->phone ?? 'N/A' }}</p>
                <a href="{{ route('user-details.index') }}" class="text-blue-600 hover:text-blue-900 mt-4 inline-block">Back to List</a>
            </div>
        </div>
    </div>
@endsection