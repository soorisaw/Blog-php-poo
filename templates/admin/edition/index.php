<?php 
    $headTitle = 'WebSmartSolution | Edition';
    $descriptionMeta = 'Créer son site web, créer son site e-commerce, un blog wordpress, amélioré son référencement sur les moteurs de recherche. L\'agence web smart solution, vous accompagne dans la réalisation de votre projet numérique.';
    $scriptJs = "/js/tinymce.js";
?>


<div class="container py-5">

	<h1>Edition</h1>

	<form action="/admin/savearticle" method="post" enctype="multipart/form-data">
		<div class="d-flex justify-content-center">
		
			<p class="mr-2">Rubrique :</p>

			<div>
				<input type="radio" id="news" name="heading" value="news" checked>
				<label for="news">News</label>
			</div>
				
			<div class="mx-3">
				<input type="radio" id="tuto" name="heading" value="tuto">
				<label for="tuto">Tuto</label>
			</div>
				
			<div>
				<input type="radio" id="culture" name="heading" value="culture">
				<label for="culture">Culture</label>
			</div>

		</div>

		<div class="form-group">
			<label for="title" class="control-label">Titre de votre article :</label>
			<input type="text" id="title" name="title">
		</div>

		<div class="form-group">
			<label for="file" class="control-label">Photo de votre article :</label>
			<input type="file" id="file" name="file">
		</div>
		
		<div class="form-group">
			<label for="wysiwyg" class="control-label">Rédiger votre article:</label>
			<textarea id="wysiwyg" name="wysiwyg"></textarea>
		</div>
		
		<input type="submit" value="Enregistrer" class="btn btn-primary">
		
	</form>


	<a href="/article/showarticle" class="nav-link">DEMO</a>

</div>