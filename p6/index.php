
<!DOCTYPE html>
<html>
    <head>
        <title>Baby Names</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
        
        <script> 

            function validate() {
                if(document.getElementById('girl_name').value == "" || document.getElementById('boy_name').value == "") {
                    document.getElementById('error').innerHTML = "Please fill out all fields";
                    return false;
                }

                if(/[^a-zA-Z]+$/.test(document.getElementById('girl_name').value) || /[^a-zA-Z]+$/.test(document.getElementById('boy_name').value)) {
                    document.getElementById('error').innerHTML = "*ONLY LETTERS ALLOWED/NO BLANK SPACES AFTER NAME";
                    return false;
                }
                
                return true;
            }
        </script>
      
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link type="text/css" rel="stylesheet" href="stylesheet.css">
    </head>
    
    <body>
        <?php
            
        
        if($_POST) {
            require_once 'helperFiles/connection/db_connect.php';
                
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    $data = strtolower($data);
                    $data = ucfirst($data);
                    return $data;
                }
                
             $girl_name = test_input($_POST['girl_name']);

             $boy_name = test_input($_POST['boy_name']);

            $girl_name = $db->real_escape_string($girl_name);
            $boy_name = $db->real_escape_string($boy_name);


           
           $checkGirlDB = "SELECT votes FROM girl_names WHERE name='$girl_name'";
      
            if(mysqli_num_rows($db->query($checkGirlDB)) == 0) {
                $addGirl = "INSERT INTO girl_names (id, name, votes) VALUES (NULL, '$girl_name', 1)";
                
                $queryGirl = $db->query($addGirl);
            }
            else {
                $incGirlVotes = "UPDATE girl_names SET votes = votes + 1 WHERE name = '$girl_name'";
                $db->query($incGirlVotes);
            }
                
                
                
                
                
                
                
            $checkBoyDB = "SELECT votes FROM boy_names WHERE name='$boy_name'";
      
            if(mysqli_num_rows($db->query($checkBoyDB)) == 0) {
                $addBoy = "INSERT INTO boy_names (id, name, votes) VALUES (NULL, '$boy_name', 1)";
                
                $queryBoy = $db->query($addBoy);
               
               
            }
            else {
                $incBoyVotes = "UPDATE boy_names SET votes = votes + 1 WHERE name = '$boy_name'";
                $db->query($incBoyVotes);
               
            }
                
                
        }
        ?>
        
        <div class="container-fluid">


            
            <div class="row" id="header">
                <div class="col-xs-12 text-center">
                    <h1 id="pageTitle">Fav Baby Names!</h1>
                </div>
            </div>
            
            <div class="row" id="babyNameForm">
                <div class="col-xs-12 text-center">
                    <form method="post" onsubmit="return validate()"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form">
                        <div class="form-group">
                            <label>Enter your favorite girl name:</label>
                            <input type="text" onkeyup="showGirlHint(this.value)" name="girl_name" class="form-control" id="girl_name"/>
                            <p>Suggestions: <span id="girlHint"></span></p>
                            
                        </div>
                        
                        <div class="form-group">
                            <label>Enter your favorite boy name:</label>
                            <input type="text" onkeyup="showBoyHint(this.value)" name="boy_name" class="form-control" id="boy_name"/>
                            <p>Suggestions: <span id="boyHint"></span></p>
                            
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Vote</button> 
                        
                            
                            
                            <!------AJAX autosuggest------>
                            <script>
                                function showGirlHint(str) {
                                    if(str.length == 0) {
                                        document.getElementById("girlHint").innerHTML = "";
                                        return;
                                    } else {
                                        if(window.XMLHttpRequest) {
                                            xmlhttp = new XMLHttpRequest();
                                        } else {
                                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                        }
                                        
                                        xmlhttp.onreadystatechange = function() {
                                            if(this.readyState == 4 && this.status == 200) {
                                                document.getElementById("girlHint").innerHTML = this.responseText;
                                            }
                                        };
                                        xmlhttp.open("GET", "helperFiles/getGirlHints.php?q="+str, true);
                                        xmlhttp.send(); 
                                    }

                                }
                                
                                
                                function showBoyHint(str) {
                                    if(str.length == 0) {
                                        document.getElementById("boyHint").innerHTML = "";
                                        return;
                                    } else {
                                        if(window.XMLHttpRequest) {
                                            xmlhttp = new XMLHttpRequest();
                                        } else {
                                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                        }
                                        
                                        xmlhttp.onreadystatechange = function() {
                                            if(this.readyState == 4 && this.status == 200) {
                                                document.getElementById("boyHint").innerHTML = this.responseText;
                                            }
                                        };
                                        xmlhttp.open("GET", "helperFiles/getBoyHints.php?q="+str, true);
                                        xmlhttp.send();
                                    }

                                }
                            </script>
                            
                            <span class="error"> <p id="error"></p> </span>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="row" id="formResults">
                <div class="col-xs-6 text-center" id="girlTableResults">
                    <h2>Girl Names Votes</h2>
                    <div>
                        <table id="popularGirlNames">
                            <head>
                                <tr>
                                    <th>Name</th>
                                    <th>Votes</th>
                                </tr>
                            </head>
                            
                            <tbody id="makecenter">
                                <?php
                                    if($_POST) {
                                        $result = $db->query("SELECT * FROM girl_names ORDER BY votes DESC LIMIT 10");

                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo
                                            "
                                            <tr>
                                                <td>{$row['name']}</td>
                                                <td>{$row['votes']}</td>
                                            </tr>\n";

                                        }
                                   }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="col-xs-6 text-center" id="boyTableResults">
                    <h2>Boy Name Votes</h2>
                    <div id="popularBoyNames">
                        <table id="popularBoyNames">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Votes</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                    if($_POST) {
                                        $result = $db->query("SELECT * FROM boy_names ORDER BY votes DESC LIMIT 10");

                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo
                                            "
                                            <tr>
                                                <td>{$row['name']}</td>
                                                <td>{$row['votes']}</td>
                                            </tr>\n";

                                        }
                                     }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
        </div>
        
                    <div class="col-xs-6 text-center" id="boyTableResults">
                    <div id="popularBoyNames">
                        <table id="popularBoyNames">
                            <thead>
                                <tr>
                                    <th>Top 50 Popular baby names!</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                    if($_POST) {
                                        $result = $db->query("SELECT * FROM baby_names ORDER BY votes DESC LIMIT 50");

                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo
                                            "
                                            <tr>
                                                <td>{$row['name']}</td>
                                            </tr>\n";

                                        }
                                     }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        

    </body>
</html>