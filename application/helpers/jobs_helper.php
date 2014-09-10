<?php
/*
 * @author ggonzalez
 * @date 26 August 2014    
 */

if ( ! defined('BASEPATH')) exit( 'No direct script access allowed' );

class JobsHelper
{
    public static function getJobsPerPage()
    {
        return 20;
    }
    public static function getJobsParams()
    {
        $oCI = new stdClass();
        $oCI = & get_instance();
        
        return array(
            'publisher' => 9144799812836165,
            'v' => 2,
            'format' => 'xml',
            'q' => '(waiter or waitress or hostess)',
            'l' => '',
            'sort' => 'date',
            'radius' => 0,
            'st' => '',
            'jt' => '',
            'fromage' => '',
            'highlight' => 0,
            'filter' => 1,
            'latlong' => 0,
            'co' => 'us',
            'chnl' => '',
            'userip' => $oCI->input->ip_address(),
            'useragent' => $oCI->input->user_agent()
        );
    }
    public static function getJobsPrepared( $oJobs = NULL )
    {
        if( $oJobs === NULL )
        {
            return FALSE;
        }
        
        foreach( $oJobs->results->result as $oJob )
        {
            $oJob->url = JobsHelper::getJobURLPrepared( $oJob->url );
            $oJob->datetime = JobsHelper::getJobURLDateTime( $oJob->date );   
        }
        
        return $oJobs;
    }
    public static function getJobURLPrepared( $sURL = NULL )
    {
        if( $sURL === NULL )
        {
            return FALSE;
        }
        
        return str_replace( '&', '&amp;', $sURL );
    }    
    public static function getJobURLDateTime( $sDate = NULL )
    {
        if( $sDate === NULL )
        {
            return FALSE;
        }
        
        return date( 'Y-m-d H:m:s', strtotime( $sDate ) );
    }    
    public static function getJobTypes()
    {
        return array( 
            'fulltime', 'parttime', 'contract', 'temporary'
        );
    }
}

/* End of file jobs_helper.php */
/* Location: ./application/helpers/jobs_helper.php */ 