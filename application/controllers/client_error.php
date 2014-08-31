<?php 
/**
 * @author ggonzalez
 * @date 28 August 2014
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_error extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function not_found()
    {
        $this->sTitle = 'Page not found | Waiter careers';
        $this->arCSS[] = '/css/not-found';
        $this->output->set_status_header( '404' );
        
        return $this->load->view( 'not_found', array(
            'arStatesDropdown' => StatesHelper::getStatesDropdown()
        ) );
    }
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */
