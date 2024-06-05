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
count(p.payment_ID),
p.payment_type
from `orders` o
INNER JOIN payment p ON o.fk_payment_id = p.payment_ID
order by payment_ID desc
limit 1;
");
$popularPayment->execute();
$popularPayment->store_result();
$popularPayment->bind_result($payid, $pay);
$popularPayment->fetch();

$popularLocation = $conn ->prepare("SELECT 
count(sl.store_ID),
sl.store_location
from `orders` o
INNER JOIN store sl ON o.fk_store_id = sl.store_ID
order by store_ID desc
limit 1;
");
$popularLocation->execute();
$popularLocation->store_result();
$popularLocation->bind_result($storeid, $loc);
$popularLocation->fetch();
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
  </dl>
</div>

<?php
include '../partials/footer.php';