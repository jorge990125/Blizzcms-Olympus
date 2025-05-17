<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_store_items extends CI_Migration {

    public function up()
    {
      $this->dbforge->add_column('store_items', array(
              'description' => array(
                      'type' => 'TEXT',
                      'null' => TRUE,
                      'after' => 'name'
              ),
              'price_type' => array(
                      'type' => 'INT',
                      'constraint' => '10',
                      'unsigned' => TRUE,
                      'default' => '0',
                      'after' => 'type'
              ),
      ));

      $this->dbforge->modify_column('store_items', array(
              'price_dp' => array(
                      'name' => 'dp',
                      'type' => 'INT',
                      'constraint' => '10',
                      'default' => '0',
                      'unsigned' => TRUE
              ),
              'price_vp' => array(
                      'name' => 'vp',
                      'type' => 'INT',
                      'constraint' => '10',
                      'default' => '0',
                      'unsigned' => TRUE
              ),
              'qquery' => array(
                      'name' => 'command',
                      'type' => 'TEXT',
                      'null' => TRUE
              ),
      ));

      $this->dbforge->drop_column('store_items', 'image');
      $this->dbforge->drop_column('store_items', 'itemid');
	  
	  $data = array(
		    array('id' => 1, 'name' => 'Suscripción Vip', 'description' => 'Suscripción, sistema que posee beneficios de aumento de reputació, experiencia, oro, honor y algunas funciones como banco portatil, correo', 'category' => 6, 'type' => 1, 'price_type' => 1, 'dp' => 8, 'vp' => 0, 'icon' => 'vip', 'command' => '44966'),
            array('id' => 2, 'name' => 'Resurrección en Maza', 'description' => 'Permite la resurreción de grupo o grupo de banda con un CD de 1h', 'category' => 6, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'resurrecion', 'command' => '57577'),
            array('id' => 3, 'name' => 'Tanque volador Qiraji', 'description' => 'Montura voladora que permite vuelo por todos los continentes de Azeroth', 'category' => 6, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'protrodraconegro', 'command' => '701000'),
            array('id' => 5, 'name' => 'Cambio de faccion', 'description' => '', 'category' => 1, 'type' => 6, 'price_type' => 1, 'dp' => 7, 'vp' => 0, 'icon' => 'faccion', 'command' => '1'),
            array('id' => 6, 'name' => 'Crematoria Corrupta', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'crematoriacorrupta', 'command' => '22691'),
            array('id' => 7, 'name' => 'Oro 10k', 'description' => '', 'category' => 1, 'type' => 2, 'price_type' => 1, 'dp' => 2, 'vp' => 0, 'icon' => 'blizzard', 'command' => '100000000'),
            array('id' => 8, 'name' => 'Crematoria', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'crematoria', 'command' => '50442'),
            array('id' => 9, 'name' => 'Oro 1K', 'description' => '', 'category' => 1, 'type' => 2, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'blizzard', 'command' => '10000000'),
            array('id' => 10, 'name' => 'Oro 5K', 'description' => '', 'category' => 1, 'type' => 2, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'blizzard', 'command' => '50000000'),
            array('id' => 11, 'name' => 'Agonia de Escarcha', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 2, 'vp' => 0, 'icon' => 'frostmourne', 'command' => '36942'),
            array('id' => 13, 'name' => 'Gujas de Guerra', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 7, 'vp' => 0, 'icon' => 'gujas', 'command' => '32838 32837'),
            array('id' => 14, 'name' => 'Agonia de las Sombras', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'agonia', 'command' => '50815'),
            array('id' => 15, 'name' => 'Cohete Abisal x-51', 'description' => '', 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'coheteavisal', 'command' => '49285'),
            array('id' => 16, 'name' => 'Cohete de Paseo x-53', 'description' => '', 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'cohetepaseo', 'command' => '54860'),
            array('id' => 17, 'name' => 'Corcel Celestial', 'description' => '', 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 10, 'vp' => 0, 'icon' => 'corcelcelestial', 'command' => '54811'),
            array('id' => 18, 'name' => 'Draco Abisal', 'description' => '', 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 6, 'vp' => 0, 'icon' => 'dracoabisal', 'command' => '43516'),
            array('id' => 19, 'name' => 'Huevo de Gallo Magico', 'description' => '', 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 6, 'vp' => 0, 'icon' => 'huevogallo', 'command' => '49290'),
            array('id' => 20, 'name' => 'Oso de Guerra Amani', 'description' => '', 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 6, 'vp' => 0, 'icon' => 'osoarmani', 'command' => '33809'),
            array('id' => 21, 'name' => 'Gran Oso de Blizzard', 'description' => '', 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 10, 'vp' => 0, 'icon' => 'osoblizzard', 'command' => '43599'),
            array('id' => 22, 'name' => 'Cristal Resonador negro Qiraji', 'description' => '', 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 2, 'vp' => 0, 'icon' => 'resonadornegro', 'command' => '21176'),
			array('id' => 23, 'name' => 'Tigre Espectral Presto', 'description' => '', 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 7, 'vp' => 0, 'icon' => 'tigreespectral', 'command' => '49284'),
            array('id' => 24, 'name' => 'Tortuga de Montar', 'description' => NULL, 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'tortugamontar', 'command' => '23720'),
            array('id' => 25, 'name' => 'Vermis de Escarcha', 'description' => NULL, 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 7, 'vp' => 0, 'icon' => 'vermisdeescarcha', 'command' => '50435'),
            array('id' => 26, 'name' => 'Zhebra Presta', 'description' => NULL, 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'zebrapresta', 'command' => '37719'),
            array('id' => 27, 'name' => 'Cambio de Raza', 'description' => '', 'category' => 1, 'type' => 7, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'cambioraza', 'command' => '1'),
            array('id' => 28, 'name' => 'Personalizar', 'description' => '', 'category' => 1, 'type' => 5, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'presonalizar', 'command' => '1'),
            array('id' => 29, 'name' => 'Renombrar', 'description' => '', 'category' => 1, 'type' => 4, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'renombrar', 'command' => '1'),
            array('id' => 30, 'name' => 'Bolsa Infinita 36 casillas', 'description' => 'bolsa de 36 casillas', 'category' => 2, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'bolsa36', 'command' => '23162'),
            array('id' => 31, 'name' => 'Espada del Ebano Verde', 'description' => NULL, 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 4, 'vp' => 0, 'icon' => 'espadadkverde', 'command' => '49984'),
            array('id' => 32, 'name' => 'Caminasueños', 'description' => 'Set clásico del Caminasueños', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'dreamwalker', 'command' => '22492 22494 22493 22489 22491 22488 22495 23064 22494 22490'),
            array('id' => 33, 'name' => 'Vestiduras Tempestira', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'tempestira01', 'command' => '16903 16898 16904 16897 16900 16899 16901 16902'),
            array('id' => 34, 'name' => 'Vestiduras Cenarion', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'cenarion01', 'command' => '16828 16829 16830 16833 16831 16834 16835 16836'),
            array('id' => 35, 'name' => 'Mariscal de Campo', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'smc01', 'command' => '16452 16451 16449 16459 16448 16450'),
            array('id' => 36, 'name' => 'Vestiduras del Génesis', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'vdg01', 'command' => '21355 21353 21354 21356 21357'),
            array('id' => 37, 'name' => 'Teniente Coronel', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'refug01', 'command' => '23294 23295 23280 23281 23308 23309'),
            array('id' => 38, 'name' => 'Señor de la Guerra', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'sg01', 'command' => '16554 16555 16552 16551 16549 16550'),
            array('id' => 39, 'name' => 'Santuario del Campeón', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'santcam01', 'command' => '16494 16496 16504 16502 16503 16501'),
            array('id' => 40, 'name' => 'Atavío de Malorne', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'malornexd', 'command' => '29093 29094 29091 29092 29095'),
            array('id' => 41, 'name' => 'Atavío de Nordrassil', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'atanor', 'command' => '30231 30232 30233 30234 30235'),
            array('id' => 42, 'name' => 'Atavío de Corazón', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'atrona', 'command' => '31043 31035 31040 31046 31049 34572 34446 34555'),
			array('id' => 43, 'name' => 'Renegado', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'rp07', 'command' => '13073 14901 23000 14622 14623 21706 42943'),
            array('id' => 44, 'name' => 'Plaga Elfica', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'lc0725', 'command' => '13955 19378 23000 14622 14620 12903 14621 14541'),
            array('id' => 45, 'name' => 'Super Sexy Female', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'sexal045', 'command' => '11605 10845 34653 34649 34651 8309 6412 23540 23540'),
            array('id' => 46, 'name' => 'Guerrero Verde', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'verde', 'command' => '27520 27847 20579 28262 27459 28390 24458 27527 27813 31062'),
            array('id' => 47, 'name' => 'Armadura de Valor', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'aravala', 'command' => '16731 16733 16730 16735 16737 16736 16732 16734'),
            array('id' => 48, 'name' => 'Vestiduras de Sangre', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'sanganote', 'command' => '30258 32403 10129 32401 32404 11787'),
            array('id' => 49, 'name' => 'Legado Troll', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'trol26063', 'command' => '33327 33481 18510 33473 28643 33517 47195 33501 33191 33388 33332'),
            array('id' => 50, 'name' => 'Cruzado Argenta', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'arga730206', 'command' => '10749 43068 24363 43070 7462 43071 22430 1925 22818'),
            array('id' => 51, 'name' => 'Hostigadora', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'hostigadora', 'command' => '14966 21623 21667 10385'),
            array('id' => 52, 'name' => 'Atracasol', 'description' => '', 'category' => 7, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'atracasol', 'command' => '14946 29975 30375 34651 20639 14978 34699 34699'),
            array('id' => 53, 'name' => 'Oro 25k', 'description' => '', 'category' => 1, 'type' => 2, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'blizzard', 'command' => '250000000'),
            array('id' => 54, 'name' => 'Portal Étereo', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'portaletereo', 'command' => '54452'),
            array('id' => 55, 'name' => 'Bomba de Pintura', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'paintbomb', 'command' => '54455'),
            array('id' => 56, 'name' => 'Pedestal de estatua instantanea', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'instantstatuepedestal', 'command' => '54212'),
            array('id' => 57, 'name' => 'Caja de regalos de Landro', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 2, 'vp' => 0, 'icon' => 'cajaderegalo', 'command' => '54218'),
            array('id' => 58, 'name' => 'Piñata Ogra', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'piñataogra', 'command' => '46780'),
            array('id' => 59, 'name' => 'Senda de Cenarius', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'sendacenarius', 'command' => '46779'),
            array('id' => 60, 'name' => 'Expositor para espadas', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'expositorespadas', 'command' => '45063'),
            array('id' => 61, 'name' => 'La bandera de potestad', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'banderapotestad', 'command' => '38578'),
            array('id' => 62, 'name' => 'G.R.A.N.A.D.A de Fiesta', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'granda', 'command' => '38577'),
			array('id' => 63, 'name' => 'D.I.S.C.O', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'disco', 'command' => '38301'),
            array('id' => 64, 'name' => 'Silla para Pescar', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'sillapesca', 'command' => '33223'),
            array('id' => 65, 'name' => 'Tetera de potaje goblin', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'potajegoblin', 'command' => '33219'),
            array('id' => 67, 'name' => 'Maquina de clima gobling', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'climagoblin', 'command' => '35227'),
            array('id' => 68, 'name' => 'Galleta de mascota', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'galletashummel', 'command' => '35223'),
            array('id' => 69, 'name' => 'Cesta de Merienda', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'cestamerienda', 'command' => '32566'),
            array('id' => 70, 'name' => 'Diablillo en bola', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'diablillo', 'command' => '32542'),
            array('id' => 71, 'name' => 'Juego de máquina voladora', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'avion', 'command' => '34499'),
            array('id' => 72, 'name' => 'Ídolo de Orgro tallado', 'description' => '', 'category' => 8, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'idoloogro', 'command' => '49704'),
            array('id' => 73, 'name' => 'Cometa colmillar', 'description' => '', 'category' => 4, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'cometacolmillar', 'command' => '49287'),
            array('id' => 74, 'name' => 'Cachorro de tigre espectral', 'description' => '', 'category' => 4, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'spectraltigercub', 'command' => '49343'),
            array('id' => 75, 'name' => 'Comerciante etéreo', 'description' => '', 'category' => 4, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'comercianteetereo', 'command' => '38050'),
            array('id' => 76, 'name' => 'Cohete abisal X-51 X-Tremo', 'description' => '', 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'cohetexxtremo', 'command' => '49286'),
            array('id' => 77, 'name' => 'Cometa de dragón', 'description' => '', 'category' => 4, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'cometadragon', 'command' => '34493'),
            array('id' => 78, 'name' => 'Gallina cohete', 'description' => '', 'category' => 4, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'gallinacohete', 'command' => '34492'),
            array('id' => 79, 'name' => 'Tigre espectral', 'description' => '', 'category' => 5, 'type' => 1, 'price_type' => 1, 'dp' => 3, 'vp' => 0, 'icon' => 'tirgrespectral', 'command' => '49283'),
            array('id' => 80, 'name' => 'Talismán de plátano', 'description' => '', 'category' => 4, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'talismadeplatano', 'command' => '32588'),
            array('id' => 81, 'name' => 'Prole de hipogrifo', 'description' => '', 'category' => 4, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'proledehipogrifo', 'command' => '23713'),
            array('id' => 82, 'name' => 'Tabardo de las llamas', 'description' => '', 'category' => 9, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'tabardollamas', 'command' => '23705'),
            array('id' => 83, 'name' => 'Tabardo de resplandor', 'description' => '', 'category' => 9, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'tabardoresplandor', 'command' => '38312'),
			array('id' => 84, 'name' => 'Tabardo de escarcha', 'description' => '', 'category' => 9, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'tabardoescarcha', 'command' => '23709'),
            array('id' => 85, 'name' => 'Tabardo de furia', 'description' => '', 'category' => 9, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'tabardofuria', 'command' => '38313'),
            array('id' => 86, 'name' => 'Tabardo de naturaleza', 'description' => '', 'category' => 9, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'tabardonaturaleza', 'command' => '38309'),
            array('id' => 87, 'name' => 'Tabardo de lo arcano', 'description' => '', 'category' => 9, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'tabardoarcano', 'command' => '38310'),
            array('id' => 88, 'name' => 'Tabardo del defensor', 'description' => '', 'category' => 9, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'tabardodefenzor', 'command' => '38314'),
            array('id' => 89, 'name' => 'Mini Thor', 'description' => 'Transfigurador incluido', 'category' => 6, 'type' => 1, 'price_type' => 1, 'dp' => 3, 'vp' => 0, 'icon' => 'minithor', 'command' => '56806'),
            array('id' => 90, 'name' => 'Dragon Selestial - Buff', 'description' => 'Mascota que otorga buff en dependencia del nivel del jugador', 'category' => 6, 'type' => 1, 'price_type' => 1, 'dp' => 3, 'vp' => 0, 'icon' => 'celestialdragon', 'command' => '54810'),
            array('id' => 91, 'name' => 'Espada del Rey Varian', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 4, 'vp' => 0, 'icon' => 'VarianBlade', 'command' => '45899'),
            array('id' => 92, 'name' => 'Thoridal', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'thoridal', 'command' => '34334'),
            array('id' => 93, 'name' => 'Cercenador de distorsion', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 2, 'vp' => 0, 'icon' => 'cercenadordistorsion', 'command' => '30311'),
            array('id' => 94, 'name' => 'Devastacion', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 4, 'vp' => 0, 'icon' => 'devastation', 'command' => '30316'),
            array('id' => 95, 'name' => 'Bastón de desintegracion', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'bastondesintegracion', 'command' => '30313'),
            array('id' => 96, 'name' => 'Baluarte', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 2, 'vp' => 0, 'icon' => 'baluarte', 'command' => '30314'),
            array('id' => 97, 'name' => 'Arco de fibra abisal', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 2, 'vp' => 0, 'icon' => 'arcolargo', 'command' => '30318'),
            array('id' => 98, 'name' => 'Andonisus', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 2, 'vp' => 0, 'icon' => 'andonisus', 'command' => '22736'),
            array('id' => 99, 'name' => 'Trueno Furioso', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 7, 'vp' => 0, 'icon' => 'thunderfury', 'command' => '19019'),
            array('id' => 100, 'name' => 'Sulfuras', 'description' => '', 'category' => 3, 'type' => 1, 'price_type' => 1, 'dp' => 7, 'vp' => 0, 'icon' => 'sulfuras', 'command' => '17182'),
            array('id' => 101, 'name' => 'Boost level 80', 'description' => '', 'category' => 1, 'type' => 3, 'price_type' => 1, 'dp' => 2, 'vp' => 0, 'icon' => 'level', 'command' => '80'),
            array('id' => 102, 'name' => 'Tier 6 Guerrero Acometida', 'description' => '', 'category' => 10, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'tier6guerrero', 'command' => '30972 30979 30975 34441 30969 34546 30977 34569'),
            array('id' => 103, 'name' => 'Tier 6 Brujo Malefico', 'description' => '', 'category' => 10, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'tier6brujo', 'command' => '31051 31054 31052 34436 31050 34541 31053 34564'),
			array('id' => 104, 'name' => 'Tier 6 Shaman Devastador del Cielo', 'description' => '', 'category' => 10, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'tier6shaman', 'command' => '31015 31024 31018 34439 31011 34545 31021 34567'),
            array('id' => 105, 'name' => 'Tier 6 Picaro Destripador', 'description' => '', 'category' => 10, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'tier6picaro', 'command' => '31027 31030 31028 34448 31026 34558 31029 34575'),
            array('id' => 106, 'name' => 'Tier 6 Sacerdote Absolucion', 'description' => '', 'category' => 10, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'tier6sacerdote', 'command' => '31064 31070 31065 34434 31061 34528 31067 34563'),
            array('id' => 107, 'name' => 'Tier 6 Druida Corazon Atronador', 'description' => '', 'category' => 10, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'tier6druida', 'command' => '31039 31048 31042 34444 31034 34556 31044 34573'),
            array('id' => 108, 'name' => 'Tier 6 Cazador Acechagronns', 'description' => '', 'category' => 10, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'tier6cazador', 'command' => '31003 31006 31004 34443 31001 34549 31005 34570'),
            array('id' => 109, 'name' => 'Tier 6 Mago Tempestad', 'description' => '', 'category' => 10, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'tier6mago', 'command' => '31056 31059 31057 34447 31055 34557 31058 34574'),
            array('id' => 110, 'name' => 'Tier 6 Paladin Iluminado', 'description' => '', 'category' => 10, 'type' => 1, 'price_type' => 1, 'dp' => 5, 'vp' => 0, 'icon' => 'tier6paladin', 'command' => '30987 30998 30991 34433 30985 34488 30995 34560'),
            array('id' => 111, 'name' => 'Market Coins', 'description' => '', 'category' => 1, 'type' => 1, 'price_type' => 1, 'dp' => 1, 'vp' => 0, 'icon' => 'blizzard', 'command' => '57578'),
            array('id' => 112, 'name' => 'Token de Profesion', 'description' => '', 'category' => 1, 'type' => 1, 'price_type' => 1, 'dp' => 10, 'vp' => 0, 'icon' => 'blizzard', 'command' => '57579'),
            array('id' => 113, 'name' => 'Pequeña Filacteria', 'description' => NULL, 'category' => 4, 'type' => 1, 'price_type' => 1, 'dp' => 3, 'vp' => 0, 'icon' => 'pequeñafilacteria', 'command' => '49693')
        );

        $this->db->insert_batch('store_items', $data);
    }

    public function down()
    {
      $this->dbforge->drop_column('store_items', 'description');
      $this->dbforge->drop_column('store_items', 'price_type');

      $this->dbforge->modify_column('store_items', array(
              'dp' => array(
                      'name' => 'price_dp',
                      'type' => 'INT',
                      'constraint' => '10',
                      'unsigned' => TRUE
              ),
              'vp' => array(
                      'name' => 'price_vp',
                      'type' => 'INT',
                      'constraint' => '10',
                      'unsigned' => TRUE
              ),
              'command' => array(
                      'name' => 'qquery',
                      'type' => 'TEXT',
                      'null' => TRUE
              ),
      ));

      $this->dbforge->add_column('store_items', array(
              'itemid' => array(
                      'type' => 'INT',
                      'constraint' => '10',
                      'unsigned' => TRUE,
                      'after' => 'price_vp'
              ),
              'image' => array(
                      'type' => 'VARCHAR',
                      'constraint' => '100',
                      'default' => 'item1.jpg',
                      'after' => 'icon'
              ),
      ));
    }
}
