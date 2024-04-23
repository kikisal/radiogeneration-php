<?php

namespace Core\Utils\Misc;

class VarDumper {

    public static function dumpArray($array, $layer = 1) {
        $out		  = "[\n";
        $tabs		  = str_repeat("\t", $layer);
        $tabsMinusOne = str_repeat("\t", $layer - 1);
        $out          = $out . $tabs;
    
        foreach ($array as $key => $value) {
            if (is_string($value))
                $value = "\"" . $value . "\"";
            else if (is_array($value))
                $value = self::dumpArray($value, $layer + 1);
            else $value = self::decodeValue($value);
    
            $out .= "\"". $key ."\" => " . $value . ",\n"  . $tabs;
        }
    
        $out = substr($out, 0, strlen($out) - strlen($tabs) - 2) . "\n$tabsMinusOne]";
        
        if ($layer == 1)
            $out .= ";";

        return $out;
    }

    private static function decodeValue($value) {
        if (is_null($value))
            return "null";
        else if (is_bool($value))
            return $value ? "true" : "false";
        else if (is_object($value))
            return "\"Object(" . get_class($value) . ", #". spl_object_id($value) .")\"";
        else
            return "";
    }
}