<?php //APIのIDなど
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */

//AmazonアクセスキーID
define('OP_AMAZON_API_ACCESS_KEY_ID', 'amazon_api_access_key_id');
if ( !function_exists( 'get_amazon_api_access_key_id' ) ):
function get_amazon_api_access_key_id(){
  return get_theme_option(OP_AMAZON_API_ACCESS_KEY_ID);
}
endif;

//Amazonシークレットキー
define('OP_AMAZON_API_SECRET_KEY', 'amazon_api_secret_key');
if ( !function_exists( 'get_amazon_api_secret_key' ) ):
function get_amazon_api_secret_key(){
  return get_theme_option(OP_AMAZON_API_SECRET_KEY);
}
endif;

//AmazonトラッキングID
define('OP_AMAZON_ASSOCIATE_TRACKING_ID', 'amazon_associate_tracking_id');
if ( !function_exists( 'get_amazon_associate_tracking_id' ) ):
function get_amazon_associate_tracking_id(){
  return get_theme_option(OP_AMAZON_ASSOCIATE_TRACKING_ID);
}
endif;

//Amazon検索ボタンを表示する
define('OP_AMAZON_SEARCH_BUTTON_VISIBLE', 'amazon_search_button_visible');
if ( !function_exists( 'is_amazon_search_button_visible' ) ):
function is_amazon_search_button_visible(){
  return get_theme_option(OP_AMAZON_SEARCH_BUTTON_VISIBLE, 1);
}
endif;

//楽天アフィリエイトID
define('OP_RAKUTEN_AFFILIATE_ID', 'rakuten_affiliate_id');
if ( !function_exists( 'get_rakuten_affiliate_id' ) ):
function get_rakuten_affiliate_id(){
  return get_theme_option(OP_RAKUTEN_AFFILIATE_ID);
}
endif;

//楽天検索ボタンを表示する
define('OP_RAKUTEN_SEARCH_BUTTON_VISIBLE', 'rakuten_search_button_visible');
if ( !function_exists( 'is_rakuten_search_button_visible' ) ):
function is_rakuten_search_button_visible(){
  return get_theme_option(OP_RAKUTEN_SEARCH_BUTTON_VISIBLE, 1);
}
endif;

//Yahoo!バリューコマースSID
define('OP_YAHOO_VALUECOMMERCE_SID', 'yahoo_valuecommerce_sid');
if ( !function_exists( 'get_yahoo_valuecommerce_sid' ) ):
function get_yahoo_valuecommerce_sid(){
  return get_theme_option(OP_YAHOO_VALUECOMMERCE_SID);
}
endif;

//Yahoo!バリューコマースPID
define('OP_YAHOO_VALUECOMMERCE_PID', 'yahoo_valuecommerce_pid');
if ( !function_exists( 'get_yahoo_valuecommerce_pid' ) ):
function get_yahoo_valuecommerce_pid(){
  return get_theme_option(OP_YAHOO_VALUECOMMERCE_PID);
}
endif;

//Yahoo!検索ボタンを表示する
define('OP_YAHOO_SEARCH_BUTTON_VISIBLE', 'yahoo_search_button_visible');
if ( !function_exists( 'is_yahoo_search_button_visible' ) ):
function is_yahoo_search_button_visible(){
  return get_theme_option(OP_YAHOO_SEARCH_BUTTON_VISIBLE, 1);
}
endif;

//APIキャッシュの保存期間
define('OP_API_CACHE_RETENTION_PERIOD', 'api_cache_retention_period');
if ( !function_exists( 'get_api_cache_retention_period' ) ):
function get_api_cache_retention_period(){
  return get_theme_option(OP_API_CACHE_RETENTION_PERIOD, 60);
}
endif;