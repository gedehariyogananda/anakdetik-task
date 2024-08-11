@extends('templates.master')
@section('title', 'Detail Category')
@section('page-name', 'Detail Category')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/scss/pages/simple-datatables.scss') }}">
@endpush
@section('content')

<section class="section">
    <div class="card">
        <div class="container ">
            <div class="card-header">
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory"><i
                        class="fa fa-plus"></i> Add category baru
                </button>

                {{-- modal add category --}}
                <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addCategoryLabel">Add Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('category.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Category Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal add category --}}
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Category</th>
                        <th>Total Buku</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td>{{ $category['total'] }} <i class="fa-solid fa-book"></i></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('category.show', $category['id']) }}"><i
                                    class="fa fa-sign-in-alt" aria-hidden="true"></i>
                            </a>

                            @if(Auth::check())
                            @if(Auth::user()->roles == 'admin')

                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editCategory{{ $category['id'] }}"><i class="fa fa-edit"></i>
                            </button>

                            {{-- modal update category --}}
                            <div class="modal fade" id="editCategory{{ $category['id'] }}" tabindex="-1"
                                aria-labelledby="editCategory{{ $category['id'] }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editCategory{{ $category['id'] }}Label">Edit
                                                Category</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('category.update', $category['id']) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Category Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        value="{{ $category['name'] }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end modal update category --}}

                            <form id="delete-form-{{ $category['id'] }}"
                                action="{{ route('category.destroy', $category['id']) }}" method="POST"
                                class="d-inline">
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
    icon: 'error',
    title: 'Failed',
    text : "{{ session('error') }}",
    showConfirmButton: true,
    timer: 2000
    });
</script>
@endif


@endpush