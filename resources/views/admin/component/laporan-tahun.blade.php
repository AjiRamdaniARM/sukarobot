@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Laporan Tahunan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Laporan Tahunan</li>
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
              <h5 class="card-title">Laporan Tahunan</h5>
                <p>Pilih tahun yang ingin dijadikan laporan</p>
              <!-- Horizontal Form -->
              <form action="{{url('/laporan/tahun-get')}}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="month" class="form-control" name="year" id="floatingName" placeholder="Kategori">
                      <label for="floatingName">Tahun</label>
                    </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" id="modal1" class="btn btn-success">Export Xlsx</button>
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