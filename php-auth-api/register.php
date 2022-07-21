<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require __DIR__ . '/classes/Database.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();

function msg($success, $status, $message, $extra = [])
{
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message' => $message
    ], $extra);
}

// DATA FORM REQUEST
$data = json_decode(file_get_contents("php://input"));
$returnData = [];

if ($_SERVER["REQUEST_METHOD"] != "POST") :

    $returnData = msg(0, 404, 'Page Not Found!');

elseif (
    !isset($data->usersName)
    || !isset($data->usersEmail)
    || !isset($data->usersUid)
    || !isset($data->usersPwd)
    || !isset($data->roleid)
    || empty(trim($data->usersName))
    || empty(trim($data->usersEmail))
    || empty(trim($data->usersUid))
    || empty(trim($data->usersPwd))
    || empty(trim($data->roleid))
) :

    $fields = ['fields' => ['usersName', 'usersEmail','usersUid', 'usersPwd', "roleid"]];
    $returnData = msg(0, 422, 'Please Fill in all Required Fields!', $fields);

// IF THERE ARE NO EMPTY FIELDS THEN-
else :

    $name = trim($data->usersName);
    $email = trim($data->usersEmail);
    $uid = trim($data->usersUid);
    $password = trim($data->usersPwd);
    $roleid = trim($data->roleid);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
        $returnData = msg(0, 422, 'Invalid Email Address!');

    elseif (strlen($password) < 4) :
        $returnData = msg(0, 422, 'Your password must be at least 4 characters long!');

    elseif (strlen($name) < 3) :
        $returnData = msg(0, 422, 'Your name must be at least 3 characters long!');

    elseif (strlen($uid) < 3) :
        $returnData = msg(0, 422, 'Your userId must be at least 3 characters long!');

    elseif (strlen($roleid) < 1) :
        $returnData = msg(0, 422, 'Roleid must be at least 1 numer (0/1) !');

    else :
        try {

            $check_email = "SELECT `usersEmail` FROM `users` WHERE `usersEmail`=:usersEmail";
            $check_email_stmt = $conn->prepare($check_email);
            $check_email_stmt->bindValue(':usersEmail', $email, PDO::PARAM_STR);
            $check_email_stmt->execute();

            if ($check_email_stmt->rowCount()) :
                $returnData = msg(0, 422, 'This E-mail already in use!');

            else :
                $insert_query = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, roleid) VALUES(:usersName,:usersEmail,:usersUid,:usersPwd,:roleid)";

                $insert_stmt = $conn->prepare($insert_query);

                // DATA BINDING
                $insert_stmt->bindValue(':usersName', htmlspecialchars(strip_tags($name)), PDO::PARAM_STR);
                $insert_stmt->bindValue(':usersEmail', $email, PDO::PARAM_STR);
                $insert_stmt->bindValue(':usersUid', htmlspecialchars(strip_tags($uid)), PDO::PARAM_STR);
                $insert_stmt->bindValue(':usersPwd', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
                $insert_stmt->bindValue(':roleid', htmlspecialchars(strip_tags($roleid)) , PDO::PARAM_STR);


                $insert_stmt->execute();

                $returnData = msg(1, 201, 'You have successfully registered.');

            endif;
        } catch (PDOException $e) {
            $returnData = msg(0, 500, $e->getMessage());
        }
    endif;
endif;

echo json_encode($returnData);