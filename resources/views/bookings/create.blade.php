@extends('dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            
                <h1 class="m-0 text-primary"> <i class='fas fa-calendar-plus'></i>Tambah Booking</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('bookings') }}">Bookings</a>
                    </li>
                    <li class="breadcrumb-item active">Create</li>
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
                        <h5 class="mb-0"> <i class='fas fa-plus-circle'></i> Form Tambah Booking</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="width: 50%;">
                                            <div class="form-group">
                                                <label for="class">Kelas</label>
                                                <input type="text" name="class" class="form-control @error('class') is-invalid @enderror" placeholder="Masukkan Nama Kelas" value="{{ old('class') }}">
                                                @error('class')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </td>
                                        <td style="width: 50%;">
                                            <div class="form-group">
                                                <label for="price">Harga</label>
                                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Masukkan Harga" value="{{ old('price') }}">
                                                @error('price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="form-group">
                                                <label for="id_book">Pilih Buku</label>
                                                <select id="id_book" name="id_book" class="form-control @error('id_book') is-invalid @enderror">
                                                    <option value="" disabled selected>Pilih Buku</option>
                                                    @forelse ($book as $item)
                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @empty
                                                        <option value="">Tidak ada buku tersedia</option>
                                                    @endforelse
                                                </select>
                                                @error('id_book')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('form');
        const primaryColor = getComputedStyle(document.querySelector('.card-header')).backgroundColor;

        form.addEventListener('submit', (event) => {
            let hasError = false;

            // Get form fields
            const classInput = document.querySelector('input[name="class"]');
            const priceInput = document.querySelector('input[name="price"]');
            const bookSelect = document.querySelector('select[name="id_book"]');

            // Clear previous error messages
            clearError(classInput);
            clearError(priceInput);
            clearError(bookSelect);

            // Validate class input
            if (classInput.value.trim() === '') {
                showError(classInput, 'Class cannot be empty');
                hasError = true;
            }

            // Validate price input
            if (priceInput.value.trim() === '') {
                showError(priceInput, 'Price cannot be empty');
                hasError = true;
            }

            // Validate book selection
            if (bookSelect.value === '') {
                showError(bookSelect, 'Please select a book');
                hasError = true;
            }

            // Prevent form submission if there are validation errors
            if (hasError) {
                event.preventDefault();
            }
        });

        function showError(element, message) {
            // Check if an error message already exists
            if (!element.nextElementSibling || !element.nextElementSibling.classList.contains('error-message')) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.style.color = 'red';
                errorDiv.textContent = message;
                element.parentElement.appendChild(errorDiv);
            }
            // Add 'is-invalid' class to the input for visual cue and set border color
            element.classList.add('is-invalid');
            element.style.borderColor = primaryColor;
        }

        function clearError(element) {
            // Remove 'is-invalid' class and associated error message
            element.classList.remove('is-invalid');
            element.style.borderColor = ''; // Reset to default
            if (element.nextElementSibling && element.nextElementSibling.classList.contains('error-message')) {
                element.nextElementSibling.remove();
            }
        }
    });
</script>
@endsection
