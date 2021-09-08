<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.creuna.fi/
 * @since             1.0.0
 * @package           Some_Napit
 *
 * @wordpress-plugin
 * Plugin Name:       Some Napit
 * Plugin URI:        http://www.creuna.fi/
 * Description:       Lightweight Some naps for your awesome project. Based on https://cloudcannon.com/tutorials/2017/02/01/lightweight-social-share-buttons/
 * Version:           1.0.0
 * Author:            Creuna
 * Author URI:        http://www.creuna.fi/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       some-napit
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'some_napit' ) && ! function_exists( 'some_napit_inline_styles' ) ) {


		function some_napit($service, $url, $button_text, $sitename = null, $summary = null) {

			$accepted_services = array(
				'Facebook',
				'LinkedIn',
				'Twitter',
				'WhatsApp'
			);

			if(!in_array($service, $accepted_services)) {
				return;
			}

			switch ($service) {
				case 'Facebook':
					return '
					<a href="https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url) . '"
					  class="share-button share-service-facebook"
					  target="_blank">
				    <svg fill="#005eb8"
				      height="24"
				      viewBox="0 0 24 24"
				      width="24"
				      xmlns="http://www.w3.org/2000/svg"><path d="M19,4V7H17A1,1 0 0,0 16,8V10H19V13H16V20H13V13H11V10H13V7.5C13,5.56 14.57,4 16.5,4M20,2H4A2,2 0 0,0 2,4V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V4C22,2.89 21.1,2 20,2Z" /></svg> <span>' . $button_text . '</span></a>';
					break;
					case 'LinkedIn':
						return '
						<a href="https://www.linkedin.com/shareArticle?url=' . urlencode($url) . '&source=' . $sitename . '&summary=' . $summary . '&mini=true"
						  class="share-button share-service-facebook"
						  target="_blank">
					    <svg fill="#005eb8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M21,21H17V14.25C17,13.19 15.81,12.31 14.75,12.31C13.69,12.31 13,13.19 13,14.25V21H9V9H13V11C13.66,9.93 15.36,9.24 16.5,9.24C19,9.24 21,11.28 21,13.75V21M7,21H3V9H7V21M5,3A2,2 0 0,1 7,5A2,2 0 0,1 5,7A2,2 0 0,1 3,5A2,2 0 0,1 5,3Z" /></svg> <span>' . $button_text . '</span></a>';
						break;
					case 'Twitter':
						return '
						<a href="https://twitter.com/intent/tweet?url=' . urlencode($url) . '"
						  class="share-button share-service-twitter"
						  target="_blank">
							<svg fill="#005eb8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" /></svg> <span>' . $button_text . '</span></a>';
						break;
						case 'WhatsApp':
							return '
							<a href="https://api.whatsapp.com/send?text=' . urlencode($url) . '"
							  class="share-button share-service-whatsapp"
							  target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M16.75,13.96C17,14.09 17.16,14.16 17.21,14.26C17.27,14.37 17.25,14.87 17,15.44C16.8,16 15.76,16.54 15.3,16.56C14.84,16.58 14.83,16.92 12.34,15.83C9.85,14.74 8.35,12.08 8.23,11.91C8.11,11.74 7.27,10.53 7.31,9.3C7.36,8.08 8,7.5 8.26,7.26C8.5,7 8.77,6.97 8.94,7H9.41C9.56,7 9.77,6.94 9.96,7.45L10.65,9.32C10.71,9.45 10.75,9.6 10.66,9.76L10.39,10.17L10,10.59C9.88,10.71 9.74,10.84 9.88,11.09C10,11.35 10.5,12.18 11.2,12.87C12.11,13.75 12.91,14.04 13.15,14.17C13.39,14.31 13.54,14.29 13.69,14.13L14.5,13.19C14.69,12.94 14.85,13 15.08,13.08L16.75,13.96M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C10.03,22 8.2,21.43 6.65,20.45L2,22L3.55,17.35C2.57,15.8 2,13.97 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12C4,13.72 4.54,15.31 5.46,16.61L4.5,19.5L7.39,18.54C8.69,19.46 10.28,20 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z" /></svg> <span>' . $button_text . '</span></a>';
							break;

			}

		}

	/**
	 * Social media button styles
	 * Minification functionality taken from here: https://gist.github.com/webgefrickel/3339063
	 * All credits to Christian Schaefer: http://twitter.com/derSchepp
	 */

	function some_napit_inline_styles($parent_class, $font_family, $font_weight, $font_size) {

		$css = '

			' . $parent_class . ' a.share-button {
			  position: relative;
			  display: inline-flex;
			  align-items: center;
			  padding: 0.3rem 1rem 0.3rem 0.8rem;
			  color: #fff !important;
			  background-color: #333;
			  border-radius: 2px;
			  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.35);
			  text-decoration: none;
			  font-family: ' . $font_family . ';
			  font-weight: ' . $font_weight . ';
			  font-size: ' . $font_size . ';
			}

			' . $parent_class . ' .share-button:hover {
			  color: #fff;
			  background-color: #4f4f4f;
			}

			' . $parent_class . ' .share-button:active {
			  top: 1px;
			  box-shadow: 0 0 1px rgba(0, 0, 0, 0.25);
			}

			' . $parent_class . ' .share-button svg {
			  fill: #ffffff;
			  width: 2rem;
			  height: 2rem;
			  margin-right: 0.5rem;
			}

			' . $parent_class . ' .share-button.share-service-facebook { background-color: #4A66B7; }
			' . $parent_class . ' .share-button.share-service-facebook:hover { background-color: #556fbb; }

			' . $parent_class . ' .share-button.share-service-twitter { background-color: #1B95E0; }
			' . $parent_class . ' .share-button.share-service-twitter:hover { background-color: #269ce5; }

			' . $parent_class . ' .share-button.share-service-whatsapp { background-color: #00e676; }
			' . $parent_class . ' .share-button.share-service-whatsapp:hover { background-color: #10f887; }

			' . $parent_class . ' .share-button.share-service-pinterest { background-color: #c92228; }
			' . $parent_class . ' .share-button.share-service-pinterest:hover { background-color: #cf4146; }

			' . $parent_class . ' .share-button.share-service-linkedin { background-color: #0077B5; }
			' . $parent_class . ' .share-button.share-service-linkedin:hover { background-color: #1e84b9; }

			' . $parent_class . ' .share-button.share-service-reddit { background-color: #5f99cf; }
			' . $parent_class . ' .share-button.share-service-reddit:hover { background-color: #75a6d4; }

			' . $parent_class . ' .share-button.share-service-tumblr { background-color: #35465c; }
			' . $parent_class . ' .share-button.share-service-tumblr:hover { background-color: #455166; }

			' . $parent_class . ' .share-button.share-service-hacker-news { background-color: #ff6600; }
			' . $parent_class . ' .share-button.share-service-hacker-news:hover { background-color: #ff7515; }

			' . $parent_class . ' .share-button.share-service-designer-news { background-color: #2d72d9; }
			' . $parent_class . ' .share-button.share-service-designer-news:hover { background-color: #3d82e9; }

			' . $parent_class . ' .share-button.share-service-google-plus { background-color: #fefefe; color: #333; }
			' . $parent_class . ' .share-button.share-service-google-plus:hover { background-color: #f6f6f6; color: #333; }

			' . $parent_class . ' .share-button.google-plus svg { fill: #DB4437; }
		';

		// remove comments
	  $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
	  // backup values within single or double quotes
	  preg_match_all('/(\'[^\']*?\'|"[^"]*?")/ims', $css, $hit, PREG_PATTERN_ORDER);
	  for ($i=0; $i < count($hit[1]); $i++) {
	    $css = str_replace($hit[1][$i], '##########' . $i . '##########', $css);
	  }
	  // remove traling semicolon of selector's last property
	  $css = preg_replace('/;[\s\r\n\t]*?}[\s\r\n\t]*/ims', "}\r\n", $css);
	  // remove any whitespace between semicolon and property-name
	  $css = preg_replace('/;[\s\r\n\t]*?([\r\n]?[^\s\r\n\t])/ims', ';$1', $css);
	  // remove any whitespace surrounding property-colon
	  $css = preg_replace('/[\s\r\n\t]*:[\s\r\n\t]*?([^\s\r\n\t])/ims', ':$1', $css);
	  // remove any whitespace surrounding selector-comma
	  $css = preg_replace('/[\s\r\n\t]*,[\s\r\n\t]*?([^\s\r\n\t])/ims', ',$1', $css);
	  // remove any whitespace surrounding opening parenthesis
	  $css = preg_replace('/[\s\r\n\t]*{[\s\r\n\t]*?([^\s\r\n\t])/ims', '{$1', $css);
	  // remove any whitespace between numbers and units
	  $css = preg_replace('/([\d\.]+)[\s\r\n\t]+(px|em|pt|%)/ims', '$1$2', $css);
	  // shorten zero-values
	  $css = preg_replace('/([^\d\.]0)(px|em|pt|%)/ims', '$1', $css);
	  // constrain multiple whitespaces
	  $css = preg_replace('/\p{Zs}+/ims',' ', $css);
	  // remove newlines
	  $css = str_replace(array("\r\n", "\r", "\n"), '', $css);
	  // Restore backupped values within single or double quotes
	  for ($i=0; $i < count($hit[1]); $i++) {
	    $css = str_replace('##########' . $i . '##########', $hit[1][$i], $css);
	  }

		return '<style>' . $css . '</style>';

	}


}
