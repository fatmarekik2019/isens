var NewUser = function() {

    var handleRegister = function() {

        if (jQuery().select2) {
	        $("#company").select2({
	            allowClear: true,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });
	        $("#reseau").select2({
	            allowClear: true,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });


	        $('#company').change(function() {
	            $('.new-user-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
	        $('#reseau').change(function() {
	            $('.new-user-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
    	}

        $('.new-user-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {

                fullname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                },
				role: {
					required: true
				},
				company: {
					required: true
				},
				reseau: {
					required: true
				}
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        $('.new-user-form').keypress(function(e) {
            if (e.which == 13) {
                if ($('.new-user-form').validate().form()) {
                    $('.new-user-form').submit();
                }
                return false;
            }
        });

    }

    return {
        //main function to initiate the module
        init: function() {

            handleRegister();

        }

    };

}();