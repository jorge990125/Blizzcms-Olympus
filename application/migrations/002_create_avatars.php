<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_avatars extends CI_Migration {

    public function up()
    {
      $this->dbforge->add_field(array(
              'id' => array(
                      'type' => 'INT',
                      'constraint' => '10',
                      'unsigned' => TRUE,
                      'auto_increment' => TRUE
              ),
              'name' => array(
                      'type' => 'VARCHAR',
                      'constraint' => '100'
              ),
              'type' => array(
                      'type' => 'INT',
                      'constraint' => '1',
                      'unsigned' => TRUE,
                      'default' => '1',
                      'comment' => '1 = User | 2 = staff'
              ),
      ));
      $this->dbforge->add_key('id', TRUE);
      $this->dbforge->create_table('avatars');

      $data = array(
        array('name' => 'default.png', 'type' => '1'),
        array('name' => 'arthas.png', 'type' => '1'),
        array('name' => 'deathwing.png', 'type' => '1'),
        array('name' => 'garrosh.png', 'type' => '1'),
        array('name' => 'alexstrasza.png', 'type' => '1'),
        array('name' => 'Gallywix.png', 'type' => '1'),
        array('name' => 'illidan.png', 'type' => '1'),
        array('name' => 'Guldan.png', 'type' => '1'),
        array('name' => 'jaina.png', 'type' => '1'),
        array('name' => 'liadrin.png', 'type' => '1'),
        array('name' => 'maiev.png', 'type' => '1'),
        array('name' => 'melanablanca.png', 'type' => '1'),
        array('name' => 'sylvanas.png', 'type' => '1'),
        array('name' => 'thrall.png', 'type' => '1'),
        array('name' => 'tyrandel.png', 'type' => '1'),
        array('name' => 'worgen.png', 'type' => '1'),
        array('name' => 'valeera.png', 'type' => '1'),
        array('name' => 'varian.png', 'type' => '1'),
        array('name' => 'voljin.png', 'type' => '1'),
        array('name' => 'Volvar.png', 'type' => '1'),
        array('name' => 'lorthemar.png', 'type' => '1'),
      );
      $this->db->insert_batch('avatars', $data);

    }

    public function down()
    {
      $this->dbforge->drop_table('avatars');
    }
}
