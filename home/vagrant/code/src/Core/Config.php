<?php

namespace Narcom\Core;

class Config
{
    private $configuration;

    /**
     * @param $configuration
     */
    public function __construct()
    {
        $this->configuration = parse_ini_file(__DIR__.'/../../config/config.ini');
    }

    /**
     * @return mixed
     */
    public function getConfig($name ='')
    {
        if(!empty($name) && isset($this->configuration[$name])){
            return $this->configuration[$name];
        }else{
            if( empty($name) && isset($this->configuration)){
                return $this->configuration;
            }else{
                return "";
            }
        }
    }



}