<?php 
$token = hash('gost-crypto', random_int(0,999999));
$_SESSION["CSRF"] = $token;
?>

<div class="container mt-5 mb-5 reg_form">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <form method="post">
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control" id="login" name="login">
                    <input type="hidden" name="token" value="<?=$token?>"> <br/>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember_me" value="1">
                    <label class="form-check-label">Запомнить меня</label>
                </div>
                
                <button type="submit" class="btn btn-success">Войти</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="row col-2 mx-auto mt-5">
                <a href="/main" class="btn btn-warning btn-lg">Назад</a>                
        </div>
    </div>
</div>

<?php



?>