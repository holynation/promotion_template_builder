<?php
 $userType = $this->webSessionManager->getCurrentUserProp('user_type');
 if($userType == 'lecturer'){
 	include_once 'template/sidebar_lecturer.php';
 }else{
 	include_once 'template/sidebar_admin.php';
 }
?>