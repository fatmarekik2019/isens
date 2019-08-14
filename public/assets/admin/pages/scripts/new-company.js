var NewCompany = function () {


    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            $("#reseau_list").select2({
                placeholder: "Select",
                allowClear: true,
                escapeMarkup: function (m) {
                    return m;
                }
            });

			$(".switch-on").on('switchChange.bootstrapSwitch', function(e, state) {
				if (state) {
					$('.div-select-reseau').addClass('hidden');
					$('.div-input-reseau').removeClass('hidden');
				} else {
					$('.div-select-reseau').removeClass('hidden');
					$('.div-input-reseau').addClass('hidden');
				}
			});

            var form = $('#new-company-form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    company_name: {
                        required: true
                    },
                    reseau_name: {
                        required: true
                    },
					reseau_id: {
						required: true
					}
                },

                messages: { // custom messages for radio buttons and checkboxes
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });

            var displayConfirm = function() {
                $('#tab4 .form-control-static', form).each(function(){
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
                    } else if ($(this).attr("data-display") == 'create') {
						if ($(".switch-on").bootstrapSwitch("state")) {
							$(this).html("Oui");
						} else {
							$(this).html("Non");
						}
                    }
                });
            }

            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#form_wizard_company')).text('Etape ' + (index + 1) + ' sur ' + total);
                // set done steps
                jQuery('li', $('#form_wizard_company')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_company').find('.button-previous').hide();
                } else {
                    $('#form_wizard_company').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#form_wizard_company').find('.button-next').hide();
                    $('#form_wizard_company').find('.button-submit').show();
                    displayConfirm();
                } else {
                    $('#form_wizard_company').find('.button-next').show();
                    $('#form_wizard_company').find('.button-submit').hide();
                }
                Metronic.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_company').bootstrapWizard({
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
                    $('#form_wizard_company').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });
			
			$('#new-company-form').keypress(function(e) {
				if (e.which == 13) {
					e.preventDefault();
				}
			});


            $('#form_wizard_company').find('.button-previous').hide();
            $('#form_wizard_company .button-submit').hide();
			$('#new-company-form').on('submit', function() {
				this.submit();
			});
			
            //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('#reseau_list', form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
        }

    };

}();