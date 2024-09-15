<?php

namespace WIFI\JWE23\DataBanking;

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

    public function is_mail(string $value, string $error_name): bool
    {
        if (!preg_match("/^[a-z0-9]+@[a-z0-9]+\.[a-z]{2,15}$/", $value)) 
        {
            $this->errors[] = $error_name . " adress might be false. Please check and try again.";
            return false;
        }

        if(strlen($value) < 5)
        {
            $this->errors[] = $error_name . " must be at least 5 letters long. Please check and try again.";
            return false;
        }

        if(strlen($value) > 25)
        {
            $this->errors[] = $error_name . " is to long. Please check and try again.";
            return false;
        }
        return true;
    }

    public function is_password(string $value, string $error_name): bool 
    {
        if(strlen($value) < 8)
        {
            $this->errors[] = $error_name . " must be at least 8 letters long. Please check and try again.";
            return false;
        }

        if(strlen($value) > 25)
        {
            $this->errors[] = $error_name . " is to long. Please check and try again.";
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

    public function error_entry(string $error): void
    {
        $this->errors[] = $error;
    }
}