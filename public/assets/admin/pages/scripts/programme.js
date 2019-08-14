var Programme = function () {

    var handleTable = function () {
		
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
			},
			afterDeselect: function(values){
				$('#nb_diff').val(parseInt($('#nb_diff').val()) - 1);
			}
		});

		var form = $('#programme-form');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);

        form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {

				"my_multi_select1[]": {
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
                form.submit();
            }
        });
				
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }
		
    };

}();