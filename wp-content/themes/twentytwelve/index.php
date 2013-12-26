<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
$headline_id=1505;//头条文章id

$main_items= wp_get_nav_menu_items(1503);//main菜单下的所有items

$recruitment_id=1500;//实习招聘分类id

$notification_id=1501;//通知公告分类id

$worknews_id=1495;//工作动态分类id

$designinnovation_id=1497;//设计资讯分类id

$designproduct_id=12;

$designresource_id=1496;//设计资源分类id
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="description" content="湖南省工业设计协会" />
    <meta name="keywords" content="工业设计协会，湖南省工业设计协会" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/app/index.css" />
    <script src="<?php echo get_template_directory_uri(); ?>/js/libs/jquery-1.10.2.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/app/HNID.UIManager.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/app/googleAnalytics.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/app/index.js"></script>
    <title><?php wp_title("|",true,"right"); ?></title>
</head>
    <!-- 头 部 -->
    <?php get_header() ?>

    <!-- **************** 头条消息 ****************  -->
    <section id="hnid_headline" class="hnid_headline">
        <ul>

            <?php
                // The Query
                $query = new WP_Query(array(
                    "tag_id"=>$headline_id,"posts_per_page"=>4,"orderby"=>'date',"order"=>'DESC'
                ));

                 // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        $post_id=get_the_ID();

                        if($background=get_post_meta($post_id,"zy_background",true)){
                            $background=json_decode($background,true);
                            $background_src=$background["filepath"];
                        }else{
                            $background_src=get_template_directory_uri()."/images/app/00.jpg";
                        }

                        ?>

                        <li>
                            <div class="hnid_headline_bg">
                                <img src="<?php echo $background_src ?>">
                            </div>
                            <div class="hnid_headline_info">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </li>

                        <?php
                    }
                }

                /* Restore original Post Data */
                wp_reset_postdata();

            ?>

        </ul>

        <a href="#" class="hnid_btn_prev">向前</a>
        <a href="#" class="hnid_btn_next">向后</a>
        <a href="<?php echo get_tag_link($headline_id) ?>" class="hnid_btn_more">所有<?php echo get_tag($headline_id)->name ?></a>
    </section>

    <!-- **************** 公告栏 ****************  -->
    <div class="hnid_bulletin_board">

        <!-- ******** 实习招聘 ********  -->
        <section id="hnid_recruitment" class="hnid_bulletin">
            <h2><?php echo get_category($recruitment_id)->name ?></h2>
            <ul>

                <?php
                // The Query
                $query = new WP_Query(array(
                    "cat"=>$recruitment_id,"posts_per_page"=>4,"orderby"=>'date',"order"=>'DESC'
                ));

                // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        $post_id=get_the_ID();

                        ?>

                        <li>
                            <span class="hnid_post_date">[ <?php echo get_the_date("Y-m-d"); ?> ]</span>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>

                        <?php
                    }
                }

                /* Restore original Post Data */
                wp_reset_postdata();

                ?>
            </ul>
            <a href="<?php echo get_category_link($recruitment_id) ?>" class="hnid_btn_more">更多<?php echo get_category($recruitment_id)->name ?></a>
        </section>

        <!-- ******** 通知公告 ********  -->
        <section id="hnid_notification" class="hnid_bulletin hnid_column_50">
            <h2><?php echo get_category($notification_id)->name ?></h2>
            <ul>
                <?php
                // The Query
                $query = new WP_Query(array(
                    "cat"=>$notification_id,"posts_per_page"=>4,"orderby"=>'date',"order"=>'DESC'
                ));

                // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        $post_id=get_the_ID();

                        ?>

                        <li>
                            <span class="hnid_post_date">[ <?php echo get_the_date("Y-m-d"); ?> ]</span>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>

                        <?php
                    }
                }

                /* Restore original Post Data */
                wp_reset_postdata();

                ?>
            </ul>
            <a href="<?php echo get_category_link($notification_id) ?>" class="hnid_btn_more">更多<?php echo get_category($notification_id)->name ?></a>
        </section>
    </div>



    <!-- **************** 工作动态 ****************  -->
    <section id="hnid_news" class="hnid_news">
        <h2><?php echo get_category($worknews_id)->name ?></h2>
        <ul>
            <?php
            // The Query
            $query = new WP_Query(array(
                "cat"=>$worknews_id,"posts_per_page"=>9,"orderby"=>'date',"order"=>'DESC'
            ));

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $post_id=get_the_ID();

                    if(has_post_thumbnail($post_id)){
                        $thumbnail_id=get_post_thumbnail_id($post_id);
                        if(wp_get_attachment_metadata($thumbnail_id)){

                            //如果存在保存媒体文件信息的metadata，那么系统是可以获取出缩略图的
                            $showDir= wp_get_attachment_image_src($thumbnail_id,"post-thumbnail");
                            $showDir=$showDir[0];
                        }else{

                            $guid=get_post($thumbnail_id)->guid;
                            $pathinfo=pathinfo($guid);
                            $filename=substr($guid,strrpos($guid,"/")+1,strrpos($guid,'.')-strrpos($guid,"/")-1);
                            $ext=$pathinfo["extension"];
                            $dirname=$pathinfo["dirname"];

                            //不能获取出缩略图，但是又绑定了，那么是原来迁过来的数据，直接找缩略图文件
                            $showDir=$dirname."/".$filename."-500x500.".$ext;
                        }
                    }else{
                        $showDir=get_template_directory_uri()."/images/app/thumb_default_500.png";
                    }

                    ?>

                    <li>
                        <div class="post_thumb">
                            <img src="<?php  echo $showDir; ?>" />
                        </div>
                        <div class="post_abstract">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </li>

                    <?php
                }
            }

            /* Restore original Post Data */
            wp_reset_postdata();

            ?>

        </ul>

        <a href="#" class="hnid_btn_prev">向前</a>
        <a href="#" class="hnid_btn_next">向后</a>
        <a href="<?php echo get_category_link($worknews_id)?>" class="hnid_btn_more">所有<?php echo get_category($worknews_id)->name ?></a>

    </section>

    <!-- **************** 设计资讯 ****************  -->
    <section id="hnid_innovation" class="hnid_innovation">
        <h2><?php echo get_category($designinnovation_id)->name ?></h2>
        <ul>

            <?php
            // The Query
            $query = new WP_Query(array(
                "cat"=>$designinnovation_id,"posts_per_page"=>12,"orderby"=>'date',"order"=>'DESC'
            ));

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $post_id=get_the_ID();

                    if(has_post_thumbnail($post_id)){
                        $thumbnail_id=get_post_thumbnail_id($post_id);
                        if(wp_get_attachment_metadata($thumbnail_id)){

                            //如果存在保存媒体文件信息的metadata，那么系统是可以获取出缩略图的
                            $showDir= wp_get_attachment_image_src($thumbnail_id,"post-thumbnail");
                            $showDir=$showDir[0];
                        }else{

                            $guid=get_post($thumbnail_id)->guid;
                            $pathinfo=pathinfo($guid);
                            $filename=substr($guid,strrpos($guid,"/")+1,strrpos($guid,'.')-strrpos($guid,"/")-1);
                            $ext=$pathinfo["extension"];
                            $dirname=$pathinfo["dirname"];

                            //不能获取出缩略图，但是又绑定了，那么是原来迁过来的数据，直接找缩略图文件
                            $showDir=$dirname."/".$filename."-500x500.".$ext;
                        }
                    }else{
                        $showDir=get_template_directory_uri()."/images/app/thumb_default_500.png";
                    }

                    ?>

                    <li>
                        <div class="post_thumb">
                            <img src="<?php  echo $showDir; ?>" />
                        </div>
                        <div class="post_abstract">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </li>

                    <?php
                }
            }

            /* Restore original Post Data */
            wp_reset_postdata();

            ?>
        </ul>

        <a href="#" class="hnid_btn_prev">向前</a>
        <a href="#" class="hnid_btn_next">向后</a>
        <a href="<?php echo get_category_link($designinnovation_id)?>" class="hnid_btn_more">所有<?php echo get_category($designinnovation_id)->name ?></a>

    </section>

    <!-- **************** 创新产品 ****************  -->
    <section id="hnid_product" class="hnid_product">
        <h2><?php echo get_category($designproduct_id)->name ?></h2>
        <ul>

            <?php
            // The Query
            $query = new WP_Query(array(
                "cat"=>$designproduct_id,"posts_per_page"=>12,"orderby"=>'date',"order"=>'DESC'
            ));

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $post_id=get_the_ID();

                    if(has_post_thumbnail($post_id)){
                        $thumbnail_id=get_post_thumbnail_id($post_id);
                        if(wp_get_attachment_metadata($thumbnail_id)){

                            //如果存在保存媒体文件信息的metadata，那么系统是可以获取出缩略图的
                            $showDir= wp_get_attachment_image_src($thumbnail_id,"post-thumbnail");
                            $showDir=$showDir[0];
                        }else{

                            $guid=get_post($thumbnail_id)->guid;
                            $pathinfo=pathinfo($guid);
                            $filename=substr($guid,strrpos($guid,"/")+1,strrpos($guid,'.')-strrpos($guid,"/")-1);
                            $ext=$pathinfo["extension"];
                            $dirname=$pathinfo["dirname"];

                            //不能获取出缩略图，但是又绑定了，那么是原来迁过来的数据，直接找缩略图文件
                            $showDir=$dirname."/".$filename."-500x500.".$ext;
                        }
                    }else{
                        $showDir=get_template_directory_uri()."/images/app/thumb_default_500.png";
                    }

                    ?>

                    <li>
                        <div class="post_thumb">
                            <img src="<?php  echo $showDir; ?>" />
                        </div>
                        <div class="post_abstract">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </li>

                <?php
                }
            }

            /* Restore original Post Data */
            wp_reset_postdata();

            ?>
        </ul>

        <a href="#" class="hnid_btn_prev">向前</a>
        <a href="#" class="hnid_btn_next">向后</a>
        <a href="<?php echo get_category_link($designproduct_id)?>" class="hnid_btn_more">所有<?php echo get_category($designproduct_id)->name ?></a>

    </section>


    <!-- **************** 设计资源 ****************  -->
    <section id="hnid_resource" class="hnid_resource">
        <h2><?php echo get_category($designresource_id)->name ?></h2>
        <ul>

            <?php
            // The Query
            $query = new WP_Query(array(
                "cat"=>$designresource_id,"posts_per_page"=>12,"orderby"=>'date',"order"=>'DESC'
            ));

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $post_id=get_the_ID();

                    if(has_post_thumbnail($post_id)){
                        $thumbnail_id=get_post_thumbnail_id($post_id);
                        if(wp_get_attachment_metadata($thumbnail_id)){

                            //如果存在保存媒体文件信息的metadata，那么系统是可以获取出缩略图的
                            $showDir= wp_get_attachment_image_src($thumbnail_id,"post-thumbnail");
                            $showDir=$showDir[0];
                        }else{

                            $guid=get_post($thumbnail_id)->guid;
                            $pathinfo=pathinfo($guid);
                            $filename=substr($guid,strrpos($guid,"/")+1,strrpos($guid,'.')-strrpos($guid,"/")-1);
                            $ext=$pathinfo["extension"];
                            $dirname=$pathinfo["dirname"];

                            //不能获取出缩略图，但是又绑定了，那么是原来迁过来的数据，直接找缩略图文件
                            $showDir=$dirname."/".$filename."-500x500.".$ext;
                        }
                    }else{
                        $showDir=get_template_directory_uri()."/images/app/thumb_default_500.png";
                    }

                    ?>

                    <li>
                        <div class="post_thumb">
                            <img src="<?php  echo $showDir; ?>" />
                        </div>
                        <div class="post_abstract">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </li>

                    <?php
                }
            }

            /* Restore original Post Data */
            wp_reset_postdata();

            ?>

        </ul>

        <a href="<?php echo get_category_link($designresource_id)?>" class="hnid_btn_more">所有<?php echo get_category($designresource_id)->name ?></a>

    </section>

<!--脚部-->
<?php get_footer(); ?>