@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i
                        data-feather="calendar" class="text-primary"></i></span>
                <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date"
                    data-input>
            </div>
            <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="printer"></i>
                Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                Download Report
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Total Customer</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn btn-link p-0" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="eye" class="icon-sm me-2"></i> <span
                                                class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="trash" class="icon-sm me-2"></i> <span
                                                class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="printer" class="icon-sm me-2"></i> <span
                                                class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="download" class="icon-sm me-2"></i> <span
                                                class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">{{ $a }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <span>Orang</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="customer_chart" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Total Visit</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn btn-link p-0" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="eye" class="icon-sm me-2"></i> <span
                                                class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="trash" class="icon-sm me-2"></i> <span
                                                class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="printer" class="icon-sm me-2"></i> <span
                                                class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="download" class="icon-sm me-2"></i> <span
                                                class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">{{ $b }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <span>Orang</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="visit_chart" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Total Other</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn btn-link p-0" type="button" id="dropdownMenuButton2"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="eye" class="icon-sm me-2"></i> <span
                                                class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="trash" class="icon-sm me-2"></i> <span
                                                class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="printer" class="icon-sm me-2"></i> <span
                                                class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="download" class="icon-sm me-2"></i> <span
                                                class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">{{ $c }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <span>Orang</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="other_chart" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Total SPH</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn btn-link p-0" type="button" id="dropdownMenuButton2"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="eye" class="icon-sm me-2"></i> <span
                                                class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="trash" class="icon-sm me-2"></i> <span
                                                class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="printer" class="icon-sm me-2"></i> <span
                                                class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="download" class="icon-sm me-2"></i> <span
                                                class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">{{ $d }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <span>Orang</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="sph_chart" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                        <h6 class="card-title mb-0">Revenue</h6>
                        <div class="dropdown">
                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton3"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="edit-2" class="icon-sm me-2"></i> <span
                                        class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="trash" class="icon-sm me-2"></i> <span
                                        class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="printer" class="icon-sm me-2"></i> <span
                                        class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="download" class="icon-sm me-2"></i> <span
                                        class="">Download</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-start mb-2">
                        <div class="col-md-7">
                            <p class="text-muted tx-13 mb-3 mb-md-0">Revenue is the income that a business has from its
                                normal business activities, usually from the sale of goods and services to customers.</p>
                        </div>
                        <div class="col-md-5 d-flex justify-content-md-end">
                            <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-primary">Today</button>
                                <button type="button" class="btn btn-outline-primary d-none d-md-block">Week</button>
                                <button type="button" class="btn btn-primary">Month</button>
                                <button type="button" class="btn btn-outline-primary">Year</button>
                            </div>
                        </div>
                    </div>

                    {{-- edit Main Chart --}}
                    <div id="count_by_sales"></div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

    <div class="row">
        <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Monthly sales</h6>
                        <div class="dropdown mb-2">
                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton4"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="edit-2" class="icon-sm me-2"></i> <span
                                        class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="trash" class="icon-sm me-2"></i> <span
                                        class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="printer" class="icon-sm me-2"></i> <span
                                        class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="download" class="icon-sm me-2"></i> <span
                                        class="">Download</span></a>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted">Sales are activities related to selling or the number of goods or services sold
                        in a given time period.</p>
                    <div id="chart_by_sales"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Cloud storage</h6>
                        <div class="dropdown mb-2">
                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton5"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="edit-2" class="icon-sm me-2"></i> <span
                                        class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="trash" class="icon-sm me-2"></i> <span
                                        class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="printer" class="icon-sm me-2"></i> <span
                                        class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="download" class="icon-sm me-2"></i> <span
                                        class="">Download</span></a>
                            </div>
                        </div>
                    </div>
                    <div id="storageChart"></div>
                    <div class="row mb-3">
                        <div class="col-6 d-flex justify-content-end">
                            <div>
                                <label
                                    class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total
                                    storage <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
                                <h5 class="fw-bolder mb-0 text-end">8TB</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                        class="p-1 me-1 rounded-circle bg-primary"></span> Used storage</label>
                                <h5 class="fw-bolder mb-0">~5TB</h5>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary">Upgrade storage</button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

    <div class="row">
        <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Sales</h6>
                        <div class="dropdown mb-2">
                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton6"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="edit-2" class="icon-sm me-2"></i> <span
                                        class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="trash" class="icon-sm me-2"></i> <span
                                        class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="printer" class="icon-sm me-2"></i> <span
                                        class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="download" class="icon-sm me-2"></i> <span
                                        class="">Download</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        @foreach ($e as $f)
                            <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                                <div class="me-3">
                                    <img src="{{ url('https://via.placeholder.com/35x35') }}" class="rounded-circle wd-35"
                                        alt="user">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="fw-normal text-body mb-1">{{ $f->username }}</h6>
                                        <p class="text-muted tx-12">
                                            {{ str_replace(['["', '"]'], '', strtoupper($f->getRoleNames())) }}</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ ($f->sph->sum('nilai_pagu') / 2000000000) * 100 }}%;"
                                            aria-valuenow="{{ ($f->sph->sum('nilai_pagu') / 2000000000) * 100 }}"
                                            aria-valuemin="0" aria-valuemax="100">
                                            {{ ($f->sph->sum('nilai_pagu') / 2000000000) * 100 }}%</div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-xl-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Projects</h6>
                        <div class="dropdown mb-2">
                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton7"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="edit-2" class="icon-sm me-2"></i> <span
                                        class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="trash" class="icon-sm me-2"></i> <span
                                        class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="printer" class="icon-sm me-2"></i> <span
                                        class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="download" class="icon-sm me-2"></i> <span
                                        class="">Download</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Nama Instansi</th>
                                    <th class="pt-0">Nama Customer</th>
                                    <th class="pt-0">Jenis Perusahaan</th>
                                    <th class="pt-0">Nomer Hp</th>
                                    <th class="pt-0">Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer as $cstmer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cstmer->nama_instansi }}</td>
                                        <td>{{ $cstmer->nama_customer }}</td>
                                        <td>{{ $cstmer->jenis_perusahaan }}</td>
                                        <td>{{ $cstmer->nomer_hp }}</td>
                                        <td>{{ $cstmer->user->username }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush
@push('chart')
    <script>
        'use strict'
        // Orders Chart
        var colors = {
            primary: "#6571ff",
            secondary: "#7987a1",
            success: "#05a34a",
            info: "#66d1d1",
            warning: "#fbbc06",
            danger: "#ff3366",
            light: "#e9ecef",
            dark: "#060c17",
            muted: "#7987a1",
            gridBorder: "rgba(77, 138, 240, .15)",
            bodyColor: "#000",
            cardBg: "#fff"
        }
        var fontFamily = "'Roboto', Helvetica, sans-serif"

        var customer = {
            chart: {
                type: "bar",
                height: 60,
                sparkline: {
                    enabled: !0
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 2,
                    columnWidth: "60%"
                }
            },
            colors: ['#6571ff'],
            series: [{
                name: '',
                data: {{ $customer_chart->values() }}
            }],
            xaxis: {
                categories: {!! $customer_chart->keys() !!}
            },
        };
        var visit = {
            chart: {
                type: "bar",
                height: 60,
                sparkline: {
                    enabled: !0
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 2,
                    columnWidth: "60%"
                }
            },
            colors: ['#6571ff'],
            series: [{
                name: '',
                data: {{ $kegiatan_visit_chart->values() }}
            }],
            xaxis: {
                categories: {!! $kegiatan_visit_chart->keys() !!}
            },
        };

        let other = {
            chart: {
                type: "bar",
                height: 60,
                sparkline: {
                    enabled: !0
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 2,
                    columnWidth: "60%"
                }
            },
            colors: ['#6571ff'],
            series: [{
                name: '',
                data: {{ $kegiatan_other_chart->values() }}
            }],
            xaxis: {
                categories: {!! $kegiatan_other_chart->keys() !!}
            },
        }

        let sph = {
            chart: {
                type: "bar",
                height: 60,
                sparkline: {
                    enabled: !0
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 2,
                    columnWidth: "60%"
                }
            },
            colors: ['#6571ff'],
            series: [{
                name: '',
                data: {{ $sph_chart->values() }}
            }],
            xaxis: {
                categories: {!! $sph_chart->keys() !!}
            },
        }


        var chart_by_sales = {
            chart: {
                type: 'bar',
                height: '318',
                parentHeightOffset: 0,
                foreColor: colors.bodyColor,
                background: colors.cardBg,
                toolbar: {
                    show: false
                },
            },
            theme: {
                mode: 'light'
            },
            tooltip: {
                theme: 'light'
            },
            colors: [colors.primary],
            fill: {
                opacity: .9
            },
            grid: {
                padding: {
                    bottom: -4
                },
                borderColor: colors.gridBorder,
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            series: [{
                name: 'Sales',
                data: {!! $chart_by_sales->values() !!}
            }],
            xaxis: {

                categories: {!! $chart_by_sales->keys() !!},
                axisBorder: {
                    color: colors.gridBorder,
                },
                axisTicks: {
                    color: colors.gridBorder,
                },
            },
            yaxis: {
                title: {
                    text: 'Number of Sales',
                    style: {
                        size: 9,
                        color: colors.muted
                    }
                },
            },
            legend: {
                show: true,
                position: "top",
                horizontalAlign: 'center',
                fontFamily: fontFamily,
                itemMargin: {
                    horizontal: 8,
                    vertical: 0
                },
            },
            stroke: {
                width: 0
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '10px',
                    fontFamily: fontFamily,
                },
                offsetY: -27
            },
            plotOptions: {
                bar: {
                    columnWidth: "50%",
                    borderRadius: 4,
                    dataLabels: {
                        position: 'top',
                        orientation: 'vertical',
                    }
                },
            }
        }

        var chart_by_sales = {
            series: [{
                name: 'Actual',
                data: [
                    @foreach ($chart_by_sales as $x)


                        {
                            x: '{{ $x->username }}',
                            y: {{ $x->total }},
                            goals: [{
                                name: 'Expected',
                                value: 2000000000,
                                strokeHeight: 5,
                                strokeColor: '#775DD0'
                            }]
                        },
                    @endforeach

                ]
            }],
            chart: {
                height: 350,
                type: 'bar'
            },
            plotOptions: {
                bar: {
                    columnWidth: '60%'
                }
            },
            colors: ['#00E396'],
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                showForSingleSeries: true,
                customLegendItems: ['Actual', 'Expected'],
                markers: {
                    fillColors: ['#00E396', '#775DD0']
                }
            }
        };

        var count_by_sales = {
            series: [{
                name: 'series1',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'series2',
                data: [11, 32, 45, 34, 52, 41]
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z",
                    "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                    "2018-09-19T06:30:00.000Z"
                ]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var count_chart = new ApexCharts(document.querySelector("#count_by_sales"), count_by_sales);
        count_chart.render();

        var chart_sales = new ApexCharts(document.querySelector("#chart_by_sales"), chart_by_sales);
        chart_sales.render();





        new ApexCharts(document.querySelector("#customer_chart"), customer).render();
        new ApexCharts(document.querySelector("#sph_chart"), sph).render();
        new ApexCharts(document.querySelector("#visit_chart"), visit).render();
        new ApexCharts(document.querySelector("#other_chart"), other).render();
        //var chart = new ApexCharts(document.querySelector("#chart"), chart_by_sales).render();

        // Orders Chart - END
    </script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush
