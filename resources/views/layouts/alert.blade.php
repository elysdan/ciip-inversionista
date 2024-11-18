
<div class="container">
    <div id="alerta" class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ $status }}
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0"   
 aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>   

</div>

<script>
    window.onload = function() {
        var progressBar = document.querySelector('.progress-bar');
        var width = 0;

        var interval = setInterval(function() {
            width = width + 1;
            progressBar.style.width = width + '%';
            if (width >= 100) {
                clearInterval(interval);
                document.getElementById('alerta').remove();
            }
        }, 30);
    };
</script>
