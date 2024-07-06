@include('user.partial.header')
@include('user.partial.navbar')


<main id="main" data-aos="fade-in">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Detail Pelatihan</h2>
            <p>Pelatihan Kami akan mempersiapkan Anda untuk menghadapi tuntutan dunia yang dinamis.</p>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-8">
                    <img src="Pelatihan/{{ $pelatihan->foto }}" class="img-fluid" alt="">
                    <h3>Deskripsi Pelatihan</h3>
                    <p>{{ $pelatihan->deskripsi }}</p>

                </div>
                <div class="col-lg-4">

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Judul Pelatihan</h5>
                        <p>{{ $pelatihan->judul }}</p>
                    </div>

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Kompetensi</h5>
                        <p>{{ $pelatihan->kategoriId->kategori }}</p>
                    </div>

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Instruktur</h5>
                        <p>{{ $pelatihan->instrukturId->nama }}</p>
                    </div>
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Waktu Pelatihan</h5>
                        <p>{{ $pelatihan->time }}</p>
                    </div>
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Tanggal Pelatihan</h5>
                        @php
                            use Carbon\Carbon;
                        @endphp
                        <p>{{ \Carbon\Carbon::parse($pelatihan->date)->isoFormat('DD-MM-YYYY') }}</p>
                    </div>

                    <div class="col-12 bottom-menu mb-3">
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Harga Pelatihan</h5>
                            <p>{{ 'Rp ' . number_format($pelatihan->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <a href="https://wa.me/6285795899901?text=Hallo!!Saya *{{ Auth::user()->name }}* ingin membeli pelatihan *{{ $pelatihan->judul }}* informasi bersangkutan: https://wwww.sukarobot.com/pelatihan-detail/{{ $pelatihan->judul }}"
                                type="button" class="btn btn-success w-100"><i class="bi bi-whatsapp"></i> Whatsapp</a>
                        </div>
                        <div class="col-12 bottom-menu">
                            @if ($payment && ($payment->status == 'Berhasil' || $payment->status == 'Diproses'))
                                <button class="btn btn-success w-100" type="button">Anda Sudah Checkout</button>
                            @elseif (!$payment || $payment->id== null)
                                @if ($pelatihan->harga == 0)
                                    <form action="{{ url('/home/pelatihan-detail/free', $pelatihan->judul) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-secondary w-100" type="submit">Free Checkout</button>
                                    </form>
                                @else
                                    <form action="{{ url('/home/pelatihan-detail', $pelatihan->judul) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-secondary w-100" type="submit">Checkout</button>
                                    </form>
                                @endif
                            @endif
                        </div>



                        </div>
                    </div>


                </div>


            </div>

        </div>
    </section><!-- End Cource Details Section -->



</main><!-- End #main -->
<!-- ======= Clients Section ======= -->
@include('user.partial.footer')
