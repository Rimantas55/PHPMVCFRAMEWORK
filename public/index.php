<?php

/**
 * Front controller
 */

// Require the controller class
// require '../App/Controllers/Posts.php';

/**
 * Autoloader
 */

 spl_autoload_register(function($class) {
     $root = dirname(__DIR__); // get the parent directory
     $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
     if (is_readable($file)) {
         require $root . '/' . str_replace('\\', '/', $class) . '.php';
     }
 });


/**
 * Routing
 */
//require '../Core/Router.php';

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
    
/*
// Display the routing table
echo '<pre>';
//var_dump($router->getRoutes());
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo '</pre>';


// Match the requested route
$url = $_SERVER['QUERY_STRING'];

if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "No route found for URL '$url'";
}
*/
$router->dispatch($_SERVER['QUERY_STRING']);

echo "</br> hello world </br></br></br>";
// Create array
//$fruits = ["Banana", "Apple", "Orange"];

//Print the whole array
// echo '<pre>';
// var_dump($fruits); // print_r
// echo '</pre>';

// Get element by index
// echo $fruits[1].'<br>';

// Set element by index
// how to change array value? its replace the array item with new one
//$fruits[1] = "Peach";

//Check if array has element at index 2
// how to check if array has element at choosed element?
// echo '<pre>';
// var_dump(isset($fruits[2]));  // Change age into 5
// echo '</pre>';

// Append element

// $fruits[] = 'Peach append';

// Print the length of the array
// how to find out array lenght?
// echo count($fruits).'<br>';

// Add element at the end of the array
// how to add element at the end of array?
// array_push($fruits, 'Watermellon push');

// Remove element from the end of the array
// how to remove any element from array end?
//array_pop($fruits);

// Add element at the beginning of the array
// array_unshift($fruits, 'Apple beginning');

// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// Remove element from the beginning of the array
// how to remove any element from array beginning?
// array_shift($fruits);

// Split the string into an array
// how to make array from string
// $string = "Banana,Apple,Peach";
// echo '<pre>';
// var_dump(explode(",", $string));
// echo '</pre>';

// Combine array elements into string
// how to make array to the string?
//echo implode(",", $fruits).'<br>';

// Check if element exist in the array
// how to check if such element exist in array? What kind value function will return?
// echo '<pre>';
// var_dump(in_array('Apple', $fruits));
// echo '</pre>';

// Search element index in the array
// echo '<pre>';
// var_dump(array_search("Peach", $fruits));
// echo '</pre>';

// Merge two arrays
// how to merge 2 arrays?
// $vegetables = ['Potato', 'Cucumber'];
// echo '<pre>';
// var_dump(array_merge($fruits, $vegetables));
//var_dump([...$fruits, ...$vegetables]); // Since PHP 7.4
// echo '</pre>';

// Sorting of array (Reverse order also)
// sort($fruits); //sort, rsort, usort
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// Filter, map, reduce of array
// how to find and filter all even numbers in array?
//$numbers = [1, 2, 3, 4, 5, 6, 7, 8];
// $evens = array_filter($numbers, function($n){ // fn($n) => $n % 2 === 0
//     return $n % 2 === 0;
// });
// echo '<pre>';
// var_dump($evens);
// echo '</pre>';


// array map
// function myFunction($data){
//     $sqr = $data * $data;
//     return $sqr;
// }

// $squares = array_map("myFunction", $numbers);
// echo '<pre>';
// var_dump($squares);
// echo '</pre>';

// $sum = array_reduce($numbers, fn($carry, $item) => $carry + $item);
// echo $sum.'<br>';

// Ternary if
// $age = 25;
// echo $age >= 25 ? 'you are mature' : 'you probably still student';

// 1. Print current timestamp
// echo time() . '<br>';

// 2. Print current date
// echo date('Y-m-d H:i:s') . '<br>';

// 3. Print yesterday
// echo date('Y-m-d H:i:s', time() - 60 * 60 * 24) . '<br>';

// 4. Different format: https://www.php.net/manual/en/function.date.php
// echo date('F j Y, H:i:s') . '<br>';

