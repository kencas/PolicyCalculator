<?php
require_once('IPolicy.php');
class PolicyController{

    private $list = array();

    /**Initialization Variables */
    private $carValue = 0.00;
    private $tax = 0.00;
    private $installment = 0.00;
    private $basePolicy = 0.00;
    private $commission = 0.00;

    //define HTML Headers Definition
    private $metaHeader;
    private $metaFooter;
    private $metaBody;

    /** Computationa Variables */
    private $basePremium = 0.00; 
    private $baseCommission = 0.00;
    private $baseTax = 0.00;
    private $baseTotal = 0.00;

    public function __construct($carValue = 545789, $tax = 10, $installment = 5, $basePolicy = 11, $commission = 17) {
   
        //Initialize Initialization Variables
        $this->carValue = $carValue;
        $this->tax = $tax;
        $this->installment = $installment;
        $this->basePolicy = $basePolicy;
        $this->commission = $commission;

        /** Start Meta Data Definition */

        //Table Header Meta Data
        $this->metaHeader['fontweight'] = 'bold';
        $this->metaHeader['type'] = 'header';

        //Table Body Meta Data
        $this->metaBody['fontweight'] = 'normal';
        $this->metaBody['type'] = 'body';

        //Table footer Meta Data
        $this->metaFooter['fontweight'] = 'bold';
        $this->metaFooter['type'] = 'footer';

        /** End Meta Data Definition */

        
        
      
    }

    public function calculate()
    {

        //Determine the Base Policy Rate
        $this->getBasePolicyRate();
        

        //Header data definition
        $this->initOutputHeader();


        //Car Value Header declaration
        $this->initCarValueHeader();


        //Calculate Base Premium
        $this->calculateBasePremium();

        ///Calculate Base commision
        $this->calculateBaseCommission();

        //Start Tax Computation
        $this->calculateTax();

        //Compute total
        $this->computeTotal();

        //return $this->list;
        return true;
    }

    function getPolicyList()
    {
        return $this->list;
    }

    private function getBasePolicyRate()
    {
        $dayWeek = date('l');

       // echo date('G');

        if(strtoupper($dayWeek) == 'FRIDAY')
        {
            if(date('G') >= 15 && date('G') <= 23)
            {
                $this->basePolicy = 13;
            }
        }
    }

    private function initOutputHeader()
    {
        $installs = array();

        for($i = 0; $i < $this->installment; $i++)
        {
            $installs[] = "Installment " . ($i + 1);

        }

        $data['label'] = '';
        $data['policy'] = 'Policy';
        $data['installments'] = $installs;
        $data['metadata'] = $this->metaHeader;

        $this->list[] = $data;
    }

    private function initCarValueHeader()
    {
        $installs = array();

        for($i = 0; $i < $this->installment; $i++)
        {
            $installs[] = "";

        }

        $data['label'] = 'Value';
        $data['policy'] = $this->carValue;
        $data['installments'] = $installs;
        $data['metadata'] = $this->metaBody;

        $this->list[] = $data;
    }

    private function calculateBasePremium()
    {
        $this->basePremium = round($this->carValue * ($this->basePolicy / 100),2);

        $installs = array();

        for($i = 0; $i < $this->installment; $i++)
        {
            $installs[] = round(($this->basePremium /$this->installment),2);
        }
        
        $data['label'] = 'Base Premium (' . $this->basePolicy . '%)';
        $data['policy'] = $this->basePremium;
        $data['installments'] = $installs;
        $data['metadata'] = $this->metaBody;

        $this->list[] = $data;

    }

    private function calculateBaseCommission()
    {
        $this->baseCommission = round(($this->basePremium * ($this->commission / 100)),2);

        $installs = array();

        for($i = 0; $i < $this->installment; $i++)
        {
            $installs[] = round(($this->baseCommission / $this->installment),2);
        }

        $data['label'] = 'Commission (' . $this->commission . '%)';
        $data['policy'] = $this->baseCommission;
        $data['installments'] = $installs;
        $data['metadata'] = $this->metaBody;

        $this->list[] = $data;

    }

    private function calculateTax()
    {
        $this->baseTax = round(($this->basePremium * ($this->tax / 100)),2);

        $installs = array();

        for($i = 0; $i < $this->installment; $i++)
        {
            $installs[] = round(($this->baseTax / $this->installment),2);
        }

        $data['label'] = 'Tax (' . $this->tax . '%)';
        $data['policy'] = $this->baseTax;
        $data['installments'] = $installs;
        $data['metadata'] = $this->metaBody;

        $this->list[] = $data;
    }

    private function computeTotal()
    {
        $installs = array();

        foreach($this->list as $arr)
        {
            $this->subTotal = 0.00;
            $ins = $arr['installments'];
            // foreach($ins as $i)
            // {
            //     $baseTotal += $i;
            //     $subTotal += $i;

            //     //$installs[] = $subTotal;
            // }

            for($i = 0; $i< $this->installment; $i++)
            {
                $installs[$i] += $ins[$i];

                $this->baseTotal += $ins[$i];
            }
            
        }

       

        $data['label'] = 'Total Cost';
        $data['policy'] = $this->baseTotal;
        $data['installments'] = $installs;
        $data['metadata'] = $this->metaFooter;

        $this->list[] = $data;
    }
    
}


class PolicyFactory
{
    public static function create($carValue = 545789, $tax = 10, $installment = 5, $basePolicy = 11, $commission = 17)
    {
        return new PolicyController($carValue, $tax, $installment, $basePolicy, $commission);
    }
}
?>