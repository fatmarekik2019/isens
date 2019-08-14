var Association = function() {

    var handleAssociation = function() {

        if (jQuery().select2) {
	        $("#select2_diffuser").select2({
	            allowClear: true,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });
	        $("#select2_user").select2({
	            allowClear: true,
	            //formatResult: format,
	            //formatSelection: format,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });

	        $('#select2_diffuser').change(function() {
	            $('.association-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
    	}

        $('.association-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {

                user: {
                    required: true
                },
				diffuser: {
					required: true,
					remote: {
						url: "/Admin/refonte/assets/admin/pages/checkDiffuserAssociate.php",
						type: "post",
//						complete: function (data) {
//							if (data.responseText == "found") {
//								$('#regUsernameGroup').addClass('has-warning').removeClass('has-success');
//								return true;
//							} else {
//								$('#regUsernameGroup').removeClass('has-warning').addClass('has-success');
//							}
//						}
					}
				},
            },
			
			messages: {
				diffuser: {
					remote: "Diffuseur déjà associé."
				}
			},

            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
				$(element).parent('.input-icon').children('i').removeClass('fa-check').addClass("fa-warning");
            },

            success: function(label, element) {
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
				$(element).parent('.input-icon').children('i').removeClass("fa-warning").addClass("fa-check");
            },

            errorPlacement: function(error, element) {
                if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.parent('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function(form) {
                //form.submit();
            }
        });

        $('.association-form').keypress(function(e) {
			e.preventDefault();
			return false;
        });
		
		$('.association-form').on('submit', function(e) {
			e.preventDefault();
			var currentForm = this;
			if ($('#select2_diffuser').val() && $('#select2_user').val()) {
				bootbox.confirm("Êtes-vous sûr de vouloir associer cet utilisateur à ce diffuseur ?", function(result) {
					if (result) {
							currentForm.submit();
						}
				});
			}
		});

		$("body").on("shown.bs.modal", ".modal", function () {
			$(this).find('div.modal-dialog').css({
				'margin-top': function () {
					var modal_height = $('.modal-dialog').first().height();
					var window_height = $(window).height();
					return ((window_height/2) - (modal_height/2));
				}
			});
		});
    }

    return {
        //main function to initiate the module
        init: function() {

            handleAssociation();

        }

    };

}();