<div id="success_popup" class="bg_popup">    
    <div class="popup">        
            <h1>Поздравляем!</h1>
            <p>Вы успешно зарегистрированы!</p>
            <a id="success_btn" href="/enter" class="btn btn-success btn-lg">Войти</a>
    </div>
</div>

<script type="text/javascript">
    let delay_popup = 100;
    let success_popup = document.getElementById('success_popup');
    let success_btn = document.getElementById('success_btn');
    setTimeout(function(){
        success_popup.style.display='flex';
    }, delay_popup);

    success_btn.addEventListener('click', function(){
        success_popup.style.display='none';
    })
</script>  