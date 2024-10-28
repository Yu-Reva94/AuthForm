<?php
if (isset($errMsg) && count($errMsg) > 0) {
    foreach ($errMsg as $err)
        return $err;
}


