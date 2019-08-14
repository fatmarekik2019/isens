var Programmation = function() {

    var handleProgrammation = function() {

		$.validator.addMethod("checkHours", function (value, element) {
			return /^([01]\d|2[0-3]):[0-5]\d$/.test(value);
		}, "Please enter a valid hour");


		$('#inputOn').inputmask("s", { "placeholder": "00", "clearIncomplete": false, "autoUnmask": false, "removeMaskOnSubmit": false });
		$('#inputOff').inputmask("s", { "placeholder": "00", "clearIncomplete": false, "autoUnmask": false, "removeMaskOnSubmit": false });
		$('#beginHour').inputmask("hh:mm", { "placeholder": "__:__", "clearIncomplete": false, "autoUnmask": false, "removeMaskOnSubmit": false });
		$('#endHour').inputmask("hh:mm", { "placeholder": "__:__", "clearIncomplete": false, "autoUnmask": false, "removeMaskOnSubmit": false });
//		$('#inputOn').mask('M0', { translation: {'M': {pattern: /[0-5]/} }, placeholder: "00" });
//		$('#inputOff').mask('M0', { translation: {'M': {pattern: /[0-5]/} }, placeholder: "00" });
//		$('#beginHour').mask('H0:M0', { translation: {'H': {pattern: /[0-2]/}, 'M': {pattern: /[0-5]/} }, placeholder: "00:00" });
//		$('#endHour').mask('H0:M0', { translation: {'H': {pattern: /[0-2]/}, 'M': {pattern: /[0-5]/} }, placeholder: "00:00" });

		$(".slider-basic").slider({
			min: 1,
			max: 10,
			value: $("#intensite").val(),
			slide: function (event, ui) {
				$("#slider-amount").text(ui.value);
				$("#intensite").val(ui.value);
			},
			animate: true
		});
		$("#slider-amount").text($(".slider-basic").slider("value"));
		$("#intensite").val($(".slider-basic").slider("value"));

		
		$('input:radio[name="fonction"]').change(function(){
			if ($(this).val() == 'cont') {
				$('.div-seq').addClass('hidden');
			}
			else {
				$('.div-seq').removeClass('hidden');
			}
		});

		$('input:radio[name="sem"]').change(function(){
			if ($(this).val() == 'hebdo') {
				$('.div-jours').addClass('hidden');
				$('.div-semaine').removeClass('hidden');
			}
			else {
				$('.div-jours').removeClass('hidden');
				$('.div-semaine').addClass('hidden');
			}
		});

		$(".hotel24").click(function() {
			$('button[type="submit"]').removeClass('hidden');
			$('.prog-detail').removeClass('hidden');
			
			$('input:radio[value="cont"]').prop('checked',true);
			$('.div-seq').addClass('hidden');
			$('#hebdo').prop('checked',true);
			$('.div-semaine').removeClass('hidden');
			$('.div-jours').addClass('hidden');
			$('input:radio[value="LD"]').prop('checked', true);
			$('input:checkbox[name="Jours[]"]').prop('checked', false);
			var values_ld = [1, 2, 3, 4, 5, 6, 7];
			$('.checkbox-list [value="'+values_ld.join('"],[value="')+'"]').prop('checked',true);
			$('#beginHour').val("00:00");
			$('#endHour').val("23:59");
			
			// slider
			$('#intensite').val("10");
			$('.slider-basic').slider( "value", 10 );
			$("#slider-amount").text("10");
			
			// update radio and checkbox
			$.uniform.update();
		});
		$(".hotel722").click(function() {
			$('button[type="submit"]').removeClass('hidden');
			$('.prog-detail').removeClass('hidden');
			
			$('input:radio[value="cont"]').prop('checked',true);
			$('.div-seq').addClass('hidden');
			$('#inputOn').val("");
			$('#inputOff').val("");
			$('#hebdo').prop('checked',true);
			$('.div-semaine').removeClass('hidden');
			$('.div-jours').addClass('hidden');
			$('input:radio[value="LD"]').prop('checked', true);
			$('input:checkbox[name="Jours[]"]').prop('checked', false);
			var values_ld = [1, 2, 3, 4, 5, 6, 7];
			$('.checkbox-list [value="'+values_ld.join('"],[value="')+'"]').prop('checked',true);
			$('#beginHour').val("07:00");
			$('#endHour').val("22:00");
			
			// slider
			$('#intensite').val("10");
			$('.slider-basic').slider( "value", 10 );
			$("#slider-amount").text("10");
			
			// update radio and checkbox
			$.uniform.update();
		});
		$(".shop50").click(function() {
			$('button[type="submit"]').removeClass('hidden');
			$('.prog-detail').removeClass('hidden');
			
			$('input:radio[value="cont"]').prop('checked',true);
			$('.div-seq').addClass('hidden');
			$('#inputOn').val("");
			$('#inputOff').val("");
			$('#hebdo').prop('checked',true);
			$('.div-semaine').removeClass('hidden');
			$('.div-jours').addClass('hidden');
			$('input:radio[value="LS"]').prop('checked', true);
			$('input:checkbox[name="Jours[]"]').prop('checked', false);
			var values_ls = [1, 2, 3, 4, 5, 6];
			$('.checkbox-list [value="'+values_ls.join('"],[value="')+'"]').prop('checked',true);
			$('#beginHour').val("10:00");
			$('#endHour').val("19:30");
			
			// slider
			$('#intensite').val("6");
			$('.slider-basic').slider( "value", 6 );
			$("#slider-amount").text("6");
			
			// update radio and checkbox
			$.uniform.update();
		});
		$(".shop100").click(function() {
			$('button[type="submit"]').removeClass('hidden');
			$('.prog-detail').removeClass('hidden');
			
			$('input:radio[value="cont"]').prop('checked',true);
			$('.div-seq').addClass('hidden');
			$('#inputOn').val("");
			$('#inputOff').val("");
			$('#hebdo').prop('checked',true);
			$('.div-semaine').removeClass('hidden');
			$('.div-jours').addClass('hidden');
			$('input:checkbox[name="Jours[]"]').prop('checked', false);
			var values_ls = [1, 2, 3, 4, 5, 6];
			$('input:radio[value="LS"]').prop('checked', true);
			$('.checkbox-list [value="'+values_ls.join('"],[value="')+'"]').prop('checked',true);
			$('#beginHour').val("10:00");
			$('#endHour').val("19:30");
			
			// slider
			$('#intensite').val("10");
			$('.slider-basic').slider( "value", 10 );
			$("#slider-amount").text("10");
			
			// update radio and checkbox
			$.uniform.update();
		});
		$(".office").click(function() {
			$('button[type="submit"]').removeClass('hidden');
			$('.prog-detail').removeClass('hidden');
			
			$('input:radio[value="seq"]').prop('checked',true);
			$('.div-seq').removeClass('hidden');
			$('#inputOn').val("10");
			$('#inputOff').val("10");
			$('#hebdo').prop('checked',true);
			$('.div-semaine').removeClass('hidden');
			$('.div-jours').addClass('hidden');
			$('input:checkbox[name="Jours[]"]').prop('checked', false);
			var values_lv = [1, 2, 3, 4, 5];
			$('input:radio[value="LV"]').prop('checked', true);
			$('.checkbox-list [value="'+values_lv.join('"],[value="')+'"]').prop('checked',true);
			$('#beginHour').val("09:00");
			$('#endHour').val("19:00");
			
			// slider
			$('#intensite').val("10");
			$('.slider-basic').slider( "value", 10 );
			$("#slider-amount").text("10");
			
			// update radio and checkbox
			$.uniform.update();
		});
		$(".custom").click(function() {
			$('button[type="submit"]').removeClass('hidden');
			$('.prog-detail').removeClass('hidden');
			
			$('input:radio[value="cont"]').prop('checked',true);
			$('.div-seq').addClass('hidden');
			$('#inputOn').val("");
			$('#inputOff').val("");
			$('#hebdo').prop('checked',true);
			$('.div-semaine').removeClass('hidden');
			$('.div-jours').addClass('hidden');
			$('input:radio[name="Semaine"]').prop('checked', false);
			$('input:checkbox[name="Jours[]"]').prop('checked', false);
			$('#beginHour').val("");
			$('#endHour').val("");
			
			// slider
			$('#intensite').val("10");
			$('.slider-basic').slider( "value", 10 );
			$("#slider-amount").text("10");
			
			// update radio and checkbox
			$.uniform.update();
		});
		
		$('#programmation-form').validate({
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {

                fonction: {
                    required: true
                },
				inputOn: {
					required: true,
					min: 1
				},
				inputOff: {
					required: true,
					min: 1
				},
				Semaine: {
					required: true
				},
				"Jours[]": {
					required: true
				},
				beginHour: {
					required: true,
					checkHours : true
				},
				endHour: {
					required: true,
					checkHours : true
				},
				intensite: {
					required: true
				}
            },
			messages: { // custom messages for radio buttons and checkboxes
				Semaine: {
					required: "Veuillez sélectionner un type de semaine"
				},
				"Jours[]": {
					required: "Choisissez au minimum un jour"
				}
			},
			
            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
            },

            success: function(label, element) {
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
				$(element).closest('.input-icon').children('i').removeClass("fa-warning").addClass("fa-check");
            },

            errorPlacement: function(error, element) {
				var icon = $(element).closest('.input-icon').children('i');
				icon.removeClass('fa-check').addClass("fa-warning");  
				if (element.parent(".input-group").size() > 0) {
					error.insertAfter(element.parent(".input-group"));
				} else if (element.attr("data-error-container")) { 
					error.appendTo(element.attr("data-error-container"));
				} else if (element.parents('.radio-list').size() > 0) { 
					error.appendTo(element.parents('.radio-list').attr("data-error-container"));
				} else if (element.parents('.radio-inline').size() > 0) { 
					error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
				} else if (element.parents('.checkbox-list').size() > 0) {
					error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
				} else if (element.parents('.checkbox-inline').size() > 0) { 
					error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
				} else {
					error.insertAfter(element); // for other inputs, just perform default behavior
				}
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        $('#programmation-form').keypress(function(e) {
            if (e.which == 13) {
                if ($('.programmation-form').validate().form()) {
                    $('.programmation-form').submit();
                }
                return false;
            }
        });
    }

    return {
        //main function to initiate the module
        init: function() {

            handleProgrammation();

        }

    };

}();