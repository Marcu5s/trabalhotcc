<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\help;

class Style {

    public $classInput = 'form-control';
    public $classFile = 'form-control';
    public $classTextarea = 'form-control';
    public $classSelect = 'form-control';
    public $classTable = '';

    public function grid($column, $content, $label) {

       return "<div class='form-group'>
                      <label for='$column'>$label</label>
                       $content
                    </div>";
   
    }

}