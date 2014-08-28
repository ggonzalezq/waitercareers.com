<?php
/*
 * @author ggonzalez
 * @date 28 August 2014
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$i = 0;
$config['validations'][$i]['field'] = 'name';
$config['validations'][$i]['label'] = 'your name';
$config['validations'][$i]['rules'] = 'xss_clean|trim';

$i++;
$config['validations'][$i]['field'] = 'email';
$config['validations'][$i]['label'] = 'email address';
$config['validations'][$i]['rules'] = 'xss_clean|trim|required|email';

$i++;
$config['validations'][$i]['field'] = 'subject';
$config['validations'][$i]['label'] = 'subject';
$config['validations'][$i]['rules'] = 'xss_clean|trim|required';

$i++;
$config['validations'][$i]['field'] = 'comments';
$config['validations'][$i]['label'] = 'comments';
$config['validations'][$i]['rules'] = 'xss_clean|trim';

/* End of file contact.php */
/* Location: ./application/config/contact.php */