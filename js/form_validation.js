function validateForm(form) {
   var noError = true;
   var errormsg = "";

   var inputName = $("#nameText").val();   
   var inputAdd = $("#addText").val();   
   var inputCity = $("#cityText").val();   
   var inputState = $("#states").val();
   var inputEmail = $("#emailText").val();
   var inputPhone = $("#phoneText").val();
   var inputNext = $("#nextD").val();
   var inputSec = $("#secD").val();
   var inputGround= $("#groundD").val();

   var badName = newRegExp("[^A-Za-z\s]");
   var badAdd = newRegExp("[^0-9A-Za-z\s]");
   var badCity = newRegExp("[^A-Za-z]");
   var goodEmail = newRegExp(".+@.+\..+");
   var goodPhone = newRegExp("\d{3}-\d{3}-\d{4}");

   var isBadName = badName.test(inputName);
   var isBadAdd = badAdd.test(inputAdd);
   var isBadCity = badCity.test(inputCity);
   var isGoodEmail = goodEmail.test(inputEmail);
   var isGoodPhone = goodPhone.test(inputPhone);

   if (inputName == null || isBadName) {
      errormsg = "Enter an appropriate name.\n";
      noError = false;
   } if (inputAdd == null || isBadAdd) {
      errormsg = errormsg + "Enter an appropriate address.\n";
      noError = false;
   } if (inputCity == null || isBadCity) {
      errormsg = errormsg + "Enter an appropriate city.\n";
      noError = false;
   } if (inputState == null) {
      errormsg = errormsg + "Select a state.\n";
      noError = false;
   } if (!isGoodEmail) {
      errormsg = errormsg + "Enter an appropriate email address.\n";
      noError = false;
   } if (inputPhone != null && !isGoodPhone) {
      errormsg = errormsg + "If provided, enter an appropriate phone number.\n";
      noError = false;
   } if (inputNext == null && inputSec == null && inputGround == null) {
      errormsg = errormsg + "Select a shipping option.\n";
      noError = false;
   }

   if (!noError) {
      alert(errormsg);
   }

   return noError;
}

$("#shipping-form").submit(function(event) {
   return validateForm(this); 
});
