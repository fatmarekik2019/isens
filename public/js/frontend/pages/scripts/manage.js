var Manage = function() {

    var handleManage = function() {
		
		if (jQuery().select2) {
	        $("#select2_diffuser").select2({
	            allowClear: true,
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });
    	}

		$('#delete').click(function(){
			bootbox.confirm("Êtes-vous sûr de vouloir supprimer la programmation ? Toutes les séquences seront perdues.", function(result) {
				if (result) {
					$(location).attr('href', 'manage.php?delete=true');
				}
			}); 
		});

 		$('#save').click(function(){
			Metronic.blockUI({
				message: 'Chargement...',
				target: $(".manage-btn"),
				overlayColor: 'none',
				cenrerY: true,
				boxed: true
			});
			$.post("save.php", function() {
				Metronic.unblockUI($(".manage-btn"));
				bootbox.dialog({
					message: '<div class="row">'+
						'<div class="col-sm-6 text-center">'+
							'<a href="download.php" class="thumbnail">'+
								'<img src="../../assets/frontend/pages/img/save-sd.png" alt="Télécharger le fichier">'+
							'</a>'+
							'<span>Télécharger le fichier</span>'+
						'</div>'+
						'<div class="col-sm-6 text-center">'+
							'<a href="mail.php" class="thumbnail">'+
								'<img src="../../assets/frontend/pages/img/mail.png" alt="Recevoir le fichier par email">'+
							'</a>'+
							'<span>Recevoir le fichier par email</span>'+
						'</div>'+
					'</div>',
					title: "<b>Sauvegarder la programmation</b>"
				}); 
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

		$(document).on('click', '.bootbox', function(e){
			var classname = e.target.className;
		
			if(classname && !$('.' + classname).parents('.modal-dialog').length)
				bootbox.hideAll();
		});

		function startCount() {
			timer = setInterval(count,1000);
		}
		function count(secs) {
			var time_shown = $(".realtime").text();
			var space_chunks = time_shown.split(" ");
			var time_chunks = space_chunks[1].split(":");
			var hour, mins, secs;
	 
			hour=Number(time_chunks[0]);
			mins=Number(time_chunks[1]);
			secs=Number(time_chunks[2]);
			secs++;
			if (secs==60){
				secs = 0;
				mins=mins + 1;
			} 
			if (mins==60){
				mins=0;
				hour=hour + 1;
			}
			if (hour==24){
				hour=0;
			}
	 
			$(".realtime").text(space_chunks[0] +" "+ plz(hour) +":" + plz(mins) + ":" + plz(secs));
		}
		function plz(digit){
		 
			var zpad = digit + '';
			if (digit < 10) {
				zpad = "0" + zpad;
			}
			return zpad;
		}
		startCount();

    }

    return {
        //main function to initiate the module
        init: function() {

            handleManage();

        }

    };

}();