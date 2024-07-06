@include('admin.partial.header')
<style>
    .rounded-profile {
        width: 100px; /* Ganti sesuai dengan lebar yang diinginkan */
        height: 100px; /* Ganti sesuai dengan tinggi yang diinginkan */
        object-fit: cover;
        border-radius: 50%;
    }
</style>
@include('admin.partial.navbar')
@include('admin.partial.sidebar')


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @php
                            $fotoProfil = Auth::user()->foto ? asset('profile/' . Auth::user()->foto) : asset('assets/img/default-profile.jpg');
                        @endphp
                        <img src="{{ $fotoProfil }}" alt="Profile" class="rounded-profile">
                        <h2>{{ $user->name }}</h2>
                        <h3>{{ $user->email }}</h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Ringkasan</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profil</button>
                            </li>


                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Detail Profil</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Pekerjaan</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if (!empty($user->pekerjaan))
                                            {{ $user->pekerjaan }}
                                        @else
                                            Tidak ada
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Negara</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if (!empty($user->country))
                                            {{ $user->country }}
                                        @else
                                            Tidak ada
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if (!empty($user->address))
                                            {{ $user->address }}
                                        @else
                                            Tidak ada
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telepon</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if (!empty($user->phone))
                                            {{ $user->phone }}
                                        @else
                                            Tidak ada
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ url('/dashboard/profile/update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImage"
                                            class="col-md-4 col-lg-3 col-form-label">Foto</label>
                                        <div class="col-md-8 col-lg-9">
                                            @php
                                                $fotoProfil = Auth::user()->foto ? asset('profile/' . Auth::user()->foto) : asset('assets/img/default-profile.jpg');
                                            @endphp
                                            <img id="preview-image" src="{{ $fotoProfil }}" alt="Profile">
                                            <div class="pt-2">
                                                <label for="profile-image" class="btn btn-primary btn-sm"
                                                    style="color: white" title="Upload new profile image">
                                                    <input type="file" id="profile-image" name="foto"
                                                        accept=".jpg, .jpeg" style="display: none;"
                                                        onchange="previewFile()" required>
                                                    <span class="bi bi-upload"></span> Upload
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function previewFile() {
                                            var input = document.getElementById('profile-image');
                                            var preview = document.getElementById('preview-image');

                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                reader.onload = function(e) {
                                                    preview.src = e.target.result;
                                                };

                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                    </script>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama
                                            Lengkap</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name"
                                                value="{{ $user->name }}" required>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="Job"
                                            class="col-md-4 col-lg-3 col-form-label">Pekerjaan</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="pekerjaan" type="text" class="form-control"
                                                id="pekerjaan" value="{{ $user->pekerjaan }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Negara</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="country" type="text" class="form-control" id="Country"
                                                value="{{ $user->country }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address"
                                                value="{{ $user->address }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Telepon</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone"
                                                value="{{ $user->phone }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email"
                                                value="{{ $user->email }}" required>
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>



                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@include('admin.partial.footer')
