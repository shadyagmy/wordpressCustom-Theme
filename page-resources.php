<?php
/* Template Name : Resources */

// get header
get_header(); 

$thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) )

?>

<!-- FEATURE IMAGE
================================================== -->
<?php if( has_post_thumbnail() ) { ?>
	<section class="feature-image feature-image-default" 
			style="background : url('<?php echo $thumbnail_url; ?>') no-repeat; background-size : cover; " data-type="background" data-speed="2">
		<h1><?php the_title(); ?></h1>
	</section>
<?php } else { ?>
	<section class="feature-image feature-image-default" data-type="background" data-speed="2">
		<h1><?php the_title(); ?></h1>
	</section>

<?php } ?>


<!-- MAIN CONTENT
================================================== -->
<div class="container">
	<div class="row" id="primary">
	
		<div id="content" class="col-sm-12">
			
			<section class="main-content">
				<?php while (have_posts()) : the_post(); ?>
					<?php  the_content(); ?>
				<?php endwhile; ?>

				<?php $loop = new WP_Query(array('post_type' => 'resource',
				'orderby' => 'post_id', 'order' => 'ASC') )   ?>

				<hr>

				<div class="resource-row clearfix">
					
					<?php while($loop->have_posts() ) : $loop->the_post();  ?>

					<?php
						$image_resource = get_field('resource_image');
						$URL_resource = get_field('resource_url');
						$Button_Text = get_field('button_text');
					 ?>

						<div class="resource">
							<img src="<?php echo $image_resource['url']?>"alt="<?php $image_resource['alt']?>">
							<h3><a href="<?php $URL_resource; ?>"><?php the_title(); ?></a></h3>
							<?php the_content(); ?>

							<?php if ( !empty($Button_Text)) :  ?>
								<a href="<?php $URL_resource; ?>" class="btn btn-success"><?php echo $Button_Text;?></a>
							<?php endif; ?>
							
						</div>
		
					<?php endwhile; wp_reset_query(); ?>

	
				</div>
			</section>
			
		</div><!-- content -->
				
	</div><!-- primary -->
</div><!-- container -->


<!-- get footer -->
<?php get_footer(); ?>

