<?php
namespace ddbb\tools;

class Math
{
    public static function sub(...$data)
    {
        $ret = $data[0];
        $i = 1;
        if(isset($data[$i]))
        {
            do{
                $tmp = $ret;
                $ret = self::bc_math('bcsub', $tmp, $data[$i]);
                $i++;
            }while(array_key_exists($i, $data));
        }
        return self::money($ret);
    }
    
    public static function add($data)
    {
        $ret = $data[0];
        $i = 1;
        if(isset($data[$i]))
        {
            do{
                $tmp = $ret;
                $ret = self::bc_math('bcadd', $tmp, $data[$i]);
                $i++;
            }while(array_key_exists($i, $data));
        }
        return self::money($ret);
    }
    
    /**
     * Compare two arbitrary precision numbers
     * 
     * @param string $left_operand The left operand, as a string
     * @param string $right_operand The right operand, as a string
     * 
     * @return int Returns 0 if the two operands are equal, 
     * 1 if the left_operand is larger than the right_operand,
     * -1 otherwise.
     */
    public static function comp($left_operand, $right_operand)
    {
        return bccomp($left_operand, $right_operand);
    }
    
    private static function bc_math($method,$left_operand,$right_operand,$scale=3){
        if(function_exists($method))
        {
            return $method(strval($left_operand),strval($right_operand),$scale);
        }
        else
        {
            /* if($method == 'bcsub')
            {
                return Yii::app()->db->createCommand('SELECT ('.$left_operand.')-'.($right_operand).' AS nums')->queryScalar();
            }
            elseif ($method == 'bcadd')
            {
                return Yii::app()->db->createCommand('SELECT ('.$left_operand.')+'.($right_operand).' AS nums')->queryScalar();
            } */
        }
    }
}