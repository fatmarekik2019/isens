var DeliverHistory = function () {

    var handleTable = function () {
		
		$.fn.dataTable.moment( 'DD-MM-YYYY HH:mm:ss' );
		
        var table = $('#deliver_history_table');
        var oTable = table.DataTable({
                
			"bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

			"lengthMenu": [
				[5, 15, 20, -1],
				[5, 15, 20, "Tous"] // change per page values here
			],

			// set the initial value
			"pageLength": 5,

			"ajax": {
				"url": "/Admin/refonte/assets/admin/pages/getResume.php?table=deliver-history", // ajax source
				"type": "POST",
				"data": function(data) {
					data[0] = $('#phpVar').val();
					Metronic.blockUI({
						message: 'Chargement...',
						target: $("#deliver_history_table_wrapper"),
						overlayColor: 'none',
						cenrerY: true,
						boxed: true
					});
				},
				"dataSrc": function(res) {
					Metronic.unblockUI($("#deliver_history_table_wrapper"));
					return res.data;
				},
				"error": function() {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: "La requête n'a pas aboutie. Veuillez vérifier votre connexion internet.",
						container: $("#deliver_history_table_wrapper"),
						place: 'prepend',
						close: true,
						reset: true,
						focus: true
					});
					
					Metronic.unblockUI($("#deliver_history_table_wrapper"));
				}
			},
			"order": [
				[0, "desc"]
			]
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

    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }
		
    };

}();