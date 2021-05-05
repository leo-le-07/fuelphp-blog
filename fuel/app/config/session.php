<?php
return
    array(
        'driver'    => 'db',
        'db'			=> array(
            'cookie_name'		=> 'cookie',				// name of the session cookie for database based sessions
            'database'			=> null,					// name of the database name (as configured in config/db.php)
            'table'				=> 'sessions',				// name of the sessions table
            'gc_probability'	=> 5,						// probability % (between 0 and 100) for garbage collection
        ),
    );