<?php
echo "欢迎您".($_SESSION['name'] ? $_SESSION['name'] : $_SESSION['email']);
