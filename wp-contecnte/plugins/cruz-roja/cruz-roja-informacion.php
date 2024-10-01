<?php
/*
Plugin Name: Información de Matrices - Cruz Roja Ecuatoriana
Plugin URI: https://www.cruzroja.org
Description: Plugin para mostrar la información de las juntas provinciales de la Cruz Roja Ecuatoriana.
Version: 1.0
Author: Menghy Raul Sanchez
Author URI: github.com.menghysanchez
*/

// Evitar el acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// Registrar los scripts y estilos
function cruz_roja_enqueue_scripts() {
    // Registrar y agregar el archivo de estilos
    wp_enqueue_style('cruz-roja-styles', plugin_dir_url(__FILE__) . 'assets/style.css');
    
    // Registrar y agregar el archivo de JavaScript
    wp_enqueue_script('cruz-roja-script', plugin_dir_url(__FILE__) . 'assets/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'cruz_roja_enqueue_scripts');

// Crear un shortcode para mostrar el contenido
function cruz_roja_shortcode() {
    ob_start();
    ?>
    <section id="cuerpo">
        <h1>Selecciona una Región y Provincia de Ecuador</h1>
        <section class="selectoresRegPro">
            <div>
                <label for="region">Región:</label>
                <select id="region" onchange="updateProvincias()">
                    <option value="">--Selecciona una Región--</option>
                    <option value="sierra">Sierra</option>
                    <option value="costa">Costa</option>
                    <option value="amazonia">Amazonia</option>
                    <option value="regioninsular">Región Insular</option>
                </select>
            </div>
            <div>
                <label for="provincia">Provincia:</label>
                <select id="provincia" onchange="showInfo()">
                    <option value="">--Selecciona una Provincia--</option>
                </select>
            </div>
        </section>

        <!-- Información de las Provincias -->
        <!-- Coloca aquí el contenido HTML que tenías en tu archivo original -->
        <!-- Ejemplo: -->
        <section id="info-sierra">
            <div id="info-sierra-azuay" class="info">
                <section class="tituloProvincial">
                    <h2>Junta Provincial de Azuay</h2>
                </section>
                <article class="groupInfo">
                    <section class="column">
                        <iframe src="https://www.google.com/maps/embed?pb=..." allowfullscreen="" loading="lazy"></iframe>
                    </section>
                    <section class="column textInfo">
                        <p class="tituloInfo"><strong>Correo Electrónico:</strong> Quito, Pichincha</p>
                        <p class="tituloInfo"><strong>Teléfono:</strong> (02) 252-1414</p>
                        <p class="tituloInfo"><strong>Sitio Web:</strong> <a href="https://www.cruzroja.org" target="_blank">www.cruzroja.org</a></p>
                    </section>
                </article>
            </div>
            <div id="info-sierra-bolivar" class="info"></div>
                <section class="tituloProvincial">
                    <h2>Junta Provincial de Bolivar</h2>
                </section>
                <article class="groupInfo">
                    <section class="column">
                        <iframe src="https://www.google.com/maps/embed?pb=..." allowfullscreen="" loading="lazy"></iframe>
                    </section>
                    <section class="column textInfo">
                        <p class="tituloInfo"><strong>Correo Electrónico:</strong> Quito, Pichincha</p>
                        <p class="tituloInfo"><strong>Teléfono:</strong> (02) 252-1414</p>
                        <p class="tituloInfo"><strong>Sitio Web:</strong> <a href="https://www.cruzroja.org" target="_blank">www.cruzroja.org</a></p>
                    </section>
                </article>
            </div>
        </section>
        <!-- Añade el resto de las secciones correspondientes -->
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('cruz_roja_informacion', 'cruz_roja_shortcode');