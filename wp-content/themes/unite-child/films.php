<?php 
/*
Template Name: Films Page
Template Post Types: films
*/
?>

div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
                
                //Returns Array of Term for "my_taxonomy"
                $terms = get_the_terms( get_the_ID(), 'genre' );

                if ( $terms && ! is_wp_error( $terms ) ) : 

                    $terms_links = array();

                    foreach ( $terms as $term ) {
                        $terms_links[] = $term->name;
                    }

                    $on_terms = join( ", ", $terms_links );
                    ?>

                    <p>
                        <?php printf( esc_html__( 'Categories : <span>%s</span>', 'textdomain' ), esc_html( $on_terms ) ); ?>
                    </p>
                <?php endif; ?>
            
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>