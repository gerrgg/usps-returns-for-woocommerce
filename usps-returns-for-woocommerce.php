/**
 * Plugin Name:       USPS Returns for Woocommerce
 * Plugin URI:        https://github.com/gerrgg/usps-returns-for-woocommerce
 * Description:       Allows customers to issue RMA's and generate shipping labels with USPS.
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            GERRG
 * Author URI:        http://gerrg.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       USPSRW
 * Domain Path:       /languages
 */

 <?php class USPSRW
 {
   function __construct()
   {
     add_action('init', [$this, 'create_returns_page'], 2);
   }
 }
