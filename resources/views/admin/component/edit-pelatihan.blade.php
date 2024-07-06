@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Pelatihan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Pelatihan</a></li>
                <li class="breadcrumb-item active">Edit Pelatihan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Pelatihan</h5>

                        <!-- Horizontal Form -->
                        <form action="{{ url('/pelatihan/edit-post', $data->id) }}" method="POST" class="row g-3"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="judul" id="floatingName"
                                        value="{{ $data->judul }}" placeholder="Judul Pelatihan" required>
                                    <label for="floatingName">Judul Pelatihan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="harga" id="Harga"
                                        value="{{ $data->harga }}" placeholder="Harga Pelatihan" required>
                                    <label for="Harga">Harga Pelatihan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="id_kategori" id="floatingSelect"
                                        aria-label="State" required>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Kompetensi</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="id_instruktur" id="floatingSelect1"
                                        aria-label="State" required>
                                        @foreach ($instruktur as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect1">Instruktur</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="date" id="date"
                                        placeholder="Tanggal Pelatihan" required>
                                    <label for="date">Tanggal Pelatihan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="time" class="form-control" name="time" id="time"
                                        placeholder="Waktu Pelatihan" required>
                                    <label for="time">Waktu Pelatihan</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="link" id="link"
                                        placeholder="Link Pelatihan" required>
                                    <label for="link">Link Pelatihan</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="deskripsi"
                                        value="{{ $data->deskripsi }}" id="floatingName1"
                                        placeholder="Deksripsi Singkat" required>
                                    <label for="floatingName1">Deksripsi Singkat</label>
                                </div>
                            </div>
                            <div class="col-mb-3">
                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto</label>
                                <input type="file" class="form-control" name="foto" id="gambarInput"
                                    accept="image/*" required>
                                <br>
                                <div class="col-md-8 col-lg-9">
                                    <img id="gambarPreview" src="#" alt="Preview Gambar"
                                        style="display: none; max-width: 100%; max-height: 100px;">
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
