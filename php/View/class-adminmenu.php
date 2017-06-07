<?php
/**
 * AdminMenu.
 *
 * @package   FECustomizer
 * @copyright Copyright(c) 2017, XWP
 * @licence http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace FECustomizer\View;

use FECustomizer\ComponentAbstract;

class AdminMenu extends ComponentAbstract {

	public function register_hooks() {
		add_action( 'admin_menu', function () {
			add_menu_page(
				'FE Customizer',
				'FE Customizer',
				'manage_options',
				'fe-customizer-menu',
				array( $this, 'display' ),
				$this->plugin->get_assets_url( 'images/admin-menu-icon.svg' )
			);
		} );
		// Register other hooks here.
	}

	public function display() {
		?>
		<div class="wrap">
			<h2><?php esc_html_e( 'FE Customizer Settings', 'fe-customizer' ); ?></h2>
			<p class="description"><?php esc_html_e( 'This is a description for this page.', 'fe-customizer' ); ?></p>
		</div>
		<?php
	}
}
