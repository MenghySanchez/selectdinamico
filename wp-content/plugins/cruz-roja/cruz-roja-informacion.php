<?php
/*
Plugin Name: Información de direcciones - Cruz Roja Ecuatoriana
Plugin URI: https://www.cruzroja.org
Description: Plugin para mostrar la información de las juntas provinciales de la Cruz Roja Ecuatoriana.
Version: 1.0
Author: Menghy Raúl Sánchez
Author URI: github.com.menghysanchez
*/

if (!defined('ABSPATH')) {
    exit;
}

function cruz_roja_enqueue_scripts() {
    wp_enqueue_style('cruz-roja-styles', plugin_dir_url(__FILE__) . 'assets/style.css');
    wp_enqueue_script('cruz-roja-script', plugin_dir_url(__FILE__) . 'assets/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'cruz_roja_enqueue_scripts');

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
                    <table width="100%">
                        <tr>
                          <td rowspan="2" valign="middle" align="left">
                            <img class="iconEmail" src="./assets/icons/envelope.svg"/>
                          </td>
                          <td> <span class="tituloInfo">Correo Electrónico</span></td>
                        </tr>
                        <tr>
                          <td colspan="2">voluntariado@cruzrojaazuay.org</td>
                        </tr>
                        <tr>
                          <td rowspan="2" valign="middle" align="left">
                            <img class="iconPhone" src="./assets/icons/phone-solid.svg"/>
                          </td>
                          <td> <span class="tituloInfo">Teléfono</span></td>
                        </tr>
                        <tr>
                          <td colspan="2">(07) 2889-048</td>
                        </tr>
                        <tr>
                          <td rowspan="2" valign="middle" align="left">
                            <img class="iconWeb" src="./assets/icons/laptop-solid.svg"/>
                          </td>
                          <td> <span class="tituloInfo">Sitio Web</span></td>                        </tr>
                        <tr>
                          <td colspan="2">www.cruzrojazuay.org</td>
                        </tr>
                      </table>
                    <
                </section>
            </article>
        </div>
    </section>

    <!-- Información de las Provincias -->
    <!-- Coloca aquí el contenido HTML que tenías en tu archivo original -->
    <!-- Ejemplo: -->
    <section id="info-sierra">
        <div id="info-sierra-bolivar" class="info">
        <section class="tituloProvincial">
            <h2>Junta Provincial de Bolivar</h2>
        </section>
        <article class="groupInfo">
            <section class="column">
                <iframe
                    src="https://www.google.com/maps?ll=-1.591023,-79.00472&z=16&t=m&hl=es&gl=EC&mapclient=embed&cid=5474788203735126299"
                    allowfullscreen="" loading="lazy"></iframe>
            </section>
            <section class="column textInfo">
                <p class="tituloInfo"><strong>Teléfono:</strong> (03) 2980-107</p>
            </section>
        </article>
        </div>
    </section>

    <!-- Información de las Provincias -->
    <!-- Coloca aquí el contenido HTML que tenías en tu archivo original -->
    <!-- Ejemplo: -->
    <section id="info-sierra">
        <div id="info-sierra-cañar" class="info">
        <section class="tituloProvincial">
            <h2>Junta Provincial de Cañar</h2>
        </section>
        <article class="groupInfo">
            <section class="column">
                <iframe
                    src="https://www.google.com/maps?ll=-2.899679,-79.003453&z=16&t=m&hl=es&gl=EC&mapclient=embed&cid=8355140686915644641"
                    allowfullscreen="" loading="lazy"></iframe>
            </section>
            <section class="column textInfo">
                <p class="tituloInfo"><strong>Teléfono:</strong>(07) 224-0382</p>
            </section>
        </article>
        </div>
    </section>

    <!-- Información de las Provincias -->
    <!-- Coloca aquí el contenido HTML que tenías en tu archivo original -->
    <!-- Ejemplo: -->
    <section id="info-sierra">
        <div id="info-sierra-carchi" class="info">
        <section class="tituloProvincial">
            <h2>Junta Provincial de Carchi</h2>
        </section>
        <article class="groupInfo">
            <section class="column">
                <iframe
                    src="https://www.google.com/maps?ll=0.814452,-77.714743&z=16&t=m&hl=es&gl=EC&mapclient=embed&cid=10003862796834890939"
                    allowfullscreen="" loading="lazy"></iframe>
            </section>
            <section class="column textInfo">
                <p class="tituloInfo"><strong>Teléfono:</strong> (06) 2980-100</p>
            </section>
        </article>
        </div>
    </section>

    <!-- Información de las Provincias -->
    <!-- Coloca aquí el contenido HTML que tenías en tu archivo original -->
    <!-- Ejemplo: -->
    <section id="info-sierra">
        <div id="info-sierra-cotopaxi" class="info">
        <section class="tituloProvincial">
            <h2>Junta Provincial de Cotopaxi</h2>
        </section>
        <article class="groupInfo">
            <section class="column">
                <iframe
                    src="https://www.google.com/maps?ll=-0.936329,-78.617161&z=8&t=m&hl=es&gl=EC&mapclient=embed&cid=11624739268233492809"
                    allowfullscreen="" loading="lazy"></iframe>
            </section>
            <section class="column textInfo">
                <p class="tituloInfo"><strong>Teléfono:</strong> (03) 2812-220</p>
            </section>
        </article>
        </div>
    </section>

    <!-- Información de las Provincias -->
    <!-- Coloca aquí el contenido HTML que tenías en tu archivo original -->
    <!-- Ejemplo: -->
    <section id="info-sierra">
        <div id="info-sierra-chimborazo" class="info">
        <section class="tituloProvincial">
            <h2>Junta Provincial de Chimborazo</h2>
        </section>
        <article class="groupInfo">
            <section class="column">
                <iframe
                    src="https://www.google.com/maps?ll=-1.670115,-78.651597&z=16&t=m&hl=es&gl=EC&mapclient=embed&cid=14667927293359504870"
                    allowfullscreen="" loading="lazy"></iframe>
            </section>
            <section class="column textInfo">
                <p class="tituloInfo"><strong>Teléfono:</strong> (03) 2969-687</p>
            </section>
        </article>
        </div>
    </section>

    <!-- Información de las Provincias -->
    <!-- Coloca aquí el contenido HTML que tenías en tu archivo original -->
    <!-- Ejemplo: -->
    <section id="info-sierra">
        <div id="info-sierra-imbabura" class="info">
        <section class="tituloProvincial">
            <h2>Junta Provincial de Imbabura</h2>
        </section>
        <article class="groupInfo">
            <section class="column-map">
                <iframe
                    src="https://www.google.com/maps?ll=0.348191,-78.121094&z=16&t=m&hl=es&gl=EC&mapclient=embed&cid=4532845579914894107"
                    allowfullscreen="" loading="lazy"></iframe>
            </section>
            <section class="column textInfo">
                <p class="tituloInfo"><strong>Correo Electrónico:</strong> ticsimbabura@cruzroja.org.ec</p>
                <p class="tituloInfo"><strong>Teléfono:</strong> (06) 2950-888 </p>
            </section>
        </article>
        </div>
    </section>

    <!-- Información de las Provincias -->
    <!-- Coloca aquí el contenido HTML que tenías en tu archivo original -->
    <!-- Ejemplo: -->
    <section id="info-sierra">
        <div id="info-sierra-loja" class="info">
        <section class="tituloProvincial">
            <h2>Junta Provincial de Loja</h2>
        </section>
        <article class="groupInfo">
            <section class="column">
                <iframe
                    src="https://www.google.com/maps?ll=-3.993864,-79.205205&z=16&t=m&hl=es&gl=EC&mapclient=embed&cid=16021093504184950085"
                    allowfullscreen="" loading="lazy"></iframe>
            </section>
            <section class="column textInfo">

                <p class="tituloInfo"><strong>Teléfono:</strong> (07)2570-200</p>

            </section>
        </article>
        </div>
    </section>

    <!-- Información de las Provincias -->
    <!-- Coloca aquí el contenido HTML que tenías en tu archivo original -->
    <!-- Ejemplo: -->
    <section id="info-sierra">
        <div id="info-sierra-pichincha" class="info">
        <section class="tituloProvincial">
            <h2>Junta Provincial de Pichincha</h2>
        </section>
        <article class="groupInfo">
            <section class="column">
                <iframe
                    src="https://www.google.com/maps?ll=-0.199165,-78.484039&z=15&t=m&hl=es&gl=EC&mapclient=embed&cid=11135364172254104652"
                    allowfullscreen="" loading="lazy"></iframe>
            </section>
            <section class="column textInfo">
                <p class="tituloInfo"><strong>Correo Electrónico:</strong> info@cruzrojapichincha.org </p>
                <p class="tituloInfo"><strong>Teléfono:</strong> 02-2902834 </p>

            </section>
        </article>
        </div>
    </section>

    <!-- Información de las Provincias -->
    <!-- Coloca aquí el contenido HTML que tenías en tu archivo original -->
    <!-- Ejemplo: -->
    <section id="info-sierra">
        <div id="info-sierra-tumgurahua" class="info">
        <section class="tituloProvincial">
            <h2>Junta Provincial de Tungurahua</h2>
        </section>
        <article class="groupInfo">
            <section class="column">
                <iframe
                    src="https://www.google.com/maps?ll=-1.24486,-78.627119&z=17&t=m&hl=es&gl=EC&mapclient=embed&cid=2459027838636103411"
                    allowfullscreen="" loading="lazy"></iframe>
            </section>
            <section class="column textInfo">
                <p class="tituloInfo"><strong>Correo Electrónico:</strong> presidencia@cruzrojatungurahua.org </p>
                <p class="tituloInfo"><strong>Teléfono:</strong> 03 2422218 / 2821959 </p>
                <p class="tituloInfo"><strong>Sitio Web:</strong> <a href="www.cruzrojatungurahua.org"
                        target="_blank">www.cruzrojatungurahua.org</a></p>
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