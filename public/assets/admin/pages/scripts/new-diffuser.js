var NewDiffuser = function() {

    var handleRegister = function() {

        function format(state) {
            if (!state.id) { return state.text; } // optgroup
			var $state = $("<span><img class='flag' src='../../assets/global/img/flags/" + state.element[0].attributes.flag.value.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text + "</span>");
			return $state;
        }
		
        if (jQuery().select2) {
	        $("#select2_country").select2({
	            allowClear: true,
	            formatResult: format,
	            formatSelection: format,
	            escapeMarkup: function(m) {
	                return m;
	            }
				//maximumInputLength: 1,
				//createSearchChoice: function (term) {
				//	if ($(data).filter(function() {
                //        return this.text.localeCompare(term)===0;
                //    }).lenght===0) {
				//		return {id:term, text: term + ' (Créer la société / Create the company)'};
				//	};
				//}
	        });
	        $(".select2.withsearch").select2({
	            allowClear: true,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });
	        $(".select2.withoutsearch").select2({
	            allowClear: true,
				minimumResultsForSearch: Infinity,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });

	        $('.select2').change(function() {
	            $('#new-diffuser-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
			
    	}
		
		$(".switch-on").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-company-no').addClass('hidden');
				$('.div-company-yes').removeClass('hidden');
			} else {
				$('.div-company-no').removeClass('hidden');
				$('.div-company-yes').addClass('hidden');
			}
		});
		
		$('#num_serie').blur(function() {
			$('input.num_serie').val($('#num_serie').val());
        });
		
		$('[name="type"]').on("select2-selecting", function(e) {
			$.getJSON('/Admin/refonte/assets/admin/pages/getModele.php?type=' + e.val + '&color=' + $('[name="color"]').select2("val") + '&country=' + $('#select2_country').select2("val"))
			.done(function(data) {
				$('[name="product"]').val(data.text);
				$('[name="product_id"]').val(data.id);
				$('#new-diffuser-form').validate().element($('[name="product"]'));
			});
        });
		$('[name="color"]').on("select2-selecting", function(e) {
			$.getJSON('/Admin/refonte/assets/admin/pages/getModele.php?type=' + $('[name="type"]').select2("val") + '&color=' + e.val + '&country=' + $('#select2_country').select2("val"))
			.done(function(data) {
				$('[name="product"]').val(data.text);
				$('[name="product_id"]').val(data.id);
				$('#new-diffuser-form').validate().element($('[name="product"]'));
			});
        });
		$('#select2_country').on("select2-selecting", function(e) {
			$.getJSON('/Admin/refonte/assets/admin/pages/getModele.php?type=' + $('[name="type"]').select2("val") + '&color=' + $('[name="color"]').select2("val") + '&country=' + e.val)
			.done(function(data) {
				$('[name="product"]').val(data.text);
				$('[name="product_id"]').val(data.id);
				$('#new-diffuser-form').validate().element($('[name="product"]'));
			});
        });
		
		$('[name="product"]').keydown(function(e) {
            e.preventDefault();
        });
		
		$('#select2_company').on("select2-selecting", function(e) {
			$.getJSON('/Admin/refonte/assets/admin/pages/getReseau.php?id=' + e.val)
			.done(function(data) {
				$('[name="reseau"]').val(data.text);
				$('[name="reseau_id"]').val(data.id);
			});
        });

		var form = $('#new-diffuser-form');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);

        form.validate({
			doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {

                diffname: {
                    required: true
                },
				num_serie: {
					required: true,
					remote: {
						url: "/Admin/refonte/assets/admin/pages/checkNumSerie.php?type=diffuser",
						type: "post",
						async: false
					}
				},
				company: {
					required: true
				},
				fk_soc: {
					required: true
				},
				country: {
					required: true
				},
				type: {
					required: true
				},
				reseau: {
					required: true
				},
				color: {
					required: true
				},
				pump: {
					required: true
				},
				product: {
					required: true
				},
				version: {
					required: true
				}
            },
			
			messages: {
				num_serie: {
					remote: "Ce numéro de série est déjà utilisé."
				},
				product: {
					required: "Aucun produit existant pour ces attributs (type, couleur, plug)."
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
				} else if ($(this).attr("data-display") == 'company_exist') {
					if ($(".switch-on").bootstrapSwitch("state")) {
						$(this).html("Non");
					} else {
						$(this).html("Oui");
					}
				}
			});
		}

		var handleTitle = function(tab, navigation, index) {
			var total = navigation.find('li').length;
			var current = index + 1;
			// set wizard title
			$('.step-title', $('#form_wizard_diffuser')).text('Etape ' + (index + 1) + ' sur ' + total);
			// set done steps
			jQuery('li', $('#form_wizard_diffuser')).removeClass("done");
			var li_list = navigation.find('li');
			for (var i = 0; i < index; i++) {
				jQuery(li_list[i]).addClass("done");
			}

			if (current == 1) {
				$('#form_wizard_diffuser').find('.button-previous').hide();
			} else {
				$('#form_wizard_diffuser').find('.button-previous').show();
			}

			if (current >= total) {
				$('#form_wizard_diffuser').find('.button-next').hide();
				$('#form_wizard_diffuser').find('.button-submit').show();
				displayConfirm();
			} else {
				$('#form_wizard_diffuser').find('.button-next').show();
				$('#form_wizard_diffuser').find('.button-submit').hide();
			}
			Metronic.scrollTo($('.page-title'));
		}

		$('#form_wizard_diffuser').bootstrapWizard({
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
				$('#form_wizard_diffuser').find('.progress-bar').css({
					width: $percent + '%'
				});
			}
		});
		
		$('#new-diffuser-form').on("keyup keypress", function(e) {
		  var code = e.keyCode || e.which; 
		  if (code == 13) {               
			e.preventDefault();
			return false;
		  }
		});
		
		$('#form_wizard_diffuser').find('.button-previous').hide();
		$('#form_wizard_diffuser .button-submit').hide();
		$('#new-diffuser-form').on('submit', function() {
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