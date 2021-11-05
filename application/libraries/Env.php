<?php
if (file_exists('vendor/autoload.php')) {
    require_once('vendor/autoload.php');
}


class Env
{
    public function __construct()
    {
        //$dotenv = Dotenv\Dotenv::create(FCPATH);
		$dotenv = Dotenv\Dotenv::createUnsafeImmutable(FCPATH);
        $dotenv->load();
    }
}
?>