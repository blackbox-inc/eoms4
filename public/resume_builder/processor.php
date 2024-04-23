<?php

require 'connect.php';
session_start();

$type = 'DHA-0';
$code = 'DHA';

if (isset($_POST['username'])) {
    if ($code == 'DHB') {
        echo UserAccount('B');
    }

    if ($code == 'DHA') {
        echo UserAccount('O');
    } else {
        echo UserAccount($code);
    }
}

function UserAccount($Code)
{
    require 'connect.php';
    $today = date('y');
    $bcodestringformat = 'EOMS' . $today . $Code . '%';
    $getLast = $db->query(
        "SELECT * FROM c_information where bcode LIKE '" .
            $bcodestringformat .
            "' ORDER BY id DESC LIMIT 1"
    );

    if ($getLast->num_rows != 0) {
        while ($rows = $getLast->fetch_assoc()) {
            $bcode = $rows['bcode'];
            list($q, $w) = explode('EOMS' . $today . $Code, $bcode);
            $new2 = $w + 1;
            $results =
                'EOMS' . $today . $Code . str_pad($new2, 5, '0', STR_PAD_LEFT);

            return $results;
        }
    } else {
        return 'EOMS' . $today . $Code . str_pad(1, 5, '0', STR_PAD_LEFT);
    }
}

if (isset($_POST['MainBarcode'])) {
    $MainBarcode = $_POST['MainBarcode'];
    $school = $_POST['school'];
    $degree = $_POST['degree'];
    $school_year = $_POST['school_year'];

    $db->query("INSERT INTO c_educ (u_num, school, degree, `year`)
    VALUES ('$MainBarcode', '$school', '$degree','$school_year')");

    echo 'Education Added';
}

// DELETE EDUC DATA
if (isset($_POST['id_delete_educ'])) {
    $id = $_POST['id_delete_educ'];
    $db->query("DELETE FROM c_educ WHERE id='$id'");
}

// ADD FROM EXPERIENCE DATA
if (isset($_POST['cposition'])) {
    $bcode = $_POST['bcode'];
    $cposition = $_POST['cposition'];
    $ccompany = $_POST['ccompany'];
    $cdate = $_POST['cdate'];
    $editor102 = $_POST['editor102'];

    $db->query("INSERT INTO c_experience (u_num, cposition, ccompany, cdate, cdesc)
    VALUES ('$bcode', '$cposition', '$ccompany','$cdate', '$editor102')");

    echo 'NEW EXPERIENCE ADDED';
}

// UPDATE FROM EXPERIENCE DATA
if (isset($_POST['Editcposition'])) {
    $id = $_POST['id'];
    $Editcposition = $_POST['Editcposition'];
    $Editccompany = $_POST['Editccompany'];
    $Editcdate = $_POST['Editcdate'];
    $Editeditor102 = $_POST['Editeditor102'];

    $db->query("UPDATE c_experience
    SET cposition = '$Editcposition', ccompany = '$Editccompany', cdate = '$Editcdate', cdesc = '$Editeditor102' 
    WHERE id ='$id'");

    echo 'SUCCESSFULLY UPDATED';
}

// DELETE FROM EXPERIENCE DATA
if (isset($_POST['id_expDelete'])) {
    $id = $_POST['id_expDelete'];
    $db->query("DELETE FROM c_experience WHERE id='$id'");
}

// UPDATE FROM SKILL
if (isset($_POST['editorskill101'])) {
    $bcode = $_POST['bcode'];
    $editorskill101 = $_POST['editorskill101'];

    $db->query("UPDATE c_skills
    SET sdesc = '$editorskill101' WHERE u_num ='$bcode'");

    echo 'SKILL SUCCESSFULLY UPDATED';
}

// ADD DATA FROM SKILL
if (isset($_POST['SAVEeditorskill101'])) {
    $bcode = $_POST['bcode'];
    $SAVEeditorskill101 = $_POST['SAVEeditorskill101'];

    $db->query("INSERT INTO c_skills (u_num, sdesc)
    VALUES ('$bcode', '$SAVEeditorskill101')");

    echo 'SKILL SUCCESSFULLY ADDED';
}

// ADD DATA FROM TRAININGS AND SEMINARS
if (isset($_POST['seminarANDtrainingSave'])) {
    $bcode = $_POST['bcode'];
    $seminarANDtrainingSave = $_POST['seminarANDtrainingSave'];

    $db->query("INSERT INTO c_st (u_num, st_desc)
    VALUES ('$bcode', '$seminarANDtrainingSave')");

    echo 'TRAININGS/SEMINARS IS SUCCESSFULLY ADDED';
}

// ADD DATA FROM TRAININGS AND SEMINARS
if (isset($_POST['seminarANDtrainingUpdate'])) {
    $bcode = $_POST['bcode'];
    $seminarANDtrainingSave = $_POST['seminarANDtrainingUpdate'];

    $db->query("UPDATE c_st
    SET st_desc = '$seminarANDtrainingSave' WHERE u_num ='$bcode'");

    echo 'TRAININGS/SEMINARS IS SUCCESSFULLY UPDATED';
}

if (isset($_POST['fullnameZo1'])) {
    $fullname = $_POST['fullnameZo1'];
    $getDupName = $db->query(
        "SELECT * FROM c_information WHERE fullname='$fullname'"
    );
    $rowCount = mysqli_num_rows($getDupName);
    if ($rowCount > 0) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['id_ni_edit'])) {
    $id = $_POST['id_ni_edit'];

    $getInfoo = $db->query("SELECT * FROM c_experience WHERE id='$id'");
    if ($getInfoo->num_rows != 0) {
        $rows = $getInfoo->fetch_assoc();

        $u_num = $rows['u_num'];
        $cposition = $rows['cposition'];
        $ccompany = $rows['ccompany'];
        $cdate = $rows['cdate'];
        $cdesc = $rows['cdesc'];

        $return_arr[] = [
            'u_num' => $u_num,
            'cposition' => $cposition,
            'ccompany' => $ccompany,
            'cdate' => $cdate,
            'cdesc' => $cdesc,
        ];

        echo json_encode($return_arr);
    } else {
        $return_arr[] = [
            'nothing' => 'nothing',
        ];

        echo json_encode($return_arr);
    }
}

if (isset($_POST['fnames'])) {
    $fullname = $_POST['fnames'];

    if ($fullname == ' ') {
    } else {
        $getallNames = $db->query(
            "SELECT * FROM c_information WHERE fullname LIKE '%$fullname%'"
        );
        while ($rows = $getallNames->fetch_assoc()) {
            echo '
             <li class="list-group-item">' .
                $rows['fullname'] .
                ' / ' .
                $rows['bcode'] .
                '</li>    
        ';
        }
    }
}

?>
