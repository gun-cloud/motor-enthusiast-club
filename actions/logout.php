<?php
session_start();

session_destroy();

header("Location: /lsp-jwd/index.php");
exit();
