$(document).ready(function() { 
	var local_dir = location.protocol + "//" + document.domain + "/mystats/";
	$("#logForm").validate({
		rules: {
		input_password: {
				required: true,
				minlength: 5
			},
			input_username: {
				required: true,
				email: true
			}
		},
		messages: {
			user_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			user_email: "Please enter a valid email address"
		},
	    onfocusout: function(element) {
	        $(element).valid();
	    },
	    highlight: function(element) {
	        var cssObj = {'border' : '1px solid red', 'background-color:':'red', 'color' : 'red'}
	    	$(element).css(cssObj);
	    },
	    unhighlight: function(element) {
	    	$(element).removeClass('error');
	        var cssObj = {'border' : '1px solid #0EA6BF', 'color' : '#222222'}
	    	$(element).css(cssObj);
	    },

	    submitHandler: function(form) {
			
		var params = "user_password="+$("#input_password").val()+"&username="+$("#input_username").val()+"&for=login";
			
		$.ajax({
		            type: "POST",
		            url: local_dir+"home/processLogin/",
		            data: params,
		            async: false,
		            success: function(sresponse) {
				 		if(sresponse == 0)
				 		{
				 			$(".response").html("Email Address or Password does not match");
				 			return false;
				 		}else{
				 			window.loaction.href = "index.php?/home/index/";
				 		}
				 	}
				 });
			
		}
		
	}); // End of Login Validation


	$("#profileForm").validate({
		rules: {
		input_username: {
				required: true,
				minlength: 5
			},
			input_email: {
				required: true,
				email: true
			},
			input_password: {
				required: true,
				minlength: 5
			}
		},
		messages: {
			user_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			user_email: "Please enter a valid email address"
		},
	    onfocusout: function(element) {
	        $(element).valid();
	    },
	    highlight: function(element) {
	        var cssObj = {'border' : '1px solid red', 'background-color:':'red', 'color' : 'red'}
	    	$(element).css(cssObj);
	    },
	    unhighlight: function(element) {
	    	$(element).removeClass('error');
	        var cssObj = {'border' : '1px solid #0EA6BF', 'color' : '#222222'}
	    	$(element).css(cssObj);
	    },

	    submitHandler: function(form) {
	    	return true;
	}
		
	}); // End of Edit Profile Validation



	$("#siteForm").validate({
		rules: {
		input_site_label: {
				required: true,
				minlength: 5
			},
		input_site_url: {
				required: true,
				minlength: 5
			}
		},
		messages: {
		},
	    onfocusout: function(element) {
	        $(element).valid();
	    },
	    highlight: function(element) {
	        var cssObj = {'border' : '1px solid red', 'background-color:':'red', 'color' : 'red'}
	    	$(element).css(cssObj);
	    },
	    unhighlight: function(element) {
	    	$(element).removeClass('error');
	        var cssObj = {'border' : '1px solid #0EA6BF', 'color' : '#222222'}
	    	$(element).css(cssObj);
	    },

	    submitHandler: function(form) {
			
		var params = "input_site_label="+$("#input_site_label").val()+"&input_site_url="+$("#input_site_url").val()+"&for=add_site";
			
		$.ajax({
		            type: "POST",
		            url: local_dir+"site/addnewsite/",
		            data: params,
		            async: false,
		            success: function(sresponse) {

				 if(sresponse == 'demo')
				{
				 	$(".response").html("Sorry! Limited Actions allowed in Demo Version.");
				 	return false;
				}else{
				 	$(".response").html("Site Added Successfully.");
				 	return false;
				}
			}
			});
			
		}
		
	}); // End of Add New Site


	$("#adduserForm").validate({
		rules: {
		user_type: {
				required: true
			},
		input_username: {
				required: true,
				email:true,
				minlength: 5
			},
		input_password: {
				required: true,
				minlength: 5
			}
		},
		messages: {
		},
	    onfocusout: function(element) {
	        $(element).valid();
	    },
	    highlight: function(element) {
	        var cssObj = {'border' : '1px solid red', 'background-color:':'red', 'color' : 'red'}
	    	$(element).css(cssObj);
	    },
	    unhighlight: function(element) {
	    	$(element).removeClass('error');
	        var cssObj = {'border' : '1px solid #0EA6BF', 'color' : '#222222'}
	    	$(element).css(cssObj);
	    },

	    submitHandler: function(form) {
	    	var sites = [];
		$(':checkbox:checked').each(function(i){
          			sites[i] = $(this).val();
        		});
		var params = "user_type="+$("#user_type").val()+"&input_username="+$("#input_username").val()+"&input_password="+$("#input_password").val()+"&sites="+sites+"&for=add_new_user";
		$.ajax({
		            type: "POST",
		            url: local_dir+"manageusers/add/",
		            data: params,
		            async: false,
		            success: function(sresponse) {
				 if(sresponse == 'demo')
				{
				 	$(".response").html("Sorry! Limited Actions allowed in Demo Version.");
				 	return false;
				}else if( sresponse == 'exist'){
				 	$(".response").html("User Already Exist..");
				 	return false;
				}else{
				 	$(".response").html("User Added Successfully.");
				 	return false;
				 }
			}
			});
			
		}
		
	}); // End of Add New User

	$("#euserForm").validate({
		rules: {
		user_type: {
				required: true
			},
		input_useremail: {
				required: true,
				email:true,
				minlength: 5
			},
		},
		messages: {
		},
	    onfocusout: function(element) {
	        $(element).valid();
	    },
	    highlight: function(element) {
	        var cssObj = {'border' : '1px solid red', 'background-color:':'red', 'color' : 'red'}
	    	$(element).css(cssObj);
	    },
	    unhighlight: function(element) {
	    	$(element).removeClass('error');
	        var cssObj = {'border' : '1px solid #0EA6BF', 'color' : '#222222'}
	    	$(element).css(cssObj);
	    },

	    submitHandler: function(form) {
	    	var sites = [];
		$(':checkbox:checked').each(function(i){
          			sites[i] = $(this).val();
        		});
		var user_id = $("#user_id").val();
		var params = "user_type="+$("#user_type").val()+"&input_username="+$("#input_useremail").val()+"&input_password="+$("#input_pwd").val()+"&sites="+sites+"&for=edit_user";
		$.ajax({
		            type: "POST",
		            url: local_dir+"manageusers/edit/"+user_id,
		            data: params,
		            async: false,
		            success: function(sresponse) {
		            	alert(sresponse);
		            	return false;
/*				 if(sresponse == 'demo')
				{
				 	$(".response").html("Sorry! Limited Actions allowed in Demo Version.");
				 	return false;
				}else{
				 	$(".response").html("Updated Successfully.");
				 	return false;
				 }
*/			}
			});
			
		}
		
	}); // End of Add New User

	$("#esitsiteForm").validate({
		rules: {
		input_site_label: {
				required: true,
				minlength: 5
			},
		input_site_url: {
				required: true,
				minlength: 5
			}
		},
		messages: {
		},
	    onfocusout: function(element) {
	        $(element).valid();
	    },
	    highlight: function(element) {
	        var cssObj = {'border' : '1px solid red', 'background-color:':'red', 'color' : 'red'}
	    	$(element).css(cssObj);
	    },
	    unhighlight: function(element) {
	    	$(element).removeClass('error');
	        var cssObj = {'border' : '1px solid #0EA6BF', 'color' : '#222222'}
	    	$(element).css(cssObj);
	    },

	    submitHandler: function(form) {
			
		var params = "site_name="+$("#input_site_label").val()+"&site_url="+$("#input_site_url").val()+"&id="+$("#id").val()+"&for=edit_site";
			
		$.ajax({
		            type: "POST",
		            url: local_dir+"site/edit/",
		            data: params,
		            async: false,
		            success: function(sresponse) {

				 if(sresponse == 'demo')
				{
				 	$(".response").html("Sorry! Limited Actions allowed in Demo Version.");
				 	return false;
				}else{
				 	$(".response").html("Updated Successfully.");
				 	return false;
				}
			}
			});
			
		}
		
	}); // End of Add New Site	

    $('#photoimg').live('change', function()	{ 
    	   var showResponse  = '';
			    $("#preview").html('');
			    
			    var options = { 
			    	    url: 'application/libraries/external/ajaximage.php', 
						target: '#preview',
						method:"POST",
			    	    success:    function(showResponse){
			    		}
			    }; 
			    
			    $("#logForm").ajaxForm( options).submit();
			    
	});
   
    
    $("#sites").live('change', function(){

    	var current_site = $(this).val();

    	$.cookie('current_site', current_site, {path:'/'});

    	window.location.reload();
    	
    });

    $("#client_info").live('change', function(){
    	var user_api_key = $(this).val();
    	
		var params = "api="+user_api_key;
		 $.ajax({
	            type: "POST",
	            url: "index.php?/clients/view",
	            data: params,
	            async: false,
	            success: function(sresponse) {
			 	alert(sresponse);
			 	}
		});
    	
    });

    
    $("#add_pause").click(function(){
    	
    	var title = $("#pause_title").val();
    	var start = $("#pause_start").val();
    	var end = $("#pause_end").val();
    	
    	if(title.length == 0 || start.length == 0 || end.langth == 0)
    	{
    		return false;
    	}
    	
    	
		var params = "title="+title+"&start="+start+"&end="+end;
		 $.ajax({
	            type: "POST",
	            url: "index.php?/resume/add_pause_action",
	            data: params,
	            async: false,
	            success: function(sresponse) {
			 
			 		if(sresponse > 0)
			 		{
			 			window.location.reload();
			 			
			 		}
			 	}
		});
    	
    });

    $(".delete_btn").on('click', function(){
    	var res = confirm("Are you sure?");
    	if(res == true){
	var params = "for=del&site_api_key="+$(this).attr('id');
	$.ajax({
	            type: "POST",
	            url: local_dir+"site/delete/",
	            data: params,
	            async: false,
	            success: function(sresponse) {
	            	if(sresponse == 'demo'){
	            		$(".notice").html('Sorry!, Limited  access in DEMO version');
	            	}else if( sresponse == 1){
	            		$(".notice").html('Deteled successfully!');
	            	}else{
	            		$(".notice").html('Failed!, try again...');
	            	}
	            }   
	            }); 		
    	}
    });


    $(".delete_user").on('click', function(){
    	var res = confirm("Are you sure?");
    	if(res == true){
	var params = "for=del&user_id="+$(this).attr('id');
	$.ajax({
	            type: "POST",
	            url: local_dir+"manageusers/delete/",
	            data: params,
	            async: false,
	            success: function(sresponse) {
	            	if(sresponse == 'demo'){
	            		$(".notice").html('Sorry!, Limited  access in DEMO version');
	            	}else if( sresponse == 1){
	            		$(".notice").html('Deteled successfully!');
	            	}else{
	            		$(".notice").html('Failed!, try again...');
	            	}
	            }   
	            }); 		
    	}
    });

        	$("#authForm").validate({
		rules: {
		input_hostname: {
			required: true,
			minlength: 5
		},
		input_dbname: {
			required: true,
			minlength: 5
		},
		input_dbusername: {
			required: true,
			minlength: 4
		},
		input_useremail: {
			required: true,
			email: true
		},
		input_userpassword: {
			required: true,
			minlength: 5
		},
		},
	    onfocusout: function(element) {
	        $(element).valid();
	    },
	    highlight: function(element) {
	        var cssObj = {'border' : '1px solid red', 'background-color:':'red', 'color' : 'red'}
	    	$(element).css(cssObj);
	    },
	    unhighlight: function(element) {
	    	$(element).removeClass('error');
	        var cssObj = {'border' : '1px solid #0EA6BF', 'color' : '#222222'}
	    	$(element).css(cssObj);
	    },

	    submitHandler: function(form) {
			
		var params = "hostname="+$("#input_hostname").val()+"&dbname="+$("#input_dbname").val()+"&dbusername="+$("#input_dbusername").val()+"&dbpassword="+$("#input_dbpassword").val()+"&useremail="+$("#input_useremail").val()+"&userpassword="+$("#input_userpassword").val()+"&for=install";
		$.ajax({
		            type: "POST",
		            url: local_dir+"auth/index/",
		            data: params,
		            async: false,
		            success: function(sresponse) {
		            				if(sresponse == 1){
		            					window.location.reload();
		            				}else{
		            					$(".response").html("Sorry! Error. Try again...");
		            				}
				 	}
				 });
			
		}
		
	}); // End of Installation Validation

}); 

function list_of_pause()
{
	
	 $.ajax({
         type: "POST",
         url: "index.php?/resume/index",
         async: false,
         success: function(sresponse) {
		 }
	});
	 
}