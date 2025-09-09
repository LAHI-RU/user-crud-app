@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-4">User Details List</h1>
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="{{ route('user-details.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add New</a>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($userDetails as $detail)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $detail->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $detail->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $detail->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $detail->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('user-details.show', $detail) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="{{ route('user-details.edit', $detail) }}" class="text-yellow-600 hover:text-yellow-900 ml-4">Edit</a>
                                    <form action="{{ route('user-details.destroy', $detail) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection