@include('user.partial.header')
<style type="text/css">
  .left    { text-align: left;}
  .right   { text-align: right;}
  .center  { text-align: center;}
  .justify { text-align: justify;}
</style>
@include('user.partial.navbar')



  <main id="main" data-aos="fade-in">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Tentang Kami</h2>
        <p>Kenalan lebih dekat sama sejarah Sukarobot Academy dan orang-orang dibaliknya</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row align-items-center">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
             <img src="assets/img/d-sukarobot.jpg" class="img-fluid" alt="sukarobot">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <div class="section-title">
                    <h2>Sejarah</h2>
                    <p>Sejarah Sukarobot Academy</p>
                  </div>
                  <p class="justify"><span class="fw-bold">Sukarobot Academy</span> merupakan Lembaga pendidikan non formal fokus memberikan edukasi bidang robotik dan koding yang dapat membangkitkan daya kreativitas, imajinasi dan inovasi anak di bawah naungan <span class="fw-bold">PT Sukarobot Academy Indonesia.</span></p>
                  <p class="justify"><span class="fw-bold">PT Sukarobot Academy</span> Indonesia memiliki bidang usaha yaitu : lembaga pendidikan dan pelatihan, Tempat Uji Kompetensi bidang TIK, dan project centre bidang TIK,Robotika, IoT, Aplikasi berbasis web. <span class="fw-bold">Sukarobot Academy</span> telah dirintis di Sukabumi sejak bulan Agustus tahun 2021 , mengawali kerjasama dengan 2 (dua) sekolah, dengan total siswa 50 orang. Pada tahun 2022 sukarobot telah bekerjasa denga 15 Sekolah dengan total siswa 275 siswa, Univesitas Nusa Putra, Pemerintah kota dan kabupaten Sukabumi serta Dinas Perpustakaan dan Arsip Kota Kota Sukabumi. </p>
                  <p class="justify">Pada tahun 2023 <span class="fw-bold">Sukarobot Academy</span> sudah memiliki 3 cabang, yang berlokasi di Sukabumi, Surabaya dan bogor, dan pada saat ini sudah memiliki 36 partner kerjasama sekolah dan lembaga lainnya.  Sukarobot Academy terus berupaya untuk meningkatkan kualitas pembelajaran yang dapat menghasilkan peserta didik yang siap untuk berinovasi dan berprestasi.</p>


            </div>
        </div>
        {{-- <div class="row">
          <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <div class="section-title">
              <h2>Sejarah</h2>
              <p>Sejarah Sukarobot Academy</p>
            </div>
              <p class="justify">Sukarobot Academy merupakan Lembaga pendidikan non formal fokus memberikan edukasi bidang robotik dan koding yang dapat membangkitkan daya kreativitas, imajinasi dan inovasi anak di bawah naungan PT Sukarobot Academy Indonesia.</p>
              <p class="justify">PT Sukarobot Academy Indonesia memiliki bidang usaha yaitu : lembaga pendidikan dan pelatihan, Tempat Uji Kompetensi bidang TIK, dan project centre bidang TIK,Robotika, IoT, Aplikasi berbasis web. Sukarobot Academy telah dirintis di Sukabumi sejak bulan Agustus tahun 2021 , mengawali kerjasama dengan 2 (dua) sekolah, dengan total siswa 50 orang. Pada tahun 2022 sukarobot telah bekerjasa denga 15 Sekolah dengan total siswa 275 siswa, Univesitas Nusa Putra, Pemerintah kota dan kabupaten Sukabumi serta Dinas Perpustakaan dan Arsip Kota Kota Sukabumi. </p>
              <p class="justify">Pada tahun 2023 Sukarobot Academy sudah memiliki 3 cabang, yang berlokasi di Sukabumi, Surabaya dan bogor, dan pada saat ini sudah memiliki 36 partner kerjasama sekolah dan lembaga lainnya.  Sukarobot Academy terus berupaya untuk meningkatkan kualitas pembelajaran yang dapat menghasilkan peserta didik yang siap untuk berinovasi dan berprestasi.</p>
          </div>
        </div> --}}

      </div>
    </section><!-- End About Section -->


    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          {{-- <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div> --}}
          <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <div class="section-title">
              <h2>Visi & Misi</h2>
              <p>Visi & Misi Sukarobot Academy</p>
            </div>
            <h3>Visi</h3>
            <ul>
              <li><i class="bi bi-check-circle"></i> Mewujudkan dan Melahirkan sumberdaya manusia yang berinovatif dan kreatif dalam teknologi, serta siap menghadapi tantangan di era global.</li>
            </ul>
            <h3>Misi</h3>
            <ul>
              <li><i class="bi bi-check-circle"></i> Menyiapkan lulusan yang berkualitas sesuai perkembangan ilmu pengetahuan dan teknologi.</li>
              <li><i class="bi bi-check-circle"></i> Meningkatkan riset inovasi dalam teknologi.</li>
              <li><i class="bi bi-check-circle"></i> Menerapkan model pembelajaran digitalisasi.</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->

  @include('user.partial.footer')
