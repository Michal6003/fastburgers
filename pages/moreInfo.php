<?php
include '../config/dbConfig.php';
include '../partials/header.php';
include '../partials/navigation.php';


$totalOrders = $conn->prepare("SELECT
count(order_id)
 from `orders` 
");
$totalOrders->execute();
$totalOrders->store_result();
$totalOrders->bind_result($orders);
$totalOrders->fetch();

$popularPayment = $conn ->prepare("SELECT 
count(o.fk_payment_id),
p.payment_type
from `orders` o
INNER JOIN payment p ON o.fk_payment_id = p.payment_ID
group by p.payment_type
order by count(o.fk_payment_id) desc
limit 1;
");
$popularPayment->execute();
$popularPayment->store_result();
$popularPayment->bind_result($payid, $pay);
$popularPayment->fetch();


$popularLocation = $conn ->prepare("SELECT 
sl.store_location,
count(o.order_id)
from `orders` o
INNER JOIN store sl ON o.fk_store_id = sl.store_ID
group by sl.store_location
order by count(o.order_id) desc
limit 1;
");
$popularLocation->execute();
$popularLocation->store_result();
$popularLocation->bind_result($loc, $storeid);
$popularLocation->fetch();


$MostOrders = $conn ->prepare("SELECT 
count(o.fk_staff_id),
s.staff_firstname
from `orders` o
INNER JOIN staff s ON o.fk_staff_id = s.staff_ID
group by s.staff_firstname 
order by count(o.fk_staff_id) desc
limit 1;
");
$MostOrders->execute();
$MostOrders->store_result();
$MostOrders->bind_result($staffid, $sname);
$MostOrders->fetch();


?>




<div class="min-h-screen bg-yellow-600 rounded-lg flex flex-col">
<div>
<h3 class="text-base font-semibold leading-6 text-gray-900">Last 30 days</h3>

  <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
   <div class="relative overflow-hidden rounded-lg bg-gray-600 px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">

      <dt>
        
        <p class="ml-16 truncate text-sm font-medium text-gray-300">Order Count</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
      
        <p class="text-2xl font-semibold text-gray-100">    <?=$orders ?></p>
          </svg>

        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
        </div>
      </dd>
    </div>
    <div class="relative overflow-hidden rounded-lg bg-gray-600 px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
      <dt>
        
        <p class="ml-16 truncate text-sm font-medium text-gray-300">popular Payment</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-100"><?=$pay?></p>
        <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
          
        </p>
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
        </div>
      </dd>
    </div>
    <div class="relative overflow-hidden rounded-lg bg-gray-600 px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
      <dt>
        <p class="ml-16 truncate text-sm font-medium text-gray-300">Popular Location</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-100"><?=$loc?></p>
        <p class="ml-2 flex items-baseline text-sm font-semibold text-red-600">
         
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
         
        </div>
      </dd>
    </div>
    <div class="relative overflow-hidden rounded-lg bg-gray-600 px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
      <dt>
        <p class="ml-16 truncate text-sm font-medium text-gray-300">Staff who took most orders</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-100"><?=$sname?>,</p>
        
        <p class="ml-2 flex items-baseline text-sm font-semibold text-red-600">
        <p class="text-2xl font-semibold text-gray-100">orders taken <?=$staffid?></p>
         
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
         
        </div>
      </dd>
    </div>
  </dl>
</div>

<?php
include '../partials/footer.php';