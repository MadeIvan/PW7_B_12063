@extends('dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary"> <i class='fas fa-edit'></i> Edit Booking</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('bookings') }}">Bookings</a>
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
                        <h5 class="mb-0"> <i class='fas fa-pencil-alt'></i> Form Edit Booking</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('bookings.update', $bookings->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="class">Kelas</label>
                                    <input type="text" name="class" class="form-control @error('class') is-invalid @enderror" placeholder="Masukkan Nama Kelas" value="{{ old('class', $bookings->class) }}">
                                    @error('class')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">Harga</label>
                                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Masukkan Harga" value="{{ old('price', $bookings->price) }}">
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
