<section class="uk-section slider-section">
    <div class="Art-image" style="background-image:url('<?= $template['location'].'assets/images/background.png'; ?>');"></div>
</div>
<div class="ImagePanel-content">
    <div class="gutter-normal gutter-negative" media-wide="hide">
        <div class="Art Art--fadeBottom" style="margin-bottom:-52.5%;">
            <div class="Art-size" style="padding-top:90%"></div>
        </div>
    </div>
    <div class="hide" media-wide="!hide">
    </div>
    <img src="/application/themes/olympus/assets/images/pixie.png" style="width: 300px; height: 200px;">
    <div class="align-left">
        <div media-small="gutter-vertical" media-large="!gutter-vertical">
            <div class="align-center" media-wide="!align-center">
                <h1 class="font-semp-small-white text-upper">Wrath of The Lich King</h1>
                <div class="contain-masthead" media-wide="contain-left">
                    <div class="space-rhythm-medium"></div>
                    <p class="margin-none font-bliz-light-small-beige">
                        Prepárate para desafiar los gélidos páramos de Rasganorte y enfrentar el poder del Rey Exánime. Únete a la lucha de la Horda y la Alianza contra el azote de los no-muertos, explora antiguas ruinas y fortalezas olvidadas, y descubre los oscuros secretos de la Plaga. ¿Serás capaz de resistir el llamado del Trono Helado?
                    </p>
                    <div class="space-rhythm-medium"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ImagePanel-content">
    <div class="gutter-normal gutter-negative" media-wide="hide">
        <div class="Art Art--fadeBottom" style="margin-bottom:-52.5%;">
            <div class="Art-size" style="padding-top:90%"></div>
        </div>
    </div>
    <div class="hide" media-wide="!hide">
    </div>
    <div class="align-left">
        <div media-small="gutter-vertical" media-large="!gutter-vertical">
            <div class="align-center" media-wide="!align-center">
                <div class="contain-masthead" media-wide="contain-left">
                    <div class="space-rhythm-medium"></div>
                    <p class="margin-none font-bliz-light-small-beige">
                    </p>
                </div>
                <?php if ($this->wowmodule->getStatusModule('News')): ?>
    <div class="List List--gutters">
        <div class="List-item font-semp-small-white text-upper">Últimas noticias y actualizaciones</div>
        <a href="<?= base_url('noticias'); ?>" style="font-weight:bold; color:#ead20c;">Ver todas las noticias</a>
    </div>

    <div class="Grid" style="display: flex; flex-wrap: wrap; gap: 40px; justify-content: center; margin-bottom: 40px;">
        <?php foreach ($NewsList as $news): ?>
            <div class="news-card">
                <a href="<?= base_url('news/' . $news->id); ?>" style="text-decoration: none; display: block;">
                    <div class="news-image" style="background-image: url('<?= base_url('assets/images/news/' . $news->image); ?>');"></div>
                    <div class="news-content">
                        <h3><?= $news->title ?></h3>
						<p class="news-date"><i class="far fa-clock"></i> <?= date('F j, Y, h:i a', $news->date); ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>    
