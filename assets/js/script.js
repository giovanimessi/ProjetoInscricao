
$(".port").click(function(){

		var checkbox = $(this).is(":checked");
        console.log(checkbox);

		if (checkbox) {
			$(".lib").show();
		}else{
			$(".lib").hide();
		}

	});


	function formatar(mascara, documento){
		var i = documento.value.length;
		var saida = mascara.substring(0,1);
		var texto = mascara.substring(i);

		if (texto.substring(0,1) != saida){
				  documento.value += texto.substring(0,1);
		}

	  }

	  function idade (){
		  var data=document.getElementById("dtnasc").value;
		  var dia=data.substr(0, 2);
		  var mes=data.substr(3, 2);
		  var ano=data.substr(6, 4);
		  var d = new Date();
		  var ano_atual = d.getFullYear(),
			  mes_atual = d.getMonth() + 1,
			  dia_atual = d.getDate();

			  ano=+ano,
			  mes=+mes,
			  dia=+dia;
		  var idade=ano_atual-ano;

		  if (mes_atual < mes || mes_atual == mes_aniversario && dia_atual < dia) {
			  idade--;
		  }
	  return idade;
	  } 

	  function exibe(i) {

		  document.getElementById(i).readOnly= true;

	  }

	  function desabilita(i){

		   document.getElementById(i).disabled = true;
		  }
	  function habilita(i)
		  {
			  document.getElementById(i).disabled = false;
		  }
		  ///////////////

		  let Validator = {
			handleSubmit: (event) => {
			  event.preventDefault();
			  let send = true;
		  
			  let inputs = form.querySelectorAll('input');
		  
			  Validator.clearErrors();
		  
			  for(let i=0;i<inputs.length;i++) {
				let input = inputs[i];
				let check = Validator.checkInput(input);
				if (check !== true) {
				  send = false;
				  Validator.showError(input, check);
				}
			  }
		  
			  if (send) {
				form.submit();
			  }
			},
			checkInput: (input) => {
			  let rules = input.getAttribute('data-rules');
			  
			  if (rules !== null ) {
				rules = rules.split('|');
				for (let k in rules) {
				  let rDetails = rules[k].split('=');
				  switch (rDetails[0]) {
					case 'required':
					  if (input.value == '') {
						return 'Campo não pode ser vazio.';
					  }
					break;
					case 'min':
					  if(input.value.length < rDetails[1]) {
						return 'Campo tem que ter pelo menos ' +rDetails[1]+ ' caracteres';
					  }
					break;
					case 'email':
					  if (input.value != '') {
						let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
						
						if (!regex.test(input.value.toLowerCase())) {
						  return 'E-mail digitado não é válido!';
						}
					  }
					break;
				  }
				}
			  }
		  
			  return true;
			},
			showError: (input, error) => {
			  input.style.borderColor = '#FF0000';
		  
			  let errorElement = document.createElement('div');
			  errorElement.classList.add('error');
			  errorElement.innerHTML = error;
		  
			  input.parentElement.insertBefore(errorElement, input.ElementSibling);
			},
			clearErrors: () => {
			  let inputs = form.querySelectorAll('input');
			  for(let i=0;i<inputs.length;i++) {
				inputs[i].style = '';
			  }
		  
			  let errorElements = document.querySelectorAll('.error');
			  for (let i=0; i<errorElements.length;i++) {
				errorElements[i].remove();
			  }
			}
		  };
		  
		  let form = document.querySelector('.validator');
		  form.addEventListener('submit', Validator.handleSubmit);
		