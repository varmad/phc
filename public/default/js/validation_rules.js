//**************** AddMethod Validation***********************//
  
    $.validator.addMethod("mobilNum", function(value, element) {
    return this.optional(element) || /^[789]\d{9}$/.test(value);
    }, "Please enter a valid number.");
    
    $.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "Please select service type");
   
    $.validator.addMethod('notPlaceholder', function(value, element) {
        if(!$(element).attr('placeholder')){
            return (value !== $(element).attr('data-placeholder') );
        }else{
            return (value !== $(element).attr('placeholder') );
        }        
    }, $.validator.messages.required);


$(document).ready(function(){  
    Placeholdem( document.querySelectorAll( '[placeholder]' ) );
    var fadeElems = document.body.querySelectorAll( '.fade' ),
    	fadeElemsLength = fadeElems.length,
    	i = 0,
    	interval = 50;
    	function incFade() {
    		if( i < fadeElemsLength ) {
    			fadeElems[ i ].className += ' fade-load';
    			i++;
    			setTimeout( incFade, interval );
    		}
    	};
    setTimeout( incFade, interval );


});

/*---------------------------------------------------------------------------*/
   
//***************** Forgot Password******************//     

	// validate login form on keyup and submit
	$("#forgot_password_form").validate({
		rules: {			
			email: {
				required: true,
				email: true
			}                        
		},
        onfocusout: function(element) {
	    	this.element(element);
        },
		messages: {
		  email: {
				required: "Required field.",
                email: "Invalid email."
			}

           
		}
	});
   
//***************** Forgot Password******************//     

	// validate login form on keyup and submit
	$("#contact_form").validate({
		rules: {			
			contact_name: {
			     notPlaceholder:true,
				required: true,
			    minlength: 5
                
			},
			contact_email: {
			     notPlaceholder:true,
				required: true,
				email: true
			},
			contact_mobile: {
			  notPlaceholder:true,
				required: true,
                mobilNum: true,
                minlength: 10

			},
			contact_city: {
			 notPlaceholder: true,
				required: true,                
                minlength: 5
                
			},
            contact_reason:{
                 notPlaceholder:true,
                required: true,
                minlength: 25
            }
                        
		},
        onfocusout: function(element) {
	    	this.element(element);
        },
		messages: {
		  contact_name: {
				required: "Required field.",
			    minlength: "5 character minimum.",
                notPlaceholder:"Required field."
			},
		      contact_email: {
				required: "Required field.",
                email: "Invalid email.",
                notPlaceholder:"Required field."
			},

			contact_mobile: {
				required: "Required field.",
                mobilNum: "Invalid Mobile",
                minlength: "10 character minimum.",
                notPlaceholder:"Required field."

			},
            contact_city: {
				required: "Required field.",
                notPlaceholder:"Required field.",
                minlength: "5 character minimum."                
			},

            contact_reason:{
                required: "Required field.",
                minlength: "25 character minimum.",
                notPlaceholder:"Required field."
            }


           
		}
	});   