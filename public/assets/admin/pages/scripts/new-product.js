var NewProduct = function() {

    var handleRegister = function() {

        if (jQuery().select2) {
	        $(".select2").select2({
	            allowClear: true,
	            minimumResultsForSearch: Infinity,
				escapeMarkup: function(m) {
	                return m;
	            }
	        });

	        $('.select2').change(function() {
	            $('.new-product-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
    	}

		$.validator.setDefaults({
			debug: true,
			success: "valid"
		});

        $('.new-product-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {

                ref: {
                    required: true
                },
                label: {
                    required: true
                },
                description: {
                    required: true
                },
				type: {
					required: '[name="newtype"]:blank'
				},
				newtype: {
					required: '[name="type"]:blank'
				},
				color: {
					required: '[name="newcolor"]:blank'
				},
				newcolor: {
					required: '[name="color"]:blank'
				},
				plug: {
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

        $('.new-product-form').keypress(function(e) {
            if (e.which == 13) {
                if ($('.new-product-form').validate().form()) {
                    $('.new-product-form').submit();
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