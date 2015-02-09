<?php

function comicpress_display_comment_link() {
	global $post, $wp_query;
	if ('open' == $post->comment_status && !is_singular()) { ?>
	<div class="comment-link">
		<?php comments_popup_link('<span class="comment-balloon">0</span>Comment ', '<span class="comment-balloon">1</span>Comment ', '<span class="comment-balloon">%</span>Comment '); ?>
	</div>
	<?php
	}
}

?>
