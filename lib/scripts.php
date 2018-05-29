<?php //CSSやJSファイルの呼び出し

add_action( 'wp_enqueue_scripts', 'wp_enqueue_scripts_custom', 1 );
if ( !function_exists( 'wp_enqueue_scripts_custom' ) ):
function wp_enqueue_scripts_custom() {
////////////////////////////////////////////////////////////////
//
//スタイルシートの呼び出し
//
////////////////////////////////////////////////////////////////


  ///////////////////////////////////////////
  //テーマスタイルの呼び出し
  ///////////////////////////////////////////
  wp_enqueue_style( THEME_NAME.'-style', get_template_directory_uri() . '/style.css' );

  ///////////////////////////////////////////
  //Font Awesome
  ///////////////////////////////////////////
  wp_enqueue_style( 'font-awesome-style', FONT_AWESOME_CDN_URL );

  ///////////////////////////////////////////
  //設定変更に必要なCSS
  ///////////////////////////////////////////
  wp_add_css_custome_to_inline_style();


  ///////////////////////////////////////////
  //IcoMoon
  ///////////////////////////////////////////
  wp_enqueue_style( 'icomoon-style', get_template_directory_uri() . '/webfonts/icomoon/style.css' );

  ///////////////////////////////////////////
  //ソースコードのハイライト表示
  ///////////////////////////////////////////
  wp_enqueue_highlight_js();

  ///////////////////////////////////
  //画像リンク拡大効果がLightboxのとき
  ///////////////////////////////////
  wp_enqueue_lightbox();

  ///////////////////////////////////
  //画像リンク拡大効果がLityのとき
  ///////////////////////////////////
  wp_enqueue_lity();

  ///////////////////////////////////
  //画像リンク拡大効果がbaguetteboxのとき
  ///////////////////////////////////
  wp_enqueue_baguettebox();

  ///////////////////////////////////
  //サイドバー追従領域やグローバルナビの追従用
  ///////////////////////////////////
  //wp_enqueue_clingify();

  ///////////////////////////////////
  //サイドバー追従領域やグローバルナビの追従用
  ///////////////////////////////////
  wp_enqueue_stickyfill();

  ///////////////////////////////////
  //カルーセル用
  ///////////////////////////////////
  wp_enqueue_slick();

  ///////////////////////////////////
  //ツリー型モバイルボタン
  ///////////////////////////////////
  wp_enqueue_slicknav();


  ///////////////////////////////////////////
  //Google Fonts
  ///////////////////////////////////////////
  wp_enqueue_google_fonts();

////////////////////////////////////////////////////////////////
//
//スキンスタイルの呼び出し
//
////////////////////////////////////////////////////////////////
  if (get_skin_url()) {
    ///////////////////////////////////////////
    //子テーマのstyle.css
    ///////////////////////////////////////////
    wp_enqueue_style( THEME_NAME.'-skin-style', get_skin_url() );

  }

////////////////////////////////////////////////////////////////
//
//子テーマスタイルの呼び出し
//
////////////////////////////////////////////////////////////////
  if (is_child_theme()) {
    ///////////////////////////////////////////
    //子テーマのstyle.css
    ///////////////////////////////////////////
    wp_enqueue_style( THEME_NAME.'-child-style', get_stylesheet_directory_uri() . '/style.css' );

  }

////////////////////////////////////////////////////////////////
//
//Wordpress関係スクリプトの呼び出し
//
////////////////////////////////////////////////////////////////

  ///////////////////////////////////////////
  //jQueryの読み込み
  ///////////////////////////////////////////
  //wp_enqueue_script('jquery');

  //レンダリングをブロックしている jQuery, jQuery-migrate をフッタに移動する
  if (!is_admin()) {
    wp_deregister_script('jquery');
    //wp_deregister_script('jquery-core');
    wp_deregister_script('jquery-migrate');

    wp_register_script('jquery', false, array('jquery-core', 'jquery-migrate'), '1.12.4', true);
    wp_enqueue_script('jquery');

    wp_enqueue_script('jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4', true);
    wp_enqueue_script('jquery-migrate', '//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.4.1/jquery-migrate.min.js', array(), '1.4.1', true);

    //タイルカード
    if (is_entry_card_type_tile_card() && !is_singular()) {
      //wp_deregister_script('jquery-masonry');
      wp_register_script('jquery-masonry', false, array('jquery'), false, true);
      wp_enqueue_script('jquery-masonry');
      //実行コードの記入
      $data = "
        (function($){
          $('#list').masonry({ //#listは記事一覧を囲んでる部分
            itemSelector: '.entry-card-wrap', //.entry-card-wrapは各記事を囲んでる部分
            isAnimated: true //アニメーションON
          });
        })(jQuery);
        // jQuery(function(){
        //   jQuery('#list').masonry({ //#listは記事一覧を囲んでる部分
        //     itemSelector: '.entry-card-wrap', //.entry-card-wrapは各記事を囲んでる部分
        //     isAnimated: true //アニメーションON
        //   });
        // });
      ";
      wp_add_inline_script( 'jquery-masonry', $data, 'after' );
      }

  }


  ///////////////////////////////////////////
  //コメント返信時のフォームの移動（WPライブラリから呼び出し）
  ///////////////////////////////////////////
  if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

  ///////////////////////////////////////////
  //テーマ内で使用するJavaScript関数をまとめて定義する外部ファイルを呼び出す（javascript.js）
  ///////////////////////////////////////////
  wp_enqueue_script( THEME_JS, get_template_directory_uri() . '/javascript.js', array( 'jquery' ), false, true );

  ///////////////////////////////////
  //はてブシェアボタン用のスクリプト呼び出し
  ///////////////////////////////////
  if ( is_bottom_hatebu_share_button_visible() && is_singular() ){
    wp_enqueue_script( 'st-hatena-js', '//b.st-hatena.com/js/bookmark_button.js', array(), false, true );
  }

  ///////////////////////////////////
  //Pinterest用のスクリプト呼び出し
  ///////////////////////////////////
  //wp_enqueue_script( 'pinterest-js', '//assets.pinterest.com/js/pinit.js', array(), false, true );

////////////////////////////////////////////////////////////////
//
//スキンscriptの呼び出し
//
////////////////////////////////////////////////////////////////
  if (is_child_theme()) {
    ///////////////////////////////////////////
    //子テーマのjavascript.js
    ///////////////////////////////////////////
    $js_url = get_skin_js_url();
    $js_path = url_to_local($js_url);
    //javascript.jsファイルがスキンフォルダに存在する場合
    if ($js_url && file_exists($js_path)) {
      //var_dump($js_path);
      wp_enqueue_script( THEME_SKIN_JS, $js_url, array( 'jquery', THEME_JS ), false, true );
    }


  }

////////////////////////////////////////////////////////////////
//
//子テーマscriptの呼び出し
//
////////////////////////////////////////////////////////////////
  if (is_child_theme()) {
    ///////////////////////////////////////////
    //子テーマのjavascript.js
    ///////////////////////////////////////////
    wp_enqueue_script( THEME_CHILD_JS, get_stylesheet_directory_uri() . '/javascript.js', array( 'jquery', THEME_JS ), false, true );

  }


}
endif;
