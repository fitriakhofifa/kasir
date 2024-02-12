<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbProduk extends Migration
{
    public function up()
    {
        // Membuat tabel produk
        $this->forge->addField([
            'id_produk' => [
                'type'  => 'INT',
                'constraint' => '11',
                //gunakan kedua syntax dibawah ini untuk field yg akan digunakan pk atau fk
                'auto_increment' => true, 
                'unsigned' => true,
            ],
            'nama_produk' => [
                'type'  => 'VARCHAR',
                'constraint' => '255',
            ],
            'harga' => [
                'type'  => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'stok' => [
                'type'  => 'INT',
                'constraint' => '11',
            ],
            'created_at' => [   // panah dua array asosiatif
                'type' => 'DATETIME',
                'null'=>true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null'=>true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null'=>true,
            ],
        ]);
    $this->forge->addKey('id_produk', TRUE); //panah satu class/fungsi
    $this->forge->createTable('tb_produk', TRUE);
    }
    public function down()
    {
        // Menghapus tabel outlet
        $this->forge->dropTable('tb_produk');
    }
}