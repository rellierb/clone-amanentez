<?php

require ('../../assets/config/connection.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {

  if(!empty($_POST["expense1"])) {
    // Expense 1 - extra person with bed linen and towel
    $expense_no_one = $_POST["expense1"];
  }

  if(!empty($_POST["expense2"])) {
    // Expense 2 - extra person with Towel
    $expense_no_two = $_POST["expense2"];
  }

  if(!empty($_POST["expense3"])) {
    // Expense 3 - extra towel 
    $expense_no_three = $_POST["expense3"];
  }

  if(!empty($_POST["expense4"])) {
    // Expense 4 - extra pillow
    $expense_no_four = $_POST["expense4"];
  }

  if(!empty($_POST["expense5"])) {
    // Expense 5 - extra comforter
    $expense_no_five = $_POST["expense5"];
  }


  echo $expense_no_one;
  echo $expense_no_two;
  echo $expense_no_three;
  echo $expense_no_four;
  echo $expense_no_five;



}