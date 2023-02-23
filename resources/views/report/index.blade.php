@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Table </a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
        </ol>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row pb-2">
                        <div class="col-md-6">
                            <h6 class="card-title">Data SPH</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('report.generatePDF') }}" class="btn btn-outline-primary">Generate PDF</a>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
                    @role('sales')
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table nowrap ">
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
                                        <th>Revision</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer_sales as $x)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $x->nama_instansi }}</td>
                                            <td>{{ $x->nama_customer }}</td>
                                            <td>{{ $x->jabatan }}</td>
                                            <td>{{ $x->nomer_hp }}</td>
                                            <td>{{ $x->jenis_perusahaan }}</td>
                                            <td>{{ $x->segmentasi }}</td>
                                            <td>{{ $x->alamat }}</td>
                                            @foreach ($x->visit()->get() as $y)
                                                <td>{{ $y->jenis_kegiatan }}</td>
                                                <td>{{ $y->tanggal_visit }}</td>
                                                <td>{{ $y->produk }}</td>
                                                <td>{{ $y->principal }}</td>
                                                <td>Pertemuan Ke-{{ $y->pertemuan_ke }}</td>
                                                <td>{{ $y->status }}</td>
                                                <td>{{ $y->deskripsi }}</td>
                                            @endforeach

                                            @forelse ($x->sph()->get() as $z)
                                                <td>{{ $z->sumber_anggaran }} </td>
                                                <td>Rp. {{ number_format($z->nilai_pagu) }}</td>
                                                <td>{{ $z->metode_pembelian }}</td>
                                                <td>{{ $z->metode_pembayaran }}</td>
                                                <td>{{ $z->time_line }}</td>
                                                <td>{{ $z->tanggal_pengiriman }}</td>
                                                <td>{{ $z->tanggal_instalasi }}</td>
                                            @empty
                                                <td>Data Kosong</td>
                                                <td>Data Kosong</td>
                                                <td>Data Kosong</td>
                                                <td>Data Kosong</td>
                                                <td>Data Kosong</td>
                                                <td>Data Kosong</td>
                                                <td>Data Kosong</td>
                                            @endforelse




                                            <td><a href="{{ route('sph.history', $x->id) }}" class="btn btn-primary btn-icon">
                                                    <i data-feather="check-square"></i>
                                                </a></td>
                                            <td><a href="{{ route('sph.edit', $x->id) }}" class="btn btn-primary btn-icon">
                                                    <i data-feather="check-square"></i>
                                                </a>
                                                <a href="{{ route('sph.destroy', $x->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('sph-delete-{{ $x->id }}').submit();"
                                                    class="btn btn-danger btn-icon">
                                                    <i data-feather="box"></i>
                                                </a>
                                                <form id="sph-delete-{{ $x->id }}"
                                                    action="{{ route('sph.destroy', $x->id) }}" method="POST" class="d-none">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table nowrap ">
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
                                        <th>Revision</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer as $x)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $x->nama_instansi }}</td>
                                            <td>{{ $x->nama_customer }}</td>
                                            <td>{{ $x->jabatan }}</td>
                                            <td>{{ $x->nomer_hp }}</td>
                                            <td>{{ $x->jenis_perusahaan }}</td>
                                            <td>{{ $x->segmentasi }}</td>
                                            <td>{{ $x->alamat }}</td>
                                            @foreach ($x->visit()->get() as $y)
                                                <td>{{ $y->jenis_kegiatan }}</td>
                                                <td>{{ $y->tanggal_visit }}</td>
                                                <td>{{ $y->produk }}</td>
                                                <td>{{ $y->principal }}</td>
                                                <td>Pertemuan Ke-{{ $y->pertemuan_ke }}</td>
                                                <td>{{ $y->status }}</td>
                                                <td>{{ $y->deskripsi }}</td>
                                            @endforeach
                                            @foreach ($x->sph()->get() as $z)
                                                <td>{{ $z->sumber_anggaran }}</td>
                                                <td>Rp. {{ number_format($z->nilai_pagu) }}</td>
                                                <td>{{ $z->metode_pembelian }}</td>
                                                <td>{{ $z->metode_pembayaran }}</td>
                                                <td>{{ $z->time_line }}</td>
                                                <td>{{ $z->tanggal_pengiriman }}</td>
                                                <td>{{ $z->tanggal_instalasi }}</td>
                                            @endforeach
                                            <td><a href="{{ route('sph.history', $x->id) }}" class="btn btn-primary btn-icon">
                                                    <i data-feather="check-square"></i>
                                                </a></td>
                                            <td><a href="{{ route('sph.edit', $x->id) }}" class="btn btn-primary btn-icon">
                                                    <i data-feather="check-square"></i>
                                                </a>
                                                <a href="{{ route('sph.destroy', $x->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('sph-delete-{{ $x->id }}').submit();"
                                                    class="btn btn-danger btn-icon">
                                                    <i data-feather="box"></i>
                                                </a>
                                                <form id="sph-delete-{{ $x->id }}"
                                                    action="{{ route('sph.destroy', $x->id) }}" method="POST" class="d-none">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endrole
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
@endpush
