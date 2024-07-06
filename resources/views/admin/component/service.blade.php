@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
  <main id="main" class="main">
    <section class="section">
        <div class="pagetitle">
            <h1>Service</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Service</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

        @if (session()->has('success'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
            role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="container d-flex justify-content-between align-items-center">
                     <h5 class="card-title">Service</h5>

                </div>


                 <!-- Preview Section -->
        <div id="previewSection" style="display: none;">
            <div style="border: 1px solid #ddd; padding: 20px; margin-top: 20px;">
                <h3 style="border-bottom: 1px solid #ddd; padding-bottom: 10px; margin-bottom: 20px;">Preview Pesan</h3>
                <p><strong>From:</strong> <span id="previewName"></span> &lt;<span id="previewEmail"></span>&gt;</p>
                <p><strong>To:</strong> recipient@example.com</p>
                <hr>
                <p id="previewMessage" style="white-space: pre-wrap;"></p>
                <hr>
                <button type="button" class="text-center w-full btn btn-secondary p-2 font-bold text-white rounded-sm" onclick="editMessage()">Edit Pesan</button>
                <button type="button" class="text-center w-full btn btn-primary p-2 font-bold text-white rounded-sm" onclick="sendMessage()">Kirim Pesan</button>
            </div>
        </div>



                <!-- Horizontal Form -->
                <form method="POST" action="{{ url('/service/send') }}" class="row g-3" enctype="multipart/form-data" id="messageForm">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select" name="name" id="nameSelect" aria-label="State" required>
                                @foreach ($email as $gmail)
                                <option value="{{ $gmail->name }}">{{ $gmail->name }}</option>
                                @endforeach
                            </select>
                            <label for="nameSelect">Nama Pengguna</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="email" id="emailSelect" aria-label="State" required>
                                @foreach ($email as $gmail)
                                <option value="{{ $gmail->email }}">{{ $gmail->email }}</option>
                                @endforeach
                            </select>
                            <label for="emailSelect">Email Pengguna</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea type="text" class="form-control" name="message" id="messageInput" placeholder="Pesan" required></textarea>
                            <label for="messageInput">Isi Pesan</label>
                        </div>
                    </div>
                    <br>
                    <button type="button" class="text-center w-full btn btn-primary p-2 font-bold text-white rounded-sm" onclick="previewMessage()">Kirim Pesan </button>
                </form>
              </div>
            </div>

          </div>

        </div>

        <style>
            #previewSection {
            background-color: #fff;
            border-radius: 5px;
            }

            #previewSection h3 {
                font-size: 18px;
                border-bottom: 1px solid #ddd;
                padding-bottom: 10px;
                margin-bottom: 20px;
            }

            #previewSection p {
                font-size: 14px;
                line-height: 1.5;
            }

            #previewSection hr {
                margin: 20px 0;
            }

            #previewSection button {
                margin-top: 10px;
            }

        </style>

        <script>
        function previewMessage() {
            document.getElementById('previewName').innerText = document.getElementById('nameSelect').value;
            document.getElementById('previewEmail').innerText = document.getElementById('emailSelect').value;
            document.getElementById('previewMessage').innerText = document.getElementById('messageInput').value;

            document.getElementById('messageForm').style.display = 'none';
            document.getElementById('previewSection').style.display = 'block';
        }

        function editMessage() {
            document.getElementById('messageForm').style.display = 'block';
            document.getElementById('previewSection').style.display = 'none';
        }

        function sendMessage() {
            document.getElementById('messageForm').submit();
        }
        </script>


      </section>
  </main>
