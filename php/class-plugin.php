<?php
/**
 * Primary plugin file.
 *
 * @package   FECustomizer
 * @copyright Copyright(c) 2017, XWP
 * @licence http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace FECustomizer;

/**
 * Class Plugin
 */
class Plugin extends PluginAbstract {

	/**
	 * Execute this once plugins are loaded. (not the best place for all hooks)
	 */
	public function plugin_loaded() {

		if ( current_user_can( 'manage_options' ) ) {
			add_action( 'wp_enqueue_scripts', function () {
				wp_enqueue_script( 'fec-app', $this->get_assets_url( 'js/app/dist/build.js' ), array() );
				$js = 'var fec = fec || {};' .
					  'fec.title = "' . get_bloginfo() . '"';
				wp_add_inline_script( 'fec-app', $js );
			} );
		}
	}
}
