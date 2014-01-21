<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>

<html>

<head>

	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="description" content="湖南省工业设计协会" />
    <meta name="keywords" content="工业设计协会，湖南省工业设计协会" />
    <title><?php wp_title("|",true,"right"); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/search.css" />


	<script src="<?php echo get_template_directory_uri(); ?>/js/frontend/lib/jquery-1.10.2.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/googleAnalytics.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/HNID.UIManager.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/search.js"></script>

</head>

<!--头部-->

<?php get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">搜索：<?php echo get_search_query(); ?></h1>
			</header>

			<ul class="post-list">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post();
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
                    $showDir=get_template_directory_uri()."/images/frontend/app/thumb_default_500.png";
                }

			?>
				<li>

					<div class="post_thumb">

						<img src="<?php echo $showDir ?>">

					</div>

					<div class="post_abstract">

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<p><?php echo get_the_date(); ?></p>

						<p><?php echo get_the_excerpt(); ?></p>

						<!--标签-->
						<?php echo get_the_tag_list('<ul class="entry-tags"><li>','</li><li>','</li></ul>');?>

					</div>

					<a href="<?php the_permalink(); ?>" class="hnid_btn_more">详情</a>

				</li>

			<?php endwhile; ?>

			</ul>

			<div class="hnid_pagination">

				<?php

				global $wp_query;

				$total=$wp_query->max_num_pages;

				if($total>1){

					if ( !$current_page = get_query_var('paged') ){

						$current_page = 1;

					}

					//获取路径

					$permalink_structure = get_option('permalink_structure');

					$format = empty( $permalink_structure) ? '&page=%#%' : '/page/%#%/';

					echo paginate_links(array('base' => get_pagenum_link(1) . '%_%', 'format'=>$format,'current' => $current_page,'total' => $total,'mid_size' => 4, 'type' => 'list'));

				}

				?>

			</div>

		<?php else : ?>

			<header class="page-header">
				<h1 class="page-title">很抱歉，我们无法找到您需要的内容，请尝试其他栏目。</h1>
			</header>

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>