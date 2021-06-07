<!DOCTYPE html>
<html lang="ru">
<head>
    <title>ADMIN | LOGIN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">

</head>
<body>

<div class="limiter" id="app">
    <div class="container-login100">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
            <div class="login100-form validate-form">
            <span class="login100-form-title p-b-55">
                ISaudIT
            </span>
                <input id="token" type="hidden" value="{{csrf_token()}}">
                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="text" id="username" placeholder="Имя пользователя">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
                </div>

                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="password" id="password" placeholder="Пароль">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
                </div>

                <div class="container-login100-form-btn p-t-25">
                    <button type="button" class="login100-form-btn" onclick="login()">
                        Войти
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- jQuery 2.2.4 -->
<script src="/js/jquery.min.js"></script>
<!-- Popper -->
<script src="/js/popper.min.js"></script>
<!-- Bootstrap -->
<script src="/js/bootstrap.min.js"></script>
<!-- All Plugins -->
<script src="/js/confer.bundle.js"></script>
<!-- Active -->
<script src="/js/default-assets/active.js"></script>
<script>
    function login() {
        var username = $('#username').val();
        var password = $('#password').val();
        var _token = $('#token').val();
        if(username == "" || username == null || password == '' || password == null){
            alert('Заполните поля');
            return;
        }

        $.ajax({
            dataType : 'JSON',
            method : 'POST',
            cache : false,
            url : '/login',
            data : {
                _token : _token,
                username : username,
                password : password
            },
            success(data) {
                if(data.success) {
                    location.href = '/';
                }else{
                    alert(data.error);
                }
            },
            error(data) {
                alert(data);
            }
        });
    }
</script>
</html>