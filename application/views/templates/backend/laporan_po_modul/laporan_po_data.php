<div class="page-header">
		<h1>
			<?php echo $judul_panel;?>
			<?php if($tambah=='true') { ?>
			<a href="<?php echo base_url();?>laporan_po/laporan_po_add" class="btn-sm btn-success pull-right"><i class="ace-icon fa fa-pencil-square-o bigger-230"></i> Tambah data</a>
			<?php } ?>
		</h1>
	</div><!-- /.page-header -->
	<?php
        
    if (!empty($this->session->flashdata('error'))) {
        echo '<div class="alert alert-danger">';
        echo '<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i>
        </button>';
        echo '<b>'.$this->session->flashdata('error').'</b>';
        echo '</div>';
    }
    
    ?>

    <?php
		
		if (!empty($this->session->flashdata('success'))) {
			echo '<div class="alert alert-block alert-success">';
			echo '<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i>
			</button>';
			echo '<b>'.$this->session->flashdata('success').'</b>';
			echo '</div>';
		} elseif (!empty($this->session->flashdata('error'))) {
			echo '<div class="alert alert-danger">';
			echo '<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i>
			</button>';
			echo '<b>'.$this->session->flashdata('error').'</b>';
			echo '</div>';
		}
		
	?>
	<div class="row">
		<div class="col-xs-12">
			<div class="widget-box">
				<div class="widget-header widget-header-small">
					<h5 class="widget-title lighter">Pencarian</h5>
				</div>
				<div class="widget-body">
					<div class="widget-main">
						<form class="form-search" method="post" action="<?php echo base_url()?>laporan_po">
							<div class="row">
								<div class="col-xs-12 col-sm-8">
									<div class="input-group">
									<?php 
									$usr=$this->session->userdata('logged_in');	
									if($usr['group']==1) {
									?>	
									<span class="input-group-addon">
									<i class="ace-icon fa fa-user"></i>
									</span>
									<input type="text" class="form-control search-query" placeholder="Cari nama.." value="<?php echo $query1;?>" name="query1">
									<?php } ?>

									<span class="input-group-addon">
									<i class="ace-icon fa fa-calendar"></i>	
									</span>
									<input type="text" name="query_date" placeholder="Tanggal PO" class="form-control search-query" data-date-format="yyyy-mm-dd" value="<?php echo $query2;?>" data-provide="datepicker" required />

									<span class="input-group-addon">
									<i class="ace-icon fa fa-info-circle"></i>
									</span>
									<select class="form-control" id="form-field-select-1" name="query_status">
										<option value="">-- Status --</option>
										<option value="open" <?php if($query3=='open') { echo 'selected';} ?>>Open</option>
										<option value="closed" <?php if($query3=='closed') { echo 'selected'; }?>>Closed</option>
									</select>

									<span class="input-group-btn">
									<button type="submit" class="btn btn-purple btn-sm">
									<span class="ace-icon fa fa-search icon-on-right bigger-110"></span> Cari
									</button>
									</span>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<div class="table-responsive">
					<table id="simple-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>PO</th>
								<th>Tgl PO</th>
								<th>Vendor</th>
								<th>Qty</th>
								<th>Etd</th>
								<th>Eta Port 1</th>
								<th>Eta NS 1</th>
								<th>Status</th>
								<th>Item Desc</th>
								<th>Item Qty</th>
								<th>Bl No</th>
								<th>Bl Date</th>
								<th>Bl Status</th>
								<th>Eta Port 2</th>
								<th>Eta Ns 2</th>
								<th>Ata Port</th>
								<th>Eta Ns 3</th>
								<th>Eta Ns 4</th>
								<th>Ata Ns</th>
								<th>Estimasi PIB Mount</th>
								<th>Actual Pib Paid</th>
								<th>Status Pib</th>
								<th>Penjaluran</th>
								<th>Payment to vendor</th>
								<th></th>
							</tr>
						</thead>

						<tbody>
						<?php
						$a=1;
						foreach ($laporan_po as $row) {
						?>
							<tr>
								<td><?php echo $a;?></td>
								<td><?php echo $row->PO_no?></td>
								<td><?php echo $row->PO_date?></td>
								<td><?php echo $row->VendorName?></td>
								<td><?php echo $row->Qty?></td>
								<td><?php echo $row->Etd?></td>
								<td><?php echo $row->Eta_port1?></td>
								<td><?php echo $row->Eta_ns1?></td>
								<td><?php echo $row->Po_status?></td>
								<td><?php echo $row->Item_desc?></td>
								<td><?php echo $row->Item_qty?></td>
								<td><?php echo $row->Bl_no?></td>
								<td><?php echo $row->Bl_date?></td>
								<td><?php echo $row->Bl_status?></td>
								<td><?php echo $row->Eta_port2?></td>
								<td><?php echo $row->Eta_ns2?></td>
								<td><?php echo $row->Ata_port?></td>
								<td><?php echo $row->Eta_ns3?></td>
								<td><?php echo $row->Eta_ns4?></td>
								<td><?php echo $row->Ata_ns?></td>
								<td><?php echo $row->Estimasi_pib_mount?></td>
								<td><?php echo $row->Actual_pib_paid?></td>
								<td><?php echo $row->Status_pib?></td>
								<td><?php echo $row->Penjaluran?></td>
								<td><?php echo $row->Payment_to_vendor?></td>
<td>
									<div class="hidden-sm hidden-xs btn-group">
										<?php if($edit=='true') { ?>
										<a class="btn btn-xs btn-info" href="<?php echo base_url();?>laporan_po/laporan_po_edit/<?php echo $row->PR_no?>">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</a>
										<?php } ?>

										<?php if($hapus=='true') { ?>
										<a class="btn btn-xs btn-danger" href="<?php echo base_url();?>laporan_po/laporan_po_delete/<?php echo $row->PR_no?>" onclick="return confirm('Anda yakin akan menghapus user ini?')">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</a>
										<?php } ?>

										<a class="btn btn-xs btn-success" href="<?php echo base_url();?>laporan_po/laporan_po_detail/<?php echo $row->PR_no?>">
											<i class="ace-icon fa fa-eye bigger-120"></i>
										</a>

									</div>

									<div class="hidden-md hidden-lg">
										<div class="inline pos-rel">
											<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
												<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
											</button>

											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li>
													<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
														<span class="blue">
															<i class="ace-icon fa fa-search-plus bigger-120"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
														<span class="green">
															<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
														<span class="red">
															<i class="ace-icon fa fa-trash-o bigger-120"></i>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</td>
							</tr>
						<?php
						$a++;
						 } ?>
						</tbody>
					</table>
					</div>
					<center><?php echo $this->pagination->create_links(); ?></center>
				</div><!-- /.span -->
			</div><!-- /.row -->
			



</div><!-- /.page-content -->