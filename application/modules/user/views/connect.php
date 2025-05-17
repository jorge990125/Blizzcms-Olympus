<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
    <div class="uk-container uk-card uk-card-body uk-card-default">
        <h2 style="text-align: center;">Guía de Conexión al Servidor - Pixie-Project)</h2>
        
        <h3>Paso 1: Descarga el Cliente de WotLK</h3>
        <p>Para jugar en un servidor privado de la versión <strong>Wrath of the Lich King (3.3.5a)</strong>, necesitas el cliente adecuado. Puedes descargarlo desde la página oficial del servidor o desde un enlace recomendado por la comunidad.</p>
        <p>Asegúrate de que el cliente sea la versión 3.3.5a (12340), ya que es la más comúnmente utilizada en servidores privados.</p>
        <p style="text-align: center;"><a href="https://drive.google.com/file/d/19NiKRcZR__FS99GJkRc0MgGwVS8AH-Yr/view" class="uk-button uk-button-primary" target="_blank">Descargar Cliente WotLK</a></p>
        
        <h3>Paso 2: Configura el Archivo realmlist.wtf</h3>
        <p>Una vez descargado el cliente, accede a la carpeta <strong>World of Warcraft\Data\esMX</strong> (dependiendo del idioma de su cliente) dentro del directorio de instalación del juego. Luego, abre el archivo <strong>realmlist.wtf</strong> con un editor de texto (como el Bloc de notas).</p>
        <p>Reemplaza su contenido con la siguiente línea:</p>
        <div class="code-container">
  <pre><code id="realmlist" class="code-bar">set realmlist <?= $this->config->item('realmlist'); ?></code></pre>
  <button onclick="copyToClipboard()" class="copy-btn">
    📋
  </button>
</div>

<div id="notification" class="notification">realmlist copiado al portapapeles!</div>
<script>
  function copyToClipboard() {
    var text = document.getElementById('realmlist').innerText;
    navigator.clipboard.writeText(text).then(function() {
      var notification = document.getElementById('notification');
      notification.style.display = 'block'; // Mostrar notificación
      setTimeout(function() {
        notification.style.display = 'none'; // Ocultar notificación después de 2 segundos
      }, 2000);
    });
  }
