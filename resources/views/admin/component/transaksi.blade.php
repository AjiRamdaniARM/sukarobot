@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.htmWl">Home</a></li>
                <li class="breadcrumb-item active">Data Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @if (Auth::user()->role === 'user')

    @if (session()->has('pay_off'))
    <div class="alert alert-success bg-success fw-bold text-light border-0 alert-dismissible fade show"
    role="alert">
    {{ session()->get('pay_off') }}
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
    aria-label="Close"></button>
    </div>
    @else
    <div class="alert alert-success bg-primary fw-bold text-light border-0 alert-dismissible fade show"
    role="alert">
    Hubungi admin via WhatsApp jika status pembayaran tidak berubah.
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
    aria-label="Close"></button>
    </div>
    @endif

    @endif
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
                @if (session()->has('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                        role="alert">
                        {{ session()->get('error') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="container d-flex justify-content-between align-items-center ">
                            <h5 class="card-title">Data Transaksi</h5>

                            @if (Auth::user()->role === 'admin')
                                <form method="POST" action="{{ url('/dashboard/transaksi/approveAll') }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success position-relative mt-3" title="approve all"><i class="bi bi-check-circle"></i> Approve All</button>
                                </form>
                            @endif

                        </div>

                        {{-- <p>Jika status pembayaran anda tidak memiliki perubahan, anda dapat bisa konfirmasi langsung kepada admin dengan menekan ikon Whatsapp</p> --}}
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode Transaksi</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Pelatihan</th>
                                        <th scope="col">Pembayaran</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payment as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->id_transaksi }}</td>
                                            <td>{{ $item->userId->name }}</td>
                                            <td>{{ optional($item->pelatihanId)->judul}}</td>
                                            <td>
                                                @if ($item->status == 'Berhasil')
                                                    <button class="btn btn-success"> Sudah Bayar</button>
                                                @else
                                                    @if (Auth::user()->role === 'user')
                                                        @if ($item->harga_pelatihan == 0)
                                                        <form action="{{ url('/dashboard/user/transaksi/konfirm', $item->id_transaksi) }}" method="POST"
                                                            enctype="multipart/form-data" id="payment-form">
                                                            @csrf
                                                            <input type="hidden" name="transaction_result" id="transaction-result">
                                                            <button type="submit" class="btn btn-danger"> Belum Bayar</button>
                                                        </form>
                                                        @else
                                                        <button id="pay-button" class="btn btn-danger"> Belum Bayar </button>
                                                        <form action="{{ url('/dashboard/user/transaksi/konfirm', $item->id_transaksi) }}" method="POST"
                                                            enctype="multipart/form-data" id="payment-form">
                                                            @csrf
                                                            <input type="hidden" name="transaction_result" id="transaction-result">
                                                        </form>
                                                        @section('scripts')
                                                        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
                                                        <script type="text/javascript">
                                                            document.getElementById('pay-button').onclick = function() {
                                                                // SnapToken acquired from previous step
                                                                snap.pay('{{$item->snap_token}}', {
                                                                    // Optional
                                                                    onSuccess: function(result) {
                                                                        document.getElementById('transaction-result').value = JSON.stringify(result);
                                                                        document.getElementById('payment-form').submit();
                                                                    },
                                                                    // Optional
                                                                    onPending: function(result) {
                                                                        /* You may add your own js here, this is just example */
                                                                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                                                    },
                                                                    // Optional
                                                                    onError: function(result) {
                                                                        /* You may add your own js here, this is just example */
                                                                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                                                    }
                                                                });
                                                            };
                                                        </script>
                                                        @endif

                                                    @else
                                                    <button lass="btn btn-danger"> Belum Bayar </button>
                                                    @endif



                                                @endif





                                                {{-- @if ($item->status == 'Berhasil')
                                                    <button class="btn btn-success"> Sudah Bayar </button>
                                                @else
                                                    @if (Auth::user()->role === 'user')
                                                        @if ($item->harga == 0)
                                                            <form action="{{ url('/dashboard/user/transaksi/konfirm', $item->id_transaksi) }}" method="POST"
                                                                enctype="multipart/form-data" id="payment-form">
                                                                @csrf
                                                                <input type="hidden" name="transaction_result" id="transaction-result">
                                                                <button type="submit" class="btn btn-danger"> Belum Bayar</button>
                                                            </form>
                                                        @else
                                                        <button id="pay-button" class="btn btn-danger"> Belum Bayar </button>
                                                        <form action="{{ url('/dashboard/user/transaksi/konfirm', $item->id_transaksi) }}" method="POST"
                                                            enctype="multipart/form-data" id="payment-form">
                                                            @csrf
                                                            <input type="hidden" name="transaction_result" id="transaction-result">
                                                        </form>

                                                        @endif
                                                    @else
                                                         <button class="btn btn-danger"> Belum Bayar </button>
                                                    @endif

                                                @endif


                                                @endsection --}}
                                            </td>

                                            <td>
                                                <button type="button"
                                                    class="btn @if ($item->status == 'Berhasil') btn-outline-success
                                                    @elseif($item->status == 'Gagal') btn-outline-danger
                                                    @else btn-outline-primary @endif"
                                                    disabled>{{ $item->status }}</button>
                                            </td>
                                            <td>
                                                @if (Auth::user()->role === 'admin')
                                                    @if ($item->status == 'Diproses')
                                                        <a href="{{ url('/dashboard/transaksi/approve', $item->id) }}"
                                                            style="button" class="btn btn-success" title="approve"><i
                                                                class="bi bi-check-circle"></i></a>
                                                        <a href="{{ url('/dashboard/transaksi/reject', $item->id) }}"
                                                            style="button" class="btn btn-danger" title="tolak"><i
                                                                class="bi bi-x-circle"></i></a>
                                                    @endif
                                                @endif
                                                <a href="#" style="button" class="btn btn-primary" title="detail"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#verticalycentered{{ $item->id }}"><i
                                                        class="bi bi-info-circle"></i></a>
                                                        @if (Auth::user()->role === 'user')

                                                <a href="https://wa.me/6285795899901?text=Hallo!!Saya *{{ $item->userId->name }}* ingin telah membayar pelatihan *{{ optional ($item->pelatihanId)->judul }}* dengan nomor transaksi *{{ $item->id_transaksi }}*"
                                                    type="button" target="_blank" class="btn btn-success"><i
                                                        class="bi bi-whatsapp"></i></a>
                                                        @endif

                                            </td>
                                            <div class="modal fade" id="verticalycentered{{ $item->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Bukti Pembayaran</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="transaksi/{{ $item->foto }}" alt="transaksi"
                                                                class="img-fluid mx-auto d-block">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




</main><!-- End #main -->

@include('admin.partial.footer')
