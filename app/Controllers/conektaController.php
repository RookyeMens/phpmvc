<?php
require('../vendor/autoload.php');

if (isset($_POST['action'])):
   switch ($_POST['action']):
        case 'register':
            echo "Petición tipo POST";
           break;
        default:
            header(http_response_code(404));
            break;
   endswitch;
endif;

if (isset($_GET['action'])):
    switch ($_GET['action']):
        case 'register':
            echo "Petición tipo GET";
            break;
        default:
            header(http_response_code(404));
            break;
    endswitch;  
endif;

  