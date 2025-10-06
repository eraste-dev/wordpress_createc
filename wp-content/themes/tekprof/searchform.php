<?php

/**
 * Template for displaying search forms
 *
 * @package Tekprof
 */
?>
<form role="search" method="get" class="tekprof-search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input
        type="search"
        class="search-field"
        placeholder="<?php echo esc_attr_x('Search..', 'placeholder', 'tekprof'); ?>"
        value="<?php echo get_search_query() ?>"
        name="s"
        title="<?php echo esc_attr_x('Enter your keyword', 'label', 'tekprof'); ?>" />
    <button type="submit" class="search-submit"><i class="far fa-search"></i></button>
</form>