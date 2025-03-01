<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bayar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type'=> 'DATETIME',
                'null'=> true,
            ],
            'nis' => [
                'type' => 'TEXT',
                'constraint' => '20',
            ],
            'nama_siswa' => [
                'type' => 'TEXT',
                'constraint' => '50',
            ],
            'nominal' => [
                'type' => 'INT',
                'null' => true,
            ],
            'berita' => [
                'type' => 'TEXT',
                'constraint' => '50',
            ],
            'created_at' => [
                'type'=> 'DATETIME',
                'null'=> true,
            ],
            'updated_at' => [
                'type'=> 'DATETIME',
                'null'=> true,
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bayar');
    }

    public function down()
    {
        $this->forge->dropTable('bayar');
    }
}
