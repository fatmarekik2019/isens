var Retard = function () {

	var ajaxParams = {};

    var handleTable = function () {

		function setAjaxParam(name, value) {
            ajaxParams[name] = value;
        }
		
		function addAjaxParam(name, value) {
            if (!ajaxParams[name]) {
                ajaxParams[name] = [];
            }

            skip = false;
            for (var i = 0; i < (ajaxParams[name]).length; i++) { // check for duplicates
                if (ajaxParams[name][i] === value) {
                    skip = true;
                }
            }

            if (skip === false) {
                ajaxParams[name].push(value);
            }
        }
		
		function clearAjaxParams(name, value) {
            ajaxParams = {};
        }

		$.fn.dataTable.moment( 'DD/MM/YYYY' );

        var table = $('#resume_retard_table');
        var oTable = table.DataTable({
                
			"bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

			"lengthMenu": [
				[5, 15, 20, -1],
				[5, 15, 20, "Tous"] // change per page values here
			],

			// set the initial value
			"pageLength": 5,

			"ajax": {
				"url": "/Admin/refonte/assets/admin/pages/getResume.php?table=retards", // ajax source
				"type": "POST",
				"data": function(data) {
					$.each(ajaxParams, function(key, value) {
						data[key] = value;
					});
					Metronic.blockUI({
						message: 'Chargement...',
						target: $(".portlet-body"),
						overlayColor: 'none',
						cenrerY: true,
						boxed: true
					});
				},
				"dataSrc": function(res) {
					Metronic.unblockUI($(".portlet-body"));
					
					return res.data;
				},
				"error": function() {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: "La requête n'a pas aboutie. Veuillez vérifier votre connexion internet.",
						container: $(".portlet-body"),
						place: 'prepend',
						close: true,
						reset: true,
						focus: true
					});
					
					Metronic.unblockUI($(".portlet-body"));
				}
			},
			
			"columnDefs": [{
				"targets": [0],
                "visible": false,
                "searchable": false
			}],

			"order": [
				[3, "asc"]
			] // set first column as a default sort by asc		

        });

		//custom portlet reload handler
           $('.portlet .portlet-title a.reload').click(function(e){
              e.preventDefault();  // prevent default event
              e.stopPropagation(); // stop event handling here(cancel the default reload handler)
              // do here some custom work:
			  oTable.ajax.reload();
           })

        var tableWrapper = $("#resume_retard_table_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            minimumResultsForSearch: Infinity //hide search box with special css class
        }); // initialize select2 dropdown
		
		table.on('click', '.resend', function (e) {
            e.preventDefault();
			
			var nRow = $(this).parents('tr')[0];
			var facture = oTable.row(nRow).data();
			
			jQuery.ajax({
				url: '/Admin/refonte/assets/admin/pages/getRelanceForm.php?id='+facture[0],
				success: function(data) {
					var modal = bootbox.dialog({
						message: data,
						title: "Relance du client",
						buttons: {
							close: {
								label: "Fermer / Close",
								className: "btn-danger pull-left",
								callback: function() {}
							},
							success: {
								label: "Envoyer / Send",
								className: "btn-success",
								callback: function() {
									$('#relance-form').validate({
										errorElement: 'span', //default input error message container
										errorClass: 'help-block', // default input error message class
										focusInvalid: false, // do not focus the last invalid input
										rules: {
							
											dest: {
												require_from_group: [1, '.dest']
											},
											newdest: {
												require_from_group: [1, '.dest'],
												email: true
											},
											subject: {
												required: true
											},
											message: {
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
										},
									});

									if ($('#relance-form').valid()) {
										$.post("/Admin/refonte/assets/admin/pages/setRelanceForm.php", $("#relance-form").serialize()).done(function(data) {
											if (data == "ok") {
												modal.modal("hide");
												return true;
											} else {
												Metronic.alert({
													type: 'danger',
													icon: 'warning',
													message: "Une erreur est survenue: " + data,
													container: $("#relance-form"),
													place: 'prepend',
													close: true,
													reset: true,
													focus: true
												});
												return false;
											}
										});
									}
									else {
										return false;
									}
								}
							}
						},
						show: false,
						onEscape: function() {
							modal.modal("hide");
						}
					});
					
					$("#select2_dest").select2({
						allowClear: true,
						minimumResultsForSearch: Infinity, //hide search box with special css class
						escapeMarkup: function(m) {
							return m;
						}
					});
					$('#select2_dest').change(function() {
						$('#relance-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
					});
					
					$('.wysihtml5').wysihtml5({
						"font-styles": false,
						"image": false,
						"html": false,
						"stylesheets": ["/Admin/refonte/assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
					});
					
					modal.modal("show");
				}
			});
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
        init: function () {
            handleTable();
        }
		
    };

}();