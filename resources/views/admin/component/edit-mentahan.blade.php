@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Mentahan Sertifikate</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/dashboard/sertifikat')}}">Sertifikate</a></li>
          <li class="breadcrumb-item active">Edit Mentahan Sertifikate</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Mentahan Sertfikate <span class="text-white px-3 rounded-sm bg-blue-800">{{$join->judul}}</span></h5>

              <!-- Horizontal Form -->
              <form  method="POST" action="{{url('/sertifikat/edit/mentahan/'.$join->id)}}" class="row g-3" enctype="multipart/form-data">
                @csrf
                <div class="col-mb-6">
                    <div class="form-floating">
                        <input type="file" class="form-control" name="mentahan" id="gambarInput"
                            accept=".pdf" required>
                        <br>
                    </div>
                </div>
                <div class="text-center">
                  <button type="submit" id="modal1" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>

              <br>

              <iframe src="assets/certificate/mentahan/{{ $join->mentahan }}" frameborder="0" class="w-full h-96 rounded-lg "></iframe>

              <!-- End Horizontal Form -->
              <!-- Modal -->
            </div>
          </div>
        </div>
      </div>

    </section>

  </main><!-- End #main -->

@include('admin.partial.footer')
