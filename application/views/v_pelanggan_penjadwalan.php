<?php
$geturl1 = $this->uri->segment(3);
?>
  <div class="content-wrapper">
      <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<br>
					
					<?php echo form_open_multipart("pelanggan/penjadwalan_aksi_tambah"); ?>
					<div class="col-md-12">
						<h3>TENTUKAN JADWAL KURSUS</h3>
						<div class="col-md-4">
						  <div class="form-group">
							<label>Pilih Paket</label>
							<select onchange="location = '<?php echo base_url();?>pelanggan/penjadwalan/'+this.value;" name="pemesanan_id" class="form-control select2">
							<?php if($geturl1!=""){
								echo "<option value='$geturl1'>$tbl_paket_by->paket_judul</option>";
								$paket_lamakursus = $tbl_paket_by->paket_lamakursus;
							}else{
								echo "<option>Pilih Paket Kursus</option>";
								$paket_lamakursus = 0;
							}
							foreach($tbl_paket as $paket){?>
							<option value="<?php echo $paket->pemesanan_id;?>"><?php echo $paket->paket_judul;?></option>
							<?php }?>
							</select>
						  </div>
						<?php if($geturl1!=""){?>
						<input type="hidden" name="paket_id" value="<?php echo $tbl_pemesanan_by->paket_id;?>">
						<input type="hidden" name="tentangkami_id" value="<?php echo $tbl_pemesanan_by->tentangkami_id;?>">
						<?php }?>  
						  <div class="form-group">
							<label>Hari/Tanggal</label>
							<input type="date" class="form-control" name="penjadwalan_tanggal" placeholder="Hari/Tanggal">
						  </div>
						  <div class="form-group">
							<input onclick="return confirm('Lanjutkan ?')" type="submit" value="Submit" class="btn btn-success">
						  </div><br><br>
						</div>
						<div class="col-md-4">
						  <div class="form-group">
							<label>Pilih Pertemuan</label>
							<select name="penjadwalan_ke" class="form-control select2">
							<option>Pilih Pertemuan</option>
							<?php  for($x=1;$x<=$paket_lamakursus;$x++){?>
							<option value="<?php echo $x;?>">Pertemuan Ke-<?php echo $x;?></option>
							<?php }?>
							</select>
						  </div>
						  <div class="form-group">
							<label>Jam</label>
							<input type="text" class="form-control" name="penjadwalan_jam" placeholder="Jam">
						  </div>
						</div>
					</div>
					<?php echo form_close(); ?>
					
					<div class="box-body">
					<table id="datatablex" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Nama Paket</th>
							<th>Pertemuan</th>
							<th>Hari/Tanggal</th>
							<th>Jam Kursus</th>
							<th>Waktu Update</th>
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
			'order': [[0, 'asc'],[1, 'asc']],
			"ajax": "<?php echo base_url('pelanggan/get_data_master_penjadwalan');?>" ,
			columnDefs: [{
				   targets: [5],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					return "<a href='<?php echo base_url();?>pelanggan/penjadwalan_ubah/"+row[5]+"'> <button type='button' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Ubah</button></a> <a onclick=\"return confirm('Yakin untuk menghapus ini ?')\" href='<?php echo base_url();?>pelanggan/penjadwalan_aksi_hapus/"+row[5]+"'> <button type='button' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</button></a>";
				   }
				},],
		});
 });
</script>