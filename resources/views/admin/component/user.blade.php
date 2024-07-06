@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Data User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data User</h5>

              <!-- Table with stripped rows -->
              <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telepon</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->pekerjaan}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone}}</td>
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