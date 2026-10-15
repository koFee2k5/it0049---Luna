<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCustomerFilesToTasks extends Migration
{
    public function up()
    {
        if (! $this->db->fieldExists('customer_id', 'tasks')) {
            $this->forge->addColumn('tasks', ['customer_id' => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'after' => 'task_date']]);
        }
        if (! $this->db->fieldExists('attachment', 'tasks')) {
            $this->forge->addColumn('tasks', ['attachment' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'customer_id']]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('attachment', 'tasks')) {
            $this->forge->dropColumn('tasks', 'attachment');
        }
        if ($this->db->fieldExists('customer_id', 'tasks')) {
            $this->forge->dropColumn('tasks', 'customer_id');
        }
    }
}
