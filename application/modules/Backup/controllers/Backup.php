<?php defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller
{
    public function message($to = 'World')
    {
        echo "Hello {$to}!" . PHP_EOL;
    }
}
