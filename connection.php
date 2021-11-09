<?php
$conn = pg_connect("postgres://zmwunuawhfncoa:3cc4307784e2497e90c925bf9b032ab947aa347939d70d422f621668d9ae2827@ec2-35-169-49-157.compute-1.amazonaws.com:5432/d2jvl120enokg6");
	echo 'Connected Successfully!!!';
	if(!$conn)
	{
		die("Could not connect to database");
    }
    ?>