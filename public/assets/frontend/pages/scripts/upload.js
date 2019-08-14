var Upload = function() {

    var handleUpload = function() {
		
		$('#sd').click(function(){
			$("#sdfile").trigger('click');
		});

		$("#uploadsd").on("change", "#sdfile", function () {
			Metronic.blockUI({
				message: 'Envoi en cours...',
				target: $(".content-page"),
				overlayColor: 'none',
				cenrerY: true,
				boxed: true
			});

			setTimeout(function(){
				$("#uploadsd").submit();
			}, 20);
		});

    }

    return {
        //main function to initiate the module
        init: function() {

            handleUpload();

        }

    };

}();