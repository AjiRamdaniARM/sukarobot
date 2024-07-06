<x-home.app>
    @push('extra-css')
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <style>
            .bg-color{
                background-size: initial;
                background-position: right 0px bottom 0px;
                background-image: linear-gradient(180deg, #001b56 28%, #0e4de3 100%) !important;
            }
            .-mr-100{
                margin-right: -30%;
            }

            .product-wrap {
                position: relative;
                height: 30vh;
                overflow: hidden;
            }

            .product-wrap img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            #competition{
                background-image: linear-gradient(190deg,rgba(0,0,0,0.1) 0%,rgba(0,0,0,0) 21%),url(https://zaib.sandbox.etdevs.com/divi/wp-content/uploads/sites/2/2020/06/robotics-04.jpg)!important;
                background-size: 100%;
                background-size: cover;
            }

            .contact-me{
                right:25px;
                bottom:25px;
                max-width: 250px;
                position: fixed;
            }
        </style>
    @endpush

    <div class="container-fluid bg-color col-11 ml-0 mb-5 pt-5 pt-sm-0" id="home">
        <div class="row align-items-center vh-100">
            <div class="col-12 col-md-6 text-white">
                <div class="container my-5 pl-0 pl-sm-3">
                    <h1>Sukabumi Robotic Competition</h1>
                    <p>
                        SRC ( Sukabumi Robotic Competition ) merupakan salah satu salah satu ajang kompetisi robotik tingkat nasionalyang di selenggarakan di sukabumi bekerjasama dengan Universitas nusa putra danhimpunan mahasiswa elektro universitas nusa putra guna menumbuhkan kecintaan anak-anak Indonesia terhadap teknologi.
                    </p>
                    <a href="#competition" class="btn btn-outline-warning btn-lg page-scroll">View all competitions</a>
                </div>
            </div>
            <div class="col-12 col-md-6 pt-5" data-aos="fade-up" data-aos-duration="500">
                <img src="{{ asset('assets/robotics-01.png') }}" alt="robot 1" class="-mr-100 img-fluid">
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-5 pt-5 flex-column flex-sm-row">
        <div class="container ml-sm-4">
            <h3 class="text-dark"><strong>Ketentuan Umum</strong></h3>
            <p>Persyaratan peserta lomba Robotic SRC Competition 2023</p>
            <div class="d-flex">
                <i class="fas fa-fb fa-check mr-3 pt-1"></i>
                <p>Peserta Lomba adalah Perorangan, atau Tim dari sekolah yang berada di Seluruh Indonesia</p>
            </div>
            <div class="d-flex">
                <i class="fas fa-fb fa-check mr-3 pt-1"></i>
                <p>Peserta yang mengkuti lomba robotik mulai dari TK, SD, SMP, SMK sederajat, mahasiswa dan Umum</p>
            </div>
            <div class="d-flex">
                <i class="fas fa-fb fa-check mr-3 pt-1"></i>
                <p>Membayar uang pendaftaran</p>
            </div>
            <div class="d-flex">
                <i class="fas fa-fb fa-check mr-3 pt-1"></i>
                <p>Diperbolehkan mendaftar lebih dari satu kategori</p>
            </div>
            <div class="d-flex">
                <i class="fas fa-fb fa-check mr-3 pt-1"></i>
                <p>peserta diwajibkan membaca, mengetahui dan memahami peraturan-peraturan yang ditentukan panitia</p>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <img src="{{ asset('assets/robotics-08-removebg-preview.png') }}" alt="robot 8" class="img-fluid">
        </div>
    </div>

    @if(count($races) > 0)
        <div class="container-fluid" id="competition">
            <h1 class="text-center text-dark py-5"><strong>PERLOMBAAN</strong></h1>
            @foreach ($races->chunk(5) as $items)
                <div class="row justify-content-center">
                    @foreach ($items as $race)
                        <div class="card mx-3 col-12 col-sm-2 shadow mb-3 p-0">
                            <div class="product-wrap">
                                <img src="{{ asset($race->image) }}" alt="{{ $race->slug }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $race->name }}</strong></h5>
                                <p class="card-text">{!! \Illuminate\Support\Str::limit(html_entity_decode($race->description), $limit = 35, $end = '...') !!}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('participant.race.index') }}" class="btn btn-outline-primary btn-sm">Register</a>
                                <a href="{{ url('/'.$race->slug) }}" class="btn btn-outline-warning btn-sm">Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endif

    @if(count($directives) > 0)
        <div class="container-fluid my-5 bg-light py-5" id="directive" data-aos="fade-up">
            <div class="text-center px-0 px-sm-5 mx-0 mx-sm-0 text-dark">
                <h1><strong>PETUNJUK TEKNIS</strong></h1>
                <p>File Petunjuk Teknis yang terlampir adalah untuk semua kategori. Silakan download Petunjuk Teknis dibawah untuk pertanyaan dapat menghubungi Panitia</p>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 px-0 px-sm-5 mx-0 mx-sm-5">
                <div class="col" data-aos-duration="1500" data-aos="fade-right">
                    <img src="{{ asset('assets/robotics-02.png') }}" alt="robot 2" class="img-fluid">
                </div>
                <div class="col" data-aos-duration="1500" data-aos="fade-left">
                    @foreach ($directives as $dir)
                        <a href="{{ url($dir->link) }}" class="btn btn-primary btn-lg btn-block" target="_blank">{{ $dir->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if(count($faqs) > 0)
        <div class="container my-5" id="faq" data-aos="fade-up">
            <div class="text-center py-5 text-dark">
                <h1><strong>FAQ</strong></h1>
                <p>Pertanyaan & Jawaban terkait Perlombaan. Temukan berbagai informasi yang tersedia di bawah ini.</p>
            </div>
            <div class="row row-cols-1 row-cols-sm-2">
                <div class="col my-3 my-sm-0" data-aos-duration="1500" data-aos="fade-right">
                    <img src="{{ asset('assets/robotics-17.png') }}" alt="robot 3" class="img-fluid">
                </div>
                <div class="col my-3 my-sm-0" data-aos-duration="1500" data-aos="fade-left">
                    @foreach ($faqs as $key => $faq)
                        <div class="accordion mb-3" id="accordion{{ $key }}">
                            <div class="card">
                                <div class="card-header" id="heading{{ $key }}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left px-0" type="button" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                            <strong>{{ $faq->question }}</strong>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapse{{ $key }}" class="collapse" aria-labelledby="heading{{ $key }}" data-parent="#accordion{{ $key }}">
                                    <div class="card-body">
                                        {!! $faq->answare !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if(!is_null($loc) || count($organizeds) > 0)
        <div class="container-fluid my-5 bg-light py-5" id="about" data-aos="fade-up">
            <div class="text-center px-0 px-sm-5 mx-0 mx-sm-0 text-dark">
                <h6 class="mb-3 text-primary"><strong>TENTANG</strong></h6>
            </div>
            {{-- location --}}
            @if(!is_null($loc))
                <h1 class="text-center text-dark"><strong>Lokasi Event</strong></h1>
                <p class="text-center text-dark">{{ $loc->name }} <br> {{ $loc->address }}</p>
                
                <div class="container w-100 h-75">
                <iframe src="{{ $loc->link_address }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
                </div>
            @endif
            {{-- end locaton --}}

            {{-- organized --}}
            @if(isset($organizeds['organize']))
                <h3 class="text-center text-dark mt-5 mb-3"><strong>Diselenggarakan Oleh :</strong></h3>
                <div class="row justify-content-center">
                @foreach ($organizeds['organize'] as $item)
                    <div class="col-6 col-sm-3">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="img-fluid w-50 mx-auto d-block">
                    </div>
                @endforeach
                </div>
            @endif
            {{-- end organized --}}

            {{-- sponsor --}}
            @if(isset($organizeds['sponsor']))
                <h3 class="text-center text-dark mt-5 mb-3"><strong>Sponsor :</strong></h3>
                <div class="row justify-content-center">
                @foreach ($organizeds['sponsor'] as $item)
                    <div class="col-6 col-sm-3">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="img-fluid w-50 w-sm-75 mx-auto d-block">
                    </div>
                @endforeach
                </div>
            @endif
            {{-- end sponsor --}}

            {{-- media partner --}}
            @if(isset($organizeds['media_partner']))
                <h3 class="text-center text-dark mt-5 mb-3"><strong>Media Partner :</strong></h3>
                <div class="row justify-content-center">
                @foreach ($organizeds['media_partner'] as $item)
                    <div class="col-6 col-sm-3">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="img-fluid w-50 w-sm-75 mx-auto d-block">
                    </div>
                @endforeach
                </div>
            @endif
            {{-- end media partner --}}
        </div>
    @endif

    {{-- contact me --}}
    @if(!is_null($con))
        <div class="contact-me">
            <a href="{{ url('https://api.whatsapp.com/send?phone='.$con->number.'&text=' . str_replace(' ', '%20', $con->message)) }}" class="btn btn-success">Whatsapp Me</a>
        </div>
    @endif
    {{-- end contact me --}}
    @push('extra-script')
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

        <script>
            $(document).ready(function(){
                $('.page-scroll').on('click', function(e){
                    var tujuan = $(this).attr('href')
                    var elemenTujuan = $(tujuan)

                    $('html, body').animate({
                        scrollTop: elemenTujuan.offset().top - 130
                        }, 'slow');
                    return false;

                    e.preventDefault()
                })
            });
        </script>
    @endpush
</x-home.app>