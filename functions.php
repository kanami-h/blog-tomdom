<?php 
// アイキャッチ画像を使用可能にする
add_theme_support('post-thumbnails');
//カスタムメニュー機能を使用可能にする
add_theme_support('menus');
//ウィジェットエリアの追加
add_action(
    'widgets_init',
    function(){
        register_sidebar(array(
            'id' => 'widget_id001',
            'name' => 'ウィジェットのエリア名',
            'description' => 'ウィジェットエリアについての説明を書きます'
        ));

    }
);
?>
<?php
//パンくずリスト 参考url:https://wemo.tech/356
function breadcrumb(){
    global $post;
    $str = '';
    $pNum = 2;

    $str.= '<div id="breadcrumb">';
    $str.= '<ul class="flex-row">';
    $str.= '<li><a href="'.home_url('/').'" class="home-icon"><i class="fas fa-home home-icon"></i><span>HOME</span></a></li>';

    // 通常の投稿ページ
    if(is_singular('post')){
        $categories = get_the_category($post->ID);
        $cat = $categories[0];

        if($cat->parenet != 0){
            $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
            foreach($ancestors as $ancestor){
                $str.= '<li><a href="'. get_category_link($ancestor).'"><span>'.get_cat_name($ancestor).'</span></a></li>';
            }
        }
        $str.= '<li><a href="'. get_category_link($cat-> term_id). '"><i class="fas fa-caret-right home-icon"></i><span>'.$cat->cat_name.'</span></a></li>';
        $str.= '<li><i class="fas fa-caret-right home-icon"></i><span>'.$post->post_title.'</span></li>';
    }
    //固定ページ
    elseif(is_page()) {
        $pNum = 2;
        if($post->post_parent != 0){
            $ancestors = array_reverse(get_post_ancestors($post->ID));
            foreach($ancestors as $ancestor){
                $str.= '<li><a href="'. get_permalink($ancestor).'"><span>'.get_the_title($ancestor).'</span></a></li>';
            }
        }
        $str.= '<li><i class="fas fa-caret-right home-icon"></i><span>'. $post->post_title.'</span></li>';
    }

    //カテゴリページ
    elseif(is_category()) {
        $cat = get_queried_object();
        $pNum = 2;
        if($cat->parent != 0){
            $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
            foreach($ancestors as $ancestor){
                $str.= '<li><a href="'. get_category_link($ancestor) .'"><span>'.get_cat_name($ancestor).'</span></a></li>';
            }
        }
        $str.= '<li><span>'.$cat->name.'</span></li>';
    }

    /* タグページ */
     elseif(is_tag()){
        $str.= '<li><span>'. single_tag_title('', false). '</span></li>';
     }

    /* 時系列アーカイブページ */
    elseif(is_date()){
        if(get_query_var('day') != 0){
        $str.= '<li><a href="'. get_year_link(get_query_var('year')).'"><span>'.get_query_var('year').'年</span></a></li>';
        $str.= '<li><a  href="'.get_month_link(get_query_var('year'), get_query_var('monthnum')).'"><span>'.get_query_var('monthnum').'月</span></a></li>';
        $str.= '<li><span>'.get_query_var('day'). '</span>日</li>';
    } elseif(get_query_var('monthnum') != 0){
        $str.= '<li><a href="'. get_year_link(get_query_var('year')).'"><span>'.get_query_var('year').'年</span></a></li>';
        $str.= '<li><span>'.get_query_var('monthnum'). '</span>月</li>';
    } else {
        $str.= '<li><span>'.get_query_var('year').'年</span></li>';
    }
  }
    /* 検索結果ページ */
    elseif(is_search()){
        $str.= '<li><span>「'.get_search_query().'」で検索した結果</span></li>';
    }

    /* 404 Not Found ページ */
    elseif(is_404()){
        $str.= '<li><span>お探しの記事は見つかりませんでした。</span></li>';
    }

    /* その他のページ */
    else{
        $str.= '<li><span>'.wp_title('', false).'</span></li>';
    }
    $str.= '</ul>';
    $str.= '</div>';

    echo $str;
}

//twittweショートコード
function shortcode_twitter(){
    return 'こんにちは！Kanami(<a href="https://twitter.com/kanami_tomdom" target="_blank">@kanami_tomdom)</a>です。';
}
add_shortcode('twitter', 'shortcode_twitter');


