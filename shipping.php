<?php
$title = "Shipping Information";
$description = "Information about shipping quality merchandise";
include('header.php');
?>
<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/form_validation.js"></script>
<h2>Shipping Information</h2>
<form action="total.html" method="GET" id="shipping-form">
   <fieldset class="ship">
      <legend>Shipping Information</legend>
      <label class="shiplabel" for="nameText">Name</label>
      <input type="text" name="nameText" value="" id="nameText" /><br />
      <label class="shiplabel" for="addText">Address</label>
      <input type="text" name="addText" value="" id="addText" /><br />
      <label class="shiplabel" for="cityText">City</label>
      <input type="text" name="cityText" value="" id="cityText" /><br />
      <label class="shiplabel" for="states">State</label>
      <select name="state" id="states">
         <option value="AZ">Arizona</option>
         <option value="GA">Georgia</option>
         <option value="SC">South Carolina</option>
      </select><br />
      <label class="shiplabel" for="emailText">Email</label>
      <input type="text" name="emailText" value="" id="emailText" /><br />
      <label class="shiplabel" for="phoneText">Phone</label>
      <input type="text" name="phoneText" value="" id="phoneText" /><br />
      <div id="shipinput">
         <input type="radio" name="date" value="next" id="nextD" />
         <label for="nextD">Next Day</label><br />
         <input type="radio" name="date" value="sec" id="secD" />
         <label for="secD">Second Day</label><br />
         <input type="radio" name="date" value="ground" id="groundD" />
         <label for="groundD">Ground</label><br />
      </div>
      <input type="submit" value="Submit" class="button-primary" onclick="return validateForm();" />
   </fieldset>
</form>
<?php
include('footer.php');
?>
