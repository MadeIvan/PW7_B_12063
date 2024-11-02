@extends('dashboard') 
@section('content') 
<div class="content-header"> 
    <div class="container-fluid"> 
        <div class="row mb-2"> 
            <div class="col-sm-6"> 
                <h1 class="m-0">BOOKS</h1> 
            </div> 
            <!-- /.col --> 
            <div class="col-sm-6"> 
                <ol class="breadcrumb float-sm-right"> 
                    <li class="breadcrumb-item"> 
                        <a href="#">BOOKS</a> 
                    </li> 
                    <li class="breadcrumb-item active">Index</li> 
                </ol> 
            </div> 
            <!-- /.col --> 
        </div> 
        <!-- /.row --> 
    </div> 
<!-- /.container-fluid --> 
</div> 
<!-- /.content-header --> 
<!-- Main content --> 
<div class="content"> 
    <div class="container-fluid"> 
        <div class="row"> 
            <div class="col-12"> 
                <div class="card"> 
                    <div class="card-body"> 
                        <a href="{{ route('book.create') }}" class="btn btnmd btn-success mb-3">Tambah Buku</a> 
                            <div class="table-responsive p-0"> 
                                <table class="table table-hover textnowrap"> 
                                    <thead> 
                                        <tr> 
                                            <th class="text-center">Poster</th>
                                            <th class="text-center">Title</th> 
                                            <th class="text-center">Author</th> 
                                            <th class="textcenter">Page</th> 
                                            <th class="text-center">Aksi</th> 
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                        @forelse ($book as $item) 

                                        <tr>
                                        <td class="text-center">
                                                <img src="{{ asset($item->poster) }}" alt="Poster" width="100" height="150">
                                        </td>
                                        <td class="text-center">{{ $item->title }}</td> 
                                        <td class="text-center">{{ $item->author }}</td> 
                                        <td class="text-center">{{ $item->pages}}</td> 
                                            <td class="text-center"> 
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('book.destroy', $item->id)}}" method="POST"> 
                                                <a href="{{route('book.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a> 
                                                @csrf 
                                                @method('DELETE') 
                                                <button type="submit"class="btn btn-sm btn-danger">Hapus</button> 
                                            </form> 
                                            </td> 
                                        </tr> 
                                        @empty 
                                        <div class="alert alert-danger"> 
                                        Data Buku belum tersedia 
                                        </div> 
                                        @endforelse 
                                    </tbody> 
                            </table> 
                        </div> 
                        {{ $book->links() }} 
                        </div> 
                    <!-- /.card-body --> 
                </div> 
                <!-- /.card --> 
            </div> 
            <!-- /.col-md-6 --> 
        </div> 
        <!-- /.row --> 
    </div> 
    <!-- /.container-fluid --> 
</div> 
@endsection