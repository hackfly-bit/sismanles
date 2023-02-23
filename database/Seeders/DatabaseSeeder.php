<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $perusahaan = array(
            array('id' => '1', 'name' => 'Pemerintah'),
            array('id' => '2', 'name' => 'Swasta')
        );

        $segmentasi = array(
            array('id' => '1', 'name' => 'AGRICULTURE & VETERINARY'),
            array('id' => '2', 'name' => 'CHEMICAL'),
            array('id' => '3', 'name' => 'COSMETIC, FLAVOUR & FRAGRANCE'),
            array('id' => '4', 'name' => 'CEDUCATION'),
            array('id' => '5', 'name' => 'ENERGY & MINNING'),
            array('id' => '6', 'name' => 'ENVIRONMENT'),
            array('id' => '7', 'name' => 'FOOD & BAVERAGE'),
            array('id' => '8', 'name' => 'HEALTH'),
            array('id' => '9', 'name' => 'LAB SERVICE'),
            array('id' => '10', 'name' => 'LAB RESEARCH'),
            array('id' => '11', 'name' => 'LUBRICANT'),
            array('id' => '12', 'name' => 'OIL & GAS'),
            array('id' => '13', 'name' => 'PHARMACY'),
            array('id' => '14', 'name' => 'POWER PLAN'),
            array('id' => '15', 'name' => 'LAINNYA')
        );

        $kegiatan = array(
            array('id' => '1', 'name' => 'CALL'),
            array('id' => '2', 'name' => 'PRESENTASI'),
            array('id' => '3', 'name' => 'BUAT SPH'),
            array('id' => '4', 'name' => 'VISIT')

        );

        $principal = array(

            array('id' => '1', 'name' => 'GBC'),
            array('id' => '2', 'name' => 'SH SCIENTIFIC'),
            array('id' => '3', 'name' => 'WASSERLAB'),
            array('id' => '4', 'name' => 'K-LAB'),
            array('id' => '5', 'name' => 'MAGMATHERM'),
            array('id' => '6', 'name' => 'ODLAB'),
            array('id' => '7', 'name' => 'WIGGENS'),
            array('id' => '8', 'name' => 'CMSI (LOKAL)'),
            array('id' => '9', 'name' => 'PHOENIX'),
            array('id' => '10', 'name' => 'SONNEN'),
            array('id' => '11', 'name' => 'ATPIO'),
            array('id' => '12', 'name' => 'PHOTRON')

        );

        $pertemuan = array(

            array('id' => '1', 'name' => '1'),
            array('id' => '2', 'name' => '2'),
            array('id' => '4', 'name' => '4'),
            array('id' => '3', 'name' => '3'),
            array('id' => '5', 'name' => '5'),
            array('id' => '6', 'name' => '6'),
            array('id' => '7', 'name' => '7'),
            array('id' => '8', 'name' => '8'),
            array('id' => '9', 'name' => '9'),
            array('id' => '10', 'name' => '10'),
            array('id' => '11', 'name' => '11'),
            array('id' => '12', 'name' => '12')

        );

        $status = array(
            array('id' => '1', 'name' => 'Done'),
            array('id' => '2', 'name' => 'Lost'),
            array('id' => '3', 'name' => 'Hold')
        );

        $sumber_anggaran = array(
            array('id' => '1', 'name' => 'DAK'),
            array('id' => '2', 'name' => 'APBD'),
            array('id' => '3', 'name' => 'APBN'),
            array('id' => '4', 'name' => 'APBNP'),
            array('id' => '5', 'name' => 'PIHAK KETIGA'),
            array('id' => '6', 'name' => 'ANGGARAN KANTOR')
        );

        $metode_pembayaran = array(
            array('id' => '1', 'name' => 'DP 20%'),
            array('id' => '2', 'name' => 'DP 30%'),
            array('id' => '3', 'name' => 'DP 50%'),
            array('id' => '4', 'name' => 'CASH'),
            array('id' => '5', 'name' => 'SETELAH PEKERJAAN SELESAI')
        );

        $metode_pembelian = array(
            array('id' => '1', 'name' => 'PO-LANGSUNG'),
            array('id' => '2', 'name' => 'E-CATALOG'),
            array('id' => '3', 'name' => 'MARKETPLACE'),
            array('id' => '4', 'name' => 'TANDER'),
        );

        $time_line = array(
            array('id' => '1', 'name' => 'Q1'),
            array('id' => '2', 'name' => 'Q2'),
            array('id' => '3', 'name' => 'Q3'),
            array('id' => '4', 'name' => 'Q4'),
            array('id' => '5', 'name' => 'Q5')
        );

        $nama_customer = array(
            array("id" => "1", "user_id" => "1", "nama_instansi" => "Four Times Chewy", "nama_customer" => "Cruz Daniels", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "2", "user_id" => "1", "nama_instansi" => "Bring Me the Pants", "nama_customer" => "Khalid Gates", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "3", "user_id" => "1", "nama_instansi" => "Ample Saturday", "nama_customer" => "Justin Poole", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "4", "user_id" => "1", "nama_instansi" => "Chewy Chewy", "nama_customer" => "Marianne Bailey", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "5", "user_id" => "1", "nama_instansi" => "McTeddy", "nama_customer" => "Muhammed Villegas", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "6", "user_id" => "1", "nama_instansi" => "Lynette Eats the Teddy", "nama_customer" => "Jana Collier", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "7", "user_id" => "1", "nama_instansi" => "Lynette Ettenyl", "nama_customer" => "Arjun Hampton", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "8", "user_id" => "1", "nama_instansi" => "One Girl, Four Pants", "nama_customer" => "Kenny Manning", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "9", "user_id" => "1", "nama_instansi" => "Chewy Dream and a Pinch of Teddy", "nama_customer" => "Nicolas Lane", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "10", "user_id" => "1", "nama_instansi" => "No Teddy", "nama_customer" => "Tina Vaughn", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "11", "user_id" => "1", "nama_instansi" => "The Ample Pants", "nama_customer" => "Annika Barry", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "12", "user_id" => "1", "nama_instansi" => "Of Men and Foxes", "nama_customer" => "Ayah Banks", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "13", "user_id" => "1", "nama_instansi" => "Flight of the Purple Foxes", "nama_customer" => "Ben Odom", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "14", "user_id" => "1", "nama_instansi" => "C.H.E.W.Y.", "nama_customer" => "Milton Sheppard", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "15", "user_id" => "1", "nama_instansi" => "Purely Purple", "nama_customer" => "Eesa Lambert", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "16", "user_id" => "1", "nama_instansi" => "Prancing Twins", "nama_customer" => "Frederic Barrera", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "17", "user_id" => "1", "nama_instansi" => "The Ramsay Street Strippers", "nama_customer" => "Lilli Odonnell", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "18", "user_id" => "1", "nama_instansi" => "Ramsay Street Thunder Ears", "nama_customer" => "Laurence Duran", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "19", "user_id" => "1", "nama_instansi" => "Teddyback", "nama_customer" => "Dominik Brooks", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
            array("id" => "20", "user_id" => "1", "nama_instansi" => "The Chewy Lynette Project", "nama_customer" => "Erik York", "jabatan" => "manager", "nomer_hp" => "0853673848883", "jenis_perusahaan" => "swasta", "segmentasi" => "Chamical", "alamat" => "ulujami , Jakarta , Selatan "),
        );



        // array(
        //     array('id' => '1', 'user_id' =>  '1', 'nama_instansi' => 'PT. Indonesia Bumi Harta', 'nama_customer' => 'Yayan Wahyu Setion', 'jabatan' => 'manager', 'jenis_perusahaan' => 'swasta', 'segmentasi' => 'Chamical', 'alamat' => 'ulujami , Jakarta , Selatan', 'nomer_hp' => '0853673848883')

        // );

        $kegiatan_visit = array(
            array("id" => "1", "user_id" => "1", "customer_id" => "1", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "3", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "2", "user_id" => "1", "customer_id" => "2", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "4", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "3", "user_id" => "1", "customer_id" => "3", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "5", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "4", "user_id" => "1", "customer_id" => "4", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "6", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "5", "user_id" => "1", "customer_id" => "5", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "7", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "6", "user_id" => "1", "customer_id" => "6", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "8", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "7", "user_id" => "1", "customer_id" => "7", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "9", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "8", "user_id" => "1", "customer_id" => "8", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "10", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "9", "user_id" => "1", "customer_id" => "9", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "11", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "10", "user_id" => "1", "customer_id" => "10", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "12", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "11", "user_id" => "1", "customer_id" => "11", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "13", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "12", "user_id" => "1", "customer_id" => "12", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "14", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "13", "user_id" => "1", "customer_id" => "13", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "15", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "14", "user_id" => "1", "customer_id" => "14", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "16", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "15", "user_id" => "1", "customer_id" => "15", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "17", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "16", "user_id" => "1", "customer_id" => "16", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "18", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "17", "user_id" => "1", "customer_id" => "17", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "19", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "18", "user_id" => "1", "customer_id" => "18", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "20", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "19", "user_id" => "1", "customer_id" => "19", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "21", "status" => "Done", "note" => "note Singakat Untuk Kamu "),
            array("id" => "20", "user_id" => "1", "customer_id" => "20", "kegiatan" => "Visit", "tanggal" => Carbon::now(), "produk" => "Apa Aja", "brand" => "Apa Aja", "pertemuan" => "22", "status" => "Done", "note" => "note Singakat Untuk Kamu ")
        );
        // array(
        //     array('id' => '1', 'user_id' =>  '1', 'customer_id' => '1', 'jenis_kegiatan' => 'visit', 'tanggal_visit'  => Carbon::now(), 'produk' => 'Apa Aja',  'principal' => 'apa aja', 'pertemuan_ke' => '3', 'status' => 'done',  'deskripsi' => 'deskripsi singakat untuk kamu')
        // );

        $kegiatan_other = array(
            array('id' => '1', 'user_id' =>  '1', 'customer_id' => '1', 'nama_kegiatan' => 'kunjungan', 'tanggal_other' => Carbon::now(), 'deskripsi' => 'apa aja boleh')
        );

        $sph = array(
            array("id" => "1", "user_id" => "1", "customer_id" => "1", "sumber_anggaran" => "APBN", "nilai_pagu" => "20000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "2", "user_id" => "1", "customer_id" => "2", "sumber_anggaran" => "APBD", "nilai_pagu" => "30000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "3", "user_id" => "1", "customer_id" => "3", "sumber_anggaran" => "APBN", "nilai_pagu" => "40000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "4", "user_id" => "1", "customer_id" => "4", "sumber_anggaran" => "APBD", "nilai_pagu" => "50000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "5", "user_id" => "1", "customer_id" => "5", "sumber_anggaran" => "APBN", "nilai_pagu" => "60000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "6", "user_id" => "1", "customer_id" => "6", "sumber_anggaran" => "APBD", "nilai_pagu" => "70000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "7", "user_id" => "1", "customer_id" => "7", "sumber_anggaran" => "APBN", "nilai_pagu" => "80000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "8", "user_id" => "1", "customer_id" => "8", "sumber_anggaran" => "APBD", "nilai_pagu" => "90000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "9", "user_id" => "1", "customer_id" => "9", "sumber_anggaran" => "APBN", "nilai_pagu" => "100000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "10", "user_id" => "1", "customer_id" => "10", "sumber_anggaran" => "APBD", "nilai_pagu" => "110000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "11", "user_id" => "1", "customer_id" => "11", "sumber_anggaran" => "APBN", "nilai_pagu" => "120000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "12", "user_id" => "1", "customer_id" => "12", "sumber_anggaran" => "APBD", "nilai_pagu" => "130000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "13", "user_id" => "1", "customer_id" => "13", "sumber_anggaran" => "APBN", "nilai_pagu" => "140000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "14", "user_id" => "1", "customer_id" => "14", "sumber_anggaran" => "APBD", "nilai_pagu" => "150000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "15", "user_id" => "1", "customer_id" => "15", "sumber_anggaran" => "APBN", "nilai_pagu" => "160000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "16", "user_id" => "1", "customer_id" => "16", "sumber_anggaran" => "APBD", "nilai_pagu" => "170000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "17", "user_id" => "1", "customer_id" => "17", "sumber_anggaran" => "APBN", "nilai_pagu" => "180000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "18", "user_id" => "1", "customer_id" => "18", "sumber_anggaran" => "APBD", "nilai_pagu" => "190000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "19", "user_id" => "1", "customer_id" => "19", "sumber_anggaran" => "APBN", "nilai_pagu" => "200000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", ),
            array("id" => "20", "user_id" => "1", "customer_id" => "20", "sumber_anggaran" => "APBD", "nilai_pagu" => "210000000", "metode_pembelian" => "cash", "metode_pembayaran" => "cash", )
        );

        $po = array(
            array("id" => "1", "user_id" => "1", "customer_id" => "1", "time_line" => "Q1", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "2", "user_id" => "1", "customer_id" => "2", "time_line" => "Q2", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "3", "user_id" => "1", "customer_id" => "3", "time_line" => "Q3", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "4", "user_id" => "1", "customer_id" => "4", "time_line" => "Q4", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "5", "user_id" => "1", "customer_id" => "5", "time_line" => "Q1", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "6", "user_id" => "1", "customer_id" => "6", "time_line" => "Q2", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "7", "user_id" => "1", "customer_id" => "7", "time_line" => "Q3", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "8", "user_id" => "1", "customer_id" => "8", "time_line" => "Q4", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "9", "user_id" => "1", "customer_id" => "9", "time_line" => "Q1", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "10", "user_id" => "1", "customer_id" => "10","time_line" => "Q2", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "11", "user_id" => "1", "customer_id" => "11","time_line" => "Q3", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "12", "user_id" => "1", "customer_id" => "12","time_line" => "Q4", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "13", "user_id" => "1", "customer_id" => "13","time_line" => "Q1", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "14", "user_id" => "1", "customer_id" => "14","time_line" => "Q2", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "15", "user_id" => "1", "customer_id" => "15","time_line" => "Q3", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "16", "user_id" => "1", "customer_id" => "16","time_line" => "Q4", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "17", "user_id" => "1", "customer_id" => "17","time_line" => "Q1", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "18", "user_id" => "1", "customer_id" => "18","time_line" => "Q2", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "19", "user_id" => "1", "customer_id" => "19","time_line" => "Q3", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done'),
            array("id" => "20", "user_id" => "1", "customer_id" => "20","time_line" => "Q4", "tanggal_pengiriman" => Carbon::now(), "tanggal_instalasi" => Carbon::now(), "status" => 'done')

        );

        $call = array(
            array("id" => "1", "user_id" => "1", "customer_id" => "1", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "2", "user_id" => "1", "customer_id" => "2", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "3", "user_id" => "1", "customer_id" => "3", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "4", "user_id" => "1", "customer_id" => "4", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "5", "user_id" => "1", "customer_id" => "5", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "6", "user_id" => "1", "customer_id" => "6", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "7", "user_id" => "1", "customer_id" => "7", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "8", "user_id" => "1", "customer_id" => "8", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "9", "user_id" => "1", "customer_id" => "9", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "10", "user_id" => "1", "customer_id" => "10", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "11", "user_id" => "1", "customer_id" => "11", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "12", "user_id" => "1", "customer_id" => "12", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "13", "user_id" => "1", "customer_id" => "13", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "14", "user_id" => "1", "customer_id" => "14", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "15", "user_id" => "1", "customer_id" => "15", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "16", "user_id" => "1", "customer_id" => "16", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "17", "user_id" => "1", "customer_id" => "17", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "18", "user_id" => "1", "customer_id" => "18", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "19", "user_id" => "1", "customer_id" => "19", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "20", "user_id" => "1", "customer_id" => "20", "tanggal" => Carbon::now(), "pertemuan" => "1", "status" => "Done", "note" => "Note Singkat")
        );

        $quotation = array(
            array("id" => "1", "user_id" => "1", "customer_id" => "1", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "2", "user_id" => "1", "customer_id" => "2", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "3", "user_id" => "1", "customer_id" => "3", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "4", "user_id" => "1", "customer_id" => "4", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "5", "user_id" => "1", "customer_id" => "5", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "6", "user_id" => "1", "customer_id" => "6", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "7", "user_id" => "1", "customer_id" => "7", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "8", "user_id" => "1", "customer_id" => "8", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "9", "user_id" => "1", "customer_id" => "9", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "10", "user_id" => "1", "customer_id" => "10", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"), 
            array("id" => "11", "user_id" => "1", "customer_id" => "11", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "12", "user_id" => "1", "customer_id" => "12", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "13", "user_id" => "1", "customer_id" => "13", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "14", "user_id" => "1", "customer_id" => "14", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "15", "user_id" => "1", "customer_id" => "15", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "16", "user_id" => "1", "customer_id" => "16", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "17", "user_id" => "1", "customer_id" => "17", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "18", "user_id" => "1", "customer_id" => "18", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "19", "user_id" => "1", "customer_id" => "19", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat"),
            array("id" => "20", "user_id" => "1", "customer_id" => "20", "kegiatan" => "Quotation", "tanggal" => Carbon::now(), "status" => "Done", "note" => "Note Singkat")

        );

        $presentasi = array(
            array("id" => "1", "user_id" => "1", "customer_id" => "1",  "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "2", "user_id" => "1", "customer_id" => "2",  "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "3", "user_id" => "1", "customer_id" => "3",  "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "4", "user_id" => "1", "customer_id" => "4",  "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "5", "user_id" => "1", "customer_id" => "5",  "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "6", "user_id" => "1", "customer_id" => "6",  "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "7", "user_id" => "1", "customer_id" => "7",  "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "8", "user_id" => "1", "customer_id" => "8",  "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "9", "user_id" => "1", "customer_id" => "9",  "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "10", "user_id" => "1", "customer_id" => "10", "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "11", "user_id" => "1", "customer_id" => "11", "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "12", "user_id" => "1", "customer_id" => "12", "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "13", "user_id" => "1", "customer_id" => "13", "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "14", "user_id" => "1", "customer_id" => "14", "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "15", "user_id" => "1", "customer_id" => "15", "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "16", "user_id" => "1", "customer_id" => "16", "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "17", "user_id" => "1", "customer_id" => "17", "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "18", "user_id" => "1", "customer_id" => "18", "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "19", "user_id" => "1", "customer_id" => "19", "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),
            array("id" => "20", "user_id" => "1", "customer_id" => "20", "kegiatan" => "presentasi", "tanggal" => Carbon::now(), "pertemuan" =>"1", "status" => "Done", "note" => "Note Singkat"),

        );


        $role = array(

            array('name' => 'admin', 'guard_name' => 'web'),
            array('name' => 'manager', 'guard_name' => 'web'),
            array('name' => 'sales', 'guard_name' => 'web')


        );
        DB::table('roles')->insert($role);

        // array(
        //     array('id' => '1', 'user_id' =>  '1', 'customer_id' => '1', 'sumber_anggaran' => 'APBN', 'nilai_pagu' => '2000000', 'metode_pembelian' => 'cash', 'metode_pembayaran' => 'cash', 'time_line' =>  'Q1', 'tanggal_pengiriman' => Carbon::now(), 'tanggal_instalasi' => Carbon::now(),)
        // );

        $product = array(
            array("brand_id" => "12", "nama_produk" => "P700 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P701 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P702 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P703 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P704 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P705 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P706 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P707 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P712 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P713A - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P714 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P715 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P716 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P717 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P718 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P719 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P721 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P725 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P726 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P729 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P733 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P735 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P736 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P737 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P738 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P739 - D2 Lamps"),
            array("brand_id" => "12", "nama_produk" => "P747 - D2 Lamps"),

        );

        $admin = User::create(
            [
                'username' => 'admin',
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'role' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password')
            ]
        );
        $admin->assignRole('admin');

        $sales = User::create([
            'username' => 'sales',
            'firstname' => 'sales',
            'lastname' => 'sales',
            'role' => 'sales',
            'email' => 'sales@admin.com',
            'password' => bcrypt('password')
        ]);
        $sales->assignRole('sales');

        $manager = User::create([
            'username' => 'manager',
            'firstname' => 'manager',
            'lastname' => 'manager',
            'role' => 'manager',
            'email' => 'manager@admin.com',
            'password' => bcrypt('password')
        ]);

        $manager->assignRole('manager');
        




        

        DB::table('jenis_perusahaan')->insert($perusahaan);
        DB::table('segmentasi')->insert($segmentasi);
        DB::table('jenis_kegiatan')->insert($kegiatan);
        DB::table('principal')->insert($principal);
        DB::table('pertemuan')->insert($pertemuan);
        DB::table('status')->insert($status);
        DB::table('sumber_anggaran')->insert($sumber_anggaran);
        DB::table('metode_pembayaran')->insert($metode_pembayaran);
        DB::table('metode_pembelian')->insert($metode_pembelian);
        DB::table('time_line')->insert($time_line);
        DB::table('customers')->insert($nama_customer);
        DB::table('kegiatan_visits')->insert($kegiatan_visit);
        DB::table('kegiatan_others')->insert($kegiatan_other);
        DB::table('sphs')->insert($sph);
        DB::table('products')->insert($product);
        DB::table('calls')->insert($call);
        DB::table('quotations')->insert($quotation);
        DB::table('presentasis')->insert($presentasi);
        DB::table('preorders')->insert($po);
    }
}
