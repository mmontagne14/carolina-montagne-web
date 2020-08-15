<?php
/**
 * astra-realstate Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package astra-realstate
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_REALSTATE_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {
	wp_enqueue_style( 'astra-realstate-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_REALSTATE_VERSION, 'all' );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );


/**
 * LightSlider Scripts
 */
function ls_scripts_styles() {
	wp_enqueue_style( 'lightslidercss', get_stylesheet_directory_uri(). '/css/lightslider.min.css' , array(), '1.0.0', 'all' );
	wp_enqueue_script( 'lightsliderjs', get_stylesheet_directory_uri(). '/js/lightslider.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'lightsliderinit', get_stylesheet_directory_uri(). '/js/lightslider-init.js', array( 'lightsliderjs' ), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'ls_scripts_styles', 20 );

add_filter( 'astra_single_post_navigation_enabled', '__return_false' );


function mySort($a, $b) {
    if($a['menu_order'] == $b['menu_order']) {
        return 0;
    }
    return ($a['menu_order'] < $b['menu_order']) ? -1 : 1;
}


function get_listados_data($post_Id = integer, $post_type = string){
			if($post_type == 'listados')
			{
				//$campos_listado = get_post_custom( $post_Id ); 
				$images = acf_photo_gallery('fotos', $post_Id); 
				$customFields = get_field_objects();
				usort($customFields,"mySort");

				if( count($images) )
				{ ?> 
					<div class="demo">
					</br></br>
					<ul id="light-slider" class="image-gallery"> <?php
		        	foreach($images as $image)
	        		{
	            	$id = $image['id']; // The attachment id of the media
		            $title = $image['title']; //The title
		            $caption= $image['caption']; //The caption
		            $full_image_url= $image['full_image_url']; //Full size image url
		            $full_image_url = acf_photo_gallery_resize_image($full_image_url, 800, 480); //Resized size to 262px width by 160px height image url
		            $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
		            $thumbnail_image_url= acf_photo_gallery_resize_image($thumbnail_image_url, 100, 100);
		            $url= $image['url']; //Goto any link when clicked
		            $target= $image['target']; //Open normal or new tab
		            $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
		            $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
					?> 
	               
		            <li data-thumb="<?php echo $thumbnail_image_url; ?>">
		                <?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )?> 'target="_blank"': ''; <?php } ?>
		            <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
		            <?php if( !empty($url) ){ ?></a><?php } ?>
		            </li>
	        		<?php } ?>
	        		</ul>
	        		</div>
				<?php
				}
				?> 
			
			</br></br>

			<?php
			if($customFields){
				$count = 1;
				?>
				<div class="grid-striped">
					<div class="row listados_fields">
				<?php			
				foreach ($customFields as $customField) {
					?>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="col-md-6 listados_label">
							<?php echo $customField['label'].':' ?>
						</div>
						<div class="col-md-6">
							<?php	
								if($customField['value'] != ''){
									if($customField['type'] == 'checkbox'){
										foreach ($customField['value'] as $value) {
											echo '<li class="package-inclusion">' . $value . '</li>';
										}
									}else{
								if(array_key_exists('prepend',$customField) && $customField['prepend']) {echo $customField['prepend'];}
								if($customField['label'] == 'Estado'){
									if($customField['value'] == 'Disponible'){ ?>
										<div class='inmueble-disponible'>  <?php
									}else{ ?>
										<div class='inmueble-nodisponible'> <?php
									}
									
									echo $customField['value'];  ?>
									</div>
									<?php
								}else{
									echo $customField['value'];
									}
								if(array_key_exists('append',$customField) && $customField['append']) {echo $customField['append'];}
							}
							}else{
								echo ' - ';
							}
							?>
						</div>
					</div>
					<?php	
					if($count%2==0 && count($customFields)>$count){ ?>
							</div>
							<div class="row listados_fields"> 
					<?php	}							
					$count = $count + 1;
				} ?>
				</div>
				</div>
	<?php	}


			?>
	<?php	}
};

?>