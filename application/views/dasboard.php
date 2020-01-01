<!DOCTYPE html>
<html>
<head>
	<title>AJAX</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/bootstrap/css/bootstrap.css') ?>">
</head>
<body>

<div class="jumbotron">
	<div class="container">
		<button class="btn btn-info" data-target="#modal" data-toggle="modal" >TAMBAH</button><hr/>
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
<div class="modal fade" id="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>TAMBAH MAHASISWA</h3>
			</div>
			<p id="pesan" class="text-center"></p>
			<div class="modal-body">
				<div class="form-group">
					<label>Masukan Nama</label>
					<input type="text" name="nama" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Masukan Kelas</label>
					<input type="number" name="kelas" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Masukan Alamat</label>
					<input type="text" name="alamat" class="form-control" required="">
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-info" id="simpanbtn" onclick="tambahData()" >SIMPAN</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>UBAH MAHASISWA</h3>
			</div>
			<p id="pesan" class="text-center"></p>
			<div class="modal-body">
				<div class="form-group">
					<label>Masukan Nama</label>
					<input type="text" name="namaa" class="form-control" required="">
					<input type="hidden" name="id" class="form-control" >

				</div>
				<div class="form-group">
					<label>Masukan Kelas</label>
					<input type="number" name="kelass" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Masukan Alamat</label>
					<input type="text" name="alamatt" class="form-control" required="">
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-info" id="updatebtn" onclick="updateData()" >UPDATE</button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/jquery.js') ?>"></script>
<script>
	onload()
	function onload() {
		$.ajax({
			type:'GET',
			url : '<?php echo base_url('CrudController/showData') ?>',
			dataType : 'json',
			success : function(data) {
				var tampil = ""
				for (var i = 0; i < data.data.length; i++) {
					tampil += "<tr><td>"+data.data[i].nama+"</td><td>"+data.data[i].kelas+"</td><td>"+data.data[i].alamat+"</td><td><button class='btn btn-danger btn-sm'>HAPUS</button> <button onclick='editData("+data.data[i].id+")' class='btn btn-success btn-sm'>EDIT</button></td></tr>"
				}
				$("#body").html(tampil)
			}
		})
	}

	function tambahData() {
		var nama = $("[name='nama']").val();
		var kelas = $("[name='kelas']").val();
		var alamat = $("[name='alamat']").val();
		var error = 'invalid'
		if (nama == "" || kelas == "" ||alamat == "") {
			$("#pesan").html('Field Invalid Input')
		} else {
			$.ajax({
				type : 'POST',
				data : 'nama='+nama+'&kelas='+kelas+'&alamat='+alamat,
				dataType:'json',
				url:"<?php echo base_url('CrudController/tambah') ?>",
				success:function(data){
					if (data.status == 1) {
						$("#modal").modal('hide')
						onload()
					}
				}
			})
		}
	}

	function editData(id) {
		$("#edit").modal('show')
		$.ajax({
			type:'POST',
			data : 'id='+id,
			dataType:'json',
			url:'<?php echo base_url('CrudController/edit_data') ?>',
			success:function(data){
				$("[name='namaa']").val(data.nama)
				$("[name='kelass']").val(data.kelas)
				$("[name='alamatt']").val(data.alamat)
				$("[name='id']").val(data.id)
			}
		})
	}

	function updateData() {
		var nama = $("[name='namaa']").val();
		var kelas = $("[name='kelass']").val();
		var alamat = $("[name='alamatt']").val();
		var id = $("[name='id']").val();
		if (nama == "" || kelas == "" || alamat == "") {
			console.log('gagal')
		} else {
			$.ajax({
				type:'POST',
				data : "id="+id+"&nama="+nama+"&kelas="+kelas+"&alamat="+alamat,
				dataType:'json',
				url:"<?php echo base_url('CrudController/do_edit') ?>",
				success:function (data) {
					if (data.status == 1) {
						$("#edit").modal('hide')
						onload()
					} else {
						console.log(data.data)
					}
				}
			})
		}
	}
</script>

<script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.js') ?>"></script>
</body>
</html>