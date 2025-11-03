<?php
include '../config/loader.php';

$repo = new EmployeeRepository();
////var_dump($repo->findAll());
//$emp = $repo->findById(5);
//$emp->setFname('Barack');
//$emp->setLname('Obama');
//
//
//
//var_dump($repo->update($emp));

$repo->delete(2);