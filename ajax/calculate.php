<?php
require_once('../controller/PolicyController.php');

$data = array();

// echo date('l');

// exit;

$carvalue = $_POST['carvalue'];
$tax = $_POST['tax'];
$installments = $_POST['installments'];

$policyObj = PolicyFactory::create($carvalue,$tax,$installments);

if($policyObj != null)
{
    if($policyObj->calculate())
    {
        //print_r($data);
        
        $data = $policyObj->getPolicyList();
        echo json_encode($data);
    }
    
    
}


// $installments = array();


// // $data[0] = 'Value';
// // $data[1] = 10000;
// // $data[2] = 1000;
// // $data[3] = 1000;

// //$installments[0] = $data;

// $metaHeader['fontweight'] = 'bold';
// $metaHeader['type'] = 'header';

// $metaBody['fontweight'] = 'normal';
// $metaBody['type'] = 'body';

// $metaFooter['fontweight'] = 'bold';
// $metaFooter['type'] = 'footer';


// $installs = array();

// $installs[] = "Installment 1";
// $installs[] = "Installment 2";

// $data['label'] = '';
// $data['policy'] = '';
// $data['installments'] = $installs;
// $data['metadata'] = $metaHeader;

// $installments[] = $data;


// $installs = array();

// $installs[] = 825;
// $installs[] = 25;

// $data['label'] = 'Value';
// $data['policy'] = 1000;
// $data['installments'] = $installs;
// $data['metadata'] = $metaBody;

// $installments[] = $data;

// $installs = array();

// $installs[] = 400;
// $installs[] = 13;

// $data['label'] = 'Base Premium';
// $data['policy'] = 100;
// $data['installments'] = $installs;
// $data['metadata'] = $metaBody;

// $installments[] = $data;


// $installs = array();

// $installs[] = 234;
// $installs[] = 5;

// $data['label'] = 'Commission';
// $data['policy'] = 600;
// $data['installments'] = $installs;
// $data['metadata'] = $metaBody;

// $installments[] = $data;


// $installs = array();

// $installs[] = 6;
// $installs[] = 2.5;

// $data['label'] = 'Tax';
// $data['policy'] = 65;
// $data['installments'] = $installs;
// $data['metadata'] = $metaBody;

// $installments[] = $data;

// $installs = array();

// $installs[] = 825;
// $installs[] = 25;

// $data['label'] = 'Total Cost';
// $data['policy'] = 1000;
// $data['installments'] = $installs;
// $data['metadata'] = $metaFooter;

// $installments[] = $data;


//echo json_encode($installments);

?>