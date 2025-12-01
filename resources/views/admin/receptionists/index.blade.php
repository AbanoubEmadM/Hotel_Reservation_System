@extends('layouts.app')

@section('content')

    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Receptionists Management</h1>
            <p class="text-gray-600">Manage and view all registered receptionists in the system</p>
        </div>
        {{-- add create receptionist button --}}
        <div class="create-receptionist-button mb-4">
            <a href="{{ route('admin.receptionists.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-sm">
                Create Receptionist
            </a>
        </div>
    <div class="table-resposive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($receptionists as $receptionist)
                    <tr>
                        <td>{{ $receptionist->id }}</td>
                        <td>{{ $receptionist->name }}</td>
                        <td>{{ $receptionist->email }}</td>
                        <td>{{ $receptionist->status }}</td>
                        <td>
                            <div class="d-flex gap-2">
                            <a href="{{ route('admin.receptionists.edit', $receptionist->id) }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm">
                                Edit
                            </a>
                            <form onsubmit="return confirm('Are you sure you want to delete this user?')" action="{{ route('admin.receptionists.destroy', $receptionist->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">
                                    Delete
                                </button>
                            </form>
                            @if($receptionist->status == 'inactive')
                                <form onsubmit="return confirm('Are you sure you want to activate this user?')" action="{{ route('admin.receptionists.activate', $receptionist->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-sm">
                                        Activate
                                    </button>
                                </form>
                            @else
                            <form onsubmit="return confirm('Are you sure you want to deactivate this user?')" action="{{ route('admin.receptionists.deactivate', $receptionist->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded text-sm">
                                    Deactivate
                                </button>
                            </form>
                            @endif
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
