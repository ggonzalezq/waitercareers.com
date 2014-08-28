<?php 
/**
 * @author ggonzalez
 * @date 23 August 2014
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getStates()
    {
        return array( 
            array( 'state_name' => 'Alaska', 'state_slug' => 'alaska' ),
            array( 'state_name' => 'Alabama', 'state_slug' => 'alabama' ),
            array( 'state_name' => 'Arkansas', 'state_slug' => 'arkansas' ),
            array( 'state_name' => 'Arizona', 'state_slug' => 'arizona' ),
            array( 'state_name' => 'California', 'state_slug' => 'california' ),
            array( 'state_name' => 'Colorado', 'state_slug' => 'colorado' ),
            array( 'state_name' => 'Connecticut', 'state_slug' => 'connecticut' ),
            array( 'state_name' => 'District of Columbia', 'state_slug' => 'district-of-columbia' ),
            array( 'state_name' => 'Delaware', 'state_slug' => 'delaware' ),
            array( 'state_name' => 'Florida', 'state_slug' => 'florida' ),
            array( 'state_name' => 'Georgia', 'state_slug' => 'georgia' ),
            array( 'state_name' => 'Hawaii', 'state_slug' => 'hawaii' ),
            array( 'state_name' => 'Iowa', 'state_slug' => 'iowa' ),
            array( 'state_name' => 'Idaho', 'state_slug' => 'idaho' ),
            array( 'state_name' => 'Illinois', 'state_slug' => 'illinois' ),
            array( 'state_name' => 'Indiana', 'state_slug' => 'indiana' ),
            array( 'state_name' => 'Kansas', 'state_slug' => 'kansas' ),
            array( 'state_name' => 'Kentucky', 'state_slug' => 'kentucky' ),
            array( 'state_name' => 'Louisiana', 'state_slug' => 'louisiana' ),
            array( 'state_name' => 'Massachusetts', 'state_slug' => 'massachusetts' ),
            array( 'state_name' => 'Maryland', 'state_slug' => 'maryland' ),
            array( 'state_name' => 'Maine', 'state_slug' => 'maine' ),
            array( 'state_name' => 'Michigan', 'state_slug' => 'michigan' ),
            array( 'state_name' => 'Minnesota', 'state_slug' => 'minnesota' ),
            array( 'state_name' => 'Missouri', 'state_slug' => 'missouri' ),
            array( 'state_name' => 'Mississippi', 'state_slug' => 'mississippi' ),
            array( 'state_name' => 'Montana', 'state_slug' => 'montana' ),
            array( 'state_name' => 'North Carolina', 'state_slug' => 'north-carolina' ),
            array( 'state_name' => 'North Dakota', 'state_slug' => 'north-dakota' ),
            array( 'state_name' => 'Nebraska', 'state_slug' => 'nebraska' ),
            array( 'state_name' => 'New Hampshire', 'state_slug' => 'new-hampshire' ),
            array( 'state_name' => 'New Jersey', 'state_slug' => 'new-jersey' ),
            array( 'state_name' => 'New Mexico', 'state_slug' => 'new-mexico' ),
            array( 'state_name' => 'Nevada', 'state_slug' => 'nevada' ),
            array( 'state_name' => 'New York', 'state_slug' => 'new-york' ),
            array( 'state_name' => 'Ohio', 'state_slug' => 'ohio' ),
            array( 'state_name' => 'Oklahoma', 'state_slug' => 'oklahoma' ),
            array( 'state_name' => 'Oregon', 'state_slug' => 'oregon' ),
            array( 'state_name' => 'Pennsylvania', 'state_slug' => 'pennsylvania' ),
            array( 'state_name' => 'Rhode Island', 'state_slug' => 'rhode-island' ),
            array( 'state_name' => 'South Carolina', 'state_slug' => 'south-carolina' ),
            array( 'state_name' => 'South Dakota', 'state_slug' => 'south-dakota' ),
            array( 'state_name' => 'Tennessee', 'state_slug' => 'tennessee' ),
            array( 'state_name' => 'Texas', 'state_slug' => 'texas' ),
            array( 'state_name' => 'Utah', 'state_slug' => 'utah' ),
            array( 'state_name' => 'Virginia', 'state_slug' => 'virginia' ),
            array( 'state_name' => 'Vermont', 'state_slug' => 'vermont' ),
            array( 'state_name' => 'Washington', 'state_slug' => 'washington' ),
            array( 'state_name' => 'Wisconsin', 'state_slug' => 'wisconsin' ),
            array( 'state_name' => 'West Virginia', 'state_slug' => 'west-virginia' ),
            array( 'state_name' => 'Wyoming', 'state_slug' => 'wyoming' )
        );
    }
    public function getStateByStateSlug( $sStateSlug = NULL )
    {
        if( $sStateSlug === NULL )
        {
            return array();
        }
        
        $arStates = $this->getStates();
        
        foreach( $arStates as $k => $v )
        {
            if( $sStateSlug === $arStates[$k]['state_slug'] )
            {
                return $arStates[$k];
            }
        }
        
        return array();
    }
}

/* End of file state_model.php */
/* Location: ./application/models/state_model.php */