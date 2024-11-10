//FROM: https://codepen.io/RedJokingInn/pen/bGoppqP
$(document).ready(function () {
	if ($("#datatable").length == 0) return;

	$('#filters li').click(function() {
		const el = $(this);
		const filterType = el.parent().prev('strong')
			.text().includes('Account')
				? 'account' : 'project';
		$('.filter-' + filterType).val(el.text()).change();
		$("#datatable")[0].scrollIntoView();
	});

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

		    // Setup - add a text input to each header cell with header name
		    $('#datatable th').each( function () {
		        var title = $(this).text();
				console.warn(title);
		        $(this).html( title+'<br><input class="filter filter-' + title.toLowerCase() + '" type="text" placeholder="Search '+title+'" />' );
		    });

		    const table = this.api();
			// Apply the search
		    table.columns().every( function () {
		        var that = this;
		        $( 'input', this.header() ).on( 'keyup change clear', function () {
		            if ( that.search() !== this.value ) {
		                that
		                    .search( this.value )
		                    .draw();
		            }
		        } );
		    } );
		},
	});
});
