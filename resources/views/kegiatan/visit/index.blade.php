@extends('layout.master')

@push('plugin-styles')
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

                    <form class="forms-tambah" method="post" action="{{ route('visit.store') }}">
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
                            <label for="flatpickr-date" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
                            <div class="col-sm-9">
                                <div class="input-group flatpickr" id="flatpickr-date">
                                    <input type="text" class="form-control" placeholder="Pilih Tanggal Kegiatan"
                                        name="tanggal" data-input value="{{ old('tanggal') }}">
                                    <span class="input-group-text input-group-addon" data-toggle><i
                                            data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="brand" name="brand">
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
                            <label for="pertemuan" class="col-sm-3 col-form-label">Pertemuan</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="pertemuan" name="pertemuan">
                                    <option value="">Pilih Pertemuan</option>
                                    @foreach ($pertemuan as $x)
                                        <option value="{{ $x->id }}">Pertemuan ke-{{ $x->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="note" class="col-sm-3 col-form-label">Note Kegiatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="note" autocomplete="off" placeholder="Note Kegiatan" rows="4"
                                    name="note"> {{ old('note') }}</textarea>
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
                                    <th>Tanggal</th>
                                    <th>Brand</th>
                                    <th>Produk</th>
                                    <th>Pertemuan</th>
                                    <th>Note</th>
                                    <th>Sales</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visit as $x)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $x->customer->nama_instansi }}</td>
                                        <td>{{ $x->customer->nama_customer }}</td>
                                        <td>{{ $x->customer->nomer_hp }}</td>
                                        <td>{{ $x->kegiatan }}</td>
                                        <td>{{ $x->tanggal }}</td>
                                        <td>{{ $x->brand($x->brand) }}</td>
                                        <td>{{ $x->produk }}</td>
                                        <td>Pertemuan Ke-{{ $x->pertemuan }}</td>
                                        <td>{{ $x->note }}</td>
                                        <td>{{ $x->user->username }}</td>
                                        <td>
                                            <a href="{{ route('visit.destroy', ['customer_id' => $x->customer->id, 'id' => $x->id]) }}"
                                                onclick="event.preventDefault(); document.getElementById('visit-delete-{{ $x->id }}').submit();"
                                                class="btn btn-danger btn-icon">
                                                <i data-feather="box"></i>
                                            </a>
                                            <form id="visit-delete-{{ $x->id }}"
                                                action="{{ route('visit.destroy', ['customer_id' => $x->customer->id, 'id' => $x->id]) }}"
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
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush
@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
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
