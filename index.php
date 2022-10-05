<?php
// Start the session to receive the validation errors and old values
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css" />

    <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
    <!-- https://cdnjs.com/libraries/font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>AAST_BIS - Registration</title>

</head>
<!-- start body -->

<body>
    <div class="container">
        <!-- Start register row -->
        <div class="row my-5 justify-content-center">
            <div class="col-12 my-2">
                <p class="h1 text-center my-2">AAST_BIS Registration</p>
            </div>
            <!-- Start Message shown when successfully registered -->
            <div class="col-6">
                <?php
                if (isset($_SESSION['old-values']) && empty($_SESSION['validation'])) {


                ?>
                    <div class="alert alert-success">
                        <p>Registration success ... You input is down the page</p>
                    </div>
                <?php
                }
                ?>
                <!-- End Message shown when successfully registered -->
                <small class="text-danger my-2">* Required field</small>
                <!-- Start registration form -->
                <form class="col-12" action="./app/Requests/RegisterRequest.php" method="POST">
                    <!-- Start name input -->
                    <div class="mb-3 col-6">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input class="form-control <?php if (isset($_SESSION['old-values']['name']) && !empty($_SESSION['old-values']['name'] && !isset($_SESSION['validation']['name-validation']))) {
                                                        echo "is-valid";
                                                    } elseif (isset($_SESSION['validation']['name-validation'])) {
                                                        echo "is-invalid";
                                                    } ?>" name="name" id="name" value="<?php
                                                                                        // get submitted value if it's valid
                                                                                        if (isset($_SESSION['old-values']['name'])) {
                                                                                            echo $_SESSION['old-values']['name'];
                                                                                        } else {
                                                                                            echo "";
                                                                                        } ?>">
                        <?php
                        // name validation
                        //required
                        if (isset($_SESSION['validation']['name-validation']['name-required'])) {
                            $nameRequired = $_SESSION['validation']['name-validation']['name-required'];
                        }
                        //invalid
                        if (isset($_SESSION['validation']['name-validation']['name-invalid'])) {
                            $nameInvalid = $_SESSION['validation']['name-validation']['name-invalid'];
                        }
                        ?>
                        <small class="text-danger"><?php if (isset($nameRequired)) {
                                                        echo $nameRequired;
                                                    } elseif (isset($nameInvalid)) {
                                                        echo $nameInvalid;
                                                    } ?></small>
                    </div>
                    <!-- End name input -->
                    <!-- Start email input -->
                    <div class="mb-3 col-6">
                        <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
                        <input class="form-control <?php if (isset($_SESSION['old-values']['email']) && !empty($_SESSION['old-values']['email'] && !isset($_SESSION['validation']['email-validation']))) {
                                                        echo "is-valid";
                                                    } elseif (isset($_SESSION['validation']['email-validation'])) {
                                                        echo "is-invalid";
                                                    } ?>" name="email" id="email" value="<?php
                                                                                            // get submitted value if it's valid
                                                                                            if (isset($_SESSION['old-values']['email'])) {
                                                                                                echo $_SESSION['old-values']['email'];
                                                                                            } else {
                                                                                                echo "";
                                                                                            } ?>">
                        <?php
                        // email validation
                        //required
                        if (isset($_SESSION['validation']['email-validation']['email-required'])) {
                            $emailRequired = $_SESSION['validation']['email-validation']['email-required'];
                        }
                        //invalid
                        if (isset($_SESSION['validation']['email-validation']['email-invalid'])) {
                            $emailInvalid = $_SESSION['validation']['email-validation']['email-invalid'];
                        }
                        ?>
                        <small class="text-danger"><?php if (isset($emailRequired)) {
                                                        echo $emailRequired;
                                                    } elseif (isset($emailInvalid)) {
                                                        echo $emailInvalid;
                                                    } ?></small>
                    </div>
                    <!-- End email input -->
                    <!-- Start group # input -->
                    <div class="mb-3 col-6">
                        <label for="group-num" class="form-label">Group #</label>
                        <input type="number" class="form-control " name="group-num" id="group-num" value="<?php
                                                                                                            // get submitted value if it's valid
                                                                                                            if (isset($_SESSION['old-values']['group-num'])) {
                                                                                                                echo $_SESSION['old-values']['group-num'];
                                                                                                            } else {
                                                                                                                echo "";
                                                                                                            } ?>">
                    </div>
                    <!-- End group # input -->
                    <!-- Start class details input -->
                    <div class="mb-3 col-9">
                        <label id="class_details_label" for="class-details">Class Details</label>
                        <textarea id="class-details" name="class-details" rows="5" class="form-control"><?php
                                                                                                        // get submitted value if it's valid
                                                                                                        if (isset($_SESSION['old-values']['class-details'])) {
                                                                                                            echo $_SESSION['old-values']['class-details'];
                                                                                                        } else {
                                                                                                            echo "";
                                                                                                        } ?></textarea>
                    </div>
                    <!-- End class details input -->
                    <!-- Start gender -->
                    <label>Gender <span class="text-danger">*</span></label>
                    <div class="form-check col-2 mb-3">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="gender" value="male" <?php
                                                                                                                // get submitted value if it's valid
                                                                                                                if (isset($_SESSION['old-values']['gender']) && $_SESSION['old-values']['gender'] == 'male') {
                                                                                                                    echo "checked";
                                                                                                                } else {
                                                                                                                    echo "";
                                                                                                                } ?>>
                            Male
                        </label>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="gender" value="female" <?php
                                                                                                                    // get submitted value if it's valid
                                                                                                                    if (isset($_SESSION['old-values']['gender']) && $_SESSION['old-values']['gender'] == 'female') {
                                                                                                                        echo "checked";
                                                                                                                    } else {
                                                                                                                        echo "";
                                                                                                                    } ?>>
                            Female
                        </label>
                    </div>
                    <?php
                    // gender validation
                    //required
                    if (isset($_SESSION['validation']['gender-validation']['gender-required'])) {
                        $genderRequired = $_SESSION['validation']['gender-validation']['gender-required'];
                    } ?>
                    <div class="col-12 mb-3">
                        <small class="text-danger"><?php if (isset($genderRequired)) {
                                                        echo $genderRequired;
                                                    } ?></small>
                    </div>
                    <!-- End gender -->
                    <!-- Start Courses -->
                    <label>Select Courses <span class="text-danger">*</span></label>
                    <select class="form-select mb-3" name="courses[]" size="3" aria-label="size 3 select example" multiple>
                        <option value="php">PHP</option>
                        <option value="mysql">MySQL</option>
                        <option value="js">JavaScript</option>
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                    </select>
                    <?php
                    // course validation
                    //required
                    if (isset($_SESSION['validation']['course-validation']['course-required'])) {
                        $courseRequired = $_SESSION['validation']['course-validation']['course-required'];
                    } ?>
                    <div class="col-12 mb-3">
                        <small class="text-danger"><?php if (isset($courseRequired)) {
                                                        echo $courseRequired;
                                                    } ?></small>
                    </div>
                    <!-- End Courses -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="check-agree" class="form-check-input" id="check-agree">
                        <label class="form-check-label" for="check-agree">Agree</label>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
                <!-- End registration form -->

            </div>
        </div>
        <!-- End register row -->


        <?php
        // If there are no validation errors then start to show the input entries
        if (isset($_SESSION['old-values']) && empty($_SESSION['validation'])) {
        ?>
            <!-- Start values row -->
            <div class="row my-5 justify-content-center">
                <div class="col-6">
                    <p class="h3">Your Given values are :</p>
                    <!-- Name -->
                    <div class="row my-2">
                        <div class="col-3 fw-bold">Name</div>
                        <div class="col-8"><?= $_SESSION['old-values']['name'] ?></div>
                    </div>
                    <!-- Email -->
                    <div class="row mb-2">
                        <div class="col-3 fw-bold">Email</div>
                        <div class="col-8"><?= $_SESSION['old-values']['email'] ?></div>
                    </div>
                    <!-- Group # -->
                    <div class="row mb-2">
                        <div class="col-3 fw-bold">Group #</div>
                        <div class="col-8"><?= $_SESSION['old-values']['group-num'] ?></div>
                    </div>
                    <!-- Class details -->
                    <div class="row mb-2">
                        <div class="col-3 fw-bold">Class details</div>
                        <div class="col-8"><?= $_SESSION['old-values']['class-details'] ?></div>
                    </div>
                    <!-- Gender -->
                    <div class="row mb-2">
                        <div class="col-3 fw-bold">Gender</div>
                        <div class="col-8"><?= $_SESSION['old-values']['gender'] ?></div>
                    </div>
                    <!-- Courses -->
                    <div class="row mb-2">
                        <div class="col-3 fw-bold">Courses</div>
                        <div class="col-8">
                            <?php
                            foreach ($_SESSION['old-values']['courses'] as $index => $value) {
                                echo "$value, ";
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        <?php } ?>
        <!-- End values row -->
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
</body>
<!-- end body -->

</html>
<?php
// Unset the session to remove old validation errors
session_unset();
?>