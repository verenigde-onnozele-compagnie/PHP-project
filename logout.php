<?php
/**
 * Created by PhpStorm.
 * User: Sem40
 * Date: 26/03/2019
 * Time: 15:27
 */

session_start();
session_destroy();
echo 'You have been logged out. <a href="/">Go back</a>';