<?php
return array(
    'table_name' => 'users',
    'guest_login' => false,
    'groups' => array(
        1 => array('name' => 'Users', 'roles' => array('user')),
        100 => array('name' => 'Admin', 'roles' => array('user', 'admin')),
    ),
    'login_hash_salt' => 'secret_salt',
);