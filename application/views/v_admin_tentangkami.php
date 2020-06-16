  <!-- Full Width Column -->
  <div class="content-wrapper">
      <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">
						<label>
						<a class="btn-sm btn-primary" href="<?php echo base_url("admin/tentangkami_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah</span></a>
						</label>
						</h3>
					</div>
					<div class="box-body">
					<table id="datatablex" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Nama Perusahaan</th>
							<th>Keterangan</th>
							<th>Alamat</th>
							<th>Latitude</th>
							<th>Longitude</th>
							<th>Kontak</th>
							<th>Level</th>
							<th>Foto</th>
							<th width="140px">Action</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					  </table>
					</div>
				</div>
			</div>
		</div>
      </section>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script>
$(function () {
$('#datatablex').DataTable({
			"processing": true,
			"serverSide": true,
			"autoWidth": true,
			"paging": true,
			"info": true,
			'order': [[0, 'asc']],
			"ajax": "<?php echo base_url('admin/get_data_master_tentangkami');?>" ,
			columnDefs: [{
				   targets: [7],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					return "<img height='40px' src='<?php echo base_url();?>assets/dist/img/tentangkami/"+row[7]+"'>";
				   }
				},{
				   targets: [8],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					return "<a href='<?php echo base_url();?>admin/tentangkami_ubah/"+row[8]+"'> <button type='button' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Ubah</button></a> <a onclick=\"return confirm('Yakin untuk menghapus ini ?')\" href='<?php echo base_url();?>admin/tentangkami_aksi_hapus/"+row[8]+"'> <button type='button' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</button></a>";
				   }
				},],
		});
 });
</script>