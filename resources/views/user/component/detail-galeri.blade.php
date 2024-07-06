@include('user.partial.header')
@php
    use Carbon\Carbon;
@endphp
<!-- ======= Header ======= -->
@include('user.partial.navbar')


<main id="main" data-aos="fade-in">
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Detail Galeri</h2>
      <p>Galeri Kegiatan Kami memperlihatkan sorotan dari berbagai acara dan kegiatan yang kami selenggarakan.</p>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Cource Details Section ======= -->
  <section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">
    
        
      <div class="row">
          <img src="Galeri/{{$galeri->foto}}" class="img-fluid" alt="">
        <p class="fst-italic text-end"><i class="ri-calendar-todo-line"></i> {{ Carbon::parse($galeri->created_at)->setTimezone('Asia/Jakarta')->format('l, d M Y') }}</p>
        <h1 class="card-title"><b>{{$galeri->judul}}</b></h1>
        <h3></h3>
        <p>{{$galeri->deskripsi}}</p>
        

      </div>

    </div>
  </section><!-- End Cource Details Section -->

    

</main><!-- End #main -->
@include('user.partial.footer')
