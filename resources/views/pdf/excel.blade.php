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
