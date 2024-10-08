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
                        <table class="tableStyle"">
                            <tr>
                                <td id="iconTb" rowspan=" 2" valign="middle" align="left">
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
                                    <span class="informacionInfo">
                                        <a
                                            href="mailto:voluntariado&#64;cruzrojaazuay&#46;org">voluntariado&#64;cruzrojaazuay&#46;org</a>
                                    </span>

                                </td>
                            </tr>
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+593&#32;7&#32;2889&#32;048">(+593)&#32;7&#32;2889&#32;048</a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion" colspan="2">
                                    <span class="informacionInfo">
                                        <a href="https://www.cruzrojazuay.org" target="_blank">www.cruzrojazuay.org</a>
                                    </span>
                                </td>
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
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7976.560311086884!2d-79.00472!3d-1.591023!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d3163c50953099%3A0x4bfa5add5821911b!2sCruz%20Roja%20Ecuatoriana%20Junta%20Provincial%20Bolivar%20-Guaranda!5e0!3m2!1ses!2sec!4v1727895830069!5m2!1ses!2sec" 
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            
                            
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+593&#32;7&#32;2889&#32;048">(+593)&#32;7&#32;2889&#32;048</a>
                                    </span>
                                </td>
                            </tr>
                        
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <div class="todoContenido">
        <section id="info-sierra">
            <div id="info-sierra-cañar" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Cañar</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7969.4198380309535!2d-79.003453!3d-2.899679!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cd1813e387f2b5%3A0x73f36c2ff4052ce1!2sCruz%20Roja%20Ecuatoriana!5e0!3m2!1ses!2sec!4v1727898704872!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+593&#32;7&#32;2889&#32;048">(+593)&#32;7&#32;2889&#32;048</a>
                                    </span>
                                </td>
                            </tr>
                            
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <div class="todoContenido">
        <section id="info-sierra">
            <div id="info-sierra-carchi" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Carchi</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7978.830461594282!2d-77.714743!3d0.814452!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e2968cc3b4f1831%3A0x8ad4dc360316e4bb!2sCruz%20Roja%20Jp%20Carchi!5e0!3m2!1ses!2sec!4v1727898862719!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                           
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+593&#32;7&#32;2889&#32;048">(+593)&#32;7&#32;2889&#32;048</a>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <div class="todoContenido">
        <section id="info-sierra">
            <div id="info-sierra-cotopaxi" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Cotopaxi</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1622.9636556211753!2d-78.6174101833047!3d-0.9368155877403677!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d461a5d9ab14c5%3A0xa1535ec621977949!2sCruz%20Roja%20Ecuatoriana%20Junta%20Provincial%20de%20Cotopaxi!5e0!3m2!1ses!2sec!4v1727898903940!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                           
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+593&#32;7&#32;2889&#32;048">(+593)&#32;7&#32;2889&#32;048</a>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <div class="todoContenido">
        <section id="info-sierra">
            <div id="info-sierra-chimborazo" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Chimborazo</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1276.6620217301327!2d-78.65195498450879!3d-1.6703394036628478!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d3a8267a012aa1%3A0xcb8ef228c7f33de6!2sCruz%20Roja%20Ecuatoriana%20Junta%20Provincial%20de!5e0!3m2!1ses!2sec!4v1727898931166!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                           
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+593&#32;7&#32;2889&#32;048">(+593)&#32;7&#32;2889&#32;048</a>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <div class="todoContenido">
        <section id="info-sierra">
            <div id="info-sierra-imbabura" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Imbabura</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2725.076018573389!2d-78.12177878607062!3d0.3482900460297231!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e2a3cc81c2eb8df%3A0x3ee7e709f486db1b!2sCruz%20Roja%20-%20Imbabura!5e0!3m2!1ses!2sec!4v1727898953077!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            <tr></tr>
                                <td id="iconTb" rowspan=" 2" valign="middle" align="left">
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
                                    <span class="informacionInfo">
                                        <a
                                            href="mailto:voluntariado&#64;cruzrojaazuay&#46;org">voluntariado&#64;cruzrojaazuay&#46;org</a>
                                    </span>

                                </td>
                            </tr>
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+593&#32;7&#32;2889&#32;048">(+593)&#32;7&#32;2889&#32;048</a>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <div class="todoContenido">
        <section id="info-sierra">
            <div id="info-sierra-loja" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Loja</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2357.049166605436!2d-79.20592615806869!3d-3.993925709762651!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cb48015dc99d1f%3A0xde565ba89e431d45!2sCruz%20Roja%20Ecuatoriana%20Junta%20Provincial%20de%20Loja!5e0!3m2!1ses!2sec!4v1727898980695!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                           
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+593&#32;7&#32;2889&#32;048">(+593)&#32;7&#32;2889&#32;048</a>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    
    <div class="todoContenido">
        <section id="info-sierra">
            <div id="info-sierra-pichincha" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Pichincha</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d627.483289167345!2d-78.62830582387663!3d-1.2455223956139194!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d381960674f993%3A0x222038ca6eb396f3!2sCruz%20Roja%20de%20Tungurahua!5e0!3m2!1ses!2sec!4v1727899047079!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            <tr>
                                <td id="iconTb" rowspan=" 2" valign="middle" align="left">
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
                                    <span class="informacionInfo">
                                        <a
                                            href="mailto:voluntariado&#64;cruzrojaazuay&#46;org">voluntariado&#64;cruzrojaazuay&#46;org</a>
                                    </span>

                                </td>
                            </tr>
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+593&#32;7&#32;2889&#32;048">(+593)&#32;7&#32;2889&#32;048</a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion" colspan="2">
                                    <span class="informacionInfo">
                                        <a href="https://www.cruzrojazuay.org" target="_blank">www.cruzrojazuay.org</a>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <div class="todoContenido">
        <section id="info-sierra">
            <div id="info-sierra-tungurahua" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Tungurahua</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d627.483289167345!2d-78.62830582387663!3d-1.2455223956139194!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d381960674f993%3A0x222038ca6eb396f3!2sCruz%20Roja%20de%20Tungurahua!5e0!3m2!1ses!2sec!4v1727899047079!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            <tr>
                                <td id="iconTb" rowspan=" 2" valign="middle" align="left">
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
                                    <span class="informacionInfo">
                                        <a
                                            href="mailto:voluntariado&#64;cruzrojaazuay&#46;org">voluntariado&#64;cruzrojaazuay&#46;org</a>
                                    </span>

                                </td>
                            </tr>
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+593&#32;7&#32;2889&#32;048">(+593)&#32;7&#32;2889&#32;048</a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion" colspan="2">
                                    <span class="informacionInfo">
                                        <a href="https://www.cruzrojazuay.org" target="_blank">www.cruzrojazuay.org</a>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>

