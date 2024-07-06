@include('user.partial.header')
@include('user.partial.navbar')

<main id="main" data-aos="fade-in">



    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Pelatihan</h2>
        <p>Pelatihan Kami akan mempersiapkan Anda untuk menghadapi tuntutan dunia yang dinamis. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">

          <div class="row" data-aos="zoom-in" data-aos-delay="100">
              @foreach ($data as $item)

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="course-item">
                <img src="Pelatihan/{{$item->foto}}" class="img-fluid" alt="...">
                <div class="course-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>{{$item->kategoriId->kategori}}</h4>
                    <p class="price">{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</p>
                  </div>

                  <h3><a href="{{url('/home/pelatihan-detail',$item->judul)}}">{{$item->judul}}</a></h3>
                  <p>{{Str::limit ($item->deskripsi, 100)}}</p>
                  <div class="trainer d-flex justify-content-between align-items-center">
                    <div class="trainer-profile d-flex align-items-center">
                      <img src="Instruktur/{{$item->instrukturId->foto}}" style="height: 50px; width: auto" class="img-fluid" alt="">
                      <span>{{$item->instrukturId->nama}}</span>
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
                      <a class="bx bx-share-alt"
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
            </div> <!-- End Course Item-->
            @endforeach

          </div>

        </div>
      </section><!-- End Popular Courses Section -->

  </main><!-- End #main -->
  @include('user.partial.footer')
