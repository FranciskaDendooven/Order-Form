<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

echo "<pre>";
print_r($_POST);
echo "</pre>";

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

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
    return [
    $email = $street =  $streetnumber = $city = $zipcode = ""];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = test_input($_POST["email"]);
      $street = test_input($_POST["street"]);
      $streetnumber = test_input($_POST["streetnumber"]);
      $city = test_input($_POST["city"]);
      $zipcode = test_input($_POST["zipcode"]);
    }
}

$orders = [];
function handleForm($products, $totalValue)
{// TODO: form related tasks (step 1)
    // $orders = [];
    for ($i = 0; $i < count($products); $i++) {
        if(isset($_POST["products"] [$i])){
        $orders = $products[$i]['name'];
        $totalValue = $products[$i]['price'] + $products[$i]['price'];
    }
    return $orders;
}

$_POST['totalValue'] = $totalValue;

    // echo "<pre>" . print_r($_POST) . "</pre>";
    //     $email = isset($_POST["email"]) ? $_POST["email"] : "";
    //     $street = isset($_POST["street"]) ? $_POST["street"] : "";
    //     $streetnumber = isset($_POST["streetnumber"]) ? $_POST["streetnumber"] : "";
    //     $city = isset($_POST["city"]) ? $_POST["city"] : "";
    //     $zipcode = isset($_POST["zipcode"]) ? $_POST["zipcode"] : "";

    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
        echo "Fill in this form correctly";
    } elseif (isset($_POST["OK"])) {
        // TODO: handle successful submission
       
    }
}

// TODO: replace this if by an actual check
$formSubmitted = false;
if ($formSubmitted) {
    handleForm($products, $totalValue);
}

require 'form-view.php';