<!-- inicia informacion costa -->
 <!-- inicia informacion Esmeraldas -->
    <div class="todoContenido">
        <section id="info-costa">
            <div id="info-costa-esmeraldas" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Esmeraldas</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d540.3467911174066!2d-79.65090761607924!3d0.9516814532748014!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fd4beb4a8b830dd%3A0x16733e985a5b341c!2sCruz%20Roja%20Ecuatoriana!5e0!3m2!1ses-419!2sec!4v1727908348004!5m2!1ses-419!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59362455711">(06) 2455-711</a>
                                    </span>
                                </td>
                            </tr>
                           
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <!-- inicia informacion El Oro -->
    <div class="todoContenido">
        <section id="info-costa">
            <div id="info-costa-el oro" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>El Oro</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d458.9744739033397!2d-79.95485297016053!3d-3.2608029505544054!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x90330e5afd8236b3%3A0x127e8073e144d37!2sCruz%20Roja%20El%20Oro!5e0!3m2!1ses-419!2sec!4v1727908261925!5m2!1ses-419!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59372930150">(07) 2930-150</a>
                                    </span>
                                </td>
                            </tr>
                           
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <!-- inicia informacion Guayas -->
    <div class="todoContenido">
        <section id="info-costa">
            <div id="info-costa-guayas" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Guayas</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1072.5933936177769!2d-79.88858338747251!3d-2.1890281898745116!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6dd8865ed271%3A0xb61968476dddb86d!2sCruz%20Roja%20Ecuatoriana!5e0!3m2!1ses-419!2sec!4v1727908074489!5m2!1ses-419!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            <tr>
                                <td id="iconTb" rowspan=" 2" valign="middle" align="left">
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
                                    <span class="informacionInfo">
                                        <a href="mailto:sinstitucionalesguayas@cruzroja.org.ec">sinstitucionalesguayas@cruzroja.org.ec</a>
                                    </span>

                                </td>
                            </tr>
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59342560674">(04) 2560674</a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion" colspan="2">
                                    <span class="informacionInfo">
                                        <a href="https://www.cruzrojaguayas.org" target="_blank">www.cruzrojaguayas.org</a>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <!-- inicia informacion Manabi -->
    <div class="todoContenido">
        <section id="info-costa">
            <div id="info-costa-manabi" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Manabi</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d528.9042225896401!2d-80.44899313100751!3d-1.0558771481896685!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902b8d4c9c7fa4d5%3A0x23912abeb45ce5!2sCruz%20Roja%20Manab%C3%AD!5e0!3m2!1ses!2sec!4v1727908001145!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                           
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59352630504">((05) 2630-504)</a>
                                    </span>
                                </td>
                            </tr>
                            
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <!-- inicia informacion Los Rios -->
    <div class="todoContenido">
        <section id="info-costa">
            <div id="info-costa-los rios" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Los Ríos</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d828.2346406343656!2d-79.53510853700523!3d-1.799861276227281!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902cd7df0a142d57%3A0x4eed4e99cf1bb74!2sCruz%20Roja!5e0!3m2!1ses!2sec!4v1727907944739!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59352736992">((05) 2736-992)</a>
                                    </span>
                                </td>
                            </tr>
                            
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
<!-- inicia informacion Santa Elena -->
    <div class="todoContenido">
        <section id="info-costa">
            <div id="info-costa-santa elena" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Santa Elena</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d494.6226350309361!2d-80.8576566201415!3d-2.2266178641463723!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902e09065269ad69%3A0xf12a9e538dd566f4!2sCRUZ%20ROJA%20ECUATORIANA%20SANTA%20ELENA!5e0!3m2!1ses!2sec!4v1727907813770!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59342941200">((04) 2941-200)</a>                                    </span>
                                </td>
                            </tr>
                            
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <!-- inicia informacion Santo Domingo -->
    <div class="todoContenido">
        <section id="info-costa">
            <div id="info-costa-santo domingo de los tsáchilas" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Santo Domingo de los Tsáchilas</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1441.9037111258153!2d-79.18595288226615!3d-0.26112740187598427!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d547cc36b48261%3A0xb42edf9a50571543!2sCruz%20Roja%20Ecuatoriana%20Junta%20Provincial%20Santo%20Domingo%20de%20los%20Ts%C3%A1chilas!5e0!3m2!1ses!2sec!4v1727907710615!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            <tr>
                                <td id="iconTb" rowspan=" 2" valign="middle" align="left">
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
                                    <span class="informacionInfo">
                                        <a href="javascript:void(0);" onclick="this.href='mailto:' + 'jpsantodomingo' + '@' + 'cruzroja.org.ec';">jpsantodomingo@cruzroja.org.ec</a>
                                    </span>

                                </td>
                            </tr>
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59323716555">(02) 3716-555</a> / <a href="tel:+59323714777">(02) 3714-777</a>
                                    </span>
                                </td>
                            </tr>
                           
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>




    <!-- inicia informacion Amazonia -->
     <!-- inicia informacion Morona Santiago-->
    <div class="todoContenido">
        <section id="info-amazonia">
            <div id="info-amazonia-morona santiago" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Morona Santiago</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2697.8673966334454!2d-78.11948531393564!3d-2.307943648617709!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d20fc32e1db089%3A0xced4f31223f23216!2sCRUZ%20ROJA%20ECUATORIANA!5e0!3m2!1ses!2sec!4v1727907256958!5m2!1ses!2sec
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59372700114">(07) 2700-114</a>
                                    </span>
                                </td>
                            </tr>
                           
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <!-- inicia informacion napo-->
    <div class="todoContenido">
        <section id="info-amazonia">
            <div id="info-amazonia-napo" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Napo</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d498.65243276145173!2d-77.812256!3d-0.992724!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d6a44bdc4bbe23%3A0x60a740ab2c8fb84!2sAv.%20Francisco%20de%20Orellana%2C%20Tena!5e0!3m2!1ses-419!2sec!4v1727907319744!5m2!1ses-419!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            <tr>
                                <td id="iconTb" rowspan=" 2" valign="middle" align="left">
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
                                    <span class="informacionInfo">
                                        <a href="mailto:jpnapo@cruzroja.org.ec">jpnapo@cruzroja.org.ec</a>
                                                                        </span>

                                </td>
                            </tr>
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59362886443">062 886 443</a>
                                    </span>
                                </td>
                            </tr>
                           
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <!-- inicia informacion orellana -->
    <div class="todoContenido">
        <section id="info-amazonia">
            <div id="info-amazonia-orellana" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Orellana</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d820.9935873958589!2d-76.98678674283686!3d-0.4686523153833283!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d7a50cd9de8907%3A0x7b01cbd9e19b8453!2sCruz%20Roja%20Orellana!5e0!3m2!1ses!2sec!4v1727907438661!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59342560674">(04) 2560674</a>
                                    </span>
                                </td>
                            </tr>
                            
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <!-- inicia informacion paztaza-->
    <div class="todoContenido">
        <section id="info-amazonia">
            <div id="info-amazonia-pastaza" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Pastaza</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1712.1854265011038!2d-77.9974045563635!3d-1.4846660564494887!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d3e108ca769033%3A0x15cd590498f3eba8!2sCruz%20Roja%20Ecuatoriana.!5e0!3m2!1ses-419!2sec!4v1727907501614!5m2!1ses-419!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                           
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59332885214">(03) 2885-214</a>
                                                                        </span>
                                </td>
                            </tr>
                           
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <!-- inicia informacion sucumbios-->
    <div class="todoContenido">
        <section id="info-amazonia">
            <div id="info-amazonia-sucumbios" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Sucumbios</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">

            

                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6648.311544002296!2d-76.88766871149042!3d0.08111338914434511!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e2823b2e5f3857f%3A0x8b559186bc1ab7c2!2sCruz%20Roja%20Lago%20Agrio!5e0!3m2!1ses-419!2sec!4v1727906679505!5m2!1ses-419!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            
                            
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59362830131">(06) 2830-131</a>                                    </span>
                                </td>
                            </tr>
                            
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
    <!-- inicia informacion zamaro chinchipe-->
    <div class="todoContenido">
        <section id="info-amazonia">
            <div id="info-amazonia-zamora chinchipe" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Zamora Chinchipe</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1913.2393246063857!2d-78.95552579101252!3d-4.067959998590952!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cb14239173f93d%3A0xb0ad3e30bd578dba!2sCruz%20Roja%20Ecuatoriana%20-%20Zamora!5e0!3m2!1ses-419!2sec!4v1727906456308!5m2!1ses-419!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
                                    <div class="icono-circular ">
                                        <svg class="iconInfo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z" />
                                        </svg>
                                    </div>
                                </td>
                                <td id="labelTitulo"> 
                                    <span class="tituloInfo">Teléfono</span>
                                </td>
                            </tr>
                            <tr>
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59372605342">(07) 2605-342</a>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </section>
                </article>
            </div>
        </section>
    </div>
     <!-- inicia informacion region insular-->
    <!-- inicia informacion Galapagos - Santa Cruz-->
    <div class="todoContenido">
        <section id="info-regioninsular">
            <div id="info-regioninsular-galápagos - santa cruz" class="info">
                <section class="tituloProvincial">
                    <h2 id="tituloJunta">Junta Provincial de <span>Galápagos - Santa Cruz</span></h2>
                </section>
                <article class="groupInfo">
                    <section class="column-map">
                        <iframe class="mapasIframe"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1391.8789140970432!2d-90.31422354179972!3d-0.7471457050228952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9aaa5d15e41d5563%3A0xcac908de4cc9319!2sCentros%20M%C3%A9dicos%20Cruz%20Roja%20-%20Santa%20Cruz!5e0!3m2!1ses!2sec!4v1727906161395!5m2!1ses!2sec"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                    <section class="column textInfo">
                        <table class="tableStyle"">
                            
                            <tr>
                                <td id="iconTb" rowspan="2" valign="middle" align="left">
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
                                <td id="seccInformacion">
                                    <span class="informacionInfo">
                                        <a href="tel:+59352520240">(05) 2520-240</a>
                                    </span>
                                </td>
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