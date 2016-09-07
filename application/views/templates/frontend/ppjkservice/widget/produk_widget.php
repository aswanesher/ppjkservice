<section class="welcome-services home-one">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span>Our Featured Services</span></h2>
			<p><?php echo $prod_caption;?></p>
		</div>
		<div class="row">
			<?php 
            foreach ($produk_widget_list as $prod) {
            ?>
			<div class="col-md-6">
				<div class="welcome-single-services">
					<div class="img-box">
						<img src="<?php echo $prod->thumb;?>" alt="">
					</div>
					<div class="text-box">
						<div class="content">
							<h3><?php echo $prod->nama_produk?></h3>
							<p><?php echo $prod->keterangan?></p>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			<!--<div class="col-md-6">
				<div class="welcome-single-services">
					<div class="img-box">
						<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/welcome-services/1.png" alt="">
					</div>
					<div class="text-box">
						<div class="content">
							<h3>Air Fright</h3>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eure fugiat nulla pariatur.</p>
						</div>
					</div>
				</div>
			</div>-->
			<!--<div class="col-md-6">
				<div class="welcome-single-services">
					<div class="img-box">
						<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/welcome-services/3.png" alt="">
					</div>
					<div class="text-box">
						<div class="content">
							<h3>warehouses</h3>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eure fugiat nulla pariatur.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="welcome-single-services">
					<div class="img-box">
						<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/welcome-services/4.png" alt="">
					</div>
					<div class="text-box">
						<div class="content">
							<h3>road Fright</h3>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eure fugiat nulla pariatur.</p>
						</div>
					</div>
				</div>
			</div>-->
		</div>
	</div>
</section>