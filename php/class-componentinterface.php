<?php
/**
 * Component interface.
 *
 * @package   FECustomizer
 * @copyright Copyright(c) 2017, XWP
 * @licence http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace FECustomizer;

/**
 * Interface ComponentInterface
 *
 * @package FECustomizer
 */
interface ComponentInterface {

	/**
	 * Set the plugin so that it can be referenced later.
	 *
	 * @param PluginInterface $plugin The plugin.
	 *
	 * @return ComponentInterface $this
	 */
	public function set_plugin( PluginInterface $plugin );

	/**
	 * Register any hooks that this component needs.
	 *
	 * @return void
	 */
	public function register_hooks();
}
