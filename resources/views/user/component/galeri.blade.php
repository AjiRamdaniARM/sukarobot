@include('user.partial.header')
@php
    use Carbon\Carbon;
@endphp
@include('user.partial.navbar')


<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Galeri</h2>
        <p>Galeri Kegiatan Kami memperlihatkan sorotan dari berbagai acara dan kegiatan yang kami selenggarakan. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="row">
            @foreach ($data as $item)
                
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="Galeri/{{$item->foto}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="{{url('/home/galeri-detail',$item->id)}}">{{$item->judul}}</a></h5>
                <p class="fst-italic text-center">{{ Carbon::parse($item->created_at)->setTimezone('Asia/Jakarta')->format('l, d M Y H:i T') }}</p>
                <p class="card-text">{{Str::limit($item->deskripsi,200)}}</p>
              </div>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Events Section -->

  </main><!-- End #main -->
  @include('user.partial.footer')