<?php
/*
 * @author  ggonzalez
 * @date    15 April 2013
 */

if ( ! defined('BASEPATH')) exit( 'No direct script access allowed' );

class StatesHelper
{
    public static function prepareState( $arState = NULL )
    {
        if( ( $arState === NULL ) ||
            ( ! is_array( $arState ) ) )
        {
            return FALSE;
        }
        
        $arState['state_url'] = StatesHelper::getStateURL( $arState['state_slug'] );
        
        return $arState;
    }
    public static function prepareStates( $arStates = NULL )
    {
        if( ( $arStates === NULL ) ||
            ( ! is_array( $arStates ) ) )
        {
            return FALSE;
        }
        
        foreach( $arStates as $k => $v )
        {
            $arStates[$k] = StatesHelper::prepareState( $arStates[$k] );
        }
        
        return $arStates;
    }
    public static function getStateURL( $sStateSlug = NULL )
    {
        if( $sStateSlug === NULL )
        {
            return FALSE;
        }
        
        return '/' . $sStateSlug . '-waiter-careers';
    }
}

/* End of file states_helper.php */
/* Location: ./application/helpers/states_helper.php */ 