</script>
        <p>Guarda los cambios y cierra el archivo.</p>
        
        <h3>Paso 3: Crea una Cuenta en el Servidor</h3>
        <p>Para poder jugar, necesitas una cuenta en el servidor privado. Visita su sitio web y regístrate proporcionando un nombre de usuario, dirección de correo electrónico y contraseña.</p>
        <p>Algunos servidores pueden requerir verificación por correo electrónico antes de que puedas iniciar sesión.</p>
        <p style="text-align: center;"><a href="/register" class="uk-button uk-button-primary" target="_blank">Crear una cuenta</a></p>        
		
        <h3>Paso 4: Parche custom</h3>
        <p>Elimine cualquier parche custom que tenga en su cliente de juego, de lo contrario no podra agregar el parche de actulizacion necesario para Pixie-WoW.</p>
		<h3>Archivos a dejar en la carpeta data</h3>
		<p>🔹 Carpeta de idioma (esES,esMX,enEN,enUS..demás idiomas).</p>
		<p>🔹 common.mpq</p>
		<p>🔹 common-2.mpq</p>
		<p>🔹 expansion.mpq</p>
		<p>🔹 lichking.mpq</p>
		<p>🔹 patch.mpq</p>
		<p>🔹 patch-2.mpq</p>
		<p>🔹 patch-3.mpq</p>
        <p>Una vez descargado el Parche y descomprimido, accede a la carpeta <strong>World of Warcraft\Data</strong> dentro del directorio de instalación del juego. Luego, copie el parche descargado dentro de la carpeta Data.</p>		
        <p>Debera de descargar el wow.exe que brindaso y copiarlo en su directorio del cliente y es sumamente necesario que lo ejecute mediante ese ejecutable, ya que evita crasheos, perdidas visuales en iconos o items. Al igual que el parche debera descomprimirlo.</p>
		<p>Descargar Parche de Actulización necesaria para poder jugar en Pixie</p>
		<p style="text-align: center;"><a href="https://drive.google.com/file/d/1Vypdod56HM5k3ZtbhYTEISgrd9Jdc3lV/view?usp=drive_link" class="uk-button uk-button-primary" target="_blank">Descargar parche en español</a></p>
		<p style="text-align: center;"><a href="https://drive.google.com/file/d/1b_xEoPPrAKzI4Be0WNDsDYG42jaruupN/view?usp=sharing" class="uk-button uk-button-primary" target="_blank">Descargar parche en ingles</a></p>
		<p style="text-align: center;"><a href="https://drive.google.com/file/d/1PMdVkh-ybeAkFGRtwDReLbdMHdGt3H3Q/view?usp=sharing" class="uk-button uk-button-primary" target="_blank">Descargar wow.exe</a></p>
        
		<p>Extractores en caso de ser necesario</p>
		<p style="text-align: center;"><a href="https://winrar.es/descargas/rar" class="uk-button uk-button-primary" target="_blank">WinRar</a></p>
        <p style="text-align: center;"><a href="https://www.7-zip.org/download.html" class="uk-button uk-button-primary" target="_blank">7zip</a></p>
        
        <h3>Paso 5: Inicia el Juego Correctamente</h3>
        <p>Para jugar, <strong>NO</strong> abras el juego usando el launcher de Blizzard (<strong>Launcher.exe</strong>), ya que esto puede sobrescribir tu configuración.</p>
        <p>En su lugar, abre el juego usando el archivo <strong>WoW.exe</strong> en la carpeta de instalación.</p>
        <p>Introduce tu nombre de usuario y contraseña en la pantalla de inicio de sesión. <strong>No uses tu correo electrónico</strong>, ya que en servidores privados generalmente se utiliza el nombre de usuario para iniciar sesión.</p>
        
        <h3>Paso 6: Solución de Problemas</h3>
        <ul>
            <li><strong>Problema: No puedo conectarme al servidor.</strong><br> Solución: Asegúrate de que el realmlist.wtf esté configurado correctamente y que el servidor esté en línea.</li>
            <li><strong>Problema: El juego se cierra inesperadamente.</strong><br> Solución: Ejecuta el juego como administrador y verifica que tu sistema cumpla con los requisitos mínimos.</li>
            <li><strong>Problema: Alta latencia o desconexiones frecuentes.</strong><br> Solución: Cierra otros programas que consuman ancho de banda y revisa tu conexión a Internet.</li>
        </ul>
        
        <h3>Paso 7: ¡Disfruta tu Aventura en Pixie-Project!</h3>
        <p>Ahora estás listo para disfrutar de <strong>Wrath of the Lich King</strong>. Explora los reinos de Azeroth, enfrenta los disferentes retos que encuentres en tu camino y únete a la comunidad del servidor.</p>
        <p>¡Nos vemos en Azeroth!</p>
    </div>
</section>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Fuente moderna */
  }

  .code-container {
    display: flex;
    align-items: center;
    background-color: #424242; /* Gris oscuro */
    padding: 8px;
    border-radius: 8px;
    width: fit-content;
  }

  .copy-btn {
    background-color: #5c6bc0;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 6px 10px;
    font-size: 16px;
    cursor: pointer;
    margin-left: 10px;
    transition: background-color 0.3s;
  }

  .copy-btn:hover {
    background-color: #3f51b5;
  }

  .code-container pre {
    margin: 0;
    font-size: 14px;
    background-color: #616161; /* Gris medio */
    border-radius: 5px;
    padding: 5px 10px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: yellow; /* Texto amarillo */
  }

  .notification {
    display: none;
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border-radius: 5px;
    margin-top: 10px;
    text-align: center;
  }
</style>