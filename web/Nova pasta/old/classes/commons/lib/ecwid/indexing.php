<?php

if (!defined('_ENV_PROJECT_BASE')) {
    define('_ENV_PROJECT_BASE', dirName($_SERVER['SCRIPT_FILENAME']));
}

if (!defined('_ENV_LIB_BASE')) {
    define('_ENV_LIB_BASE', _ENV_PROJECT_BASE . '/classes/commons/lib/');
}

if (!defined('_ECWID_PLUGIN_DIR')) {
    define(
        '_ECWID_PLUGIN_DIR',
        _ENV_LIB_BASE . 'ecwid_wordpress_plugin/lib/'
    );
}

require_once _ENV_LIB_BASE . 'ecwid/non_wordpress_ecwid_cart.php';
require_once _ECWID_PLUGIN_DIR . 'JSON.php';
require_once _ECWID_PLUGIN_DIR . 'ecwid_product_api.php';
require_once _ECWID_PLUGIN_DIR . 'EcwidCatalog.php';

class StoreIndexing {
    var $ecwid_catalog;
    var $ecwid_store_id;

    static $cached_dicts = array();

    function StoreIndexing ($store_id, $development=false) {
        $this->ecwid_catalog = new EcwidCatalog(
            $store_id, ecwid_get_store_page_url(), $development
        );
        $this->ecwid_store_id = $store_id;
    }

    function generate_product_dict ($id) {
        $product = $this->ecwid_catalog->ecwid_api->get_product($id);
        return array(
            'ajax_index' => $this->ecwid_catalog->get_product($id),
            'title' => $product['name'],
            'description' => $product['description']
        );
    }

    function generate_category_dict ($id) {
        $category = $this->ecwid_catalog->ecwid_api->get_category($id);
        return array(
            'ajax_index' => $this->ecwid_catalog->get_category($id),
            'default_category_str' => ',"defaultCategoryId=' . $id . '"',
            'title' => $category['name'],
            'description' => $category['description']
        );
    }

    function format_html ($ecwid_dict) {
        $ecwid_dict['ajax_index'] = '<!-- ajax indexing -->' . $ecwid_dict['ajax_index'];
        $ecwid_dict['ajax_index'] .='<!-- /ajax indexing -->';
        $ecwid_dict['description'] = ecwid_prepare_meta_description($ecwid_dict['description']);
        return $ecwid_dict;
    }

    function ecwid_generate_indexing_dict ($default_category=0) {
        if (!isset($_GET['_escaped_fragment_'])) {
            return;
        }
        $array_key = $this->ecwid_store_id . ':' . $default_category;
        if (array_key_exists($array_key, self::$cached_dicts)) {
            return self::$cached_dicts[$array_key];
        }
        $params = ecwid_parse_escaped_fragment($_GET['_escaped_fragment_']);
        $mode = isset($params['mode']) ? $params['mode'] : null;
        $category = $mode == 'category' ? $params['id'] : $default_category;
        if ($mode == 'product') {
            $ecwid_dict = $this->generate_product_dict($params['id']);
        } else {
            $ecwid_dict = $this->generate_category_dict($category);
        }
        self::$cached_dicts[$array_key] = $this->format_html($ecwid_dict);
        return self::$cached_dicts[$array_key];
    }

}
