<?php
/**
 * Test_The_Plugin
 *
 * @package FECustomizer
 */

namespace FECustomizer;

/**
 * Class Test_The_Plugin
 *
 * @package FECustomizer
 */
class Test_The_Plugin extends \WP_UnitTestCase {
	/**
	 * Test _fe_customizer_php_version_error().
	 *
	 * @see _fe_customizer_php_version_error()
	 */
	public function test_fe_customizer_php_version_error() {
		ob_start();
		_fe_customizer_php_version_error();
		$buffer = ob_get_clean();
		$this->assertContains( '<div class="error">', $buffer );
	}

	/**
	 * Test _fe_customizer_php_version_text().
	 *
	 * @see _fe_customizer_php_version_text()
	 */
	public function test_fe_customizer_php_version_text() {
		$this->assertContains( 'FE Customizer plugin error:', _fe_customizer_php_version_text() );
	}
}
