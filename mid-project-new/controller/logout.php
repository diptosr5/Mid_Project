<?php

setcookie('STATUS', 'done', time() - 3600, '/');
header('location: ../views/login.html');
