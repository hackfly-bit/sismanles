@extends('layout.master')

@push('plugin-styles')
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

                    <form class="forms-tambah" method="post" action="{{ route('preorder.store') }}">
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
                            <label for="time_line" class="col-sm-3 col-form-label">Status</label>
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
                            <label for="flatpickr-date" class="col-sm-3 col-form-label">Tanggal Pengiriman</label>
                            <div class="col-sm-9">
                                <div class="input-group flatpickr" id="flatpickr-date">
                                    <input type="text" class="form-control" placeholder="Pilih Tanggal Kegiatan"
                                        name="tanggal_pengiriman" data-input value="{{ old('tanggal_pengiriman') }}">
                                    <span class="input-group-text input-group-addon" data-toggle><i
                                            data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="flatpickr-date" class="col-sm-3 col-form-label">Tanggal Instalasi</label>
                            <div class="col-sm-9">
                                <div class="input-group flatpickr" id="flatpickr-date">
                                    <input type="text" class="form-control" placeholder="Pilih Tanggal Kegiatan"
                                        name="tanggal_instalasi" data-input value="{{ old('tanggal_instalasi') }}">
                                    <span class="input-group-text input-group-addon" data-toggle><i
                                            data-feather="calendar"></i></span>
                                </div>
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
                                    <th>time Line</th>
                                    <th>Tanggal Pengiriman</th>
                                    <th>Tanggal Instalasi</th>
                                    <th>Status</th>
                                    <th>Sales</th>
                                    <th>Revision</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($preorder as $x)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $x->customer->nama_instansi }}</td>
                                        <td>{{ $x->customer->nama_customer }}</td>
                                        <td>{{ $x->customer->nomer_hp }}</td>
                                        <td>{{ $x->kegiatan }}</td>
                                        <td>{{ $x->time_line }}</td>
                                        <td>{{ $x->tanggal_pengiriman }}</td>
                                        <td>{{ $x->tanggal_instalasi }}</td>
                                        @if ($x->status == 'Done')
                                            <td><span class="badge bg-success">{{ $x->status }}</span></td>
                                        @elseif ($x->status == 'Hold')
                                            <td><span class="badge bg-warning">{{ $x->status }}</span></td>
                                        @else
                                            <td><span class="badge bg-danger">{{ $x->status }}</span></td>
                                        @endif
                                        <td>{{ $x->user->username }}</td>
                                        <td><a href="#"
                                                class="btn btn-primary btn-icon">
                                                <i data-feather="check-square"></i>
                                            </a></td>
                                        <td>
                                            <a href="{{ route('preorder.destroy', ['customer_id' => $x->customer->id, 'id' => $x->id]) }}"
                                                onclick="event.preventDefault(); document.getElementById('visit-delete-{{ $x->id }}').submit();"
                                                class="btn btn-danger btn-icon">
                                                <i data-feather="box"></i>
                                            </a>
                                            <form id="visit-delete-{{ $x->id }}"
                                                action="{{ route('preorder.destroy', ['customer_id' => $x->customer->id, 'id' => $x->id]) }}"
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
@endpush
@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
@endpush
