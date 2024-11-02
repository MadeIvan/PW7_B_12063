@extends('dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary"> <i class='fas fa-user-plus'></i> Tambah Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('customer') }}">Customer</a>
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
                        <h5 class="mb-0"> <i class='fas fa-plus-circle'></i> Form Tambah Customer</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Customer" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email Customer" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">No Telepon</label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Masukkan No Telepon" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="id_bookings">Bookings</label>
                                    <select name="id_bookings" class="form-control @error('id_bookings') is-invalid @enderror">
                                        <option value="" disabled selected>Pilih bookings</option>
                                        @foreach ($bookings as $booking)
                                            <option value="{{ $booking->id }}">{{ $booking->class }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_bookings')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Masukkan Quantity" value="{{ old('quantity') }}">
                                    @error('quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Confirmation dialog before form submission
        const form = document.querySelector("form");

        // Real-time validation
        const nameInput = document.querySelector("input[name='name']");
        const emailInput = document.querySelector("input[name='email']");
        const phoneInput = document.querySelector("input[name='phone']");
        const quantityInput = document.querySelector("input[name='quantity']");
        const bookingSelect = document.querySelector("select[name='id_bookings']");

        function validateInput(input, message) {
            if (input.value.trim() === "") {
                input.classList.add("is-invalid");
                input.nextElementSibling.innerText = message;
                return false;
            } else {
                input.classList.remove("is-invalid");
                input.nextElementSibling.innerText = "";
                return true;
            }
        }

        nameInput.addEventListener("input", function () {
            validateInput(nameInput, "Nama tidak boleh kosong.");
        });

        emailInput.addEventListener("input", function () {
            validateInput(emailInput, "Email tidak boleh kosong.");
        });

        phoneInput.addEventListener("input", function () {
            validateInput(phoneInput, "No Telepon tidak boleh kosong.");
        });

        quantityInput.addEventListener("input", function () {
            validateInput(quantityInput, "Quantity tidak boleh kosong.");
        });

        bookingSelect.addEventListener("change", function () {
            validateInput(bookingSelect, "Pilih booking.");
        });

        // Form reset functionality
        document.querySelector(".btn-reset").addEventListener("click", function () {
            form.reset(); // Reset all fields
            document.querySelectorAll(".is-invalid").forEach(function (element) {
                element.classList.remove("is-invalid"); // Remove error class
            });
            document.querySelectorAll(".invalid-feedback").forEach(function (element) {
                element.innerText = ""; // Clear error messages
            });
        });
    });
</script>

@endsection
