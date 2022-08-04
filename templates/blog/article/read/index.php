<div class="container body-show my-5">

	<section class="showBanner">
		<h1><?= $article->getTitle();?></h1>

		<div class="row mx-auto showBanner__img">
			<img src="/<?= ILLUSTRATIONS.'.'.$article->getPicture() ;?>" alt="" >
		</div>
			
		<blockquote class="lead">
			<?=  $article->getHeading(); ?>
		</blockquote>
			
		<hr class="my-4">
	</section>

	<section>
		<?= $article->getWysiwyg();?>
	</section>
</div>