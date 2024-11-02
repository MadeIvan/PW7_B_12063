@extends('dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary"> <i class='fas fa-user-edit'></i> Edit Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('customer') }}">Customer</a>
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
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"> <i class='fas fa-pencil-alt'></i> Form Edit Customer</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Customer" value="{{ old('name', $customer->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email Customer" value="{{ old('email', $customer->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">No Telepon</label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Masukkan No Telepon" value="{{ old('phone', $customer->phone) }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="id_bookings">Bookings</label>
                                    <select name="id_bookings" class="form-control @error('id_bookings') is-invalid @enderror">
                                        <option value="" disabled selected>Pilih bookings</option>
                                        @foreach ($bookings as $booking)
                                            <option value="{{ $booking->id }}" {{ $customer->id_bookings == $booking->id ? 'selected' : '' }}>
                                                {{ $booking->class }} ({{ $booking->book->title }}: {{ $booking->price }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_bookings')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Masukkan Quantity" value="{{ old('quantity', $customer->quantity) }}">
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
