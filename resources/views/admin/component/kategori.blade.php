@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Kompetensi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Kompetensi</li>
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
            @if(session()->has('delete'))
            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                {{session()->get('delete')}}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Kompetensi</h5>

              <!-- Horizontal Form -->
              <form action="{{url('/kategori/post')}}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="kategori" id="floatingName" placeholder="Kategori">
                      <label for="floatingName">Kompetensi</label>
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
              <h5 class="card-title">Data Kompetensi</h5>

              <!-- Table with stripped rows -->
              <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kompetensi</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $item)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->kategori}}</td>
                    <td><a href="{{url('/kategori/delete', $item->id)}}" style="button" onclick="return confirm('Anda yakin ingin menghapus?')" class="btn btn-danger">Hapus</a></td>
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