<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\SiswaAkun;
use Illuminate\Http\Request;
use App\Models\SiswaPembayaran;
use Illuminate\Support\Str;
use PDF;
use Milon\Barcode\DNS1D;

class SiswaPembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = SiswaPembayaran::with(['siswa', 'biaya'])->get();

        // Misalkan kita mengambil biaya pertama sebagai contoh
        // Anda mungkin memiliki logika khusus untuk menentukan biaya mana yang harus ditampilkan
        $biaya = Biaya::first();
        
        // Mengambil nama dan ID dari biaya, serta memastikan mereka ada
        $namaBiaya = optional($biaya)->nama_biaya;
        $jumlahBiaya = optional($biaya)->jumlah_biaya;
        $biayaId = optional($biaya)->id;

        // Query data biaya dengan status_wajib true
        $biayaWajib = Biaya::where('status_wajib', true)->get();

        // Kirim variabel tersebut ke view
        return view('siswa.pembayaran', compact('pembayaran', 'namaBiaya', 'jumlahBiaya', 'biayaId', 'biayaWajib'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'biaya_id' => 'required|exists:biaya,id',
            'siswa_id' => 'required|exists:akun_siswa,id',
            'tgl_pembayaran' => 'required|date',
            'bukti_pembayaran' => 'nullable|image|max:2048', // Asumsi file adalah gambar dan maks 2MB
        ]);
    
        // Generate kode_transaksi
        // Menggunakan tanggal dan no_pendaftaran untuk kode transaksi
        $tanggal = now()->format('dmY');
        $siswa = SiswaAkun::findOrFail($request->siswa_id);
        $nomorPendaftaran = explode('PPDB2024', $siswa->no_pendaftaran)[1] ?? '001'; // Pastikan format sesuai dan default jika tidak ditemukan

        // Mencari jumlah transaksi pada hari yang sama
        $prefix = "PPDB2024" . $tanggal;
        $lastTransaction = SiswaPembayaran::where('kode_transaksi', 'like', "{$prefix}%")->count();
        $newNumber = str_pad($lastTransaction + 1, 3, '0', STR_PAD_LEFT);

        // Membangun kode_transaksi dengan format baru
        $kodeTransaksi = $prefix . $nomorPendaftaran . $newNumber;
    
        $data = $request->all();
        $data['kode_transaksi'] = $kodeTransaksi; // Set kode_transaksi
    
        // Handle upload bukti_pembayaran
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data['bukti_pembayaran'] = $filename;
        }

        SiswaPembayaran::create($data);

        return redirect()->back()->with('success', 'Pembayaran berhasil ditambahkan.');

        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $pembayaran = SiswaPembayaran::findOrFail($id);

        $request->validate([
            // Hapus validasi kode_transaksi karena tidak perlu di-update
            'biaya_id' => 'required|exists:biaya,id',
            'siswa_id' => 'required|exists:akun_siswa,id',
            'tgl_pembayaran' => 'required|date',
            'bukti_pembayaran' => 'nullable|image|max:2048', // Asumsi file adalah gambar dan maks 2MB
        ]);

        $data = $request->except(['kode_transaksi']); // Hapus kode_transaksi dari data yang akan di-update

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data['bukti_pembayaran'] = $filename;
        }

        $pembayaran->update($data);

        return redirect()->back()->with('success', 'Pembayaran berhasil diperbarui.');
    }


    public function edit($id)
    {
        $pembayaran = SiswaPembayaran::with(['biaya', 'siswa'])->findOrFail($id);
        // Format tanggal sebelum dikirim
        $pembayaran->tgl_pembayaran = $pembayaran->tgl_pembayaran->format('Y-m-d');
        return response()->json($pembayaran);
    }

    public function destroy($id)
    {
        try {
            $pembayaran = SiswaPembayaran::findOrFail($id);
            // Jika ada file/bukti pembayaran yang terkait, Anda mungkin ingin menghapusnya dari server juga
            if ($pembayaran->bukti_pembayaran) {
                $file_path = public_path('uploads/' . $pembayaran->bukti_pembayaran);
                if (file_exists($file_path)) {
                    @unlink($file_path);
                }
            }
            
            $pembayaran->delete();

            // Mengembalikan respons JSON untuk AJAX
            return response()->json(['success' => 'Pembayaran berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            // Mengembalikan respons error jika terjadi kesalahan
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus pembayaran.'], 500);
        }
    }

    public function printBuktiBayar($id)
    {
        $pembayaran = SiswaPembayaran::with(['siswa', 'biaya'])->findOrFail($id);
        $d = new DNS1D();
        $barcode = $d->getBarcodeHTML($pembayaran->kode_transaksi, 'C128');

        $pdf = PDF::loadView('pembayaran.print', compact('pembayaran', 'barcode'));
        return $pdf->stream('bukti_pembayaran.pdf');
    }
    
}
