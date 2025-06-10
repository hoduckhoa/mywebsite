<div id="site-searchform" class="search wow fadeInRight">
	<form action="<?php echo esc_url(home_url('/') ); ?>" method="get">
	    <input type="text" name="s" id="s" class="form-control" placeholder="<?php esc_html_e('Enter Search Keywords...', 'nivo'); ?>" value="<?php the_search_query(); ?>" />
        <button type="submit" id="searchsubmit" ><i class="fa fa-search"></i></button>
	</form>
</div>
