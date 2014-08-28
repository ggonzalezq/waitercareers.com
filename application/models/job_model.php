<?php 
/**
 * @author ggonzalez
 * @date 23 August 2014
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getJobs( $arURLParameters = NULL )
    {
        if( $arURLParameters === NULL )
        {
            return FALSE;
        }
        
        $sURL = '';
        $sURL .= 'http://api.indeed.com/ads/apisearch?';
        $sURL .= http_build_query( $arURLParameters );
        
        return simplexml_load_file( $sURL );
    }
}

/* End of file job_model.php */
/* Location: ./application/models/job_model.php */