<?php
	/**
     * Load Saved Responsive Photo Gallery Settings
     */
	$PostId = $post->ID;
	$RPGP_Gallery_Settings = "RPGP_Gallery_Settings_".$PostId;
	$RPGP_Gallery_Settings = unserialize(get_post_meta( $PostId, $RPGP_Gallery_Settings, true));

    if($RPGP_Gallery_Settings['WL_Show_Gallery_Title'] && $RPGP_Gallery_Settings['WL_Hover_Color'] && $RPGP_Gallery_Settings['WL_Image_View_Icon']) {
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
    } else {
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
    }
?>

		
		
<input type="hidden" id="wl_rpgp_action" name="wl_rpgp_action" value="wl-rpgp-save-settings">
<table class="form-table">
	<tbody>
		
		<tr>
			<th scope="row"><label>Show Gallery Title</label></th>
			<td>
				<?php if(!isset($WL_Show_Gallery_Title)) $WL_Show_Gallery_Title = "yes"; ?>
				<input type="radio" name="wl-show-gallery-title" id="wl-show-gallery-title" value="yes" <?php if($WL_Show_Gallery_Title == 'yes' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="wl-show-gallery-title" id="wl-show-gallery-title" value="no" <?php if($WL_Show_Gallery_Title == 'no' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">Select Yes/No option to hide or show gallery title.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Show Image Label</label></th>
			<td>
				<?php if(!isset($WL_Show_Image_Label)) $WL_Show_Image_Label = "yes"; ?>
				<input type="radio" name="wl-show-image-label" id="wl-show-image-label" value="yes" <?php if($WL_Show_Image_Label == 'yes' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="wl-show-image-label" id="wl-show-image-label" value="no" <?php if($WL_Show_Image_Label == 'no' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">Select Yes/No option to hide or show label on image.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Image Label Position</label></th>
			<td>
				<?php if(!isset($WL_Image_Label_Position)) $WL_Image_Label_Position = "hover"; ?>
				<input type="radio" name="wl-image-label-position" id="wl-image-label-position" value="hover" <?php if($WL_Image_Label_Position == 'hover' ) { echo "checked"; } ?>> On Hover &nbsp;&nbsp;
				<input type="radio" name="wl-image-label-position" id="wl-image-label-position" value="footer" <?php if($WL_Image_Label_Position == 'footer' ) { echo "checked"; } ?>> On Footer
				<p class="description">Select option to show image label on Hover or Footer.</p>
			</td>
		</tr>
	
		<tr>
			<th scope="row"><label>Image Hover Animation</label></th>
			<td>
				<?php if(!isset($WL_Hover_Animation)) $WL_Hover_Animation = "diagonal"; ?>
				<select name="wl-hover-animation" id="wl-hover-animation">
					<optgroup label="Select Animation">
						<option value="fade" <?php if($WL_Hover_Animation == 'fade') echo "selected=selected"; ?>>Fade</option>
						<option value="stroke" <?php if($WL_Hover_Animation == 'stroke') echo "selected=selected"; ?>>Stroke</option>
						<option value="flow" <?php if($WL_Hover_Animation == 'flow') echo "selected=selected"; ?>>Flow</option>
						<option value="box" <?php if($WL_Hover_Animation == 'box') echo "selected=selected"; ?>>Box</option>
						<option value="stripe" <?php if($WL_Hover_Animation == 'stripe') echo "selected=selected"; ?>>Stripe</option>
						<option value="apart-horisontal" <?php if($WL_Hover_Animation == 'apart-horisontal') echo "selected=selected"; ?>>Apart Horizontal</option>
						<option value="apart-vertical" <?php if($WL_Hover_Animation == 'apart-vertical') echo "selected=selected"; ?>>Apart Vertical</option>
						<option value="diagonal" <?php if($WL_Hover_Animation == 'diagonal') echo "selected=selected"; ?>>Diagonal</option>
					</optgroup>
				</select>
				<p class="description">Choose an animation effect apply on images after mouse hover.</p>
			</td>
		</tr>

		<tr>
			<th scope="row"><label>Gallery Layout</label></th>
			<td>
				<?php if(!isset($WL_Gallery_Layout)) $WL_Gallery_Layout = "col-md-6"; ?>
				<select name="wl-gallery-layout" id="wl-gallery-layout">
					<optgroup label="Select Gallery Layout">
						<option value="col-md-12" <?php if($WL_Gallery_Layout == 'col-md-12') echo "selected=selected"; ?>>One Column</option>
						<option value="col-md-6" <?php if($WL_Gallery_Layout == 'col-md-6') echo "selected=selected"; ?>>Two Column</option>
						<option value="col-md-4" <?php if($WL_Gallery_Layout == 'col-md-4') echo "selected=selected"; ?>>Three Column</option>
						<option value="col-md-3" <?php if($WL_Gallery_Layout == 'col-md-3') echo "selected=selected"; ?>>Four Column</option>
						<option value="col-md-2" <?php if($WL_Gallery_Layout == 'col-md-2') echo "selected=selected"; ?>>Six Column</option>
					</optgroup>
				</select>
				<p class="description">Choose a column layout for image gallery.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Thumbnail Layout</label></th>
			<td>
				<?php if(!isset($WL_Thumbnail_Layout)) $WL_Thumbnail_Layout = "same-size"; ?>
				<input type="radio" name="wl-thumbnail-layout" id="wl-thumbnail-layout" value="same-size" <?php if($WL_Thumbnail_Layout == 'same-size' ) { echo "checked"; } ?>> Show Same Size Thumbnails
				<input type="radio" name="wl-thumbnail-layout" id="wl-thumbnail-layout" value="masonry" <?php if($WL_Thumbnail_Layout == 'masonry' ) { echo "checked"; } ?>> Show Masonry Style Thumbnails
				<input type="radio" name="wl-thumbnail-layout" id="wl-thumbnail-layout" value="original" <?php if($WL_Thumbnail_Layout == 'original' ) { echo "checked"; } ?>> Show Original Image As Thumbnails
				<p class="description">Select an option for thumbnail layout setting.</p>
				<p class="description">If Same Size Thumbnail option selected than minimum image size required in following layouts:</p>
				<p class="description">Minimum image size required in 1 & 2 Column Gallery Layout: 500x500px</p>
				<p class="description">Minimum image size required in 3, 4 & 6 Column Gallery Layout: 400x400px</p>
			</td>
		</tr>

		<tr>
			<th scope="row"><label>Hover Color</label></th>
			<td>
				<?php if(!isset($WL_Hover_Color)) $WL_Hover_Color = "#0074a2"; ?>
				<input id="wl-hover-color" name="wl-hover-color" type="text" value="<?php echo $WL_Hover_Color; ?>" class="my-color-field" data-default-color="#ffffff" />
				<p class="description">Choose a Image Hover Color.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Hover Text Color</label></th>
			<td>
				<?php if(!isset($WL_Hover_Text_Color)) $WL_Hover_Text_Color = "#FFFFFF"; ?>
				<input id="wl-hover-text-color" name="wl-hover-text-color" type="text" value="<?php echo $WL_Hover_Text_Color; ?>" class="my-color-field" data-default-color="#ffffff" />
				<p class="description">Choose a Image Hover Text Color.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Footer Text Color</label></th>
			<td>
				<?php if(!isset($WL_Footer_Text_Color)) $WL_Footer_Text_Color = "#000000"; ?>
				<input id="wl-footer-text-color" name="wl-footer-text-color" type="text" value="<?php echo $WL_Footer_Text_Color; ?>" class="my-color-field" data-default-color="#ffffff" />
				<p class="description">Choose a Color for Footer Text.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Hover Icon Color</label></th>
			<td>
				<?php if(!isset($WL_Icon_Color)) $WL_Icon_Color = "#FFFFFF"; ?>
				<input id="wl-icon-color" name="wl-icon-color" type="text" value="<?php echo $WL_Icon_Color; ?>" class="my-color-field" data-default-color="#ffffff" />
				<p class="description">Choose a Color for Icon.</p>
			</td>
		</tr>

		<tr>
			<th scope="row"><label>Hover Color Opacity</label></th>
			<td>
				<?php if(!isset($WL_Hover_Color_Opacity)) $WL_Hover_Color_Opacity = "0.5"; ?>
				<select name="wl-hover-color-opacity" id="wl-hover-color-opacity">
					<optgroup label="Select Color Opacity">
						<option value="1" <?php if($WL_Hover_Color_Opacity == '1') echo "selected=selected"; ?>>1</option>
						<option value="0.9" <?php if($WL_Hover_Color_Opacity == '0.9') echo "selected=selected"; ?>>0.9</option>
						<option value="0.8" <?php if($WL_Hover_Color_Opacity == '0.8') echo "selected=selected"; ?>>0.8</option>
						<option value="0.7" <?php if($WL_Hover_Color_Opacity == '0.7') echo "selected=selected"; ?>>0.7</option>
						<option value="0.6" <?php if($WL_Hover_Color_Opacity == '0.6') echo "selected=selected"; ?>>0.6</option>
						<option value="0.5" <?php if($WL_Hover_Color_Opacity == '0.5') echo "selected=selected"; ?>>0.5</option>
						<option value="0.4" <?php if($WL_Hover_Color_Opacity == '0.4') echo "selected=selected"; ?>>0.4</option>
						<option value="0.3" <?php if($WL_Hover_Color_Opacity == '0.3') echo "selected=selected"; ?>>0.3</option>
						<option value="0.2" <?php if($WL_Hover_Color_Opacity == '0.2') echo "selected=selected"; ?>>0.2</option>
						<option value="0.1" <?php if($WL_Hover_Color_Opacity == '0.1') echo "selected=selected"; ?>>0.1</option>
					</optgroup>
				</select>
				<p class="description">Choose hover color opacity on images.</p>
			</td>
		</tr>

		<tr>
			<th scope="row"><label>Caption Font Style</label></th>
			<td>
				<select  name="wl-font-style" class="standard-dropdown" id="wl-font-style">
					<optgroup label="Default Fonts">
						<option value="Arial" <?php selected($WL_Font_Style, 'Arial' ); ?>>Arial</option>
						<option value="_arial_black" <?php selected($WL_Font_Style, 'Arial Black' ); ?>>Arial Black</option>
						<option value="Courier New" <?php selected($WL_Font_Style, 'Courier New' ); ?>>Courier New</option>
						<option value="georgia" <?php selected($WL_Font_Style, 'Georgia' ); ?>>Georgia</option>
						<option value="grande"<?php selected($WL_Font_Style, 'Grande' ); ?>>Grande</option>
						<option value="_helvetica_neue" <?php selected($WL_Font_Style, 'Helvetica Neue' ); ?>>Helvetica Neue</option>
						<option value="_impact" <?php selected($WL_Font_Style, 'Impact' ); ?>>Impact</option>
						<option value="_lucida" <?php selected($WL_Font_Style, 'Lucida' ); ?>>Lucida</option>
						<option value="_lucida"<?php selected($WL_Font_Style, 'Lucida Grande' ); ?>>Lucida Grande</option>
						<option value="_OpenSansBold" <?php selected($WL_Font_Style, 'OpenSansBold' ); ?>>OpenSansBold</option>
						<option value="_palatino" <?php selected($WL_Font_Style, 'Palatino' ); ?>>Palatino</option>
						<option value="_sans" <?php selected($WL_Font_Style, 'Sans' ); ?>>Sans</option>
						<option value="_sans" <?php selected($WL_Font_Style, 'Sans-Serif' ); ?>>Sans-Serif</option>
						<option value="_tahoma" <?php selected($WL_Font_Style, 'Tahoma' ); ?>>Tahoma</option>
						<option value="_times"<?php selected($WL_Font_Style, 'Times New Roman' ); ?>>Times New Roman</option>
						<option value="_trebuchet" <?php selected($WL_Font_Style, 'Trebuchet' ); ?>>Trebuchet</option>
						<option value="_verdana" <?php selected($WL_Font_Style, 'Verdana' ); ?>>Verdana</option>
					</optgroup>
					<optgroup label="Google Fonts">
						<option value="Abel"<?php selected($WL_Font_Style, 'Abel' ); ?>>Abel</option>
						<option value="Abril Fatface" <?php selected($WL_Font_Style, 'Abril Fatface' ); ?>>Abril Fatface</option>
						<option value="Aclonica" <?php selected($WL_Font_Style, 'Aclonica' ); ?>>Aclonica</option>
						<option value="Acme" <?php selected($WL_Font_Style, 'Acme' ); ?>>Acme</option>
						<option value="Actor" <?php selected($WL_Font_Style, 'Actor' ); ?>>Actor</option>
						<option value="Adamina" <?php selected($WL_Font_Style, 'Adamina' ); ?>>Adamina</option>
						<option value="Advent Pro" <?php selected($WL_Font_Style, 'Advent Pro' ); ?>>Advent Pro</option>
						<option value="Aguafina Script" <?php selected($WL_Font_Style, 'Aguafina Script' ); ?>>Aguafina Script</option>
						<option value="Aladin" <?php selected($WL_Font_Style, 'Aladin' ); ?>>Aladin</option>
						<option value="Aldrich" <?php selected($WL_Font_Style, 'Aldrich' ); ?>>Aldrich</option>
						<option value="Alegreya" <?php selected($WL_Font_Style, 'Alegreya' ); ?>>Alegreya</option>
						<option value="Alegreya SC" <?php selected($WL_Font_Style, 'Alegreya SC' ); ?>>Alegreya SC</option>
						<option value="Alex Brush" <?php selected($WL_Font_Style, 'Alex Brush' ); ?>>Alex Brush</option>
						<option value="Alfa Slab One" <?php selected($WL_Font_Style, 'Alfa Slab One' ); ?>>Alfa Slab One</option>
						<option value="Alice" <?php selected($WL_Font_Style, 'Alice' ); ?>>Alice</option>
						<option value="Alike" <?php selected($WL_Font_Style, 'Alike' ); ?>>Alike</option>
						<option value="Alike Angular" <?php selected($WL_Font_Style, 'Alike Angular' ); ?>>Alike Angular</option>
						<option value="Allan" <?php selected($WL_Font_Style, 'Allan' ); ?>>Allan</option>
						<option value="Allerta" <?php selected($WL_Font_Style, 'Allerta' ); ?>>Allerta</option>
						<option value="Allerta Stencil"<?php selected($WL_Font_Style, 'Allerta Stencil' ); ?>>Allerta Stencil</option>
						<option value="Allura" <?php selected($WL_Font_Style, 'Allura' ); ?>>Allura</option>
						<option value="Almendra"<?php selected($WL_Font_Style, 'Almendra' ); ?>>Almendra</option>
						<option value="Almendra SC"<?php selected($WL_Font_Style, 'Almendra SC' ); ?>>Almendra SC</option>
						<option value="Amaranth"<?php selected($WL_Font_Style, 'Amaranth' ); ?>>Amaranth</option>
						<option value="Amatic SC"<?php selected($WL_Font_Style, 'Amatic SC' ); ?>>Amatic SC</option>
						<option value="Amethysta"<?php selected($WL_Font_Style, 'Amethysta' ); ?>>Amethysta</option>
						<option value="Andada"<?php selected($WL_Font_Style, 'Andada' ); ?>>Andada</option>
						<option value="Andika"<?php selected($WL_Font_Style, 'Andika' ); ?>>Andika</option>
						<option value="Angkor"<?php selected($WL_Font_Style, 'Angkor' ); ?>>Angkor</option>
						<option value="Annie Use Your Telescope" <?php selected($WL_Font_Style, 'Annie Use Your Telescope' ); ?>>Annie Use Your Telescope</option>
						<option value="Anonymous Pro" <?php selected($WL_Font_Style, 'Anonymous Pro' ); ?>>Anonymous Pro</option>
						<option value="Antic" <?php selected($WL_Font_Style, 'Antic' ); ?>>Antic</option>
						<option value="Antic Didone" <?php selected($WL_Font_Style, 'Antic Didone' ); ?>>Antic Didone</option>
						<option value="Antic Slab" <?php selected($WL_Font_Style, 'Antic Slab' ); ?>>Antic Slab</option>
						<option value="Anton" <?php selected($WL_Font_Style, 'Anton' ); ?>>Anton</option>
						<option value="Arapey" <?php selected($WL_Font_Style, 'Arapey' ); ?>>Arapey</option>
						<option value="Arbutus" <?php selected($WL_Font_Style, 'Arbutus' ); ?>>Arbutus</option>
						<option value="Architects Daughter" <?php selected($WL_Font_Style, 'Architects Daughter' ); ?>>Architects Daughter</option>
						<option value="Arimo" <?php selected($WL_Font_Style, 'Arimo' ); ?>>Arimo</option>
						<option value="Arizonia" <?php selected($WL_Font_Style, 'Arizonia' ); ?>>Arizonia</option>
						<option value="Armata" <?php selected($WL_Font_Style, 'Armata' ); ?>>Armata</option>
						<option value="Artifika" <?php selected($WL_Font_Style, 'Artifika' ); ?>>Artifika</option>
						<option value="Arvo" <?php selected($WL_Font_Style, 'Arvo' ); ?>>Arvo</option>
						<option value="Asap" <?php selected($WL_Font_Style, 'Asap' ); ?>>Asap</option>
						<option value="Asset" <?php selected($WL_Font_Style, 'Asset' ); ?>>Asset</option>
						<option value="Astloch" <?php selected($WL_Font_Style, 'Astloch' ); ?>>Astloch</option>
						<option value="Asul" <?php selected($WL_Font_Style, 'Asul' ); ?>>Asul</option>
						<option value="Atomic Age" <?php selected($WL_Font_Style, 'Atomic Age' ); ?>>Atomic Age</option>
						<option value="Aubrey" <?php selected($WL_Font_Style, 'Aubrey' ); ?>>Aubrey</option>
						<option value="Audiowide" <?php selected($WL_Font_Style, 'Audiowide' ); ?>>Audiowide</option>
						<option value="Average" <?php selected($WL_Font_Style, 'Average' ); ?>>Average</option>
						<option value="Averia Gruesa Libre" <?php selected($WL_Font_Style, 'Averia Gruesa Libre' ); ?>>Averia Gruesa Libre</option>
						<option value="Averia Libre" <?php selected($WL_Font_Style, 'Averia Libre' ); ?>>Averia Libre</option>
						<option value="Averia Sans Libre" <?php selected($WL_Font_Style, 'Averia Sans Libre' ); ?>>Averia Sans Libre</option>
						<option value="Averia Serif Libre" <?php selected($WL_Font_Style, 'Averia Serif Libre' ); ?>>Averia Serif Libre</option>
						<option value="Bad Script" <?php selected($WL_Font_Style, 'Bad Script' ); ?>>Bad Script</option>
						<option value="Balthazar" <?php selected($WL_Font_Style, 'Balthazar' ); ?>>Balthazar</option>
						<option value="Bangers" <?php selected($WL_Font_Style, 'Bangers' ); ?>>Bangers</option>
						<option value="Basic" <?php selected($WL_Font_Style, 'Basic' ); ?>>Basic</option>
						<option value="Battambang" <?php selected($WL_Font_Style, 'Battambang' ); ?>>Battambang</option>
						<option value="Baumans" <?php selected($WL_Font_Style, 'Baumans' ); ?>>Baumans</option>
						<option value="Bayon" <?php selected($WL_Font_Style, 'Bayon' ); ?>>Bayon</option>
						<option value="Belgrano"<?php selected($WL_Font_Style, 'Belgrano' ); ?>>Belgrano</option>
						<option value="Belleza" <?php selected($WL_Font_Style, 'Belleza' ); ?>>Belleza</option>
						<option value="Bentham" <?php selected($WL_Font_Style, 'Bentham' ); ?>>Bentham</option>
						<option value="Berkshire Swash"<?php selected($WL_Font_Style, 'Berkshire Swash' ); ?>>Berkshire Swash</option>
						<option value="Bevan"  <?php selected($WL_Font_Style, 'Bevan' ); ?>>Bevan</option>
						<option value="Bigshot One"<?php selected($WL_Font_Style, 'Bigshot One' ); ?>>Bigshot One</option>
						<option value="Bilbo" <?php selected($WL_Font_Style, 'Bilbo' ); ?>>Bilbo</option>
						<option value="Bilbo Swash Caps" <?php selected($WL_Font_Style, 'Bilbo Swash Caps' ); ?>>Bilbo Swash Caps</option>
						<option value="Bitter" <?php selected($WL_Font_Style, 'Bitter' ); ?>>Bitter</option>
						<option value="Black Ops One" <?php selected($WL_Font_Style, 'Black Ops One' ); ?>>Black Ops One</option>
						<option value="Bokor" <?php selected($WL_Font_Style, 'Bokor' ); ?>>Bokor</option>
						<option value="Bonbon" <?php selected($WL_Font_Style, 'Bonbon' ); ?>>Bonbon</option>
						<option value="Boogaloo" <?php selected($WL_Font_Style, 'Boogaloo' ); ?>>Boogaloo</option>
						<option value="Bowlby One" <?php selected($WL_Font_Style, 'Bowlby One' ); ?>>Bowlby One</option>
						<option value="Bowlby One SC" <?php selected($WL_Font_Style, 'Bowlby One SC' ); ?>>Bowlby One SC</option>
						<option value="Brawler" <?php selected($WL_Font_Style, 'Brawler' ); ?>>Brawler</option>
						<option value="Bree Serif" <?php selected($WL_Font_Style, 'Bree Serif' ); ?>>Bree Serif</option>
						<option value="Bubblegum Sans"  <?php selected($WL_Font_Style, 'Bubblegum Sans' ); ?>>Bubblegum Sans</option>
						<option value="Buda"  <?php selected($WL_Font_Style, 'Buda' ); ?>>Buda</option>
						<option value="Buenard"  <?php selected($WL_Font_Style, 'Buenard' ); ?>>Buenard</option>
						<option value="Butcherman"  <?php selected($WL_Font_Style, 'Butcherman' ); ?>>Butcherman</option>
						<option value="Butterfly Kids" <?php selected($WL_Font_Style, 'Butterfly Kids' ); ?>>Butterfly Kids</option>
						<option value="Cabin"  <?php selected($WL_Font_Style, 'Cabin' ); ?>>Cabin</option>
						<option value="Cabin Condensed"  <?php selected($WL_Font_Style, 'Cabin Condensed' ); ?>>Cabin Condensed</option>
						<option value="Cabin Sketch"  <?php selected($WL_Font_Style, 'Cabin Sketch' ); ?>>Cabin Sketch</option>
						<option value="Caesar Dressing"  <?php selected($WL_Font_Style, 'Caesar Dressing' ); ?>>Caesar Dressing</option>
						<option value="Cagliostro"  <?php selected($WL_Font_Style, 'Cagliostro' ); ?>>Cagliostro</option>
						<option value="Calligraffitti"  <?php selected($WL_Font_Style, 'Calligraffitti' ); ?>>Calligraffitti</option>
						<option value="Cambo"  <?php selected($WL_Font_Style, 'Cambo' ); ?>>Cambo</option>
						<option value="Candal"  <?php selected($WL_Font_Style, 'Candal' ); ?>>Candal</option>
						<option value="Cantarell"  <?php selected($WL_Font_Style, 'Cantarell' ); ?>>Cantarell</option>
						<option value="Cantata One"  <?php selected($WL_Font_Style, 'Cantata One' ); ?>>Cantata One</option>
						<option value="Cardo"  <?php selected($WL_Font_Style, 'Cardo' ); ?>>Cardo</option>
						<option value="Carme"  <?php selected($WL_Font_Style, 'Carme' ); ?>>Carme</option>
						<option value="Carter One"  <?php selected($WL_Font_Style, 'Carter One' ); ?>>Carter One</option>
						<option value="Caudex"  <?php selected($WL_Font_Style, 'Caudex' ); ?>>Caudex</option>
						<option value="Cedarville Cursive"  <?php selected($WL_Font_Style, 'Cedarville Cursive' ); ?>>Cedarville Cursive</option>
						<option value="Ceviche One"  <?php selected($WL_Font_Style, 'Ceviche One' ); ?>>Ceviche One</option>
						<option value="Changa One"  <?php selected($WL_Font_Style, 'Changa One' ); ?>>Changa One</option>
						<option value="Chango"  <?php selected($WL_Font_Style, 'Chango' ); ?>>Chango</option>
						<option value="Chau Philomene One"  <?php selected($WL_Font_Style, 'Chau Philomene One' ); ?>>Chau Philomene One</option>
						<option value="Chelsea Market"  <?php selected($WL_Font_Style, 'Chelsea Market' ); ?>>Chelsea Market</option>
						<option value="Chenla"  <?php selected($WL_Font_Style, 'Chenla' ); ?>>Chenla</option>
						<option value="Cherry Cream Soda"  <?php selected($WL_Font_Style, 'Cherry Cream Soda' ); ?>>Cherry Cream Soda</option>
						<option value="Chewy"  <?php selected($WL_Font_Style, 'Chewy' ); ?>>Chewy</option>
						<option value="Chicle"  <?php selected($WL_Font_Style, 'Chicle' ); ?>>Chicle</option>
						<option value="Chivo"  <?php selected($WL_Font_Style, 'Chivo' ); ?>>Chivo</option>
						<option value="Coda"  <?php selected($WL_Font_Style, 'Coda' ); ?>>Coda</option>
						<option value="Coda Caption"  <?php selected($WL_Font_Style, 'Coda Caption' ); ?>>Coda Caption</option>
						<option value="Codystar"  <?php selected($WL_Font_Style, 'Codystar' ); ?>>Codystar</option>
						<option value="Comfortaa"  <?php selected($WL_Font_Style, 'Comfortaa' ); ?>>Comfortaa</option>
						<option value="Coming Soon"  <?php selected($WL_Font_Style, 'Coming Soon' ); ?>>Coming Soon</option>
						<option value="Concert One"  <?php selected($WL_Font_Style, 'Concert One' ); ?>>Concert One</option>
						<option value="Condiment"  <?php selected($WL_Font_Style, 'Condiment' ); ?>>Condiment</option>
						<option value="Content"  <?php selected($WL_Font_Style, 'Content' ); ?>>Content</option>
						<option value="Contrail One"  <?php selected($WL_Font_Style, 'Contrail One' ); ?>>Contrail One</option>
						<option value="Convergence"  <?php selected($WL_Font_Style, 'Convergence' ); ?>>Convergence</option>
						<option value="Cookie"  <?php selected($WL_Font_Style, 'Cookie' ); ?>>Cookie</option>
						<option value="Copse"  <?php selected($WL_Font_Style, 'Copse' ); ?>>Copse</option>
						<option value="Corben"  <?php selected($WL_Font_Style, 'Corben' ); ?>>Corben</option>
						<option value="Courgette"  <?php selected($WL_Font_Style, 'Courgette' ); ?>>Courgette</option>
						<option value="Cousine"  <?php selected($WL_Font_Style, 'Cousine' ); ?>>Cousine</option>
						<option value="Coustard"  <?php selected($WL_Font_Style, 'Coustard' ); ?>>Coustard</option>
						<option value="Covered By Your Grace"  <?php selected($WL_Font_Style, 'Covered By Your Grace' ); ?>>Covered By Your Grace</option>
						<option value="Crafty Girls"  <?php selected($WL_Font_Style, 'Crafty Girls' ); ?>>Crafty Girls</option>
						<option value="Creepster"  <?php selected($WL_Font_Style, 'Creepster' ); ?>>Creepster</option>
						<option value="Crete Round"  <?php selected($WL_Font_Style, 'Crete Round' ); ?>>Crete Round</option>
						<option value="Crimson Text"  <?php selected($WL_Font_Style, 'Crimson Text' ); ?>>Crimson Text</option>
						<option value="Crushed"  <?php selected($WL_Font_Style, 'Crushed' ); ?>>Crushed</option>
						<option value="Cuprum"  <?php selected($WL_Font_Style, 'Cuprum' ); ?>>Cuprum</option>
						<option value="Cutive"  <?php selected($WL_Font_Style, 'Cutive' ); ?>>Cutive</option>
						<option value="Damion"  <?php selected($WL_Font_Style, 'Damion' ); ?>>Damion</option>
						<option value="Dancing Script"  <?php selected($WL_Font_Style, 'Dancing Script' ); ?>>Dancing Script</option>
						<option value="Dangrek"  <?php selected($WL_Font_Style, 'Dangrek' ); ?>>Dangrek</option>
						<option value="Dawning of a New Day"  <?php selected($WL_Font_Style, 'Dawning of a New Day' ); ?>>Dawning of a New Day</option>
						<option value="Days One"  <?php selected($WL_Font_Style, 'Days One' ); ?>>Days One</option>
						<option value="Delius"  <?php selected($WL_Font_Style, 'Delius' ); ?>>Delius</option>
						<option value="Delius Swash Caps"  <?php selected($WL_Font_Style, 'Delius Swash Caps' ); ?>>Delius Swash Caps</option>
						<option value="Delius Unicase"  <?php selected($WL_Font_Style, 'Delius Unicase' ); ?>>Delius Unicase</option>
						<option value="Della Respira"  <?php selected($WL_Font_Style, 'Della Respira' ); ?>>Della Respira</option>
						<option value="Devonshire"  <?php selected($WL_Font_Style, 'Devonshire' ); ?>>Devonshire</option>
						<option value="Didact Gothic"  <?php selected($WL_Font_Style, 'Didact Gothic' ); ?>>Didact Gothic</option>
						<option value="Diplomata"  <?php selected($WL_Font_Style, 'Diplomata' ); ?>>Diplomata</option>
						<option value="Diplomata SC"  <?php selected($WL_Font_Style, 'Diplomata SC' ); ?>>Diplomata SC</option>
						<option value="Doppio One"  <?php selected($WL_Font_Style, 'Doppio One' ); ?>>Doppio One</option>
						<option value="Dorsa"  <?php selected($WL_Font_Style, 'Dorsa' ); ?>>Dorsa</option>
						<option value="Dosis"  <?php selected($WL_Font_Style, 'Dosis' ); ?>>Dosis</option>
						<option value="Dr Sugiyama"  <?php selected($WL_Font_Style, 'Dr Sugiyama' ); ?>>Dr Sugiyama</option>
						<option value="Droid Sans"  <?php selected($WL_Font_Style, 'Droid Sans' ); ?>>Droid Sans</option>
						<option value="Droid Sans Mono"  <?php selected($WL_Font_Style, 'Droid Sans Mono' ); ?>>Droid Sans Mono</option>
						<option value="Droid Serif" <?php selected($WL_Font_Style, 'Droid Serif' ); ?>>Droid Serif</option>
						<option value="Duru Sans" <?php selected($WL_Font_Style, 'Duru Sans' ); ?>>Duru Sans</option>
						<option value="Dynalight" <?php selected($WL_Font_Style, 'Dynalight' ); ?>>Dynalight</option>
						<option value="EB Garamond" <?php selected($WL_Font_Style, 'EB Garamond' ); ?>>EB Garamond</option>
						<option value="Eater" <?php selected($WL_Font_Style, 'Eater' ); ?>>Eater</option>
						<option value="Economica" <?php selected($WL_Font_Style, 'Economica' ); ?>>Economica</option>
						<option value="Electrolize" <?php selected($WL_Font_Style, 'Electrolize' ); ?>>Electrolize</option>
						<option value="Emblema One" <?php selected($WL_Font_Style, 'Emblema One' ); ?>>Emblema One</option>
						<option value="Emilys Candy" <?php selected($WL_Font_Style, 'Emilys Candy' ); ?>>Emilys Candy</option>
						<option value="Engagement" <?php selected($WL_Font_Style, 'Engagement' ); ?>>Engagement</option>
						<option value="Enriqueta" <?php selected($WL_Font_Style, 'Enriqueta' ); ?>>Enriqueta</option>
						<option value="Erica One" <?php selected($WL_Font_Style, 'Erica One' ); ?>>Erica One</option>
						<option value="Esteban" <?php selected($WL_Font_Style, 'Esteban' ); ?>>Esteban</option>
						<option value="Euphoria Script">Euphoria Script</option>
						<option value="Ewert" <?php selected($WL_Font_Style, 'Ewert' ); ?>>Ewert</option>
						<option value="Exo" <?php selected($WL_Font_Style, 'Exo' ); ?>>Exo</option>
						<option value="Expletus Sans" <?php selected($WL_Font_Style, 'Expletus Sans' ); ?>>Expletus Sans</option>
						<option value="Fanwood Text" <?php selected($WL_Font_Style, 'Fanwood Text' ); ?>>Fanwood Text</option>
						<option value="Fascinate" <?php selected($WL_Font_Style, 'Fascinate' ); ?>>Fascinate</option>
						<option value="Fascinate Inline" <?php selected($WL_Font_Style, 'Fascinate Inline' ); ?>>Fascinate Inline</option>
						<option value="Federant" <?php selected($WL_Font_Style, 'Federant' ); ?>>Federant</option>
						<option value="Federo" <?php selected($WL_Font_Style, 'Federo' ); ?>>Federo</option>
						<option value="Felipa" <?php selected($WL_Font_Style, 'Felipa' ); ?>>Felipa</option>
						<option value="Fjord One" <?php selected($WL_Font_Style, 'Fjord One' ); ?>>Fjord One</option>
						<option value="Flamenco" <?php selected($WL_Font_Style, 'Flamenco' ); ?>>Flamenco</option>
						<option value="Flavors" <?php selected($WL_Font_Style, 'Flavors' ); ?>>Flavors</option>
						<option value="Fondamento" <?php selected($WL_Font_Style, 'Fondamento' ); ?>>Fondamento</option>
						<option value="Fontdiner Swanky" <?php selected($WL_Font_Style, 'Fontdiner Swanky' ); ?>>Fontdiner Swanky</option>
						<option value="Forum" <?php selected($WL_Font_Style, 'Forum' ); ?>>Forum</option>
						<option value="Francois One" <?php selected($WL_Font_Style, 'Francois One' ); ?>>Francois One</option>
						<option value="Fredericka the Great" <?php selected($WL_Font_Style, 'Fredericka the Great' ); ?>>Fredericka the Great</option>
						<option value="Fredoka One" <?php selected($WL_Font_Style, 'Fredoka One' ); ?>>Fredoka One</option>
						<option value="Freehand" <?php selected($WL_Font_Style, 'Freehand' ); ?>>Freehand</option>
						<option value="Fresca" <?php selected($WL_Font_Style, 'Fresca' ); ?>>Fresca</option>
						<option value="Frijole" <?php selected($WL_Font_Style, 'Frijole' ); ?>>Frijole</option>
						<option value="Fugaz One" <?php selected($WL_Font_Style, 'Fugaz One' ); ?>>Fugaz One</option>
						<option value="GFS Didot" <?php selected($WL_Font_Style, 'GFS Didot' ); ?>>GFS Didot</option>
						<option value="GFS Neohellenic" <?php selected($WL_Font_Style, 'GFS Neohellenic' ); ?>>GFS Neohellenic</option>
						<option value="Galdeano" <?php selected($WL_Font_Style, 'Galdeano' ); ?>>Galdeano</option>
						<option value="Gentium Basic" <?php selected($WL_Font_Style, 'Gentium Basic' ); ?>>Gentium Basic</option>
						<option value="Gentium Book Basic" <?php selected($WL_Font_Style, 'Gentium Book Basic' ); ?>>Gentium Book Basic</option>
						<option value="Geo" <?php selected($WL_Font_Style, 'Geo' ); ?>>Geo</option>
						<option value="Geostar" <?php selected($WL_Font_Style, 'Geostar' ); ?>>Geostar</option>
						<option value="Geostar Fill" <?php selected($WL_Font_Style, 'Geostar Fill' ); ?>>Geostar Fill</option>
						<option value="Germania One" <?php selected($WL_Font_Style, 'Germania One' ); ?>>Germania One</option>
						<option value="Give You Glory" <?php selected($WL_Font_Style, 'Give You Glory' ); ?>>Give You Glory</option>
						<option value="Glass Antiqua" <?php selected($WL_Font_Style, 'Glass Antiqua' ); ?>>Glass Antiqua</option>
						<option value="Glegoo" <?php selected($WL_Font_Style, 'Glegoo' ); ?>>Glegoo</option>
						<option value="Gloria Hallelujah" <?php selected($WL_Font_Style, 'Gloria Hallelujah' ); ?>>Gloria Hallelujah</option>
						<option value="Goblin One" <?php selected($WL_Font_Style, 'Goblin One' ); ?>>Goblin One</option>
						<option value="Gochi Hand" <?php selected($WL_Font_Style, 'Gochi Hand' ); ?>>Gochi Hand</option>
						<option value="Gorditas" <?php selected($WL_Font_Style, 'Gorditas' ); ?>>Gorditas</option>
						<option value="Goudy Bookletter 1911" <?php selected($WL_Font_Style, 'Goudy Bookletter 191' ); ?>>Goudy Bookletter 1911</option>
						<option value="Graduate" <?php selected($WL_Font_Style, 'Graduate' ); ?>>Graduate</option>
						<option value="Gravitas One" <?php selected($WL_Font_Style, 'Gravitas One' ); ?>>Gravitas One</option>
						<option value="Great Vibes" <?php selected($WL_Font_Style, 'Great Vibes' ); ?>>Great Vibes</option>
						<option value="Gruppo" <?php selected($WL_Font_Style, 'Gruppo' ); ?>>Gruppo</option>
						<option value="Gudea" <?php selected($WL_Font_Style, 'Gudea' ); ?>>Gudea</option>
						<option value="Habibi" <?php selected($WL_Font_Style, 'Habibi' ); ?>>Habibi</option>
						<option value="Hammersmith One" <?php selected($WL_Font_Style, 'Hammersmith One' ); ?>>Hammersmith One</option>
						<option value="Handlee" <?php selected($WL_Font_Style, 'Handlee' ); ?>>Handlee</option>
						<option value="Hanuman" <?php selected($WL_Font_Style, 'Hanuman' ); ?>>Hanuman</option>
						<option value="Happy Monkey" <?php selected($WL_Font_Style, 'Happy Monkey' ); ?>>Happy Monkey</option>
						<option value="Henny Penny" <?php selected($WL_Font_Style, 'Henny Penny' ); ?>>Henny Penny</option>
						<option value="Herr Von Muellerhoff" <?php selected($WL_Font_Style, 'Herr Von Muellerhoff' ); ?>>Herr Von Muellerhoff</option>
						<option value="Holtwood One SC" <?php selected($WL_Font_Style, 'Holtwood One SC' ); ?>>Holtwood One SC</option>
						<option value="Homemade Apple" <?php selected($WL_Font_Style, 'Homemade Apple' ); ?>>Homemade Apple</option>
						<option value="Homenaje" <?php selected($WL_Font_Style, 'Homenaje' ); ?>>Homenaje</option>
						<option value="IM Fell DW Pica" <?php selected($WL_Font_Style, 'IM Fell DW Pica' ); ?>>IM Fell DW Pica</option>
						<option value="IM Fell DW Pica SC" <?php selected($WL_Font_Style, 'IM Fell DW Pica SC' ); ?>>IM Fell DW Pica SC</option>
						<option value="IM Fell Double Pica" <?php selected($WL_Font_Style, 'IM Fell Double Pica' ); ?>>IM Fell Double Pica</option>
						<option value="IM Fell Double Pica SC" <?php selected($WL_Font_Style, 'IM Fell Double Pica SC' ); ?>>IM Fell Double Pica SC</option>
						<option value="IM Fell English" <?php selected($WL_Font_Style, 'IM Fell English' ); ?>>IM Fell English</option>
						<option value="IM Fell English SC" <?php selected($WL_Font_Style, 'IM Fell English SC' ); ?>>IM Fell English SC</option>
						<option value="IM Fell French Canon" <?php selected($WL_Font_Style, 'IM Fell French Canon' ); ?>>IM Fell French Canon</option>
						<option value="IM Fell French Canon SC" <?php selected($WL_Font_Style, 'IM Fell French Canon SC' ); ?>>IM Fell French Canon SC</option>
						<option value="IM Fell Great Primer" <?php selected($WL_Font_Style, 'IM Fell Great Primer' ); ?>>IM Fell Great Primer</option>
						<option value="IM Fell Great Primer SC" <?php selected($WL_Font_Style, 'IM Fell Great Primer SC' ); ?>>IM Fell Great Primer SC</option>
						<option value="Iceberg" <?php selected($WL_Font_Style, 'Iceberg' ); ?>>Iceberg</option>
						<option value="Iceland" <?php selected($WL_Font_Style, 'Iceland' ); ?>>Iceland</option>
						<option value="Imprima" <?php selected($WL_Font_Style, 'Imprima' ); ?>>Imprima</option>
						<option value="Inconsolata" <?php selected($WL_Font_Style, 'Inconsolata' ); ?>>Inconsolata</option>
						<option value="Inder" <?php selected($WL_Font_Style, 'Inder' ); ?>>Inder</option>
						<option value="Indie Flower" <?php selected($WL_Font_Style, 'Indie Flower' ); ?>>Indie Flower</option>
						<option value="Inika" <?php selected($WL_Font_Style, 'Inika' ); ?>>Inika</option>
						<option value="Irish Grover" <?php selected($WL_Font_Style, 'Irish Grover' ); ?>>Irish Grover</option>
						<option value="Istok Web" <?php selected($WL_Font_Style, 'Istok Web' ); ?>>Istok Web</option>
						<option value="Italiana" <?php selected($WL_Font_Style, 'Italiana' ); ?>>Italiana</option>
						<option value="Italianno" <?php selected($WL_Font_Style, 'Italianno' ); ?>>Italianno</option>
						<option value="Jim Nightshade" <?php selected($WL_Font_Style, 'Jim Nightshade' ); ?>>Jim Nightshade</option>
						<option value="Jockey One" <?php selected($WL_Font_Style, 'Jockey One' ); ?>>Jockey One</option>
						<option value="Jolly Lodger" <?php selected($WL_Font_Style, 'Jolly Lodger' ); ?>>Jolly Lodger</option>
						<option value="Josefin Sans" <?php selected($WL_Font_Style, 'Josefin Sans' ); ?>>Josefin Sans</option>
						<option value="Josefin Slab" <?php selected($WL_Font_Style, 'Josefin Slab' ); ?>>Josefin Slab</option>
						<option value="Judson" <?php selected($WL_Font_Style, 'Judson' ); ?>>Judson</option>
						<option value="Julee" <?php selected($WL_Font_Style, 'Julee' ); ?>>Julee</option>
						<option value="Junge" <?php selected($WL_Font_Style, 'Junge' ); ?>>Junge</option>
						<option value="Jura" <?php selected($WL_Font_Style, 'Jura' ); ?>>Jura</option>
						<option value="Just Another Hand" <?php selected($WL_Font_Style, 'Just Another Hand' ); ?>>Just Another Hand</option>
						<option value="Just Me Again Down Here" <?php selected($WL_Font_Style, 'Just Me Again Down Here' ); ?>>Just Me Again Down Here</option>
						<option value="Kameron" <?php selected($WL_Font_Style, 'Kameron' ); ?>>Kameron</option>
						<option value="Karla" <?php selected($WL_Font_Style, 'Karla' ); ?>>Karla</option>
						<option value="Kaushan Script" <?php selected($WL_Font_Style, 'Kaushan Script' ); ?>>Kaushan Script</option>
						<option value="Kelly Slab" <?php selected($WL_Font_Style, 'Kelly Slab' ); ?>>Kelly Slab</option>
						<option value="Kenia" <?php selected($WL_Font_Style, 'Kenia' ); ?>>Kenia</option>
						<option value="Khmer" <?php selected($WL_Font_Style, 'Khmer' ); ?>>Khmer</option>
						<option value="Knewave" <?php selected($WL_Font_Style, 'Knewave' ); ?>>Knewave</option>
						<option value="Kotta One" <?php selected($WL_Font_Style, 'Kotta One' ); ?>>Kotta One</option>
						<option value="Koulen" <?php selected($WL_Font_Style, 'Koulen' ); ?>>Koulen</option>
						<option value="Kranky" <?php selected($WL_Font_Style, 'Kranky' ); ?>>Kranky</option>
						<option value="Kreon" <?php selected($WL_Font_Style, 'Kreon' ); ?>>Kreon</option>
						<option value="Kristi" <?php selected($WL_Font_Style, 'Kristi' ); ?>>Kristi</option>
						<option value="Krona One" <?php selected($WL_Font_Style, 'Krona One' ); ?>>Krona One</option>
						<option value="La Belle Aurore" <?php selected($WL_Font_Style, 'La Belle Aurore' ); ?>>La Belle Aurore</option>
						<option value="Lancelot" <?php selected($WL_Font_Style, 'Lancelot' ); ?>>Lancelot</option>
						<option value="Lato" <?php selected($WL_Font_Style, 'Lato' ); ?>>Lato</option>
						<option value="League Script" <?php selected($WL_Font_Style, 'League Script' ); ?>>League Script</option>
						<option value="Leckerli One" <?php selected($WL_Font_Style, 'Leckerli One' ); ?>>Leckerli One</option>
						<option value="Ledger" <?php selected($WL_Font_Style, 'Ledger' ); ?>>Ledger</option>
						<option value="Lekton" <?php selected($WL_Font_Style, 'Lekton' ); ?>>Lekton</option>
						<option value="Lemon" <?php selected($WL_Font_Style, 'Lemon' ); ?>>Lemon</option>
						<option value="Lilita One" <?php selected($WL_Font_Style, 'Lilita One' ); ?>>Lilita One</option>
						<option value="Limelight" <?php selected($WL_Font_Style, 'Limelight' ); ?>>Limelight</option>
						<option value="Linden Hill" <?php selected($WL_Font_Style, 'Linden Hill' ); ?>>Linden Hill</option>
						<option value="Lobster" <?php selected($WL_Font_Style, 'Lobster' ); ?>>Lobster</option>
						<option value="Lobster Two" <?php selected($WL_Font_Style, 'Lobster Two' ); ?>>Lobster Two</option>
						<option value="Londrina Outline" <?php selected($WL_Font_Style, 'Londrina Outline' ); ?>>Londrina Outline</option>
						<option value="Londrina Shadow" <?php selected($WL_Font_Style, 'Londrina Shadow' ); ?>>Londrina Shadow</option>
						<option value="Londrina Sketch" <?php selected($WL_Font_Style, 'Londrina Sketch' ); ?>>Londrina Sketch</option>
						<option value="Londrina Solid" <?php selected($WL_Font_Style, 'Londrina Solid' ); ?>>Londrina Solid</option>
						<option value="Lora" <?php selected($WL_Font_Style, 'Lora' ); ?>>Lora</option>
						<option value="Love Ya Like A Sister" <?php selected($WL_Font_Style, 'Love Ya Like A Sister' ); ?>>Love Ya Like A Sister</option>
						<option value="Loved by the King" <?php selected($WL_Font_Style, 'Loved by the King' ); ?>>Loved by the King</option>
						<option value="Lovers Quarrel" <?php selected($WL_Font_Style, 'Lovers Quarrel' ); ?>>Lovers Quarrel</option>
						<option value="Luckiest Guy" <?php selected($WL_Font_Style, 'Luckiest Guy' ); ?>>Luckiest Guy</option>
						<option value="Lusitana" <?php selected($WL_Font_Style, 'Lusitana' ); ?>>Lusitana</option>
						<option value="Lustria" <?php selected($WL_Font_Style, 'Lustria' ); ?>>Lustria</option>
						<option value="Macondo" <?php selected($WL_Font_Style, 'Macondo' ); ?>>Macondo</option>
						<option value="Macondo Swash Caps" <?php selected($WL_Font_Style, 'Macondo Swash Caps' ); ?>>Macondo Swash Caps</option>
						<option value="Magra" <?php selected($WL_Font_Style, 'Magra' ); ?>>Magra</option>
						<option value="Maiden Orange" <?php selected($WL_Font_Style, 'Maiden Orange' ); ?>>Maiden Orange</option>
						<option value="Mako" <?php selected($WL_Font_Style, 'Mako' ); ?>>Mako</option>
						<option value="Marck Script" <?php selected($WL_Font_Style, 'Marck Script' ); ?>>Marck Script</option>
						<option value="Marko One" <?php selected($WL_Font_Style, 'Marko One' ); ?>>Marko One</option>
						<option value="Marmelad" <?php selected($WL_Font_Style, 'Marmelad' ); ?>>Marmelad</option>
						<option value="Marvel" <?php selected($WL_Font_Style, 'Marvel' ); ?>>Marvel</option>
						<option value="Mate" <?php selected($WL_Font_Style, 'Mate' ); ?>>Mate</option>
						<option value="Mate SC" <?php selected($WL_Font_Style, 'Mate SC' ); ?>>Mate SC</option>
						<option value="Maven Pro" <?php selected($WL_Font_Style, 'Maven Pro' ); ?>>Maven Pro</option>
						<option value="Meddon" <?php selected($WL_Font_Style, 'Meddon' ); ?>>Meddon</option>
						<option value="MedievalSharp" <?php selected($WL_Font_Style, 'MedievalSharp' ); ?>>MedievalSharp</option>
						<option value="Medula One" <?php selected($WL_Font_Style, 'Medula One' ); ?>>Medula One</option>
						<option value="Megrim" <?php selected($WL_Font_Style, 'Megrim' ); ?>>Megrim</option>
						<option value="Merienda One" <?php selected($WL_Font_Style, 'Merienda One' ); ?>>Merienda One</option>
						<option value="Merriweather" <?php selected($WL_Font_Style, 'Merriweather' ); ?>>Merriweather</option>
						<option value="Metal" <?php selected($WL_Font_Style, 'Metal' ); ?>>Metal</option>
						<option value="Metamorphous"<?php selected($WL_Font_Style, 'Metamorphous' ); ?>>Metamorphous</option>
						<option value="Metrophobic" <?php selected($WL_Font_Style, 'Metrophobic' ); ?>>Metrophobic</option>
						<option value="Michroma" <?php selected($WL_Font_Style, 'Michroma' ); ?>>Michroma</option>
						<option value="Miltonian" <?php selected($WL_Font_Style, 'Miltonian' ); ?>>Miltonian</option>
						<option value="Miltonian Tattoo" <?php selected($WL_Font_Style, 'Miltonian Tattoo' ); ?>>Miltonian Tattoo</option>
						<option value="Miniver" <?php selected($WL_Font_Style, 'Miniver' ); ?>>Miniver</option>
						<option value="Miss Fajardose" <?php selected($WL_Font_Style, 'Miss Fajardose' ); ?>>Miss Fajardose</option>
						<option value="Modern Antiqua" <?php selected($WL_Font_Style, 'Modern Antiqua' ); ?>>Modern Antiqua</option>
						<option value="Molengo" <?php selected($WL_Font_Style, 'Molengo' ); ?>>Molengo</option>
						<option value="Monofett" <?php selected($WL_Font_Style, 'Monofett' ); ?>>Monofett</option>
						<option value="Monoton" <?php selected($WL_Font_Style, 'Monoton' ); ?>>Monoton</option>
						<option value="Monsieur La Doulaise" <?php selected($WL_Font_Style, 'Monsieur La Doulaise' ); ?>>Monsieur La Doulaise</option>
						<option value="Montaga" <?php selected($WL_Font_Style, 'Montaga' ); ?>>Montaga</option>
						<option value="Montez" <?php selected($WL_Font_Style, 'Montez' ); ?>>Montez</option>
						<option value="Montserrat" <?php selected($WL_Font_Style, 'Montserrat' ); ?>>Montserrat</option>
						<option value="Moul" <?php selected($WL_Font_Style, 'Moul' ); ?>>Moul</option>
						<option value="Moulpali" <?php selected($WL_Font_Style, 'Moulpali' ); ?>>Moulpali</option>
						<option value="Mountains of Christmas" <?php selected($WL_Font_Style, 'Mountains of Christmas' ); ?>>Mountains of Christmas</option>
						<option value="Mr Bedfort" <?php selected($WL_Font_Style, 'Mr Bedfort' ); ?>>Mr Bedfort</option>
						<option value="Mr Dafoe" <?php selected($WL_Font_Style, 'Mr Dafoe' ); ?>>Mr Dafoe</option>
						<option value="Mr De Haviland" <?php selected($WL_Font_Style, 'Mr De Haviland' ); ?>>Mr De Haviland</option>
						<option value="Mrs Saint Delafield" <?php selected($WL_Font_Style, 'Mrs Saint Delafield' ); ?>>Mrs Saint Delafield</option>
						<option value="Mrs Sheppards" <?php selected($WL_Font_Style, 'Mrs Sheppards' ); ?>>Mrs Sheppards</option>
						<option value="Muli" <?php selected($WL_Font_Style, 'Muli' ); ?>>Muli</option>
						<option value="Mystery Quest" <?php selected($WL_Font_Style, 'Mystery Quest' ); ?>>Mystery Quest</option>
						<option value="Neucha" <?php selected($WL_Font_Style, 'Neucha' ); ?>>Neucha</option>
						<option value="Neuton" <?php selected($WL_Font_Style, 'Neuton' ); ?>>Neuton</option>
						<option value="News Cycle" <?php selected($WL_Font_Style, 'News Cycle' ); ?>>News Cycle</option>
						<option value="Niconne" <?php selected($WL_Font_Style, 'Niconne' ); ?>>Niconne</option>
						<option value="Nixie One" <?php selected($WL_Font_Style, 'Nixie One' ); ?>>Nixie One</option>
						<option value="Nobile" <?php selected($WL_Font_Style, 'Nobile' ); ?>>Nobile</option>
						<option value="Nokora" <?php selected($WL_Font_Style, 'Nokora' ); ?>>Nokora</option>
						<option value="Norican" <?php selected($WL_Font_Style, 'Norican' ); ?>>Norican</option>
						<option value="Nosifer" <?php selected($WL_Font_Style, 'Nosifer' ); ?>>Nosifer</option>
						<option value="Nothing You Could Do" <?php selected($WL_Font_Style, 'Nothing You Could Do' ); ?>>Nothing You Could Do</option>
						<option value="Noticia Text" <?php selected($WL_Font_Style, 'Noticia Text' ); ?>>Noticia Text</option>
						<option value="Nova Cut" <?php selected($WL_Font_Style, 'Nova Cut' ); ?>>Nova Cut</option>
						<option value="Nova Flat" <?php selected($WL_Font_Style, 'Nova Flat' ); ?>>Nova Flat</option>
						<option value="Nova Mono" <?php selected($WL_Font_Style, 'Nova Mono' ); ?>>Nova Mono</option>
						<option value="Nova Oval" <?php selected($WL_Font_Style, 'Nova Oval' ); ?>>Nova Oval</option>
						<option value="Nova Round" <?php selected($WL_Font_Style, 'Nova Round' ); ?>>Nova Round</option>
						<option value="Nova Script" <?php selected($WL_Font_Style, 'Nova Script' ); ?>>Nova Script</option>
						<option value="Nova Slim" <?php selected($WL_Font_Style, 'Nova Slim' ); ?>>Nova Slim</option>
						<option value="Nova Square" <?php selected($WL_Font_Style, 'Nova Square' ); ?>>Nova Square</option>
						<option value="Numans" <?php selected($WL_Font_Style, 'Numans' ); ?>>Numans</option>

						<option value="Nunito" <?php selected($WL_Font_Style, 'Nunito' ); ?>>Nunito</option>
						<option value="Odor Mean Chey" <?php selected($WL_Font_Style, 'Odor Mean Chey' ); ?>>Odor Mean Chey</option>
						<option value="Old Standard TT" <?php selected($WL_Font_Style, 'Old Standard TT' ); ?>>Old Standard TT</option>
						<option value="Oldenburg" <?php selected($WL_Font_Style, 'Oldenburg' ); ?>>Oldenburg</option>
						<option value="Oleo Script" <?php selected($WL_Font_Style, 'Oleo Script' ); ?>>Oleo Script</option>
						<option value="Open Sans" <?php selected($WL_Font_Style, 'Open Sans' ); ?>>Open Sans</option>
						<option value="Open Sans Condensed" <?php selected($WL_Font_Style, 'Open Sans Condensed' ); ?>>Open Sans Condensed</option>
						<option value="Orbitron" <?php selected($WL_Font_Style, 'Orbitron' ); ?>>Orbitron</option>
						<option value="Original Surfer" <?php selected($WL_Font_Style, 'Original Surfer' ); ?>>Original Surfer</option>
						<option value="Oswald" <?php selected($WL_Font_Style, 'Oswald' ); ?>>Oswald</option>
						<option value="Over the Rainbow" <?php selected($WL_Font_Style, 'Over the Rainbow' ); ?>>Over the Rainbow</option>
						<option value="Overlock" <?php selected($WL_Font_Style, 'Overlock' ); ?>>Overlock</option>
						<option value="Overlock SC" <?php selected($WL_Font_Style, 'Overlock SC' ); ?>>Overlock SC</option>
						<option value="Ovo" <?php selected($WL_Font_Style, 'Ovo' ); ?>>Ovo</option>
						<option value="Oxygen" <?php selected($WL_Font_Style, 'Oxygen' ); ?>>Oxygen</option>
						<option value="PT Mono" <?php selected($WL_Font_Style, 'PT Mono' ); ?>>PT Mono</option>
						<option value="PT Sans" <?php selected($WL_Font_Style, 'PT Sans' ); ?>>PT Sans</option>
						<option value="PT Sans Caption" <?php selected($WL_Font_Style, 'PT Sans Caption' ); ?>>PT Sans Caption</option>
						<option value="PT Sans Narrow" <?php selected($WL_Font_Style, 'PT Sans Narrow' ); ?>>PT Sans Narrow</option>
						<option value="PT Serif" <?php selected($WL_Font_Style, 'PT Serif' ); ?>>PT Serif</option>
						<option value="PT Serif Caption" <?php selected($WL_Font_Style, 'PT Serif Caption' ); ?>>PT Serif Caption</option>
						<option value="Pacifico" <?php selected($WL_Font_Style, 'Pacifico' ); ?>>Pacifico</option>
						<option value="Parisienne" <?php selected($WL_Font_Style, 'Parisienne' ); ?>>Parisienne</option>
						<option value="Passero One" <?php selected($WL_Font_Style, 'Passero One' ); ?>>Passero One</option>
						<option value="Passion One" <?php selected($WL_Font_Style, 'Passion One' ); ?>>Passion One</option>
						<option value="Patrick Hand" <?php selected($WL_Font_Style, 'Patrick Hand' ); ?>>Patrick Hand</option>
						<option value="Patua One" <?php selected($WL_Font_Style, 'Patua One' ); ?>>Patua One</option>
						<option value="Paytone One" <?php selected($WL_Font_Style, 'Paytone One' ); ?>>Paytone One</option>
						<option value="Permanent Marker" <?php selected($WL_Font_Style, 'Permanent Marker' ); ?>>Permanent Marker</option>
						<option value="Petrona" <?php selected($WL_Font_Style, 'Petrona' ); ?>>Petrona</option>
						<option value="Philosopher" <?php selected($WL_Font_Style, 'Philosopher' ); ?>>Philosopher</option>
						<option value="Piedra" <?php selected($WL_Font_Style, 'Piedra' ); ?>>Piedra</option>
						<option value="Pinyon Script" <?php selected($WL_Font_Style, 'Pinyon Script' ); ?>>Pinyon Script</option>
						<option value="Plaster" <?php selected($WL_Font_Style, 'Plaster' ); ?>>Plaster</option>
						<option value="Play" <?php selected($WL_Font_Style, 'Play' ); ?>>Play</option>
						<option value="Playball" <?php selected($WL_Font_Style, 'Playball' ); ?>>Playball</option>
						<option value="Playfair Display" <?php selected($WL_Font_Style, 'Playfair Display' ); ?>>Playfair Display</option>
						<option value="Podkova" <?php selected($WL_Font_Style, 'Podkova' ); ?>>Podkova</option>
						<option value="Poiret One" <?php selected($WL_Font_Style, 'Poiret One' ); ?>>Poiret One</option>
						<option value="Poller One" <?php selected($WL_Font_Style, 'Poller One' ); ?>>Poller One</option>
						<option value="Poly" <?php selected($WL_Font_Style, 'Poly' ); ?>>Poly</option>
						<option value="Pompiere" <?php selected($WL_Font_Style, 'Pompiere' ); ?>>Pompiere</option>
						<option value="Pontano Sans" <?php selected($WL_Font_Style, 'Pontano Sans' ); ?>>Pontano Sans</option>
						<option value="Port Lligat Sans" <?php selected($WL_Font_Style, 'Port Lligat Sans' ); ?>>Port Lligat Sans</option>
						<option value="Port Lligat Slab" <?php selected($WL_Font_Style, 'Port Lligat Slab' ); ?>>Port Lligat Slab</option>
						<option value="Prata" <?php selected($WL_Font_Style, 'Prata' ); ?>>Prata</option>
						<option value="Preahvihear" <?php selected($WL_Font_Style, 'Preahvihear' ); ?>>Preahvihear</option>
						<option value="Press Start 2P" <?php selected($WL_Font_Style, 'Press Start 2P' ); ?>>Press Start 2P</option>
						<option value="Princess Sofia" <?php selected($WL_Font_Style, 'Princess Sofia' ); ?>>Princess Sofia</option>
						<option value="Prociono" <?php selected($WL_Font_Style, 'Prociono' ); ?>>Prociono</option>
						<option value="Prosto One" <?php selected($WL_Font_Style, 'Prosto One' ); ?>>Prosto One</option>
						<option value="Puritan" <?php selected($WL_Font_Style, 'Puritan' ); ?>>Puritan</option>
						<option value="Quantico" <?php selected($WL_Font_Style, 'Quantico' ); ?>>Quantico</option>
						<option value="Quattrocento" <?php selected($WL_Font_Style, 'Quattrocento' ); ?>>Quattrocento</option>
						<option value="Quattrocento Sans" <?php selected($WL_Font_Style, 'Quattrocento Sans' ); ?>>Quattrocento Sans</option>
						<option value="Questrial" <?php selected($WL_Font_Style, 'Questrial' ); ?>>Questrial</option>
						<option value="Quicksand" <?php selected($WL_Font_Style, 'Quicksand' ); ?>>Quicksand</option>
						<option value="Qwigley" <?php selected($WL_Font_Style, 'Qwigley' ); ?>>Qwigley</option>
						<option value="Radley" <?php selected($WL_Font_Style, 'Radley' ); ?>>Radley</option>
						<option value="Raleway" <?php selected($WL_Font_Style, 'Raleway' ); ?>>Raleway</option>
						<option value="Rammetto One" <?php selected($WL_Font_Style, 'Rammetto One' ); ?>>Rammetto One</option>
						<option value="Rancho" <?php selected($WL_Font_Style, 'Rancho' ); ?>>Rancho</option>
						<option value="Rationale" <?php selected($WL_Font_Style, 'Rationale' ); ?>>Rationale</option>
						<option value="Redressed" <?php selected($WL_Font_Style, 'Redressed' ); ?>>Redressed</option>
						<option value="Reenie Beanie" <?php selected($WL_Font_Style, 'Reenie Beanie' ); ?>>Reenie Beanie</option>
						<option value="Revalia" <?php selected($WL_Font_Style, 'Revalia' ); ?>>Revalia</option>
						<option value="Ribeye" <?php selected($WL_Font_Style, 'Ribeye' ); ?>>Ribeye</option>
						<option value="Ribeye Marrow" <?php selected($WL_Font_Style, 'Ribeye Marrow' ); ?>>Ribeye Marrow</option>
						<option value="Righteous" <?php selected($WL_Font_Style, 'Righteous' ); ?>>Righteous</option>
						<option value="Rochester" <?php selected($WL_Font_Style, 'Rochester' ); ?>>Rochester</option>
						<option value="Rock Salt" <?php selected($WL_Font_Style, 'Rock Salt' ); ?>>Rock Salt</option>
						<option value="Rokkitt" <?php selected($WL_Font_Style, 'Rokkitt' ); ?>>Rokkitt</option>
						<option value="Ropa Sans" <?php selected($WL_Font_Style, 'Ropa Sans' ); ?>>Ropa Sans</option>
						<option value="Rosario" <?php selected($WL_Font_Style, 'Rosario' ); ?>>Rosario</option>
						<option value="Rosarivo" <?php selected($WL_Font_Style, 'Rosarivo' ); ?>>Rosarivo</option>
						<option value="Rouge Script" <?php selected($WL_Font_Style, 'Rouge Script' ); ?>>Rouge Script</option>
						<option value="Ruda" <?php selected($WL_Font_Style, 'Ruda' ); ?>>Ruda</option>
						<option value="Ruge Boogie" <?php selected($WL_Font_Style, 'Ruge Boogie' ); ?>>Ruge Boogie</option>
						<option value="Ruluko" <?php selected($WL_Font_Style, 'Ruluko' ); ?>>Ruluko</option>
						<option value="Ruslan Display" <?php selected($WL_Font_Style, 'Ruslan Display' ); ?>>Ruslan Display</option>
						<option value="Russo One" <?php selected($WL_Font_Style, 'Russo One' ); ?>>Russo One</option>
						<option value="Ruthie" <?php selected($WL_Font_Style, 'Ruthie' ); ?>>Ruthie</option>
						<option value="Sail" <?php selected($WL_Font_Style, 'Sail' ); ?>>Sail</option>
						<option value="Salsa" <?php selected($WL_Font_Style, 'Salsa' ); ?>>Salsa</option>
						<option value="Sancreek" <?php selected($WL_Font_Style, 'Sancreek' ); ?>>Sancreek</option>
						<option value="Sansita One" <?php selected($WL_Font_Style, 'Sansita One' ); ?>>Sansita One</option>
						<option value="Sarina" <?php selected($WL_Font_Style, 'Sarina' ); ?>>Sarina</option>
						<option value="Satisfy" <?php selected($WL_Font_Style, 'Satisfy' ); ?>>Satisfy</option>
						<option value="Schoolbell" <?php selected($WL_Font_Style, 'Schoolbell' ); ?>>Schoolbell</option>
						<option value="Seaweed Script" <?php selected($WL_Font_Style, 'Seaweed Script' ); ?>>Seaweed Script</option>
						<option value="Sevillana" <?php selected($WL_Font_Style, 'Sevillana' ); ?>>Sevillana</option>
						<option value="Shadows Into Light" <?php selected($WL_Font_Style, 'hadows Into Light' ); ?>>Shadows Into Light</option>
						<option value="Shadows Into Light Two" <?php selected($WL_Font_Style, 'Shadows Into Light Two' ); ?>>Shadows Into Light Two</option>
						<option value="Shanti" <?php selected($WL_Font_Style, 'Shanti' ); ?>>Shanti</option>
						<option value="Share">Share</option>
						<option value="Shojumaru" <?php selected($WL_Font_Style, 'Shojumaru' ); ?>>Shojumaru</option>
						<option value="Short Stack" <?php selected($WL_Font_Style, 'Short Stack' ); ?>>Short Stack</option>
						<option value="Siemreap"<?php selected($WL_Font_Style, 'Siemreap' ); ?>>Siemreap</option>
						<option value="Sigmar One" <?php selected($WL_Font_Style, 'Sigmar One' ); ?>>Sigmar One</option>
						<option value="Signika"<?php selected($WL_Font_Style, 'Signika' ); ?>>Signika</option>
						<option value="Signika Negative" <?php selected($WL_Font_Style, 'Signika Negative' ); ?>>Signika Negative</option>
						<option value="Simonetta" <?php selected($WL_Font_Style, 'Simonetta' ); ?>>Simonetta</option>
						<option value="Sirin Stencil" <?php selected($WL_Font_Style, 'Sirin Stencil' ); ?>>Sirin Stencil</option>
						<option value="Six Caps" <?php selected($WL_Font_Style, 'Six Caps' ); ?>>Six Caps</option>
						<option value="Slackey" <?php selected($WL_Font_Style, 'Slackey' ); ?>>Slackey</option>
						<option value="Smokum" <?php selected($WL_Font_Style, 'Smokum' ); ?>>Smokum</option>
						<option value="Smythe" <?php selected($WL_Font_Style, 'Smythe' ); ?>>Smythe</option>
						<option value="Sniglet" <?php selected($WL_Font_Style, 'Sniglet' ); ?>>Sniglet</option>
						<option value="Snippet" <?php selected($WL_Font_Style, 'Snippet' ); ?>>Snippet</option>
						<option value="Sofia" <?php selected($WL_Font_Style, 'Sofia' ); ?>>Sofia</option>
						<option value="Sonsie One" <?php selected($WL_Font_Style, 'Sonsie One' ); ?>>Sonsie One</option>
						<option value="Sorts Mill Goudy" <?php selected($WL_Font_Style, 'Sorts Mill Goudy' ); ?>>Sorts Mill Goudy</option>
						<option value="Special Elite" <?php selected($WL_Font_Style, 'Special Elite' ); ?>>Special Elite</option>
						<option value="Spicy Rice" <?php selected($WL_Font_Style, 'Spicy Rice' ); ?>>Spicy Rice</option>
						<option value="Spinnaker" <?php selected($WL_Font_Style, 'Spinnaker' ); ?>>Spinnaker</option>
						<option value="Spirax" <?php selected($WL_Font_Style, 'Spirax' ); ?>>Spirax</option>
						<option value="Squada One" <?php selected($WL_Font_Style, 'Squada One' ); ?>>Squada One</option>
						<option value="Stardos Stencil" <?php selected($WL_Font_Style, 'Stardos Stencil' ); ?>>Stardos Stencil</option>
						<option value="Stint Ultra Condensed" <?php selected($WL_Font_Style, 'Stint Ultra Condensed' ); ?>>Stint Ultra Condensed</option>
						<option value="Stint Ultra Expanded" <?php selected($WL_Font_Style, 'Stint Ultra Expanded' ); ?>>Stint Ultra Expanded</option>
						<option value="Stoke" <?php selected($WL_Font_Style, 'Stoke' ); ?>>Stoke</option>
						<option value="Sue Ellen Francisco" <?php selected($WL_Font_Style, 'Sue Ellen Francisco' ); ?>>Sue Ellen Francisco</option>
						<option value="Sunshiney" <?php selected($WL_Font_Style, 'Sunshiney' ); ?>>Sunshiney</option>
						<option value="Supermercado One" <?php selected($WL_Font_Style, 'Supermercado One' ); ?>>Supermercado One</option>
						<option value="Suwannaphum" <?php selected($WL_Font_Style, 'Suwannaphum' ); ?>>Suwannaphum</option>
						<option value="Swanky and Moo Moo" <?php selected($WL_Font_Style, 'Swanky and Moo Moo' ); ?>>Swanky and Moo Moo</option>
						<option value="Syncopate" <?php selected($WL_Font_Style, 'Syncopate' ); ?>>Syncopate</option>
						<option value="Tangerine" <?php selected($WL_Font_Style, 'Tangerine' ); ?>>Tangerine</option>
						<option value="Taprom" <?php selected($WL_Font_Style, 'Taprom' ); ?>>Taprom</option>
						<option value="Telex" <?php selected($WL_Font_Style, 'Telex' ); ?>>Telex</option>
						<option value="Tenor Sans" <?php selected($WL_Font_Style, 'Tenor Sans' ); ?>>Tenor Sans</option>
						<option value="The Girl Next Door" <?php selected($WL_Font_Style, 'The Girl Next Door' ); ?>>The Girl Next Door</option>
						<option value="Tienne" <?php selected($WL_Font_Style, 'Tienne' ); ?>>Tienne</option>
						<option value="Tinos" <?php selected($WL_Font_Style, 'Tinos' ); ?>>Tinos</option>
						<option value="Titan One" <?php selected($WL_Font_Style, 'Titan One' ); ?>>Titan One</option>
						<option value="Trade Winds" <?php selected($WL_Font_Style, 'Trade Winds' ); ?> >Trade Winds</option>
						<option value="Trocchi" <?php selected($WL_Font_Style, 'Trocchi' ); ?>>Trocchi</option>
						<option value="Trochut" <?php selected($WL_Font_Style, 'Trochut' ); ?>>Trochut</option>
						<option value="Trykker" <?php selected($WL_Font_Style, 'Trykker' ); ?>>Trykker</option>
						<option value="Tulpen One" <?php selected($WL_Font_Style, 'Tulpen One' ); ?>>Tulpen One</option>
						<option value="Ubuntu" <?php selected($WL_Font_Style, 'Ubuntu' ); ?>>Ubuntu</option>
						<option value="Ubuntu Condensed" <?php selected($WL_Font_Style, 'Ubuntu Condensed' ); ?>>Ubuntu Condensed</option>
						<option value="Ubuntu Mono" <?php selected($WL_Font_Style, 'Ubuntu Mono' ); ?>>Ubuntu Mono</option>
						<option value="Ultra" <?php selected($WL_Font_Style, 'Ultra' ); ?>>Ultra</option>
						<option value="Uncial Antiqua" <?php selected($WL_Font_Style, 'Uncial Antiqua' ); ?>>Uncial Antiqua</option>
						<option value="UnifrakturCook" <?php selected($WL_Font_Style, 'UnifrakturCook' ); ?>>UnifrakturCook</option>
						<option value="UnifrakturMaguntia" <?php selected($WL_Font_Style, 'UnifrakturMaguntia' ); ?>>UnifrakturMaguntia</option>
						<option value="Unkempt" <?php selected($WL_Font_Style, 'Unkempt' ); ?>>Unkempt</option>
						<option value="Unlock" <?php selected($WL_Font_Style, 'Unlock' ); ?>>Unlock</option>
						<option value="Unna" <?php selected($WL_Font_Style, 'Unna' ); ?>>Unna</option>
						<option value="VT323" <?php selected($WL_Font_Style, 'VT323' ); ?>>VT323</option>
						<option value="Varela" <?php selected($WL_Font_Style, 'Varela' ); ?>>Varela</option>
						<option value="Varela Round" <?php selected($WL_Font_Style, 'Varela Round' ); ?>>Varela Round</option>
						<option value="Vast Shadow" <?php selected($WL_Font_Style, 'Vast Shadow' ); ?>>Vast Shadow</option>
						<option value="Vibur" <?php selected($WL_Font_Style, 'Vibur' ); ?>>Vibur</option>
						<option value="Vidaloka" <?php selected($WL_Font_Style, 'Vidaloka' ); ?>>Vidaloka</option>
						<option value="Viga" <?php selected($WL_Font_Style, 'Viga' ); ?>>Viga</option>
						<option value="Voces" <?php selected($WL_Font_Style, 'Voces' ); ?>>Voces</option>
						<option value="Volkhov" <?php selected($WL_Font_Style, 'Volkhov' ); ?>>Volkhov</option>
						<option value="Vollkorn" <?php selected($WL_Font_Style, 'Vollkorn' ); ?>>Vollkorn</option>
						<option value="Voltaire" <?php selected($WL_Font_Style, 'Voltaire' ); ?>>Voltaire</option>
						<option value="Waiting for the Sunrise" <?php selected($WL_Font_Style, 'Waiting for the Sunrise' ); ?>>Waiting for the Sunrise</option>
						<option value="Wallpoet" <?php selected($WL_Font_Style, 'Wallpoet' ); ?>>Wallpoet</option>
						<option value="Walter Turncoat" <?php selected($WL_Font_Style, 'Walter Turncoat' ); ?>>Walter Turncoat</option>
						<option value="Wellfleet" <?php selected($WL_Font_Style, 'Wellfleet' ); ?>>Wellfleet</option>
						<option value="Wire One" <?php selected($WL_Font_Style, 'Wire One' ); ?>>Wire One</option>
						<option value="Yanone Kaffeesatz" <?php selected($WL_Font_Style, 'Yanone Kaffeesatz' ); ?>>Yanone Kaffeesatz</option>
						<option value="Yellowtail" <?php selected($WL_Font_Style, 'Yellowtail' ); ?>>Yellowtail</option>
						<option value="Yeseva One" <?php selected($WL_Font_Style, 'Yeseva One' ); ?>>Yeseva One</option>
						<option value="Yesteryear" <?php selected($WL_Font_Style, 'Yesteryear' ); ?>>Yesteryear</option>
						<option value="Zeyada" <?php selected($WL_Font_Style, 'Zeyada' ); ?>>Zeyada</option>
					</optgroup>
				</select>
				<p class="description">Choose a caption font style.</p>
			</td>
		</tr>

		<tr>
			<th scope="row"><label>Light Box Styles</label></th>
			<td>
				<?php if(!isset($WL_Light_Box)) $WL_Light_Box = "lightbox2"; ?>
				<select name="wl-light-box" id="wl-light-box">
					<optgroup label="Select Light Box Styles">
						<option value="lightbox1" <?php if($WL_Light_Box == 'lightbox1') echo "selected=selected"; ?>>Nivo Box</option>
						<option value="lightbox2" <?php if($WL_Light_Box == 'lightbox2') echo "selected=selected"; ?>>Photobox</option>
						<option value="lightbox3" <?php if($WL_Light_Box == 'lightbox3') echo "selected=selected"; ?>>Pretty photo</option>
						<option value="lightbox4" <?php if($WL_Light_Box == 'lightbox4') echo "selected=selected"; ?>>Swipe Box</option>
					</optgroup>
				</select>
				<p class="description">Choose a image light box style for large preview after click on an image.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Show Lightbox on icon</label></th>
			<td>
				<?php if(!isset($WL_Show_Image_Lightbox)) $WL_Show_Image_Lightbox = "yes"; ?>
				<input type="radio" name="wl-show-image-lightbox" id="wl-show-image-lightbox" value="yes" <?php if($WL_Show_Image_Lightbox == 'yes' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="wl-show-image-lightbox" id="wl-show-image-lightbox" value="no" <?php if($WL_Show_Image_Lightbox == 'no' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">Select Yes if show lightbox on icon or select No if want show lightbox on image click</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Image View Icon</label></th>
			<td>
				<?php if(!isset($WL_Image_View_Icon)) $WL_Image_View_Icon = "fa-camera"; ?>
				<input type="text" name="wl-image-view-icon" id="wl-image-view-icon" value="<?php echo $WL_Image_View_Icon; ?>">
				<p class="description">Choose image view icon. Click <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">here</a> to find out more icon names.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e("Icon Size", RPGP_TEXT_DOMAIN ); ?></label></th>
			<td>
				<?php if(!isset($WL_Image_View_Icon_Size)) $WL_Image_View_Icon_Size = "fa-3x"; ?>
				<input type="radio" name="wl-image-view-icon-size" id="wl-image-view-icon-size" value="fa-lg" <?php if($WL_Image_View_Icon_Size == 'fa-lg' ) { echo "checked"; } ?>> <i class="fa <?php echo $WL_Image_View_Icon; ?> fa-lg"></i> 
				<input type="radio" name="wl-image-view-icon-size" id="wl-image-view-icon-size" value="fa-2x" <?php if($WL_Image_View_Icon_Size == 'fa-2x' ) { echo "checked"; } ?>> <i class="fa <?php echo $WL_Image_View_Icon; ?> fa-2x"></i>
				<input type="radio" name="wl-image-view-icon-size" id="wl-image-view-icon-size" value="fa-3x" <?php if($WL_Image_View_Icon_Size == 'fa-3x' ) { echo "checked"; } ?>> <i class="fa <?php echo $WL_Image_View_Icon; ?> fa-3x"></i>
				<input type="radio" name="wl-image-view-icon-size" id="wl-image-view-icon-size" value="fa-4x" <?php if($WL_Image_View_Icon_Size == 'fa-4x' ) { echo "checked"; } ?>> <i class="fa <?php echo $WL_Image_View_Icon; ?> fa-4x"></i>
				<input type="radio" name="wl-image-view-icon-size" id="wl-image-view-icon-size" value="fa-5x" <?php if($WL_Image_View_Icon_Size == 'fa-5x' ) { echo "checked"; } ?>> <i class="fa <?php echo $WL_Image_View_Icon; ?> fa-5x"></i>
				<p class="description"><?php _e("Choose image view icon Size", RPGP_TEXT_DOMAIN ); ?>. <?php _e("Click", RPGP_TEXT_DOMAIN ); ?> <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><?php _e("here", RPGP_TEXT_DOMAIN ); ?></a> <?php _e("to find out more icon names", RPGP_TEXT_DOMAIN ); ?>.</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php _e('Custom CSS','RPGP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if(!isset($WL_Custom_Css)) $WL_Custom_Css = ""; ?>
				<textarea id="wl-custom-css" name="wl-custom-css" type="text" class="" style="width:80%"><?php echo $WL_Custom_Css; ?></textarea>
				<p class="description">
					<?php _e('Enter any custom css you want to apply on this gallery.','RPGP_TEXT_DOMAIN')?><br>
					<?php _e('Note: Please Do Not Use <b>Style</b> Tag With Custom CSS.','RPGP_TEXT_DOMAIN')?>
				</p>
			</td>
		</tr>
	</tbody>
</table>