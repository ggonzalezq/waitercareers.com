<?php 
/**
 * @author ggonzalez
 * @date 28 August 2014
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function contact()
    {
        require_once APPPATH . 'third_party/recaptcha-php-1.11/recaptchalib.php';
        $this->config->load( 'contact' );
        $this->load->helper( 'form' );
        $this->load->library( 'form_validation' );
        
        $arValidations = array();
        $sRecaptchaError = '';
        $sRecaptchaHTML = '';
        $bSent = FALSE;
        
        $this->arCSS[] = '/css/contact';
        $this->sTitle = 'Contact | Waiter careers';
        
        if( sizeof( $_POST ) )
        {
            $arValidations = $this->config->item( 'validations' );
            $this->form_validation->set_error_delimiters( '<div class="form-error">', '</div>' );
            $this->form_validation->set_rules( $arValidations );
            
            $oRecaptchaResponse = recaptcha_check_answer(
                $this->config->item( 'recaptcha_private_key' ),
                $_SERVER['REMOTE_ADDR'],
                $this->input->post( 'recaptcha_challenge_field' ),
                $this->input->post( 'recaptcha_response_field' )
            );
            
            if( ! $oRecaptchaResponse->is_valid )
            {
                $sRecaptchaError = $oRecaptchaResponse->error;
            }
            
            if( ( $this->form_validation->run() ) &&
                ( $oRecaptchaResponse->is_valid ) )
            {   
                $this->load->library( 'email' );
                $this->email->from( $this->input->post( 'email' ) );
                $this->email->to( 'gabrielgonzalezq@gmail.com' );
                $this->email->subject( 'Contact form - ' . $this->input->post( 'subject' ) );
                $this->email->message(
                    'Name: ' . $this->input->post( 'name' ) . "\n" . 
                    'Email address: ' . $this->input->post( 'email' ) . "\n" .
                    'Related Link URL: ' . $this->input->post( 'url' ) . "\n" .
                    'Comments: ' . $this->input->post( 'comments' ) . "\n"
                );
                $bSent = $this->email->send();   
            }
        }
        
        $sRecaptchaHTML = recaptcha_get_html( $this->config->item( 'recaptcha_public_key' ) );
        
        $this->load->view( 'contact', array(
            'arStates' => StatesHelper::getStates(),
            'bSent' => $bSent,
            'sRecaptchaHTML' => $sRecaptchaHTML,
            'sRecaptchaError' => $sRecaptchaError
        ) );
    }
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */
