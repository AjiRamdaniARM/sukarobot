@include('user.partial.header')
@include('user.partial.navbar')


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Hubungi Kami</h2>
        <p>Hubungi kami untuk memperoleh informasi lebih lanjut atau untuk membahas kebutuhan Anda. Tim kami siap memberikan bantuan dan solusi terbaik untuk meningkatkan pengalaman Anda. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.731010108191!2d106.93068827441992!3d-6.92272456775739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68378a889fa131%3A0x255807915403ab50!2sSUKAROBOT%20ACADEMY!5e0!3m2!1sid!2sid!4v1703950055131!5m2!1sid!2sid" loading="lazy" frameborder="0" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Lokasi:</h4>
                <p>Jl. A. Yani No.283, Kebonjati, Kec. Cikole, Kota Sukabumi, Jawa Barat 43111</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>sukarobotacademy@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telp:</h4>
                <p>+62 857 9589 9901</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            @if(session()->has('success'))
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                {{session()->get('success')}}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{url('/contact/send')}}" method="post" role="form" >
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="pesan" rows="5" placeholder="Message" required></textarea>
              </div>
              <br>
              <div class="text-center"><button class="btn btn-primary" type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  @include('user.partial.footer')