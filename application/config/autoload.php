<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','form_validation', 'session');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'form', 'text', 'file');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('Doctor_model','Test_model','Patient_model','Bill_model','Lab_model','Page_model','User_model','Collector_model','Agent_model');