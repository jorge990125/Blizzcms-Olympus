<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_store_menu extends CI_Migration {

    public function up()
    {
      $this->dbforge->add_column('store_categories', array(
              'main' => array(
                      'type' => 'INT',
                      'constraint' => '10',
                      'default' => '1',
                      'after' => 'name'
              ),
              'father' => array(
                      'type' => 'INT',
                      'constraint' => '10',
                      'null' => FALSE,
                      'after' => 'name'
              )
      ));	  	  
	  $data = array(
            array('id' => 1, 'name' => 'Servicios', 'main' => 1, 'route' => 1, 'realmid' => '1'),
            array('id' => 2, 'name' => 'Bolsas', 'main' => 1, 'route' => 2, 'realmid' => '1'),
            array('id' => 3, 'name' => 'Armas Transmog', 'main' => 1, 'route' => 3, 'realmid' => '1'),
            array('id' => 4, 'name' => 'Mascotas', 'main' => 1, 'route' => 4, 'realmid' => '1'),
            array('id' => 5, 'name' => 'Monturas', 'main' => 1, 'route' => 5, 'realmid' => '1'),
            array('id' => 6, 'name' => 'VIP', 'main' => 1, 'route' => 6, 'realmid' => '1'),
            array('id' => 7, 'name' => 'Global Transmog', 'main' => 1, 'route' => 7, 'realmid' => '1'),
            array('id' => 8, 'name' => 'Cosmeticos', 'main' => 1, 'route' => 8, 'realmid' => '1'),
            array('id' => 9, 'name' => 'Tabardos', 'main' => 1, 'route' => 9, 'realmid' => '1'),
            array('id' => 10, 'name' => 'Transmog Tier 6', 'main' => 1, 'route' => 10, 'realmid' => '1')
        );

        $this->db->insert_batch('store_categories', $data);	
    }

    public function down()
    {
      $this->dbforge->drop_column('store_categories', 'main');
      $this->dbforge->drop_column('store_categories', 'father');
    }
}
