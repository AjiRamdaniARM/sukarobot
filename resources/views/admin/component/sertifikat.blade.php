@include('admin.partial.header')

@include('admin.partial.navbar')
@include('admin.partial.sidebar')



<main id="main" class="main">

    <div class="pagetitle">
        <h1>Sertifikat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Sertifikat</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if (session()->has('success'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                        role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('edit'))
                    <div class="alert alert-warning bg-warning text-light border-0 alert-dismissible fade show"
                        role="alert">
                        {{ session()->get('edit') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('delete'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                        role="alert">
                        {{ session()->get('delete') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('deleteM'))
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                    role="alert">
                    {{ session()->get('deleteM') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif



                <div class="card">
                    <div class="card-body">
                        <div class="container d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Upload Sertifikat Mentahan</h5>
                            <button onclick="window.location.href='/dashboard/cekPdf'" class="btn btn-danger">Uji Coba Certificate</button>
                        </div>

                        <!-- Horizontal Form -->
                        <form action="{{ url('/sertifikat/post') }}" method="POST" class="row g-3"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-mb-6">
                                <div class="form-floating">
                                    <input type="file" class="form-control" name="mentahan" id="gambarInput"
                                        accept=".pdf" required>
                                    <br>
                                </div>
                            </div>
                            <div class="col-mb-6">
                                <div class="form-floating mb-7">
                                    <select class="form-select" name="id_pelatihan" id="floatingSelect"
                                        aria-label="State" required>
                                        @foreach ($pelatihan as $item)
                                        <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Pelatihan</label>
                                </div>
                            </div>


                            <div class="text-center">
                                <button type="submit" id="modal1" class="btn btn-primary">Unggah</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Horizontal Form -->
                        <!-- Modal -->

                    </div>
                </div>


                <div  class="card transition" style="display: none">
                    <div class="card-body">
                        <div class="container flex justify-between items-center">
                            <h5 class="card-title">Edit Mentahan Sertifikat</h5>
                            <button onclick="document.getElementById('data').style.display='none'" class="btn btn-warning">Sembunyikan</button>
                        </div>

                        <!-- Horizontal Form -->
                        <form action="{{ url('/sertifikat/post') }}" method="POST" class="row g-3"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-mb-6">
                                <div class="form-floating">
                                    <input type="file" class="form-control" name="mentahan" id="gambarInput"
                                        accept=".pdf" required>
                                    <br>
                                </div>
                            </div>
                            <div class="col-mb-6">
                                <div class="form-floating mb-7">
                                    <select class="form-select" name="id_pelatihan" id="floatingSelect"
                                        aria-label="State" required>
                                        @foreach ($pelatihan as $item)
                                        <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Pelatihan</label>
                                </div>
                            </div>


                            <div class="text-center">
                                <button type="submit" id="modal1" class="btn btn-primary">Unggah</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Horizontal Form -->
                        <!-- Modal -->

                    </div>
                </div>

            </div>

        </div>

        <div id="modal" class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Sertifikat</h5>
                        {{-- <a href="{{url('/sertifikat/print-all')}}" type="button" target="__blank" class="btn btn-success">Print All</a> --}}
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Mentahan</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($join as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->mentahan }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>
                                            <a href="{{url('/sertifikat/edit/mentahan', $item->id)}}"  style="button"
                                                class="btn btn-warning">Edit</a>

                                            <a href="{{ url('/sertifikat/delete/mentahan', $item->id) }}" style="button"
                                                onclick="return confirm('Yakin ingin menghapus?')"
                                                class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Sertifikat</h5>
                        {{-- <a href="{{url('/sertifikat/print-all')}}" type="button" target="__blank" class="btn btn-success">Print All</a> --}}
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Pelatihan</th>
                                    <th scope="col">Sertifikat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sertifikat as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->userId->name }}</td>
                                        <td>{{ $item->pelatihanId->judul }}</td>
                                        <td class="rounded-lg overflow-hidden">
                                            <iframe src="{{ $item->file }}" frameborder="0" class="w-62 "></iframe>
                                        </td>
                                        {{-- <td> {{ $item->file }}</td> --}}
                                        <td>
                                            <a href="{{ url('/sertifikat/delete', $item->id) }}" style="button"
                                                onclick="return confirm('Yakin ingin menghapus?')"
                                                class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@include('admin.partial.footer')
