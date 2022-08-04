<?php 
    $headTitle = 'WebSmartSolution créer un site web, site internet, site vitrine, e-commerce, wordpress, SEO.';
    $descriptionMeta = 'WebSmartSolution l\'agence web spécialisée dans la création de site web : site vitrine, site e-commerce, blog wordpress, optimisation SEO. Vous accompagne dans la réalisation de vos projets numériques.';
?>

	<div class="container-fluid py-5 body-contact">
		<div class="container-fluid hero-contact">
			<div class="row img-contact d-flex justify-content-center">		
				<h1 class="title-contact mx-auto york2">Contact</h1>
			</div>	
			<div class="row img-contact d-flex justify-content-center">		
				<img src="/assets/img/contact.svg" class="img-fluid" alt="logo web smart solution"/>
			</div>
		</div>
			<div class="container contact">
			<div class="row">
				<div class="col-lg-3 contact__speech">
					<div class="contact-info pb-5">
						<p><i class="fas fa-envelope fa-5x"></i></p>
						<h2>Contactez-Nous</h2>
						<h4>Nous sommes à Votre service !</h4>
					</div>
					<div class="mt-5 contact__img">
						<img src="/assets/img/logo-black.png" alt="logo web smart solution" width= 100% height= auto/>
					</div>
				</div>

				<div class="col-lg-9 py-2 contact__form text-white">
					<div class="contact-form">
						<?= $contactForm[0]; ?>
							<div class="form-group">
								<label class="control-label col-sm-2" for="prenom">Prénom:</label>
								<div class="col-sm-10">          
									<?= $contactForm[2]; ?>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="nom">Nom:</label>
								<div class="col-sm-10">          
									<?= $contactForm[1]; ?>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="email">Email:</label>
								<div class="col-sm-10">
									<?= $contactForm[3]; ?>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="comment">Message:</label>
								<div class="col-sm-10">
									<?= $contactForm[4]; ?>
								</div>
							</div>
							<div class="form-group contact__btn">        
								<div class="col-sm-offset-2 col-sm-10">
									<?= $contactForm[5]; ?>
								</div>
							</div>
						<?= $contactForm[6]; ?>
					</div>
				</div>
			</div>
		</div>
	</div>