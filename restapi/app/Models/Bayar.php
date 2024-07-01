<?php

namespace App\Models;

use CodeIgniter\Model;

class Bayar extends Model
{
    protected $table            = 'bayar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nis','nama_siswa','nominal','berita'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
