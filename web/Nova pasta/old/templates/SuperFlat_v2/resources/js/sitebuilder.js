
// register all of the property handlers for this style
(function(){

    yolaPropertyHandler.addPropertyHandler("site.logo.src", function(args){
        var heading = $("#sys_heading"),
            logoImage = $("#sys_heading img"),
            headingClass = "yola_hide_logo";

        if(typeof args.value == "string" && args.value !== ""){
            headingClass = "yola_show_logo";
        }

        heading.attr("class", headingClass);

        if(logoImage.attr("src") !== args.value) {
            logoImage.attr("src", args.value);
        }
    });

    yolaPropertyHandler.addPropertyHandler("site.tagline.text", function(args){
        var tagline = $(".yola_site_tagline"),
            taglineDisplay = "none";

        if(typeof args.value != "undefined" && args.value !== ""){
            taglineDisplay = "block";
        }

        tagline.css("display", taglineDisplay);
        tagline.html(args.value);
    });

    yolaPropertyHandler.addPropertyHandler("header.alignment", function(args){
        if(args.value == "bottom") {
            $(".yola_banner_wrap nav").before($(".yola_outer_heading_wrap"));
        } else {
            $(".yola_outer_heading_wrap").before($(".yola_banner_wrap nav"));
        }
    });

}());


if($(".yola_site_tagline").length !== 0) {
    $(".yola_site_tagline").on("click.propertyChange", function(e){

        var controller = Yola.UI.page.getWindow().page;
        if(controller.editMode === false) {
            return false;
        }
        Yola.UI.page.editHeading();

        e.preventDefault();
        e.stopPropagation();
    });
}

new Yola.UI.page.decorators.edit(
    document.getElementById("yola_style_footer"),
    {
        topOffset: -25,
        focusable: false,
        minHeight: 20,
        minWidth:800,
        menu : [{
                 text : _('Edit Footer Style'),
                 click : function(e){
                    Yola.UI.leftGutter.open({src: '/ide/Yola/UI/styleDesigner/styleDesigner.html'});

                    e.preventDefault();
                    e.stopPropagation();
                 }
             },
             {
                 text : _('Edit Business Location'),
                 click : function(e){
                    Yola.dialog({
                        id : 'site_settings',
                        request : {
                            settings : 'location',
                            hideBackButton : true
                        },
                        success : Yola.UI.head.site.update,
                        failure : Yola.UI.head.site.update
                    });

                    e.preventDefault();
                    e.stopPropagation();
                 }
             },{
                 text : _('Edit Phone'),
                 click : function(e){
                    Yola.dialog({
                        id : 'site_settings',
                        request : {
                            settings : 'phone',
                            hideBackButton : true
                        },
                        success : Yola.UI.head.site.update,
                        failure : Yola.UI.head.site.update
                    });

                    e.preventDefault();
                    e.stopPropagation();
                 }
             }]
    }
);
