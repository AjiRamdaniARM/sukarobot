@include('admin.partial.header')
@php
    use Carbon\Carbon;
@endphp
@include('admin.partial.navbar')
@include('admin.partial.sidebar')


<main id="main" class="main">




    {{-- kondisi saat bukti sudah diupload --}}
    @if (session()->has('download'))

    <div class="modal fade show" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false" style="display: block;">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content shadow">

                <div class="modal-body bg-primary">
                    <div class="row">
                        <div class="col-md-6">
                            <center>
                                <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
                                <dotlottie-player src="https://lottie.host/be1dd285-90cb-44ac-b5fa-33dcd6990900/3kLHCi8eHw.json" background="transparent" speed="1" style="width: 300px;" loop autoplay></dotlottie-player>
                            </center>
                        </div>
                        <div class="col-md-6">
                            <div class="text-white mt-4">
                                @if (session()->has('success'))
                                <span class="intro-1 fw-bold">{{ session()->get('success') }}</span>
                                @endif
                                <div class="mt-2">
                                    <span class="intro-2">Silahkan untuk mengambil sertificate anda dengan klik tombol dibawah ini!! jika ada kendala dalam mendapatkan Sertificate bisa mendapatkan nya dengan <a class="fw-bold text-dark" href="{{url('/dashboard/cekPdf')}}">manual</a> </span>
                                </div>
                                <div class="mt-4 mb-5 d-flex justify-content-start align-item-center gap-1">
                                    @if (session()->has('pelatihan2'))
                                    <form action="{{ url('/dashboard/user/pelatihan/pdf/' . session()->get('pelatihan2') ) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn fw-bold  btn-light">Dapatkan Sertifikate</button>
                                        <button type="button"  onclick="document.getElementById('staticBackdrop').style.display = 'none';" class="btn btn-light fw-bold"
                                    aria-label="Close">Sembunyikan</button>
                                    </form>
                                     @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endif

    <div class="position-relative -z-0 pagetitle">
        <h1>Pelatihan saya </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Pelatihan saya</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class=" position-relative -z-0 section">
        <div class="row">
            {{-- @if (session()->has('success'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                    role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif --}}
            @if (session()->has('error'))
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                    role="alert">
                    {{ session()->get('error') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
            @if ($pelatihan->isEmpty())
                <p>Anda belum memiliki pelatihan.</p>
            @else
                @foreach ($pelatihan as $item)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <p></p>
                                <!-- Slides only carousel -->
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="Pelatihan/{{ $item->foto }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    </div>
                                    <h5 class="card-title">{{ $item->judul }}</h5>
                                    <div class="d-flex justify-content-between">
                                        <a id="copyText" href="{{ $item->link }}" class="text-success pt-1"
                                            target="_blank">{{ Str::limit($item->link, 25) }} </a>
                                        <a type="button" class="bi bi-files small" onclick="copyToClipboard()"></a>
                                        <script>
                                            function copyToClipboard() {
                                                /* Mendapatkan teks yang akan disalin */
                                                var copyText = document.getElementById("copyText");

                                                /* Membuat elemen textarea untuk menyimpan teks yang akan disalin */
                                                var textarea = document.createElement("textarea");
                                                textarea.value = copyText.textContent;
                                                document.body.appendChild(textarea);

                                                /* Memilih dan menyalin teks */
                                                textarea.select();
                                                document.execCommand("copy");

                                                /* Menghapus elemen textarea */
                                                document.body.removeChild(textarea);

                                                /* Memberikan umpan balik atau pemberitahuan */
                                                alert("Teks berhasil disalin: " + copyText.textContent);
                                            }
                                        </script>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a class="small pt-1">{{ \Carbon\Carbon::parse($item->time)->format('H:i') }} /
                                            {{ \Carbon\Carbon::parse($item->date)->isoFormat('DD-MM-YYYY') }}</a>

                                            <a href="{{ url('/dashboard/user/pelatihan', $item->judul) }}"
                                                class="small pt-1 btn btn-success p-2 text-center text-white font-bold rounded transition-all" type="button">Upload Kehadiran</a>

                                    </div>
                                </div><!-- End Slides only carousel-->
                            </div>
                        </div>

                    </div>
                @endforeach
            @endif
        </div>
    </section>

</main><!-- End #main -->

@include('admin.partial.footer')



  {{-- <div id="alert-banner" class="relative mb-3 isolate flex items-center gap-x-6 overflow-hidden bg-gray-50 px-6 py-2.5 sm:px-3.5 sm:before:flex-1">
            <div class="absolute left-[max(-7rem,calc(50%-52rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
            <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
            </div>
            <div class="absolute left-[max(45rem,calc(50%+8rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
            <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
            </div>
            <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
                @if (session()->has('success'))
                    <p class="text-sm leading-6 text-gray-900">
                        <strong class="font-semibold">Sukarobot Academy</strong><svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg><span class="font-bold">{{ session()->get('success') }}</span> .
                    </p>
                @endif
                @if (session()->has('pelatihan2'))
                <form action="{{ url('/dashboard/user/pelatihan/pdf/' . session()->get('pelatihan2') ) }}" method="GET">
                    @csrf
                    <button type="submit"  class="flex-none rounded-full bg-gray-900 px-3.5 py-1 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">Dapatkan Certificate  <span aria-hidden="true">&rarr;</span></button>
                </form>

            @endif

            </div>
            <div class="flex flex-1 justify-end">
            <button onclick="document.getElementById('alert-banner').style.display='none'" type="button" class="-m-3 p-3 focus-visible:outline-offset-[-4px]">
                <span class="sr-only">Dismiss</span>
                <svg class="h-5 w-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                </svg>
            </button>
            </div>
        </div> --}}
