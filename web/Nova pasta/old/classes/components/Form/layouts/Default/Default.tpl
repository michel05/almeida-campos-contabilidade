<div class="sys_yola_form<% if $system.mobile %> sys_yola_form_mobile<% /if %>">
    
    <% if $posted == false || $failed == true %>
    
        <%if $data.heading neq ''%>
    	    <h2><% $data.heading %></h2>
        <%/if%>
    
        <form method='post' accept-charset="UTF-8" action='<% $formServicePath %>/<%$locale%>/<%$userId%>/<%$siteId%>/<%$pageId%>/<%$widgetId%>/'>
        
            <% foreach from=$data.fields item=field %>
        
                <div class='yola-form-field'>
        
                    <%if $field.type eq 'paragraph' %>
                        <p class='form-paragraph'><% $field.label %></p>
                    <%elseif $field.label neq '' %>
                        <%if $field.type neq 'radio' && $field.type neq 'checkbox' %>
                	        <p class='label'><label for='yola_form_widget_<%$widgetId%>_<%$field.id%>'><% $field.label %></label></p>	
                        <%else%>
                	        <p class='label'><% $field.label %></p>	
                        <%/if%>
                    <%/if%>
    
                    <%if $field.type eq 'text' %>
                        <input id='yola_form_widget_<%$widgetId%>_<%$field.id%>' class='text' name='<%$field.id%><text>' type='text' value='<%$field.defaultValue|escape:'html'%>'<% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> />
                    <%elseif $field.type eq 'textarea' %>
                        <textarea id='yola_form_widget_<%$widgetId%>_<%$field.id%>' name='<%$field.id%><textarea>'<% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %>><%$field.defaultValue|escape:'html'%></textarea>
                    <%elseif $field.type eq 'radio' %>
                        <% foreach from=$field.options item=option key=option_index %>
                            <input class='radio' id='yola_form_widget_<%$widgetId%>_<%$field.id%>_<%$option_index%>' type='radio'<%if $option.checked eq 'true' %> checked='checked'<%/if%> name='<%$field.id%><radio>' value='<%$option.label|escape:'html'%>'<% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> />
                            <label for='yola_form_widget_<%$widgetId%>_<%$field.id%>_<%$option_index%>'><%$option.label%></label>
                            <br />
                        <%/foreach%>
                    <%elseif $field.type eq 'checkbox' %>
                        <% foreach from=$field.options item=option key=option_index %>
                            <input class='checkbox' id='yola_form_widget_<%$widgetId%>_<%$field.id%>_<%$option_index%>' type='checkbox'<%if $option.checked eq 'true' %> checked='checked'<%/if%> name='<%$field.id%><checkbox>' value='<%$option.label|escape:'html'%>'<% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> />
                            <label for='yola_form_widget_<%$widgetId%>_<%$field.id%>_<%$option_index%>'><%$option.label%></label>
                            <br />
                        <%/foreach%>
                    <%elseif $field.type eq 'list' %>
                        <select id='yola_form_widget_<%$widgetId%>_<%$field.id%>' name='<%$field.id%><list>'<% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %>>
                            <% foreach from=$field.options item=option %>
                                <option value='<%$option.label|escape:'html'%>'<%if $option.selected eq 'true' %> selected='selected'<%/if%>><%$option.label%></option><br />
                            <%/foreach%>
                        </select>
                    <%elseif $field.type eq 'captcha' %>
                    
                        <% if $_SYSTEM_MODE != 'DESIGN' %>
                            <div class='yola-form-captcha'>
                                <input type="hidden" name="recaptcha_exists" value="true" />
                                <script type="text/javascript">
                                    var RecaptchaOptions = {
                                        theme : 'custom',
                                        custom_theme_widget: 'responsive_recaptcha',
                                        lang : '<% $short_locale %>'
                                    };
                                </script>
                                <div id="responsive_recaptcha" class="responsive_recaptcha" style="display:none">
                                    <div id="recaptcha_image" class="recaptcha_image"></div>
                                    <div class="recaptcha_only_if_incorrect_sol" style="color:red"><%TRANSLATE%>Incorrect please try again<%/TRANSLATE%></div>

                                    <label class="solution" for="recaptcha_response_field">
                                        <span class="recaptcha_only_if_image"><%TRANSLATE%>Enter the words above:<%/TRANSLATE%></span>
                                        <span class="recaptcha_only_if_audio"><%TRANSLATE%>Enter the numbers you hear:<%/TRANSLATE%></span>

                                        <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
                                    </label>
                                    <div class="options">
                                        <a class="link" href="javascript:Recaptcha.reload()" id="icon-reload" ><%TRANSLATE%>Get another CAPTCHA<%/TRANSLATE%></a>
                                        <a class="recaptcha_only_if_image link" href="javascript:Recaptcha.switch_type('audio')" id="icon-audio"><%TRANSLATE%>Get an audio CAPTCHA<%/TRANSLATE%></a>
                                        <a class="recaptcha_only_if_audio link" href="javascript:Recaptcha.switch_type('image')" id="icon-image"><%TRANSLATE%>Get an image CAPTCHA<%/TRANSLATE%></a>
                                        <a class="link" href="javascript:Recaptcha.showhelp()" id="icon-help"><%TRANSLATE%>Help<%/TRANSLATE%></a>
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

                        <% else %>
                        
                            <div class='yola-form-captcha'>
                                <div class='yola-form-captcha-representation'></div>
                            </div>
                    
                        <% /if %>
                
                    <%/if%>
    
                    <input type='hidden' name='<%$field.id%><label>' value='<%$field.label|escape:'html'%>'<% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> />
            
                </div>
        
            <% /foreach %>

            <input type='hidden' name='redirect' value='<%$redirect%>' />
            <input type='hidden' name='locale' value='<%$locale%>' />
            <input type='hidden' name='redirect_fail' value='<%$redirectFail%>' />
            <input type='hidden' name='form_name' value='<% $data.heading|escape:'html' %>' />
            <input type='hidden' name='site_name' value='<%$siteName|escape:'html'%>' />
            <input type='hidden' name='wl_site' value='<%$isWhiteLabel%>' />
            <% if $destination %>
            <input type='hidden' name='destination' value='<%$destination|escape:'html'%>' />
            <% /if %>

            <% if $data.submit && $data.submit neq '' %>
                <p><input class='submit' type="submit" value="<% $data.submit %>"<% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> /></p>
            <% /if %>

        </form>
        
    <%/if%>

    <% if $posted == true %>
        
        <div class='yola-form-message'>
        
            <% if $failed neq true %>

                <p><%$successMessage%><p>
            
            <%else%>

                <p><%TRANSLATE%>Form Post Failed. Please try again.<%/TRANSLATE%><p>
            
            <%/if%>
        
        </div>
        
    <%/if%>

</div>
