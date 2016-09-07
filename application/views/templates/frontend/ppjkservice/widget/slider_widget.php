<section class="rev_slider_wrapper thm-banner-wrapper">
	<div id="slider1" class="rev_slider"  data-version="5.0">
		<ul>	
			<?php
			$i = 0;
            $len = count($slider);
            foreach ($slider as $srow) {
            	if($i==0) {
                    $a='active';
                } else if($i==1) {
                    $a='';
                } else if($i==2) {

                }
            ?>
			<li data-transition="parallaxvertical" data-ease="SlowMo.ease">
				<img src="../<?php echo $srow->gambar;?>"  alt="">
				<?php if($i==0) { ?>
				<div class="tp-caption sfb tp-resizeme caption-h1" 
			        data-x="right" data-hoffset="0" 
			        data-y="top" data-voffset="188" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="500">
					<?php echo $srow->nama;?>
			    </div>
				<div class="tp-caption sfb tp-resizeme caption-p" 
			        data-x="right" data-hoffset="33" 
			        data-y="top" data-voffset="315" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="1000">
					<?php echo $srow->keterangan;?>
			    </div>
			    <?php } else if($i==1) { ?>
			    <img src="../<?php echo $srow->gambar;?>"  alt="">
			    <div class="tp-caption sfb tp-resizeme caption-h1" 
			        data-x="right" data-hoffset="0" 
			        data-y="top" data-voffset="188" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="500">
					<?php echo $srow->nama;?>
			    </div>
				<div class="tp-caption sfb tp-resizeme caption-p" 
			        data-x="right" data-hoffset="33" 
			        data-y="top" data-voffset="315" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="1000">
					<?php echo $srow->keterangan;?>
			    </div>
			    <?php } else if($i==2) {?>
			    <img src="../<?php echo $srow->gambar;?>"  alt="">
			    <div class="tp-caption sfb tp-resizeme caption-h1" 
			        data-x="right" data-hoffset="120" 
			        data-y="top" data-voffset="148" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="800">
					<?php echo $srow->nama;?>
			    </div>
				<div class="tp-caption sfb tp-resizeme caption-p" 
			        data-x="right" data-hoffset="50" 
			        data-y="top" data-voffset="275" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="1100">
					<?php echo $srow->keterangan;?>
			    </div>
			    <?php } else { ?>
			    <div class="tp-caption sfb tp-resizeme caption-h1" 
			        data-x="right" data-hoffset="0" 
			        data-y="top" data-voffset="188" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="500">
					<?php echo $srow->nama;?>
			    </div>
				<div class="tp-caption sfb tp-resizeme caption-p" 
			        data-x="right" data-hoffset="33" 
			        data-y="top" data-voffset="315" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="1000">
					<?php echo $srow->keterangan;?>
			    </div>
			    <?php } ?>
			</li>
			<?php 
			$i++;
			} 
			?>

			<!--<li data-transition="parallaxvertical" data-ease="SlowMo.ease">
				<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/slider/7.jpg"  alt="">
				<div class="tp-caption sfb tp-resizeme caption-h1" 
			        data-x="left" data-hoffset="0" 
			        data-y="top" data-voffset="248" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="500">
					We are logistic<br>network company
			    </div>
				<div class="tp-caption sfb tp-resizeme caption-p" 
			        data-x="left" data-hoffset="0" 
			        data-y="top" data-voffset="375" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="1000">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit,<br>sed do eiusmod tempor incid idunt ut labore et dolore<br>dolor sit amet, consectetur.
			    </div>
				<div class="tp-caption sfl tp-resizeme" 
			        data-x="left" data-hoffset="0" 
			        data-y="top" data-voffset="500" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="1500">
					<a href="#" class="thm-btn">Get Free Quote <i class="fa fa-arrow-right"></i></a>
			    </div>
				<div class="tp-caption sfr tp-resizeme" 
			        data-x="left" data-hoffset="215" 
			        data-y="top" data-voffset="500" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="2000">
					<a href="#" class="thm-btn inverse">View Services <i class="fa fa-arrow-right"></i></a>
			    </div>
			</li>

			<li data-transition="parallaxvertical" data-ease="SlowMo.ease">
				<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/slider/2.jpg"  alt="">
				<div class="tp-caption sfb tp-resizeme caption-h1" 
			        data-x="left" data-hoffset="0" 
			        data-y="bottom" data-voffset="0" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="500">
					<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/slider/cap-1.png" alt="Awesome Image"/>
			    </div>
				<div class="tp-caption sfb tp-resizeme caption-h1" 
			        data-x="right" data-hoffset="0" 
			        data-y="bottom" data-voffset="0" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="1700">
					<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/slider/cap-2.png" alt="Awesome Image"/>
			    </div>
			    <div class="tp-caption sfb tp-resizeme caption-h1" 
			        data-x="right" data-hoffset="120" 
			        data-y="top" data-voffset="148" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="800">
					We are logistic<br>network company
			    </div>
				<div class="tp-caption sfb tp-resizeme caption-p" 
			        data-x="right" data-hoffset="50" 
			        data-y="top" data-voffset="275" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="1100">
					Duis qute irure dolor in reprehender it in voluptate velit esse cillum <br> dolore eu fugiat nulla pariotur. Excepteur sint occaeca.
			    </div>
			    <div class="tp-caption sfl tp-resizeme" 
			        data-x="right" data-hoffset="460" 
			        data-y="top" data-voffset="360" 
			        data-whitespace="nowrap"
			        data-transform_idle="o:1;" 
			        data-transform_in="o:0" 
			        data-transform_out="o:0" 
			        data-start="1500">
					<a href="#" class="thm-btn inverse">Get Free Quote <i class="fa fa-arrow-right"></i></a>
			    </div>
			</li>-->
		</ul>
	</div>
</section>