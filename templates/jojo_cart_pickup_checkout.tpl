<div class="box">
<form action="{$SECUREURL}/cart/process/{$token}/" method="post">
  <input type="hidden" name="handler" value="pickup" />
  <h3>Pay upon pickup</h3>
  <p>Payment can be made when collecting your order. To confirm the order and receive further pickup instructions, press 'continue'.</p>
  <input type="submit" name="submit" class="button" value="Continue" />
  <div class="clear"></div>
</form>
</div>