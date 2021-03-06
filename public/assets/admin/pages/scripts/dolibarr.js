var Dolibarr = function () {

    var handleTable = function () {

		if (jQuery().select2) {
	        $("#select2_company").select2({
	            allowClear: true,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });
	        $("#select2_categorie").select2({
	            allowClear: true,
				closeOnSelect: false,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });

	        $('#select2_company').change(function() {
	            $('#dolibarr-form').validate().element($(this));
	        });
	        $('#select2_categorie').change(function() {
	            $('#dolibarr-form').validate().element($(this));
	        });
			
    	}
		
		$("#select2_categorie").on("select2-removed", function() {
			if ($("#checkbox").is(':checked') ){
				$("#checkbox").prop("checked", false);
				$.uniform.update();
			}
		});
		
		$("#checkbox").click(function(){
			if ($("#checkbox").is(':checked') ){
				$("#select2_categorie > option").prop("selected","selected");
				$("#select2_categorie").trigger("change");
			} else {
				$("#select2_categorie > option").removeAttr("selected");
				$("#select2_categorie").trigger("change");
			}
		});

		var form = $('#dolibarr-form');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);

        form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {

                company: {
                    required: true
                },
				"categorie[]": {
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
		
		$.fn.dataTable.moment( 'DD/MM/YYYY' );

        var table = $('#resume_bl_table');

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-btn-group pull-right",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            }
        });

        var oTable = table.DataTable({
                
			"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
			"tableTools": {
				"sSwfPath": "../../assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
				"aButtons": [{
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }, {
                    "sExtends": "csv",
                    "sButtonText": "CSV"
                }, {
                    "sExtends": "xls",
                    "sButtonText": "Excel",
					"sFileName": "TableTools - *.xls"
                }, {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "sInfo": 'Please press "CTRL+P" to print or "ESC" to quit',
                    "sMessage": "Generated by DataTables"
                }, {
                    "sExtends": "copy",
                    "sButtonText": "Copy"
                }]
			},

			"bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

			"lengthMenu": [
				[5, 15, 20, -1],
				[5, 15, 20, "Tous"] // change per page values here
			],

			// set the initial value
			"pageLength": 5,

			"order": [
				[0, "asc"]
			] // set first column as a default sort by asc
        });

        var tableWrapper = $("#sample_editable_1_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            showSearchInput: false //hide search box with special css class
        }); // initialize select2 dropdown
		
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }
		
    };

}();