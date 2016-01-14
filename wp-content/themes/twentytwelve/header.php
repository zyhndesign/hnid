<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
$main_menu_id=1503;

$side_menu_id=1504;
?>
<body>
<div class="hnid_header_bg">

</div>
<header class="hnid_header">
    <h1 id="hnid_logo" class="hnid_logo">
        <a href="<?php echo site_url(); ?>">湖南省工业设计创新平台-Hunan Innovation Platform for Industrial Design</a>
    </h1>
    <nav id="hnid_top_nav" class="hnid_top_nav">
        <ul>

            <?php
                $main_items = wp_get_nav_menu_items($main_menu_id);
                foreach ($main_items as $key => $menu_item ) {
                    $title = $menu_item->title;
                    $url = $menu_item->url;
                    if($key==0){
                        $class_name="hnid_nav_news";
                    }else if($key==1){
                        $class_name="hnid_nav_innovation";
                    }else if($key==2){
                        $class_name="hnid_nav_product";
                    }else if($key==3){
                        $class_name="hnid_nav_resource";
                    }else if($key==4){
                        $class_name="hnid_nav_lotusprize";
                    }else{
                        $class_name="hnid_nav_cidic";
                    }
                    echo '<li><a class="'.$class_name.'" href="' . $url . '">' . $title . '</a></li>';
                }
            ?>

        </ul>
    </nav>

    <a id="hnid_expand_menu_btn" class="hnid_expand_menu_btn" href="#">协会...</a>

    <nav id="hnid_sub_nav" class="hnid_sub_nav">
        <ul>
            <?php
                $side_items = wp_get_nav_menu_items($side_menu_id);
                foreach ($side_items as $key => $menu_item ) {
                    $title = $menu_item->title;
                    $url = $menu_item->url;
                    echo '<li><a  href="' . $url . '">' . $title . '</a></li>';
                }
            ?>
            <li>
                <?php /*?><?php get_search_form(); ?><?php */?>
                <form role="search" method="get" id="searchform" class="hnid_search_form" action="http://hnid.org/">
					<input type="text" name="s" id="s" value="搜索..." onblur="if (this.value=='') this.value='搜索...';" onfocus="if (this.value=='搜索...') this.value='';">
					<input type="submit" id="searchsubmit" value="搜索" class="hnid_search_submit">
				</form>
    		</li>
        </ul>
    </nav>
</header>