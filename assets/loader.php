<?php
// Comment out loading outputs
echo ('<!--');


// Load functions (also loads variables & secrets)
require_once $_SERVER['DOCUMENT_ROOT']."/assets/elements/functions.php";
include_once $_SERVER['DOCUMENT_ROOT']."/assets/elements/secrets.php";

echo("Loaded ".$_SERVER['PHP_SELF'].PHP_EOL);


echo ('-->');
