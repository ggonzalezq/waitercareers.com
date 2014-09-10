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
    }
    public function index( $iPageNumber = NULL )
    {
        $arJobs = array();
        $arJobsParams = array();
        $arPaginationParams = array();
        $arState = array();
        $iLimit = 0;
        $iPageNumber = ( int ) $iPageNumber;
        $iTotalJobs = 0;
        $iTotalPages = 0;
        $sHeader = '';
        $sJobType = '';
        $sPagination = '';
        
        $this->arMetas[] = array(
            'name' => 'description',
            'content' => 'Find the best waiter careers in United States'
        );
        
        if( $iPageNumber === 1 )
        {
            redirect( '/', 'location', 301 );
        }
        if( $iPageNumber === 0 )
        {
            $iPageNumber = 1;
        }
        
        $sJobType = $this->input->get( 'jt' );
        $iLimit = JobsHelper::getJobsPerPage();
        $sHeader = 'Waiter careers';
        
        $arJobsParams = JobsHelper::getJobsParams();
        $arJobsParams['start'] = ( $iLimit )  * ( $iPageNumber - 1 );
        $arJobsParams['limit'] = $iLimit;
        $arJobsParams['jt'] = $sJobType;
        
        $arJobs = $this->oJob->getJobs( $arJobsParams );
        $arJobs = JobsHelper::getJobsPrepared( $arJobs );
        
        
        $iTotalJobs = ( int ) $arJobs->totalresults;
        $iTotalPages = PaginationHelper::getTotalPages( $iTotalJobs, $iLimit );
        
        if( ( $iPageNumber !== 1 ) &&
            ( $iPageNumber > $iTotalPages ) )
        {
            redirect( '/', 'location', 301 );
        }
        
        $arPaginationParams = PaginationHelper::getJobsPaginationParams();
        $arPaginationParams['total_rows'] = $iTotalJobs;
        $arPaginationParams['first_url'] = '/';
        $arPaginationParams['base_url'] = '';
        $arPaginationParams['uri_segment'] = 1;
        if( $sJobType )
        {
            $arPaginationParams['suffix'] = '?jt=' . $sJobType;
        }
        
        PaginationHelper::setPaginationLinks( array(
            'current_page' => $iPageNumber,
            'base_url' => base_url() . '{{page_number}}',
            'first_url' => rtrim( base_url(), '/' ), 
            'total_pages' => $iTotalPages
        ) );
        
        $this->pagination->initialize( $arPaginationParams );
        $sPagination = $this->pagination->create_links();
        
        return $this->load->view( 'jobs', array(
            'arJobs' => $arJobs,
            'arJobsTypes' => JobsHelper::getJobTypes(),
            'arStates' => StatesHelper::getStates(),
            'arStatesDropdown' => StatesHelper::getStatesDropdown(),
            'iLimit' => $iLimit,
            'iPageNumber' => $iPageNumber,
            'iTotalJobs' => $iTotalJobs,
            'sCurrentPath' => '/',
            'sJobType' => $sJobType,
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
        $iLimit = 0;
        $iPageNumber = ( int ) $iPageNumber;
        $iTotalJobs = 0;
        $iTotalPages = 0;
        $sHeader = '';
        $sJobType = '';
        $sPagination = '';
        $sStateName = '';
        
        $sJobType = $this->input->get( 'jt' );
        $arState = $this->oState->getStateByStateSlug( $sStateSlug );
        
        if( ! sizeof( $arState ) )
        {
            show_404();
        }
        
        $sHeader = $arState['state_name'] . ' waiter careers';
        $this->sTitle = $sHeader;
        
        $arState = StatesHelper::prepareState( $arState );
        $sStateName = $arState['state_name'];
        
        $this->arMetas[] = array(
            'name' => 'description',
            'content' => 'Find the best waiter careers in ' . $arState['state_name'] . ', United States'
        );
        
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
        $arJobsParams['l'] = $arState['state_name'];
        $arJobsParams['start'] = ( $iLimit )  * ( $iPageNumber - 1 );
        $arJobsParams['limit'] = $iLimit;
        $arJobsParams['jt'] = $sJobType;
        
        $arJobs = $this->oJob->getJobs( $arJobsParams );
        $arJobs = JobsHelper::getJobsPrepared( $arJobs );
        
        $iTotalJobs = ( int ) $arJobs->totalresults;
        $iTotalPages = PaginationHelper::getTotalPages( $iTotalJobs, $iLimit );
        
        if( ( $iPageNumber !== 1 ) &&
            ( $iPageNumber > $iTotalPages ) )
        {
            redirect( $arState['state_url'], 'location', 301 );
        }
        
        $arPaginationParams = PaginationHelper::getJobsPaginationParams();
        $arPaginationParams['total_rows'] = $iTotalJobs;
        $arPaginationParams['first_url'] = $arState['state_url'];
        $arPaginationParams['base_url'] = $arState['state_url'];
        $arPaginationParams['uri_segment'] = 2;
        
        if( $sJobType )
        {
            $arPaginationParams['suffix'] = '?jt=' . $sJobType;
        }
        
        PaginationHelper::setPaginationLinks( array(
            'current_page' => $iPageNumber,
            'base_url' => rtrim( base_url(), '/' ) . $arState['state_url'] . '/{{page_number}}',
            'first_url' => rtrim( base_url(), '/' ) . $arState['state_url'],
            'total_pages' => $iTotalPages
        ) );
        
        $this->pagination->initialize( $arPaginationParams );
        $sPagination = $this->pagination->create_links();
        
        return $this->load->view( 'jobs', array(
            'arJobs' => $arJobs,
            'arJobsTypes' => JobsHelper::getJobTypes(),
            'arState' => $arState,
            'arStates' => StatesHelper::getStates(),
            'arStatesDropdown' => StatesHelper::getStatesDropdown(),
            'iLimit' => $iLimit,
            'iPageNumber' => $iPageNumber,
            'iTotalJobs' => $iTotalJobs,
            'sCurrentPath' => '/' . uri_string(),
            'sJobType' => $sJobType,
            'sPagination' => $sPagination,
            'sPaginationSummary' => PaginationHelper::getPaginationSummary( $iPageNumber, $iLimit, $iTotalJobs ),
            'sHeader' => $sHeader
        ) );
        
    }
}

/* End of file front_page.php */
/* Location: ./application/controllers/front_page.php */
