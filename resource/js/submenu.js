 $(function() {
	$(".bt_events").click(function() {
                    if ($(".bt_events").hasClass("clicked")) {
                        $(".bt_events").removeClass("clicked");
                        $(".events_submenu").hide();
                    } else {
                    	$(".bt_service").removeClass("clicked");
                        $(".service_submenu").hide();
                        $(".bt_events").addClass("clicked");
                        $(".events_submenu").show();
                    }
                });
                $(".bt_service").click(function() {
                    if ($(".bt_service").hasClass("clicked")) {
                        $(".bt_service").removeClass("clicked");
                        $(".service_submenu").hide();
                    } else {
                    	$(".bt_events").removeClass("clicked");
                        $(".events_submenu").hide();
                        $(".bt_service").addClass("clicked");
                        $(".service_submenu").show();
                    }
                });
                
                $(".table_gmap_icon").click(function(){
                	if($(this).hasClass("clicked")){
                		$(this).removeClass("clicked");
                		$(location).attr('href',this.getAttribute("url_clicked"));
                	}
                	else{
                		$(this).addClass("clicked");
                		$(location).attr('href',this.getAttribute("url"));
                	}
                });
});
