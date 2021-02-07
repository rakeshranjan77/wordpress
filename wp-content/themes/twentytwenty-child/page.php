<?php get_header(); ?>
<div class="mainbox">
   <div class="leftcol MT30">
      <?php get_template_part( 'advanced', 'searchform' );?>

		<?php
			global $post;
			$postdate       = explode( '-', $cur_date );
			$posts_per_page = 15;
			$args = array(
				'post_type' => 'post', 
				'posts_per_page' => $posts_per_page,
				'post_status' => 'publish',
				'order' => 'DESC',
			);
			$my_query       = new WP_Query( $args );
			if ( $my_query->have_posts() ) {
				while ( $my_query->have_posts() ) :
					$my_query->the_post();
		?>
	    <div class="newslistbx">
		<h3><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
		<span class="byline"><?php echo get_the_date('F j, Y', get_the_ID()).'/' ?><?php echo get_the_author(); ?></span>
		<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 35, '...' ) ); ?></p>
		<div class="clear"></div>
	</div>
	<?php
		endwhile;
	}
	?>
</div>
 <div class="rightcol MT30">
 			<h2>Archives by Month:</h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
		<?php //dynamic_sidebar( 'jbi-right-sidebar' ); ?>
 </div>
</div>

<?php get_footer(); ?>
 