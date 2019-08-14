var ResumeUsers = function () {

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
			//		aData[0] = user_id
			//		aData[3] = company_id
			//		aData[5] = reseau_id
			//		aData[7] = group_id
			// ----------------------------
			//		jqTds => cellules VISIBLES du tableau
            jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[2] + '">';
			// GET all select from the server
			$.getJSON(
				'../../assets/admin/pages/getFormResume.php',
				'formUser',
				function(data) {
					jqTds[2].innerHTML = '<select name="company" id="select2_company" class="select2 form-control input-small"></select>';
					$("#select2_company").append('<option value="">Enseigne / Company ...</option>');
					$.each(data[0], function(dataId, dataValue) {
						$("#select2_company").append('<option value="'+dataId+'">'+dataValue+'</option>');
					});
					$("#select2_company option[value='"+aData[3]+"']").attr("selected","selected");
					$("#select2_company").select2({
						allowClear: true,
						escapeMarkup: function(m) {
							return m;
						}
					});

		            jqTds[3].innerHTML = '<select name="reseau" id="select2_reseau" class="select2 form-control input-small"></select>';
					$("#select2_reseau").append('<option value="">Reseau / Network ...</option>');
					$.each(data[1], function(dataId, dataValue) {
						$("#select2_reseau").append('<option value="'+dataId+'">'+dataValue+'</option>');
					});
					$("#select2_reseau option[value='"+aData[5]+"']").attr("selected","selected");
					$("#select2_reseau").select2({
						allowClear: true,
						escapeMarkup: function(m) {
							return m;
						}
					});

		            jqTds[4].innerHTML = '<select name="group" id="group" class="form-control input-small"></select>';
					$("#group").append('<option value="">Rôle / Group ...</option>');
					$.each(data[2], function(dataId, dataValue) {
						$("#group").append('<option value="'+dataId+'">'+dataValue+'</option>');
					});
					$("#group option[value='"+aData[7]+"']").attr("selected","selected");
				}
			);
			// Non modifiable
            //jqTds[5].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[9] + '">';
            //jqTds[6].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[10] + '">';
            jqTds[7].innerHTML = '';
            jqTds[8].innerHTML = '<a class="edit" href="">Enregistrer</a>';
            jqTds[9].innerHTML = '<a class="cancel" href="">Annuler</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input.form-control.input-small, select', nRow);
			oTable.cell(nRow, 1).data(jqInputs[0].value); // Name
			oTable.cell(nRow, 2).data(jqInputs[1].value); // Mail
			oTable.cell(nRow, 3).data(jqInputs[2].value); // Société ID
			oTable.cell(nRow, 4).data(jqInputs[2].options[jqInputs[2].selectedIndex].text); // Société texte
			oTable.cell(nRow, 5).data(jqInputs[3].value); // Reseau ID
			oTable.cell(nRow, 6).data(jqInputs[3].options[jqInputs[3].selectedIndex].text); // Réseau texte
			oTable.cell(nRow, 7).data(jqInputs[4].value); // Groupe ID
			oTable.cell(nRow, 8).data(jqInputs[4].options[jqInputs[4].selectedIndex].text); // Groupe texte
			// Non modifiable
			//oTable.cell(nRow, 9).data(jqInputs[5].value); // Date inscription
			//oTable.cell(nRow, 10).data(jqInputs[6].value); // Dernière connexion
			oTable.cell(nRow, 11).data('<a class="resend" href="">Renvoyez login</a>');
			oTable.cell(nRow, 12).data('<a class="edit" href="">Editer</a>');
			oTable.cell(nRow, 13).data('<a class="delete" href="">Supprimer</a>');
            oTable.draw();
        }

		function deleteRowDB(user) {
			setAjaxParam("customActionType", "DELETE");
			addAjaxParam("User", user);
			oTable.ajax.reload();
			clearAjaxParams();
		}
		
		function updateRowDB(user) {
			setAjaxParam("customActionType", "UPDATE");
			addAjaxParam("User", user);
			oTable.ajax.reload();
			clearAjaxParams();
		}
		
		function resendId(user) {
			var request = $.ajax({
			  url: "/Admin/refonte/assets/admin/pages/resendId.php",
			  method: "POST",
			  data: {user: user}
			});
			 
			request.done(function(data) {
				if (data == "success") {
					Metronic.alert({
						type: 'success',
						icon: 'check',
						message: "Un nouveau mot de passe a été envoyé à " + user[1] + " sur l'adresse " + user[2],
						container: $("#resume_users_table_wrapper"),
						place: 'prepend',
						close: true, // make alert closable
						reset: false, // close all previouse alerts first
						focus: true, // auto scroll to the alert after shown
						closeInSeconds: 10 // auto close after defined seconds
					});
				} else {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: "Une erreur est survenue. " + data,
						container: $(".table-toolbar"),
						place: 'prepend',
						close: true,
						reset: true,
						focus: true
					});
				}
			});
			 
			request.fail(function( jqXHR, textStatus ) {
				Metronic.alert({
					type: 'danger',
					icon: 'warning',
					message: "La requête n'a pas aboutie. Veuillez vérifier votre connexion internet. " + textStatus,
					container: $(".table-toolbar"),
					place: 'prepend',
					close: true,
					reset: true,
					focus: true
				});
			});
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

        var table = $('#resume_users_table');
        var oTable = table.DataTable({
                
			"bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

			"lengthMenu": [
				[5, 15, 20, -1],
				[5, 15, 20, "Tous"] // change per page values here
			],

			// set the initial value
			"pageLength": 5,

			"ajax": {
				"url": "/Admin/refonte/assets/admin/pages/getResume.php?table=users", // ajax source
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
							container: $("#resume_users_table_wrapper"),
							place: 'prepend',
							close: true, // make alert closable
							reset: false, // close all previouse alerts first
							focus: true, // auto scroll to the alert after shown
							closeInSeconds: 10 // auto close after defined seconds
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
			// user_id
				"targets": [0],
                "visible": false,
                "searchable": false
			}, {
			// company_id
				"targets": [3],
                "visible": false,
                "searchable": false
			}, {
			// reseau_id
				"targets": [5],
                "visible": false,
                "searchable": false
			}, {
			// group_id
				"targets": [7],
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

        table.on('click', '.resend', function (e) {
            e.preventDefault();

            var nRow = $(this).parents('tr')[0];
            bootbox.confirm("\"" + oTable.row(nRow).data()[1] +" - " + oTable.row(nRow).data()[2] + "\" : Êtes-vous sûr de vouloir supprimer le mot de passe actuel de cet utilisateur pour lui en envoyer un nouveau ?", function(result) {
				if (result) {
					resendId(oTable.row(nRow).data());
				}
			});
        });

        var nEditing = null;
        var nNew = false;

        table.on('click', '.delete', function (e) {
            e.preventDefault();

			var nRow = $(this).parents('tr')[0];
            bootbox.confirm("\"" + oTable.row(nRow).data()[1] +" - " + oTable.row(nRow).data()[2] + "\" : Êtes-vous sûr de vouloir supprimer cet utilisateur ?", function(result) {
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