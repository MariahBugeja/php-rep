
<?php
session_start(); 

if (isset($_SESSION['basket'])) {
    echo '<h2>Basket Contents:</h2>';
    echo '<ul>';
    foreach ($_SESSION['basket'] as $item_id) {
        /
    }
    echo '</ul>';
} else {
    echo 'Your basket is empty.';
}
?>