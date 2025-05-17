<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
    <div class="uk-container uk-card uk-card-body uk-card-default">
        <?php
        // Características del Servidor
        echo "<h1>Bienvenido a Pixie</h1>";
        echo "<h2>Características del Servidor</h2>";
        echo "<ul>";
        echo "<li><strong>Versión:</strong> Wrath of the Lich King 3.3.5a</li>";
        echo "<li><strong>Modo Desafio:</strong> HardCore, SemiHardcore y Ironman</li>";
        echo "<li><strong>Nuevas Razas:</strong> Worgen y Goblin</li>";
        echo "<li><strong>Conetnido adicional:</strong> Armas Artefacto</li>";
        echo "<li><strong>Rate de Experiencia:</strong> x5</li>";
        echo "<li><strong>Rate de Profesion:</strong> x2</li>";
        echo "<li><strong>Rate de Reputación:</strong> x2</li>";
        echo "<li><strong>Rate de Oro:</strong> x2</li>";
        echo "<li><strong>Rate de honor:</strong> x2</li>";
        echo "<li><strong>Contenido PvE y PvP:</strong> 100% funcional</li>";
        echo "<li><strong>Crossfaction</li>";
        echo "<li><strong>Sitema AntiCheat</li>";
        echo "<li><strong>Sitema Vip</li>";
        echo "<li><strong>Launcher (opcional)</li>";
        echo "<li><strong>Soporte Activo:</strong> GM's y soporte técnico disponible 24/7</li>";		
		echo '<strong>Realmlist:</strong> <span style="color: yellow;" id="realmlist">SET realmlist ' . $this->config->item('realmlist') . '</span>
		<button style="background: none; border: none; cursor: pointer;" onclick="copyToClipboard()">';
        echo "</ul>";

        // Agradecimientos
        echo "<h2>Agradecimientos</h2>";
        echo "<p>Desde <strong>Pixie</strong>, queremos expresar nuestro más sincero agradecimiento a dos pilares fundamentales que han hecho posible la creación y el mantenimiento de nuestro servidor:</p>";
        
        echo "<h3>BlizzCMS</h3>";
        echo "<p>Gracias a <strong>BlizzCMS</strong>, contamos con una plataforma web sólida, profesional y completamente adaptada a las necesidades de nuestra comunidad. Este CMS nos permite ofrecer funcionalidades avanzadas como:</p>";
        echo "<ul>";
        echo "<li>Gestión de cuentas y personajes de manera intuitiva</li>";
        echo "<li>Integración con el núcleo del servidor para estadísticas en tiempo real</li>";
        echo "<li>Un diseño moderno y personalizable que mejora la experiencia del usuario</li>";
        echo "</ul>";
        echo "<p>La dedicación y el esfuerzo detrás de BlizzCMS son invaluables, y estamos agradecidos por el acceso a esta poderosa herramienta que eleva nuestro proyecto a un nivel superior.</p>";
        echo "<li><strong>Sitio Web:</strong> <a href='https://wow-cms.com/' target='_blank' style='color: yellow;'>BlizzCMS</a></li>";
       
	   echo "<h3>AzerothCore</h3>";
        echo "<p>En cuanto al núcleo de nuestro servidor, <strong>AzerothCore</strong> es el alma que hace posible nuestra existencia. Su equipo ha logrado un desarrollo continuo y de alta calidad, garantizando:</p>";
        echo "<ul>";
        echo "<li>Un núcleo estable y bien optimizado</li>";
        echo "<li>Soporte para contenido PvE y PvP completamente funcional</li>";
        echo "<li>Actualizaciones constantes que mantienen el juego fiel a la experiencia clásica de Wrath of the Lich King</li>";
        echo "</ul>";
        echo "<p>AzerothCore nos brinda la base técnica que necesitamos para ofrecer un servidor que no solo es funcional, sino también emocionante y nostálgico para los amantes de World of Warcraft.</p>";        
        echo "<li><strong>Sitio Web:</strong> <a href='https://www.azerothcore.org/' target='_blank' style='color: yellow;'>AzerothCore</a></li>";
        echo "<h3>A la Comunidad</h3>";
		
        echo "<p>No podemos dejar de mencionar a nuestra comunidad, que es el motor de este proyecto. Sin ustedes, los jugadores y entusiastas que participan activamente, Pixie no sería más que un sueño. Su apoyo constante nos motiva a seguir mejorando día a día.</p>";
        echo "<p>Además, queremos agradecer a los desarrolladores independientes, moderadores y miembros del staff que contribuyen con ideas, tiempo y habilidades para hacer que este proyecto siga creciendo.</p>";
		
        // Motivos para Elegir Pixie
        echo "<h2>¿Por qué Elegirnos?</h2>";
        echo "<ul>";
        echo "<li>Un servidor equilibrado y libre de Pay-to-Win</li>";
        echo "<li>Eventos únicos y una comunidad activa</li>";
        echo "<li>Excelente optimización para jugadores de todas las regiones</li>";
        echo "<li>Actualizaciones frecuentes y atención constante</li>";
        echo "</ul>";

                // Pequeña Historia sobre Azeroth
        echo "<h2>Historia de Azeroth</h2>";
        echo "<p>En lo profundo del vasto universo, existe un mundo lleno de maravillas, peligros y misterios: Azeroth. Desde las majestuosas montañas de Dun Morogh hasta las arenas ardientes de Tanaris, Azeroth es un lugar donde las historias épicas cobran vida, y los héroes encuentran su destino.</p>";
        
        echo "<h3>Los Primeros Días</h3>";
        echo "<p>Azeroth fue moldeado por los Titanes, quienes dejaron su huella en el mundo creando los Dragones Aspectos y protegiendo su orden. Sin embargo, la llegada de los Dioses Antiguos trajo caos y corrupción, dejando cicatrices que perduran hasta el día de hoy. Las civilizaciones nacieron, cayeron y resurgieron mientras las razas de Azeroth luchaban por la supervivencia.</p>";
        
        echo "<h3>Las Guerras Eternas</h3>";
        echo "<p>El mundo ha sido testigo de conflictos que definieron su destino. Desde la Primera Guerra, que enfrentó a los Humanos de Ventormenta contra la Horda de los Orcos, hasta las batallas contra la Plaga del Rey Exánime en el helado continente de Rasganorte, Azeroth ha sido un campo de batalla donde el coraje y la desesperación se entrelazan.</p>";
        echo "<p>Pero no solo las guerras entre mortales han marcado este mundo. Las invasiones demoníacas de la Legión Ardiente dejaron cicatrices imborrables, uniendo a facciones opuestas en una lucha desesperada por preservar la vida misma.</p>";
        
        echo "<h3>Un Mundo de Leyendas</h3>";
        echo "<p>Más allá de los conflictos, Azeroth es un lugar de mitos y maravillas. En sus vastas tierras y mares, se encuentran lugares como las ruinas de Ulduar, donde los Titanes vigilan desde tiempos inmemoriales, y la Ciudad Perdida de Zul'Gurub, hogar de antiguos poderes troll. Cada rincón de Azeroth guarda secretos esperando ser descubiertos por aquellos lo suficientemente valientes como para buscarlos.</p>";
        
        echo "<h3>Tu Historia</h3>";
        echo "<p>Ahora, el destino de Azeroth está en tus manos. Como héroe de <strong>Pixie</strong>, puedes ser parte de esta rica historia. ¿Serás el paladín que defenderá la justicia? ¿El pícaro que actuará desde las sombras? ¿O el mago que desatará su poder para cambiar el curso de la historia?</p>";
        echo "<p>Únete a millones de aventureros y escribe tu capítulo en este épico mundo. Azeroth te espera.</p>";

        // Información sobre la Comunidad
        echo "<h2>Sobre la Comunidad</h2>";
        echo "<p>En Pixie, valoramos la unión y el compañerismo. Nuestra comunidad está formada por jugadores de todo el mundo, compartiendo aventuras y creando recuerdos inolvidables. Únete a nuestras guilds, participa en eventos y haz amigos para toda la vida.</p>";

        // Medios de Contacto
        echo "<h2>Medios de Contacto</h2>";
        echo "<ul>";
        echo "<li><strong>Facebook:</strong> <a href='https://www.facebook.com/pixie' target='_blank' style='color: yellow;'>Pixie</a></li>";
        echo "<li><strong>Discord:</strong> <a href='https://discord.gg/RDfQ8HG3' target='_blank' style='color: yellow;'>Únete a nuestro Discord</a></li>";
        echo "<li><strong>Email:</strong> jorgeluisramirezlorenzo@gmail.com</li>";
        echo "</ul>";        
        ?>
    </div>
</section>
