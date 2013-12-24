<?php
/*
Plugin Name: prostoweather
Plugin Script: prostoweather.php
Plugin URI: http://wordpress.com
Description: A simple weather plugin ProstoWeather
Version: 0.1
License: GPL
Author: karmeljuk
Author URI: karmeljuk.go
Template by: http://web.forret.com/tools/wp-plugin.asp

=== RELEASE NOTES ===
2013-12-24 - v1.0 - first version
*/

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Online: http://www.gnu.org/licenses/gpl.txt
*/

// uncomment next line if you need functions in external PHP script;
// include_once(dirname(__FILE__).'/some-library-in-same-folder.php');

// ------------------
// prostoweather parameters will be saved in the database
function prostoweather_add_options() {
// prostoweather_add_options: add options to DB for this plugin
add_option('prostoweather_nb_widgets', '75');
// add_option('prostoweather_...','...');
}
prostoweather_add_options();

function prostoweather_add_script(){
print '<script type="text/javascript" charset="UTF-8" src="http://informers.sinoptik.ua/js3.php?title=4&amp;wind=3&amp;cities=303028869&amp;lang=ua"></script>';
}
add_action('wp_footer','prostoweather_add_script');

// ------------------
// prostoweather_showhtml will generate the (HTML) output
/*function prostoweather_showhtml($param1 = 0, $param2 = "test") {
global $wpdb;
// get your parameter values from the database
$prostoweather_nb_widgets = get_option('prostoweather_nb_widgets');
// generate $prostoweather_html based on ...
// (your code)
// content will be added when function 'prostoweather_showhtml()' is called
return $prostoweather_html;
}*/

function prostoweather_showhtml ($param1 = 0, $param2 = "test") {
	global $wpdb;
	$prostoweather_nb_widgets = get_option('prostoweather_nb_widgets');

	print '<div id="SinoptikInformer" style="width:240px;" class="SinoptikInformer type1">
		    <div class="siHeader">
		        <div class="siLh">
		            <div class="siMh"><a onmousedown="siClickCount();" href="http://ua.sinoptik.ua/" target="_blank">Погода</a>
		                <a onmousedown="siClickCount();" class="siLogo" href="http://ua.sinoptik.ua/" target="_blank">
		                    <img alt="Прогноз погоды" src="http://informers.sinoptik.ua/img/t.gif" />
		                </a> <span id="siHeader"></span>
		            </div>
		        </div>
		    </div>
		    <div class="siBody">
		        <div class="siCity">
		            <div class="siCityName"><a onmousedown="siClickCount();" href="http://ua.sinoptik.ua/погода-черкаси" target="_blank">Погода у <span>Черкасах</span></a>
		            </div>
		            <div id="siCont0" class="siBodyContent">
		                <div class="siLeft">
		                    <div class="siTerm"></div>
		                    <div class="siT" id="siT0"></div>
		                    <div id="weatherIco0"></div>
		                </div>
		                <div class="siInf">
		                    <p>вологість: <span id="vl0"></span>
		                    </p>
		                    <p>тиск: <span id="dav0"></span>
		                    </p>
		                    <p>вітер: <span id="wind0"></span>
		                    </p>
		                </div>
		            </div>
		        </div>
		        <div class="siLinks"><span><a onmousedown="siClickCount();" href="http://ua.sinoptik.ua/погода-київ" target="_blank">Погода у Києві</a>&nbsp;</span><span><a onmousedown="siClickCount();" href="http://ua.sinoptik.ua/погода-миколаїв" target="_blank">Погода у Миколаєві</a>&nbsp;</span>
		        </div>
		    </div>
		    <div class="siFooter">
		        <div class="siLf">
		            <div class="siMf"></div>
		        </div>
		    </div>
		</div>';

	return $prostoweather_html;
}


add_shortcode( 'prostoweather', 'prostoweather_showhtml' );


add_filter('widget_text', 'do_shortcode');

