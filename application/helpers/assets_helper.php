 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

     if ( ! function_exists('css_url()'))
     {
         function css_url($nom)
         {
             return base_url().'assets/css/'.$nom.'.css';
         }
     }
     if ( ! function_exists('js_url()'))
     {
         function js_url($nom)
         {
             return base_url().'assets/js/'.$nom.'.js';
         }
     }

     if ( ! function_exists('img_url()'))
     {
         function img_url($nom)
         {
             return base_url().'assets/img/'.$nom;
         }
     }
     if ( ! function_exists('zoombox_css()'))
     {
         function zoombox_css()
         {
             return base_url().'assets/zoombox/zoombox.css';
         }
     }
     if ( ! function_exists('zoombox_js()'))
     {
         function zoombox_js()
         {
             return base_url().'assets/zoombox/zoombox.js';
         }
     }

