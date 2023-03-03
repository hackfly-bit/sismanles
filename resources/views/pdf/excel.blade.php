<table id="report-tabulasi" class="table nowrap ">
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
            <th>Call</th>
            <th>Tanggal Call</th>
            <th>Pertemuan</th>
            <th>Status Call</th>
            <th>Note</th>
            <th>Visit</th>
            <th>Tanggal Visit</th>
            <th>Brand</th>
            <th>Produk</th>
            <th>Pertemuan</th>
            <th>Status</th>
            <th>Note</th>
            <th>Presntasi</th>
            <th>Tanggal Presentasi</th>
            <th>Status</th>
            <th>Note</th>
            <th>SPH</th>
            <th>Sumber Anggaran</th>
            <th>Nilai Pagu</th>
            <th>Metode Pembelian</th>
            <th>Metode Pembayaran</th>
            <th>Preorder</th>
            <th>Time Line</th>
            <th>Tanggal Pengiriman</th>
            <th>Tanggal Instalasi</th>
            <th>Status</th>
            <th>Sales</th>
            <th>Progress</th>
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
                {{-- Get Last Data Call from kegiatan --}}
                {{-- @foreach ($x->call()->get()->last() as $y) --}}
                <td>{{ $x->call()->get()->pluck('kegiatan')->last() }}</td>
                <td>{{ $x->call()->get()->pluck('tanggal')->last() }}</td>
                <td>Call ke-{{ $x->call()->get()->pluck('pertemuan')->last() }}</td>
                <td>{{ $x->call()->get()->pluck('status')->last() }}</td>
                <td>{{ $x->call()->get()->pluck('note')->last() }}</td>
                <td>{{ $x->visit()->get()->pluck('kegiatan')->last() }}</td>
                <td>{{ $x->visit()->get()->pluck('tanggal')->last() }}</td>
                <td>{{ $x->brand($x->visit()->get()->pluck('brand')->last()) }}</td>
                <td>{{ $x->visit()->get()->pluck('produk')->last() }}</td>
                <td>Visit ke-{{ $x->visit()->get()->pluck('pertemuan')->last() }}</td>
                <td>{{ $x->visit()->get()->pluck('status')->last() }}</td>
                <td>{{ $x->visit()->get()->pluck('note')->last() }}</td>
                <td>{{ $x->presentasi()->get()->pluck('kegiatan')->last() }}</td>
                <td>{{ $x->presentasi()->get()->pluck('tanggal')->last() }}</td>
                <td>{{ $x->presentasi()->get()->pluck('status')->last() }}</td>
                <td>{{ $x->presentasi()->get()->pluck('note')->last() }}</td>
                <td>SPH</td>
                <td>{{ $x->sph()->get()->pluck('sumber_anggaran')->last() }}</td>
                <td>Rp.{{ number_format($x->sph()->get()->pluck('nilai_pagu')->last()) }}</td>
                <td>{{ $x->sph()->get()->pluck('metode_pembelian')->last() }}</td>
                <td>{{ $x->sph()->get()->pluck('metode_pembayaran')->last() }}</td>
                <td>{{ $x->preorder()->get()->pluck('kegiatan')->last() }}</td>
                <td>{{ $x->preorder()->get()->pluck('time_line')->last() }}</td>
                <td>{{ $x->preorder()->get()->pluck('tanggal_pengiriman')->last() }}</td>
                <td>{{ $x->preorder()->get()->pluck('tanggal_instalasi')->last() }}</td>
                <td>{{ $x->preorder()->get()->pluck('status')->last() }}</td>
                <td>{{ $x->user->username}}</td>
               
                <td><div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{($progress[$x->id] / 5)*100}}%;" aria-valuenow="{{($progress[$x->id] / 5)*100}}" aria-valuemin="0" aria-valuemax="100">{{($progress[$x->id] / 5)*100}}%</div>
                  </div></td>
                
               
                
            </tr>
            @endforeach
    </tbody>
</table>