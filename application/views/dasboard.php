<!DOCTYPE html>
<html>
<head>
	<title>AJAX</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/bootstrap/css/bootstrap.css') ?>">
</head>
<body>

<div class="jumbotron">
	<div class="container">
		<table class="table table-border">
			<thead>
				<tr>
					<th>NAMA</th>
					<th>KELAS</th>
					<th>ALAMAT</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody id="body"></tbody>
		</table>	
	</div>
	
</div>

<script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/jquery.js') ?>"></script>
<script>
	onload()
	function onload() {
		$.ajax({
			type:'POST',
			url : '<?php echo base_url('CrudController/showData') ?>',
			dataType : 'json',
			success : function(data) {
				var tampil = ""
				for (var i = 0; i < data.data.length; i++) {
					tampil += "<tr><td>"+data.data[i].nama+"</td><td>"+data.data[i].kelas+"</td><td>"+data.data[i].alamat+"</td><td><button class='btn btn-danger btn-sm'>HAPUS</button> <button class='btn btn-success btn-sm'>EDIT</button></td></tr>"
				}
				$("#body").html(tampil)
			}
		})
	}
</script>

<script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.js') ?>"></script>
</body>
</html>