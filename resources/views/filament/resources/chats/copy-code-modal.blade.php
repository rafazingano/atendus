<div>
    <p>Copie o código abaixo e cole-o no seu site:</p>
    <pre><code id="scriptCode">{{ $scriptCode }}</code></pre>
    <button onclick="copyToClipboard()">Copiar Código</button>
</div>

<script>
    function copyToClipboard() {
        var code = document.getElementById("scriptCode").innerText;
        navigator.clipboard.writeText(code).then(function() {
            alert('Código copiado com sucesso!');
        });
    }
</script>
