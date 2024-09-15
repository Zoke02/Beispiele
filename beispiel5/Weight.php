<?php
namespace PICS\JUNIOR;

/**
*   Beispeil 5 - Set up a Class in a specific code style.
* 
*   @category     WeightSystem
*   @author       Alin Nedelcu
*   @version      v1.0.1 / 2024-08-29
*  
*   History:
*   01.09.2024          1.0.1          extends CONTAINER (class)
*/

/**
*   Class with functions to convert weight.
*   Define weight formats:
*   
*   International System of Units (SI)
*   tonne       = t
*   kilogram    = kg
*   gram        = g
*   miligram    = mg
*
*   Imperial and US weight units // To add in the future version.
*   US ton      = ust
*   UK ton      = ukt
*   pound       = p
*   ounce       = o
*
*/

############################################### GLOBAL CONSTANTS ##################################################################

// I will check later 
  
################################################## CLASS INIT #####################################################################

class WEIGHT {

    // ===== PROPERTIES =====
    /**
    * @var string|array|null
    */

    private static $_weight             = null;                                                 //@var      float|int|bool      $_weight                current weight
    private static $_typeShort          = array("t", "kg", "g", "mg");                          //@var      array               $_typeShort             All types of weight short
    private static $_typeLong           = array("Tonne", "Kilogram", "Gram", "Miligram");       //@var      array               $_typeLong              All types of weight
    private static $_typePosition       = 0;                                                    //@var      int                 $_typePosition          What position is the type in the array $_typeShort
    private static $_typeMultiplierSI   = 1000;                                                 //@var      int                 $_typeMultipliers       All types of Multipliers (for now all are 1000 but it will be diferit if i add)


    // ================================ DEFAULT - FUNCTIONS ================================


    /**
    * set weight and type
    *
    * @param    float|int             $weight         input weight
    * @param    string                $type           input type ("t", "kg", "g")
    * @return   void                  $_weight        no return only trow exception
    */
    public static function set(float|int $weight, string $type): void
    {
        if ($weight <= 0) {
            throw new Exception("Value must be above 0");
        } else {
            self::$_weight = $weight;
            for ($i=0; $i < count(self::$_typeShort) ; $i++) { 
                if ((strtolower($type) == self::$_typeShort[$i])) {
                    // self::$_type = self::$_typeLong[$i];
                    self::$_typePosition = $i;
                }
            }
        }
    } // set

    /**
    * get current weight
    *
    */
    public static function getWeight(): float|int|null 
    {
        return self::$_weight;
    } // getWeight

    /**
    * get current type
    *
    */
    public static function getType(): string 
    {
        return self::$_typeLong[self::$_typePosition];
    } // getType

    /**
    * get a current integer value of what position the unit is in array($_typeShort) and array($_typeLong)
    *
    */
    public static function getPosition(): int 
    {
        return self::$_typePosition;
    } // getPosition

    // It took me 1h just to do this loop so i wont have to write each formula from each unit to each unit.
    /**
    * convert from current unit to a specific unit
    *
    * @param     string         $unit       will be converted to this "$unit"
    * @return    void           $unit       set the $_weight and $_typePosition to the new unit
    */
    public static function convertTo(string $unit): void 
    {   
        // $parameberPosition is the $_typePosition of $unit.
        $parameterPosition = 0;
        // (Fix?) I could put this in getType() and maybe change it to setType(). 
        // foreach to check what $_typePosition(integer) is for the $unit.
        foreach (self::$_typeShort as $key => $value) {
            if ($unit == $value) $parameterPosition = $key;
        }
        // Check if user is trying to convert to the same unit.
        if (self::$_typeShort[self::$_typePosition] == strtolower($unit)) {
            throw new Exception("Cannon convert to same unit.");
        } 
        // else if $unit[position] is to the right of array we multiply until end of array
        // start of array is $unit[position] 
        else if ($parameterPosition > self::$_typePosition) {
            for ($i=self::$_typePosition; $i < $parameterPosition; $i++) { 
                self::$_weight *= self::$_typeMultiplierSI;
            }
        // else if $unit[position] is to the left of array we divide until end of array
        // start of array is $unit[position] 
        } else if ($parameterPosition < self::$_typePosition) {
            for ($i=$parameterPosition; $i < self::$_typePosition; $i++) { 
                self::$_weight /= self::$_typeMultiplierSI;
            }
        }
        // Remember to also set the $_typePosition to the new unit value.
        self::$_typePosition = $parameterPosition;
    } // convertTo

} // WEIGHT