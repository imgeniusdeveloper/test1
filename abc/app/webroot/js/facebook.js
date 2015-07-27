FB.init({ 
	appId:'763760057004962', 
	cookie:true, 
	status:true,
	xfbml:true , 
	oauth :true,
	frictionlessRequests : true
 });

function ShareFacebook(title){

    data = title.split('@@');
	FB.getLoginStatus(function(response) 
	{
		if (response.status == 'connected')
		{ 
			FB.ui({
				method: 'feed',
				name: data[0] ,
                description: data[1],
                link: ajax_url+'Homes/index/',
                picture: data[2]
            });
		}
		else
		{ 
			FB.login(function(response) {
				if (response.authResponse) {
					FB.api('/me', function(response) {
						ShareFacebook(title);
					})
				}
			})
		}
	})
}


function Login(isPopup) {
	
	FB.login(function(response) {
	
		if (response.authResponse) {
			FB.api('/me', function(response) {
			
			if (response['hometown']==undefined)
				{
					var location = '';
				}
				else
				{
					var location = response['hometown']['name'];
				}
				var str;
				
				str =	response['id'] + ";\n" +
						response['name'] + ";\n" +
						response['first_name'] + ";\n" +
						response['last_name'] + ";\n" +
						
						response['gender'] + ";\n" +
						response['username'] + ";\n" +
						
						
						response['email'];
						$('input[id=first_name_fb]').val(response['first_name']);
						$('input[id=last_name_fb]').val(response['last_name']);
						$('input[id=email_fb]').val(response['email']);
						$('input[id=facebook_id_fb]').val(response['id']);
						 $('input[id=facebook_username_fb]').val(response['username']);
					
						$('#fb_registration_form').submit();
			});
		} 
		else 
		{
			console.log('User cancelled login or did not fully authorize.');
		}
	}, {scope: 'email,user_birthday,read_friendlists,user_location,publish_actions,publish_stream'});
};