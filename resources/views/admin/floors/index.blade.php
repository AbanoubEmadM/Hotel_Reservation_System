@extends('layouts.app')

@section('content')

    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Floors Management</h1>
            <p class="text-gray-600">Manage and view all floors in the system</p>
        </div>
        {{-- add create receptionist button --}}
        <div class="create-receptionist-button mb-4">
            <a href="{{ route('admin.floors.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-sm">
                Create Floor
            </a>
        </div>
    <div class="table-resposive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Floor Number</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($floors as $floor)
                    <tr>
                        <td>{{ $floor->id }}</td>
                        <td>{{ $floor->number }}</td>
                        <td>{{ $floor->name }}</td>
                        <td>
                            <div class="d-flex gap-2">
                            <a href="{{ route('admin.floors.edit', $floor->id) }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm">
                                Edit
                            </a>
                            <form onsubmit="return confirm('Are you sure you want to delete this user?')" action="{{ route('admin.floors.destroy', $floor->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">
                                    Delete
                                </button>
                            </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable();
        });
    </script>
@endsection
