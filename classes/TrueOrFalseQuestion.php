<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of question
 *
 * @author memad
 */
class TrueOrFalseQuestion implements Question_interface {
    private $question;
    private $options;
    private $answer;
    
    public function __construct($question, $answer){
        $this->question = $question;
        $this->answer = $answer;
        $this->options = array("True","False");
    }

    function get_question() {
        return $this->question;
    }

    function get_options() {
        return $this->options;
    }
  
    function get_answer() {
        return $this->answer;
    }
}
