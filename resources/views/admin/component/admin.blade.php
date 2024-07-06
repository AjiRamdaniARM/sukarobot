@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')


  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Data Admin</li>
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
                  <h5 class="card-title">Tambah Admin</h5>

                  <!-- Horizontal Form -->
                  <form action="{{url('/dashboard/post')}}" method="POST" class="row g-3" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating">
                          <input type="text" class="form-control" name="nama" id="floatingName" placeholder="Nama Pengguna" required>
                          <label for="floatingName">Nama Pengguna</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                          <input type="email" class="form-control" name="email" id="floatingName" placeholder="Email Pengguna" required>
                          <label for="floatingName">Email Pengguna</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                          <input type="text" class="form-control" name="password" id="floatingName" placeholder="Password" required>
                          <label for="floatingName">Password </label>
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
              <h5 class="card-title">Data Admin</h5>
              <!-- Table with stripped rows -->
              <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $item)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->role}}</td>
                    <td>
                        @if ($item->id == 1)
                            <button disabled  style="button" class="btn btn-danger">Hapus</button>
                        @else
                            <a href="{{url('/dashboard/delete', $item->id)}}" style="button" onclick="return confirm('Anda yakin ingin menghapus?')" class="btn btn-danger">Hapus</a>
                        @endif
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
