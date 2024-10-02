<?php
/*
Plugin Name: Información de direcciones - Cruz Roja Ecuatoriana
Plugin URI: https://www.cruzroja.org
Description: Plugin para mostrar la información de las juntas provinciales de la Cruz Roja Ecuatoriana.
Version: 1.3
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
    
    <section class="selectoresRegPro">
        <div>
            <label for="region">Región:</label>
            <br>
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
            <br>
            <select id="provincia" onchange="showInfo()">
                <option value="">--Selecciona una Provincia--</option>
            </select>
        </div>
    </section>

    <div class="todoContenido">
        <section id="info-sierra">
            <div id="info-sierra-azuay" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Azuay</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7969.419835212815!2d-79.01298020642092!3d-2.899679399999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cd1813e387f2b5%3A0x73f36c2ff4052ce1!2sCruz%20Roja%20Ecuatoriana!5e0!3m2!1ses!2sec!4v1727886997001!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table width="100%" ">
                            <tr>
                                <td  rowspan=" 2" valign="middle" align="left">
                            <div class="icono-circular ">
                                <svg class="iconInfo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M215.4 96L144 96l-36.2 0L96 96l0 8.8L96 144l0 40.4 0 89L.2 202.5c1.6-18.1 10.9-34.9 25.7-45.8L48 140.3 48 96c0-26.5 21.5-48 48-48l76.6 0 49.9-36.9C232.2 3.9 243.9 0 256 0s23.8 3.9 33.5 11L339.4 48 416 48c26.5 0 48 21.5 48 48l0 44.3 22.1 16.4c14.8 10.9 24.1 27.7 25.7 45.8L416 273.4l0-89 0-40.4 0-39.2 0-8.8-11.8 0L368 96l-71.4 0-81.3 0zM0 448L0 242.1 217.6 403.3c11.1 8.2 24.6 12.7 38.4 12.7s27.3-4.4 38.4-12.7L512 242.1 512 448s0 0 0 0c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64c0 0 0 0 0 0zM176 160l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                </svg>
                            </div>

                            </td>
                            <td id="labelTitulo"> <span class="tituloInfo">Correo Electrónico</span></td>
                            </tr>
                            <tr>
                                <td id="seccInformacion">
                                    <span class="informacionInfo">voluntariado@cruzrojaazuay.org</span>

                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" valign="middle" align="left">
                                    <div class="icono-circular ">
                                        <svg class="iconInfo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z" />
                                        </svg>
                                    </div>
                                </td>
                                <td id="labelTitulo"> <span class="tituloInfo">Teléfono</span></td>
                            </tr>
                            <tr>
                                <td id="seccInformacion">(07) 2889-048</td>
                            </tr>
                            <tr>
                                <td rowspan="2" valign="middle" align="left">
                                    <div class="icono-circular ">
                                        <svg class="iconInfo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z" />
                                        </svg>
                                    </div>

                                </td>
                                <td id="labelTitulo"> <span class="tituloInfo">Sitio Web</span></td>
                            </tr>
                            <tr>
                                <td id="seccInformacion" colspan="2">www.cruzrojazuay.org</td>
                            </tr>
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>


    <div class="todoContenido">
        <section id="info-sierra">
            <div id="info-sierra-bolivar" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Bolivar</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                       
                            <iframe class="mapasIframe" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7976.560311086884!2d-79.00472!3d-1.591023!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d3163c50953099%3A0x4bfa5add5821911b!2sCruz%20Roja%20Ecuatoriana%20Junta%20Provincial%20Bolivar%20-Guaranda!5e0!3m2!1ses!2sec!4v1727895830069!5m2!1ses!2sec"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table width="100%" ">
                        <tr>
                            <td  rowspan=" 2" valign="middle" align="left">
                            <div class="icono-circular ">
                                <svg class="iconInfo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M215.4 96L144 96l-36.2 0L96 96l0 8.8L96 144l0 40.4 0 89L.2 202.5c1.6-18.1 10.9-34.9 25.7-45.8L48 140.3 48 96c0-26.5 21.5-48 48-48l76.6 0 49.9-36.9C232.2 3.9 243.9 0 256 0s23.8 3.9 33.5 11L339.4 48 416 48c26.5 0 48 21.5 48 48l0 44.3 22.1 16.4c14.8 10.9 24.1 27.7 25.7 45.8L416 273.4l0-89 0-40.4 0-39.2 0-8.8-11.8 0L368 96l-71.4 0-81.3 0zM0 448L0 242.1 217.6 403.3c11.1 8.2 24.6 12.7 38.4 12.7s27.3-4.4 38.4-12.7L512 242.1 512 448s0 0 0 0c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64c0 0 0 0 0 0zM176 160l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                </svg>
                            </div>

                            </td>
                            <td id="labelTitulo"> <span class="tituloInfo">Correo Electrónico</span></td>
                            </tr>
                            <tr>
                                <td id="seccInformacion">
                                    <span class="informacionInfo">voluntariado@cruzrojaazuay.org</span>

                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" valign="middle" align="left">
                                    <div class="icono-circular ">
                                        <svg class="iconInfo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z" />
                                        </svg>
                                    </div>
                                </td>
                                <td id="labelTitulo"> <span class="tituloInfo">Teléfono</span></td>
                            </tr>
                            <tr>
                                <td id="seccInformacion">(07) 2889-048</td>
                            </tr>
                            <tr>
                                <td rowspan="2" valign="middle" align="left">
                                    <div class="icono-circular ">
                                        <svg class="iconInfo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z" />
                                        </svg>
                                    </div>

                                </td>
                                <td id="labelTitulo"> <span class="tituloInfo">Sitio Web</span></td>
                            </tr>
                            <tr>
                                <td id="seccInformacion" colspan="2">www.cruzrojazuay.org</td>
                            </tr>
                        </table>
                    </section>
                </article>
            </div>
        </section>

    </div>





</section>
<?php
    return ob_get_clean();
}
add_shortcode('cruz_roja_informacion', 'cruz_roja_shortcode');