<div class="page-header">
<h1>
	<?php echo $judul_panel;?>
</h1>
</div><!-- /.page-header -->

<div class="row">
<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form class="form-horizontal" role="form" action="<?php echo base_url('laporan_po/laporan_po_save'); ?>" method="post" enctype="multipart/form-data">
		<!--<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">PR_no</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="PR_no" placeholder="PR_no" class="col-xs-10 col-sm-5" required />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">PR_date</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="PR_date" placeholder="PR_date" class="col-xs-10 col-sm-5" required />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">PO_no</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="PO_no" placeholder="PO_no" class="col-xs-10 col-sm-5" required />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">PO_date</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="PO_date" placeholder="PO_date" class="col-xs-10 col-sm-5" required />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Customer</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Customer" placeholder="Customer" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">VendorCode</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="VendorCode" placeholder="VendorCode" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">VendorName</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="VendorName" placeholder="VendorName" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Qty</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Qty" placeholder="Qty" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Currency</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Currency" placeholder="Currency" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Rate</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Rate" placeholder="Rate" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Total_po_price</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Total_po_price" placeholder="Total_po_price" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Vendor_type</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Vendor_type" placeholder="Vendor_type" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Etd</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Etd" placeholder="Etd" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Eta_port1</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Eta_port1" placeholder="Eta_port1" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Eta_ns1</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Eta_ns1" placeholder="Eta_ns1" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Po_status</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Po_status" placeholder="Po_status" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Item_code</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Item_code" placeholder="Item_code" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Item_desc</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Item_desc" placeholder="Item_desc" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Item_qty</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Item_qty" placeholder="Item_qty" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Item_price</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Item_price" placeholder="Item_price" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Subtotal</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Subtotal" placeholder="Subtotal" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Bl_no</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Bl_no" placeholder="Bl_no" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Bl_date</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Bl_date" placeholder="Bl_date" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Total_bl_price</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Total_bl_price" placeholder="Total_bl_price" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Bl_status</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Bl_status" placeholder="Bl_status" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Atd</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Atd" placeholder="Atd" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Eta_port2</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Eta_port2" placeholder="Eta_port2" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Eta_ns2</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Eta_ns2" placeholder="Eta_ns2" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ata_port</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Ata_port" placeholder="Ata_port" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Eta_ns3</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Eta_ns3" placeholder="Eta_ns3" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Eta_ns4</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Eta_ns4" placeholder="Eta_ns4" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ata_ns</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Ata_ns" placeholder="Ata_ns" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Invoice_no</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Invoice_no" placeholder="Invoice_no" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Lc_no</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Lc_no" placeholder="Lc_no" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Estimated_lc_due_date</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Estimated_lc_due_date" placeholder="Estimated_lc_due_date" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Actual_lc_due_date</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Actual_lc_due_date" placeholder="Actual_lc_due_date" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Bm</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Bm" placeholder="Bm" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Bm_amount</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Bm_amount" placeholder="Bm_amount" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Pph</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Pph" placeholder="Pph" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Pph_amount</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Pph_amount" placeholder="Pph_amount" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Insurance</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Insurance" placeholder="Insurance" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Insurance_amount</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Insurance_amount" placeholder="Insurance_amount" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Estimasi_pib_mount</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Estimasi_pib_mount" placeholder="Estimasi_pib_mount" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Actual_pib_paid</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Actual_pib_paid" placeholder="Actual_pib_paid" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Status_pib</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Status_pib" placeholder="Status_pib" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Penjaluran</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Penjaluran" placeholder="Penjaluran" class="col-xs-10 col-sm-5" required />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Payment_to_vendor</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" name="Payment_to_vendor" placeholder="Payment_to_vendor" class="col-xs-10 col-sm-5" required />
			</div>
		</div>-->
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title"></h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="ace-icon fa fa-chevron-up"></i>
					</a>

					<a href="#" data-action="close">
						<i class="ace-icon fa fa-times"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="form-group">
						<div class="col-xs-12">
							<label class="ace-file-input"><input type="file" id="id-input-file-2" name="file"><span class="ace-file-container" data-title="Pilih"><span class="ace-file-name" data-title="Upload file spreadsheet ..."><i class=" ace-icon fa fa-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
						</div>
					</div>
				</div>
			</div>
		</div>
    	<!--<input type="submit" value="Upload file"/>-->

		<div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9">
				<button class="btn btn-info" type="submit">
					<i class="ace-icon fa fa-check bigger-110"></i>
					Upload Data
				</button>

				&nbsp; &nbsp; &nbsp;
				<a class="btn" href="<?php echo base_url('laporan_po'); ?>">
					<i class="ace-icon fa fa-undo bigger-110"></i>
					Batal
				</a>
			</div>
		</div>
	</form>
</div><!-- /.col -->