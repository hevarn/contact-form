<?php if (isset($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $errorsArray): ?>
            <div id="general-error" onclick="deleteErrors()">
                <?php foreach ($errorsArray as $errors): ?>
                    <div class="error">
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
<?php unset($_SESSION['errors']); ?>

<h1 class="home-title-up"> PROJET CONTACT </h1>

<script src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>

    
<form method="POST" action="/projet-contact-master/valide" id="form" class="form" name="contact">
    <div class="errors" style="visibility:hidden;">
        <span></span>
    </div>
    <div class="title">
        <h5> INFORMATION CLIENT</h5>
    </div>
    <div class="form-control ">
        <input type="text" name="firstname" id="firstname" placeholder="votre nom et prenom" >
    </div>
    <div class="form-control">
        <input type="email" name="email" id="email" placeholder="votre email">
        <i class="fas fa-check-circle"></i>
		<i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </div>
    <div class="form-control">
        <input type="text" name="phone" id="phone" placeholder="votre telephone">
        <i class="fas fa-check-circle"></i>
		<i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </div>
    <div class="title">
        <h5> NOMBRE DE PASSAGERS</h5>
    </div>
    <div class="form-control select">
        <select name="customer" class="custom-select" id="customer" >
            <option value="">choisir le nombre de passagers</option>
            <option value="1 adultes">1 adulte</option>
            <option value="2 adultes">2 adultes</option>
            <option value="3 adultes">3 adultes</option>
            <option value="4 adultes">4 adultes</option>
        </select>
        <div class="select__arrow"></div>
        <i class="fas fa-check-circle"></i>
		<i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
	</div>
    <div class="title">
        <h5> Y A T'IL DES ENFANTS</h5>
    </div>
    <div>
        <div class="select">
            <div style="display:flex; margin-left: 88px; align-items: baseline;">
                <label style="margin-right:20px"> oui</label>
                <input type="radio" id="childrenSelectYes" name="childrenSelect" value="oui">
            </div>
            <div style="display:flex; margin-left: 88px; align-items: baseline;">
                <label style="margin-right:20px"> non</label>
                <input type="radio" id="childrenSelectNo" name="childrenSelect" value="non">
            </div>
            <i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
        </div>
        <div class="select">
            <select name="nbChildren" id="nbChildren" class="custom-select" style="display:none;">
                <option value="">choisissez le nombre d'enfants</option>
                <option value="1 enfant">1 enfant</option>
                <option value="2 enfant">2 enfants</option>
                <option value="3 enfant">3 enfants</option>
            </select>
            <div class="select__arrow" id="select__arrow" style="display: none;"></div>
        </div>
    </div>
    <div class="title">
        <h5>OBJET DE VOTRE DEMANDE</h5>
    </div>
    <div class="form-control select">
        <select name="choicewhere" id="choicewhere" class="custom-select">
            <option value="">choisissez une formule de transport</option>
            <option value="transfer Gare vers Aeroport">transfert Gare vers Aeroport</option>
            <option value="transfer Aeroport vers Gare">transfert Aeroport vers Gare</option>
            <option value="visite touristique">visite touristique</option>
            <option value="transfer Aeroport vers Centre ville ">transfert Aeroport vers Centre ville </option>
            <option value="transfer Centre ville vers Aeroport">transfert Centre ville vers Aeroport</option>
            <option value="Autre">Autre</option>
        </select>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
        <div class="select__arrow"></div>
        <input style="display:none;" type="text" name="otherchoice" id="otherchoice" placeholder="ecrire votre motif" >
	</div>

    <div class="title">
        <h5> ADDRESSES</h5>
    </div>
    <div class="form-control">
        <input type="text" name="departure" id="departure" placeholder="adresse de  depart" >
        <i class="fas fa-check-circle"></i>
		<i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </div>
    <div class="form-control">
        <input type="text" name="via" id="via" placeholder="via">
        <i class="fas fa-check-circle"></i>
		<i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </div>
    <div class="form-control">
        <input type="text" name="arrival" id="arrival" placeholder=" adresse de destination" >
        <i class="fas fa-check-circle"></i>
		<i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </div>

    <div class="title">
        <h5>date et heure </h5>
    </div>
    <div class="form-control">
        <input type="date" name="date" id="date" placeholder=" choisir une date" min="2018-01-01" max="2040-01-01">
        <i class="fas fa-check-circle"></i>
		<i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </div>
    <div class="form-control">
        <input type="time" name="time" id="time"  placeholder=" choisir une heure" name="appt"min="00:00" max="23:00">
        <i class="fas fa-check-circle"></i>
	    <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </div>
    <div class="title">
        <h5>AJOUTER UNE OBSERVATION </h5>
    </div>
    <div class="form-control select">
        <textarea type="textarea" name="description" id="description" placeholder="ecire votre message" value="je vous contact pour avoir vos tarifs merci de ma rappeler" rows="10" cols="50"></textarea>
        <i class="fas fa-check-circle"></i>
		<i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
    </div>

    <div class="form-control custom-input">
        <input type="submit" id="recaptchaResponce" name="recaptcha-responce" value="envoyer">
    </div>
</form>
<script src="https://www.google.com/recaptcha/api.js?render=6LfzVg4dAAAAACRkqnxFxkNWINPhp4qALKmT8gad"></script>
<script>


</script>
<!-- <div class="container_input">
        <div class="title_input">
            <label class="font_span">pernom</label>
        </div>
        <input type="text" name="lastname" id="lastname" placeholder="votre prenom" >
    </div> -->
