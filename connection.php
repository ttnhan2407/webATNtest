s<?php
$conn = pg_connect("postgres://jgiicmvuezdkev:e168a1fefea8b1a56626b3f906c3a961771200a0dc356a0ac31fc730bc5d4883@ec2-52-201-72-91.compute-1.amazonaws.com:5432/d335mhji1gt2gt");
	echo 'Connected Successfully!';
	if(!$conn)
	{
		die("Could not connect to database");
    }
    ?>