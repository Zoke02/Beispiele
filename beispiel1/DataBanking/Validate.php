<?php

namespace PICS\BEISPIEL\DataBanking;

class Validate
{
    private $errors = array();

    public function is_formular_filled(string $value, string $error_name): bool 
    {
        if (empty($value)) {
            $this->errors[] = $error_name . " must be filled.";
            return false;
        } 
        return true;
    }

    public function is_errors(): bool
    {   
        if (empty($this->errors)) {
            return false;
        }
        return true;
    }

    public function error_html(): string 
    {   
        if (empty($this->errors)){
            return "";
        }
        $return = "<ul class='errors'>";
        foreach ($this->errors as $error) {
            $return .= "<li class='errors__li'>" . $error . "</li>";
        }
        $return .= "</ul>";
        return $return;
    }
}