<?php endif; ?>
</div>
<div class="page-Guide-section position-relative">
    <div class="Divider"></div>
    <div class="Panel Panel--small Panel--alignCenter bordered Panel--stacked Panel--normal" media-wide="hide">
        <div class="Panel-bg" data-background-image="<?= $template['location'].'assets/images/proximamente-small.jpg'; ?>"></div>
        <div class="Panel-area SyncHeight-item">
            <div class="Panel-box">
                <div class="Panel-content">
                    <h3 class="Panel-subtitle"><span>Información</span></h3>
                    <h2 class="Panel-title">Detalles de la comunidad y servidor</h2>
                    <div class="Content Content--onDark Panel-desc">¡Ponte al día con la infromación del servidor y la comunidad de Pixie!</div>
                    <div class="Panel-buttons">
                        <a class="Link Button Button--ghost Panel-button" href="<?= base_url('/informacion'); ?>">
                            <div class="Button-outer">
                                <div class="Button-inner">
                                    <div class="Button-label">Mas Información</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Panel bordered hide Panel--normal Panel--stretched Panel--left Panel--alignLeft Panel--overflowing" media-wide="!hide" media-huge="!Panel--stretched">
        <div class="Panel-bg" data-background-image="<?= $template['location'].'assets/images/proximamente.jpg'; ?>">
            <div class="Panel-fg"></div>
        </div>
        <div class="Panel-area SyncHeight-item">
            <div class="Panel-box">
                <div class="Panel-content">
                    <h3 class="Panel-subtitle"><span>Información</span></h3>
                    <h2 class="Panel-title">Detalles de la comunidad y servidor</h2>
                    <div class="Content Content--onDark Panel-desc">¡Ponte al día con la infromación del servidor y la comunidad de Pixie!</div>
                    <div class="Panel-buttons">
                        <a class="Link Button Button--ghost Panel-button" href="<?= base_url('/informacion'); ?>">
                            <div class="Button-outer">
                                <div class="Button-inner">
                                    <div class="Button-label">Mas Información</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-Guide-section1of2" data-test-id="e6d0c3c0384ce73be5fe66a58e23f9ec">
    <div class="Divider"></div>
    <div class="Grid Separator SyncHeight" media-small="Separator--vertical" media-wide="!Separator--vertical">
        <div class="Grid-col" media-wide="Grid-1of2">
            <a class="Link Link--block Panel Panel--link Panel--small Panel--alignCenter bordered Panel--stacked Panel--tiny" media-wide="hide">
                <div class="Panel-bg" data-background-image="<?= $template['location'].'assets/images/cata-small.jpg'; ?>"></div>
                <div class="Panel-area SyncHeight-item">
                    <div class="Panel-box">
                        <div class="Panel-content">
                            <h3 class="Panel-subtitle">Nuevo en World of Warcraft</h3>
                            <h2 class="Panel-title">Comienza tu Aventura</h2>
                            <div class="Content Content--onDark Panel-desc">
                                <span>¡Comienza tu viaje en el mejor servidor privado de World of Warcraft - Wrath of The Lich King!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="Link Link--block Panel Panel--link bordered hide Panel--tiny Panel--stacked Panel--stretched Panel--alignCenter Panel--overflowing" media-wide="!hide" media-huge="!Panel--stretched">
                <div class="Panel-bg" data-background-image="<?= $template['location'].'assets/images/cata-fondo.jpg'; ?>">
                    <div class="Panel-fg">
                        <div class="Position" style="width:100%;height:calc(100% + 29px);top:-29px;right:0%;bottom:0%;left:0%;">
                            <div class="Art Art--fitToHeight">
                                <div class="Art-size" style="padding-top:33.67%;"></div>
                                <div class="Art-image" style="background-image:url(<?= $template['location'].'assets/images/cata-personajes.png'; ?>);"></div>
                                <div class="Art-overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Panel-area SyncHeight-item">
                    <div class="Panel-box">
                        <div class="Panel-content">
                            <h3 class="Panel-subtitle">Nuevo en World of Warcraft</h3>
                            <h2 class="Panel-title">Comienza tu Aventura</h2>
                            <div class="Content Content--onDark Panel-desc">¡Comienza tu viaje en el mejor servidor privado de World of Warcraft - Wrath of The Lich King!</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="Grid-col" media-wide="Grid-1of2">
            <a class="Link Link--block Panel Panel--link Panel--small Panel--alignCenter bordered Panel--stacked Panel--tiny" media-wide="hide">
                <div class="Panel-bg" data-background-image="<?= $template['location'].'assets/images/parches-small.jpg'; ?>"></div>
                <div class="Panel-area SyncHeight-item">
                    <div class="Panel-box">
                        <div class="Panel-content">
                            <h3 class="Panel-subtitle">Jugadores que regresan</h3>
                            <h2 class="Panel-title">Bienvenido de nuevo al Servidor <?= $this->config->item('website_name'); ?></h2>
                            <div class="Content Content--onDark Panel-desc">Aprende cómo volver al juego y reproducir el contenido más reciente en <?= $this->config->item('website_name'); ?>.</div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="Link Link--block Panel Panel--link bordered hide Panel--tiny Panel--stacked Panel--stretched Panel--alignCenter Panel--overflowing" media-wide="!hide" media-huge="!Panel--stretched">
                <div class="Panel-bg" data-background-image="<?= $template['location'].'assets/images/parches-fondo.jpg'; ?>">
                    <div class="Panel-fg">
                        <div class="Position" style="width:100%;height:calc(100% + 50px);top:-50px;right:0%;bottom:0%;left:0%;">
                            <div class="Art Art--fitToHeight">
                                <div class="Art-size" style="padding-top:35.42%;"></div>
                                <div class="Art-image" style="background-image:url(<?= $template['location'].'assets/images/parches.png'; ?>);"></div>
                                <div class="Art-overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Panel-area SyncHeight-item">
                    <div class="Panel-box">
                        <div class="Panel-content">
                            <h3 class="Panel-subtitle">Jugadores que regresan</h3>
                            <h2 class="Panel-title">Bienvenido de nuevo al Servidor <?= $this->config->item('website_name'); ?></h2>
                            <div class="Content Content--onDark Panel-desc">Aprende cómo volver al juego y reproducir el contenido más reciente en <?= $this->config->item('website_name'); ?>.</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="page-Guide-section position-relative">
    <div class="Divider"></div>
    <div class="Panel Panel--small Panel--alignCenter bordered Panel--stacked Panel--tiny" media-wide="hide">
        <div class="Panel-bg" data-background-image="<?= $template['location'].'assets/images/cross-small.jpg'; ?>"></div>
        <div class="Panel-area SyncHeight-item">
            <div class="Panel-box">
                <div class="Panel-content">
                    <h3 class="Panel-subtitle">Infromación</h3>
					<h2 class="Panel-title">Modo Desafio en Pixie</h2>
                    <div class="Content Content--onDark Panel-desc">Nuevas modalidades, nueva experiencia, mayor diversion y disfrute</div>
                    <div class="Panel-buttons">
                        <button class="Link Button Button--ghost Panel-button">
                            <div class="Button-outer">
                                <div class="Button-inner">
                                    <a href="<?= base_url('/challenger'); ?>">
                                        <div class="Button-label" data-text="Watch Now">Información</div>
                                    </a>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Panel bordered hide Panel--tiny Panel--stretched Panel--right Panel--alignRight Panel--overflowing" media-wide="!hide" media-huge="!Panel--stretched">
        <div class="Panel-bg" data-background-image="<?= $template['location'].'assets/images/cross.png'; ?>">
            <div class="Panel-fg"></div>
        </div>
        <div class="Panel-area SyncHeight-item">
            <div class="Panel-box">
                <div class="Panel-content">
                    <h3 class="Panel-subtitle">Próximamente</h3>
					<h2 class="Panel-title">Modo Desafio en Pixie</h2>
                    <div class="Content Content--onDark Panel-desc">Nuevas modalidades, nueva experiencia, mayor diversion y disfrute</div>
                    <button class="Link Button Button--ghost Panel-button">
                        <div class="Button-outer">
                            <div class="Button-inner">
                                <a href="<?= base_url('/challenger'); ?>">
                                    <div class="Button-label" data-text="Watch Now">Información</div>
                                </a>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-Guide-section1of2">
    <div class="Divider"></div>
    <div class="Grid Separator SyncHeight" media-small="Separator--vertical" media-wide="!Separator--vertical">
        <div class="Grid-col" media-wide="Grid-1of2">
            <a class="Link Link--block Panel Panel--link Panel--small Panel--alignCenter bordered Panel--stacked Panel--tiny" href="/store" media-wide="hide">
                <div class="Panel-bg" data-background-image="<?= $template['location'].'assets/images/tienda.jpg'; ?>"></div>
                <div class="Panel-area SyncHeight-item">
                    <div class="Panel-box">
                        <div class="Panel-content">
                            <h3 class="Panel-subtitle">Visita la tienda</h3>
                            <h2 class="Panel-title">¡Nuevos artículos de la tienda!</h2>
                        </div>
                    </div>
                </div>
            </a>
            <a class="Link Link--block Panel Panel--link bordered hide Panel--tiny Panel--stacked Panel--stretched Panel--alignCenter Panel--overflowing" href="/store" media-wide="!hide" media-huge="!Panel--stretched">
                <div class="Panel-bg" data-background-image="<?= $template['location'].'assets/images/tienda.jpg'; ?>">
                    <div class="Panel-fg"></div>
                </div>
                <div class="Panel-area SyncHeight-item">
                    <div class="Panel-box">
                        <div class="Panel-content">
                            <h3 class="Panel-subtitle">Visita la tienda</h3>
                            <h2 class="Panel-title">¡Nuevos artículos de la tienda!</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="Grid-col" media-wide="Grid-1of2">
            <a class="Link Link--block Panel Panel--link Panel--small Panel--alignCenter bordered Panel--stacked Panel--tiny" href="razas" media-wide="hide">
                <div class="Panel-bg" data-background-image="<?= $template['location'].'assets/images/launcher.jpg'; ?>"></div>
                <div class="Panel-area SyncHeight-item">
                    <div class="Panel-box">
                        <div class="Panel-content">
                            <h3 class="Panel-subtitle">Nuevas Razas</h3>
                            <h2 class="Panel-title">Worgen y Goblin se unen a las batallas por Azeroth</h2>
                        </div>
                    </div>
                </div>
            </a>
            <a class="Link Link--block Panel Panel--link bordered hide Panel--tiny Panel--stacked Panel--stretched Panel--alignCenter Panel--overflowing" href="razas" media-wide="!hide" media-huge="!Panel--stretched">
                <div class="Panel-bg" data-background-image="<?= $template['location'].'assets/images/launcher.jpg'; ?>">
                    <div class="Panel-fg"></div>
                </div>
                <div class="Panel-area SyncHeight-item">
                    <div class="Panel-box">
                        <div class="Panel-content">
                            <h3 class="Panel-subtitle">Nuevas Razas</h3>
                            <h2 class="Panel-title">Worgen y Goblin se unen a las batallas por Azeroth</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>								