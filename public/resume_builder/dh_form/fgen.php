<?php
session_start();
include 'connect.php';

// THIS IS TYPE
if (isset($_SESSION['code'])) {
    $Code = $_SESSION['code'];
} else {
    $Code = $_SESSION['code'] = 'DHA0';
}

function NextBarcodH($Code)
{
    include 'connect.php';
    $today = date('y');
    $bcodestringformat = 'EOMS' . $today . $Code . '%';
    $getLast = $db->query(
        "SELECT * FROM fdh where barcode LIKE '" .
            $bcodestringformat .
            "' ORDER BY id DESC LIMIT 1"
    );

    if ($getLast->num_rows != 0) {
        while ($rows = $getLast->fetch_assoc()) {
            $bcode = $rows['barcode'];
            list($q, $w) = explode('EOMS' . $today . $Code, $bcode);
            $new2 = $w + 1;
            $results = ltrim($new2, '0');
            return $results;
        }
    } else {
        return 'Please edit manually in the database to fix';
    }
}

function UserAccount($Code)
{
    include 'connect.php';
    $today = date('y');
    $bcodestringformat = 'EOMS' . $today . $Code . '%';
    $getLast = $db->query(
        "SELECT * FROM fdh where barcode LIKE '" .
            $bcodestringformat .
            "' ORDER BY id DESC LIMIT 1"
    );

    if ($getLast->num_rows != 0) {
        while ($rows = $getLast->fetch_assoc()) {
            $bcode = $rows['barcode'];
            list($q, $w) = explode('EOMS' . $today . $Code, $bcode);
            $new2 = $w;
            $results =
                'EOMS' . $today . $Code . str_pad($new2, 5, '0', STR_PAD_LEFT);

            return $results;
        }
    } else {
        return 'EOMS' . $today . $Code . str_pad(1, 5, '0', STR_PAD_LEFT);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../fpdf.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>FORM DH GENERATOR</title>
</head>

<body>
    <a href="/v2">HOME</a>
    <hr>
    <div class="container">
        <!-- <div class="row">

            <div class="col-lg-4 mb-2">
                <form action="dha.php">
                    <button type="submit" class="btn btn-outline-success btn-block btn-lg">DHA</button>
                </form>
            </div>

            <div class="col-lg-4 mb-2">
                <form action="dhb.php">
                    <button type="submit" class="btn btn-outline-dark btn-block btn-lg">DHB</button>
                </form>
            </div>

            <div class="col-lg-4 mb-2">
                <form action="dhc.php">
                    <button type="submit" class="btn btn-outline-info btn-block btn-lg">DHC</button>
                </form>
            </div>


            <div class="col-lg-4 mb-2">
                <form action="dha1.php">
                    <button type="submit" class="btn btn-outline-warning btn-block btn-lg">DHA-1</button>
                </form>
            </div>

            <div class="col-lg-4 mb-2">
                <form action="dha2.php">
                    <button type="submit" class="btn btn-outline-warning btn-block btn-lg">DHA-2</button>
                </form>
            </div>

            <div class="col-lg-4 mb-2">
                <form action="dha3.php">
                    <button type="submit" class="btn btn-outline-warning btn-block btn-lg">DHA-3</button>
                </form>
            </div>


            <div class="col-lg-4 mb-2">
                <form action="dha4.php">
                    <button type="submit" class="btn btn-outline-warning btn-block btn-lg">DHA-4</button>
                </form>
            </div>

            <div class="col-lg-4 mb-2">
                <form action="dha5.php">
                    <button type="submit" class="btn btn-outline-warning btn-block btn-lg">DHA-5</button>
                </form>
            </div>

            <div class="col-lg-4 mb-2">
                <form action="dha6.php">
                    <button type="submit" class="btn btn-outline-warning btn-block btn-lg">DHA-6</button>
                </form>
            </div>

            <div class="col-lg-4 mb-2">
                <form action="dha7.php">
                    <button type="submit" class="btn btn-outline-warning btn-block btn-lg">DHA-7</button>
                </form>
            </div>


 

        </div> -->


        <div class="card" style="width: 500px; margin: 0 auto">
            <div class="card-header">
                SELECT PARTNER/TIEUP
            </div>
            <div class="form-group m-1">
                <label for=""></label>
                <select class="form-control selecta">
                    <option value="<?php echo $_SESSION[
                        'code'
                    ]; ?>"><?php echo $_SESSION['code']; ?>
                    <option>

                        <?php
                        $getcode = $db->query(
                            "SELECT * FROM accounts WHERE username LIKE '%DH%' OR username ='ahmie' OR username='ephtai' "
                        );
                        while ($rows = $getcode->fetch_assoc()) {

                            $gcode = $rows['code'];
                            $username = $rows['username'];
                            ?>

                    <option value="<?php echo $gcode; ?>"><?php echo $username; ?> - <?php echo $rows[
     'nickname'
 ]; ?>
                    </option>

                    <?php
                        }
                        ?>


                </select>
            </div>
        </div>
    </div>



    </div>
    <div class="container">
        <br><br>
        <div class="card text-center">
            <div class="card-header">
                <h1>FORM DH GENERATOR</h1>
            </div>
            <div class="card-body">
                <!-- <form action="gen_me.php" method="post" target="_blank"> -->
                <!-- <form action="#" method="post" > -->
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">Last Barcode Generated</label>
                        <input type="text" class="form-control" name="start_page" id="last_barcode" readonly
                            value="<?php echo UserAccount($Code); ?>">
                    </div>
                    <div class="col-lg-3">
                        <label for="">Next Number to be generated</label>
                        <input type="number" class="form-control" name="start_page" id="next_barcode"
                            value="<?php echo NextBarcodH($Code); ?>">
                    </div>
                    <div class="col-lg-3">
                        <label for="">Add number to generate</label>
                        <input type="number" class="form-control" name="end_page" id="add_higher_num"
                            value="<?php echo NextBarcodH($Code); ?>">
                    </div>
                    <div class="col-lg-3">
                        <label for="">Choose Year</label>
                        <input type="number" class="form-control mb-3" name="yr_created" id="yr_created"
                            value="<?php echo date('y'); ?>">
                    </div>
                </div>
                <!-- <input type="submit" class="btn btn-dark btn-lg submit____btn mb-3" value="SAVE AND GENERATE"> -->
                <button class="btn btn-dark btn-lg submit____btn mb-3">SAVE AND GENERATE</button>
                <!-- </form> -->
                <div class="card-footer text-muted">
                    <button class="btn btn-secondary prev">PREVIEW ONLY</button>
                    <a href="/v2" class="btn btn-outline-dark">RETURN HOME</a>
                    <a href="back.pdf" class="btn btn-outline-warning" target="_blank">FORM BACK</a>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- SELECT2 -->

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!-- SWEET ALERT -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
        $('.selecta').select2({
            theme: "classic",

        });

        $('.selecta').on("change", function() {

            var selected_code = $(this).val();


            $.ajax({
                url: 'processors.php',
                type: 'POST',
                data: {
                    'selected_code': selected_code,

                },
                success: function(data) {

                    Swal.fire(
                        '-----',
                        'YOU ACTIVATE ' + data,
                        'success'
                    )

                    $('.swal2-confirm').on("click", function() {
                        location.reload();
                    });


                }
            });


        });




        $('.prev').on('click', function() {

            var next_barcode = $('#next_barcode').val();
            var add_higher_num = $('#add_higher_num').val();
            var yr_created = $('#yr_created').val();
            var url = 'gen_me_preview.php';
            var data = 'start_page=' + next_barcode + '&end_page=' + add_higher_num + '&yr_created=' +
                yr_created + '&type=<?php echo $Code; ?>'

            window.open(url + '?' + data, '_blank');


        });



        $('.submit____btn').on('click', function() {




            swal({
                    title: "Are you sure?",
                    text: "Once Generated, you will save all generated barcode in the database. Please generate min. of 50pcs ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Successfully Generated", {
                            icon: "success",
                        });

                        var next_barcode = $('#next_barcode').val();
                        var add_higher_num = $('#add_higher_num').val();
                        var yr_created = $('#yr_created').val();
                        var url = 'gen_me.php';
                        var data = 'start_page=' + next_barcode + '&end_page=' + add_higher_num +
                            '&yr_created=' + yr_created + '&type=<?php echo $Code; ?>'

                        window.open(url + '?' + data, '_blank');
                        setTimeout(
                            function() {
                                location.reload();
                            }, 2000);


                    } else {
                        swal("Generating Cancelled");
                    }
                });







        });
        </script>
</body>

</html>