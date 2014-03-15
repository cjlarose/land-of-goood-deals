function validateForm(form) {
   var noError = true;
   var errormsg = "";

   var inputName = $("#nameText").val();   
   var inputAdd = $("#addText").val();   
   var inputCity = $("#cityText").val();   
   var inputState = $("#states").val();
   var inputEmail = $("#emailText").val();
   var inputPhone = $("#phoneText").val();
   var inputNext = $("#nextD").is(":checked");
   var inputSec = $("#secD").is(":checked");
   var inputGround= $("#groundD").is(":checked");

   var badName = /[^A-Za-z\s]/;
   var badAdd = /[^0-9A-Za-z\s]/;
   var badCity = /[^A-Za-z]/;
   var goodEmail = /.+@.+\..+/;
   var goodPhone = /\d{3}\-\d{3}\-\d{4}/;

   var isBadName = badName.test(inputName);
   var isBadAdd = badAdd.test(inputAdd);
   var isBadCity = badCity.test(inputCity);
   var isGoodEmail = goodEmail.test(inputEmail);
   var isGoodPhone = goodPhone.test(inputPhone);

   if (inputName === "" || isBadName) {
      errormsg = "Enter an appropriate name.\n";
      noError = false;
   } if (inputAdd === "" || isBadAdd) {
      errormsg = errormsg + "Enter an appropriate address.\n";
      noError = false;
   } if (inputCity === "" || isBadCity) {
      errormsg = errormsg + "Enter an appropriate city.\n";
      noError = false;
   } if (inputState === "") {
      errormsg = errormsg + "Select a state.\n";
      noError = false;
   } if (!isGoodEmail) {
      errormsg = errormsg + "Enter an appropriate email address.\n";
      noError = false;
   } if (inputPhone !== "" && !isGoodPhone) {
      errormsg = errormsg + "If provided, enter an appropriate phone number of the form xxx-xxx-xxxx.\n";
      noError = false;
   } if (!inputNext && !inputSec && !inputGround) {
      errormsg = errormsg + "Select a shipping option.\n";
      noError = false;
   }

   if (!noError) {
      alert(errormsg);
   }

   return noError;
}

$(document).ready(function() {
    $("#shipping-form").submit(function(event) {
        return validateForm(this); 
    });
});
