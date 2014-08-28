<?php
/*
 * @author  ggonzalez
 * @date    14 June 2013
 */

if ( ! defined('BASEPATH')) exit( 'No direct script access allowed' );

class PaginationHelper
{
    /**
     * Generate the metadata for the pagination adding them in the head of the document
     * e.g.
     * <link rel="prev" href="http://www.highdefdigest.com/news" />
     * <link rel="next" href="http://www.highdefdigest.com/news/3" />
     * Based on http://googlewebmastercentral.blogspot.mx/2011/09/pagination-with-relnext-and-relprev.html
     * @param   array   $arParams
     * @return  boolean
     */
    public static function setPaginationLinks( $arParams = array() )
    {
        $iCurrentPage = isset( $arParams['current_page'] ) ? ( int ) $arParams['current_page'] : 0;
        $iTotalPages = isset( $arParams['total_pages'] ) ? ( int ) $arParams['total_pages'] : 0;
        $iPreviousPage = $iCurrentPage - 1;
        $iNextPage = $iCurrentPage + 1;
        $oCI = & get_instance();
        $sBaseURL = isset( $arParams['base_url'] ) ? $arParams['base_url'] : '';
        $sFirstURL = isset( $arParams['first_url'] ) ? $arParams['first_url'] : '';
        
        if( $iTotalPages <= 1 )
        {
            return FALSE;
        }
        
        
        //  Canonical tag
        
        $oCI->arLinks[] = array( 'rel' => 'canonical', 'href' => $sFirstURL );
        
        //  Generates the previous link
        
        if( $iCurrentPage > 1 )
        {
            if( $iPreviousPage === 1 )
            {
                $oCI->arLinks[] = array( 'rel' => 'prev', 'href' => $sFirstURL );
            }
            else
            {
                $oCI->arLinks[] = array( 'rel' => 'prev', 'href' => str_replace( '{{page_number}}', $iPreviousPage, $sBaseURL  ) );
            }
        }
        
        //  Generates the next link
        
        if( $iCurrentPage < $iTotalPages )
        {
            $oCI->arLinks[] = array( 'rel' => 'next', 'href' => str_replace( '{{page_number}}', $iNextPage, $sBaseURL  ) );
        }
        
        return TRUE;
    }
    /**
     * Calculate the offset for a mysql sentence given a limit and a page number
     * @param   int     $iLimit
     * @param   int     $iPageNumber
     * @return  mixed   boolean / int
     */
    public static function getOffset( $iLimit = NULL, $iPageNumber = NULL )
    {
        if( ( $iLimit === NULL ) ||
            ( $iPageNumber === NULL ) )
        {
            return FALSE;
        }
        return ( $iLimit )  * ( $iPageNumber - 1 );
    }
    /**
     * Calculates the total of pages given a total of items and a limit
     * @param   int     $iTotal
     * @param   int     $iLimit
     * @return  mixed   boolean / int
     */
    public static function getTotalPages( $iTotal = NULL, $iLimit = NULL )
    {
        if( ( $iTotal === NULL ) ||
            ( $iLimit === NULL ) )
        {
            return FALSE;
        }
        return ceil( $iTotal / $iLimit );
    }
    public static function getPaginationSummary( $iPageNumber = NULL, $iLimit = NULL, $iTotal = NULL )
    {
        
        if( ( $iPageNumber === NULL ) ||
            ( $iLimit === NULL ) ||
            ( $iTotal === NULL ) ||
            ( $iTotal === 0 ) )
        {
            return FALSE;
        }
        
        $sPaginationSummary = '';
        
        $sPaginationSummary .= '<div class="pagination-summary">';
        $sPaginationSummary .= '<p>';
        $sPaginationSummary .= 'Showing <b>' . ( ( ( $iPageNumber - 1 ) * ( $iLimit ) )  + 1 ) . ' - ';
        
        if( $iPageNumber ==  PaginationHelper::getTotalPages( $iTotal, $iLimit ) )
        {
            $sPaginationSummary .= $iTotal . '</b>';
        }
        else
        {
            $sPaginationSummary .= $iPageNumber * $iLimit . '</b>';
        }
        
        $sPaginationSummary .= ' of ' . $iTotal . ' careers';
        
        $sPaginationSummary .= '</p>';
        $sPaginationSummary .= '</div>';
        
        
        return $sPaginationSummary;
    }
    /**
     * @return array
     */
    public static function getJobsPaginationParams()
    {
        return array(
            'per_page' => JobsHelper::getJobsPerPage(),
            'num_links' => 3,
            'use_page_numbers' => TRUE,
            'full_tag_open' => '<div class="pagination"><ul class="clearfix">',
            'full_tag_close' => '</ul></div>',
            'first_link' => 'First',
            'first_tag_open' => '<li>',
            'first_tag_close' => '</li>',
            'last_link' => 'Last',
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>',
            'next_link' => '&rarr;',
            'next_tag_open' => '<li class="next">',
            'next_tag_close' => '</li>',
            'prev_link' => '&larr;',
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'cur_tag_open' => '<li class="active"><a>',
            'cur_tag_close' => '</a></li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
        );
    }
}

/* End of file pagination_helper.php */
/* Location: ./application/helpers/pagination_helper.php */