<div class="container">
    <h2>Book List</h2>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Published Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <!-- Kinukuha ang name mula sa Genre lookup table -->
                    <td>{{ $book->genre->name ?? 'Uncategorized' }}</td>
                    <td>{{ $book->published_year }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete Form with Method Spoofing -->
                        <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links (Idinagdag dito sa ilalim ng table) -->
    <div class="d-flex justify-content-center mt-4">
        {{ $books->links() }}
    </div>
</div>