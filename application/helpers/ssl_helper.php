<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * SSL Helpers
 *
 * @author  Peng Kong
 * @link    http://it.euphoriatwentythree.com/web-development/codeigniter/codeigniter-ssl-https-helper/
 * @credit  Inspired by nevercraft - http://codeigniter.com/forums/viewthread/83154/#454992@package
 */
 
// ------------------------------------------------------------------------

/**
 * Maintain SSL
 *
 * @access   public
 * @param    bool
 * @param    int
 * @return   void
 */
if ( ! function_exists('maintain_ssl'))
{
    function maintain_ssl($maintain = FALSE)
    {
        $CI =& get_instance();
        
            // remove protocol
            $segments = explode('://', $CI->config->config['base_url']);
            // explode url into segements
            $segments = explode('/', $segments[1]);
            // remove port number
            $domain = explode(':', $segments[0]);
            // form temp base url
            $temp_base_url = (($maintain==TRUE)?'https://':'http://').$domain[0].'/';
            // replace segments
            for ($i=1; $i<sizeof($segments); $i++) 
                if ($segments[$i]) 
                    $temp_base_url .= $segments[$i].'/';
            // Temporarily overwrite base url
            $CI->config->config['base_url'] = $temp_base_url;
        
        
        // if don't maintain but SSL is on -OR- maintain but SSL isn't on, correct by redirect
        if ((!$maintain && !empty($_SERVER['HTTPS'])) || ($maintain && empty($_SERVER['HTTPS'])))
        {    
            // Correct by redirect
			//echo ('Location: '.current_url().(empty($_SERVER['QUERY_STRING'])?'':'?'.$_SERVER['QUERY_STRING']));
            header('Location: '.current_url().(empty($_SERVER['QUERY_STRING'])?'':'?'.$_SERVER['QUERY_STRING']));
        }
    }
}
/* End of file ssl_helper.php */
/* Location: ./application/helpers/ssl_helper.php */
