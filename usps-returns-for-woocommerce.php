<?php

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

class USPSRW
{
  function __construct()
  {
    // Create the returns page and add shortcode
    add_action('init', [$this, 'create_returns_page'], 1);

    // modify wc_get_template to search in plugin directory
    add_filter('wc_get_template', [$this, 'uspsrw_get_template'], 10, 2);

    // setup shortcode to return themplate file
    add_shortcode('USPSreturns', [$this, 'USPS_returns_shortcode']);
  }

  function create_returns_page()
  {
    /**
     * Create the returns page responsible for the application logic
     */
    if (!$this->the_slug_exists('usps-returns')) {
      wp_insert_post([
        'post_title' => 'Online Return Center',
        'post_content' => "[USPSreturns]",
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',
      ]);
    }
  }

  public function the_slug_exists($post_name)
  {
    /**
     * check if the page already exists
     */
    global $wpdb;
    return $wpdb->get_row(
      "SELECT post_name FROM $wpdb->posts WHERE post_name = '" .
        $post_name .
        "'",
      'ARRAY_A'
    );
  }

  public function uspsrw_get_template($located, $template_name)
  {
    if ('template/usps-returns.php' === $template_name) {
      return plugin_dir_path(__FILE__) . $template_name;
    }

    return $located;
  }

  public function USPS_returns_shortcode()
  {
    /**
     * shortcode gets usps-returns
     */
    ob_start();
    wc_get_template('template/usps-returns.php');
    return ob_get_clean();
  }
}

new USPSRW();
