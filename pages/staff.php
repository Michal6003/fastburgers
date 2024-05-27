
<?php
include '../config/dbConfig.php';
include '../partials/header.php';
include '../partials/navigation.php';

$order = $conn ->prepare("SELECT
s.staff_firstname, 
s.staff_surname,
s.staff_role,
st.store_location
from `orders` o 
INNER JOIN staff s ON o.fk_staff_id = s.staff_ID
INNER JOIN store st ON o.fk_store_id = st.store_ID


");
$order->execute();
$order->store_result();
$order->bind_result($sname, $ssurname, $srole, $sloc);

?>


<div class ="bg-yellow-600"> 
<div class="flex flex-col">
  <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full">
   
          <thead class="bg-white border-b">
         
            <tr>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                FirstName
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                LastName 
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                order
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                payment
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Location
              </th>
            </tr>
            
          </thead>
          <?php while($order->fetch()) : ?>
          <tbody>
            <tr class="bg-gray-100 border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"></td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <?= $sname ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <?= $ssurname ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <?= $srole ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <?= $sloc?>
              </td>
            </tr>
            <?php endwhile ?>
            <tr class="bg-white border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                
              </td>
            </tr>
            <tr class="bg-gray-100 border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                
              </td>
            </tr>    
            <tr class="bg-white border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">4</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            
              </td>
            </tr>
            <tr class="bg-gray-100 border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">5</td>
              <td colspan="2" class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                
              </td>
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

