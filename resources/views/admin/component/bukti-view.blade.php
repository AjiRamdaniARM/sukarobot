@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Bukti Pelatihan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Bukti Pelatihan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if (session()->has('success'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                        role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                        role="alert">
                        {{ session()->get('error') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Bukti Pelatihan</h5>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Pelatihan</th>
                                        <th scope="col">Question 1</th>
                                        <th scope="col">Question 2</th>
                                        <th scope="col">Bukti</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bukti as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->userId->name }}</td>
                                            <td>{{ optional ($item->pelatihanId)->judul }}</td>
                                            <td>{{ $item->q1 }}</td>
                                            <td>{{ $item->q2 }}</td>
                                            <td><img src="Bukti/{{ $item->foto }}" alt="transaksi"
                                                 class="rounded-lg w-28">
                                            </td>

                                            <td>
                                                <a href="#" style="button" class="btn btn-primary" title="detail"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#verticalycentered{{ $item->id }}"><i
                                                        class="bi bi-info-circle"></i></a>

                                            </td>
                                            <div class="modal fade" id="verticalycentered{{ $item->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Bukti Pelatihan</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="transaksi/{{ $item->foto }}" alt="transaksi"
                                                                class="img-fluid mx-auto d-block">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@include('admin.partial.footer')
