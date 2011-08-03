<?php
/*  Copyright 2011  Alexander Balsam  (email : a.balsam@nedeco.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<link rel="stylesheet" href="<?php echo get_plugin_url_ned_stoerer() ?>/style.css" type="text/css" />
<script language="JavaScript">
jQuery(document).ready(function() {
jQuery('#upload_image_button').click(function() {
formfield = jQuery('#ned_stoerer_image').attr('name');
tb_show('', 'media-upload.php?type=image&TB_iframe=true');
return false;
});

window.send_to_editor = function(html) {
imgurl = jQuery('img',html).attr('src');
jQuery('#ned_stoerer_image').val(imgurl);
tb_remove();
}

});
</script>
<h3>NED interferer</h3>
This plugin lets you place an interferer just somewhere on your Wordpress Blog.<br>
<br>
<div id="message" class="updated">
	<p style="font-weight: bold;">
		Thanks for using this plugin! If you love this plugin and you are satisfied with the results, please visit our blog and leave a <a href="http://development.nedeco.de/blog/interferer">comment</a> ?
	</p>
</div>
<br>
<img src="<?php echo get_plugin_url_ned_stoerer() ?>/000_interferer_sample.jpg"></img>
<br>
<br>
<br>
<form name="ned_stoerer" method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="ned_stoerer_link, ned_stoerer_top, ned_stoerer_left, ned_stoerer_image,ned_stoerer_active" />
<table border="0">

	<tr>
		<td>Active</td>
		<td>
		    <select name="ned_stoerer_active" size="1">
		    	<option value="true" <?php if (get_option('ned_stoerer_active')=='true') echo "selected"; ?>>yes</option>
		    	<option value="false" <?php if (get_option('ned_stoerer_active')=='false') echo "selected"; ?>>no</option>
		    </select>		
		</td>
	<td>Set this to true to activate the interferer on your blog.</td>		
	</tr>

	<tr>
		<td>Top</td>
		<td><input type="text" name="ned_stoerer_top" value="<?php echo get_option('ned_stoerer_top');?>"></input></td>
		<td>Number of pixels from the top of your page. e.g 100px</td>		
	</tr>
	<tr>
		<td>Left</td>
		<td><input type="text" name="ned_stoerer_left" value="<?php echo get_option('ned_stoerer_left');?>"></input></td>
		<td>Number of pixels from the center of your page. e.g. 100 px to place the interferer 100 px right to the center of your page. This value can be negative.</td>		
	</tr>
	<tr>
		<td>URL</td>
		<td><input type="text" name="ned_stoerer_link" value="<?php echo get_option('ned_stoerer_link');?>"></input></td>
		<td>The URL to link to.</td>		
	</tr>
	<tr>
		<td valign="top">Image</td>
		<td>
			<input id="ned_stoerer_image" type="text" size="36" name="ned_stoerer_image" value="<?php echo get_option('ned_stoerer_image'); ?>" />
			<input id="upload_image_button" type="button" value="Upload Image" />
			<br />Enter an URL or upload an image for the interferer.
		</td>
		<td valign="top">This is the image that gets shown.</td>
	</tr>
	<tr>
		<td></td>
		<td colspan="2"><input type="submit" value="save this settings"></input></td>		
	</tr>
</table>
</form>
