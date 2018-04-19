<?php
function convert($currency_from,$currency_to,$currency_input) {
    $amount = urlencode($currency_input);
    $from_Currency = urlencode($currency_from);
    $to_Currency = urlencode($currency_to);
    $url = 'http://finance.google.com/finance/converter?a=' . $amount . '&from=' . $currency_from . '&to=' . $currency_to;
    $data = file_get_contents($url);
        preg_match_all("/<span class=bld>(.*)<\/span>/", $data, $converted);
        $final = preg_replace("/[^0-9.]/", "", $converted[1][0]);
       return round($final, 3);
  }
$display_result = false;
$currency_to = "GBP";
$currency_from = "USD";
$currency_input = 1;
if (isset($_POST['currency_from']))
	$currency_from = $_POST['currency_from'];
if (isset($_POST['currency_to']))
	$currency_to = $_POST['currency_to'];
if (isset($_POST['currency_input']))
	$currency_input = $_POST['currency_input']; 
$currency = convert($currency_from,$currency_to,$currency_input);
$display_result = true;
echo <<<_END
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Richard Fazzio's Currency Converter</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<center>
<body  background="img/background.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text center">
                </br>
                </br>
                <h1 id="header">International Currency Converter</h1></br>
                <form method="post" action="index.php">
                    <label>Enter amount:</label>
                    <input type="text" name="currency_input" />
                    <label>Convert From</label>
                    <select name="currency_from">
                        <option value="USD">US Dollar</option>
                        <option value="EUR">Euro</option>
                        <option value="INR">Indian Rupee</option>
                        <option value="GBP">British Pound</option>
                        <option value="CAD">Canadian Dollar</option>
                    </select>
                    <br>
                    <br>
                    <label>Select currency (to):</label>
                    <select name="currency_to">
                        <option value="GBP">British Pound</option>
                        <option value="USD">US Dollar</option>
                        <option value="EUR">Euro</option>
                        <option value="INR">Indian Rupee</option>
                        <option value="CAD">Canadian Dollar</option>
                    </select>
                    <input type="submit" value="Commence Conversion!" />
                </form>
                <h1 id="result">$currency_input $currency_from = $currency $currency_to</h1>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</center>
<br>
<br>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <hr class="small">
                <span class="copyright">Copyright &copy; Richard Fazzio 2017</span>
            </div>
        </div>
    </div>
</footer>
</html>
_END;
?>