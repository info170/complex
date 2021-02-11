<?php

Class Complex
{
    private function parse($complex)
    {
        if (!preg_match("/i$/",$complex))
        {
            $real = (int)$complex;
            $imag = 0;
        }
        else
        {
            if (!preg_match("/.?\di/",$complex))
            {
                $complex = preg_replace("/i/","1i",$complex);
            }

            preg_match_all("/.?\d/", $complex, $m);
            if (count($m[0])==1)
            {
                $real = 0;
                $imag = $m[0][0];
            }
            else
            {
                $real = $m[0][0];
                $imag = $m[0][1];
            }
        }

        #echo "<br>".$real." ".$imag;
        return [$real,$imag];
    }

    private function out_format($real_result,$imag_result)
    {
        return (($real_result==0) ? "" : $real_result) .
               (($imag_result<0 or $real_result=="") ? "" : "+") .
               (($imag_result==1)?"":$imag_result) .
               "i";
    }

    public function sum($s1,$s2)
    {
        list($real1,$imag1) = $this->parse($s1);
        list($real2,$imag2) = $this->parse($s2);
        $real_result = $real1 + $real2;
        $imag_result = $imag1 + $imag2;
        return $this->out_format($real_result,$imag_result);
    }

    public function sub($s1,$s2)
    {
        list($real1,$imag1) = $this->parse($s1);
        list($real2,$imag2) = $this->parse($s2);
        $real_result = $real1 - $real2;
        $imag_result = $imag1 - $imag2;
        return $this->out_format($real_result,$imag_result);
    }

    public function add($s1,$s2)
    {
        list($real1,$imag1) = $this->parse($s1);
        list($real2,$imag2) = $this->parse($s2);
        $real_result = $real1 * $real2 - $imag1 * $imag2;
        $imag_result = $real1 * $imag2 + $imag1 * $real2;
        return $this->out_format($real_result,$imag_result);
    }

    public function div($s1,$s2)
    {
        list($real1,$imag1) = $this->parse($s1);
        list($real2,$imag2) = $this->parse($s2);
        $real_result = ($real1 * $real2 + $imag1 * $imag2) / (pow($real2,2) + pow($imag2,2));
        $imag_result = ($imag1 * $real2 - $real1 * $imag2) / (pow($real2,2) + pow($imag2,2));
        return $this->out_format($real_result,$imag_result);
    }

}
