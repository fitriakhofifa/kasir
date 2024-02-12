<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbUser extends Migration
{
    public function up()
    {
        //Membuat tabel user
        $this->forge->addField([
        'username' => [
            'type' => 'VARCHAR',
            'constraint' => '100',
        ],
        'password' => [
            'type' => 'INT',
            'constraint' => '11',
        ],
        'nama' => [
            'type' => 'VARCHAR',
            'constraint' => '100',
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
        $this->forge->addKey('username', TRUE);
        $this->forge->createTable('tb_user');
    }
    

    public function down()
    {
        //Menghapus tabel user
        $this->forge->dropTable('tb_user');
    }
}
