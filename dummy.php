<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
// function whatIsHappening() {
//     // echo '<h2>$_GET</h2>';
//     // var_dump($_GET);
    echo "<pre>";
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo "</pre>";
//     // echo '<h2>$_COOKIE</h2>';
//     // var_dump($_COOKIE);
    echo "<pre>";
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
    echo "</pre>";

// }

// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Phoenix Neo', 'price' => 109.99],
    ['name' => 'Alice', 'price' => 99.99],
    ['name' => 'Amy', 'price' => 89.99],
    ['name' => 'Alex Neo', 'price' => 159.99],
    ['name' => 'Vick Neo', 'price' => 129.99],
    ['name' => 'Benedict', 'price' => 69.99],
];


$totalValue = 0;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  };

function validate()
{
    // TODO: This function will send a list of invalid fields back
    // $email = $street =  $streetnumber = $city = $zipcode = "";

    $errorFields = [];
    //foreach($_POST as $i => $inputValue){}

    if (isset($_POST['zipcode'])) 
    {   
        if (empty($_POST['zipcode'])) {
             echo 'zipcode is empty';
             $_SESSION['zipcode'] = '';
            array_push($errorFields,'zipcode'); //$errorFields[]= $i;
        }else if (!is_numeric($_POST['zipcode'])){ 
            //  echo 'zipcode is not a number';
             $_SESSION['zipcode'] = '';
            array_push($errorFields,'zipcode');
            generateAlert('zipcode: '. $_POST['zipcode']);
        }else {
            $_SESSION['zipcode'] = $_POST['zipcode'];
        }
    }
    if (isset($_POST['email'])) 
    {
        if (empty($_POST['email'])) {
            echo 'email is empty';
            array_push($errorFields,'email');
        }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
            // echo 'is not a valid email';
            array_push($errorFields,'email');
            generateAlert('email: '. $_POST['email']);
        } else {
            $_SESSION['email'] = $_POST['email'];
        }
        }

        if (isset($_POST['street'])) 
        {   
        if (empty($_POST['street'])) {
             echo 'street is empty';
             $_SESSION['street'] = '';
            array_push($errorFields,'street');
        }else if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['street'])){ 
            //  echo 'Only letters and white space allowed';
             $_SESSION['street'] = '';
            array_push($errorFields,'street');
            generateAlert('street: '. $_POST['street']);
        }else {
            $_SESSION['street'] = $_POST['street'];
        }
    }

        if (isset($_POST['streetnumber'])) 
        {   
        if (empty($_POST['streetnumber'])) {
             echo 'streetnumber is empty';
             $_SESSION['streetnumber'] = '';
            array_push($errorFields,'streetnumber');
        }else if (!preg_match("/^[0-9]*$/", $_POST['streetnumber'])){ 
            //  echo 'Only numbers allowed';
             $_SESSION['streetnumber'] = '';
            array_push($errorFields,'streetnumber');
            generateAlert('streetnumber: '. $_POST['streetnumber']);
        }else {
            $_SESSION['streetnumber'] = $_POST['streetnumber'];
        }
    }

    if (isset($_POST['city'])) 
        {   
        if (empty($_POST['city'])) {
             echo 'city is empty';
             $_SESSION['city'] = '';
            array_push($errorFields,'city');
        }else if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['city'])){ 
            //  echo 'Only letters and white space allowed in "city"';
             $_SESSION['city'] = '';
            array_push($errorFields,'city');
            generateAlert('city: '. $_POST['city']);
        }else {
            $_SESSION['city'] = $_POST['city'];
        }
    }

        return $errorFields;
}
   
function generateAlert($field) {
    echo '<div class="alert alert-danger" role="alert">Invalid '. $field . '!</div>';
}
function handleForm($products, $totalValue)
{// TODO: form related tasks (step 1)
    // foreach($_POST as $i => $inputValue){
    //     if(!empty($inputValue))
    //     echo $inputValue;
    // }

    $orders = [];

  for($i = 0; $i < count($products); $i++) {
    if(isset($_POST['products'][$i])) {
      $orders[] = $products[$i]['name'];
      $totalValue += $products[$i]['price'];
    }
} 

    $_POST['totalValue'] = $totalValue;

    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {//Als de inputfield niet leeg is, dan...
        // TODO: handle errors
        echo '<div class="alert alert-danger" role="alert">Fill in this form correctly!</div>';
        // echo "Fill in this form correctly"; //add to input field
    } else {
        // TODO: handle successful submission
        for($i = 0; $i < count($orders); $i++){
            echo '<div class="alert alert-success" role="success">'. $orders[$i] . '</div>';
        
            // echo '<div class="alert alert-success" role="success">'. $totalValue . '<br/>';
            // $_POST['address']. ',' . $_POST['street'] . ', ' . $_POST['streetnumber'] . ' - zipcode: ' . $_POST['zipcode']. '<br/>'; '</div>'. '<br/>';
        }
        echo '<div class="alert alert-success" role="success">'. $totalValue .'</div>'. '<br/>';
    // print_r("Well done!!");
    }
}


// TODO: replace this if by an actual check
// $formSubmitted = false;
if (isset($_POST["submit"])) {//use if post isset to check post var_dump when reloading

    // foreach($_POST["products"] as $i => $product){
    //     echo $i;
    //     // var_dump($products[$i]["price"]);
    //     $totalValue = $products[$i]["price"];
    // }
    
    handleForm($products, $totalValue);
    // whatIsHappening();
}



// if (isset($_POST["submit"])) {
//     $checkedBox = $_POST["products"];
//     $products = $_POST["product[]"];

// if($checkedBox == 'name' && $products == 'price'){
// $totalValue = $checkedBox +  $products['price'];
//         echo'<h1 class="output">' . $totalValue . "</h1>";
// }
