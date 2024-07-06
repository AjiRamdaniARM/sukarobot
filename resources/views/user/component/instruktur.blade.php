@include('user.partial.header')
@include('user.partial.navbar')


<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Instruktur</h2>
        <p>Dengan pengetahuan dan keahlian yang mendalam di bidangnya, instruktur Kami bertanggung jawab untuk memberikan bimbingan, pengajaran, dan pemahaman kepada Anda.</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
        <div class="container" data-aos="fade-up">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
              @foreach ($data as $item)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="Instruktur/{{$item->foto}}" class="img-fluid" alt="">
                <div class="member-content d-flex justify-content-around">
                    <div class="head">
                        <h4>{{$item->nama}}</h4>
                        <span>{{$item->kategori->kategori}}</span>
                        <p>
                            {{$item->deksripsi}}
                        </p>
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

  </main><!-- End #main -->
  @include('user.partial.footer')
