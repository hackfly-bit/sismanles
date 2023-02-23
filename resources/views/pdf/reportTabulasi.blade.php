<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, laravel, theme, front-end, ui kit, web">

    <title>NobleUI - Laravel Admin Dashboard Template</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@300&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.css" integrity="sha512-tKGnmy6w6vpt8VyMNuWbQtk6D6vwU8VCxUi0kEMXmtgwW+6F70iONzukEUC3gvb+KTJTLzDKAGGWc1R7rmIgxQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- plugin css -->
    <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
    <!-- end plugin css -->

    @stack('plugin-styles')

    <!-- common css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    
    <!-- end common css -->

    @stack('style')
</head>

<body data-base-url="{{ url('/') }}">

    <script src="{{ asset('assets/js/spinner.js') }}"></script>

    <div class="main-wrapper" id="app">


        <div class="page-content">

            {{-- <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Special pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                </ol>
            </nav> --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid d-flex justify-content-between">
                                <div class="col-lg-3 ps-0">
                                    <a href="#" class="noble-ui-logo d-block mt-3">DeltaSindo</span></a>
                                    <p class="mt-1 mb-1"><b>NobleUI Themes</b></p>
                                    <p>108,<br> Great Russell St,<br>London, WC1B 3NA.</p>
                                    <h5 class="mt-5 mb-2 text-muted">Invoice to :</h5>
                                    <p>Joseph E Carr,<br> 102, 102 Crown Street,<br> London, W3 3PR.</p>
                                </div>
                                <div class="col-lg-3 pe-0">
                                    <h4 class="fw-bold text-uppercase text-end mt-4 mb-2">invoice</h4>
                                    <h6 class="text-end mb-5 pb-4"># INV-002308</h6>
                                    <p class="text-end mb-1">Total Data</p>
                                    <h4 class="text-end fw-normal">  {{-- $count --}}</h4>
                                    <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span class="text-muted">Generate
                                            Date : </span>{{-- $date --}}</h6>

                                </div>
                            </div>
                            <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                                <div class="table-responsive w-100">
                                    <table id="exportPdf" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Instansi</th>
                                                <th>Nama Customer</th>
                                                <th>Jabatan</th>
                                                <th>Nomor HP</th>
                                                <th>Jenis Perusahaan</th>
                                                <th>Segmentasi</th>
                                                <th>Alamat</th>
                                                <th>Jenis Kegiatan</th>
                                                <th>Tanggal Visit</th>
                                                <th>Produk</th>
                                                <th>Principal</th>
                                                <th>Pertemuan</th>
                                                <th>Status</th>
                                                <th>Deskripsi</th>
                                                <th>Sumber Anggaran</th>
                                                <th>Nilai Pagu</th>
                                                <th>Metode Pembelian</th>
                                                <th>Metode Pembayaran</th>
                                                <th>Time Line</th>
                                                <th>Tanggal Pengiriman</th>
                                                <th>Tanggal Instalasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customer as $x)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $x->nama_instansi }}</td>
                                                    <td class="text-center">{{ $x->nama_customer }}</td>
                                                    <td class="text-center">{{ $x->jabatan }}</td>
                                                    <td class="text-center">{{ $x->nomer_hp }}</td>
                                                    <td class="text-center">{{ $x->jenis_perusahaan }}</td>
                                                    <td class="text-center">{{ $x->segmentasi }}</td>
                                                    <td class="text-center">{{ $x->alamat }}</td>
                                                    @foreach ($x->visit()->get() as $y)
                                                        <td class="text-center">{{ $y->jenis_kegiatan }}</td>
                                                        <td class="text-center">{{ $y->tanggal_visit }}</td>
                                                        <td class="text-center">{{ $y->produk }}</td>
                                                        <td class="text-center">{{ $y->principal }}</td>
                                                        <td class="text-center">Pertemuan Ke-{{ $y->pertemuan_ke }}
                                                        </td>
                                                        <td class="text-center">{{ $y->status }}</td>
                                                        <td class="text-center">{{ $y->deskripsi }}</td>
                                                    @endforeach
                                                    @foreach ($x->sph()->get() as $z)
                                                        <td class="text-center">{{ $z->sumber_anggaran }}</td>
                                                        <td class="text-center">Rp. {{ number_format($z->nilai_pagu) }}
                                                        </td>
                                                        <td class="text-center">{{ $z->metode_pembelian }}</td>
                                                        <td class="text-center">{{ $z->metode_pembayaran }}</td>
                                                        <td class="text-center">{{ $z->time_line }}</td>
                                                        <td class="text-center">{{ $z->tanggal_pengiriman }}</td>
                                                        <td class="text-center">{{ $z->tanggal_instalasi }}</td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="container-fluid mt-5 w-100">
                                <div class="row">
                                    <div class="col-md-6 ms-auto">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Sub Total</td>
                                                        <td class="text-end">$ 14,900.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>TAX (12%)</td>
                                                        <td class="text-end">$ 1,788.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-bold-800">Total</td>
                                                        <td class="text-bold-800 text-end"> $ 16,688.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Payment Made</td>
                                                        <td class="text-danger text-end">(-) $ 4,688.00</td>
                                                    </tr>
                                                    <tr class="bg-light">
                                                        <td class="text-bold-800">Balance Due</td>
                                                        <td class="text-bold-800 text-end">$ 12,000.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="container-fluid w-100">
                                <button onclick="window.print()" class="btn btn-primary float-end mt-4 ms-2 print-window"><i
                                        data-feather="send" class="me-3 icon-md"></i>Print Report</button>
                                {{-- <a href="javascript:;" class="btn btn-outline-primary float-end mt-4"><i
                                        data-feather="printer" class="me-2 icon-md"></i>Print</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
<!-- base js -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<!-- end base js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.js" integrity="sha512-/fgTphwXa3lqAhN+I8gG8AvuaTErm1YxpUjbdCvwfTMyv8UZnFyId7ft5736xQ6CyQN4Nzr21lBuWWA9RTCXCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('#dataTableVisit').dataTable({
        "scrollX": true
    });

    // function print() {
    //     $('.print-window').click(function() {
    //             var css = '@page { size: landscape; overvlow: visible !important; }',
    //                 head = document.head || document.getElementsByTagName('head')[0],
    //                 style = document.createElement('style'),;

    //             style.type = 'text/css';
    //             style.media = 'print';

    //             if (style.styleSheet) {
    //                 style.styleSheet.cssText = css;
    //             } else {
    //                 style.appendChild(document.createTextNode(css));
    //             }

    //             head.appendChild(style);

    //             window.print();
               
    //         }
    //     });
</script>

<!-- plugin js -->
@stack('plugin-scripts')
<!-- end plugin js -->

<!-- common js -->
<script src="{{ asset('assets/js/template.js') }}"></script>
<!-- end common js -->

@stack('custom-scripts')
</body>

</html>
