@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
  <main id="main" class="main">
    <section class="section">
        <div class="pagetitle">
            <h1>Cek Sertifikate</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Cek Sertifikate</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->


        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Cek Sertifikate</h5>


                <!-- Horizontal Form -->
                <form  method="POST" action="{{url('/cekPdf')}}" class="row g-3" enctype="multipart/form-data">
                  @csrf
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="nama" id="floatingName" value="{{$nama->name}}" required>
                      <label for="floatingName">Nama Sertifikate</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <select class="form-select" name="deks" id="emailSelect" aria-label="State" required>
                            @foreach ($pelatihan as $data)
                            <option value="{{ $data->judul }}">{{ $data->judul }}</option>
                            @endforeach
                        </select>
                      <label for="floatingName">Dekripsi Sertifikate</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <select class="form-select" name="file" id="emailSelect" aria-label="State" required>
                            @foreach ($join as $items)
                            <option value="{{ $items->id_pelatihan }}">{{ $items->judul }}</option>
                            @endforeach
                        </select>
                      <label for="floatingName">Pilih File Sertifikate</label>
                    </div>
                    <br>
                    <button type="submit" class="text-center w-full btn btn-success p-2 font-bold text-white rounded-sm">Cek Sertifikate</button>
                </div>
                </form>
              </div>
            </div>

          </div>

        </div>

      </section>
  </main>
