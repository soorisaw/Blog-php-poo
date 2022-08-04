<?php

class Form {


	private $formCode = "";

	//***********************************************CREATE**************************************************/
	/**
	 * Générer le formulaire HTML
	 * @return string 
	 */
	public function create()
	{
		return $this->formCode;
	}

	//***********************************************VALIDATE**************************************************/
	/**
	 * Valide si tous les champs proposés sont remplis
	 * @param array $form Tableau contenant les champs à vérifier (en général issu de $_POST ou $_GET)
	 * @param array $fields Tableau listant les champs à vérifier
	 * @return bool 
	 */
	public static function validate(array $form, array $fields)
	{
		// On parcourt chaque champ
		foreach($fields as $field)
		{
			// Si le champ est absent ou vide dans le tableau
			if(!isset($form[$field]) || empty($form[$field])){
			// On sort en retournant false
			return false;
			}
		}
	// Ici le formulaire est "valide"
		return true;
	}

	//***********************************************ADD ATTRIBUTS**************************************************/
	/**
	 * Ajoute les attributs envoyés à la balise
	 * @param array $attributs Tableau associatif ['class' => 'form-control', 'required' => true]
	 * @return string Chaine de caractères générée
	 */
	private function addAttributs(array $attributs): string
	{
		// On initialise une chaîne de caractères
		$str = '';

		// On liste les attributs "courts"
		$courts = ['checked', 'disabled', 'readonly', 'multiple', 'required', 'autofocus', 'novalidate', 'formnovalidate'];

		// On boucle sur le tableau d'attributs
		foreach($attributs as $attribut => $valeur)
		{
			// Si l'attribut est dans la liste des attributs courts
			if(in_array($attribut, $courts) && $valeur == true)
			{
				$str .= " $attribut";
			}
			else
			{
				// On ajoute attribut='valeur'
				$str .= " $attribut=\"$valeur\"";
			}
		}

		return $str;
	}

	//***********************************************FORM START**************************************************/
	/**
	 * Balise d'ouverture du formulaire
	 * @param string $methode Méthode du formulaire (post ou get)
	 * @param string $action Action du formulaire
	 * @param array $attributs Attributs
	 * @return Form 
	 */
	public function formStart(string $action = '#', string $methode = 'post', array $attributs = []): self
	{
		// On crée la balise form
		$this->formCode .= "<form action='$action' method='$methode'";

		// On ajoute les attributs éventuels
		$this->formCode .= $attributs ? $this->addAttributs($attributs).'>*' : '>*';

		return $this;
	}

	//***********************************************FORM CLOSE**************************************************/
	/**
	 * Balise de fermeture du formulaire
	 * @return Form 
	 */
	public function formClose():self
	{
		$this->formCode .= '</form>*';
		return $this;
	}

	//***********************************************ADD LABEL**************************************************/
	/**
	 * Ajout d'un label
	 * @param string $for 
	 * @param string $texte 
	 * @param array $attributs 
	 * @return Form 
	 */
	public function addLabel(string $for, string $texte, array $attributs = []):self
	{
		// On ouvre la balise
		$this->formCode .= "<label for='$for'";

		// On ajoute les attributs
		$this->formCode .= $attributs ? $this->addAttributs($attributs) : '';

		// On ajoute le texte
		$this->formCode .= ">$texte</label>*";

		return $this;
	}

	//***********************************************ADD INPUT**************************************************/
	/**
	 * Ajout d'un champ input
	 * @param string $type 
	 * @param string $nom 
	 * @param array $attributs 
	 * @return Form
	 */
	public function addInput(string $type, string $nom, array $attributs = []):self
	{
		// On ouvre la balise
		$this->formCode .= "<input type='$type' name='$nom'";

		// On ajoute les attributs
		$this->formCode .= $attributs ? $this->addAttributs($attributs).'>*' : '>*';

		return $this;
	}

	//***********************************************ADD TEXTAREA**************************************************/
	/**
	 * Ajoute un champ textarea
	 * @param string $nom Nom du champ
	 * @param string $valeur Valeur du champ
	 * @param array $attributs Attributs
	 * @return Form Retourne l'objet
	 */
	public function addTextarea(string $nom, string $valeur = '', array $attributs = []):self
	{
		// On ouvre la balise
		$this->formCode .= "<textarea name='$nom'";

		// On ajoute les attributs
		$this->formCode .= $attributs ? $this->addAttributs($attributs) : '';

		// On ajoute le texte
		$this->formCode .= ">$valeur</textarea>*";

		return $this;
	}

