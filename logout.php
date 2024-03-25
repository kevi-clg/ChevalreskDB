<?php
require 'php/sessionManager.php';
require 'DAL/functions.php';
anonymousAccess();

delete_session();

redirect('LoginForm.php');
