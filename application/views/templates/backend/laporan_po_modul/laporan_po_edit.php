<div class="page-header">
<h1>
	<?php echo $judul_panel;?>
</h1>
</div><!-- /.page-header -->

<div class="row">
<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form class="form-horizontal" role="form" action="<?php echo base_url('laporan_po/laporan_po_update'); ?>" method="post" enctype="multipart/form-data">
		<input type="hidden" value="<?php echo $pr_no;?>" name="PR_no" required />
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">PR date</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $pr_date;?>" name="PR_date" placeholder="PR_date" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">PO no</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $po_no;?>" name="PO_no" placeholder="PO_no" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">PO date</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $po_date;?>" name="PO_date" placeholder="PO_date" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Customer</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $customer;?>" name="Customer" placeholder="Customer" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Vendor Code</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $vendorcode;?>" name="VendorCode" placeholder="VendorCode" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Vendor Name</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $vendorname;?>" name="VendorName" placeholder="VendorName" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Qty</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $qty;?>" name="Qty" placeholder="Qty" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Currency</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $currency;?>" name="Currency" placeholder="Currency" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Rate</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $rate;?>" name="Rate" placeholder="Rate" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Total_po_price</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $total_po_price;?>" name="Total_po_price" placeholder="Total_po_price" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Vendor type</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $vendor_type;?>" name="Vendor_type" placeholder="Vendor_type" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Etd</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $etd;?>" name="Etd" placeholder="Etd" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Eta port1</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $eta_port1;?>" name="Eta_port1" placeholder="Eta_port1" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Eta ns1</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $eta_ns1;?>" name="Eta_ns1" placeholder="Eta_ns1" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Po status</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $po_status;?>" name="Po_status" placeholder="Po_status" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Item code</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $item_code;?>" name="Item_code" placeholder="Item_code" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Item desc</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $item_desc;?>" name="Item_desc" placeholder="Item_desc" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Item qty</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $item_qty;?>" name="Item_qty" placeholder="Item_qty" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Item price</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $item_price;?>" name="Item_price" placeholder="Item_price" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Subtotal</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $subtotal;?>" name="Subtotal" placeholder="Subtotal" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Bl no</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $bl_no;?>" name="Bl_no" placeholder="Bl_no" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Bl date</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $bl_date;?>" name="Bl_date" placeholder="Bl_date" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Total_bl_price</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $total_bl_price;?>" name="Total_bl_price" placeholder="Total_bl_price" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Bl status</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $bl_status;?>" name="Bl_status" placeholder="Bl_status" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Atd</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $atd;?>" name="Atd" placeholder="Atd" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Eta port2</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $eta_port2;?>" name="Eta_port2" placeholder="Eta_port2" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Eta ns2</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $eta_ns2;?>" name="Eta_ns2" placeholder="Eta_ns2" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ata port</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $ata_port;?>" name="Ata_port" placeholder="Ata_port" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Eta ns3</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $eta_ns3;?>" name="Eta_ns3" placeholder="Eta_ns3" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Eta ns4</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $eta_ns4;?>" name="Eta_ns4" placeholder="Eta_ns4" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ata ns</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $ata_ns;?>" name="Ata_ns" placeholder="Ata_ns" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Invoice no</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $invoice_no;?>" name="Invoice_no" placeholder="Invoice_no" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Lc no</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $lc_no;?>" name="Lc_no" placeholder="Lc_no" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Estimated lc due date</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $estimated_lc_due_date;?>" name="Estimated_lc_due_date" placeholder="Estimated_lc_due_date" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Actual lc due date</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $actual_lc_due_date;?>" name="Actual_lc_due_date" placeholder="Actual_lc_due_date" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Bm</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $bm;?>" name="Bm" placeholder="Bm" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Bm amount</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $bm_amount;?>" name="Bm_amount" placeholder="Bm_amount" class="col-xs-10 col-sm-5" required />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Pph</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $pph;?>" name="Pph" placeholder="Pph" class="col-xs-10 col-sm-5" required />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Pph amount</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $pph_amount;?>" name="Pph_amount" placeholder="Pph_amount" class="col-xs-10 col-sm-5" required />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ppn</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $ppn;?>" name="Ppn" placeholder="Pph" class="col-xs-10 col-sm-5" required />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ppn amount</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $ppn_amount;?>" name="Ppn_amount" placeholder="Ppn_amount" class="col-xs-10 col-sm-5" required />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Insurance</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $insurance;?>" name="Insurance" placeholder="Insurance" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Insurance amount</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $insurance_amount;?>" name="Insurance_amount" placeholder="Insurance_amount" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Estimasi pib mount</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $estimasi_pib_mount;?>" name="Estimasi_pib_mount" placeholder="Estimasi_pib_mount" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Actual pib paid</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $actual_pib_paid;?>" name="Actual_pib_paid" placeholder="Actual_pib_paid" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Status pib</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $status_pib;?>" name="Status_pib" placeholder="Status_pib" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Penjaluran</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $penjaluran;?>" name="Penjaluran" placeholder="Penjaluran" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Payment to vendor</label>

			<div class="col-sm-9">
				<input type="text" id="form-field-1-1" value="<?php echo $payment_to_vendor;?>" name="Payment_to_vendor" placeholder="Payment_to_vendor" class="col-xs-10 col-sm-5" required />
			</div>
		</div><div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9">
				<button class="btn btn-info" type="submit">
					<i class="ace-icon fa fa-check bigger-110"></i>
					Simpan
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