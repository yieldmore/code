//FROM: https://codepen.io/RedJokingInn/pen/bGoppqP
$(document).ready(function () {
	if ($("#datatable").length == 0) return;
	$("#datatable").DataTable({
		dom: '<"dt-buttons"Bf><"clear">lirtp',
		paging: true,
		autoWidth: true,
		buttons: [
			"colvis",
			"copyHtml5",
			"csvHtml5",
			"excelHtml5",
			"pdfHtml5",
			"print"
		],
		initComplete: function (settings, json) {
			$(".dt-buttons .btn-group").append(
				'<a id="cv" class="btn btn-primary" href="#">CARD VIEW</a>'
			);
			$("#cv").on("click", function () {
				if ($("#datatable").hasClass("card")) {
					$(".colHeader").remove();
				} else {
					var labels = [];
					$("#datatable thead th").each(function () {
						labels.push($(this).text());
					});
					$("#datatable tbody tr").each(function () {
						$(this)
							.find("td")
							.each(function (column) {
								$("<span class='colHeader'>" + labels[column] + ":</span>").prependTo(
									$(this)
								);
							});
					});
				}
				$("#datatable").toggleClass("card");
			});
		}
	});
});
