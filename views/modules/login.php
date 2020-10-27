<form id="login" action="../models/login.php" method="post">
<input type="hidden" name="action" value="login">

<div class="field-wrap">
    <label>
        Usuario<span class="req">*</span>
    </label>
    <input type="text" required autocomplete="off" name="user" />
</div>

<div class="field-wrap">
    <label>
        Contraseña<span class="req">*</span>
    </label>
    <input type="password" required autocomplete="off" name="password" />
</div>




<input type="submit" value="Iniciar" class="button button-block">



</form>