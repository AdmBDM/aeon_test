

<div class="content">
	<div class="block-success" id="item-success">
		<h2>Вы успешно авторизованы!</h2>
	</div>

	<div class="block-info" id="item-info">
		<div class="info-content">
			<div class="info-block">
				<h2>Информация о пользователе</h2>
				<div class="data_item"><img src="images/<?= $_SESSION['user_data']['photo']; ?>" alt="no-image"></div>
				<div class="data_item">
					<div class="data_item_left">Имя</div>
					<div class="data_item_right"><?= $_SESSION['user_data']['username']; ?></div>
				</div>
				<div class="data_item">
					<div class="data_item_left">Дата рождения</div>
					<div class="data_item_right"><?= date('d.m.Y', strtotime($_SESSION['user_data']['birthday'])); ?></div>
				</div>
				<div class="data_item">
					<div class="data_item_left">E-mail</div>
					<div class="data_item_right"><?= $_SESSION['user_data']['email']; ?></div>
				</div>
				<div class="data_item"><?= $_SESSION['user_data']['is_admin'] ? 'Администратор' : ''; ?></div>
			</div>
		</div>
	</div>

	<button id="btn_logout">Выход</button>
</div>

<script>
	function logout() {
		console.log('Выходим');
		document.location = 'logout.php';
	}

	setTimeout(function(){
		document.getElementById('item-success').style.display = 'none';
	}, 10000);

	document.getElementById('btn_logout').addEventListener('click', logout, false);
</script>
