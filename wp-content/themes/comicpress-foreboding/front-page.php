
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<title><?php 
	bloginfo('name');
	$bloginfo_description = get_bloginfo('description');
	if (is_home () && !empty($bloginfo_description)) {
		echo ' - '; bloginfo('description');
	} elseif (is_category() ) {
		echo ' - '; single_cat_title();
	} elseif (is_single() || is_page() ) { 
		echo ' - '; single_post_title();
	} elseif (is_search() ) { 
		echo __(' search results: ','comicpress'); echo esc_html($s);
	} else { 
		echo ' - '; wp_title('',true);
	}
  ?></title>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	<meta name="ComicPress" content="<?php echo comicpress_themeinfo('version'); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if (comicpress_themeinfo('enable_caps')) { ?><div id="page-head"></div><?php } ?>
<?php if (is_cp_theme_layout('2cr,2cl,2cvr,2cvl')) { ?>
<div id="page-wrap"><!-- Wraps outside the site width -->
	<div id="page"><!-- Defines entire site width - Ends in Footer -->
<?php } else { ?>
<div id="page-wide-wrap"><!-- Wraps outside the site width -->
	<div id="page-wide"><!-- Defines entire site width - Ends in Footer -->
<?php } ?>

<div id="header">
	<?php do_action('comicpress-header'); ?>
	<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a></h1>
	<div class="description"><?php bloginfo('description') ?></div>
	<?php if (is_active_sidebar('header')) get_sidebar('header'); ?>
	<div class="clear"></div>
</div>
		
<?php 
if (!comicpress_themeinfo('disable_default_menubar')) comicpress_menubar();
if (is_active_sidebar('menubar')) get_sidebar('menubar');
if (comicpress_themeinfo('enable_caps')) { ?><div id="content-wrapper-head"></div><?php } ?>
<div id="content-wrapper">
	<?php if (is_cp_theme_layout('2cr,2cl,3c,3c2l,3c2r')) do_action('comic-area'); ?>
	<?php if (comicpress_themeinfo('enable_caps')) { ?><div id="subcontent-wrapper-head"></div><?php } ?>
	<div id="subcontent-wrapper">
		
		
		<?php if (is_cp_theme_layout('2cvr,2cvl,v3c,v3cr,v3cl,lgn,rgn')) { ?>
			<div id="section-wrap">
			<?php do_action('comic-area');?>
		<?php } ?>
		
		<div id="content" class="narrowcolumn frontpage">
			<?php if (is_active_sidebar('over-blog')) get_sidebar('overblog'); ?>

<?php 
$is_comic = false;

while (have_posts()) : the_post();

?>
		<div <?php post_class(); ?>>
			<?php comicpress_display_post_thumbnail($is_comic); ?>
			<?php if (comicpress_themeinfo('enable_caps')) { ?><div class="post-head"></div><?php } ?>
			<div class="post-content">
				<div class="post-info">
					<div class="post-text">
						<?php comicpress_display_post_title($is_comic); ?>
					</div>
				</div>
				<div class="clear"></div>
				<div class="entry">
					<?php comicpress_display_the_content($is_comic); ?>
					<div class="clear"></div>
				</div>
				<?php wp_link_pages(array('before' => '<div class="linkpages"><span class="linkpages-pagetext">'.__('Pages:','comicpress').'</span> ', 'after' => '</div>', 'next_or_number' => 'number'));  ?>
				<?php edit_post_link(__('Edit this page.','comicpress'), '', ''); ?>
			</div>
			<?php if (comicpress_themeinfo('enable_caps')) { ?><div class="post-foot"></div><?php } ?>
		</div>
<?php 
	if ('open' == $post->comment_status) {
		comments_template('', true);
	}
endwhile;
?>
	</div><!-- Ends "page/page-wide" -->
</div><!-- Ends "page-wrap" -->

<?php if (comicpress_themeinfo('enable_caps')) { ?><div id="page-foot"></div><?php } ?>

<?php wp_footer(); ?>
</body>
</html>
?>