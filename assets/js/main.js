$(document)//select the document
.on("submit",".registerForm",function(event){//when form with className '.registerForm' is submitted do whatever is inside the function

	event.preventDefault();//prevent the default behaviour after form submision



	var __form__ = $(this);//the form is assigned to the variable __form__


	var __errorText__ = $(".errorText",__form__);



	var dataObject = {//create a dataObject object to hold the values of different fields of the form
		email : $("input[name='email']",__form__).val(),
		username : $("input[name='username']",__form__).val(),
		password : $("input[name='password']",__form__).val(),
		phoneno : $("input[name='phoneno']",__form__).val()
	};

//form validiation

	if(dataObject.password.length<8){

		__errorText__.text("Password must be greater than or equal to 8 characters").show();
		return false;
	}else if(dataObject.phoneno.length<10){
		__errorText__.text("Please enter a valid mobile number").show();
		return false;
	}




	
	__errorText__.hide();


//ajax part

	$.ajax(
	{
		type: 'POST',
		url: '/learnexa/ajax/registerAjax.php',
		data : dataObject,
		dataType: 'json',
		async:true
	}
		)
	.done(
		function ajaxDone(data){
			console.log(data);

			if(data.redirect !==undefined){
				window.location = data.redirect;
			}
			
			else if(data.error != undefined){
				__errorText__.html(data.error).show();
			}
		}

		)
	.fail(
		function ajaxFailed(e){
			console.log(e);
		}
		)
	.always(
		function ajaxAlwaysDoThis(data){
			console.log('Always');
		}
		)

	return false;//prevent the page to go to another page when form is submitted
}).on("submit",".loginForm",function(event){//when form with className '.registerForm' is submitted do whatever is inside the function

	event.preventDefault();//prevent the default behaviour after form submision



	var __form__ = $(this);//the form is assigned to the variable __form__


	var __errorText__ = $(".errorText",__form__);



	var dataObject = {//create a dataObject object to hold the values of different fields of the form
		email : $("input[name='email']",__form__).val(),
		
		password : $("input[name='password']",__form__).val()
		
	};

//form validiation

	if(dataObject.password.length<8){

		__errorText__.text("Password must be greater than or equal to 8 characters").show();
		return false;
		}
	




	
	__errorText__.hide();


//ajax part

	$.ajax(
	{
		type: 'POST',
		url: '/learnexa/ajax/loginAjax.php',
		data : dataObject,
		dataType: 'json',
		async:true
	}
		)
	.done(
		function ajaxDone(data){
			console.log(data);

			if(data.redirect !==undefined){
				window.location = data.redirect;
			}
			
			else if(data.error != undefined){
				__errorText__.html(data.error).show();
			}
		}

		)
	.fail(
		function ajaxFailed(e){
			console.log(e);
		}
		)
	.always(
		function ajaxAlwaysDoThis(data){
			console.log('Always');
		}
		)

	return false;//prevent the page to go to another page when form is submitted
})


