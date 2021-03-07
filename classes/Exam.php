<?php
// session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of exam
 *
 * @author memad
 */
class Exam implements Exam_interface {

    private $page;
    private $questions;
    private $question_number;
   
    
    function getQuestion_number() {
        return count($this->questions);
    }

        
    function getPage() {
        return $this->page;
    }

    public function __construct() {
        $this->page = ($_SESSION["current_page"] > 0) ? (int) $_SESSION["current_page"] : 1;
        $this->questions = $this->get_questions();
    }

    public function load_exam_page($page) {
        if (isset($this->questions[$page - 1])) {
            return $this->questions[$page - 1];
        } else {
            throw new Exception("Question dosn't exist");
        }
    }

    public function move_previous() {
        $previous_page = $_SESSION["current_page"] - 1;
        $previous_page = ($previous_page > 0) ? $previous_page : 1;
        return "?" . "page=$previous_page";
    }

    public function move_next() {
        $next_page = $_SESSION["current_page"] + 1;
        return "?" . "page=$next_page";
    }

    private function get_questions() {
        $lines = file(exam_file);
        $questions = array();
        foreach ($lines as $line) {

            if (substr($line, 0, 1) === "Q") {
                if (isset($new_mcquestion)) {
                    $questions[] = $new_mcquestion;
                }
                $new_mcquestion = new MCQuestion(substr($line, 3, strlen($line)));
            } elseif (substr($line, 0, 1) === "*") {
                if(substr($line, 2, 1) === 'T') {
                    $answer = "True";
                } else {
                    $answer = "False";
                }
                $new_tofquestion = new TrueOrFalseQuestion(substr($line, 4, strlen($line)), $answer);
                $questions[] = $new_tofquestion;
            } else {
                if(Helper::is_answer($line)) {
                    $answer = Helper::get_answer_value($line);
                    $new_mcquestion->set_answer($answer);
                    $new_mcquestion->Add_an_Option(str_replace("*", "", trim(substr($line, 3, strlen($line)))));
                } else {
                    $new_mcquestion->Add_an_Option(trim(substr($line, 3, strlen($line))));
                }
            }
        }
        return $questions;
    }

}
