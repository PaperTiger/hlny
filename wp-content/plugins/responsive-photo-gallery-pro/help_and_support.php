<div class="row-fluid pricing-table pricing-three-column" style="margin-top: 10px; display:block; width:100%; overflow:hidden; background:white; box-shadow: 0 0 5px hsla(0, 0%, 20%, 0.3);padding-bottom:70px">
	<div class="plan-name" style="margin-top:20px;text-align: center;">
        <h2 style="font-weight: bold;font-size: 36px;padding-top: 30px;padding-bottom: 10px;color:#D9534F;">Responsive Photo Gallery Pro</h2>
		<h6 style="font-size: 21px;padding-top: 10px;padding-bottom: 10px;margin-left:11px;font-family: Open Sans,sans-serif;
    line-height: 1.6em;">Responsive Photo Gallery Pro allow you to add unlimited images galleries integrated with various light box, animation hover effects, font styles, icons, colors.</h6>
    </div>
	<hr>
	<div class="purchase_btn_div" style="margin-top:20px; margin-left:30px;">
		<h2 style="font-weight: bold;font-size: 24px;padding-top: 30px;">View Support Docs or Open a Ticket</h2>	
		<a  style= "margin-right:10px; margin-left:40px; margin-top:30px; text-decoration:none;" href="https://weblizar.com/forum/" target="_new" class="btn btn-primary btn-lg"><?php _e('View Support Docs or Open a Ticket','')?></a>		
	</div>
	<hr>
	
	<div style="margin-top:40px; margin-left:30px;">
		<h2 style="font-weight: bold;font-size: 34px;padding-top: 30px;">Rate Us</h2>
		<h6 style="font-size: 22px;padding-top: 10px;padding-bottom: 10px;line-height:40px">If you are enjoying using our <b>Responsive Photo Gallery Pro</b> plugin and find it useful, then please consider writing a positive feedback. Your feedback will help us to encourage and support the plugin's continued development and better user support.</h6>
		<style>
			.acl-rate-us  span.dashicons{
			width: 30px;
			height: 30px;
			}
			.acl-rate-us  span.dashicons-star-filled:before {
			content: "\f155";
			font-size: 30px;
			}
			.acl-rate-us {
				color : #FBD229 !important;
				padding-top:5px !important;
			}
			
			.acl-rate-us span{
				display:inline-block;
			}
		</style>
		<div style="background:#EF4238;display:inline-block;">
		<a class="acl-rate-us" style="text-align:center; text-decoration: none;font:normal 30px/l; " href="https://wordpress.org/plugins/responsive-photo-gallery/" target="_blank" >
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
		</a>
		</div>
	</div>
	<hr>
	<div style="margin-top:30px;margin-left:30px;">
		<h2 style="font-weight: bold;font-size: 28px;padding-top: 30px;">Share Us Your Suggestion</h2>
		<h6 style="font-size: 18px;padding-top: 10px;padding-bottom: 10px;line-height:50px;">If you have any suggestion or features in your mind then please share us. We will try our best to add them in this plugin. </h6>
	</div>
	<hr>
	<div style="margin-top:30px;margin-left:30px;">
		<h2 style="font-weight: bold;font-size: 28px;padding-top:10px;">Language Contribution </h2>
		<h6 style="font-size: 18px;padding-top: 20px;padding-bottom: 10px;line-height:30px;margin-left:30px;">Translate this plugin into your language <br> Question : How to convert Plguin into My Language ? <br> Answer : Contact as to lizarweb@gmail.com  for translate this plugin into your language.</h6>
		
	</div>
	<hr>
	<div style="margin-top:30px;margin-left:30px;">
		<h2 style="font-weight: bold;font-size: 28px;padding-top:10px;">Change Old Server Image URL</h2>
		<form action="" method="post">
			<input type="submit" value="Change image URL" name= "rpgpchangeurl" style= "margin-top:10px; margin-right:10px; margin-left:30px; background:#31B0D5; text-decoration:none;" class="btn btn-primary btn-lg">
			
			<h6 style="font-size: 22px;padding-top: 10px;padding-bottom: 10px;line-height:40px"><b>Note:</b> Use this option after import <b>Responsive Photo Gallery Pro Settings</b> to change old server image url to new server image url.</h6>
		</form>
	</div>
</div>
<?php
if(isset($_REQUEST['rpgpchangeurl']) )
{		
	$all_posts = wp_count_posts( 'rpgp_gallery')->publish;
	$args = array('post_type' => 'rpgp_gallery', 'posts_per_page' =>$all_posts);
	global $rpg_galleries;
	$rpg_galleries = new WP_Query( $args );		

	while ( $rpg_galleries->have_posts() ) : $rpg_galleries->the_post();
	
		
		$RPGP_Id = get_the_ID();
		$RPGP_AllPhotosDetails = unserialize(base64_decode(get_post_meta( $RPGP_Id, 'rpgp_all_photos_details', true)));
		
		$TotalImages =  get_post_meta( $RPGP_Id, 'rpgp_total_images_count', true );
		
		if($TotalImages) {
			foreach($RPGP_AllPhotosDetails as $RPGP_SinglePhotoDetails) {
				$name = $RPGP_SinglePhotoDetails['rpgp_image_label'];
				$url = $RPGP_SinglePhotoDetails['rpgp_image_url'];
				$url1 = $RPGP_SinglePhotoDetails['rpgp_12_thumb'];
				$url2 = $RPGP_SinglePhotoDetails['rpgp_346_thumb'];
				$url3 = $RPGP_SinglePhotoDetails['rpgp_12_same_size_thumb'];
				$url4 = $RPGP_SinglePhotoDetails['rpgp_346_same_size_thumb'];
				
				//die($url.$url2.$url3.$url4.$url5.$url6.$circle);
				$upload_dir = wp_upload_dir();
				$data = $url;
				if (strpos($data,'uploads') !== false) {
					list($oteher_path, $image_path) = explode("uploads", $data);
					$url = $upload_dir['baseurl']. $image_path;
				}
				
				$data = $url1;
				if (strpos($data,'uploads') !== false) {
					list($oteher_path, $image_path) = explode("uploads", $data);
					$url1 = $upload_dir['baseurl']. $image_path;
				}
				
				$data = $url2;
				if (strpos($data,'uploads') !== false) {
					list($oteher_path, $image_path) = explode("uploads", $data);
					$url2 = $upload_dir['baseurl']. $image_path;
				}
				
				$data = $url3;
				if (strpos($data,'uploads') !== false) {
					list($oteher_path, $image_path) = explode("uploads", $data);
					$url3 = $upload_dir['baseurl']. $image_path;
				}
				
				$data = $url4;
				if (strpos($data,'uploads') !== false) {
					list($oteher_path, $image_path) = explode("uploads", $data);
					$url4 = $upload_dir['baseurl']. $image_path;
				}
				
				
				$ImagesArray[] = array(
					'rpgp_image_label' => $name,
					'rpgp_image_url' => $url,
					'rpgp_12_thumb' => $url1,
					'rpgp_346_thumb' => $url2,
					'rpgp_12_same_size_thumb' => $url3,
					'rpgp_346_same_size_thumb' => $url4
				);
				
			}
			update_post_meta($RPGP_Id, 'rpgp_all_photos_details', base64_encode(serialize($ImagesArray)));
			$ImagesArray="";
		}
	
	endwhile; 
}

?>