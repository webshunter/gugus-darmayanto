<?php
	$this->load->view("template/header");
	$this->load->view("template/navbar");
?>
<style>

	#hero{
		background-image: url('<?=base_url(cek(Perusahaans::get(),'bg'))?>');
	}

	.img-x{
		width: 100% !important;
		float: left;
		margin: 10px;
	}


</style>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

	<div class="container">
		<div class="row">
			<div class="col-lg-7 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
				<h1><?= cek(Perusahaans::get(),'nama')?></h1>
				<h2>Fullstack Web Developer</h2>
			</div>
		</div>
	</div>

</section><!-- End Hero -->

<main id="main">
	<!-- ======= Services Section ======= -->
	<section id="services" class="services section-bg">
		<div class="container">

			<div class="section-title">
				<h2>Skill</h2>
			</div>
			<div class="row">
			<?php foreach ($this->db->query("SELECT * FROM service")->result() as $key => $srv) : ?>
				<div class="col-lg-4 col-md-6">
					<div class="icon-box">
						<div style="width: 100px;" class="icon">
							<img width="50px" style="margin-left: 30px;margin-right: 16px;" src="<?= base_url('assets/images.png') ?>" style="color: #ff689b;"/>
						</div>
						<h4 class="title"><a href=""><?= $srv->title ?></a></h4>
						<p class="description"><?= htmlspecialchars_decode($srv->des); ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div id="top-artikel">
				<center>
				  <h2>Portofolio</h2>
				</center>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<div class="row" id="artikel">
					</div>
					<div id="pagination">
					</div>
				</div>
			</div>
		</div>
	</section>
</main><!-- End #main -->
<?php
$this->load->view("template/footer.php")
?>
