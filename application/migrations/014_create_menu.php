<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_menu extends CI_Migration {

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
              'url' => array(
                      'type' => 'TEXT',
                      'null' => FALSE
              ),
              'icon' => array(
                      'type' => 'VARCHAR',
                      'constraint' => '100'
              ),
              'main' => array(
                      'type' => 'INT',
                      'constraint' => '10',
                      'unsigned' => TRUE,
                      'default' => '0'
              ),
              'child' => array(
                      'type' => 'INT',
                      'constraint' => '10',
                      'unsigned' => TRUE,
                      'default' => '0'
              ),
              'type' => array(
                      'type' => 'INT',
                      'constraint' => '10',
                      'unsigned' => TRUE,
                      'default' => '1'
              ),
      ));
      $this->dbforge->add_key('id', TRUE);
      $this->dbforge->create_table('menu');
      $data = array(
        array('id' => 1, 'name' => 'Inicio', 'url' => '#', 'icon' => 'fa fa-home', 'main' => '1', 'child' => '0', 'type' => '1'),
        array('id' => 2, 'name' => 'Tienda', 'url' => 'store', 'icon' => 'fas fa-store', 'main' => '1', 'child' => '0', 'type' => '1'),
        array('id' => 3, 'name' => 'Conectartse', 'url' => 'connect', 'icon' => 'fas fa-gamepad', 'main' => '1', 'child' => '0', 'type' => '1'),
        array('id' => 4, 'name' => 'Noticias', 'url' => 'noticias', 'icon' => 'fas fa-newspaper', 'main' => '1', 'child' => '0', 'type' => '1'),
        array('id' => 5, 'name' => 'Estadisticas', 'url' => '#', 'icon' => 'fas fa-fist-raised', 'main' => '2', 'child' => '0', 'type' => '1'),
        array('id' => 6, 'name' => 'Soporte', 'url' => '#', 'icon' => 'fas fa-cat', 'main' => '2', 'child' => '0', 'type' => '1'),
		array('id' => 7, 'name' => 'Suscripciones', 'url' => 'subcription', 'icon' => 'fas fa-star', 'main' => '1', 'child' => '0', 'type' => '1'),
        array('id' => 9, 'name' => 'PvP', 'url' => 'pvp', 'icon' => 'fas fa-fist-raised', 'main' => '1', 'child' => '5', 'type' => '1'),
        array('id' => 10, 'name' => 'Reino', 'url' => 'reino', 'icon' => 'fas fa-fist-raised', 'main' => '1', 'child' => '5', 'type' => '1'),
        array('id' => 11, 'name' => 'Logros', 'url' => 'achievements', 'icon' => 'fas fa-fist-raised', 'main' => '1', 'child' => '5', 'type' => '1'),
        array('id' => 12, 'name' => 'Bugtracker', 'url' => 'bugtracker', 'icon' => 'fas fa-bug', 'main' => '1', 'child' => '6', 'type' => '1'),
        array('id' => 13, 'name' => 'Cambios', 'url' => 'changelogs', 'icon' => 'fas fa-scroll', 'main' => '1', 'child' => '6', 'type' => '1'),
        array('id' => 14, 'name' => 'Reclutar', 'url' => 'recruit', 'icon' => 'fas fa-user-friends', 'main' => '1', 'child' => '6', 'type' => '1'),
        array('id' => 15, 'name' => 'Informacion', 'url' => 'informacion', 'icon' => 'fas fa-comment-dots', 'main' => '1', 'child' => '6', 'type' => '1'),
        array('id' => 16, 'name' => 'Tienda Ingame', 'url' => 'tienda', 'icon' => 'fas fa-toggle-on', 'main' => '1', 'child' => '6', 'type' => '1'),
        array('id' => 17, 'name' => 'Mercado Negro', 'url' => 'blackmarket', 'icon' => 'fas fa-dice', 'main' => '1', 'child' => '6', 'type' => '1'),
        array('id' => 18, 'name' => 'BountyHunter', 'url' => 'bountyhunter', 'icon' => 'fas fa-chart-pie', 'main' => '1', 'child' => '6', 'type' => '1'),
        array('id' => 19, 'name' => 'Foros', 'url' => 'forum', 'icon' => 'fas fa-comments', 'main' => '1', 'child' => '0', 'type' => '1'),
        array('id' => 20, 'name' => 'Eventos', 'url' => '#', 'icon' => 'fas fa-cat', 'main' => '1', 'child' => '0', 'type' => '0'),
        array('id' => 21, 'name' => 'Halloween', 'url' => 'halloween', 'icon' => 'fas fa-broom', 'main' => '1', 'child' => '20', 'type' => '1'),
        array('id' => 22, 'name' => 'DarkMoon', 'url' => 'darkmoon', 'icon' => 'fas fa-hat-wizard', 'main' => '1', 'child' => '20', 'type' => '1'),
        array('id' => 23, 'name' => 'Torneos', 'url' => '#', 'icon' => 'fas fa-trophy', 'main' => '1', 'child' => '0', 'type' => '0'),
        array('id' => 24, 'name' => 'Torneo PvP 1vs1', 'url' => 'arena1vs1', 'icon' => 'fas fa-trophy', 'main' => '1', 'child' => '23', 'type' => '1'),
        array('id' => 25, 'name' => 'Torneo PvP 2vs2', 'url' => 'arena2vs2', 'icon' => 'fas fa-trophy', 'main' => '1', 'child' => '23', 'type' => '1'),
        array('id' => 26, 'name' => 'Torneo PvE Dungeon', 'url' => 'pve', 'icon' => 'fas fa-trophy', 'main' => '1', 'child' => '23', 'type' => '1')
      );
     $this->db->insert_batch('menu', $data);
    }

    public function down()
    {
      $this->dbforge->drop_table('menu');
    }
}
