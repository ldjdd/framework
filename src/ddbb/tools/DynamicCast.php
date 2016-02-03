<?php
namespace ddbb\tools;

class DynamicCast
{
    const INT = 1;
    const INT_UNSIGNED = 2;
    const FLOAT = 3;
    const FLOAT_UNSIGNED = 4;
    
    /**
     * @param int $targetType Target data type
     */
    public static function cast($value, $targetType)
    {
        switch ($targetType)
        {
            case self::INT:
                return (int)$value;
                break;
            case self::INT_UNSIGNED:
                $value = (int)$value;
                return ($value < 0) ? 0 : $value;
                break;
            case self::FLOAT:
                return (float)$value;
                break;
            case self::FLOAT_UNSIGNED:
                $value = (float)$value;
                return (Math::comp($value , 0) == -1) ? 0 : $value;
                break;
            default:
                return $value;
        }
    }
}