var host = window.location.host;

var proto = window.location.protocol;

var ajax_url = proto+"//"+host+"/abc/";
	alert(ajax_url);
function ajax_form_id(form ,site_url,link_id){
alert(site_url);
	var host = window.location.host;
	var proto = window.location.protocol;
	var ajax_url = proto+"//"+host+"/abc/";
	var req = jQuery.post 
	( 
		ajax_url+site_url, 
		jQuery('#' + form).serialize(),
		function(html){
	         alert(html); 
			var explode = html.split("\n");
				
			var shown = false;
			var msg = '<b>You have errors in your form. Please check the following fields and try again:</b><br /><br /><ol>';
			for ( var i in explode )
			{
				var explode_again = explode[i].split("|");
					/* alert(explode_again); */
				if ($.trim(explode_again[0])=='error')
				{
				
					if ( ! shown ) {
						jQuery('#'+link_id).show();
					}
					shown = true;
					img=ajax_url+"/img/cross_icon.png";
					add_remove_class('ok','error',explode_again[1]);
					jQuery('#err_' + explode_again[1]).show();
					//jQuery('#err_' + explode_again[1]).html("<img src="+img+">");
					/*jQuery('#err_' + explode_again[1]).html("<img src="+img+">&nbsp;"+explode_again[2]);*/
					jQuery('#err_' + explode_again[1]).html(explode_again[2]);

					msg += "<li>" + explode_again[1] + "</li>";
					//jQuery('#err_' + explode_again[1]).html(explode_again[2]);
				}
				else if ($.trim(explode_again[0])=='ok') {
				
					img2=ajax_url+"/img/green-check_con.png";
					add_remove_class('error','ok',explode_again[1]);
					//jQuery('#err_' + explode_again[1]).html("<img src="+img2+">");
					jQuery('#err_' + explode_again[1]).html();
					jQuery('#err_' + explode_again[1]).hide();
				
				}
			}
			
			if (!shown)
			{
				jQuery('#' + link_id).html("Form submitted successfully");
				add_remove_class('error','success',link_id);
				jQuery('#' + link_id).show();
				$('#'+form).submit();
			}
			else
			{
				add_remove_class('success','error',link_id);
				jQuery('#' + link_id).html(msg + "</ol>");
				
				//alert(msg);				
				error = $.trim($(msg).find('li').html());
				//alert($('#err_'+error).offset().top);				
				sval = ($('#err_'+error).offset().top)-100;
				
				 $('body,html').animate({
						scrollTop: sval
				}, 2000); 
			}
			
			req = null;
		}
	);
	return false; 
}

function add_remove_class(search,replace,element_id)
{
	if (jQuery('#' + element_id).hasClass(search)){
		jQuery('#' + element_id).removeClass(search);
	}
	jQuery('#' + element_id).addClass(replace);
}