<?php /**`advanced-searchform.php`*/ ?>
<form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <h3><?php _e( 'Search By:', 'textdomain' ); ?></h3>

    <!-- PASSING THIS TO TRIGGER THE ADVANCED SEARCH RESULT PAGE FROM functions.php -->
    <input type="hidden" name="search" value="advanced">
     <br>
    <input type="text" value="" placeholder="<?php _e( 'Location', 'textdomain' ); ?>" name="s" id="location" />
    <input type="submit" id="searchsubmit" value="Search" /><br>
    
</form>

<form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <!-- PASSING THIS TO TRIGGER THE ADVANCED SEARCH RESULT PAGE FROM functions.php -->
    <input type="hidden" name="search" value="advanced1">
     <br>
    <input type="text" value="" placeholder="<?php _e( 'title', 'textdomain' ); ?>" name="s" id="title" />
    <input type="submit" id="searchsubmit" value="Search" /><br>

    
</form>

<form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <!-- PASSING THIS TO TRIGGER THE ADVANCED SEARCH RESULT PAGE FROM functions.php -->
    <input type="hidden" name="search" value="advanced2">
     <br>
    <input type="text" value="" placeholder="<?php _e( 'author', 'textdomain' ); ?>" name="s" id="author" />
    <input type="submit" id="searchsubmit" value="Search" /><br>
    
</form>