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
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="course-item">
                  <img src="https://rg-learning-material.s3.ap-southeast-1.amazonaws.com/file-uploader/image/db6e27c1-1bb6-4a65-b47a-8d706b71ed58.png" class="img-fluid" alt="...">
                  <div class="course-content">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4>benar</h4>
                      <p class="price">10000</p>
                    </div>
  
                    <h3><a href="">Aji</a></h3>
                    <p>ajiramdani</p>
                    <div class="trainer d-flex justify-content-between align-items-center">
                      <div class="trainer-profile d-flex align-items-center">
                        <img src="https://rg-learning-material.s3.ap-southeast-1.amazonaws.com/file-uploader/image/db6e27c1-1bb6-4a65-b47a-8d706b71ed58.png" style="height: 50px; width: auto" class="img-fluid" alt="">
                        <span>Uji Coba</span>
                      </div>
                      <div class="trainer-rank d-flex align-items-center">
                        <a id="whatsapp" class="ri ri-whatsapp-line small" target="_blank"></a> &nbsp;
                        <a class="bx bx-share-alt"></a>
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
                   
                    </div>
                  </div>
                </div>
              </div>
          </div>

        </div>
      </section><!-- End Popular Courses Section -->

  </main><!-- End #main -->
  @include('user.partial.footer')
