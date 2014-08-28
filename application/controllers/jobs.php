<?php 
/**
 * @author ggonzalez
 * @date 23 August 2014
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper( 'html' );
        $this->load->helper( 'jobs' );
        $this->load->helper( 'pagination' );
        $this->load->helper( 'states' );
        $this->load->helper( 'url' );
        $this->load->library( 'pagination' );
        $this->load->model( 'state_model', 'oState' );
        $this->load->model( 'job_model', 'oJob' );
    }
    public function index( $iPageNumber = NULL )
    {
        $arJobs = array();
        $arJobsParams = array();
        $arPaginationParams = array();
        $arState = array();
        $arStates = array();
        $iLimit = 0;
        $iPageNumber = ( int ) $iPageNumber;
        $iTotalJobs = 0;
        $iTotalPages = 0;
        $sHeader = '';
        $sPagination = '';
        
        if( $iPageNumber === 1 )
        {
            redirect( '/', 'location', 301 );
        }
        if( $iPageNumber === 0 )
        {
            $iPageNumber = 1;
        }
        
        $arStates = $this->oState->getStates();
        $arStates = StatesHelper::prepareStates( $arStates );
        $iLimit = JobsHelper::getJobsPerPage();
        
        $sHeader = 'Waiter careers';
        
        $arJobsParams = JobsHelper::getJobsParams();
        $arJobsParams['start'] = ( $iLimit )  * ( $iPageNumber - 1 );
        $arJobsParams['limit'] = $iLimit;
        $arJobs = $this->oJob->getJobs( $arJobsParams );
        
        $iTotalJobs = ( int ) $arJobs->totalresults;
        $iTotalPages = PaginationHelper::getTotalPages( $iTotalJobs, $iLimit );
        
        if( $iPageNumber >  $iTotalPages )
        {
            redirect( '/', 'location', 301 );
        }
        
        $arPaginationParams = PaginationHelper::getJobsPaginationParams();
        $arPaginationParams['total_rows'] = $iTotalJobs;
        $arPaginationParams['first_url'] = '/';
        $arPaginationParams['base_url'] = '';
        $arPaginationParams['uri_segment'] = 1;
        
        PaginationHelper::setPaginationLinks( array(
            'current_page' => $iPageNumber,
            'base_url' => '/{{page_number}}',
            'first_url' => '/',
            'total_pages' => $iTotalPages
        ) );
        
        $this->pagination->initialize( $arPaginationParams );
        $sPagination = $this->pagination->create_links();
        
        return $this->load->view( 'jobs', array(
            'arJobs' => $arJobs,
            'arStates' => $arStates,
            'iLimit' => $iLimit,
            'iPageNumber' => $iPageNumber,
            'iTotalJobs' => $iTotalJobs,
            'sPagination' => $sPagination,
            'sPaginationSummary' => PaginationHelper::getPaginationSummary( $iPageNumber, $iLimit, $iTotalJobs ),
            'sHeader' => $sHeader
        ) );
        
    }
    public function jobs_state( $iPageNumber = NULL, $sStateSlug = '' )
    {
        $arJobs = array();
        $arJobsParams = array();
        $arPaginationParams = array();
        $arState = array();
        $arStates = array();
        $iLimit = 0;
        $iPageNumber = ( int ) $iPageNumber;
        $iTotalJobs = 0;
        $iTotalPages = 0;
        $sHeader = '';
        $sPagination = '';
        $sStateName = '';
        
        $arState = $this->oState->getStateByStateSlug( $sStateSlug );
        
        if( ! sizeof( $arState ) )
        {
            show_404();
        }
        
        $sHeader = $arState['state_name'] . ' waiter careers';
        $this->sTitle = $sHeader;
        
        $arStates = $this->oState->getStates();
        $arStates = StatesHelper::prepareStates( $arStates );
        
        $arState = StatesHelper::prepareState( $arState );
        $sStateName = $arState['state_name'];
        
        
        if( $iPageNumber === 1 )
        {
            redirect( $arState['state_url'], 'location', 301 );
        }
        if( $iPageNumber === 0 )
        {
            $iPageNumber = 1;
        }
        
        
        $iLimit = JobsHelper::getJobsPerPage();
        
        $arJobsParams = JobsHelper::getJobsParams();
        $arJobsParams['start'] = ( $iLimit )  * ( $iPageNumber - 1 );
        $arJobsParams['limit'] = $iLimit;
        $arJobs = $this->oJob->getJobs( $arJobsParams );
        
        $iTotalJobs = ( int ) $arJobs->totalresults;
        $iTotalPages = PaginationHelper::getTotalPages( $iTotalJobs, $iLimit );
        
        if( $iPageNumber >  $iTotalPages )
        {
            redirect( $arState['state_url'], 'location', 301 );
        }
        
        
        $arPaginationParams = PaginationHelper::getJobsPaginationParams();
        $arPaginationParams['total_rows'] = $iTotalJobs;
        $arPaginationParams['first_url'] = $arState['state_url'];
        $arPaginationParams['base_url'] = $arState['state_url'];
        $arPaginationParams['uri_segment'] = 2;
        
        PaginationHelper::setPaginationLinks( array(
            'current_page' => $iPageNumber,
            'base_url' => $arState['state_url'] . '/{{page_number}}',
            'first_url' => $arState['state_url'],
            'total_pages' => $iTotalPages
        ) );
        
        $this->pagination->initialize( $arPaginationParams );
        $sPagination = $this->pagination->create_links();
        
        return $this->load->view( 'jobs', array(
            'arJobs' => $arJobs,
            'arStates' => $arStates,
            'iLimit' => $iLimit,
            'iPageNumber' => $iPageNumber,
            'iTotalJobs' => $iTotalJobs,
            'sPagination' => $sPagination,
            'sPaginationSummary' => PaginationHelper::getPaginationSummary( $iPageNumber, $iLimit, $iTotalJobs ),
            'sHeader' => $sHeader
        ) );
        
    }
}

/* End of file front_page.php */
/* Location: ./application/controllers/front_page.php */
