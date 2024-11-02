@extends('dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary">
                    <i class="fas fa-edit"></i>
                    Edit Buku
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('book.index') }}">Book</a>
                    </li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-edit"></i>
                            Form Edit Buku
                        </h5>
                    </div>
                    <div class="card-body">
                        <!-- Update form action to use update route with method PUT -->
                        <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <!-- Upload Gambar -->
                                <div class="form-group col-md-6">
                                    <label for="poster">Upload Gambar</label>
                                    <input type="file" class="form-control-file @error('poster') is-invalid @enderror" name="poster" id="poster">
                                    @error('poster')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Judul Buku -->
                                <div class="form-group col-md-6">
                                    <label for="title">Judul Buku</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Masukkan Judul Buku" value="{{ old('title', $book->title) }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- Penulis -->
                                <div class="form-group col-md-6">
                                    <label for="author">Penulis</label>
                                    <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author" placeholder="Masukkan Nama Penulis" value="{{ old('author', $book->author) }}">
                                    @error('author')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jumlah Halaman -->
                                <div class="form-group col-md-6">
                                    <label for="pages">Jumlah Halaman</label>
                                    <input type="number" class="form-control @error('pages') is-invalid @enderror" name="pages" id="pages" placeholder="Masukkan Jumlah Halaman" value="{{ old('pages', $book->pages) }}">
                                    @error('pages')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    
    form.addEventListener("submit", function(event) {
        // Clear any previous error messages
        clearErrors();

        let hasError = false;

        // Validate Title
        const title = document.getElementById("title");
        if (title.value.trim() === "") {
            showError(title, "The title field is required.");
            hasError = true;
        }

        // Validate Author
        const author = document.getElementById("author");
        if (author.value.trim() === "") {
            showError(author, "The author field is required.");
            hasError = true;
        }

        // Validate Pages
        const pages = document.getElementById("pages");
        if (pages.value.trim() === "") {
            showError(pages, "The pages field is required.");
            hasError = true;
        } else if (isNaN(pages.value) || pages.value <= 0) {
            showError(pages, "Please enter a valid number of pages.");
            hasError = true;
        }

        // Validate Poster (optional)
        const poster = document.getElementById("poster");
        if (poster.files.length > 0) {
            const file = poster.files[0];
            const allowedTypes = ["image/jpeg", "image/png"];
            if (!allowedTypes.includes(file.type)) {
                showError(poster, "Please upload an image (JPG or PNG).");
                hasError = true;
            } else if (file.size > 2 * 1024 * 1024) { // 2MB limit
                showError(poster, "The image must be less than 2MB.");
                hasError = true;
            }
        }

        // Prevent form submission if there are errors
        if (hasError) {
            event.preventDefault();
        }
    });

    // Show error message
    function showError(input, message) {
        const errorDiv = document.createElement("div");
        errorDiv.classList.add("invalid-feedback");
        errorDiv.textContent = message;
        input.classList.add("is-invalid");
        input.parentNode.appendChild(errorDiv);
    }

    // Clear all error messages
    function clearErrors() {
        document.querySelectorAll(".is-invalid").forEach(element => {
            element.classList.remove("is-invalid");
        });
        document.querySelectorAll(".invalid-feedback").forEach(element => {
            element.remove();
        });
    }
});
</script>

@endsection
