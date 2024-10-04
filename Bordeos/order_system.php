<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Menu</h2>
    <table border="1" width="200">
        <tr>
            <th>Order</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>Burger</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Fries</td>
            <td>75</td>
        </tr>
        <tr>
            <td>Steak</td>
            <td>150</td>
        </tr>
    </table>
    <br>
    <form action="" method="post">
        <label for="Order">Select an Order</label>
        <select name="order" id="order_select">
            <option value="Burger">Burger</option>
            <option value="Fries">Fries</option>
            <option value="Steak">Steak</option>
        </select>
        <br>
        <br>
        <label for="Quantity">Select an Order</label>
        <input type="number" name="quantity">
        <br>
        <br>
        <label for="Cash">Cash</label>
        <input type="number" name="cash">
        <br>
        <br>
        <input type="submit" name="btn_submit" value="Submit">

    </form>
    <?php
    if (isset($_POST['btn_submit'])) {
        $order = $_POST['order'];
        $quantity = $_POST['quantity'];
        $cash = $_POST['cash'];

        $prices = array(
            'Burger' => 50,
            'Fries' => 75,
            'Steak' => 150
        );

        $total_price = $prices[$order] * $quantity;

        if ($cash < $total_price) {
            session_start();
            $_SESSION['error_message'] = 'Sorry, balance not enough.';
            header('Location: receipt.php');
            exit;
        }

        $change = $cash - $total_price;

        $date_time = date('Y-m-d H:i:s');

        session_start();
        $_SESSION['order'] = $order;
        $_SESSION['quantity'] = $quantity;
        $_SESSION['cash'] = $cash;
        $_SESSION['total_price'] = $total_price;
        $_SESSION['change'] = $change;
        $_SESSION['date_time'] = $date_time;

        header('Location: receipt.php');
        exit;
    }
    ?>
</body>
</html>