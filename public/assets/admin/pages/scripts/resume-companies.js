var ResumeCompanies = function () {

	var ajaxParams = {};

    var handleTable = function () {

        function restoreRow(oTable, nRow) {
            var aData = oTable.row(nRow).data();
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
				oTable.cell(nRow, i).data(aData[i]);
            }

            oTable.draw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.row(nRow).data();
            var jqTds = $('>td', nRow);
			// Notice :
			//		aData[0] = companie_id
			//		aData[2] = reseau_id
			// ----------------------------
			//		jqTds => cellules VISIBLES du tableau
            jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
			// GET all select from the server
			$.getJSON(
				'/Admin/refonte/assets/admin/pages/getFormResume.php',
				'formCompany',
				function(data) {
		            jqTds[1].innerHTML = '<select name="reseau" id="select2_reseau" class="select2 form-control input-small"></select>';
					$("#select2_reseau").append('<option value="">Reseau / Network ...</option>');
					$.each(data, function(dataId, dataValue) {
						$("#select2_reseau").append('<option value="'+dataId+'">'+dataValue+'</option>');
					});
					$("#select2_reseau option[value='"+aData[2]+"']").attr("selected","selected");
					$("#select2_reseau").select2({
						allowClear: true,
						escapeMarkup: function(m) {
							return m;
						}
					});
				}
			);
            jqTds[2].innerHTML = '<a class="edit" href="">Enregistrer</a>';
            jqTds[3].innerHTML = '<a class="cancel" href="">Annuler</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input.form-control.input-small, select', nRow);
			oTable.cell(nRow, 1).data(jqInputs[0].value); // Name
			oTable.cell(nRow, 2).data(jqInputs[1].value); // Reseau ID
			oTable.cell(nRow, 3).data(jqInputs[1].options[jqInputs[1].selectedIndex].text); // Reseau texte
			oTable.cell(nRow, 4).data('<a class="edit" href="">Editer</a>');
			oTable.cell(nRow, 5).data('<a class="delete" href="">Supprimer</a>');
            oTable.draw();
        }

		function deleteRowDB(company) {
			setAjaxParam("customActionType", "DELETE");
			addAjaxParam("Company", company);
			oTable.ajax.reload();
			clearAjaxParams();
		}
		
		function updateRowDB(company) {
			setAjaxParam("customActionType", "UPDATE");
			addAjaxParam("Company", company);
			oTable.ajax.reload();
			clearAjaxParams();
		}
		
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

        var table = $('#resume_companies_table');
        var oTable = table.DataTable({
                
			"bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

			"lengthMenu": [
				[5, 15, 20, -1],
				[5, 15, 20, "Tous"] // change per page values here
			],

			// set the initial value
			"pageLength": 5,

			"ajax": {
				"url": "/Admin/refonte/assets/admin/pages/getResume.php?table=companies", // ajax source
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
							container: $("#resume_companies_table_wrapper"),
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

			"columnDefs": [{ // set default column settings
			// company_id
				"targets": [0],
                "visible": false,
                "searchable": false
			}, {
			// reseau_id
				"targets": [2],
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

        var tableWrapper = $("#sample_editable_1_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            showSearchInput: false //hide search box with special css class
        }); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

        table.on('click', '.delete', function (e) {
            e.preventDefault();

			var nRow = $(this).parents('tr')[0];
            bootbox.confirm("\"" + oTable.row(nRow).data()[1] + "\" : Êtes-vous sûr de vouloir supprimer cette enseigne ?", function(result) {
				if (result) {
					deleteRowDB(oTable.row(nRow).data());
					
					oTable.row(nRow).remove().draw();
					//alert("Deleted! Do not forget to do some ajax to sync with backend :)");
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
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Enregistrer") {
                /* Editing this row and want to save it */
				
                saveRow(oTable, nEditing);
				updateRowDB(oTable.row(nRow).data());
                nEditing = null;
                //alert("Updated! Do not forget to do some ajax to sync with backend :)");
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
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