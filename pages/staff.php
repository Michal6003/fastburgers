
<?php
include '../config/dbConfig.php';
include '../partials/header.php';
include '../partials/navigation.php';

$order = $conn ->prepare("SELECT
s.staff_id,
s.staff_firstname, 
s.staff_surname,
s.staff_role,
s.shift
from `staff` s 


");
$order->execute();
$order->store_result();
$order->bind_result($sId, $sname, $ssurname, $srole, $shift);

?>

<div class="min-h-screen bg-yellow-600 rounded-lg flex flex-col">
<div class="flex flex-col">
<div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5 flex-grow">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full">
   
          <thead class="bg-white border-b">
         
            <tr>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                id
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                FirstName
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                LastName 
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Role 
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Shift
              </th>
            </tr>
            
          </thead>
          <?php while($order->fetch()) : ?>
          <tbody>
            <tr class="bg-gray-100 border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $sId ?></td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <?= $sname ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <?= $ssurname ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?= $srole ?>
              </td>

              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?= $shift ?>
              </td>
              
            </tr>
            <?php endwhile ?>
           
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                
              </td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
include '../partials/footer.php';

