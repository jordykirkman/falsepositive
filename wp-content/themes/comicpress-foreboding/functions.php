<?php
// Register Sidebar and Define Widgets

add_action( 'widgets_init', 'comicpress_sidebar_init' );

if (!function_exists('comicpress_sidebar_init')) {
function comicpress_sidebar_init() {
	if (comicpress_themeinfo('enable_caps')) {
		$before_widget = "<div id=\"".'%1$s'."\" class=\"widget ".'%2$s'."\">\r\n<div class=\"widget-head\"></div>\r\n<div class=\"widget-content\">\r\n";
		$after_widget = "</div>\r\n<div class=\"widget-foot\"></div>\r\n</div>\r\n";
	} else {
		$before_widget = "<div id=\"".'%1$s'."\" class=\"widget ".'%2$s'."\">\r\n<div class=\"widget-content\">\r\n";
		$after_widget = "</div>\r\n</div>\r\n";
	}
	foreach (array(
				__('Frontpage Sidebar', 'comicpress'),
				__('Left Sidebar', 'comicpress'),
				__('Right Sidebar', 'comicpress'),
				__('Above Header', 'comicpress'),
				__('Header', 'comicpress'),
				__('Menubar', 'comicpress'),
				__('Over Comic', 'comicpress'),
				__('Left of Comic', 'comicpress'),
				__('Right of Comic', 'comicpress'),
				__('Under Comic', 'comicpress'),
				__('Over Blog', 'comicpress'),
				__('Blog', 'comicpress'),
				__('Under Blog', 'comicpress'),
				__('The Footer', 'comicpress')
				) as $sidebartitle) {
					
		register_sidebar(array(
					'name'=> $sidebartitle,
					'id' => sanitize_title($sidebartitle),
//					'description' => $sidebartitle, 
					'before_widget' => $before_widget,
					'after_widget'  => $after_widget,
					'before_title'  => "<h2 class=\"widgettitle\">",
					'after_title'   => "</h2>\r\n"
					));
		}
	}
}

?>
