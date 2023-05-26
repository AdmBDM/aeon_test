let form = document.querySelector('#form-auth');
let error = document.getElementById('error');
let field_name = document.querySelector('input[name="username"]');
let field_pass = document.querySelector('input[name="password"]');
let button = document.querySelector('input[name="btn_login"]');
let max_error = 5;

// формируем список куков
function get_cookie() {
	return document.cookie.split('; ').reduce((acc, item) => {
		const [name, value] = item.split('=')
		acc[name] = value
		return acc
	}, {})
}

function block_form() {
	error.innerHTML = 'Превышено количество ошибочных попыток!\n' + 'Доступ временно заблокирован.'
	field_name.disabled = true;
	field_pass.disabled = true
	button.disabled = true;
}

form.addEventListener('submit', function(evt) {
	evt.preventDefault();

	// простая защита от брутфорса
	const cookies = get_cookie();
	if (typeof(cookies.gard_bf) != 'undefined') max_error = cookies.gard_bf;
	console.log(max_error);
	console.log(typeof(max_error));
	if (max_error <= 0) {
		block_form();
		exit;
	}

	let formData = {
		username: field_name.value,
		password: field_pass.value
	};

	let request = new XMLHttpRequest();

	request.addEventListener('load', function () {
		// В этой части кода можно обрабатывать ответ от сервера
		resp = request.responseText.substring(1);
		if (resp === '1') {
			document.cookie = 'gard_bf=;max-age=1';		// сбрасываем счётчик ошибок
			document.location.reload();
		} else {
			document.cookie = 'gard_bf=' + (--max_error) + ';max-age=3600;';
			error.innerHTML = "Пара Логин/Пароль не зарегистрирована!\nОсталось попыток - " + max_error;
			exit;
		}
	});

	request.open('POST', 'check_in.php', true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
	request.send('username=' + encodeURIComponent(formData.username)
		+ '&password=' + encodeURIComponent(formData.password));

});