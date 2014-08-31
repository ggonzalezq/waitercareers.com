<?php
/*
 * @author ggonzalez
 * @date 25 August 2014
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class MY_Controller extends CI_Controller
{
    
    public $arCSS;
    public $arJS;
    public $arLinks;
    public $arMetas;
    public $sTitle;
    public $sVersion; 
    
    public function __construct() 
    {
        parent::__construct();
        
        if( ( ENVIRONMENT === 'development' ) &&
            ( ! $this->input->is_ajax_request() ) )
        {
            $this->output->enable_profiler( TRUE );
        }
        
        $this->arCSS = array();
        $this->arJS = array();
        $this->arLinks = array();
        $this->arMetas = array();
        
        $this->sTitle = '';
        $this->sVersion = '';
        
        $this->arCSS[] = '/css/normalize';
        $this->arCSS[] = '/css/main';
        $this->sTitle = 'Waiter careers';
        $this->sVersion = '1409212208';
        
        $this->config->load( 'global' );
        $this->load->helper( 'html' );
        $this->load->helper( 'jobs' );
        $this->load->helper( 'pagination' );
        $this->load->helper( 'states' );
        $this->load->helper( 'url' );
        $this->load->library( 'pagination' );
        $this->load->model( 'state_model', 'oState' );
        $this->load->model( 'job_model', 'oJob' );
        
    }
}

/* End of file MY_controller.php */
/* Location: ./application/core/MY_Controller.php */