// ロゴ画像をカスタマイザ〜から設定する
add_action('customize_register', 'theme_customize');
function theme_customize($wp_customize){
    //ロゴ画像
    $wp_customize->add_section('logo_section',array(
        'title' => 'ロゴ画像',
        'priority' => 100,
        'description' => 'ロゴ画像を使用する場合はアップロードしてください。画像を使用しない場合はタイトルがテキストで表示されます。',
    ));
    $wp_customize->add_setting('logo_url');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_url', array(
        'label' => 'ロゴ画像',
        'section' => 'logo_section',
        'settings' => 'logo_url',
        'description' => 'ロゴ画像を設定してください。',
    )));
}

// テーマカスタマイザーで設定された画像のURLを取得
//ロゴ画像
function get_the_logo_url(){
    return esc_url(get_theme_mod('logo_url'));
}

//人気記事を表示させる
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==""){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.'Views';
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==""){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

//カスタマイザーに色の項目を追加する
function theme_customizer_extension($wp_customize) {
    $wp_customize->add_setting( 'header_background_color', array(
    'default' => '#D2FAF4',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
    'label' => 'ヘッダー背景色',
    'section' => 'colors',
    'settings' => 'header_background_color',
    'priority' => 20,
    )));

    $wp_customize->add_setting( 'background_color', array(
        'default' => '#f9fffe',
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
        'label' => '背景色',
        'section' => 'colors',
        'settings' => 'background_color',
        'priority' => 20,
        )));

    $wp_customize->add_setting( 'widgettitle_color', array(
        'default' => '#D2FAF4',
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'widgettitle_color', array(
        'label' => 'ウィジェットタイトル背景色',
        'section' => 'colors',
        'settings' => 'widgettitle_color',
        'priority' => 20,
        )));


   }

   add_action('customize_register', 'theme_customizer_extension');
   
   function customizer_color() {

    $header_background_color = get_theme_mod( 'header_background_color', '#F07878');
    $background_color = get_theme_mod( 'background_color', '#fff7f7');
    $widgettitle_color = get_theme_mod( 'widgettitle_color', '#F07878');

    ?>
    <style type="text/css">
     /* ヘッダー */
    .navbar {
        background-color: <?php echo $header_background_color; ?>;
    }
    /* 背景色 */
    body {
        background-color: <?php echo $background_color; ?>;
    }

    /* ウィジェットタイトル背景色 */
    .widgettitle{
        background-color: <?php echo $widgettitle_color; ?>;
    }
    </style>
    <?php
    }
    add_action( 'wp_head', 'customizer_color');

    

    //商品紹介用コード
    function ua_smt (){
	$ua = $_SERVER['HTTP_USER_AGENT'];
	$ua_list = array('iPhone','iPad','iPod','Android');
	foreach ($ua_list as $ua_smt) {
	if (strpos($ua,$ua_smt) !== false){return true;}
	} return false;
}
 
function itemBox( $atts, $content = null ) {
    $str = do_shortcode($content);
    $val =<<<EOS
        <div class="items" style="display:flex;flex-wrap:wrap;text-align:center;">{$str}</div>
EOS;
    return $val;
}
add_shortcode('items', 'itemBox');
 
function getItems($atts) {
    extract(shortcode_atts(array(
        'img' => '',
		'affiliate' => $url,
        'name' => '',
        'price' => '',
    ), $atts));
 
	if (ua_smt() == true): 
	//1行あたり2つならwidthを50%に、3つなら33.3%に、4つなら25%に、5つなら20%に設定する
	$retHtml .= '<div class="item-sp" style="width:50%">';
	else:
	//1行あたり2つならwidthを50%に、3つなら33.3%に、4つなら25%に、5つなら20%に設定する
	$retHtml .= '<div class="item-pc" style="width:20%">';
	endif;
	$retHtml .= '<a href='.$affiliate.'><img class="bigger" style="margin:0;max-width:100%;padding:10px;width:auto;height:100px;" src="'.$img.'" alt="'.$product.'"></a>';
	$retHtml .=	'<p style="text-align:center;font-size:16px;">'.$name.'<br>'.$price.'円</p>';
	$retHtml .= '</div>';
	return $retHtml;
}
add_shortcode("item", "getItems");
    
?>