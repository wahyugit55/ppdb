<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class SiswaAkun extends Authenticatable
{
    use Notifiable;

    protected $table = 'akun_siswa';
    protected $fillable = [
        'nisn', 'nama_lengkap', 'jenis_sekolah', 'asal_sekolah', 'nomor_hp', 'password', 'no_pendaftaran', 'status'
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function jadwalSeleksi()
    {
        return $this->belongsToMany(JadwalSeleksi::class, 'siswa_jadwal_seleksi', 'siswa_id', 'jadwal_seleksi_id')
                    ->withPivot('status')
                    ->wherePivot('status', true);
    }

    public function dataDiri()
    {
        return $this->hasOne(DataDiri::class, 'siswa_id');
    }

    public function alamat()
    {
        return $this->hasOne(Alamat::class, 'siswa_id');
    }

    public function orangTua()
    {
        return $this->hasOne(OrangTua::class, 'siswa_id');
    }

    public function cbtAccount()
    {
        return $this->hasOne(cbtAccount::class, 'siswa_id');
    }

    public function pilihJurusan()
    {
        return $this->hasOne(SiswaPilihJurusan::class, 'siswa_id');
    }

    public function siswaGelombang()
    {
        return $this->belongsTo(SiswaGelombang::class, 'siswa_id');
    }

    public function siswaJalurSeleksi()
    {
        return $this->belongsTo(SiswaJalurSeleksi::class, 'siswa_id');
    }

    public function tahunPelajaran()
    {
        return $this->belongsTo(TahunPelajaran::class, 'siswa_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(SiswaPembayaran::class, 'siswa_id');
    }
    public function pilihProgramTambahan()
    {
        return $this->belongsTo(PilihProgramTambahan::class, 'siswa_id');
    }

    public function verifikasiFormulir()
    {
        return $this->hasOne(VerifikasiFormulir::class, 'siswa_id');
    }
    
    public function getSudahVerifikasiAttribute()
    {
        // Cek apakah relasi verifikasiFormulir ada dan status_verifikasinya adalah 1
        return !is_null($this->verifikasiFormulir) && $this->verifikasiFormulir->status_verifikasi == 1;
    }

    public function getSudahDaftarUlangAttribute()
    {
        // Mendapatkan semua ID biaya yang berstatus wajib false
        $biayaWajibFalseIds = Biaya::where('status_wajib', false)->pluck('id')->sort()->values();

        // Mendapatkan semua ID biaya dari pembayaran yang telah dilakukan siswa
        $biayaBayarIds = $this->pembayaran->pluck('biaya_id')->unique()->sort()->values();

        // \Log::info('Biaya Wajib False IDs: ' . json_encode($biayaWajibFalseIds));
        // \Log::info('Biaya Bayar IDs: ' . json_encode($biayaBayarIds));

        // Cek apakah setiap biaya wajib false sudah ada di dalam biaya yang dibayar
        return $biayaWajibFalseIds->every(function ($biayaId) use ($biayaBayarIds) {
            return $biayaBayarIds->contains($biayaId);
        });
    }
    
}
