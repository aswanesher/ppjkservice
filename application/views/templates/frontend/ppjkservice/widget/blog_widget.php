<section class="latest-blog sec-padding">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span>latest Blog</span></h2>
		</div>
		<div class="row">
			<?php foreach ($blogw as $rblog) { ?>
			<div class="col-md-6">
				<div class="single-blog-post img-cap-effect">
					<div class="img-box">
						<img src="<?php echo $rblog->post_image;?>" alt="Awesome Image"/>
						<div class="img-caption">
							<div class="box-holder">
								<ul>
									<li><a href="#"><i class="fa fa-link"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="content-box">
						<a href="#"><h3><?php echo $rblog->post_title;?></h3></a>
						<p>
						<?php 
                        // strip tags to avoid breaking any html
                        $string = strip_tags($rblog->post_content);

                        if (strlen($string) > 100) {

                            // truncate string
                            $stringCut = substr($string, 0, 100);

                            // make sure it ends in a word so assassinate doesn't become ass...
                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <br><br>
                            	<a href="'.base_url().'judulberita/'.$rblog->permalink.'" class="thm-btn">Read More <i class="fa fa-arrow-right"></i></a>'; 
                        }
                        echo $string;
                        ?>
                        </p>
					</div>
				</div>
			</div>
			<?php } ?>
			<!--<div class="col-md-6">
				<div class="single-blog-post img-cap-effect">
					<div class="img-box">
						<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/blog/2.jpg" alt="Awesome Image"/>
						<div class="img-caption">
							<div class="box-holder">
								<ul>
									<li><a href="#"><i class="fa fa-link"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="content-box">
						<div class="date">
							<span>02</span>/DEC
						</div>
						<a href="#"><h3>Heading of Blog</h3></a>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa nt ium doloremque laudantium tota.</p>
						<a href="#" class="thm-btn">Read More <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>-->
		</div>
	</div>
</section>