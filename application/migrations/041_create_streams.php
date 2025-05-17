<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_streams extends CI_Migration {

    public function up()
    {
      $this->dbforge->add_field(array(
              'id' => array(
                      'type' => 'INT',
                      'constraint' => '10',
                      'unsigned' => TRUE,
                      'auto_increment' => TRUE
              ),
              'account' => array(
                      'type' => 'VARCHAR',
                      'constraint' => '255'
              ),
              'channel' => array(
                      'type' => 'VARCHAR',
                      'constraint' => '255'
              ),
              'horario' => array(
                      'type' => 'VARCHAR',
                      'constraint' => '255'
              ),
      ));
      $this->dbforge->add_key('id', TRUE);
      $this->dbforge->create_table('streams');
    }

    public function down()
    {
      $this->dbforge->drop_table('streams');
    }
}
