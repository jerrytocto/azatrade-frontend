<?php
session_start();
session_destroy();
session_unset();

print "<script>window.location='./';</script>";	

	?>