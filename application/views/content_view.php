<div class="container mt-5 mb-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-8 pb-3 content">
            <div class="col-4 m-3 text-center">
                <div class="<?php
                // если не находим в сессии токен авторизации вк
                    if(!isset($_SESSION['vk_token'])){
                        // добавляем класс скрывающий картинку
                        echo "image_question";
                    }
                ?>">
                    <img src="application/img/side_cat.jpg" alt="image" class="img-fluid img-thumbnail ">     
                </div>        
                <p>Это изображение доступно только пользователям VK</p>
            </div>
            <div class="">
                <h4>Здесь текст, который видят все авторизированные пользователи</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero doloremque minus amet ea optio reprehenderit, impedit voluptate placeat laudantium repudiandae id? Sed porro facere optio perferendis exercitationem numquam vel? Culpa.
                Cum, facere itaque fugit error repellendus assumenda tempora reprehenderit dolorum incidunt nisi deserunt consectetur harum eius vel, molestias nemo repudiandae nesciunt illum odit dolorem fuga voluptas sed? Harum, laboriosam aut!</p>
            </div> 
        </div>                                     
    </div>
    <div class="row mx-auto mt-5 justify-content-center">                 
                <div class="col-2">
                    <a href="/main" class="btn btn-success btn-lg">На главную</a>
                </div>
                <div class="col-2">
                    <form action="<?php
                    setcookie('remember_token', $remember_me_token, time() + 0, "/");
                    setcookie('auth', 'authorized', time() + 0, "/");
                    ?>">
                        <a href="/main" type="submit" class="btn btn-danger btn-lg">Выйти</a>
                    </form> 
                </div>               
        </div>
    </div>
</div>