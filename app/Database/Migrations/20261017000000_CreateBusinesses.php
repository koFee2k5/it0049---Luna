<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBusinesses extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('businesses')) {
            return;
        }

        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'business_name'   => ['type' => 'VARCHAR', 'constraint' => 150],
            'owner_name'      => ['type' => 'VARCHAR', 'constraint' => 150],
            'permit_number'   => ['type' => 'VARCHAR', 'constraint' => 50],
            'address'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'permit_status'   => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'Pending'],
            'expiration_date' => ['type' => 'DATE'],
            'created_at'      => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('permit_number');
        $this->forge->createTable('businesses');
    }

    public function down()
    {
        $this->forge->dropTable('businesses', true);
    }
}
