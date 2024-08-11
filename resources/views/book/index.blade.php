@extends('templates.master')
@section('title', 'Detail Data Buku')
@section('page-name', 'Detail Data Buku')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/scss/pages/simple-datatables.scss') }}">
@endpush
@section('content')

<section class="section">
    <div class="card">
        <div class="container ">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalTambahBuku">
                                <i class="fa fa-plus"></i> Tambah data buku</button>

                        </div>

                        <select class="form-select w-auto" id="sortingSelect" onchange="location = this.value;">
                            <option value="" disabled {{ request()->routeIs('book') && !request('category') ? 'selected'
                                : '' }}>-- Select Category --</option>
                            <option value="{{ route('book') }}" {{ request()->routeIs('book') && !request('category') ?
                                'selected' : '' }}>Semua Kategori</option>
                            @foreach ($categories as $category)
                            <option value="{{ route('book.filter', $category->id) }}" {{
                                request('category')==$category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <a class="btn btn-sm btn-success" href="{{ route('book.exportexcel') }}"><i
                            class="fas fa-file-excel" style=" font-size: 16px;"></i> Export Data </a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembuat Data</th>
                        <th>Judul Buku</th>
                        <th>Category Buku</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Buku</th>
                        <th>File Buku</th>
                        <th>Cover Buku</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->user->name }}</td>
                        <td>{{ $book->judul_buku }}</td>
                        <td><span class="badge bg-success">{{ $book->category->name }}</span></td>
                        <td>{{ $book->deskripsi }}</td>
                        <td>{{ $book->jumlah_buku }} <i class="fa-solid fa-book"></i></td>
                        <td>
                            <a href="{{ asset('storage/'. $book->file_buku) }}" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa fa-eye"></i></a>

                        </td>
                        <td>
                            <a href="{{ asset('storage/'. $book->cover_buku) }}" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa fa-eye"></i></a>
                        </td>
                        <td>
                            @if(Auth::check())
                            @if(Auth::user()->roles == 'admin' || $book->user_id == Auth::id())
                            {{-- modal edit --}}
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#modalEditBuku{{ $book->id }}">
                                <i class="fa fa-edit"></i>
                            </button>

                            {{-- delete form --}}
                            <form id="delete-form-{{ $book->id }}" action="{{ route('book.destroy', $book->id) }}"
                                method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger delete-btn">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            @endif
                            @endif

                        </td>
                    </tr>

                    {{-- modal edit --}}
                    <div class="modal fade" id="modalEditBuku{{ $book->id }}" tabindex="-1"
                        aria-labelledby="modalEditBukuLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalEditBukuLabel">Edit Data Buku</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">
                                    <form action="{{ route('book.update', $book->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="judul_buku" class="form-label
                                                ">Judul Buku</label>
                                            <input type="text" class="form-control" id="judul_buku" name="judul_buku"
                                                value="{{ $book->judul_buku }}">
                                        </div>
                                        @error('judul_buku')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi"
                                                name="deskripsi">{{ $book->deskripsi }}</textarea>
                                        </div>
                                        @error('deskripsi')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="jumlah_buku" class="form-label
                                                ">Jumlah Buku</label>
                                            <input type="number" class="form-control" id="jumlah_buku"
                                                name="jumlah_buku" value="{{ $book->jumlah_buku }}">
                                        </div>
                                        @error('jumlah_buku')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="file_buku" class="form-label">File Buku</label>
                                            <input type="file" class="form-control" id="file_buku" name="file_buku"
                                                value="{{ $book->file_buku }}">
                                        </div>
                                        @error('file_buku')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="cover_buku" class="form-label
                                                ">Cover Buku</label>
                                            <input type="file" class="form-control" id="cover_buku" name="cover_buku"
                                                value="{{ $book->cover_buku }}">
                                        </div>
                                        @error('cover_buku')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label
                                                ">Category Buku</label>
                                            <select class="form-select" id="category_id" name="category_id">
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $book->category_id ==
                                                    $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- endModal --}}
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>

{{-- modal book --}}
<div class="modal fade" id="modalTambahBuku" tabindex="-1" aria-labelledby="modalTambahBukuLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTambahBukuLabel">Tambah Data Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul_buku" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judul_buku" name="judul_buku">
                    </div>
                    @error('judul_buku')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                    @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="jumlah_buku" class="form-label">Jumlah Buku</label>
                        <input type="number" class="form-control" id="jumlah_buku" name="jumlah_buku">
                    </div>
                    @error('jumlah_buku')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="file_buku" class="form-label">File Buku</label>
                        <input type="file" class="form-control" id="file_buku" name="file_buku">
                    </div>
                    @error('file_buku')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="cover_buku" class="form-label">Cover Buku</label>
                        <input type="file" class="form-control" id="cover_buku" name="cover_buku">
                    </div>
                    @error('cover_buku')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category Buku</label>
                        <select class="form-select" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- endModal --}}


<script src="{{ asset ('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script>
    let dataTable = new simpleDatatables.DataTable(
                    document.getElementById("table1")
                )               
</script>

<script src="assets/js/main.js"></script>

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>


@if(session()->has('success'))
<script>
    Swal.fire({
    icon: 'success',
    title: 'Success',
    text : "{{ session('success') }}",
    showConfirmButton: true,
    timer: 2000
    });
</script>
@endif

@if(session()->has('error'))
<script>
    Swal.fire({
    icon: 'Failed',
    title: 'Error',
    text : "{{ session('error') }}",
    showConfirmButton: true,
    timer: 2000
    });
</script>
@endif
@endpush