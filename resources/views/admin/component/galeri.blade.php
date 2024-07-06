@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Galeri</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Galeri</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
            @if(session()->has('success'))
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                {{session()->get('success')}}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(session()->has('edit'))
            <div class="alert alert-warning bg-warning text-light border-0 alert-dismissible fade show" role="alert">
                {{session()->get('edit')}}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(session()->has('delete'))
            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                {{session()->get('delete')}}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Galeri</h5>

              <!-- Horizontal Form -->
              <form action="{{url('/galeri/post')}}" method="POST" class="row g-3" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="judul" id="floatingName" placeholder="Judul Galeri" required>
                      <label for="floatingName">Judul Galeri</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="deskripsi" id="floatingName1" placeholder="Deksripsi Singkat" required>
                      <label for="floatingName1">Deksripsi Singkat</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="date" class="form-control" name="waktu" id="floatingName1" placeholder="Waktu" required>
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
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Galeri</h5>

              <!-- Table with stripped rows -->
              <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($galeri as $item)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->judul}}</td>
                    <td><img src="Galeri/{{$item->foto}}" alt="Profile" style="max-width: 100%; max-height: 50px;"></td>
                    <td>{{$item->waktu}}</td>
                    <td>{{Str::limit($item->deskripsi, 25)}}</td>
                    <td>
                      <a href="{{url('/galeri/edit', $item->id)}}" style="button" class="btn btn-warning">Edit</a>
                      <a href="{{url('/galeri/delete', $item->id)}}" style="button" onclick="return confirm('Anda yakin ingin menghapus?')" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  
@include('admin.partial.footer')