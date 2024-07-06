@include('user.partial.header')

@php
    use Carbon\Carbon;
@endphp
@include('user.partial.navbar')
<main id="main">
    <br>

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                    class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Pendidikan dan Pelatihan Teknologi, <br> Menggali potensi masa depan anda</h1>
            <h2>Selamat datang di Website resmi Sukarobot Academy.</h2>

            <a href="{{url('/home/pelatihan')}}" class="btn-get-started">Ikuti Pelatihan</a>
        </div>
    </section><!-- End Hero -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                    <iframe height="315" src="https://www.youtube.com/embed/rKzSLsyB0RY?si=9ft_QTUE_A3BXPoK"
                    title="suakarobot academy" class="container-fluid left-0 right-0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" style="width:100%" allowfullscreen></iframe>
                    {{-- <img src="assets/img/about.jpg" class="img-fluid" alt=""> --}}
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3 class="fw-bold">Sesuatu yang mudah <span style="color: #096982">kenapa harus dibuat sulit</span>
                    </h3>
                    <p class="justify">
                        Pada saat ini begitu banyak mimpi untuk kemajuan pendidikan, mulai dari biaya
                        murah berkualitas, kesejahteraan pengajar, sarana dan prasarana yang baik dan
                        memadai
                    </p>
                    <p class="justify">
                        Itu semua sebagian kecil dari mimpi kita bangsa Indonesia untuk pendidikan.
                        Lantas apa yang harus kita lakukan ?
                    </p>
                    <p class="justify">
                        Rasanya banyak hal yang tidak akan berarti jika kemajuan bangsa ini tidak dibarengi
                        dengan kemajuan SDM. Yang perlu anda ketahui untuk kami tentunya saya dan Nayaguna
                        Tech semua itu bukan lagi mimpi tapi PR yang akan kami kejar dan kami buktikan.
                    </p>
                    <p class="fst-italic"><b>
                            “Kita Yakin Kita Bisa !”</b>
                    </p>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $user }}"
                        data-purecounter-duration="1" class="purecounter"></span>
                    <p>Students</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $countPel }}"
                        data-purecounter-duration="1" class="purecounter"></span>
                    <p>Pelatihan</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $countGal }}"
                        data-purecounter-duration="1" class="purecounter"></span>
                    <p>Galeri</p>
                </div>
                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $countIns }}"
                        data-purecounter-duration="1" class="purecounter"></span>
                    <p>Instruktur</p>
                </div>
            </div>
        </div>
    </section>

    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">
            <div class="d-flex m-5 container-fluid position-relative mb-3 align-items-stretch">
                <div class="content">
                  <h3>Mengapa Memilih Sukarobot Academy?</h3>
                  <p>
                      Sukarobot Academy secara mampu holistik meningkatkan kreativitas, daya imajinasi, pola pikir inovatif, kemampuan programming dasar, kerja tim, dan keterampilan presentasi siswa.
                  </p>
                </div>
            </div>
          <div class="row container-fluid position-relative m-1">
            <div class="col-lg-12">
                <div class=" d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                      <div class="row">
                        <div class="col-xl-4 d-flex align-items-stretch">
                          <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bxs bx-receipt"></i>
                            <h4>Ekstrakulikuler</h4>
                            <p>Mengajarkan siswa pembuatan robot dari dasar hingga tingkat lanjut, sesuai kurikulum dengan modul yang mudah dipahami.</p>
                          </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch">
                          <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bxs bx-cube-alt"></i>
                            <h4>Holiday Program</h4>
                            <p>Liburan bermanfaat, cintai teknologi lewat materi fun, proyek thematic, dan tingkatkan kerjasama serta tanggung jawab.</p>
                          </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch">
                          <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bxs bx-images"></i>
                            <h4>Workshop/Pelatihan</h4>
                            <p>Mengajarkan robotic dalam format setengah hari atau sehari penuh, disesuaikan dengan tema dan tingkat akademik peserta.</p>
                          </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch">
                          <div class="icon-box mt-4 mt-xl-0">
                            <i class='bx bxs bx-credit-card-front'></i>
                            <h4>Sertifikasi</h4>
                            <p>Telah mengikuti pelatihan robotika setengah hari sesuai dengan tema dan tingkat akademik peserta.</p>
                          </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch">
                          <div class="icon-box mt-4 mt-xl-0">
                            <i class='bx bxs bxs-crown'></i>
                            <h4>Kompetisi</h4>
                            <p>Telah berpartisipasi dalam kompetisi robotika yang disesuaikan dengan tema dan tingkat akademik peserta.</p>
                          </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch">
                          <div class="icon-box mt-4 mt-xl-0">
                            <i class='bx bxs bxs-school' ></i>
                            <h4>Sukarobot Back To School</h4>
                            <p>Telah mengikuti acara Sukarobot Back To School yang disesuaikan dengan tema dan tingkat akademik peserta.</p>
                          </div>
                        </div>
                      </div>
                    </div><!-- End .content-->
                  </div>
            </div>

          </div>

        </div>
      </section><!-- End Why Us Section -->
    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Pelatihan</h2>
                <p>Rekomendasi Pelatihan</p>
            </div>

            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                @foreach ($pelatihan as $item)

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <a class="scale" href="{{ url('/home/pelatihan-detail', $item->judul) }}">
                        <div class="course-item">
                            <img src="Pelatihan/{{ $item->foto }}" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 >{{ $item->kategoriId->kategori }}</h4>
                                    <p class="price">{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</p>
                                </div>
                                <h3 class="text-dark">{{ $item->judul }}
                                </h3>
                                <p>{{ Str::limit($item->deskripsi, 100) }}</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="Instruktur/{{ $item->instrukturId->foto }}" class="img-fluid"
                                            alt="">
                                        <span>{{ $item->instrukturId->nama }}</span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <a id="whatsapp" class="ri ri-whatsapp-line small" target="_blank"
                                        onclick="copyShareWhatsapp('{{ url('/home/pelatihan-detail', $item->judul) }}', '{{ $item->judul }}')"></a> &nbsp;
                                        <script>
                                            function copyShareWhatsapp(url, judul) {
                                                // Buat link yang akan dibagikan
                                                var shareLink = url;

                                                // Dapatkan elemen dengan ID "whatsapp"
                                                var whatsappElement = document.getElementById('whatsapp');

                                                // Ganti link href dengan link WhatsApp yang sesuai
                                                whatsappElement.href = 'https://api.whatsapp.com/send?text=' + encodeURIComponent(shareLink);

                                                // Salin link ke clipboard (opsional)
                                                navigator.clipboard.writeText(shareLink).then(function() {
                                                    // Tampilkan pesan sukses atau lakukan tindakan lain
                                                    alert('Link telah disalin ke clipboard dan link WhatsApp telah diperbarui: ' + shareLink);
                                                }).catch(function(err) {
                                                    // Tampilkan pesan error atau lakukan tindakan lain
                                                    console.error('Gagal menyalin link: ', err);
                                                });
                                            }
                                        </script>
                                        <a class="bx bx-copy small"
                                        onclick="copyShareLink('{{ url('/home/pelatihan-detail', $item->judul) }}', '{{ $item->judul }}')"></a>
                                    </div>
                                    <div class="modal fade" id="floatingNotificationModal" tabindex="-1" aria-labelledby="floatingNotificationModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="floatingNotificationModalLabel">Notifikasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Tautan Pelatihan berhasil disalin!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function copyShareLink(link, title) {
                                            var shareLinkInput = document.createElement('textarea');
                                            shareLinkInput.value = link;
                                            document.body.appendChild(shareLinkInput);
                                            shareLinkInput.select();
                                            document.execCommand('copy');
                                            document.body.removeChild(shareLinkInput);

                                            // Tampilkan modal notifikasi mengambang
                                            showFloatingNotificationModal();
                                        }

                                        function showFloatingNotificationModal() {
                                            var floatingNotificationModal = new bootstrap.Modal(document.getElementById('floatingNotificationModal'), {});
                                            floatingNotificationModal.show();

                                            // Sembunyikan modal setelah beberapa detik (opsional)
                                            setTimeout(function() {
                                                floatingNotificationModal.hide();
                                            }, 1000); // Atur waktu penutupan modal (misalnya, 3000 milidetik = 3 detik)
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div> <!-- End Course Item-->

                @endforeach

            </div>

        </div>
    </section><!-- End Popular Courses Section -->


    <section id="testimoni" class="testimoni">
        <div class="container" data-aos="fade-up">
            <div class="container-bg-t d-flex gap-4">

                <div class="card-testimoni">
                    <div class="header">
                        <div class="kutip">
                            <svg width="70" viewBox="0 0 25 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12.5" cy="12.5" r="12.5" fill="url(#paint0_linear_25_2)"/>
                                <path d="M18.1337 16.1L16.4537 17.84C15.2937 17.08 14.4537 16.04 13.9337 14.72C13.5537 13.76 13.3637 12.78 13.3637 11.78V8H17.9237V12.41H16.7237C16.4837 12.41 16.3437 12.45 16.3037 12.53C16.2437 12.63 16.2137 12.86 16.2137 13.22C16.2137 13.54 16.3537 13.93 16.6337 14.39C16.9937 14.99 17.4937 15.56 18.1337 16.1ZM11.7737 16.1L10.0937 17.84C8.93367 17.08 8.09367 16.04 7.57367 14.72C7.19367 13.76 7.00367 12.78 7.00367 11.78V8H11.5637V12.41H10.3637C10.1237 12.41 9.98367 12.45 9.94367 12.53C9.88367 12.63 9.85367 12.86 9.85367 13.22C9.85367 13.54 9.99367 13.93 10.2737 14.39C10.6337 14.99 11.1337 15.56 11.7737 16.1Z" fill="white"/>
                                <defs>
                                <linearGradient id="paint0_linear_25_2" x1="12.5" y1="0" x2="12.5" y2="25" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#36B7FF"/>
                                <stop offset="1" stop-color="#0092E5"/>
                                </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="banner">Testimoni</div>
                    </div>
                    <div class="body">
                        <p>Program pelatihan di Academy Sukarobot benar-benar luar biasa! Saya belajar banyak tentang pemrograman dan mekanika robot. Selain itu, lingkungan belajar yang mendukung dan kolaboratif membuat saya merasa nyaman dan termotivasi untuk terus belajar.</p>
                    </div>
                    <div class="footer">
                        <div class="bintang">
                            <img width="150px" src="assets/img/bintang.svg" alt="bintang-poto">
                        </div>
                    </div>
                </div>

                <div class="card-testimoni">
                    <div class="header">
                        <div class="kutip">
                            <svg width="70" viewBox="0 0 25 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12.5" cy="12.5" r="12.5" fill="url(#paint0_linear_25_2)"/>
                                <path d="M18.1337 16.1L16.4537 17.84C15.2937 17.08 14.4537 16.04 13.9337 14.72C13.5537 13.76 13.3637 12.78 13.3637 11.78V8H17.9237V12.41H16.7237C16.4837 12.41 16.3437 12.45 16.3037 12.53C16.2437 12.63 16.2137 12.86 16.2137 13.22C16.2137 13.54 16.3537 13.93 16.6337 14.39C16.9937 14.99 17.4937 15.56 18.1337 16.1ZM11.7737 16.1L10.0937 17.84C8.93367 17.08 8.09367 16.04 7.57367 14.72C7.19367 13.76 7.00367 12.78 7.00367 11.78V8H11.5637V12.41H10.3637C10.1237 12.41 9.98367 12.45 9.94367 12.53C9.88367 12.63 9.85367 12.86 9.85367 13.22C9.85367 13.54 9.99367 13.93 10.2737 14.39C10.6337 14.99 11.1337 15.56 11.7737 16.1Z" fill="white"/>
                                <defs>
                                <linearGradient id="paint0_linear_25_2" x1="12.5" y1="0" x2="12.5" y2="25" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#36B7FF"/>
                                <stop offset="1" stop-color="#0092E5"/>
                                </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="banner">Testimoni</div>
                    </div>
                    <div class="body">
                        <p>Program pelatihan di Academy Sukarobot benar-benar luar biasa! Saya belajar banyak tentang pemrograman dan mekanika robot. Selain itu, lingkungan belajar yang mendukung dan kolaboratif membuat saya merasa nyaman dan termotivasi untuk terus belajar.</p>
                    </div>
                    <div class="footer">
                        <div class="bintang">
                            <img width="150px" src="assets/img/bintang.svg" alt="bintang-poto">
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section><!-- End Trainers Section -->

    <!-- ======= Trainers Section ======= -->
    <section id="events" class="events">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Galeri</h2>
                <p>Galeri Kegiatan</p>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                @foreach ($galeri as $item)
                    <div class="col-md-4 d-flex align-items-stretch">
                        <div class="card">
                            <div class="card-img">
                                <img src="Galeri/{{ $item->foto }}" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a
                                        href="{{ url('/home/galeri-detail', $item->id) }}">{{ $item->judul }}</a>
                                </h5>
                                <p class="fst-italic text-center">
                                    {{ Carbon::parse($item->created_at)->setTimezone('Asia/Jakarta')->format('l, d M Y') }}
                                </p>
                                <p class="card-text">{{ Str::limit($item->deskripsi, 50) }}</p>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Trainers Section -->


    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Instruktur</h2>
                <p>Instruktur Ahli</p>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                @foreach ($instruktur as $item)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="Instruktur/{{ $item->foto }}" class="img-fluid" alt="sponsor">
                            <div class="member-content d-flex">
                                <div class="container">
                                    <h4>{{ $item->nama }}</h4>
                                    <span>{{ $item->kategori->kategori }}</span>
                                </div>
                                <div class="icon-instagram">
                                    @if(isset($item->instagram) && $item->instagram != "")
                                    <a href="{{ $item->instagram }}" class="property-button-ig">
                                        <img src="assets/img/instagram.svg" class="ig-property" alt="icon-instagram">
                                    </a>
                                @else
                                    <!-- Tambahkan kelas CSS untuk membuat tombol tidak aktif -->
                                    <a  class="property-button-ig disabled">
                                        <img src="assets/img/instagram.svg" style="  filter: grayscale(100%); " class="ig-property" alt="icon-instagram">
                                    </a>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Trainers Section -->

</main><!-- End #main -->
@include('user.partial.footer')
