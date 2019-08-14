var Renouvellement = function() {

    var handleRenouvellement = function() {		
				
        if (jQuery().select2) {
	        $("#select2_company").select2({
	            allowClear: true,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });
	        $("#parfum").select2({
	            allowClear: true,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });
	        $("#select2_bl").select2({
	            allowClear: true,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });

	        $('#select2_company').change(function() {
	            $('#renouvellement-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
	        $('#parfum').change(function() {
	            $('#renouvellement-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
	        $('#select2_bl').change(function() {
	            $('#renouvellement-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
			
    	}
		
		if (jQuery().datepicker) {
			var nowDate = new Date();
			var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
            $("#dp_anniv").datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true,
				todayBtn: 'linked',
				format: 'mm-yyyy',
				viewMode: "months",
				minViewMode: "months",
				maxViewMode: "months",
				startDate: today,
            });
			$("#dp_anniv").datepicker("setDate", nowDate);

	        $('#dp_anniv').change(function() {
	            $('#renouvellement-form').validate().element($(this));
	        });
        }

		$('#nb_rec').html(parseInt($('select[name="type_ann"]').val()) * parseInt($('input[name="nb_ann"]').val()));
		
		$('select[name="type_ann"], input[name="nb_ann"]').change(function() {
            $('#nb_rec').html(parseInt($('select[name="type_ann"]').val()) * parseInt($('input[name="nb_ann"]').val()));
        });
		
		var form = $('#renouvellement-form');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);

        form.validate({
			doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {

				type_ann: {
					required: true
				},
				nb_ann: {
					required: true,
					number: true
				},
				type_rec: {
					required: true
				},
				parfum: {
					required: true
				},
				group_name: {
					required: true
				},
				dp_anniv: {
					required: true
				},
				bl: {
					required: true
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
				} else if (element.attr("data-error-container")) { 
					error.appendTo(element.attr("data-error-container"));
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
					$(this).html(input.find('option:selected').map(function() {return this.text;}).get().join('<br>'));
					//$(this).html(input.find('option:selected').text());
				} else if (input.is(":radio") && input.is(":checked")) {
					$(this).html(input.attr("data-title"));
				} else {
					$(this).html(input.html());
				}
			});
		}

		var handleTitle = function(tab, navigation, index) {
			var total = navigation.find('li').length;
			var current = index + 1;
			// set wizard title
			$('.step-title', $('#form_wizard_renouvellement')).text('Etape ' + (index + 1) + ' sur ' + total);
			// set done steps
			jQuery('li', $('#form_wizard_renouvellement')).removeClass("done");
			var li_list = navigation.find('li');
			for (var i = 0; i < index; i++) {
				jQuery(li_list[i]).addClass("done");
			}

			if (current == 1) {
				$('#form_wizard_renouvellement').find('.button-previous').hide();
			} else {
				$('#form_wizard_renouvellement').find('.button-previous').show();
			}

			if (current >= total) {
				$('#form_wizard_renouvellement').find('.button-next').hide();
				$('#form_wizard_renouvellement').find('.button-submit').show();
				displayConfirm();
			} else {
				$('#form_wizard_renouvellement').find('.button-next').show();
				$('#form_wizard_renouvellement').find('.button-submit').hide();
			}
			Metronic.scrollTo($('.page-title'));
		}

		$('#form_wizard_renouvellement').bootstrapWizard({
			'nextSelector': '.button-next',
			'previousSelector': '.button-previous',
			onTabClick: function (tab, navigation, index, clickedIndex) {
				return false;
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
				$('#form_wizard_renouvellement').find('.progress-bar').css({
					width: $percent + '%'
				});
			}
		});
		
		$('#renouvellement-form').on("keyup keypress", function(e) {
		  var code = e.keyCode || e.which; 
		  if (code == 13) {               
			e.preventDefault();
			return false;
		  }
		});
		
		$('#form_wizard_renouvellement').find('.button-previous').hide();
		$('#form_wizard_renouvellement .button-submit').hide();
		$('#renouvellement-form').on('submit', function() {
			if (form.valid() == true) {
				this.submit();
			} else {
				return false;
			}
		});

    }

    return {
        //main function to initiate the module
        init: function() {

            handleRenouvellement();

        }

    };

}();