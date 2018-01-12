<?php
	session_start();
    $target = 1;
    require_once("controllers/class.CtrlGlobal.php");
    $objCtrl = new CtrlGlobal();
    if($_GET['act'] == "") $act = $_POST['act'];
    else $act = $_GET['act'];

    $out = array('error' => false);
    $username = $_POST['username'];
    $input_password = $_POST['password'];

    $sql = "SELECT concat(id_user,'#',password,'#',level) as name FROM user WHERE username = '".$username."'";
    list($id_user, $password, $level) = explode('#',$objCtrl->getName($sql));
    if($id_user != ""){
        // if(password_verify($input_password,$password)){
        if($input_password == $password){
          $_SESSION['level'] = $level;
          $_SESSION['id_user'] = $id_user;
          $out['message'] = 'Login Success';
          $out['error'] = false;
        }else{
          $out['message'] = 'Password doesnt match'; //
          $out['error'] = true;
        }
    }else{
      $out['message'] = 'User not found'; //
      $out['error'] = true;
    }
    header("Content-type: application/json");
    echo json_encode($out);
    die();
  ?>
