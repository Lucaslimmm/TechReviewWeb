<?php
require 'includes/dbh.inc.php';
$college_id = $_GET['college_id'];
$page_id = 1;
try {
    $pdo = new PDO('mysql:host=' . $servername . ';dbname=' . $dbName . ';charset=utf8', $dbUsername);
} catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to database!');
}
echo '<script>console.log("Entered reviews");</script>';
// Below function will convert datetime to time elapsed string.
function time_elapsed_string($datetime, $full = false)
{
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array('y' => 'year', 'm' => 'month', 'w' => 'week', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second');
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

// Page ID needs to exist, this is used to determine which reviews are for which page.
if (isset($page_id)) {
    if (isset($_POST['name'], $_POST['rating'], $_POST['content'])) {
        // Insert a new review (user submitted form)
        $stmt = $pdo->prepare('INSERT INTO techreviewweb.reviews (name, content, rating, submit_date) VALUES (?,?,?,?,NOW())');
        $stmt->execute(
            [$college_id, 
            $_POST['subject'], 
            1, 
            $_POST['name'], 
            $_POST['content'], 
            $_POST['rating']]
        );
        $update_rating_query = "UPDATE colleges 
                    SET overall_rating = 
                        (SELECT CAST(AVG(rating) 
                            AS DECIMAL(10,1)) 
                        AS overall_rating 
                        FROM college_website.reviews 
                        WHERE college_id ={$college_id})
                    WHERE college_id = {$college_id}";
        $pdo->query($update_rating_query);

        //$stmt->execute([$college_id,$_GET['page_id'], $_POST['name'], $_POST['content'], $_POST['rating']]);
        exit('Your review has been submitted!');
    }
    // Get all reviews by the Page ID ordered by the submit date
    $stmt = $pdo->prepare('SELECT * FROM college_website.reviews WHERE college_id ='.$college_id.' ORDER BY submit_date DESC');
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Get the overall rating and total amount of reviews
    $stmt = $pdo->prepare('SELECT AVG(rating) AS overall_rating, COUNT(*) AS total_reviews FROM college_website.reviews WHERE college_id ='.$college_id.'');
    $stmt->execute();
    $reviews_info = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    exit('Please provide the page ID.');
}

// brute force the fix lmao 
//$sql_all_subjects =  $pdo->prepare("SELECT * from `subjects`");
$all_subjects = $pdo->query("SELECT * from `subjects`")->fetchAll(PDO::FETCH_ASSOC);


$sql_subjets = $pdo->prepare("SELECT `subjects`.`name`, `subjects`.`subject_id`
FROM `collegesandsubjects` 
LEFT JOIN `subjects` ON `collegesandsubjects`.`subject_id` = `subjects`.`subject_id` 
WHERE `collegesandsubjects`.`college_id` = '.$college_id.' AND `subjects`.`subject_id` = `collegesandsubjects`.`subject_id`");
$sql_subjets->execute();

$subjects = $sql_subjets->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="overall_rating">
    <span class="num"><?= number_format($reviews_info['overall_rating'], 1) ?></span>
    <span class="stars"><?= str_repeat('&#9733;', round($reviews_info['overall_rating'])) ?></span>
    <span class="total"><?= $reviews_info['total_reviews'] ?> reviews</span>
</div>
<a href="#" class="write_review_btn">Write Review</a>
<div class="write_review">
    <form>
        <input name="name" type="text" placeholder="Your Name" required>
        <input name="rating" type="number" min="1" max="5" placeholder="Rating (1-5)" required>
        
        <select class="subject" name="subject">
        <?php foreach ($subjects as $subject) : ?>
            <option value="<?=$subject["subject_id"]?>"><?= $subject["name"] ?></option>
        <?php endforeach ?>
        </select> 

        <textarea name="content" placeholder="Write your review here..." required></textarea>
        <button type="submit">Submit</button>
    </form>
    
</div>
<?php foreach ($reviews as $review) : ?>
    <div class="review">
        <?php

        ?>
        <h3 class="name"><?= htmlspecialchars($review['name'], ENT_QUOTES) ?> - <?= $all_subjects[$review["subject_id"]-1]["name"] ?></h3>
        <div>
            <span class="rating"><?= str_repeat('&#9733;', $review['rating']) ?></span>
            <span class="date"><?= time_elapsed_string($review['submit_date']) ?></span>
        </div>
        <p class="content"><?= htmlspecialchars($review['content'], ENT_QUOTES) ?></p>
    </div>
<?php endforeach ?>