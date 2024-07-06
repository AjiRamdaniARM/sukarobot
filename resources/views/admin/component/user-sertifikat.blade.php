@include('admin.partial.header')
@php
    use Carbon\Carbon;
@endphp
@include('admin.partial.navbar')
@include('admin.partial.sidebar')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Sertifikat saya</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Sertifikat saya</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            @if ($sertifikat->isEmpty())
                <p>Anda belum memiliki sertifikat.</p>
            @else
                @foreach ($sertifikat as $item)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <p></p>
                                <!-- Slides only carousel -->
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <iframe src="{{ $item->file }}" class="d-block w-100"
                                                alt="..."></iframe>
                                        </div>
                                    </div>
                                    <h5 class="card-title">{{ $item->userId->name }}</h5>
                                    <div class="d-flex justify-content-between">

                                        <span class="text-success small">{{ $item->pelatihan->judul }}</span>
                                        <a href="{{ $item->file }}" type="button" class="bi bi-arrow-down-square small" download> Download</a>
                                    </div>
                                </div><!-- End Slides only carousel-->
                            </div>
                        </div>

                    </div>
                @endforeach
            @endif
        </div>
    </section>

</main><!-- End #main -->

@include('admin.partial.footer')
