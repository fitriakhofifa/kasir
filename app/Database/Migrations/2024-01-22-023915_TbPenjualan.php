<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPenjualan extends Migration
{
    public function up()
    {
        //Membuat tabel penjualan
        $this->forge->addField([
            'id_penjualan' => [
                'type'  => 'INT',
                'constraint'  => '11',
                'auto_increment' => true,
                'unsigned'  => true,
            ],
            'tanggal_penjualan' => [
                'type'  => 'DATE',
            ],
            'total_harga' => [
                'type'  => 'DECIMAL',
                'constraint' => '10, 2',
            ],
            'id_pelanggan'  => [
                'type'  => 'INT',
                'constraint' => '11',
            ],
            'created_at'  => [
                'type'  => 'DATETIME',
                'null'  => true,
            ],
            'updated_at' => [
                'type'  => 'DATETIME',
                'null'  => true,
            ],
            'deleted_at' => [
                'type'  => 'DATETIME',
                'null'  => true,
            ],
        ]);
        $this->forge->addKey('id_penjualan', TRUE);
        $this->forge->addForeignKey('id_pelanggan', 'tb_pelanggan', 'id_pelanggan');
        $this->forge->createTable('tb_penjualan');
    }

    public function down()
    {
        //Menghapus tabel penjualan
        $this->forge->dropTable('tb_penjualan');
    }
}
