
function onClick(e) {
    e.preventDefault();
    grecaptcha.ready(function() {
      grecaptcha.execute('6LfzVg4dAAAAACRkqnxFxkNWINPhp4qALKmT8gad', {action: 'submit'}).then(function(token) {
          document.getElementById('recaptchaResponce').value = token 
      });
    });
  }

$("#nbCustomer").change(function(){
    var value = $("#nbCustomer").val();
    if(value <= 4){

    }
})

$("#choicewhere").change(function(){
var selectvalue=$("#choicewhere").val();
if(selectvalue== "Autre")
{
$("#otherchoice").show();
} else {
$("#otherchoice").hide();
}
});

$('input[type=radio][name=childrenSelect]').on('change', function() {
switch ($(this).val()) {
    case 'oui':
        $("#nbChildren").show();
        $("#select__arrow").show()
        break;
        case 'non':
          $("#nbChildren").hide();
          $("#select__arrow").hide()
    break;
}
});

$(function() {
    $("#form").validate({
      invalidHandler: function(event, validator) {
        // 'this' refers to the form
        var errors = validator.numberOfInvalids();
        if (errors) {
          var message = errors == 1
            ? 'You missed 1 field. It has been highlighted'
            : 'You missed ' + errors + ' fields. They have been highlighted';
          $("#errors").html(message);
          $("#errors").show();
        } else {
          $("#errors").hide();
        }},
      rules: {
        firstname: "required",
        lastname: "required",
        email: {
          required: true,
          email: true
        },
        phone:{
         required: true,
        number: true
        },
        customer: {
            required: true
          },
        choicewhere: {
            required: true
          },
        departure:'required',
        arrival:'required',
        date:'required',
        time:'required',
        description:"required",
        },
      messages: {
          firstname: "veuillez insérer votre nom",
          email: "veuillez insérer une adresse mail valide",
          phone: 'veuillez insérer un numéro de téléphone',
          customer:"veuillez remplir ce champ",
          choicewhere:"veuillez remplir ce champ",
        departure: "veuillez remplir ce champ",
        arrival: "veuillez remplir ce champ",
        date: "veuillez remplir ce champ",
        time: "veuillez remplir ce champ",
        description:"veuillez remplir ce champ"

      },
      submitHandler: function(form) {
        form.submit();
        var firstname = $("#firstname").val();
		var email = $("#email").val();
		var phone = $("#phone").val();
		var customer = $("#customer").val();
		var choicewhere = $("#choicewhere").val();
    var nbChildren = $("#nbChildren")
		var departure = $("#departure").val();
		var arrival = $("#arrival").val();
		var date = $("#date").val();
		var time = $("#time").val();
		var descripton = $("#descripton").val();
 
		 $.ajax({
			  type: "POST",
			  url: "/projet-contact-us-php/valide", // on envoie le tout dans la moulinette php du fichier form-process.php pour l'envoi du departure
			  // data: "firstname=" + firstname + "&email=" + email +"&phone=" + phone +"&customer"+ customer+ "&choicewhere"+ "&nbChildren" + nbChildren+ choicewhere+ "&arrival"+ arrival + "&departure=" + departure + "&date" + date + "&time" + time + "&descripton=" + descripton ,
			  success : function(text){
				  if (text == "success"){ //si c'est ok, applique la fonction formSuccess
					  formSuccess();
				  } 
			  }
		  });
      }
    });
  });
   