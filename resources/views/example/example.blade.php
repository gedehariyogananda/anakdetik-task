@extends('templates.master')
@section('title', 'Example')
@section('page-name', 'Example')
@push('styles')
{{--
Disini Tempat Buat Naruh Custom CSS (Mungkin Ada) But Not Mandatory
--}}
@endpush
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Default Layout</h4>
    </div>
    <div class="card-body">
        Ini Contoh Ya Gess
    </div>

    {{-- example modal --}}
    <!-- modalVideos -->
    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalVideo"><i
            class="fa fa-video"></i></button>

    <div class="modal fade" id="modalVideo" tabindex="-1" aria-labelledby="modalVideoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalVideoLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-2">
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- endModal --}}


</div>
@endsection
@push('scripts')
{{--
Disini Tempat Buat Naruh Custom JS (Mungkin Ada) But Not Mandatory
--}}
@endpush