<body>

    <!-- ======= Header ======= -->

    <header id="header" class="fixed-top">
        <style type="text/css">
            .left {
                text-align: left;
            }

            .right {
                text-align: right;
            }

            .center {
                text-align: center;
            }

            .justify {
                text-align: justify;
            }
            .popup-iklan {
                max-width: 100%;
                position: absolute;
                z-index: 100;
                left: 50%;
                transform: translateX(-50%);
                top: 100px;
            }
            .popup-iklan .body {
                width: 100%;
                height: auto;

                background-color: black 50%;
            }
            .popup-iklan .dismis {
                color: white;
                position: absolute;
                top: 10px;
                font-size: 20px;
                right: 10px;
                cursor: pointer;
                border-radius: 100%;
                width: 30px;
                text-align: center;
                height: auto;
                background-color: blue;
                box-shadow: black 10%;

            }
            .popup-iklan .body .content img {
                width: 30em;
                border-radius: 10px
            }
            .bg {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                top: -100px;

                background-color: rgba(0, 0, 0, 0.7);
                padding: 100em;
                z-index: 1;
            }

            @media (max-width: 768px) {
                .popup-iklan .body .content img {
                width: 20em;

            }
            }
        </style>

        {{-- banner iklan --}}
        <div id="iklan" class="popup-iklan">

            <div class="body">
                <button onclick="hideElements()" style="border: none" class="dismis">
                    X
                </button>
                <div class="content">
                    <img src="assets/img/iklan-1.jpeg" alt="">
                </div>
            </div>
        </div>
        <div id="iklan2" class="bg"></div>

        <script>
           function hideElements() {
            document.getElementById("iklan").style.display = "none";
            document.getElementById("iklan2").style.display = "none";
            }
        </script>

      <div class="container d-flex align-items-center">
        <a href="{{url('/')}}" class="logo me-auto"><img src="assets/img/Untitled-2.png"></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <nav id="navbar" class="navbar  order-last order-lg-0">
          <ul>

            <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="{{url('/')}}">Home</a></li>
            <li><a class="{{ Request::is('home/about') ? 'active' : '' }}" href="{{url('/home/about')}}">Tentang Kami</a></li>
            <li><a class="{{ Request::is('home/pelatihan') ? 'active' : '' }}" href="{{url('/home/pelatihan')}}">Pelatihan</a></li>
            <li><a class="{{ Request::is('home/instruktur') ? 'active' : '' }}" href="{{url('/home/instruktur')}}">Instruktur</a></li>
            <li><a class="{{ Request::is('home/galeri') ? 'active' : '' }}" href="{{url('/home/galeri')}}">Galeri</a></li>
            <li><a class="{{ Request::is('home/contact') ? 'active' : '' }}" href="{{url('/home/contact')}}">Hubungi Kami</a></li>
            @if(!auth()->check())
                <button onclick="window.location.href='{{ route('login') }}'"  class="get-started-btn">Masuk</button>
                <button onclick="window.location.href='{{ route('register') }}'"  class="get-started-btn-daftar">Daftar</button>
            @endif
            @if (Route::has('login'))
            @auth
            <li class="dropdown"><a href="/dashboard"><span>{{Auth::user()->name}}</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{url('/dashboard')}}">Dashboard<i class="bi bi-columns-gap"></i></a></li>
                <li><a href="/logout">Logout<i class="bi bi-box-arrow-right"></i></a></li>
              </ul>
            </li>
            @endauth
            @endif
          </ul>

          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
      </div>
    </header><!-- End Header -->

