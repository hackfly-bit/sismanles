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
                            <h6 class="card-title">Data Customer</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('customer.create') }}" class="btn btn-outline-primary">Tambah Data
                                    Customer</a>
                            </div>
                        </div>
                    </div>



                    {{-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
                    @role('sales')
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table nowrap">
                            <thead >
                                <tr>
                                    <th>No</th>
                                    <th>Nama Instansi</th>
                                    <th>Nama Customer</th>
                                    <th>Jabatan</th>
                                    <th>Nomer Hp</th>
                                    <th>Jenis Perusahaan</th>
                                    <th>Segmentasi</th>
                                    <th>Alamat</th>
                                    <th>Call</th>
                                    <th>Revision</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody >
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
                                            <td><a href="{{ route('customer.call', $x->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <i data-feather="check-square"></i>
                                            </a></td>
                                            <td><a href="{{ route('customer.history', $x->id) }}"
                                                    class="btn btn-primary btn-icon">
                                                    <i data-feather="check-square"></i>
                                                </a></td>
                                            <td><a href="{{ route('customer.edit', $x->id) }}"
                                                    class="btn btn-primary btn-icon">
                                                    <i data-feather="check-square"></i>
                                                </a>
                                                <a href="{{ route('customer.destroy', $x->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('customer-delete-{{ $x->id }}').submit();"
                                                    class="btn btn-danger btn-icon">
                                                    <i data-feather="box"></i>
                                                </a>
                                                <form id="customer-delete-{{ $x->id }}"
                                                    action="{{ route('customer.destroy', $x->id) }}" method="POST"
                                                    class="d-none">
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
                        <table id="dataTableExample" class="table nowrap">
                            <thead >
                                <tr>
                                    <th>No</th>
                                    <th>Nama Instansi</th>
                                    <th>Nama Customer</th>
                                    <th>Jabatan</th>
                                    <th>Nomer Hp</th>
                                    <th>Jenis Perusahaan</th>
                                    <th>Segmentasi</th>
                                    <th>Alamat</th>
                                    <th>Call</th>
                                    <th>Visit</th>
                                    <th>Quotation</th>
                                    <th>Presentasi</th>
                                    <th>SPH</th>
                                    <th>Preorder</th>
                                    <th>Revision</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody >
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
                                            <td><a href="{{ route('customer.call', $x->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <i data-feather="check-square"></i>
                                            </a></td>
                                            <td><a href="{{ route('customer.visit', $x->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <i data-feather="check-square"></i>
                                            </a></td>
                                            <td><a href="{{ route('customer.quotation', $x->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <i data-feather="check-square"></i>
                                            </a></td>
                                            <td><a href="{{ route('customer.presentasi', $x->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <i data-feather="check-square"></i>
                                            </a></td>
                                            <td><a href="{{ route('customer.sph', $x->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <i data-feather="check-square"></i>
                                            </a></td>
                                            <td><a href="{{ route('customer.preorder', $x->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <i data-feather="check-square"></i>
                                            </a></td>
                                            <td><a href="{{ route('customer.history', $x->id) }}"
                                                    class="btn btn-primary btn-icon">
                                                    <i data-feather="check-square"></i>
                                                </a></td>
                                            <td><a href="{{ route('report.reportCustomer', $x->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <i data-feather="check-square"></i>
                                            </a>
                                                <a href="{{ route('customer.edit', $x->id) }}"
                                                    class="btn btn-primary btn-icon">
                                                    <i data-feather="check-square"></i>
                                                </a>
                                                <a href="{{ route('customer.destroy', $x->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('customer-delete-{{ $x->id }}').submit();"
                                                    class="btn btn-danger btn-icon">
                                                    <i data-feather="box"></i>
                                                </a>
                                                <form id="customer-delete-{{ $x->id }}"
                                                    action="{{ route('customer.destroy', $x->id) }}" method="POST"
                                                    class="d-none">
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
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        });

        $('body').on('click', '.showCustomer', function() {
            var customer_id = $(this).data('id');
            $.get("" + '/' + 'show/' + customer_id, function(data) {

            })
        })
    </script>
@endpush
