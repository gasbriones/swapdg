<form id="contactform" name="contactform" action="javascript:sendmail($('contactform'));">
  <p class="errormessage" id="contacterrormsg"><?php if (!empty($errormessage)) { echo $errormessage; } ?>&nbsp;</p>
  <div class="formfield clearfix">
    <label for="name"><img src="media/contact-name.png" alt="Name" height="15" width="50" /></label><input type="text" id="name" name="name" <?php if (!empty($name)) { echo 'value="'.$name.'"'; } ?>/>
  </div>
  <div class="formfield clearfix">
    <label for="email"><img src="media/contact-email.png" alt="Email" height="15" width="50" /></label><input type="text" id="email" name="email" <?php if (!empty($email)) { echo 'value="'.$email.'"'; } ?>/>
  </div>
  <div class="formfield">
    <textarea name="text"><?php if (!empty($text)) { echo $text; } ?></textarea>
  </div>
  <input type="image" src="media/sendpop.png" alt="Send" id="sendcontact" />
</form>
<script type="text/javascript">
_gaq.push(['_trackEvent', 'Formulario de contacto', 'Acceso al formulario']);
</script>