// 5. String to timestamp
// echo strtotime('now') . "<br>";
// echo date('Y-m-d H:i:s', time() - 60 * 60 * 24) . '<br>'; // option 1
// echo date('Y-m-d H:i:s', strtotime('+1 day')) . '<br>'; // option 2
// echo strtotime('+1 day') . "<br>";
// echo strtotime('+1 week') . "<br>";

// 6. Parse date: https://www.php.net/manual/en/function.date-parse.php
// $dateString = '2020-02-06 12:45:35'; // Declare date
// $parsedDate = date_parse($dateString); // Parse date
// echo '<pre>';
// var_dump($parsedDate);
// echo '</pre>';

// echo $parsedDate['year'];



// 7. Parse date from format
// https://www.php.net/manual/en/function.date-parse-from-format.php
// $dateString = 'February 4 2020 12:45:35'; // With non-default format

// $parsedDate = date_parse_from_format('F j Y H:i:s', $dateString);
// echo '<pre>';
// var_dump($parsedDate);
// echo '</pre>';

// server $_SERVER
// echo "<pre>";
// echo var_dump($_SERVER); $_GET
// echo "</pre>";
?>


<?php
// Do some complex form validation
// https://www.w3schools.com/php/php_form_validation.asp

// Using filters
// https://www.w3schools.com/php/php_filter.asp

define('REQUIRED_FIELD_ERROR', 'This field is required');

$errors = [];
$username = '';
$email = '';
$password = '';
$password_confirm = '';
$cv_url = '';
$postData = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = post_data('username');
    $email = post_data('email');
    $password = post_data('password');
    $password_confirm = post_data('password_confirm');
    $cv_url = post_data('cv_url');

    if (!$username) {
        $errors['username'] = REQUIRED_FIELD_ERROR;
    } else if (strlen($username) < 6 || strlen($username) > 16){
        $errors['username'] = 'Username must be less than 16 and more than 6 chars';
    }
    if (!$email) {
        $errors['email'] = REQUIRED_FIELD_ERROR;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Please enter valid email address';
    }
    if (!$password) {
        $errors['password'] = REQUIRED_FIELD_ERROR;
    }
    if (!$password_confirm) {
        $errors['password_confirm'] = REQUIRED_FIELD_ERROR;
    }
    if ($password && $password_confirm && strcmp($password, $password_confirm) !== 0){
        $errors['password_confirm'] = 'Please repeat the password correctly';
    }
    if ($cv_url && !filter_var($cv_url, FILTER_VALIDATE_URL)) {
        $errors['cv_url'] = 'Please provide a valid link address';
    }

}

function post_data($field)
{
    if (!isset($_POST[$field])) {
        return false;
    }
    $data = $_POST[$field];
    return htmlspecialchars(stripslashes(trim($data)));
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="padding: 50px;">

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" novalidate>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Username</label>
                <input class="form-control <?php echo isset($errors['username']) ? 'is-invalid' : '' ?>"
                       name="username" value="<?php echo $username ?>">
                <small class="form-text text-muted">Min: 6 and max 16 characters</small>
                <div class="invalid-feedback">
                    <?php echo $errors['username'] ?? '' ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>"
                       name="email" value="<?php echo $email ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['email'] ?? '' ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>"
                       name="password" value="<?php echo $password ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['password'] ?? '' ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Repeat Password</label>
                <input type="password"
                       class="form-control <?php echo isset($errors['password_confirm']) ? 'is-invalid' : '' ?>"
                       name="password_confirm" value="<?php echo $password_confirm ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['password_confirm'] ?? '' ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-group">
            <label>Your CV link</label>
            <input type="text" class="form-control <?php echo isset($errors['cv_url']) ? 'is-invalid' : '' ?>"
                   name="cv_url" placeholder="https://www.example.com/my-cv" value="<?php echo $cv_url ?>"/>
            <div class="invalid-feedback">
                <?php echo $errors['cv_url'] ?? '' ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary">Register</button>
    </div>
</form>

</body>
</html>


