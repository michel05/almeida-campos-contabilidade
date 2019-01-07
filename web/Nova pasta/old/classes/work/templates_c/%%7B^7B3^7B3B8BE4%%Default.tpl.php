<?php /* Smarty version 2.6.25-dev, created on 2015-01-08 15:50:00
         compiled from E:%5Chome%5Calmeidaeca1%5Calmeidaecampos.com.br%5Cweb/classes/components/Form%5Clayouts%5CDefault%5CDefault.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'E:\\home\\almeidaeca1\\almeidaecampos.com.br\\web/classes/components/Form\\layouts\\Default\\Default.tpl', 26, false),array('block', 'TRANSLATE', 'E:\\home\\almeidaeca1\\almeidaecampos.com.br\\web/classes/components/Form\\layouts\\Default\\Default.tpl', 61, false),)), $this); ?>
<div class="sys_yola_form<?php if ($this->_tpl_vars['system']['mobile']): ?> sys_yola_form_mobile<?php endif; ?>">
    
    <?php if ($this->_tpl_vars['posted'] == false || $this->_tpl_vars['failed'] == true): ?>
    
        <?php if ($this->_tpl_vars['data']['heading'] != ''): ?>
    	    <h2><?php echo $this->_tpl_vars['data']['heading']; ?>
</h2>
        <?php endif; ?>
    
        <form method='post' accept-charset="UTF-8" action='<?php echo $this->_tpl_vars['formServicePath']; ?>
/<?php echo $this->_tpl_vars['locale']; ?>
/<?php echo $this->_tpl_vars['userId']; ?>
/<?php echo $this->_tpl_vars['siteId']; ?>
/<?php echo $this->_tpl_vars['pageId']; ?>
/<?php echo $this->_tpl_vars['widgetId']; ?>
/'>
        
            <?php $_from = $this->_tpl_vars['data']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
        
                <div class='yola-form-field'>
        
                    <?php if ($this->_tpl_vars['field']['type'] == 'paragraph'): ?>
                        <p class='form-paragraph'><?php echo $this->_tpl_vars['field']['label']; ?>
</p>
                    <?php elseif ($this->_tpl_vars['field']['label'] != ''): ?>
                        <?php if ($this->_tpl_vars['field']['type'] != 'radio' && $this->_tpl_vars['field']['type'] != 'checkbox'): ?>
                	        <p class='label'><label for='yola_form_widget_<?php echo $this->_tpl_vars['widgetId']; ?>
_<?php echo $this->_tpl_vars['field']['id']; ?>
'><?php echo $this->_tpl_vars['field']['label']; ?>
</label></p>	
                        <?php else: ?>
                	        <p class='label'><?php echo $this->_tpl_vars['field']['label']; ?>
</p>	
                        <?php endif; ?>
                    <?php endif; ?>
    
                    <?php if ($this->_tpl_vars['field']['type'] == 'text'): ?>
                        <input id='yola_form_widget_<?php echo $this->_tpl_vars['widgetId']; ?>
_<?php echo $this->_tpl_vars['field']['id']; ?>
' class='text' name='<?php echo $this->_tpl_vars['field']['id']; ?>
<text>' type='text' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['field']['defaultValue'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
'<?php if ($this->_tpl_vars['_SYSTEM_MODE'] == 'DESIGN'): ?> readonly='readonly'<?php endif; ?> />
                    <?php elseif ($this->_tpl_vars['field']['type'] == 'textarea'): ?>
                        <textarea id='yola_form_widget_<?php echo $this->_tpl_vars['widgetId']; ?>
_<?php echo $this->_tpl_vars['field']['id']; ?>
' name='<?php echo $this->_tpl_vars['field']['id']; ?>
<textarea>'<?php if ($this->_tpl_vars['_SYSTEM_MODE'] == 'DESIGN'): ?> readonly='readonly'<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['field']['defaultValue'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
                    <?php elseif ($this->_tpl_vars['field']['type'] == 'radio'): ?>
                        <?php $_from = $this->_tpl_vars['field']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option_index'] => $this->_tpl_vars['option']):
?>
                            <input class='radio' id='yola_form_widget_<?php echo $this->_tpl_vars['widgetId']; ?>
_<?php echo $this->_tpl_vars['field']['id']; ?>
_<?php echo $this->_tpl_vars['option_index']; ?>
' type='radio'<?php if ($this->_tpl_vars['option']['checked'] == 'true'): ?> checked='checked'<?php endif; ?> name='<?php echo $this->_tpl_vars['field']['id']; ?>
<radio>' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['label'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
'<?php if ($this->_tpl_vars['_SYSTEM_MODE'] == 'DESIGN'): ?> readonly='readonly'<?php endif; ?> />
                            <label for='yola_form_widget_<?php echo $this->_tpl_vars['widgetId']; ?>
_<?php echo $this->_tpl_vars['field']['id']; ?>
_<?php echo $this->_tpl_vars['option_index']; ?>
'><?php echo $this->_tpl_vars['option']['label']; ?>
</label>
                            <br />
                        <?php endforeach; endif; unset($_from); ?>
                    <?php elseif ($this->_tpl_vars['field']['type'] == 'checkbox'): ?>
                        <?php $_from = $this->_tpl_vars['field']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option_index'] => $this->_tpl_vars['option']):
?>
                            <input class='checkbox' id='yola_form_widget_<?php echo $this->_tpl_vars['widgetId']; ?>
_<?php echo $this->_tpl_vars['field']['id']; ?>
_<?php echo $this->_tpl_vars['option_index']; ?>
' type='checkbox'<?php if ($this->_tpl_vars['option']['checked'] == 'true'): ?> checked='checked'<?php endif; ?> name='<?php echo $this->_tpl_vars['field']['id']; ?>
<checkbox>' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['label'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
'<?php if ($this->_tpl_vars['_SYSTEM_MODE'] == 'DESIGN'): ?> readonly='readonly'<?php endif; ?> />
                            <label for='yola_form_widget_<?php echo $this->_tpl_vars['widgetId']; ?>
_<?php echo $this->_tpl_vars['field']['id']; ?>
_<?php echo $this->_tpl_vars['option_index']; ?>
'><?php echo $this->_tpl_vars['option']['label']; ?>
</label>
                            <br />
                        <?php endforeach; endif; unset($_from); ?>
                    <?php elseif ($this->_tpl_vars['field']['type'] == 'list'): ?>
                        <select id='yola_form_widget_<?php echo $this->_tpl_vars['widgetId']; ?>
_<?php echo $this->_tpl_vars['field']['id']; ?>
' name='<?php echo $this->_tpl_vars['field']['id']; ?>
<list>'<?php if ($this->_tpl_vars['_SYSTEM_MODE'] == 'DESIGN'): ?> readonly='readonly'<?php endif; ?>>
                            <?php $_from = $this->_tpl_vars['field']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?>
                                <option value='<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['label'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
'<?php if ($this->_tpl_vars['option']['selected'] == 'true'): ?> selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['option']['label']; ?>
</option><br />
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                    <?php elseif ($this->_tpl_vars['field']['type'] == 'captcha'): ?>
                    
                        <?php if ($this->_tpl_vars['_SYSTEM_MODE'] != 'DESIGN'): ?>
                            <div class='yola-form-captcha'>
                                <input type="hidden" name="recaptcha_exists" value="true" />
                                <script type="text/javascript">
                                    var RecaptchaOptions = {
                                        theme : 'custom',
                                        custom_theme_widget: 'responsive_recaptcha',
                                        lang : '<?php echo $this->_tpl_vars['short_locale']; ?>
'
                                    };
                                </script>
                                <div id="responsive_recaptcha" class="responsive_recaptcha" style="display:none">
                                    <div id="recaptcha_image" class="recaptcha_image"></div>
                                    <div class="recaptcha_only_if_incorrect_sol" style="color:red"><?php $this->_tag_stack[] = array('TRANSLATE', array()); $_block_repeat=true;smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Incorrect please try again<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>

                                    <label class="solution" for="recaptcha_response_field">
                                        <span class="recaptcha_only_if_image"><?php $this->_tag_stack[] = array('TRANSLATE', array()); $_block_repeat=true;smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter the words above:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
                                        <span class="recaptcha_only_if_audio"><?php $this->_tag_stack[] = array('TRANSLATE', array()); $_block_repeat=true;smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter the numbers you hear:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>

                                        <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
                                    </label>
                                    <div class="options">
                                        <a class="link" href="javascript:Recaptcha.reload()" id="icon-reload" ><?php $this->_tag_stack[] = array('TRANSLATE', array()); $_block_repeat=true;smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Get another CAPTCHA<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                                        <a class="recaptcha_only_if_image link" href="javascript:Recaptcha.switch_type('audio')" id="icon-audio"><?php $this->_tag_stack[] = array('TRANSLATE', array()); $_block_repeat=true;smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Get an audio CAPTCHA<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                                        <a class="recaptcha_only_if_audio link" href="javascript:Recaptcha.switch_type('image')" id="icon-image"><?php $this->_tag_stack[] = array('TRANSLATE', array()); $_block_repeat=true;smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Get an image CAPTCHA<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                                        <a class="link" href="javascript:Recaptcha.showhelp()" id="icon-help"><?php $this->_tag_stack[] = array('TRANSLATE', array()); $_block_repeat=true;smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Help<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                                    </div>
                                </div>

                                <script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6LfoaMgSAAAAAGMzj8k0S-f8DgM2n7___IHBVH88">
                                </script>

                                <noscript>
                                    <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LfoaMgSAAAAAGMzj8k0S-f8DgM2n7___IHBVH88" height="300" width="500" frameborder="0"></iframe>
                                    <br>
                                    <textarea name="recaptcha_challenge_field" rows="3" cols="40">
                                    </textarea>
                                    <input type="hidden" name="recaptcha_response_field" value="manual_challenge">
                                </noscript>

                            </div>

                        <?php else: ?>
                        
                            <div class='yola-form-captcha'>
                                <div class='yola-form-captcha-representation'></div>
                            </div>
                    
                        <?php endif; ?>
                
                    <?php endif; ?>
    
                    <input type='hidden' name='<?php echo $this->_tpl_vars['field']['id']; ?>
<label>' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['field']['label'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
'<?php if ($this->_tpl_vars['_SYSTEM_MODE'] == 'DESIGN'): ?> readonly='readonly'<?php endif; ?> />
            
                </div>
        
            <?php endforeach; endif; unset($_from); ?>

            <input type='hidden' name='redirect' value='<?php echo $this->_tpl_vars['redirect']; ?>
' />
            <input type='hidden' name='locale' value='<?php echo $this->_tpl_vars['locale']; ?>
' />
            <input type='hidden' name='redirect_fail' value='<?php echo $this->_tpl_vars['redirectFail']; ?>
' />
            <input type='hidden' name='form_name' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['heading'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
' />
            <input type='hidden' name='site_name' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['siteName'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
' />
            <input type='hidden' name='wl_site' value='<?php echo $this->_tpl_vars['isWhiteLabel']; ?>
' />
            <?php if ($this->_tpl_vars['destination']): ?>
            <input type='hidden' name='destination' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['destination'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
' />
            <?php endif; ?>

            <?php if ($this->_tpl_vars['data']['submit'] && $this->_tpl_vars['data']['submit'] != ''): ?>
                <p><input class='submit' type="submit" value="<?php echo $this->_tpl_vars['data']['submit']; ?>
"<?php if ($this->_tpl_vars['_SYSTEM_MODE'] == 'DESIGN'): ?> readonly='readonly'<?php endif; ?> /></p>
            <?php endif; ?>

        </form>
        
    <?php endif; ?>

    <?php if ($this->_tpl_vars['posted'] == true): ?>
        
        <div class='yola-form-message'>
        
            <?php if ($this->_tpl_vars['failed'] != true): ?>

                <p><?php echo $this->_tpl_vars['successMessage']; ?>
<p>
            
            <?php else: ?>

                <p><?php $this->_tag_stack[] = array('TRANSLATE', array()); $_block_repeat=true;smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Form Post Failed. Please try again.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><p>
            
            <?php endif; ?>
        
        </div>
        
    <?php endif; ?>

</div>