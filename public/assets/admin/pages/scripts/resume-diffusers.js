var ResumeDiffusers = function () {

	var ajaxParams = {};

    var handleTable = function () {

		function format(state) {
            if (!state.id) return state.text; // optgroup
            return "<img class='flag' src='../../assets/global/img/flags/" + document.getElementById('select2_country').options[state.id].getAttribute('flag').toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
        }

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
			//		aData[0] = diffuser_id
			//		aData[4] = company_id
			//		aData[6] = reseau_id
			//		aData[8] = country_id
			//		aData[11] = user_id
			// ----------------------------
			//		jqTds => cellules VISIBLES du tableau
            jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
			// GET data from the server
			$.getJSON(
				'/Admin/refonte/assets/admin/pages/getFormResume.php',
				'formDiffuser',
				function(data) {
					jqTds[2].innerHTML = '<select id="diffuserType" class="form-control input-small"></select>';
					$.each(data[0], function(dataId, dataValue){
						$("#diffuserType").append('<option value="'+dataId+'">'+dataValue+'</option>');
					});
					$("#diffuserType option[value='"+aData[3]+"']").attr("selected","selected");

		            jqTds[3].innerHTML = '<select name="fk_soc" id="select2_soc" class="select2 form-control input-small"></select>';
					$.each(data[7], function(dataId, dataValue) {
						$("#select2_soc").append('<option value="'+dataId+'">'+dataValue+'</option>');
					});
					$("#select2_soc option[value='"+aData[4]+"']").attr("selected","selected");
					$("#select2_soc").select2({
						allowClear: true,
						escapeMarkup: function(m) {
							return m;
						}
					});

		            jqTds[4].innerHTML = '<select name="company" id="select2_company" class="select2 form-control input-small"></select>';
					$.each(data[1], function(dataId, dataValue) {
						$("#select2_company").append('<option value="'+dataId+'">'+dataValue+'</option>');
					});
					$("#select2_company option[value='"+aData[6]+"']").attr("selected","selected");
					$("#select2_company").select2({
						allowClear: true,
						escapeMarkup: function(m) {
							return m;
						}
					});
					
		            jqTds[5].innerHTML = '<select name="reseau" id="select2_reseau" class="select2 form-control input-small"></select>';
					$("#select2_reseau").append('<option value="">Reseau / Network ...</option>');
					$.each(data[2], function(dataId, dataValue) {
						$("#select2_reseau").append('<option value="'+dataId+'">'+dataValue+'</option>');
					});
					$("#select2_reseau option[value='"+aData[8]+"']").attr("selected","selected");
					$("#select2_reseau").select2({
						allowClear: true,
						escapeMarkup: function(m) {
							return m;
						}
					});
					
		            jqTds[6].innerHTML = '<select name="country" id="select2_country" class="select2 form-control input-small"></select>';
					$("#select2_country").append('<option value="" flag="">Pays / Country ...</option>');
					$.each(data[3], function(index, dataValue) {
						$("#select2_country").append('<option value="'+dataValue['Id']+'" flag="'+dataValue['Flags']+'">'+dataValue['Location']+'</option>');
					});
					$("#select2_country option[value='"+aData[10]+"']").attr("selected","selected");
					$("#select2_country").select2({
						allowClear: true,
						formatResult: format,
						formatSelection: format,
						escapeMarkup: function(m) {
							return m;
						}
					});

		            jqTds[8].innerHTML = '<select name="user" id="select2_user" class="select2 form-control input-small"></select>';
					$("#select2_user").append('<option value="0">Utilisateur / User ...</option>');
					$.each(data[4], function(dataId, dataValue) {
						$("#select2_user").append('<option value="'+dataId+'">'+dataValue+'</option>');
					});
					$("#select2_user option[value='"+aData[15]+"']").attr("selected","selected");
					$("#select2_user").select2({
						allowClear: true,
						escapeMarkup: function(m) {
							return m;
						}
					});

		            jqTds[9].innerHTML = '<select id="color" class="form-control input-small"></select>';
					$.each(data[5], function(dataId, dataValue) {
						$("#color").append('<option value="'+dataId+'">'+dataValue+'</option>');
					});
					$("#color option[value='"+aData[17]+"']").attr("selected","selected");

					jqTds[11].innerHTML = '<select id="etat" class="form-control input-small"></select>';
					$.each(data[6], function(dataId, dataValue){
						$("#etat").append('<option value="'+dataId+'">'+dataValue+'</option>');
					});
					$("#etat option[value='"+aData[18]+"']").attr("selected","selected");

				}
			);
            jqTds[7].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[12] + '">';

            jqTds[14].innerHTML = '<a class="edit" href="javascript:;">Enregistrer</a>';
            jqTds[15].innerHTML = '<a class="cancel" href="javascript:;">Annuler</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input.form-control.input-small, select', nRow);
			oTable.cell(nRow, 1).data(jqInputs[0].value); // Name
			oTable.cell(nRow, 3).data(jqInputs[1].value); // Type
			oTable.cell(nRow, 4).data(jqInputs[2].value); // Entité facturation
			oTable.cell(nRow, 5).data(jqInputs[2].options[jqInputs[2].selectedIndex].text); // Entité facturation texte
			oTable.cell(nRow, 6).data(jqInputs[3].value); // Société ID
			oTable.cell(nRow, 7).data(jqInputs[3].options[jqInputs[3].selectedIndex].text); // Société texte
			oTable.cell(nRow, 8).data(jqInputs[4].value); // Réseau ID
			oTable.cell(nRow, 9).data(jqInputs[4].options[jqInputs[4].selectedIndex].text); // Réseau texte
			oTable.cell(nRow, 10).data(jqInputs[5].value); // Pays ID
			oTable.cell(nRow, 11).data(jqInputs[5].options[jqInputs[5].selectedIndex].text); // Pays texte
			oTable.cell(nRow, 12).data(jqInputs[6].value); // Ville
			oTable.cell(nRow, 15).data(jqInputs[7].value); // User ID
			oTable.cell(nRow, 16).data(jqInputs[7].options[jqInputs[7].selectedIndex].text); // User texte
			oTable.cell(nRow, 17).data(jqInputs[8].value); // Color
			oTable.cell(nRow, 18).data(jqInputs[9].value); // Etat
			oTable.cell(nRow, 20).data(jqInputs[9].options[jqInputs[9].selectedIndex].text); // Etat texte
            oTable.draw();
        }

		function deleteRowDB(diff) {
			setAjaxParam("customActionType", "DELETE");
			addAjaxParam("Diffuser", diff);
			oTable.ajax.reload();
			clearAjaxParams();
		}
		
		function updateRowDB(diff) {
			setAjaxParam("customActionType", "UPDATE");
			addAjaxParam("Diffuser", diff);
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

		$.fn.dataTable.moment( 'DD-MM-YYYY' );

        var table = $('#resume_diffusers_table');
        var oTable = table.DataTable({
			
			//responsive: true,
                
			"bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

			"lengthMenu": [
				[5, 15, 20, -1],
				[5, 15, 20, "Tous"] // change per page values here
			],

			// set the initial value
			"pageLength": 5,

			"ajax": {
				"url": "/Admin/refonte/assets/admin/pages/getResume.php?table=diffusers", // ajax source
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
							container: $("#resume_diffusers_table_wrapper"),
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
				"targets": [0, 4, 6, 8, 10, 13, 14, 15, 18, 22, 23, 24, 25, 26, 27],
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

        table.on('click', '.delete', function (e) {
            e.preventDefault();

			var nRow = $(this).parents('tr')[0];
            bootbox.confirm("\"" + oTable.row(nRow).data()[1] +" - " + oTable.row(nRow).data()[2] + "\" : Êtes-vous sûr de vouloir supprimer ce diffuseur ?", function(result) {
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