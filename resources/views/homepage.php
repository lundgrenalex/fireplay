<?php Views::get('assets.header'); ?>

<header>
	<nav>
		<a href="#homepage">Homepage</a>
	</nav>
</header>

<section>
	<div class="container">
		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<?php echo $document; ?>			
				</div>
			</div>
		</div>
	</div>
</section>

<?php Views::get('assets.footer'); ?>