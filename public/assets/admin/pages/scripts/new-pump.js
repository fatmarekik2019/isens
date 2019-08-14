var NewPump = function() {

    var handleRegister = function() {

		if (jQuery().datepicker) {
            $("#dp_liv").datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true,
				todayBtn: 'linked',
				format: 'dd-mm-yyyy'
            });
	        $('#dp_liv').change(function() {
	            $('#new-pump-form').validate().element($(this));
	        });
		}
		
		$(".select2").select2({
			allowClear: true,
			escapeMarkup: function(m) {
				return m;
			}
		});

		var form = $('#new-pump-form');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);

        form.validate({
			doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {

				fourchette: {
					required: true
				},
                //provider_name: {
                //    required: true
                //},
				version: {
					required: true
				},
				num_serie: {
					required: true,
					number: true,
					remote: {
						url: "/Admin/refonte/assets/admin/pages/checkNumSerie.php?type=pump",
						type: "post",
						async: false
					}
				},
				type_pump: {
					required: true
				},
				dp_liv: {
					required: true
				}
            },
			
			messages: {
				num_serie: {
					remote: "Ce numéro de série est déjà utilisé."
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


		var displayConfirm = function() {
			$('#tab3 .form-control-static', form).each(function(){
				var input = $('[name="'+$(this).attr("data-display")+'"]', form);
				if (input.is(":radio")) {
					input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
				}
				if (input.is(":text") || input.is("textarea")) {
					$(this).html(input.val());
				} else if (input.is("select")) {
					$(this).html(input.find('option:selected').text());
				} else if (input.is(":radio") && input.is(":checked")) {
					$(this).html(input.attr("data-title"));
				} else if ($(this).attr("data-display") == 'preview') {
					$(this).html(input.val());
				}
			});
		}

		var handleTitle = function(tab, navigation, index) {
			var total = navigation.find('li').length;
			var current = index + 1;
			// set wizard title
			$('.step-title', $('#form_wizard_pump')).text('Etape ' + (index + 1) + ' sur ' + total);
			// set done steps
			jQuery('li', $('#form_wizard_pump')).removeClass("done");
			var li_list = navigation.find('li');
			for (var i = 0; i < index; i++) {
				jQuery(li_list[i]).addClass("done");
			}

			if (current == 1) {
				$('#form_wizard_pump').find('.button-previous').hide();
			} else {
				$('#form_wizard_pump').find('.button-previous').show();
			}

			if (current >= total) {
				$('#form_wizard_pump').find('.button-next').hide();
				$('#form_wizard_pump').find('.button-submit').show();
				displayConfirm();
			} else {
				$('#form_wizard_pump').find('.button-next').show();
				$('#form_wizard_pump').find('.button-submit').hide();
			}
			Metronic.scrollTo($('.page-title'));
		}

		$('#form_wizard_pump').bootstrapWizard({
			'nextSelector': '.button-next',
			'previousSelector': '.button-previous',
			onTabClick: function (tab, navigation, index, clickedIndex) {
				return false;
				/*
				success.hide();
				error.hide();
				if (form.valid() == false) {
					return false;
				}
				handleTitle(tab, navigation, clickedIndex);
				*/
			},
			onNext: function (tab, navigation, index) {
				success.hide();
				error.hide();

				if (form.valid() == false) {
					return false;
				}

				handleTitle(tab, navigation, index);
			},
			onPrevious: function (tab, navigation, index) {
				success.hide();
				error.hide();

				handleTitle(tab, navigation, index);
			},
			onTabShow: function (tab, navigation, index) {
				var total = navigation.find('li').length;
				var current = index + 1;
				var $percent = (current / total) * 100;
				$('#form_wizard_pump').find('.progress-bar').css({
					width: $percent + '%'
				});
			}
		});
		
		$('#new-pump-form').on("keyup keypress", function(e) {
		  var code = e.keyCode || e.which; 
		  if (code == 13) {               
			e.preventDefault();
			return false;
		  }
		});
		
		$('#form_wizard_pump').find('.button-previous').hide();
		$('#form_wizard_pump .button-submit').hide();
		$('#new-pump-form').on('submit', function() {
			this.submit();
		});

    }

    return {
        //main function to initiate the module
        init: function() {

            handleRegister();

        }

    };

}();