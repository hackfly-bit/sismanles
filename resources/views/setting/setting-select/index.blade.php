@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Jenis Kegiatan</h6>
        {{-- <p class="text-muted mb-3">Add class <code>.table-hover</code></p> --}}
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($a as $x )
                    
                
                <tr>
                  <th>{{$loop->iteration  }}</th>
                  <td>{{ $x->name }}</td>
                  <td><button type="button" class="btn btn-inverse-success">Active</button></td>
                  <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Jenis Perusahaan</h6>
        {{-- <p class="text-muted mb-3">Add class <code>.table-hover</code></p> --}}
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($b as $x )
                    
                
                <tr>
                  <th>{{$loop->iteration  }}</th>
                  <td>{{ $x->name }}</td>
                  <td><button type="button" class="btn btn-inverse-success">Active</button></td>
                  <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Metode Pembayaran</h6>
        {{-- <p class="text-muted mb-3">Add class <code>.table-hover</code></p> --}}
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($c as $x )
                    
                
                <tr>
                  <th>{{$loop->iteration  }}</th>
                  <td>{{ $x->name }}</td>
                  <td><button type="button" class="btn btn-inverse-success">Active</button></td>
                  <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Metode Pembelian</h6>
        {{-- <p class="text-muted mb-3">Add class <code>.table-hover</code></p> --}}
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($d as $x )
                    
                
                <tr>
                  <th>{{$loop->iteration  }}</th>
                  <td>{{ $x->name }}</td>
                  <td><button type="button" class="btn btn-inverse-success">Active</button></td>
                  <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Pertemuan List</h6>
        {{-- <p class="text-muted mb-3">Add class <code>.table-hover</code></p> --}}
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($e as $x )
                    
                
                <tr>
                  <th>{{$loop->iteration  }}</th>
                  <td>{{ $x->name }}</td>
                  <td><button type="button" class="btn btn-inverse-success">Active</button></td>
                  <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Principal List</h6>
        {{-- <p class="text-muted mb-3">Add class <code>.table-hover</code></p> --}}
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($f as $x )
                    
                
                <tr>
                  <th>{{$loop->iteration  }}</th>
                  <td>{{ $x->name }}</td>
                  <td><button type="button" class="btn btn-inverse-success">Active</button></td>
                  <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Segmantasi List</h6>
        {{-- <p class="text-muted mb-3">Add class <code>.table-hover</code></p> --}}
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($g as $x )
                    
                
                <tr>
                  <th>{{$loop->iteration  }}</th>
                  <td>{{ $x->name }}</td>
                  <td><button type="button" class="btn btn-inverse-success">Active</button></td>
                  <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Status List</h6>
        {{-- <p class="text-muted mb-3">Add class <code>.table-hover</code></p> --}}
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($h as $x )
                    
                
                <tr>
                  <th>{{$loop->iteration  }}</th>
                  <td>{{ $x->name }}</td>
                  <td><button type="button" class="btn btn-inverse-success">Active</button></td>
                  <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Sumber Anggaran</h6>
        {{-- <p class="text-muted mb-3">Add class <code>.table-hover</code></p> --}}
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($i as $x )
                    
                
                <tr>
                  <th>{{$loop->iteration  }}</th>
                  <td>{{ $x->name }}</td>
                  <td><button type="button" class="btn btn-inverse-success">Active</button></td>
                  <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Time line</h6>
        {{-- <p class="text-muted mb-3">Add class <code>.table-hover</code></p> --}}
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($j as $x )
                <tr>
                  <th>{{$loop->iteration  }}</th>
                  <td>{{ $x->name }}</td>
                  <td><button type="button" class="btn btn-inverse-success">Active</button></td>
                  <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
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