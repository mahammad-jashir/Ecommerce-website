<!-- File Created on 25-02-2024 4:01PM -->

<h3 class="text-center text-success">All orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success">

        <!-- 25-02-2024 4:11PM -->
        <?php
        $get_orders = "Select * from `user_orders`";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);

        //         echo "  <tr>
//     <th>SI no</th>
//     <th>Due Amount</th>
//     <th>Invoice Number</th>
//     <th>Total Products</th>
//     <th>Order Date</th>
//     <th>Status</th>
//     <th>Delete</th>
// </tr>
// </thead>
        
        // <tbody class='bg-secondary text-light''>";
        
        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No Orders Yet</h2>";
        } else {
            echo "  <tr>
               <th>SI no</th>
                <th>Due Amount</th>
                <th>Invoice Number</th>
                <th>Total Products</th>
                <th>Order Date</th>
                <th>Status</th>
                 <th>Delete</th>
             </tr>
             </thead>
            
             <tbody class='bg-light text-light''>";


            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $user_id = $row_data['user_id'];
                $amount_due = $row_data['amount_due'];
                $invoice_number = $row_data['invoice_number'];
                $total_products = $row_data['total_products'];
                $order_date = $row_data['order_date'];
                $order_status = $row_data['order_status'];
                $number++;
                echo "   <tr>
       <td>$number</td>
       <td>$amount_due</td>
       <td>$invoice_number</td>
       <td>$total_products</td>
       <td>$order_date</td>
       <td>$order_status</td>
       <td><a href=''
       <td><a href='index.php?delete_orders=<?php echo $order_id ?>' type='button' class='text-danger'
       data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
   </tr>";
            }
        }
        ?>


        </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <h4>Are you sure You want to Delete this?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_orders"
                        class="text-light text-decoration-none">No</a></button>
                <button type="button" class="btn btn-primary"><a href='index.php?delete_orders=<?php echo $order_id ?>'
                        class="text-light text-decoration-none ">Yes</a></button>
            </div>
        </div>
    </div>
</div>