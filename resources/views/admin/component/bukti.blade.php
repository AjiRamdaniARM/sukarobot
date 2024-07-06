@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Upload Bukti</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Upload Bukti</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Upload Bukti</h5>


              <!-- Horizontal Form -->
              <form action="{{url('/dashboard/user/pelatihan/post', $pelatihan->judul)}}" method="POST" class="row g-3" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <select class="form-select" name="q1" id="floatingSelect" aria-label="State" required>
                      <option value="Mengikuti">Mengikuti</option>
                      <option value="Tidak Mengikuti">Tidak Mengikuti</option>
                    </select>
                    <label for="floatingSelect">Apakah anda mengikuti pelatihan hingga selesai?</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <select class="form-select" name="q2" id="floatingSelect" aria-label="State" required>
                      <option value="Sangat Baik">Sangat Baik</option>
                      <option value="Baik">Baik</option>
                      <option value="Cukup">Cukup</option>
                      <option value="Kurang">Kurang</option>
                      <option value="Sangat Kurang">Sangat Kurang</option>
                    </select>
                    <label for="floatingSelect">Tanggapan anda tentang topik pelatihan?</label>
                  </div>
                </div>

                <div class="col-mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Kegiatan</label>
                  <input type="file" class="form-control" name="foto" id="gambarInput" accept="image/*" required>
                  <br>
                  <div class="col-md-8 col-lg-9">
                    <img id="gambarPreview" src="#" alt="Preview Gambar" style="display: none; max-width: 100%; max-height: 100px;">
                  </div>
                </div>

                <div class="text-center">
                    @if($join)
                    <button type="submit" id="modal1" class="btn btn-primary">Submit</button>
                    @else
                        <div class="alert alert-warning">
                            Mohon Maaf Sertificate Pelatihan ini Belum tersedia!!
                        </div>
                    @endif

                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->
              <!-- Modal -->

            </div>
          </div>

        </div>

      </div>

    </section>

  </main><!-- End #main -->

@include('admin.partial.footer')
