<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPelanggan extends Migration
{
    public function up()
    {
        //Membuat tabel pelanggan
        $this->forge->addField([
            'id_pelanggan' => [
                'type'  => 'INT',
                'constraint' => '11',
                'auto_increment' => true,
                'unsigned'  => true,
            ],
            'nama_pelanggan' => [
                'type'  => 'VARCHAR',
                'constraint'  => '255',
            ],
            'alamat' => [
                'type'  => 'TEXT',
            ],
            'nomor_telepon' => [
                'type'  => 'VARCHAR',
                'constraint'    => '15',
            ],
            'created_at' => [
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
        $this->forge->addKey('id_pelanggan', TRUE);
        $this->forge->createTable('tb_pelanggan', TRUE);
    }

    public function down()
    {
        //Menghapus tabel outlet
        $this->forge->dropTable('tb_pelanggan');
    }
}
