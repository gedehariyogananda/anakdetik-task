@extends('templates.master')
@section('title', 'Detail Data User')
@section('page-name', 'Detail Data User')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/scss/pages/simple-datatables.scss') }}">
@endpush
@section('content')

<section class="section">
    <div class="card">
        <div class="container ">
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembuat Data</th>
                        <th>Judul Buku</th>
                        <th>Jumlah Buku</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookCategories as $bookCategory)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bookCategory->user->name }}</td>
                        <td>{{ $bookCategory->judul_buku }}</td>
                        <td>{{ $bookCategory->jumlah_buku }} Stock Buku </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>


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
@endpush