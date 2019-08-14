var Livraison = function() {

    var handleLivraison = function() {		
				
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

	        $('#select2_company').change(function() {
	            $('#livraison-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
	        $('#parfum').change(function() {
	            $('#livraison-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
			
    	}
		
		if (jQuery().datepicker) {
            $("#dp_livraison").datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true,
				todayBtn: 'linked',
				format: 'dd-mm-yyyy'
            });
	        $('#dp_livraison').change(function() {
	            $('#livraison-form').validate().element($(this));
	        });
        }
		
		$('#my_multi_select1').multiSelect({
			selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off'>",
			afterInit: function(ms){
				var that = this,
				$selectableSearch = that.$selectableUl.prev(),
				$selectionSearch = that.$selectionUl.prev(),
				selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
				selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';
			
				that.qs1 = $selectableSearch.quicksearch(selectableSearchString).on('keydown', function(e){
				  if (e.which === 40){
					that.$selectableUl.focus();
					return false;
				  }
				});
			
			},
			afterSelect: function(values){
				$('#nb_diff').val(parseInt($('#nb_diff').val()) + 1);
				
				$('#preview_diffusers').empty();
				$('#my_multi_select1 :selected').each(function(index, value) {
					$('#preview_diffusers').append('<div class="form-group">'+
					'<label class="col-md-6">'+$(value).text()+'</label>'+
					'<div class="col-md-3">'+
					'<a id="'+ $(value).val() +'" class="modify btn blue" disabled>Modifier</a>'+
					'</div></div>');
				});
				this.qs1.cache();
			},
			afterDeselect: function(values){
				$('#nb_diff').val(parseInt($('#nb_diff').val()) - 1);

				$('#preview_diffusers').empty();
				$('#my_multi_select1 :selected').each(function(index, value) {
					$('#preview_diffusers').append('<label class="col-md-6">'+$(value).text()+'</label>'+
					'<div class="col-md-3">'+
					'<button id="'+ $(value).val() +'" class="modify btn blue" disabled>Modifier</button>'+
					'</div>');
				});
				this.qs1.cache();
			}
		});
		
		$(document).on('click', ".modify", function() {
			jQuery.ajax({
				url: '/Admin/refonte/assets/admin/pages/getModificationForm.php?id='+$(this).attr('id'),
				success: function(data) {
					var modal = bootbox.dialog({
						message: data,
						title: "Modification du diffuseur",
						buttons: {
							close: {
								label: "Fermer / Close",
								className: "btn-danger pull-left",
								callback: function() {}
							},
							success: {
								label: "Enregistrer / Save",
								className: "btn-success",
								callback: function() {
									$('#modify-diffuser-form').validate({
										errorElement: 'span', //default input error message container
										errorClass: 'help-block', // default input error message class
										focusInvalid: false, // do not focus the last invalid input
										rules: {
							
											diffname: {
												required: true
											},
											company: {
												required: true
											},
											country: {
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
									
									return false;
								}
							}
						},
						show: false,
						onEscape: function() {
							modal.modal("hide");
						}
					});
					
					$("#select2_company_modal").select2({
						allowClear: true,
						escapeMarkup: function(m) {
							return m;
						}
					});
					$("#select2_country").select2({
						allowClear: true,
						
						escapeMarkup: function(m) {
							return m;
						}
					});
					$("#select2_reseau").select2({
						allowClear: true,
						escapeMarkup: function(m) {
							return m;
						}
					});
		
					$('#select2_company_modal').change(function() {
						$('#livraison-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
					});
					$('#select2_coutry').change(function() {
						$('#livraison-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
					});
					$('#select2_reseau').change(function() {
						$('#livraison-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
					});
					
					modal.modal("show");
				}
			});
        });

		$('select[name="type_ann"], input[name="nb_ann"]').change(function() {
            $('#nb_rec').html(parseInt($('select[name="type_ann"]').val()) * parseInt($('input[name="nb_ann"]').val()));
        });
		
		$("#liv_parfum").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-parfum-yes').removeClass('hidden');
			} else {
				$('.div-parfum-yes').addClass('hidden');
			}
		});
		$("#liv_diffuser").on('switchChange.bootstrapSwitch', function(e, state) {
			if (state) {
				$('.div-diffuser-yes').removeClass('hidden');
			} else {
				$('.div-diffuser-yes').addClass('hidden');
			}
		});
		
		$('#select2_company').change(function() {
			jQuery.ajax({
				dataType: "json",
				url: '/Admin/refonte/assets/admin/pages/getBL.php?company='+$(this).val(),
				success: function(data) {
					$.each(data, function(dataId, dataValue){
						$("#bl").append('<option value="'+dataId+'">'+dataValue+'</option>');
					});
				}
			});
        });
		
		var form = $('#livraison-form');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);

        form.validate({
			doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {

                liv_parfum: {
                    require_from_group: [1, ".produits"]
                },
                liv_diffuser: {
                    require_from_group: [1, ".produits"]
                },
				type_ann: {
					required: true
				},
				type_rec: {
					required: true
				},
				nb_ann: {
					required: true,
					number: true
				},
				parfum: {
					required: true
				},
				"my_multi_select1[]": {
					required: true
				},
				group_name: {
					required: true
				},
				company: {
					required: true
				},
				dp_livraison: {
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
			$('#tab5 .form-control-static', form).each(function(){
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
				} else if ($(this).attr("data-display") == 'liv') {
					if ($("#liv").bootstrapSwitch("state")) {
						$(this).html("Oui");
					} else {
						$(this).html("Non");
					}
				} else if ($(this).attr("data-display") == 'automatic') {
					if ($("#automatic").bootstrapSwitch("state")) {
						$(this).html("Automatique");
					} else {
						$(this).html("Sur demande");
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
			$('.step-title', $('#form_wizard_livraison')).text('Etape ' + (index + 1) + ' sur ' + total);
			// set done steps
			jQuery('li', $('#form_wizard_livraison')).removeClass("done");
			var li_list = navigation.find('li');
			for (var i = 0; i < index; i++) {
				jQuery(li_list[i]).addClass("done");
			}

			if (current == 1) {
				$('#form_wizard_livraison').find('.button-previous').hide();
			} else {
				$('#form_wizard_livraison').find('.button-previous').show();
			}

			if (current >= total) {
				$('#form_wizard_livraison').find('.button-next').hide();
				$('#form_wizard_livraison').find('.button-submit').show();
				displayConfirm();
			} else {
				$('#form_wizard_livraison').find('.button-next').show();
				$('#form_wizard_livraison').find('.button-submit').hide();
			}
			Metronic.scrollTo($('.page-title'));
		}

		$('#form_wizard_livraison').bootstrapWizard({
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
				$('#form_wizard_livraison').find('.progress-bar').css({
					width: $percent + '%'
				});
			}
		});
		
		$('#livraison-form').on("keyup keypress", function(e) {
		  var code = e.keyCode || e.which; 
		  if (code == 13) {               
			e.preventDefault();
			return false;
		  }
		});
		
		$('#form_wizard_livraison').find('.button-previous').hide();
		$('#form_wizard_livraison .button-submit').hide();
		$('#livraison-form').on('submit', function() {
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

            handleLivraison();

        }

    };

}();