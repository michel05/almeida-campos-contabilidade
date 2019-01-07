<?php /* Smarty version 2.6.25-dev, created on 2015-01-08 15:49:38
         compiled from templates/SuperFlat_v2/style.css */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'BACKGROUND_COLOR', 'templates/SuperFlat_v2/style.css', 11, false),array('function', 'IFPROPERTY', 'templates/SuperFlat_v2/style.css', 12, false),array('function', 'PROPERTY', 'templates/SuperFlat_v2/style.css', 112, false),)), $this); ?>
/*
    Some Style Themes enhanced with background textures provided by http://subtlepatterns.com/
*/
.yola_bg_overlay{
    display:table;
    position:absolute;
    min-height: 100%;
    min-width: 100%;
    width:100%;
    height:100%;
    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'body.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-image: url(%s);','name' => 'body.background-image','anticache' => 'true','urlencode' => 'true'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-repeat: %s;','name' => 'body.background-repeat'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-attachment: %s;','name' => 'body.background-attachment'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-position: %s;','name' => 'body.background-position'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-size: %s;','name' => 'body.background-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => '-webkit-background-size: %s;','name' => 'body.background-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => '-moz-background-size: %s;','name' => 'body.background-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => '-o-background-size: %s;','name' => 'body.background-size'), $this);?>

}
.yola_outer_content_wrapper {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top: %s;','name' => 'body.padding-top'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right: %s;','name' => 'body.padding-right'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom: %s;','name' => 'body.padding-bottom'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left: %s;','name' => 'body.padding-left'), $this);?>

}
.yola_inner_bg_overlay {
    display: table-cell;
    width:100%;
    height:100%;
    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'body.foreground-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'vertical-align: %s;','name' => 'page.vertical-align'), $this);?>

}

.yola_banner_wrap {
	text-align: center;
	margin: 0 auto;

}

.yola_outer_heading_wrap {
	text-align: center;
    margin: 0 auto;
    display: table;
	width:100%;
    text-align: center;
    background-attachment: scroll;
    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'banner.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'banner.max-width'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-position: %s;','name' => 'banner.background-position'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-size: %s;','name' => 'banner.background-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-repeat: %s;','name' => 'banner.background-repeat'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-image: url(%s);','name' => 'banner.src','anticache' => 'true','urlencode' => 'true'), $this);?>

}

.yola_inner_heading_wrap {
	display: table-cell;
	vertical-align: middle;
	margin: 0 auto;
	text-align: center;
    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'header.background-color'), $this);?>

}

.yola_innermost_heading_wrap {
    margin: 0 auto;
	<?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'banner.content.max-width'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top:%s;','name' => 'banner.padding-top'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right:%s;','name' => 'banner.padding-right'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom:%s;','name' => 'banner.padding-bottom'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left:%s;','name' => 'banner.padding-left'), $this);?>

}

.yola_banner_wrap nav {
    margin: 0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'banner.max-width'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top:%s;','name' => 'nav.padding-top'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right:%s;','name' => 'nav.padding-right'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom:%s;','name' => 'nav.padding-bottom'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left:%s;','name' => 'nav.padding-left'), $this);?>

    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'nav.background-color'), $this);?>

}

.yola_inner_nav_wrap {
	margin: 0 auto;
	<?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'banner.content.max-width'), $this);?>

}

.yola_banner_wrap nav ul.sys_navigation {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-align: %s;','name' => 'nav.text-align'), $this);?>

}

.yola_banner_wrap h1 {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-align: %s;','name' => 'h1.text-align'), $this);?>

    margin:0;
}

.yola_site_tagline {
    margin:0;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'site.tagline.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'site.tagline.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'site.tagline.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'site.tagline.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-decoration: %s;','name' => 'site.tagline.text-decoration'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'site.tagline.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'site.tagline.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'site.tagline.text-transform'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-align: %s;','name' => 'site.tagline.text-align'), $this);?>

}

