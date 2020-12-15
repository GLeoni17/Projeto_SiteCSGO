<?php
function rodape(){
    $desenvolvedor = $GLOBALS["desenvolvedor"];
    echo "
    </main>
    <footer class='footer'>
        <span class='text-muted'> Site desenvolvido por: $desenvolvedor</span>
    </footer>
    </body>
    </html>
    ";
}
?>