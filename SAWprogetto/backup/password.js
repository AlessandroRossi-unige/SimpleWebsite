            //Controllo se le password combaciano
            function checkPassword(form) {
				password1 = form.pass.value;
				password2 = form.confirm.value;

                //Se non sono uguali apro un popup
                if (password1 != password2) {
                    alert ("\nPassword did not match: Please try again...")
                    return false;
                }

                else{
                    return true
				}
			}
