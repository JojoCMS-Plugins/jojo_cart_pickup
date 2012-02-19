<div class="box">
<form action="{$SECUREURL}/cart/process/{$token}/" method="post">
  <input type="hidden" name="handler" value="manual_payment" />
  <h3>Offline payment</h3>
  <p>The order will be dispatched once payment has been made. To confirm the order and receive payment instructions, press 'continue'.</p>
  <input type="submit" name="submit" class="button" value="Continue" />
  <div class="clear"></div>
</form>
</div>