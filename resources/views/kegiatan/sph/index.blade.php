@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Table </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @elseif (session()->has('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('delete') }}
            </div>
        @endif
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Tambah {{ $title }}</h6>

                    <form class="forms-tambah" method="post" action="{{ route('sph.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="customer" class="col-sm-3 col-form-label">Pilih Customer</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="customer" name="customer">
                                    <option selected value="{{ $customer->id }}">{{ $customer->nama_customer }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                            <div class="col-sm-9">
                                <select class="form-select " id="brand" name="brand">
                                    <option value="">Pilih Brand</option>
                                    @foreach ($brand as $x)
                                        <option value="{{ $x->id }}">{{ $x->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="products" class="col-sm-3 col-form-label">Produk</label>
                            <div class="col-sm-9">
                                {{-- <div id="products"></div> --}}
                                <select class="form-select js-example-basic-multiple" multiple="multiple" id="products" name="products[]">
                                    <option value="">Pilih Produk</option>
                                {{-- @foreach ($brand as $x)
                                    <option value="{{ $x->id }}">{{ $x->name }}</option>
                                @endforeach --}}
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="sumber_anggaran" class="col-sm-3 col-form-label">Sumber Anggaran</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="sumber_anggaran" name="sumber_anggaran">
                                    <option selected disabled>Pilih Sumber Anggaran</option>
                                    @foreach ($sumber_anggaran as $x)
                                        <option value="{{ $x->name }}">{{ $x->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nilai_pagu" class="col-sm-3 col-form-label">Nilai Pagu</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nilai_pagu" placeholder="Nilai Pagu"
                                    name="nilai_pagu" value="{{ old('nilai_pagu') }}"
                                    data-inputmask="'alias': 'currency', 'prefix':'Rp.'" dir="rtl">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="metode_pembelian" class="col-sm-3 col-form-label">Metode Pembelian</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="metode_pembelian" name="metode_pembelian">
                                    <option selected disabled>Pilih Metode Pembelian</option>
                                    @foreach ($metode_pembelian as $x)
                                        <option value="{{ $x->name }}">{{ $x->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="time_line" class="col-sm-3 col-form-label">Time Line</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="time_line" name="time_line">
                                    <option selected disabled>Pilih Time Line</option>
                                    @foreach ($time_line as $x)
                                        <option value="{{ $x->name }}">{{ $x->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="status" name="status">
                                    <option selected disabled>Pilih Status</option>
                                    @foreach ($status as $x)
                                        <option value="{{ $x->name }}">{{ $x->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="winrate" class="col-sm-3 col-form-label">Winrate</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="winrate" name="winrate">
                                    <option selected disabled>Pilih Winrate</option>
                                        <option value="1%">1%</option>
                                        <option value="5%">5%</option>
                                        <option value="10%">10%</option>
                                        <option value="20%">20%</option>
                                        <option value="30%">30%</option>
                                        <option value="40%">40%</option>
                                        <option value="50%">50%</option>
                                        <option value="60%">60%</option>
                                        <option value="70%">70%</option>
                                        <option value="80%">80%</option>
                                        <option value="90%">90%</option>
                                        <option value="100%">100%</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="myDropify" class="col-sm-3 col-form-label">Upload Surat Penawaran Harga</label>
                            <div class="col-sm-9">
                                <input type="file" name="pdf_file" id="myDropify" />
                            </div>
                        </div>

                        

                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <a href="{{ route('customer.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row pb-2">
                        <div class="col-md-6">
                            <h6 class="card-title">{{ $title }}</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-end">
                                {{-- <a href="{{ route('visit.create') }}" class="btn btn-outline-primary">Tambah {{ $title }}</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Instansi</th>
                                    <th>Nama Customer</th>
                                    <th>Nomer Hp</th>
                                    <th>Kegiatan</th>
                                    <th>Brand</th>
                                    <th>Produk</th>
                                    <th>Sumber Anggaran</th>
                                    <th>Nilai Pagu</th>
                                    <th>Metode Pembelian</th>
                                    <th>SPH File</th>
                                    <th>Time Line</th>
                                    <th>Status</th>
                                    <th>Winrate</th>
                                    <th>Sales</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sph as $x)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $x->customer->nama_instansi }}</td>
                                        <td>{{ $x->customer->nama_customer }}</td>
                                        <td>{{ $x->customer->nomer_hp }}</td>
                                        <td>{{ $x->kegiatan }}</td>
                                        <td>{{ $x->brand($x->brand) }}</td>
                                        <td>{{ $x->produk}}</td>
                                        <td>{{ $x->sumber_anggaran }}</td>
                                        <td>Rp. {{ number_format($x->nilai_pagu) }}</td>
                                        <td>{{ $x->metode_pembelian }}</td>
                                        <td><a class="btn btn-warning btn-xs" href="{{ asset('assets/pdf/' . $x->pdf_file) }}" target="_blank">File</a></td>
                                        <td>{{ $x->time_line }}</td>
                                        @if ($x->status == 'Done')
                                        <td><span class="badge bg-success">{{ $x->status }}</span></td>
                                        @elseif ($x->status == 'Hold')
                                            <td><span class="badge bg-warning">{{ $x->status }}</span></td>
                                        @else
                                            <td><span class="badge bg-danger">{{ $x->status }}</span></td>
                                        @endif
                                        <td>{{ $x->winrate }}</td>
                                        <td>{{ $x->user->username }}</td>
                                        <td>
                                            <a href="{{ route('sph.destroy', ['customer_id' => $x->customer->id, 'id' => $x->id]) }}"
                                                onclick="event.preventDefault(); document.getElementById('visit-delete-{{ $x->id }}').submit();"
                                                class="btn btn-danger btn-icon">
                                                <i data-feather="box"></i>
                                            </a>
                                            <form id="visit-delete-{{ $x->id }}"
                                                action="{{ route('sph.destroy', ['customer_id' => $x->customer->id, 'id' => $x->id]) }}"
                                                method="POST" class="d-none">
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush
@push('custom-scripts')
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#brand').change(function() {
                var brandId = $(this).val();

                if (brandId) {
                    $.ajax({
                        url: '/products/' + brandId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#products').empty();

                            $.each(data, function(index, product) {
                                $('#products').append('<option value="' + product.nama_produk +
                                    '">' +  product.nama_produk + '</option>');

                            });
                        }
                    });
                }
            });
        });
    </script>
@endpush