	//***********************************************ADD SELECT**************************************************/
	/**
	 * Liste déroulante
	 * @param string $nom Nom du champ
	 * @param array $options Liste des options (tableau associatif)
	 * @param array $attributs 
	 * @return Form
	 */
	public function addSelect(string $nom, array $options, array $attributs = []):self
	{
		// On crée le select
		$this->formCode .= "<select name='$nom'";

		// On ajoute les attributs
		$this->formCode .= $attributs ? $this->addAttributs($attributs).'>' : '>';

		// On ajoute les options
		foreach($options as $valeur => $texte){
			$this->formCode .= "<option value='$valeur'>$texte</option>";
		}

		// On ferme le select
		$this->formCode .= '</select>*';

		return $this;
	}

	//***********************************************ADD BUTTON**************************************************/
	/**
	 * Ajoute un bouton
	 * @param string $texte 
	 * @param array $attributs 
	 * @return Form
	 */
	public function addButton(string $texte, array $attributs = []):self
	{
		// On ouvre le bouton
		$this->formCode .= '<button ';

		// On ajoute les attributs
		$this->formCode .= $attributs ? $this->addAttributs($attributs) : '';

		// On ajoute le texte et on ferme
		$this->formCode .= ">$texte</button>*";

		return $this;
	}

	//***********************************************REGISTER FORM**************************************************/
	/**
	 * registerForm
	 *
	 * @return void
	 */
	public function registerForm()
	{
		// On instancie le formulaire
		//$form = new Form;

		// On ajoute chacune des parties qui nous intéressent
		$this->formStart('/blog/register', 'post')

			->addInput('text', 'lastname', 
				[
					'required' => true,
					'id' => 'lastname', 
					'class' => 'form-control',
					'placeholder' => 'Nom', 
					'pattern' => '([A-Za-zÄäÇçÉéÈèÏï]{1}[a-zäçéèï]{1,15}[ \'-]?){1,2}'					
				]
			)

			->addInput('text', 'firstname', 
				[
					'required' => true,
					'id' => 'firstname', 
					'class' => 'form-control',
					'placeholder' => 'Prénom', 
					'pattern' => '([A-Za-zÄäÇçÉéÈèÏï]{1}[a-zäçéèï]{1,15}[ \'-]?){1,2}'					
				]
			)

			->addInput('date', 'birthday', 
				[
					'required' => true,
					'id' => 'birthday', 
					'class' => 'form-control'					
				]
			)

			->addInput('email', 'email', 
				[
					'required' => true,
					'id' => 'email', 
					'class' => 'form-control',
					'placeholder' => 'Email', 
					'pattern' => '[a-z0-9._-]{2,30}@[a-z0-9.-]{2,30}\.[a-z]{2,4}$'					
				]
			)
			
			->addInput('text', 'pseudo', 
				[
					'required' => true,
					'id' => 'pseudo', 
					'class' => 'form-control',
					'placeholder' => 'Pseudo', 
					'pattern' => '([A-Za-zÄäÇçÉéÈèÏï]{1}[a-zäçéèï]{1,15}[ \'-]?){1,2}'					
				]
			)

			->addInput('password', 'passwrd', 
				[
					'required' => true,
					'id' => 'passwrd', 
					'class' => 'form-control',
					'placeholder' => 'Mot de passe :'					
				]
			)
			
			->addInput('password', 'passwrdBis', 
				[
					'required' => true,
					'id' => 'passwrdBis', 
					'class' => 'form-control',
					'placeholder' => 'confirmation mot de passe :'				
				]
			)			


			->addInput('submit', 'sending', 
				[ 
					'class' => 'btn btn-info btn-block rounded-0 py-2',
					'value' => "S'inscrire"				
				]
			)			

			->formClose()
		;

	}

	//***********************************************LOGIN FORM**************************************************/
	/**
	 * loginForm
	 *
	 * @return void
	 */
	public function loginForm()
	{
		$this->formStart('/blog/connect', 'post')
			->addLabel('emailLog', 'Email')
			->addInput('email', 'emailLog', 
					[
						'required' => true,
						'id' => 'emailLog', 
						'class' => 'form-control',
						'placeholder' => 'email@exemple.com', 
						'pattern' => '[a-z0-9._-]{2,30}@[a-z0-9.-]{2,30}\.[a-z]{2,4}$'					
					]
			)
			->addLabel('passwrdLog', 'password')
			->addInput('password', 'passwrdLog', 
					[
						'required' => true,
						'id' => 'passwrdLog', 
						'class' => 'form-control',
						'placeholder' => 'Mot de passe', 					
					]
			)			

			->addInput('submit', 'sending', 
				[ 
					'class' => 'btn btn-info btn-block rounded-0 py-2',
					'value' => "Se connecter"				
				]
			)			

			->formClose()
		;
				
	}

	//***********************************************LOGOUT FORM**************************************************/
	public function logoutForm()
	{
		$this->formStart('/blog/disconnect', 'post', 
			[
				'class' => 'dropdown-item'
			]
		)
			->addInput('hidden', 'disconnect', [])
			->addButton('Déconnexion', ['class' => 'btn btn-default'])		
			->formClose()
		;
	}

