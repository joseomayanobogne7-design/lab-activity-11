@extends('layouts.app')

@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card bg-secondary text-white border-0 shadow-sm">
                <div class="card-header bg-dark border-secondary">
                    <h4 class="mb-0">Edit Book</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Update existing book record with PUT method spoofing -->
                    <form action="{{ route('books.update', $book) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Book Title</label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title', $book->title) }}"
                                class="form-control bg-dark text-white border-secondary @error('title') is-invalid @enderror"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="genre_id" class="form-label">Genre</label>
                            <!-- Select current genre from the lookup table -->
                            <select
                                id="genre_id"
                                name="genre_id"
                                class="form-select bg-dark text-white border-secondary @error('genre_id') is-invalid @enderror"
                                required
                            >
                                <option value="">-- Select Genre --</option>
                                @foreach ($genres as $genre)
                                    <option
                                        value="{{ $genre->id }}"
                                        {{ old('genre_id', $book->genre_id) == $genre->id ? 'selected' : '' }}
                                    >
                                        {{ $genre->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="published_year" class="form-label">Published Year</label>
                            <input
                                type="number"
                                id="published_year"
                                name="published_year"
                                value="{{ old('published_year', $book->published_year) }}"
                                class="form-control bg-dark text-white border-secondary @error('published_year') is-invalid @enderror"
                                required
                            >
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Update Book</button>
                            <a href="{{ route('books.index') }}" class="btn btn-outline-light">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection