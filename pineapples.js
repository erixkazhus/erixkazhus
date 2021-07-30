

function validateForm()
{
  var text = document.forms["testForm"]["email"].value,
	regX;

  if (text == '') {
   alert('E-mail address is required.');
   return false; }
  else if (typeof(RegExp) == 'function') {
   regX = new RegExp('^([a-zA-Z0-9\\-\\.\\_]+)(\\@)([a-zA-Z0-9\\-\\.]+)(\\.)([a-zA-Z]{2,4})$');
   
   if (!regX.test(text)) {
	  alert('Please provide a valid e-mail address.');
	  return false; };
	  
	regX = new RegExp('(.co)$');
   if (regX.test(text)) {
	  alert('We are not accepting subscriptions from Colombia emails.');
	  return false; };
}
  if(!document.testForm.agree.checked){
  alert("You must accept the terms and conditions")
  return false;

}
  return true;
}


	  
 


