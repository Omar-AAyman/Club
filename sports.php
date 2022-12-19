<?php
session_start();


// Validation Session

if (!empty($_SESSION['members'])) {
    unset($_SESSION['members']);
    header('location:subscribe.php');
    die;
}


$_SESSION['sports'] = [
    'Football' => '300',
    'Swimming' => '250',
    'Volleyball' => '150',
    'Others' => '100'
];



$memberSports;
for ($i = 1; $i <=  $_SESSION['familyMembers']; $i++) {
    global $memberSports;
            
        $memberSports .="
        <div class='form-group my-3' >
        <label class=' fs-4 fw-bold mt-3' > Member ".$i." </label>
        <input type='text' class='form-control my-3 text-center ' name='members[member". $i ."][memberName]' placeholder='Enter Member Name'required>";

        foreach ($_SESSION['sports'] as $sport => $price) {
            global $memberSports;
            $memberSports .= "<div class='form-check '>
                <input class='form-check-input' type='checkbox' id='checkbox' name='members[member". $i ."][memberSports][" . $sport ."]' value='" . $price . "' >
                <label class='form-check-label'> " .$sport ." " . $price . " EGP</label>
            </div>";
        }
        }

if ($_POST) {

       

        $_SESSION['members'] = $_POST['members'];
        header('location:result.php');
    
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="../BS5-Template/css/all.min.css" type="text/css" rel="stylesheet">
    <link href="../BS5-Template/css/bootstrap.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container py-4 my-4 bg-dark text-white text-center">
        <h2 class=" my-2 text-warning">( Your Family Members )</h2>

        <div class="row ">
            <div class="col-6 offset-3 my-3">
                <form method="Post">

                    <?= $memberSports ?>

                    <button class="btn btn-outline-warning w-25 my-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../BS5-Template/css/js/bootstrap.bundle.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>