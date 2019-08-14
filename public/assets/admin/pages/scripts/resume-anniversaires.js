var ResumeAnniversaires = function () {

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
		
		$.fn.dataTable.moment( 'DD-MM-YYYY' );

        var table = $('#resume_anniversaires_table');
        var oTable = table.DataTable({
                
			"bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

			"lengthMenu": [
				[5, 15, 20, -1],
				[5, 15, 20, "Tous"] // change per page values here
			],

			// set the initial value
			"pageLength": 5,

			"ajax": {
				"url": "/Admin/refonte/assets/admin/pages/getResume.php?table=anniversaires", // ajax source
				"type": "POST",
				"data": function(data) {
					$.each(ajaxParams, function(key, value) {
						data[key] = value;
					});
					Metronic.blockUI({
						message: 'Chargement...',
						target: $(".portlet-body"),
						cenrerY: true,
						boxed: true
					});
				},
				"dataSrc": function(res) {
					if (res.customActionMessage) {
						Metronic.alert({
							type: (res.customActionStatus == 'OK' ? 'success' : 'danger'),
							icon: (res.customActionStatus == 'OK' ? 'check' : 'warning'),
							message: res.customActionMessage,
							container: $("#resume_anniversaires_table_wrapper"),
							place: 'prepend',
							close: true, // make alert closable
							reset: false, // close all previouse alerts first
							focus: true, // auto scroll to the alert after shown
							closeInSeconds: 5 // auto close after defined seconds
						});
					}
					
					Metronic.unblockUI($(".portlet-body"));
					
					return res.data;
				},
				"error": function() {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: "La requête n'a pas aboutie. Veuillez vérifier votre connexion internet.",
						container: $("#resume_anniversaires_table_wrapper"),
						place: 'prepend',
						close: true,
						reset: true,
						focus: true
					});
					
					Metronic.unblockUI($(".portlet-body"));
				}
			},

			"columnDefs": [{
				"targets": [0, 8],
                "visible": false,
                "searchable": false
			}],

			"order": [
				[0, "desc"]
			] // set first column as a default sort by asc
        });

		//custom portlet reload handler
           $('.portlet .portlet-title a.reload').click(function(e){
              e.preventDefault();  // prevent default event
              e.stopPropagation(); // stop event handling here(cancel the default reload handler)
              // do here some custom work:
			  oTable.ajax.reload();
           })

        var tableWrapper = $("#sample_editable_1_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            showSearchInput: false //hide search box with special css class
        }); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

		$("body").on("shown.bs.modal", ".modal", function () {
			$(this).find('div.modal-dialog').css({
				'margin-top': function () {
					var modal_height = $('.modal-dialog').first().height();
					var window_height = $(window).height();
					return ((window_height/2) - (modal_height/2));
				}
			});
		});

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
				oTable.row(nEditing).remove().draw();
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            var nRow = $(this).parents('tr')[0];

			jQuery.ajax({
				url: '/Admin/refonte/assets/admin/pages/getEmergencyForm.php?id='+oTable.row(nRow).data()[0],
				success: function(data) {
					var modal = bootbox.dialog({
						message: data,
						title: "Renvoi de parfum en urgence",
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
									$('#emergency-anniv-form').validate({
										errorElement: 'span', //default input error message container
										errorClass: 'help-block', // default input error message class
										focusInvalid: false, // do not focus the last invalid input
										rules: {
							
											dp_new_anniv: {
												required: true
											},
											raison: {
												required: true
											},
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
											//updateRowDB(oTable.row(nRow).data());
											//form.submit();
										}
									});
									
									if ($('#emergency-anniv-form').valid())
										$.post("/Admin/refonte/assets/admin/pages/setEmergencyForm.php", $("#emergency-anniv-form").serialize()).done(function(data) {
											if (data == "ok") {
												modal.modal("hide");
												oTable.ajax.reload();
												return true;
											} else {
												Metronic.alert({
													type: 'danger',
													icon: 'warning',
													message: "Une erreur est survenue: " + data,
													container: $("#emergency-anniv-form"),
													place: 'prepend',
													close: true,
													reset: true,
													focus: true
												});
												return false;
											}
										});
									else
										return false;
								}
							}
						},
						show: false,
						onEscape: function() {
							modal.modal("hide");
						}
					});

					var nowDate = new Date();
					var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
					$("#dp_new_anniv").datepicker({
						rtl: Metronic.isRTL(),
						autoclose: true,
						todayBtn: 'linked',
						format: "mm-yyyy",
						viewMode: "months", 
						minViewMode: "months",
						maxViewMode: "months",
						startDate: today
					});
					$('#dp_livraison').change(function() {
						$('#livraison-form').validate().element($(this));
					});

					modal.modal("show");
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