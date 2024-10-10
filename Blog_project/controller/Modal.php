<?php

session_start();

include('../config/config.php'); 

if(isset($_GET['pid'])){
    print_r($_GET['pid']);
}

if (isset($_GET['type']) && $_GET['type'] == 'list') {
    $sql = "select a.*, b.name as company_name from modal a LEFT JOIN company b ON a.company_id = b.id";
    $modal_list = mysqli_query($con, $sql);
//    $modal_list = mysqli_fetch_all($modal_list, MYSQLI_ASSOC);
    $rows = [];
    while($row = mysqli_fetch_assoc($modal_list))
    {
        $row['Action'] = '<div><a id="'.$row['id'].'" class="text-primary companyModalEdit"><i class="fa-regular fa-pen-to-square"></i></a><a id="'.$row['id'].'" class="text-danger companyModalDelete"><i class="fa-regular fa-trash-can"></i></a></div>';
        $rows[] = $row;
    }
    $results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($rows), 
        "iTotalDisplayRecords" => count($rows),
        "aaData" => $rows
    );
    echo json_encode($results);
} else if (isset($_GET['type']) && $_GET['type'] == 'addCompanyModal') {
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $company_id = $_POST['company_id'];
        $sql = "select * from modal where name='$name' and company_id='$company_id'";
        $admin = mysqli_query($con, $sql);
        $admin = mysqli_fetch_all($admin, MYSQLI_ASSOC);
        if ($admin) {
            $Data = array(
                'error' => true,
                'data' => null,
                'msg' => 'Modal Already Exist'
            );
        } else {
            $sql = "insert into `modal` (`name`, `company_id`) values ('$name', '$company_id')";
            $admin = mysqli_query($con, $sql);
            if($admin){
                $Data = array(
                    'error' => false,
                    'data' => null,
                    'msg' => 'Modal Added successfully'
                );
            } else {
                $Data = array(
                    'error' => true,
                    'data' => null,
                    'msg' => 'Something Wrong'
                );
            }
        }
        echo json_encode($Data);
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'getCompanyModalDetails') {
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "select * from modal where id='$id'";
        $admin = mysqli_query($con, $sql);
        $admin = mysqli_fetch_all($admin, MYSQLI_ASSOC);
        if ($admin) {
            $Data = array(
                'error' => false,
                'data' => $admin[0],
                'msg' => ''
            );
        } else {
            $Data = array(
                'error' => true,
                'data' => null,
                'msg' => 'Something Wrong'
            );
        }
        echo json_encode($Data);
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'editCompanyModal') {
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $company_id = $_POST['company_id'];
        $id = $_POST['id'];
        $sql = "select * from `modal` where name='$name' and company_id='$company_id' and id!='$id'";
        $admin = mysqli_query($con, $sql);
        $admin = mysqli_fetch_all($admin, MYSQLI_ASSOC);
        if ($admin) {
            $Data = array(
                'error' => true,
                'data' => null,
                'msg' => 'Modal Already Exist'
            );
        } else {
            $sql = "update `modal` set `name`='$name', company_id='$company_id' where id='$id'";
            $admin = mysqli_query($con, $sql);
            if($admin){
                $Data = array(
                    'error' => false,
                    'data' => null,
                    'msg' => 'Modal Updated successfully'
                );
            } else {
                $Data = array(
                    'error' => true,
                    'data' => null,
                    'msg' => 'Something Wrong'
                );
            }
        }
        echo json_encode($Data);
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'deleteCompanyModal') {
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "select * from modal where id='$id'";
        $admin = mysqli_query($con, $sql);
        $admin = mysqli_fetch_all($admin, MYSQLI_ASSOC);
        if ($admin) {
            $sql = "delete from modal where id='$id'";
            $admin = mysqli_query($con, $sql);
            if($admin){
                $Data = array(
                    'error' => false,
                    'data' => null,
                    'msg' => 'Modal deleted successfully'
                );
            } else {
                $Data = array(
                    'error' => true,
                    'data' => null,
                    'msg' => 'Something Wrong'
                );
            }
        } else {
            $Data = array(
                'error' => true,
                'data' => null,
                'msg' => 'Something Wrong'
            );
        }
        echo json_encode($Data);
    }
} else {
    $Data = array(
        'error' => true,
        'data' => null,
        'msg' => 'Something Wrong'
    );
    echo json_encode($Data);
}

