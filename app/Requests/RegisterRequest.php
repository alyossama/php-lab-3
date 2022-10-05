<?php
// Initialize session
session_start();


// In this page all the validation errors will be save in the $_SESSION['validation'] array,
// Errors weill be sent to index page using session

// some common validation errors
$required = "*This field is required";
$invalid = "*Invalid entry";

// When registration form is submitted
if (isset($_POST)) {

    // Save submitted values in session to retrieve it later on validation errors
    $_SESSION['old-values'] = $_POST;

    // name validation
    if (isset($_POST['name'])) {
        if (empty($_POST['name'])) {
            $_SESSION['validation']['name-validation']['name-required'] = $required;
        } elseif (is_numeric($_POST['name'])) {
            $_SESSION['validation']['name-validation']['name-invalid'] = $invalid;
        }
    }
    // email validation
    if (isset($_POST['email'])) {
        $pattern = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
        if (empty($_POST['email'])) {
            $_SESSION['validation']['email-validation']['email-required'] = $required;
        } elseif (!preg_match($pattern, $_POST['email'])) {
            $_SESSION['validation']['email-validation']['email-invalid'] = $invalid;
        }
    }
    // course validation
    if (!isset($_POST['gender'])) {
        $_SESSION['validation']['gender-validation']['gender-required'] = $required;
    }
    // course validation
    if (!isset($_POST['courses'])) {
        $_SESSION['validation']['course-validation']['course-required'] = $required;
    }

    // redirect to index page
    header('location:../../index.php');
}
