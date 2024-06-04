<?php
include '../config/dbConfig.php';
include '../partials/header.php';
include '../partials/navigation.php';

$order = $conn ->prepare("SELECT
o.order_id,
c.customer_name, 
r.regular_menu_type,
p.payment_type
from `orders` o 
INNER JOIN customer c ON o.fk_customer_id = c.customer_ID
INNER JOIN menu_type mt ON o.fk_menu_type_id = mt.menu_type_id
INNER JOIN regular_menu r ON mt.fk_regular_menu_id = r.regular_menu_ID
INNER JOIN payment p ON o.fk_payment_id = p.payment_ID

");
$order->execute();
$order->store_result();
$order->bind_result($oid, $cname, $menu_type, $payment);

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<div class ="bg-yellow-600"> 
<div class="flex flex-col">
  <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full">
   
          <thead class="bg-white border-b">
         
            <tr>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                order id 
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                FirstName
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                LastName 
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                payment
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Order details
              </th>
            </tr>
            
          </thead>
          <?php while($order->fetch()) : ?>
          <tbody>
            <tr class="bg-gray-100 border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                <?=$oid ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <?= $cname ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <?= $menu_type ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?= $payment ?>
              </td>
              
              <td onclick="window.location.href='orderDetails/<?= $oid ?>'"><i class="fa-solid fa-eye"></i></td>
              
            </tr>
            <?php endwhile ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
include '../partials/footer.php';