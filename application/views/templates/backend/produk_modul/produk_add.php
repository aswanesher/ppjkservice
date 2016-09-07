<div class="page-header">
<h1>
	<?php echo $judul_panel;?>
</h1>
</div><!-- /.page-header -->
        <?php
        
        					if(isset($pesan)){
						echo '<div class="alert alert-danger">'.$pesan.'</div>';
					} ?>
<div class="row">
<form class="form-horizontal" role="form" action="<?php echo base_url('produk/produk_save'); ?>" method="post" enctype="multipart/form-data">	
	<div class="col-sm-12">
	<div class="tabbable">
		<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
			<li class="active">
				<a data-toggle="tab" href="#umum" aria-expanded="true">Umum</a>
			</li>

			<li class="">
				<a data-toggle="tab" href="#harga" aria-expanded="false">Harga & Stok</a>
			</li>

			<li class="">
				<a data-toggle="tab" href="#seo" aria-expanded="false">SEO</a>
			</li>
		</ul>

		<div class="tab-content">
			<div id="umum" class="tab-pane active">
				<div class="alert alert-warning">
					<strong>Pengaturan umum.</strong>
					Kolom ini untuk memasukkan data umum mengenai produk anda.
					<br>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Kode Produk</label>

					<div class="col-sm-9">
						<input type="text" id="form-field-1-1" name="kode_produk" placeholder="Kode Produk" class="col-xs-10 col-sm-5" required />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama Produk</label>

					<div class="col-sm-9">
						<input type="text" id="form-field-1-1" name="nama_produk" placeholder="Nama Produk" class="col-xs-10 col-sm-5" required />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kategori </label>
					<div class="col-sm-2">
						<select class="form-control" name="kategori" id="kategori" class="col-xs-10 col-sm-5" required>
							<option value="">-- Pilih Kategori --</option>
							<?php foreach ($kat as $data) { ?>
								<option value="<?php echo $data->id_prod_category;?>"><?php echo $data->category;?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Sub Kategori </label>
					<div class="col-sm-2">
					
						<select class="form-control" name="subkategori" id="form-field-select-1" class="col-xs-10 col-sm-5">
							<option value="">-- Pilih Sub Kategori --</option>
                                                        <?php foreach ($subkat as $value) {
                                                            ?> <option value="<?php echo $value->id_prod_category; ?>"><?php echo $value->category; ?></option> <?php
                                                         } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Keterangan Produk</label>

					<div class="col-sm-9">
						<textarea class="ckeditor" name="keterangan"></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ads Copy</label>

					<div class="col-sm-9">
						<textarea class="ckeditor" name="deskripsi"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" >Best Seller</label>
					<div class="col-sm-9">
						<div class="radio">
							<label>
								<input type="radio" class="ace" name="bestseller" value="T">
								<span class="lbl"> Ya</span>
							</label>
							<label>
								<input type="radio" class="ace" name="bestseller" value="F">
								<span class="lbl"> Tidak</span>
							</label>
						</div>
					</div>												
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Featured</label>
					<div class="col-sm-4">
						 <div class="radio">
							<label>
								<input type="radio" class="ace" name="featured" value="T">
								<span class="lbl"> Ya</span>
							</label>
							<label>
								<input type="radio" class="ace" name="featured" value="F">
								<span class="lbl"> Tidak</span>
							</label>
						</div>
					</div>												
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Gambar Produk </label>
					<div class="col-xs-3">
						<input type="text" id="form-field-1-1" name="gambar_produk" placeholder="Klik untuk upload gambar.." class="col-xs-10 col-sm-12" readonly="readonly" onclick="openKCFinder(this)" required />
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Status</label>
					<div class="col-sm-4">
						 <div class="radio">
							<label>
								<input type="radio" class="ace" name="status" value="publish">
								<span class="lbl"> Publish</span>
							</label>
							<label>
								<input type="radio" class="ace" name="status" value="draft">
								<span class="lbl"> Draft</span>
							</label>
						</div>
					</div>												
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Label </label>

					<div class="col-sm-2">
						<select class="form-control" name="id_label" id="form-field-select-1" class="col-xs-10 col-sm-5">
							<option value="">-- Pilih Label --</option>
							<?php foreach ($dtlabel as $data) { ?>
								<option value="<?php echo $data->id_label;?>" ><?php echo $data->nama_label;?></option>
							<?php }?>
						</select>
					</div>
				</div>
			</div>

			<div id="harga" class="tab-pane">
				<div class="alert alert-warning">
					<strong>Pengaturan harga & Stok.</strong>
					Kolom ini untuk memasukkan data harga dan stok produk.
					<br>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Harga</label>

					<div class="col-sm-9">
						<input type="text" id="form-field-1-1" name="harga" placeholder="Contoh : 20000 (Tanpa titik)" class="col-xs-10 col-sm-5"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Diskon</label>

					<div class="col-sm-9">
						<input type="text" id="form-field-1-1" name="diskon" placeholder="Satuan dalam %" class="col-xs-10 col-sm-5"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ukuran</label>

					<div class="col-sm-9">
						<input type="text" id="form-field-1-1" name="ukuran" placeholder="Contoh : S/M/L" class="col-xs-10 col-sm-5"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Berat</label>

					<div class="col-sm-9">
						<input type="text" id="form-field-1-1" name="berat" placeholder="Contoh : 200gr" class="col-xs-10 col-sm-5"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Qty</label>

					<div class="col-sm-9">
						<input type="text" id="form-field-1-1" name="qty" placeholder="Jumlah stok" class="col-xs-10 col-sm-5"/>
					</div>
				</div>
			</div>

			<div id="seo" class="tab-pane">
				<div class="alert alert-warning">
					<strong>Pengaturan SEO.</strong>
					Kolom ini digunakan untuk mempermudah optimasi website mesin pencarian.
					<br>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Meta Title</label>

					<div class="col-sm-9">
						<input type="text" id="form-field-1-1" name="meta_title" placeholder="Judul Meta" class="col-xs-10 col-sm-5"/>
					</div>
				</div><div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Meta Keywords</label>

					<div class="col-sm-9">
						<input type="text" id="form-field-1-1" name="meta_keywords" placeholder="Kata Kunci Meta" class="col-xs-10 col-sm-5"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Meta Desc</label>

					<div class="col-sm-9">
						<textarea name="meta_desc" placeholder="Deskripsi meta" class="col-xs-5" rows="4"></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xs-12">
		<div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9">
				<button class="btn btn-info" type="submit">
					<i class="ace-icon fa fa-check bigger-110"></i>
					Simpan
				</button>

				&nbsp; &nbsp; &nbsp;
				<a class="btn" href="<?php echo base_url('produk'); ?>">
					<i class="ace-icon fa fa-undo bigger-110"></i>
					Batal
				</a>
			</div>
		</div>
	</form>
</div><!-- /.col -->
</form>
</div>