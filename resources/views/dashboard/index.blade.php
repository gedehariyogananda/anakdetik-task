@extends('templates.master')
@section('title', 'Statistic Buku')
@section('page-name', 'Statistic Buku')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/scss/pages/simple-datatables.scss') }}">
@endpush
@section('content')

<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="statistics">
                        <h3>Buku dengan Stok Terbanyak</h3>
                    </div>
                    <canvas id="booksChart" width="100" height="100"></canvas>
                </div>
                <div class="col-md-6">
                    <div class="statistics mt-4 mt-md-0">
                        <h3>Kategori dengan Buku Terbanyak</h3>
                    </div>
                    <canvas id="categoriesChart" width="100" height="100"></canvas>
                </div>
            </div>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    function truncateText(text, maxLength) {
    if (text.length > maxLength) {
        return text.substring(0, maxLength) + '...';
    }
    return text;
}

var ctxBooks = document.getElementById('booksChart').getContext('2d');
var truncatedLabels = {!! json_encode($books->pluck('judul_buku')) !!}.map(function(label) {
    return truncateText(label, 20); 
});

var booksChart = new Chart(ctxBooks, {
    type: 'bar',
    data: {
        labels: truncatedLabels,
        datasets: [{
            label: 'Jumlah Buku',
            data: {!! json_encode($books->pluck('jumlah_buku')) !!},
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            },
            x: {
                ticks: {
                    maxRotation: 0, 
                    minRotation: 0
                }
            }
        }
    }
});
</script>

<script>
    var ctxCategories = document.getElementById('categoriesChart').getContext('2d');
    var categoriesChart = new Chart(ctxCategories, {
        type: 'pie',
        data: {
            labels: {!! json_encode(array_column($topCategories, 'name')) !!},
            datasets: [{
                label: 'Total Buku',
                data: {!! json_encode(array_column($topCategories, 'total')) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Kategori dengan Buku Terbanyak'
                }
            }
        }
    });
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