<?php
add_shortcode( 'RPG', 'ResponsivePhotoGalleryProShortCode' );
function ResponsivePhotoGalleryProShortCode( $Id ) {

    ob_start();	
	/**
     * Load Saved Responsive Photo Gallery Settings
     */
    if(!isset($Id['id'])) {
        $Id['id'] = "";
		$WL_Show_Gallery_Title  = "yes";
		$WL_Show_Image_Label    = "yes";
		$WL_Image_Label_Position= "hover";
		$WL_Hover_Animation     = "fade";
		$WL_Gallery_Layout      = "col-md-6";
		$WL_Thumbnail_Layout    = "same-size";
		$WL_Hover_Color         = "#31A3DD";
		$WL_Hover_Text_Color    = "#FFFFFF";
		$WL_Footer_Text_Color  	= "#000000";
		$WL_Icon_Color         	= "#FFFFFF";
		$WL_Hover_Color_Opacity = 0.5;
		$WL_Font_Style          = "font-name";
		$WL_Image_View_Icon     = "fa-camera";
		$WL_Image_View_Icon_Size= "fa-3x";
		$WL_Light_Box           = "lightbox2";
		$WL_Show_Image_Lightbox = "yes";
		$WL_Custom_Css 			= "";
    } else {
		$RPGP_Id = $Id['id'];
		$RPGP_Gallery_Settings = "RPGP_Gallery_Settings_".$RPGP_Id;
		$RPGP_Gallery_Settings = unserialize(get_post_meta( $RPGP_Id, $RPGP_Gallery_Settings, true));
		if(count($RPGP_Gallery_Settings)) {
			$WL_Show_Gallery_Title  = $RPGP_Gallery_Settings['WL_Show_Gallery_Title'];
			$WL_Show_Image_Label    = $RPGP_Gallery_Settings['WL_Show_Image_Label'];
			$WL_Image_Label_Position= $RPGP_Gallery_Settings['WL_Image_Label_Position'];
			$WL_Hover_Animation     = $RPGP_Gallery_Settings['WL_Hover_Animation'];
			$WL_Gallery_Layout      = $RPGP_Gallery_Settings['WL_Gallery_Layout'];
			$WL_Thumbnail_Layout    = $RPGP_Gallery_Settings['WL_Thumbnail_Layout'];
			$WL_Hover_Color         = $RPGP_Gallery_Settings['WL_Hover_Color'];
			$WL_Hover_Text_Color    = $RPGP_Gallery_Settings['WL_Hover_Text_Color'];
			$WL_Footer_Text_Color  	= $RPGP_Gallery_Settings['WL_Footer_Text_Color'];
			$WL_Icon_Color         	= $RPGP_Gallery_Settings['WL_Icon_Color'];
			$WL_Hover_Color_Opacity = $RPGP_Gallery_Settings['WL_Hover_Color_Opacity'];
			$WL_Font_Style          = $RPGP_Gallery_Settings['WL_Font_Style'];
			$WL_Image_View_Icon     = $RPGP_Gallery_Settings['WL_Image_View_Icon'];
			$WL_Image_View_Icon_Size= $RPGP_Gallery_Settings['WL_Image_View_Icon_Size'];
			$WL_Light_Box           = $RPGP_Gallery_Settings['WL_Light_Box'];
			$WL_Show_Image_Lightbox = $RPGP_Gallery_Settings['WL_Show_Image_Lightbox'];
			$WL_Custom_Css 			= $RPGP_Gallery_Settings['WL_Custom_Css'];
		}
	}
	
    $RGB = RPGhex2rgb($WL_Hover_Color);
    $HoverColorRGB = implode(", ", $RGB);
    ?>

    <script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
    <script type="text/javascript">
      WebFont.load({
        google: {
          families: ['<?php echo $WL_Font_Style; ?>'] // saved value
        }
      });
    </script>

     <style>
	#weblizar_<?php echo $RPGP_Id; ?>  .rpgp-header-label {
		color:<?php echo $WL_Hover_Text_Color; ?> !important;
	}
	
	#weblizar_<?php echo $RPGP_Id; ?> .rpgp-footer-label{
		color:<?php echo $WL_Footer_Text_Color; ?> !important;
		font-size:16px;
		margin-bottom: 5px;
		margin-top: 5px;
		text-align:center;
		font-weight:normal;
	}
	
	#weblizar_<?php echo $RPGP_Id; ?> .fa{
		color:<?php echo $WL_Icon_Color; ?> !important;
	}

    #weblizar_<?php echo $RPGP_Id; ?> .b-link-fade .b-wrapper,#weblizar_<?php echo $RPGP_Id; ?> .b-link-fade .b-top-line{
        background: rgba(<?php echo $HoverColorRGB; ?>, <?php echo $WL_Hover_Color_Opacity; ?>);
    }
    #weblizar_<?php echo $RPGP_Id; ?> .b-link-flow .b-wrapper,#weblizar_<?php echo $RPGP_Id; ?> .b-link-flow .b-top-line{
        background: rgba(<?php echo $HoverColorRGB; ?>, <?php echo $WL_Hover_Color_Opacity; ?>);
    }
    #weblizar_<?php echo $RPGP_Id; ?> .b-link-stroke .b-top-line{
        background: rgba(<?php echo $HoverColorRGB; ?>, <?php echo $WL_Hover_Color_Opacity; ?>);
    }
    #weblizar_<?php echo $RPGP_Id; ?> .b-link-stroke .b-bottom-line{
        background: rgba(<?php echo $HoverColorRGB; ?>, <?php echo $WL_Hover_Color_Opacity; ?>);
    }

    #weblizar_<?php echo $RPGP_Id; ?> .b-link-box .b-top-line{

        border: 16px solid rgba(<?php echo $HoverColorRGB; ?>, <?php echo $WL_Hover_Color_Opacity; ?>);
    }
    #weblizar_<?php echo $RPGP_Id; ?> .b-link-box .b-bottom-line{
        background: rgba(<?php echo $HoverColorRGB; ?>, <?php echo $WL_Hover_Color_Opacity; ?>);
    }
    #weblizar_<?php echo $RPGP_Id; ?> .b-link-stripe .b-line{
        background: rgba(<?php echo $HoverColorRGB; ?>, <?php echo $WL_Hover_Color_Opacity; ?>);
    }
    #weblizar_<?php echo $RPGP_Id; ?> .b-link-apart-horisontal .b-top-line,#weblizar_<?php echo $RPGP_Id; ?> .b-link-apart-horisontal .b-top-line-up{
        background: rgba(<?php echo $HoverColorRGB; ?>, <?php echo $WL_Hover_Color_Opacity; ?>);

    }
    #weblizar_<?php echo $RPGP_Id; ?> .b-link-apart-horisontal .b-bottom-line,#weblizar_<?php echo $RPGP_Id; ?> .b-link-apart-horisontal .b-bottom-line-up{
        background: rgba(<?php echo $HoverColorRGB; ?>, <?php echo $WL_Hover_Color_Opacity; ?>);
    }
    #weblizar_<?php echo $RPGP_Id; ?> .b-link-apart-vertical .b-top-line,#weblizar_<?php echo $RPGP_Id; ?> .b-link-apart-vertical .b-top-line-up{
        background: rgba(<?php echo $HoverColorRGB; ?>, <?php echo $WL_Hover_Color_Opacity; ?>);
    }
    #weblizar_<?php echo $RPGP_Id; ?> .b-link-apart-vertical .b-bottom-line,#weblizar_<?php echo $RPGP_Id; ?> .b-link-apart-vertical .b-bottom-line-up{
        background: rgba(<?php echo $HoverColorRGB; ?>, <?php echo $WL_Hover_Color_Opacity; ?>);
    }
    #weblizar_<?php echo $RPGP_Id; ?> .b-link-diagonal .b-line{
        background: rgba(<?php echo $HoverColorRGB; ?>, <?php echo $WL_Hover_Color_Opacity; ?>);
    }

    #weblizar_<?php echo $RPGP_Id; ?> .b-wrapper{
        font-family:<?php echo str_ireplace("+", " ", $WL_Font_Style); ?>; // real name pass here
    }
	
	#weblizar_<?php echo $RPGP_Id; ?> .rpgp-header-label{
        font-family:<?php echo str_ireplace("+", " ", $WL_Font_Style); ?> !important; // real name pass here
    }
	#weblizar_<?php echo $RPGP_Id; ?> .rpgp-footer-label{
        font-family:<?php echo str_ireplace("+", " ", $WL_Font_Style); ?> !important; // real name pass here
    }

	
	@media (min-width: 992px){
		.col-md-6 {
			width: 49.97% !important;
		}
		.col-md-4 {
			width: 33.30% !important;
		}
		.col-md-3 {
			width: 24.90% !important;
		}
	}
	<?php if ($WL_Image_Label_Position == "hover"){ ?>
		@media (max-width: 992px) {
			#weblizar_<?php echo $RPGP_Id; ?> .rpgp-header-label
			{
				display:none;
			}
		}
		@media (min-width: 993px) {
			#weblizar_<?php echo $RPGP_Id; ?> .rpgp-footer-label
			{
				display:none;
			}
		}
	<?php }else { ?>
		#weblizar_<?php echo $RPGP_Id; ?> .rpgp-header-label
		{
			display:none;
		}
	<?php }?>
	#weblizar_<?php echo $RPGP_Id; ?> a{
		border-bottom: none;
	}
	
	<?php echo $WL_Custom_Css; ?>
    </style>

    <?php
	
    /**
     * Load All Image Gallery Custom Post Type
     */
    $IG_CPT_Name = "rpgp_gallery";
    $AllGalleries = array(  'p' => $Id['id'], 'post_type' => $IG_CPT_Name, 'orderby' => 'ASC');
    $loop = new WP_Query( $AllGalleries );
    ?>
    <div  class="gal-container <?php if($WL_Light_Box == "lightbox2"){ echo "photobox-lightbox"; } ?> ">
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
        <!--get the post id-->
        <?php $post_id = get_the_ID(); ?>
		
		<?php if($WL_Show_Gallery_Title == "yes") { ?>
		<!-- gallery title -->
        <div style="font-weight: bolder; padding-bottom:10px; border-bottom:2px solid #cccccc; margin-bottom:20px; font-size:24px; ">
			<?php echo get_the_title($post_id); ?>
		</div>
		<?php } ?>
		
        <div class="gallery1" id="weblizar_<?php echo get_the_ID(); ?>">
        <?php
            /**
             * Get All Photos from Gallery Details Post Meta
             */
			get_the_ID();
            $RPGP_AllPhotosDetails = unserialize(base64_decode(get_post_meta( get_the_ID(), 'rpgp_all_photos_details', true)));
            $TotalImages =  get_post_meta( get_the_ID(), 'rpgp_total_images_count', true );
            $i = 1;

            foreach($RPGP_AllPhotosDetails as $RPGP_SinglePhotoDetails) {
				$name = $RPGP_SinglePhotoDetails['rpgp_image_label'];
				$url  = $RPGP_SinglePhotoDetails['rpgp_image_url'];
				$url1 = $RPGP_SinglePhotoDetails['rpgp_12_thumb'];
				$url2 = $RPGP_SinglePhotoDetails['rpgp_346_thumb'];
				$url3 = $RPGP_SinglePhotoDetails['rpgp_12_same_size_thumb'];
				$url4 = $RPGP_SinglePhotoDetails['rpgp_346_same_size_thumb'];
				$i++;
				
				if($WL_Gallery_Layout == "col-md-12") { // one column
					$Thummb_Url = $url;
				}								
				if($WL_Gallery_Layout == "col-md-6") { // two column
					if($WL_Thumbnail_Layout == "same-size") $Thummb_Url = $url3; 
					if($WL_Thumbnail_Layout == "masonry") $Thummb_Url = $url1;
					if($WL_Thumbnail_Layout == "original") $Thummb_Url = $url;
				} 
				if($WL_Gallery_Layout == "col-md-4" || $WL_Gallery_Layout == "col-md-3" || $WL_Gallery_Layout == "col-md-2") {// 3 4 6 column
					if($WL_Thumbnail_Layout == "same-size") $Thummb_Url = $url4;
					if($WL_Thumbnail_Layout == "masonry") $Thummb_Url = $url2;
					if($WL_Thumbnail_Layout == "original") $Thummb_Url = $url;					
				}
				
                ?>
                <div class="<?php echo $WL_Gallery_Layout; ?> col-sm-6 wl-gallery">
                    <div class="b-link-<?php echo $WL_Hover_Animation; ?> b-animate-go">
					<?php if($WL_Show_Image_Lightbox == "yes") { ?>
                        <img src="<?php echo $Thummb_Url; ?>" class="gall-img-responsive" alt="<?php echo $name; ?>">
                        <div class="b-wrapper">
                            <?php if($WL_Gallery_Layout == "col-md-12" || $WL_Gallery_Layout == "col-md-6" || $WL_Gallery_Layout == "col-md-4") { ?>
								<?php if($WL_Show_Image_Label == "yes") { ?>
									<h2 class="b-from-left b-animate b-delay03"><div class=" rpgp-header-label"><?php echo $name;  ?></div> </h2>
								<?php } ?>
							<?php }
								//photobox
								if($WL_Light_Box == "lightbox2") { ?>
									<p class="b-from-right b-animate b-delay03">
										<a href="<?php echo $url; ?>" alt="<?php echo $name; ?>">
											<i class="fa <?php echo $WL_Image_View_Icon; ?> <?php echo $WL_Image_View_Icon_Size; ?>"></i>
											<img src="<?php echo $Thummb_Url; ?>" class="gall-img-responsive" style="display:none !important; visibility:hidden" alt="<?php echo $name; ?>">
										</a>
									</p>
									<?php 
								} 
								//nivo box
								if($WL_Light_Box == "lightbox1") {
									?>
									<p class="b-from-right b-animate b-delay03">
										<a data-lightbox-gallery="enigma_lightbox" alt="<?php echo $name; ?>" class="nivoz" href="<?php echo $url; ?>">
											<i class="fa <?php echo $WL_Image_View_Icon; ?> <?php echo $WL_Image_View_Icon_Size; ?>"></i>
										</a>
									</p>
									<?php
								}
								
								// 3 - pretty photo Box
								if($WL_Light_Box == "lightbox3")  { ?>
									<p class="b-from-right b-animate b-delay03">
										<a class="portfolio-zoom icon-resize-full" data-rel="prettyPhoto[portfolio]" alt="<?php echo $name; ?>" href="<?php echo $url; ?>">
											<i class="fa <?php echo $WL_Image_View_Icon; ?> <?php echo $WL_Image_View_Icon_Size; ?>"></i>
										</a>
									</p>  <?php 
								}
								
								// 4 - Swipe Box
								if($WL_Light_Box == "lightbox4") {  ?>
									<p class="b-from-right b-animate b-delay03">
										<a alt="<?php echo $name; ?>" class="swipebox"  href="<?php echo $Thummb_Url; ?>">
											<i class="fa <?php echo $WL_Image_View_Icon; ?> <?php echo $WL_Image_View_Icon_Size; ?>"></i>
										</a>
									</p> <?php
								} ?>
                        </div>
						<?php
					} else {
						//photobox
						if($WL_Light_Box == "lightbox2") { ?>
							<a href="<?php echo $url; ?>" alt="<?php echo $name; ?>">
								<img src="<?php echo $Thummb_Url; ?>" class="gall-img-responsive" alt="<?php echo $name; ?>">
								<div class="b-wrapper"> <?php 
									if($WL_Gallery_Layout == "col-md-12" || $WL_Gallery_Layout == "col-md-6" || $WL_Gallery_Layout == "col-md-4") { ?>
										<?php if($WL_Show_Image_Label == "yes") { ?>
										<h2 class="b-from-left b-animate b-delay03 rpgp-header-label"><?php echo $name; ?> </h2>
										<?php } ?>
									<?php } ?>
								</div>
							</a>
							<?php
						}
						
						// nivobox 
						if($WL_Light_Box == "lightbox1") {
							?>
							<a data-lightbox-gallery="enigma_lightbox" alt="<?php echo $name; ?>" class="nivoz" href="<?php echo $url; ?>">
								<img src="<?php echo $Thummb_Url; ?>" class="gall-img-responsive" alt="<?php echo $name; ?>">
								<div class="b-wrapper">
									<?php if($WL_Gallery_Layout == "col-md-12" || $WL_Gallery_Layout == "col-md-6" || $WL_Gallery_Layout == "col-md-4") { ?>
										<?php if($WL_Show_Image_Label == "yes") { ?>
										<h2 class="b-from-left b-animate b-delay03 rpgp-header-label"><?php echo $name; ?> </h2>
										<?php } ?>
									<?php }
										?>
								</div>
							</a>
							<?php
						}
						
						// pretty photo
						if($WL_Light_Box == "lightbox3") {
							?>
							<a class="portfolio-zoom icon-resize-full"  data-rel="prettyPhoto[portfolio]" alt="<?php echo $name; ?>"   href="<?php echo $url; ?>">
								<img src="<?php echo $Thummb_Url; ?>" class="gall-img-responsive" alt="<?php echo $name; ?>">
								<div class="b-wrapper">
									<?php if($WL_Gallery_Layout == "col-md-12" || $WL_Gallery_Layout == "col-md-6" || $WL_Gallery_Layout == "col-md-4") { ?>
										<?php if($WL_Show_Image_Label == "yes") { ?>
										<h2 class="b-from-left b-animate b-delay03 rpgp-header-label"><?php echo $name; ?> </h2>
										<?php } ?>
									<?php }
										?>
								</div>
							</a>
							<?php
						}
						
						// swipe box
						if($WL_Light_Box == "lightbox4") {
							?>
							<a alt="<?php echo $name; ?>" class="swipebox"  href="<?php echo $url; ?>">
								<img src="<?php echo $Thummb_Url; ?>" class="gall-img-responsive" alt="<?php echo $name; ?>">
								<div class="b-wrapper">
									<?php if($WL_Gallery_Layout == "col-md-12" || $WL_Gallery_Layout == "col-md-6" || $WL_Gallery_Layout == "col-md-4") { ?>
										<?php if($WL_Show_Image_Label == "yes") { ?>
										<h2 class="b-from-left b-animate b-delay03 rpgp-header-label"><?php echo $name; ?> </h2>
										<?php } ?>
									<?php }
										?>
								</div>
							</a>
							<?php
						}
					}
					?>
                    </div>
					<?php if($WL_Show_Image_Label == "yes") { ?>
					<h4 class="rpgp-footer-label"><?php echo $name; ?></h4>
					<?php } ?>
                </div>
                <?php
            }
        ?>
        </div>
    <?php endwhile; ?>
    </div>

    <?php  if($WL_Light_Box == "lightbox2") { ?>
    <script>
	jQuery('.photobox-lightbox').photobox('a');
	// or with a fancier selector and some settings, and a callback:
	jQuery('.photobox-lightbox').photobox('a:first', { thumbs:false, time:0 }, imageLoaded);
	function imageLoaded(){
		console.log('image has been loaded...');
	}
    </script>
    <?php } ?>
	
	 <?php  if($WL_Light_Box == "lightbox3") { ?>
    <script>
	jQuery(document).ready(function(){	
			jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
				animation_speed: 'fast', /* fast/slow/normal */
				slideshow: 2000, /* false OR interval time in ms */
				autoplay_slideshow: false, /* true/false */
				opacity: 0.80  /* Value between 0 and 1 */				
			});			
		});
	</script>
    <?php } ?>
	
	<!-- swipe box-->
	<?php  if($WL_Light_Box == "lightbox4") {?>
	<script type="text/javascript">
	;( function( jQuery ) {
		jQuery( '.swipebox' ).swipebox();
	} )( jQuery );
	</script>
	<?php } ?>
	
    <?php wp_reset_query();
    return ob_get_clean();
}
?>