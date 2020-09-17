<?php
require('controller/controller.php');
require('controller/graphController.php');
$action = array('insertnew','login','deco','register','edit','listbook','delete','dash');
if (isset($_GET['action']) && in_array($_GET['action'], $action)) {
    if ($_GET['action'] == 'insertnew') {
        create();
        require("view/CreateView.php");
    } elseif ($_GET['action'] == 'login') {
        require("view/LoginView.php");
        loginConnexion();
    } elseif ($_GET['action'] == 'deco') {
        deconnexion();
    } elseif ($_GET['action'] == 'register') {
        require("view/RegisterView.php");
        register();
    } elseif ($_GET['action']=='edit') {
        controledit();
        controleditimg();
        controledisplay();
    } elseif ($_GET['action']=='listbook') {
        page();
    // booksList();
    } elseif ($_GET['action'] == 'delete') {
        if (isset($_POST['suppr'])) {
            if (isset($_GET['id'])) {
                bookDelete($_GET['id']);
                page();
            }
        }
    }

} else {
    top5control();

}