.yola_site_tagline span {
    display: inline-block;
    margin: <?php echo smarty_function_PROPERTY(array('name' => 'site.tagline.margin-top'), $this);?>
 0 0 0;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top:%s;','name' => 'site.tagline.padding-top'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right:%s;','name' => 'site.tagline.padding-right'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom:%s;','name' => 'site.tagline.padding-bottom'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left:%s;','name' => 'site.tagline.padding-left'), $this);?>

    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'site.tagline.background-color'), $this);?>

}

ul.sys_navigation {
    margin: 0;
    padding: 0;
    text-align: center;
}

ul.sys_navigation li {
    display: inline;
    list-style-type: none;
    margin:0 <?php echo smarty_function_PROPERTY(array('name' => 'nav.spacing'), $this);?>
 0 0;
}

.yola_inner_nav_wrap ul.sys_navigation li:last-child {
    margin:0;
}

.yola_content_wrap {
    margin:0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'content.max-width'), $this);?>

    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'content.background-color'), $this);?>

}

.yola_content_column {
	margin:0 auto;
    min-height:200px;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'content.content.max-width'), $this);?>

}

.yola_inner_content_column {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top:%s;','name' => 'content.padding-top'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right:%s;','name' => 'content.padding-right'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom:%s;','name' => 'content.padding-bottom'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left:%s;','name' => 'content.padding-left'), $this);?>

}

.yola_inner_footer_wrap {
    padding: 0 20px;
}

div[id*='sys_region_'] {
    padding-left: 0 ! important;
    padding-right: 0 ! important;
}

.yola_site_logo {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'width: %s;','name' => 'site.logo.width'), $this);?>

}

#sys_heading.yola_hide_logo img {
    display:none;
}
#sys_heading.yola_hide_logo span {
    display:inline;
}

#sys_heading.yola_show_logo img {
    display:inline;
}
a#sys_heading.yola_show_logo {
    font-size:14px;
}
#sys_heading.yola_show_logo span {
    display:none;
}

.yola_footer_wrap {
    margin:0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'content.max-width'), $this);?>

}

.yola_footer_column {
    margin:0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'content.content.max-width'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'display: %s;','name' => 'footer.display'), $this);?>

}

footer {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top: %s;','name' => 'footer.padding-top'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right: %s;','name' => 'footer.padding-right'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom: %s;','name' => 'footer.padding-bottom'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left: %s;','name' => 'footer.padding-left'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'footer.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'footer.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'footer.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'footer.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'footer.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'footer.text-transform'), $this);?>

    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'footer.background-color'), $this);?>

}

span.yola_footer_socialbuttons{
    display:inline-block;
    line-height:0;
    margin:0;
    padding:0;
    display:inline-block;
    position:static;
    float:left;
    width:146px;
    height:20px;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'display: %s;','name' => 'footer.socialbuttons.display'), $this);?>

}

.sys_yola_form .submit, .sys_yola_form input.text, .sys_yola_form textarea {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'p.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'p.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'p.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'p.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'p.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'p.text-transform'), $this);?>

}

div.sys_yola_form {
    padding:0 !important;
}

div.sys_yola_form form{
    margin:0 !important;
    padding:0 !important;
}

.sys_layout h2, .sys_txt h2, .sys_layout h3, .sys_txt h3, .sys_layout h4, .sys_txt h4, .sys_layout h5, .sys_txt h5, .sys_layout h6, .sys_txt h6, .sys_layout p, .sys_txt p {
    margin-top:0;
}


div[id*='sys_region_'] {
    padding:0 !important;
}

blockquote {
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 50px;
    padding-left: 15px;
    border-left: 3px solid <?php echo smarty_function_IFPROPERTY(array('format' => '%s;','name' => 'p.color'), $this);?>
;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'blockquote.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'blockquote.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'blockquote.color'), $this);?>

    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'blockquote.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'blockquote.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'blockquote.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'blockquote.text-transform'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-style: %s;','name' => 'blockquote.font-style'), $this);?>

}