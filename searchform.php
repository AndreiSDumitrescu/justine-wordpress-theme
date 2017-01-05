<h3 class="sr-only hidden">Search form</h3>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-container">
        <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label', 'justine' ); ?></label>
        <input type="text" class="search-input" placeholder="Enter search term..." value="<?php echo get_search_query(); ?>" name="s" id="s" />
        <button type="submit" id="searchsubmit" class="search-button"><i class="fa fa-search"></i></button>
    </div>
</form>