@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Floor</h1>
            <p class="text-gray-600">Update floor information</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.floors.update', $floor->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="room_id" class="form-label">Room</label>
                        <select name="room_id"
                                id="room_id"
                                class="form-control @error('room_id') is-invalid @enderror"
                                required>
                            <option value="">Select a room</option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}" {{ old('room_id', $floor->room_id) == $room->id ? 'selected' : '' }}>
                                    Room {{ $room->id }} - {{ $room->roomType->name ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                        @error('room_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Floor Name</label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $floor->name) }}"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="e.g., First Floor, Ground Floor"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="number" class="form-label">Floor Number</label>
                        <input type="number"
                               name="number"
                               id="number"
                               value="{{ old('number', $floor->number) }}"
                               class="form-control @error('number') is-invalid @enderror"
                               min="1"
                               max="255"
                               required>
                        <div class="form-text">Enter a number between 1 and 255.</div>
                        @error('number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.floors.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Update Floor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

