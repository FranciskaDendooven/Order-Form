<?php // This file is mostly containing things for your view / html ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>VibeUp</title>
</head>
<body>
<div class="orderSummary">
<?php echo $orderSummary ?>
</div>

<div class="container">
    <h1>Vibe Up Your Life. For Her and Him</h1>
    <h2>Place your order</h2>
    <?php // Navigation for when you need it ?>
    <?php /*
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>
    */ ?>

    <form method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>"/>
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" value="<?php if(isset($_SESSION['street'])){echo $_SESSION['street'];}?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="<?php if(isset($_SESSION['streetnumber'])){echo $_SESSION['streetnumber'];}?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" value="<?php if(isset($_SESSION['city'])){echo $_SESSION['city'];}?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode:</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php if(isset($_SESSION['zipcode'])){echo $_SESSION['zipcode'];}?>">
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products as $i => $product): ?>
                <label>
					<?php // <?= is equal to <?php echo ?>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?= number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
        </fieldset>


        <button type="submit" name="submit" class="btn btn-primary">Order!</button>
    </form>
    <footer>You already ordered <strong>&euro; <?php echo $_POST['totalValue'] ?></strong></footer>
    
</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>