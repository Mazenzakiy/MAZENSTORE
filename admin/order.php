<?php

use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetails;

include("inc/header.php"); ?>

<?php

if ($request->getHas('id')) {
  $id = $request->get('id');
}

$order = new Order;
$result = $order->selectId($id, "orders.*, SUM(price*qty) AS total");

$deatil = new OrderDetails;
$resultDeatils = $deatil->selectWithProduct($id);


?>

<div class="container py-5">
  <div class="row">

    <div class="col-md-6 offset-md-3">
      <h3 class="mb-3">Show Order : <?= $result['id']; ?> </h3>
      <div class="card">
        <div class="card-body p-5">
          <table class="table table-bordered">
            <thead>
              <th colspan="2" class="text-center">Customer</th>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Name</th>
                <td><?= $result['name']; ?></td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td>
                  <?php
                  if ($result['email'] == 'NULL') {
                    echo "...";
                  } else {
                    echo $result['email']; ?></td>
              <?php     } ?>
              </tr>
              <tr>
                <th scope="row">Phone</th>
                <td><?= $result['phone']; ?></td>
              </tr>
              <tr>
                <th scope="row">Address</th>
                <td>
                  <?php
                  if ($result['address'] == 'NULL' || $result['address'] == "") {
                    echo "...";
                  } else {
                    echo $result['address']; ?></td>
              <?php     } ?>
              </tr>
              <tr>
                <th scope="row">Time</th>
                <td><?php echo date("d M,Y h:i a", strtotime($result['created_at'])); ?></td>
              </tr>
              <tr>
                <th scope="row">Status</th>
                <td><?= $result['status']; ?></td>
              </tr>
            </tbody>
          </table>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Product name</th>
                <th>Quantity</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($resultDeatils as $det) : ?>

                <tr>
                  <td><?= $det['name']; ?></td>
                  <td><?= $det['qty']; ?></td>
                  <td>$ <?= $det['price']; ?></td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Total</th>
                <?php if ($result['status'] == 'pending') { ?>
                  <th>Change Status</th>
                <?php }  ?>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>$ <?= $result['total']; ?></td>
                <?php if ($result['status'] == 'pending') { ?>

                  <td>
                    <a class="btn btn-success" href="<?= AURL . "handlers/approve.php?id=" . $result['id']; ?>">Approve</a>
                    <a class="btn btn-danger" href="<?= AURL . "handlers/cancel.php?id=" . $result['id']; ?>">Cancel</a>
                  </td>
                <?php }  ?>

              </tr>
            </tbody>
          </table>

          <a class="btn btn-dark" href="<?= AURL . 'orders.php';  ?>">Back</a>
        </div>
      </div>
    </div>

  </div>
</div>
<?php include("inc/footer.php"); ?>