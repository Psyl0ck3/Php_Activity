<?php
session_start();

$order = $_SESSION['order'];
$quantity = $_SESSION['quantity'];
$cash = $_SESSION['cash'];
$total_price = $_SESSION['total_price'];
$change = $_SESSION['change'];
$date_time = $_SESSION['date_time'];
    
if (isset($_SESSION['error_message'])) {
    echo '<h1 style="border-style: dotted; border-color: red;">' . $_SESSION['error_message'] . '</h1>';
    unset($_SESSION['error_message']);
} else {
    echo '<h2>Receipt</h2>';
    echo '<p>Order: ' . $order . '</p>';
    echo '<p>Quantity: ' . $quantity . '</p>';
    echo '<p>Total Price: ' . $total_price . '</p>';
    echo '<p>Cash: ' . $cash . '</p>';
    echo '<p>Change: ' . $change . '</p>';
    echo '<p>Date and Time: ' . $date_time . '</p>';
}
