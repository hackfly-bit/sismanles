@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
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
                            <label for="metode_pembayaran" class="col-sm-3 col-form-label">Metode Pembayaran</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="metode_pembayaran" name="metode_pembayaran">
                                    <option selected disabled>Pilih Metode Pembayaran</option>
                                    @foreach ($metode_pembayaran as $x)
                                        <option value="{{ $x->name }}">{{ $x->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="myDropify" class="col-sm-3 col-form-label">Upload Surat Penawaran Harga</label>
                            <div class="col-sm-9">
                                <input type="file" name="pdf_file" id="myDropify" />
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
                                    <th>Sumber Anggaran</th>
                                    <th>Nilai Pagu</th>
                                    <th>Metode Pembelian</th>
                                    <th>Metode Pembayaran</th>
                                    <th>SPH File</th>
                                    <th>Status</th>
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
                                        <td>{{ $x->sumber_anggaran }}</td>
                                        <td>Rp. {{ number_format($x->nilai_pagu) }}</td>
                                        <td>{{ $x->metode_pembelian }}</td>
                                        <td>{{ $x->metode_pembayaran }}</td>
                                        <td><a class="btn btn-warning btn-xs"
                                                href="{{ asset('assets/pdf/' . $x->pdf_file) }}">File</a></td>
                                        @if ($x->status == 'Done')
                                            <td><span class="badge bg-success">{{ $x->status }}</span></td>
                                        @elseif ($x->status == 'Hold')
                                            <td><span class="badge bg-warning">{{ $x->status }}</span></td>
                                        @else
                                            <td><span class="badge bg-danger">{{ $x->status }}</span></td>
                                        @endif
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
@endpush
@push('custom-scripts')
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
@endpush
