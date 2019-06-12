<?php
/**
 * The default template for displaying content
 *
 * Used for pages.
 *
 * @package Hestia
 * @since Hestia 1.0
 */
?>

<?php
$sidebar_layout = apply_filters( 'hestia_sidebar_layout', get_theme_mod( 'hestia_page_sidebar_layout', 'full-width' ) );
$wrap_class     = apply_filters( 'hestia_filter_page_content_classes', 'col-md-8 page-content-wrap ' );
?>

	<article id="post-<?php the_ID(); ?>" class="section section-text">
	<!-- Titre des évements -->
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="row">
			<?php
			if ( $sidebar_layout === 'sidebar-left' ) {
				do_action( 'hestia_page_sidebar' );
			}
			?>
			<div class="<?php echo esc_attr( $wrap_class ); ?>">
				<?php
				do_action( 'hestia_before_page_content' );

				the_content();

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
			</div>
			<?php
			if ( $sidebar_layout === 'sidebar-right' ) {
				do_action( 'hestia_page_sidebar' );
			}
			?>
		</div>
		 <?php /* Permet de rajouter les liens pour modifier les éléments
		edit_post_link(
			sprintf(
				//translators: %s: Name of current post
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);*/
		?>
	</article>
<?php
if ( is_paged() ) {
	hestia_single_pagination();
}
