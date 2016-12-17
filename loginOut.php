<?php
if(setcookie("username", "", time() - 3600))
    echo '<SCRIPT type=text/javascript>alert("注销成功!");location.href="login.htm";</script>';

