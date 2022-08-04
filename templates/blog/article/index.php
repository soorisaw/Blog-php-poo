<div class="container py-5">
	<div class="orderForm">
		<?= $orderByHeadingForm[0];?>
			<?= $orderByHeadingForm[1];?>
			<?= $orderByHeadingForm[2];?>
		<?= $orderByHeadingForm[3];?>
	</div>

	<div class="row d-flex justify-content-around articleIndex">
			
		<?php foreach($articles as $article) { ?>
			<div class="card-deck col-11 col-sm-10 col-md-6  col-xl-4 py-5">
				<div class="card ">
					<img class="card-img-top" src="/<?= ILLUSTRATIONS.'.'.$article->getPicture() ;?>" alt="Card image cap">
					<div class="card-body">
						<h2 class="card-title mb-0"><?= $article->getTitle() ;?></h2>
						<blockquote><?= $article->getHeading();?></blockquote>
						
					</div>
					<div class="card-footer">
						<a href=<?= "article/show/".$article->getId();?> class="btn btn-primary">Lire l'article</a>
					</div>
				</div>
			</div>
			
		<?php } ?>
		
	</div>
	
</div>