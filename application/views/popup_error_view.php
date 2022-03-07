<div id="error_popup" class="bg_popup">    
    <div class="popup">        
            <h3>Ошибка!</h3>
            <p>Некоректные данные!</p>
            <a id="error_btn" href="/enter" class="btn btn-danger btn-lg">Попробовать снова</a>
    </div>
</div>

<script type="text/javascript">
    let delay_popup = 100;
    let error_popup = document.getElementById('error_popup');
    let error_btn = document.getElementById('error_btn');
    setTimeout(function(){
        error_popup.style.display='flex';
    }, delay_popup);

    error_btn.addEventListener('click', function(){
        error_popup.style.display='none';
    })
</script>  