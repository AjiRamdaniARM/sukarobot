@include('user.partial.header')
@include('user.partial.navbar')


<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs mb-3" data-aos="fade-in">
        <div class="container">
            <h2>Checkout</h2>
        </div>
    </div><!-- End Breadcrumbs -->


    @if (session()->has('success'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    @endif


    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses px-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="course-item">
                    <img src="Pelatihan/{{ $pelatihan->foto }}" class="img-fluid" alt="...">
                    <div class="course-content">
                        <h3 class="text-center">{{ $pelatihan->judul }}</h3>
                    </div>
                </div>
            </div> <!-- End Course Item-->

            <div class="col-lg-8">
                <div class="course-content">
                    <h3 class="mb-3">Detail Pembayaran</h3>
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <a>Harga Kelas</a>
                        <p>{{ 'Rp ' . number_format($pelatihan->harga, 0, ',', '.') }}</p>
                    </div>
                    <hr>
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <a>Diskon</a>
                        <p>Rp. 0</p>
                    </div>
                    <hr>

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <a>Total Bayar</a>
                        <p>{{ 'Rp ' . number_format($pelatihan->harga, 0, ',', '.') }}</p>
                    </div>
                    <hr>

                    <h3 class="mb-3">Tranfer Pembayaran</h3>
                    @if ($Transaksi->status == 'Berhasil')
                    <button  onclick="alert('anda sudah bayar pelatihan ini')" class="btn btn-primary w-100">Bayar Sekarang</button>
                    @else
                    @if ($pelatihan->harga == 0)
                            <form action="{{ url('/home/payment/konfirm', $pelatihan->judul) }}" method="POST"
                                enctype="multipart/form-data" id="payment-form">
                                <input type="hidden" name="transaction_result" id="transaction-result">
                                @csrf
                                <div class="col-12">
                                    <button type="submit"  class="btn btn-primary w-100">Bayar Sekarang</button>
                                </div>
                            </form>

                        @else
                            <div class="col-12">
                                <button  type="submit" id="pay-button" class="btn btn-primary w-100">Bayar Sekarang</button>
                            </div>

                        @endif
                    @endif


                    <form action="{{ url('/home/payment/konfirm', $pelatihan->judul) }}" method="POST"
                        enctype="multipart/form-data" id="payment-form">
                        <input type="hidden" name="transaction_result" id="transaction-result">
                        @csrf
                    </form>

                    {{-- <div class="course-info d-flex justify-content-between align-items-center mb-4">
                        <img src="assets/img/bsi.png" style="height: 50px" alt="">
                    </div> --}}

                    {{-- <div class="course-info d-flex justify-content-between align-items-center">
                        <a>Sukarobot Academy</a>
                    </div>
                    <div class="course-info d-flex justify-content-between align-items-center mb-3">
                        <h2 id="copyText">7225018237</h2>
                        <a type="button" class="bi bi-files" onclick="copyToClipboard()"></a>
                    </div>
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
                    <form action="{{ url('/home/payment/konfirm', $pelatihan->judul) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="course-info d-flex justify-content-between align-items-center mb-1">
                            <a>Upload Bukti Pembayaran</a>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <img id="preview-image" src="assets/img/nota.png" style="height: 60px" alt="Profile">
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <div class="pt-2">
                                <label for="profile-image" class="btn btn-primary btn-sm" style="color: white"
                                    title="Upload new profile image">
                                    <input type="file" id="profile-image" name="foto" accept=".jpg, .jpeg"
                                        style="display: none;" onchange="previewFile()" required>
                                    <span class="bi bi-upload"></span> Upload
                                </label>
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
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100">Konfirmasi Pembayaran</button>
                    </div>
                </div>
                </form> --}}


            </div>

        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    @section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY')}}"></script>
    <script type="text/javascript">
     document.getElementById('pay-button').onclick = function(){
       // SnapToken acquired from previous step
       snap.pay('{{$snapToken}}', {
         // Optional
         onSuccess: function(result){
         document.getElementById('transaction-result').value = JSON.stringify(result);
         document.getElementById('payment-form').submit();
         },
         // Optional
         onPending: function(result){
           /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
         },
         // Optional
         onError: function(result){
           /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
         }
       });
     };
   </script>

</main><!-- End #main -->
@include('user.partial.footer')
