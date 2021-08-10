<?php

setcookie('auth_admin', '1', time() - 3600, '/');
setcookie('auth_user', '1', time() - 3600, '/');
header("Location: /" );
exit();