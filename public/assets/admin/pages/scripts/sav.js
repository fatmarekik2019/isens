var Sav = function() {

    var handleSav = function() {		
				
        if (jQuery().select2) {
	        $(".withsearch").select2({
	            allowClear: true,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });
	        $(".withoutsearch").select2({
	            allowClear: true,
				minimumResultsForSearch: Infinity,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });

	        $('.withsearch').change(function() {
	            $('#diff-sav-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
	        $('.withoutsearch').change(function() {
	            $('#analyse-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
			
    	}
		
		$('.bs-select').selectpicker({
            iconBase: 'fa',
            tickIcon: 'fa-check'
        });
		
		$('.bs-select').on('change', function(e) {
			$('#sav-form').validate().element($(this));
		});
		
		$('input[type=radio][name="ope"]').change(function() {
			if (this.value == 'sav') {
				$('.div-sav').removeClass('hidden');
				$('.div-analyse').addClass('hidden');
			}
			else if (this.value == 'analyse') {
				$('.div-sav').addClass('hidden');
				$('.div-analyse').removeClass('hidden');
			}
		});

		$("#elec").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-elec').removeClass('hidden');
				if ($("#elecOK").bootstrapSwitch('state')) {
					$('.div-elec-OK').removeClass('hidden');
					$('.div-elec-KO').addClass('hidden');
				} else {
					$('.div-elec-OK').addClass('hidden');
					$('.div-elec-KO').removeClass('hidden');
				}
			} else {
				$('.div-elec').addClass('hidden');
			}
		});
		$("#elecOK").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-elec-OK').removeClass('hidden');
				$('.div-elec-KO').addClass('hidden');
			} else {
				$('.div-elec-OK').addClass('hidden');
				$('.div-elec-KO').removeClass('hidden');
			}
		});
		$("#alim").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-alim').removeClass('hidden');
				if ($("#alimOK").bootstrapSwitch('state')) {
					$('.div-alim-OK').removeClass('hidden');
					$('.div-alim-KO').addClass('hidden');
				} else {
					$('.div-alim-OK').addClass('hidden');
					$('.div-alim-KO').removeClass('hidden');
				}
			} else {
				$('.div-alim').addClass('hidden');
			}
		});
		$("#alimOK").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-alim-OK').removeClass('hidden');
				$('.div-alim-KO').addClass('hidden');
			} else {
				$('.div-alim-OK').addClass('hidden');
				$('.div-alim-KO').removeClass('hidden');
			}
		});
		$("#tete").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-tete').removeClass('hidden');
				if ($("#teteOK").bootstrapSwitch('state')) {
					$('.div-tete-OK').removeClass('hidden');
					$('.div-tete-KO').addClass('hidden');
				} else {
					$('.div-tete-OK').addClass('hidden');
					$('.div-tete-KO').removeClass('hidden');
				}
			} else {
				$('.div-tete').addClass('hidden');
			}
		});
		$("#teteOK").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-tete-OK').removeClass('hidden');
				$('.div-tete-KO').addClass('hidden');
			} else {
				$('.div-tete-OK').addClass('hidden');
				$('.div-tete-KO').removeClass('hidden');
			}
		});
		$("#pomp").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-pomp').removeClass('hidden');
				if ($("#pompOK").bootstrapSwitch('state')) {
					$('.div-pomp-OK').removeClass('hidden');
					$('.div-pomp-KO').addClass('hidden');
				} else {
					$('.div-pomp-OK').addClass('hidden');
					$('.div-pomp-KO').removeClass('hidden');
				}
			} else {
				$('.div-pomp').addClass('hidden');
			}
		});
		$("#pompOK").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-pomp-OK').removeClass('hidden');
				$('.div-pomp-KO').addClass('hidden');
			} else {
				$('.div-pomp-OK').addClass('hidden');
				$('.div-pomp-KO').removeClass('hidden');
			}
		});
		$("#sd").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-sd').removeClass('hidden');
				if ($("#sdOK").bootstrapSwitch('state')) {
					$('.div-sd-OK').removeClass('hidden');
					$('.div-sd-KO').addClass('hidden');
				} else {
					$('.div-sd-OK').addClass('hidden');
					$('.div-sd-KO').removeClass('hidden');
				}
			} else {
				$('.div-sd').addClass('hidden');
			}
		});
		$("#sdOK").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-sd-OK').removeClass('hidden');
				$('.div-sd-KO').addClass('hidden');
			} else {
				$('.div-sd-OK').addClass('hidden');
				$('.div-sd-KO').removeClass('hidden');
			}
		});
		$("#boitier").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-boitier').removeClass('hidden');
				if ($("#boitierOK").bootstrapSwitch('state')) {
					$('.div-boitier-OK').removeClass('hidden');
					$('.div-boitier-KO').addClass('hidden');
				} else {
					$('.div-boitier-OK').addClass('hidden');
					$('.div-boitier-KO').removeClass('hidden');
				}
			} else {
				$('.div-boitier').addClass('hidden');
			}
		});
		$("#boitierOK").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-boitier-OK').removeClass('hidden');
				$('.div-boitier-KO').addClass('hidden');
			} else {
				$('.div-boitier-OK').addClass('hidden');
				$('.div-boitier-KO').removeClass('hidden');
			}
		});


		$("#elec_fonc").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-elec-notfonc').addClass('hidden');
				$('.div-elec-replace').addClass('hidden');
			} else {
				$('.div-elec-notfonc').removeClass('hidden');
				if ($('[name=elec_action]').val() == "REMPLACEE") {
					$('.div-elec-replace').removeClass('hidden');
				}
			}
		});
		$('[name=elec_action]').change(function() {
            if ($(this).val() == "NEANT") {
				$('.div-final-etat-hs').removeClass('hidden');
			} else if ($(this).val() == "REMPLACEE") {
				$('.div-final-etat-hs').addClass('hidden');
				$('.div-elec-replace').removeClass('hidden');
			} else {
				$('.div-final-etat-hs').addClass('hidden');
			}
        });
		$("#alim_fonc").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-alim-notfonc').addClass('hidden');
				$('.div-alim-replace').addClass('hidden');
			} else {
				$('.div-alim-notfonc').removeClass('hidden');
				if ($('[name=alim_action]').val() == "REMPLACEE") {
					$('.div-alim-replace').removeClass('hidden');
				}
			}
		});
		$('[name=alim_action]').change(function() {
            if ($(this).val() == "NEANT") {
				$('.div-final-etat-hs').removeClass('hidden');
			} else if ($(this).val() == "REMPLACEE") {
				$('.div-final-etat-hs').addClass('hidden');
				$('.div-alim-replace').removeClass('hidden');
			} else {
				$('.div-final-etat-hs').addClass('hidden');
			}
        });
		$("#tete_fonc").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-tete-notfonc').addClass('hidden');
				$('.div-tete-replace').addClass('hidden');
			} else {
				$('.div-tete-notfonc').removeClass('hidden');
				if ($('[name=tete_action]').val() == "REMPLACEE") {
					$('.div-tete-replace').removeClass('hidden');
				}
			}
		});
		$('[name=tete_action]').change(function() {
            if ($(this).val() == "NEANT") {
				$('.div-final-etat-hs').removeClass('hidden');
			} else if ($(this).val() == "REMPLACEE") {
				$('.div-final-etat-hs').addClass('hidden');
				$('.div-tete-replace').removeClass('hidden');
			} else {
				$('.div-final-etat-hs').addClass('hidden');
			}
        });
		$("#pomp_fonc").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-pomp-notfonc').addClass('hidden');
				$('.div-pomp-replace').addClass('hidden');
			} else {
				$('.div-pomp-notfonc').removeClass('hidden');
				if ($('[name=pomp_action]').val() == "REMPLACEE") {
					$('.div-pomp-replace').removeClass('hidden');
				}
			}
		});
		$('[name=pomp_action]').change(function() {
            if ($(this).val() == "NEANT") {
				$('.div-final-etat-hs').removeClass('hidden');
			} else if ($(this).val() == "REMPLACEE") {
				$('.div-final-etat-hs').addClass('hidden');
				$('.div-pomp-replace').removeClass('hidden');
			} else {
				$('.div-final-etat-hs').addClass('hidden');
				$('.div-pomp-replace').addClass('hidden');
			}
        });
		$("#boitier_fonc").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-boitier-notfonc').addClass('hidden');
				$('.div-boitier-replace').addClass('hidden');
			} else {
				$('.div-boitier-notfonc').removeClass('hidden');
				if ($('[name=boitier_action]').val() == "REMPLACE") {
					$('.div-boitier-replace').removeClass('hidden');
				}
			}
		});
		$('[name=boitier_action]').change(function() {
            if ($(this).val() == "NEANT") {
				$('.div-final-etat-hs').removeClass('hidden');
			} else if ($(this).val() == "REMPLACE") {
				$('.div-final-etat-hs').addClass('hidden');
				$('.div-boitier-replace').removeClass('hidden');
			} else {
				$('.div-final-etat-hs').addClass('hidden');
			}
        });
		
		var diffform = $('#diff-sav-form');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);

        diffform.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {

				diffuserSav: {
					required: true
				},
				diffuserAnalyse: {
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
                form.submit();
            }
        });

		
		var form = $('#sav-form');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);

        form.validate({
			doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
			ignore: [],
            rules: {

				'defaut[]': {
					required: true
				},
                elec: {
                    require_from_group: [1, ".reception"]
                },
                alim: {
                    require_from_group: [1, ".reception"]
                },
                tete: {
                    require_from_group: [1, ".reception"]
                },
                pomp: {
                    require_from_group: [1, ".reception"]
                },
                sd: {
                    require_from_group: [1, ".reception"]
                },
                boitier: {
                    require_from_group: [1, ".reception"]
                },
				explication: {
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
			$('#tab2 .form-control-static', form).each(function(){
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
				} else if ($(this).attr("data-display") == 'boitieronly') {
					if ($("#boitieronly").bootstrapSwitch("state")) {
						$(this).html("Oui");
					} else {
						$(this).html("Non");
					}
				} else {
					$(this).html(input.html());
				}
			});
		}

		var handleTitle = function(tab, navigation, index) {
			var total = navigation.find('li').length;
			var current = index + 1;
			// set wizard title
			$('.step-title', $('#form_wizard_sav')).text('Etape ' + (index + 1) + ' sur ' + total);
			// set done steps
			jQuery('li', $('#form_wizard_sav')).removeClass("done");
			var li_list = navigation.find('li');
			for (var i = 0; i < index; i++) {
				jQuery(li_list[i]).addClass("done");
			}

			if (current == 1) {
				$('#form_wizard_sav').find('.button-previous').hide();
			} else {
				$('#form_wizard_sav').find('.button-previous').show();
			}

			if (current >= total) {
				$('#form_wizard_sav').find('.button-next').hide();
				$('#form_wizard_sav').find('.button-submit').show();
				displayConfirm();
			} else {
				$('#form_wizard_sav').find('.button-next').show();
				$('#form_wizard_sav').find('.button-submit').hide();
			}
			Metronic.scrollTo($('.page-title'));
		}

		$('#form_wizard_sav').bootstrapWizard({
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
				$('#form_wizard_sav').find('.progress-bar').css({
					width: $percent + '%'
				});
			}
		});
		
		$('#diff-sav-form').on("keyup keypress", function(e) {
		  var code = e.keyCode || e.which; 
		  if (code == 13) {               
			e.preventDefault();
			return false;
		  }
		});
		
		$('#form_wizard_sav').find('.button-previous').hide();
		$('#form_wizard_sav .button-submit').hide();
		$('#sav-form').on('submit', function() {
			if (form.valid() == true) {
				this.submit();
			} else {
				return false;
			}
		});
		
		
		var analyseform = $('#analyse-form');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);

        analyseform.validate({
			doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {

				fk_soc: {
					required: true
				},
				num_version: {
					required: true
				},
				pump_exist: {
					required: true
				},
				elec_comment: {
					required: true
				},
				elec_action: {
					required: true
				},
				elec_entrepot: {
					required: true
				},
				elec_product: {
					required: true
				},
				alim_comment: {
					required: true
				},
				alim_action: {
					required: true
				},
				alim_entrepot: {
					required: true
				},
				alim_product: {
					required: true
				},
				tete_comment: {
					required: true
				},
				tete_action: {
					required: true
				},
				tete_entrepot: {
					required: true
				},
				tete_product: {
					required: true
				},
				pomp_comment: {
					required: true
				},
				pomp_action: {
					required: true
				},
				new_pomp: {
					required: true
				},
				boitier_comment: {
					required: true
				},
				boitier_action: {
					required: true
				},
				boitier_entrepot: {
					required: true
				},
				boitier_product: {
					required: true
				},
				final_comment: {
					required: true
				},
				final_etat_hs: {
					required: true
				}
            },
			
			messages: {
				num_serie: {
					remote: "Ce numéro de série est déjà  utilisé."
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

		var displayConfirmAnalyse = function() {
			if ((!$('#elec_fonc').bootstrapSwitch("state") && $('[name=elec_action]').val() == "ATTENTE")
			|| (!$('#alim_fonc').bootstrapSwitch("state") && $('[name=alil_action]').val() == "ATTENTE")
			|| (!$('#tete_fonc').bootstrapSwitch("state") && $('[name=tete_action]').val() == "ATTENTE")
			|| (!$('#sd_fonc').bootstrapSwitch("state") && $('[name=sd_action]').val() == "ATTENTE")
			|| (!$('#boitier_fonc').bootstrapSwitch("state") && $('[name=boitier_action]').val() == "ATTENTE")) {
				$('[name=final_etat]').val(2);
			} else if ((!$('#elec_fonc').bootstrapSwitch("state") && $('[name=elec_action]').val() == "NEANT")
			|| (!$('#alim_fonc').bootstrapSwitch("state") && $('[name=alil_action]').val() == "NEANT")
			|| (!$('#tete_fonc').bootstrapSwitch("state") && $('[name=tete_action]').val() == "NEANT")
			|| (!$('#sd_fonc').bootstrapSwitch("state") && $('[name=sd_action]').val() == "NEANT")
			|| (!$('#boitier_fonc').bootstrapSwitch("state") && $('[name=boitier_action]').val() == "NEANT")) {
				if ($('[name=final_etat_hs]').val() == "HS") {
					$('[name=final_etat]').val(9);
				} else if ($('[name=final_etat_hs]').val() == "HV") {
					$('[name=final_etat]').val(4);
				}
			} else {
				$('[name=final_etat]').val(5);
			}

			$('#tab8 .form-control-static', analyseform).each(function(){
				var input = $('[name="'+$(this).attr("data-display")+'"]', analyseform);
				if (input.is(":radio")) {
					input = $('[name="'+$(this).attr("data-display")+'"]:checked', analyseform);
				}
				if (input.is(":text") || input.is("textarea")) {
					$(this).html(input.val());
				} else if (input.is("select")) {
					$(this).html(input.find('option:selected').map(function() {return this.text;}).get().join('<br>'));
					//$(this).html(input.find('option:selected').text());
				} else if (input.is(":radio") && input.is(":checked")) {
					$(this).html(input.attr("data-title"));
				} else if ($(this).attr("data-display") == 'elec_fonc') {
					if (input.bootstrapSwitch("state")) {
						$(this).html("Oui");
					} else {
						$(this).html("Non");
					}
				} else if ($(this).attr("data-display") == 'alim_fonc') {
					if (input.bootstrapSwitch("state")) {
						$(this).html("Oui");
					} else {
						$(this).html("Non");
					}
				} else if ($(this).attr("data-display") == 'tete_fonc') {
					if (input.bootstrapSwitch("state")) {
						$(this).html("Oui");
					} else {
						$(this).html("Non");
					}
				} else if ($(this).attr("data-display") == 'pomp_fonc') {
					if (input.bootstrapSwitch("state")) {
						$(this).html("Oui");
					} else {
						$(this).html("Non");
					}
				} else if ($(this).attr("data-display") == 'boitier_fonc') {
					if (input.bootstrapSwitch("state")) {
						$(this).html("Oui");
					} else {
						$(this).html("Non");
					}
				} else if ($(this).attr("data-display") == 'final_etat') {
					if (input.val() == 2) {
						$(this).html('<span class="label label-warning">ATTENTE PIECE</span>');
					} else if (input.val() == 5) {
						$(this).html('<span class="label label-success">RETOUR STOCK</span>');
					} else if (input.val() == 4) {
						$(this).html('<span class="label bg-grey-gallery">HORS VENTE</span>')
					} else if (input.val() == 9) {
						$(this).html('<span class="label bg-grey-cararra">H.S</span>')
					}
				} else {
					$(this).html(input.html());
				}
			});
		}

		var handleTitleAnalyse = function(tab, navigation, index) {
			var total = navigation.find('li').length;
			var current = index + 1;
			// set wizard title
			$('.step-title', $('#form_wizard_analyse')).text('Etape ' + (index + 1) + ' sur ' + total);
			// set done steps
			jQuery('li', $('#form_wizard_analyse')).removeClass("done");
			var li_list = navigation.find('li');
			for (var i = 0; i < index; i++) {
				jQuery(li_list[i]).addClass("done");
			}

			if (current == 1) {
				$('#form_wizard_analyse').find('.button-previous').hide();
			} else {
				$('#form_wizard_analyse').find('.button-previous').show();
			}

			if (current >= total) {
				$('#form_wizard_analyse').find('.button-next').hide();
				$('#form_wizard_analyse').find('.button-submit').show();
				displayConfirmAnalyse();
			} else {
				$('#form_wizard_analyse').find('.button-next').show();
				$('#form_wizard_analyse').find('.button-submit').hide();
			}
			Metronic.scrollTo($('.page-title'));
		}

		$('#form_wizard_analyse').bootstrapWizard({
			'nextSelector': '.button-next',
			'previousSelector': '.button-previous',
			onTabClick: function (tab, navigation, index, clickedIndex) {
				return false;
			},
			onNext: function (tab, navigation, index) {
				success.hide();
				error.hide();

				if (analyseform.valid() == false) {
					return false;
				}

				handleTitleAnalyse(tab, navigation, index);
			},
			onPrevious: function (tab, navigation, index) {
				success.hide();
				error.hide();

				handleTitleAnalyse(tab, navigation, index);
			},
			onTabShow: function (tab, navigation, index) {
				var total = navigation.find('li').length;
				var current = index + 1;
				var $percent = (current / total) * 100;
				$('#form_wizard_analyse').find('.progress-bar').css({
					width: $percent + '%'
				});
			}
		});
		
		$('#form_wizard_analyse').find('.button-previous').hide();
		$('#form_wizard_analyse .button-submit').hide();
		$('#analyse-form').on('submit', function() {
			if (analyseform.valid() == true) {
				this.submit();
			} else {
				return false;
			}
		});
		
    }

    return {
        //main function to initiate the module
        init: function() {

            handleSav();

        }

    };

}();