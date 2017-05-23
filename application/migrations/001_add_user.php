<?php
class Migration_Add_user extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(
           array(
              'id' => array(
                 'type' => 'INT',
                 'constraint' => 5,
                 'unsigned' => true,
                 'auto_increment' => true
              ),
              'name' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '100',
              ),
              'username' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '100',
              ),
              'email' => array(
                 'type' => 'TEXT',
                 'null' => true,
              ),
              'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
              ),
              'birthdate' => array(
                'type' => 'DATE',
                'null' => true,
              ),
              'address' => array(
                'type' => 'VARCHAR',
                'null' => true,
              ),
              'user_type' => array(
                'type' => 'VARCHAR',
                'constraint' =>'10',
                'null' => true,
              ),
              'created' => array(
                'type' => 'timestamp',
                'null' => true,
              ),
              'modified' => array(
                'type' => 'timestamp',
                'null' => true,
              ),
           )
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}
