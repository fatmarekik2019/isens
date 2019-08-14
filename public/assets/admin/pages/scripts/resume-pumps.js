var ResumePumps = function () {

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

        var table = $('#resume_pumps_table');
        var oTable = table.DataTable({
                
			"bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

			"lengthMenu": [
				[5, 15, 20, -1],
				[5, 15, 20, "Tous"] // change per page values here
			],

			// set the initial value
			"pageLength": 5,

			"ajax": {
				"url": "/Admin/refonte/assets/admin/pages/getResume.php?table=pumps", // ajax source
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
					if (res.customActionMessage) {
						Metronic.alert({
							type: (res.customActionStatus == 'OK' ? 'success' : 'danger'),
							icon: (res.customActionStatus == 'OK' ? 'check' : 'warning'),
							message: res.customActionMessage,
							container: $("#resume_pumps_table_wrapper"),
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
						container: $(".table-toolbar"),
						place: 'prepend',
						close: true,
						reset: true,
						focus: true
					});
					
					Metronic.unblockUI($(".portlet-body"));
				}
			},

			"columnDefs": [{
				"targets": [0, 5],
                "visible": false,
                "searchable": false
			}],

			"order": [
				[0, "asc"]
			] // set first column as a default sort by asc
        });

		//custom portlet reload handler
           $('.portlet .portlet-title a.reload').click(function(e){
              e.preventDefault();  // prevent default event
              e.stopPropagation(); // stop event handling here(cancel the default reload handler)
              // do here some custom work:
			  oTable.ajax.reload();
           })

        var tableWrapper = $("#resume_pumps_table_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            minimumResultsForSearch: Infinity //hide search box with special css class
        }); // initialize select2 dropdown		
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }
		
    };

}();