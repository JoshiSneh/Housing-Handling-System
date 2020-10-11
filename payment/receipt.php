 <?php
      if(isset($_POST['receipt'])){
        if(!empty($_POST['receipt'])){
            $receipt = mysqli_real_escape_string($conn, trim($_POST['receipt']));
            $sql2 = "SELECT * FROM checkout WHERE check_pay_id = '$receipt' LIMIT 1";
            $result2 = mysqli_query($conn,$sql2);
            $num2 = mysqli_num_rows($result2);
            $row2 = mysqli_fetch_assoc($result2);
            if($num2 === 1){
                   echo "<script> location.href = 'receiptpage.php?msg=5' </script>";
                   echo "<div class='container shadow-lg bg-white' style='border: 2px solid ;'>
                    <h3 class='text-center mt-3 '>Yaveshu Homes</h3>
                    <h4 class='text-center text-info'>Maintenance Receipt</h4>
                    <div>
                    <h5 class='font-weight-bold'>Name - ";if (isset($row['user_name'])){ echo $row['user_name'];} echo "</h5>
                    <h5 class='font-weight-bold'> Date - "; if (isset($row2['check_date'])){ echo $row2['check_date']; } echo "</h5>
                    <h5 class='font-weight-bold'> Flat No. - ";if (isset($row['user_flatno'])){ echo $row['user_flatno']; } echo "</h5>
                    <h5 class='mt-3'>Received with thanks from <span class='text-info'>"; if (isset($row['user_name'])){ echo $row['user_name']; } echo " </span> Sum of Rs. <span class='text-info'>"; if (isset($row2['check_amount'])){ echo $row2['check_amount']; } echo " </span> by Online Payment from Yaveshu Payment Page with transaction Id <span class ='text-info'>"; if (isset($row2['check_pay_id'])){ echo $row2['check_pay_id']; } echo "</span> towards monthly Subscription as maintenance charge for the month of <span class='text-info'>"; if (isset($row2['check_pay_month'])){ echo $row2['check_pay_month']; } echo"</span>.</h5>
                    <h5 class='font-weight-bold mt-3'> Rupees - ";if (isset($row2['check_amount'])){ echo $row2['check_amount']; } echo "</h5>
                    <h5 class='text-dark mt-3'>Sneh,</h5>
                    <p class='text-dark'>(Secretary - Yaveshu Homes)</p>
                    </div>
                </div>";
                echo "<div class='text-center d-print-none mt-5'>
                        <button class='btn btn-info font-weight-bolder' onclick='window.print();'>Print</button>
                        <a href='../userdashboard.php'><button class='btn btn-info font-weight-bolder'>Back To Dashboard</button></a>
                    </div>";
            }else{
                echo "<script> location.href = 'receiptpage.php?msg=4' </script>";
            }
        }else{
           echo "<script> location.href = 'receiptpage.php?msg=3' </script>";
        }
      }
      
    ?>