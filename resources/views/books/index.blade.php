@extends('layouts.app')

@section('content')
<div class="container py-2">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Book List</h2>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-dark table-bordered table-hover align-middle mb-0">
            <thead class="table-secondary text-dark">
                <tr>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Published Year</th>
                    <th class="text-center" style="width: 170px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <td class="fw-medium">{{ $book->title }}</td>
                        <!-- Retrieve genre name from the related Genre lookup model -->
                        <td>
                            <span class="badge bg-info text-dark">
                                {{ $book->genre->name ?? 'Uncategorized' }}
                            </span>
                        </td>
                        <td>{{ $book->published_year }}</td>
                        <td class="text-center text-nowrap">
                            <!-- Edit Book action -->
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm me-1">Edit</a>

                            <!-- Delete Book form with DELETE method spoofing -->
                            <form
                                action="{{ route('books.destroy', $book) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this book?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">No books found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination links for the books collection -->
    <div class="d-flex justify-content-center mt-4">
        {{ $books->links() }}
    </div>
</div>
@endsection