	//***********************************************CONTACT FORM**************************************************/
	public function contactForm()
	{
		$this->formStart('/home/contact', 'post')

			->addInput('text', 'nom', 
				[
					'required' => true,
					'id' => 'nom', 
					'class' => 'form-control',
					'placeholder' => 'Nom', 
					'pattern' => '([A-Za-zÄäÇçÉéÈèÏï]{1}[a-zäçéèï]{1,15}[ \'-]?){1,2}'					
				]
			)

			->addInput('text', 'prenom', 
				[
					'required' => true,
					'id' => 'prenom', 
					'class' => 'form-control',
					'placeholder' => 'Prénom', 
					'pattern' => '([A-Za-zÄäÇçÉéÈèÏï]{1}[a-zäçéèï]{1,15}[ \'-]?){1,2}'					
				]
			)

			->addInput('email', 'email', 
				[
					'required' => true,
					'id' => 'email', 
					'class' => 'form-control',
					'placeholder' => 'Email', 
					'pattern' => '[a-z0-9._-]{2,30}@[a-z0-9.-]{2,30}\.[a-z]{2,4}$'					
				]
			)

			->addTextarea('comment', '',
				[
					'required' => true,
					'id' => 'comment', 
					'class' => 'form-control',
					'minlenght' => '20', 
					'maxlenght' => '1000', 
					'row' => '5'					
				]
			)
			
			->addButton('Envoyez', 
				[
					
				]
			)


		->formClose()
		;
	}

	//***********************************************TOPIC FORM**************************************************/
	public function topicForm()
	{
		$this->formStart('/forum/newtopic', 'post')
			->addInput('text', 'titleTopic', 
				[
					'required' => true,
					'id' => 'titleTopic', 
					'class' => 'form-control',
					'placeholder' => 'Titre du nouveau sujet'	
				]
			)

			->addTextarea('newcom', '',
				[
					'required' => true,
					'id' => 'newcom', 
					'class' => 'form-control',
					'cols' => '110', 
					'rows' => '10'					
				]
			)	

			->addButton('Créer')		
		->formClose()
		;
	}

	//********************************************TOPIC COMMENT FORM*******************************************/
	public function topicCommentForm()
	{
		$this->formStart($_SERVER['REQUEST_URI'], 'post')

			->addTextarea('newcom', '',
				[
					'required' => true,
					'id' => 'newcom', 
					'class' => 'form-control',
					'cols' => '110', 
					'rows' => '10'					
				]
			)	

			->addButton('Créer')		
		->formClose()
		;
	}

	//********************************************UPDATE PROFIL FORM*******************************************/
	public function updateProfilForm()
	{
		$this->formStart('/blog/profil', 'post', ['enctype'=>"multipart/form-data"])
			
			->addLabel('file', 'changer votre avatar')
			->addInput('file', 'file')
			->addButton('Enregistrer')

		->formClose()
		;

		$this->formStart('/blog/profil', 'post')

			->addInput('email', 'emailUp', 
				[
					'required' => true,
					'id' => 'emailUp', 
					'class' => 'form-control',
					'placeholder' => 'Email', 
					'pattern' => '[a-z0-9._-]{2,30}@[a-z0-9.-]{2,30}\.[a-z]{2,4}$'
									
				]
			)
			
			->addInput('password', 'passwrdUp', 
				[
					'required' => true,
					'id' => 'passwrdUp', 
					'class' => 'form-control',
					'placeholder' => 'Mot de passe :'					
				]
			)
			
			->addInput('password', 'passwrdUpBis', 
				[
					'required' => true,
					'id' => 'passwrdUpBis', 
					'class' => 'form-control',
					'placeholder' => 'confirmation mot de passe :'				
				]
			)	
			
			->addInput('submit', 'sending', 
				[ 
					'value' => "Modifier"				
				]
			)		

		->formClose()
		;

		$this->formStart('/blog/deleteUser', 'post')

			->addInput('hidden', 'deleteUser', ['id'=>'deleteUser'])
			->addInput('submit', 'deleteUser', ['value' => 'supprimer compte'])						

		->formClose()
		;

	}
	//********************************************ORDER BY (article)*******************************************/

	public function orderByHeadingForm()
	{


		$this->formStart('/article/heading', 'post', ['id' => 'headingForm'])
			
			->addLabel('heading', 'Trier par:')
			->addSelect('heading', 
				[
					'Rubrique' => '',
					'date' => 'date',
					'culture' => 'culture',
					'news' => 'news',
					'tuto' => 'tuto'
				],
				[
					'id' => 'heading',
					'onChange' => "document.getElementById('headingForm').submit();"
				])

		->formClose();

	}


}