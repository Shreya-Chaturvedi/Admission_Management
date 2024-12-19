<style>
	.img-thumb-path {
		width: 100px;
		height: 80px;
		object-fit: scale-down;
		object-position: center center;
	}
</style>

<div class="card card-outline card-primary rounded-0 shadow">

	<div class="card-header">
		<h3 class="card-title">List of students</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" class="btn btn-flat btn-sm btn-info" onclick="printPage()" style="background-color: #28a745;">
				<span class="fas fa-print"></span> Print
			</a>
		</div>
		
	

		<div class="card-tools" style="margin-right: 1rem;">
			<a href="javascript:void(0)" class="btn btn-flat btn-sm btn-success" onclick="exportToExcel()" style="background-color: #d81b60;">
				<span class="fas fa-file-excel"></span> Export to Excel
			</a>
		</div>
		<div class="card-tools" style="margin-right: 1rem;">
			<a href="./?page=students/manage_student" class="btn btn-flat btn-sm btn-primary"><span class="fas fa-plus"></span> Add New Student</a>
		</div>

	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="container-fluid">
				<table class="table table-bordered table-hover table-striped">
					<colgroup>
						<col width="5%">
						<col width="20%">
						<col width="20%">
						<col width="25%">
						<col width="15%">
						<col width="15%">
					</colgroup>
					<thead>
						<tr class="bg-gradient-dark text-light">
							<th>#</th>
							<th>Date Created</th>
							<th>Roll</th>
							<th>Name</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$qry = $conn->query("SELECT *,concat(firstname,' ',middlename,' ',lastname) as fullname from `student_list` order by concat(lastname,', ',firstname,' ',middlename) asc ");
						while ($row = $qry->fetch_assoc()):
						?>
							<tr>
								<td class="text-center"><?php echo $i++; ?></td>
								<td class=""><?php echo date("d-m-Y H:i", strtotime($row['date_created'])) ?></td>
								<td class="">
									<p class="m-0 truncate-1"><?php echo $row['roll'] ?></p>
								</td>
								<td class="">
									<p class="m-0 truncate-1"><?php echo $row['fullname'] ?></p>
								</td>
								<td class="text-center">
									<?php
									switch ($row['status']) {
										case 0:
											echo '<span class="rounded-pill badge badge-danger bg-gradient-danger px-3">Inactive</span>';
											break;
										case 1:
											echo '<span class="rounded-pill badge badge-success bg-gradient-success px-3">Active</span>';
											break;
									}
									?>
								</td>
								<td align="center">
									<a href="./?page=students/view_student&id=<?= $row['id'] ?>" class="btn btn-flat btn-default btn-sm border"><i class="fa fa-eye"></i> View</a>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.table td, .table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable({
			columnDefs: [{
				orderable: false,
				targets: 5
			}],
		});
	})

	function delete_student($id) {
		start_loader();
		$.ajax({
			url: _base_url_ + "classes/Master.php?f=delete_student",
			method: "POST",
			data: {
				id: $id
			},
			dataType: "json",
			error: err => {
				console.log(err)
				alert_toast("An error occured.", 'error');
				end_loader();
			},
			success: function(resp) {
				if (typeof resp == 'object' && resp.status == 'success') {
					location.reload();
				} else {
					alert_toast("An error occured.", 'error');
					end_loader();
				}
			}
		})
	}

	function printPage() {
		// Create a new window to display the content for printing
		var printWindow = window.open('', '', 'height=800, width=1200');

		// Add the content to the print window
		printWindow.document.write('<html><head><title>Print Student List</title>');
		printWindow.document.write('<style>table { width: 100%; border-collapse: collapse; }');
		printWindow.document.write('th, td { border: 1px solid #000; padding: 8px; text-align: left; }');
		printWindow.document.write('th { background-color: #f2f2f2; font-weight: bold; }</style></head><body>');
		printWindow.document.write('<h2>Student List</h2>');

		// Include the student table HTML content for printing
		printWindow.document.write(document.querySelector('table').outerHTML);

		printWindow.document.write('</body></html>');

		// Close the document, this is important for the print window to load
		printWindow.document.close();

		// Trigger the print dialog
		printWindow.print();
	}

	function exportToExcel() {
		// Get the table element
		const table = document.querySelector('table');

		// Initialize an array to hold CSV data
		let csvData = [];
		let rows = table.querySelectorAll('tr');

		// Loop through rows and prepare CSV content
		rows.forEach((row) => {
			let rowData = [];
			let cols = row.querySelectorAll('th, td');

			cols.forEach((col) => {
				// Escape quotes in the data
				let cellData = col.innerText.replace(/"/g, '""');
				rowData.push(`"${cellData}"`);
			});

			// Join row data with commas
			csvData.push(rowData.join(','));
		});

		// Create a Blob from the CSV data
		let csvBlob = new Blob([csvData.join('\n')], {
			type: 'text/csv'
		});
		let csvUrl = URL.createObjectURL(csvBlob);

		// Create a temporary link to download the file
		let tempLink = document.createElement('a');
		tempLink.href = csvUrl;
		tempLink.download = 'student_list.csv';

		// Trigger the download
		tempLink.click();
	}
</script>