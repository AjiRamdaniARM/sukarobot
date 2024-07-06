@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Galeri</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Galeri</a></li>
          <li class="breadcrumb-item active">Edit Galeri</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
           
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Galeri</h5>

              <!-- Horizontal Form -->
              <form action="{{url('/galeri/edit-post', $data->id)}}" method="POST" class="row g-3" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="judul" id="floatingName" value="{{$data->judul}}" placeholder="Judul Galeri" required>
                      <label for="floatingName">Judul Galeri</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="deskripsi" id="floatingName1" value="{{$data->deskripsi}}" placeholder="Deksripsi Singkat" required>
                      <label for="floatingName1">Deksripsi Singkat</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="date" class="form-control" name="waktu" id="floatingName1" value="{{$data->waktu}}" placeholder="Waktu" required>
                      <label for="floatingName1">Tanggal</label>
                    </div>
                </div>
                <div class="col-mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto</label>
                  <input type="file" class="form-control" name="foto" id="gambarInput" accept="image/*" required>
                  <br>
                  <div class="col-md-8 col-lg-9">
                    <img id="gambarPreview" src="#" alt="Preview Gambar" style="display: none; max-width: 100%; max-height: 100px;">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" id="modal1" class="btn btn-primary">Submit</button>
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