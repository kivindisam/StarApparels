<?php
include_once "header.php";
require_once 'includes/dbh.inc.php';

// Dependents data
$order_query = "SELECT * FROM ordertable";
$orders = mysqli_query($conn, $order_query);
$order_count = mysqli_num_rows($orders);

// Customers data
$customer_query = "SELECT * FROM customer";
$customers = mysqli_query($conn, $customer_query);
$customer_count = mysqli_num_rows($customers);

?>
<div class="container">
  <div class="order-form">
    <h1>Star Apparels</h1>
    <h3>Add Order</h3>
    <form action="includes/order.inc.php" method="post">
      <select select name="CustomerID" id="CustomerID" required>
        <option hidden value="">Customer</option>
        <?php foreach ($customers as $key => $customer) : ?>
          <option value="<?php echo $customer['CustomerID']; ?>"><?php echo $customer['CustomerName']; ?></option>
        <?php endforeach; ?>
      </select>
      <input type="text" id="OrderIdentifier" name="OrderIdentifier" placeholder="Order Identifier" required>
      <input type="number" id="quantity" name="quantity" placeholder="Quantity" required>
      <input type="text" id="issuedate" name="issuedate" placeholder="Date Issued" required>
      <input type="text" id="finishdate" name="finishdate" placeholder="Due Date" required>
      <button name="submit" type="submit">Add</button>
    </form>
  </div>

  <div class="orders">
    <h3>Orders</h3>
    <table>
      <header>
        <tr>
          <th>Order ID</th>
          <th>Order Identifier</th>
          <th>Quantity</th>
          <th>Date Issued</th>
          <th>Due Date</th>
          <th>Customer</th>
        </tr>
      </header>

      <body>
        <?php foreach ($orders as $order) : ?>
          <tr>
            <td><?php echo $order['OrderID']; ?></td>
            <td><?php echo $order['OrderIdentifier']; ?></td>
            <td><?php echo $order['Quantity']; ?></td>
            <td><?php echo $order['OrderIssueDate']; ?></td>
            <td><?php echo $order['OrderFinishedDate']; ?></td>
            <td><?php echo $order['CustomerName']; ?></td>
          </tr>
        <?php endforeach; ?>
        <?php if ($order_count < 1) : ?>
          <tr>
            <td class="text-center" colspan="6">No data available</td>
          </tr>
        <?php endif; ?>
      </body>
    </table>
  </div>
</div>
<?php
include_once "footer.php";
?>