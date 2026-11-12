<div class="container">
    <h2>Edit Book</h2>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Book Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Genre Dropdown -->
        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select name="genre_id" id="genre_id" class="form-control" required>
                <option value="">-- Select Genre --</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id', $book->genre_id) == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="published_year" class="form-label">Published Year</label>
            <input type="number" name="published_year" id="published_year" class="form-control" value="{{ old('published_year', $book->published_year) }}" required>
            @error('published_year')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>