<?php
?>

<div class="content">
	<div class="block-auth" name="item-auth" id="item-auth">
		<form method="post" name="signup-form" class="form-login" action="check_in.php" id="form-auth">
			<div class="form-element head">Введите логин/пароль</div>
			<div class="form-element">
				<label>Имя пользователя</label>
				<input type="text" name="username" pattern="[a-zA-Z0-9]+" required placeholder="Jim7"/>
			</div>
			<div class="form-element">
				<label>Пароль</label>
				<input type="password" name="password" required placeholder="111"/>
			</div>
			<button type="submit" name="btn_login" value="login">Вход</button>
		</form>
	</div>

	<div class="error" id="error"></div>
</div>

<script src="check_in.js"></script>

