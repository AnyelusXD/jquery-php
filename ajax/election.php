<?php
session_start();

/* check if AJAX request  */
if(!empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) == "xmlhttprequest") {

    $errors = array();     //array that will contain the errors if any
    $success = false;      //whether the ajax post and user creation are successful. Initial assumption is false

    /*
     * Unserialize the form data via parse_str() function
     */
    $formData = array();
    parse_str($_POST["formData"], $formData);

    if(isset($_SESSION["token"]) && $_SESSION["token"] === $formData["_token"])  //if tokens match
    {
        /*
         * Checking if posted fields are empty string (just in case) - e.g. user typing only whitespaces instead of actual name, email, username, password
         */
        if(trim($formData["years"]) == "")
        {
            $errors[] = "Name field can't be blank.";
        }
        if(trim($formData["votecount"]) == "")
        {
            $errors[] = "Email field can't be blank.";
        }
        if(trim($formData["politicalparty"]) == "")
        {
            $errors[] = "Email must be a valid email address.";
        }
        if(trim($formData["codecounty"]) == "")
        {
            $errors[] = "Username field can't be blank.";
        }

        require_once '../app/db.php';

        /*
         * If there is user already registered with submitted email or username
         */


        /*
         * If no errors, create the user in database and sign in the user
         */
        if(empty(false))
        {


            $create_user = $db->prepare("INSERT INTO election(years, votecount, politicalparty, codecounty) VALUES(:years, :votecount, :politicalparty, :codecounty)");
            $create_user->execute(array(
                ":years" => $formData["years"],
                ":votecount" => $formData["votecount"],
                ":politicalparty" => $formData["politicalparty"],
                ":codecounty" => $formData["codecounty"]
            ));
            $user_id = $db->lastInsertId();

            $success = true;
        }
    }
    echo json_encode(array("errors" => $errors, "success" => $success));
}
