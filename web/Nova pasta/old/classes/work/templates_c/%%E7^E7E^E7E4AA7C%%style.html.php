<?php /* Smarty version 2.6.25-dev, created on 2015-01-08 15:49:36
         compiled from templates%5CSuperFlat_v2%5Cstyle.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'PROPERTY', 'templates\\SuperFlat_v2\\style.html', 1, false),array('function', 'HEADER', 'templates\\SuperFlat_v2\\style.html', 22, false),array('function', 'IFPROPERTY', 'templates\\SuperFlat_v2\\style.html', 36, false),array('function', 'CONTENT', 'templates\\SuperFlat_v2\\style.html', 86, false),array('function', 'STYLE_FOOTER', 'templates\\SuperFlat_v2\\style.html', 95, false),array('function', 'YOLACREDIT', 'templates\\SuperFlat_v2\\style.html', 100, false),array('function', 'TRACKING', 'templates\\SuperFlat_v2\\style.html', 104, false),array('modifier', 'anticache', 'templates\\SuperFlat_v2\\style.html', 15, false),)), $this); ?>
<?php ob_start(); ?><?php echo smarty_function_PROPERTY(array('name' => "site.logo.src"), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('site_logo_src', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php echo smarty_function_PROPERTY(array('name' => "heading.text"), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('heading_text', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php echo smarty_function_PROPERTY(array('name' => "site.tagline.text"), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('site_tagline_text', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php echo smarty_function_PROPERTY(array('name' => "header.alignment"), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('header_alignment', ob_get_contents());ob_end_clean(); ?>
<?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'templates/common/primary_menu.tpl', 'smarty_include_vars' => array('submenutype' => 'flyover')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('primary_menu', ob_get_contents()); ob_end_clean();
 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- normalize and html5 boilerplate resets -->
        <link rel="stylesheet" href="<?php echo ((is_array($_tmp='templates/SuperFlat_v2/resources/css/reset.css')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
">

        <!--[if lte IE 9]>
        <script src="<?php echo ((is_array($_tmp='templates/SuperFlat_v2/resources/js/html5shiv.js')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
"></script>
        <script src="<?php echo ((is_array($_tmp='templates/SuperFlat_v2/resources/js/html5shiv-printshiv.js')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
"></script>
        <![endif]-->

        <?php echo smarty_function_HEADER(array(), $this);?>

    </head>
    <body>
        <div id="sys_background" class="yola_bg_overlay">
            <div class="yola_inner_bg_overlay">
                <div class="yola_outer_content_wrapper">
                    <header role="banner">
                        <?php if ($this->_tpl_vars['header_alignment'] == 'bottom'): ?>
                        <div class="yola_banner_wrap">
                            <div id="sys_banner" class="yola_outer_heading_wrap">
                                <div class="yola_inner_heading_wrap">
                                    <div class="yola_innermost_heading_wrap">
                                        <h1>
                                            <a id="sys_heading" class="<?php if ($this->_tpl_vars['site_logo_src'] != ''): ?>yola_show_logo<?php else: ?>yola_hide_logo<?php endif; ?>" href="./">
                                                <img class="yola_site_logo" src="<?php echo smarty_function_IFPROPERTY(array('format' => '%s','name' => 'site.logo.src','anticache' => 'true','urlencode' => 'true'), $this);?>
" alt="<?php echo smarty_function_IFPROPERTY(array('format' => '%s','name' => 'heading.text'), $this);?>
" >
                                                <span><?php echo smarty_function_PROPERTY(array('name' => 'heading.text'), $this);?>
</span>
                                            </a>
                                        </h1>
                                        <h2 class="yola_site_tagline" style="display:<?php if ($this->_tpl_vars['site_tagline_text'] != ''): ?>block<?php else: ?>none<?php endif; ?>"><span><?php echo smarty_function_PROPERTY(array('name' => 'site.tagline.text'), $this);?>
</span></h2>
                                    </div>
                                </div>
                            </div>
                            <nav role="navigation">
                                <div class="yola_inner_nav_wrap">
                                    <div class='sys_navigation'>
                                        <?php echo $this->_tpl_vars['primary_menu']; ?>

                                    </div>
                                    <div style="clear:both;"></div>
                                </div>
                            </nav>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['header_alignment'] == 'top'): ?>
                        <div class="yola_banner_wrap">
                            <nav role="navigation">
                                <div class="yola_inner_nav_wrap">
                                    <div class='sys_navigation'>
                                        <?php echo $this->_tpl_vars['primary_menu']; ?>

                                    </div>
                                    <div style="clear:both;"></div>
                                </div>
                            </nav>
                            <div id="sys_banner" class="yola_outer_heading_wrap">
                                <div class="yola_inner_heading_wrap">
                                    <div class="yola_innermost_heading_wrap">
                                        <h1>
                                            <a id="sys_heading" class="<?php if ($this->_tpl_vars['site_logo_src'] != ''): ?>yola_show_logo<?php else: ?>yola_hide_logo<?php endif; ?>" href="./">
                                                <img class="yola_site_logo" src="<?php echo smarty_function_IFPROPERTY(array('format' => '%s','name' => 'site.logo.src','anticache' => 'true','urlencode' => 'true'), $this);?>
" alt="<?php echo smarty_function_IFPROPERTY(array('format' => '%s','name' => 'heading.text'), $this);?>
" >
                                                <span><?php echo smarty_function_PROPERTY(array('name' => 'heading.text'), $this);?>
</span>
                                            </a>
                                        </h1>
                                        <h2 class="yola_site_tagline" style="display:<?php if ($this->_tpl_vars['site_tagline_text'] != ''): ?>block<?php else: ?>none<?php endif; ?>"><span><?php echo smarty_function_PROPERTY(array('name' => 'site.tagline.text'), $this);?>
</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                    </header>

                    <main class="yola_content_wrap" role="main">
                        <div class="yola_content_column">
                            <div class="yola_inner_content_column">
                                <div style="padding:0; height:0; clear:both;">&nbsp;</div>
                                <?php echo smarty_function_CONTENT(array(), $this);?>

                                <div style="padding:0; height:0; clear:both;">&nbsp;</div>
                            </div>
                        </div>
                    </main>

                    <div class="yola_footer_wrap">
                        <div class="yola_footer_column">
                            <footer id="yola_style_footer">
                                <?php echo smarty_function_STYLE_FOOTER(array(), $this);?>

                            </footer>
                        </div>
                    <div>

                    <?php echo smarty_function_YOLACREDIT(array(), $this);?>

                </div>
            </div> <!-- .inner_bg_overlay -->
        </div> <!-- #sys_background / .bg_overlay -->
        <?php echo smarty_function_TRACKING(array(), $this);?>

        <?php if (@_SYSTEM_MODE == 'DESIGN'): ?>
        <script src="<?php echo ((is_array($_tmp='templates/SuperFlat_v2/resources/js/sitebuilder.js')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
"></script>
        <script src="<?php echo ((is_array($_tmp='/ide/lib/jquery/plugins/third-party/jquery.nearest.min.js')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
"></script>
        <?php endif; ?>
    </body>
</html>

