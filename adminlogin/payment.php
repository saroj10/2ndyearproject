<?php
include('connection.php');
session_start();
$error = "";
$active = "";
?>

<div class="container">
  <h2>My Payments</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Date</th>
        <th>Receipt Number</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $stmt = $conn->query("SELECT usertable.id, usertable.email, payment.id, payment.refno, payment.amount, payment.date
          FROM usertable, payment where usertable.email = '$email' AND usertable.id = payment.id Group By payment.id");
        while ($row = $stmt->fetch()) {
      ?>
          <tr>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['refno']; ?></td>
            <td><?php echo $row['amount']; ?></td>
          </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>
</div>
