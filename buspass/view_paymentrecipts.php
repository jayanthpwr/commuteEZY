<?php include ('head.php'); ?>
<?php include ('header1.php'); ?>

<?php include ('stud_sidebar.php'); ?>
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include ('connect.php');

$sql_currency = "select * from admin";
$result_currency = $conn->query($sql_currency);
$admin = mysqli_fetch_array($result_currency);

$sql = "SELECT * FROM `tbl_student` where id='" . $_SESSION['id'] . "'";
$result = $conn->query($sql);
$mydetail = $result->fetch_assoc();

$sql2 = "SELECT * FROM `applypass` WHERE studentid='" . $_SESSION['id'] . "'";
$result2 = $conn->query($sql2);
$applypass = $result2->fetch_assoc();
$duration = explode('-', $applypass['durationfees']);

?>
<?php
// Create a function for converting the amount in words
function AmountInWords($amount)
{
  $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
  // Check if there is any number after decimal
  $amt_hundred = null;
  $count_length = strlen($num);
  $x = 0;
  $string = array();
  $change_words = array(
    0 => '',
    1 => 'One',
    2 => 'Two',
    3 => 'Three',
    4 => 'Four',
    5 => 'Five',
    6 => 'Six',
    7 => 'Seven',
    8 => 'Eight',
    9 => 'Nine',
    10 => 'Ten',
    11 => 'Eleven',
    12 => 'Twelve',
    13 => 'Thirteen',
    14 => 'Fourteen',
    15 => 'Fifteen',
    16 => 'Sixteen',
    17 => 'Seventeen',
    18 => 'Eighteen',
    19 => 'Nineteen',
    20 => 'Twenty',
    30 => 'Thirty',
    40 => 'Forty',
    50 => 'Fifty',
    60 => 'Sixty',
    70 => 'Seventy',
    80 => 'Eighty',
    90 => 'Ninety'
  );
  $here_digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
  while ($x < $count_length) {
    $get_divider = ($x == 2) ? 10 : 100;
    $amount = floor($num % $get_divider);
    $num = floor($num / $get_divider);
    $x += $get_divider == 10 ? 1 : 2;
    if ($amount) {
      $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
      $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
      $string[] = ($amount < 21) ? $change_words[$amount] . ' ' . $here_digits[$counter] . $add_plural . ' 
       ' . $amt_hundred : $change_words[floor($amount / 10) * 10] . ' ' . $change_words[$amount % 10] . ' 
       ' . $here_digits[$counter] . $add_plural . ' ' . $amt_hundred;
    } else
      $string[] = null;
  }
  $implode_to_Rupees = implode('', array_reverse($string));
  $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
  return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
}
?>


<style>
  .table {}

  .table td,
  th {}
</style>
<div class="page-wrapper">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-primary">View Payment Receipt</h3>
    </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-10" style="margin-left: 4%;">
        <div class="card">
          <div class="card-title">
          </div>
          <div class="card-body">
            <div id='printarea'>
              <table style="width: 100%;">
                <tr>
                  <td width="10%">
                  </td>
                  <td>
                    <center>
                      <h2>TRANSPORT CORPORATION</h2>
                      <h3 style="color: red">Payment Receipt</h3>
                    </center>
                  </td>
                </tr>
              </table>
              <hr>
              <table style="width: 100%;">
                <tr>
                  <td>

                    <img class="profile-img" src="uploadImage/Profile/<?= $mydetail['image'] ?>" style="width:40%;"
                      style="height:70px;">

                    <h5>Duration:<b><?php echo $duration[0]; ?> </b></h5>
                    <h5> Fees:<b><?php echo $duration[1]; ?> </b></h5>



                  </td>

                  <td style="text-align: left;padding: 8px;">

                    <h5> Name:<b><?php echo $mydetail['sfname'] . $mydetail['slname']; ?></b></h5>


                    <h5>Address:<b><?php echo $mydetail['saddress']; ?> </b></h5>
                    <h5>Mobile No:<b><?php echo $mydetail['scontact']; ?> </b></h5>
                    <h5>Route Name:<b><?php
                    $sql3 = "SELECT * FROM `route` WHERE id='" . $applypass['route'] . "'";
                    $result3 = $conn->query($sql3);
                    $route = $result3->fetch_assoc();

                    echo $route['start'] . '-' . $route['end']; ?> </b></h5>
                    <h5>Stop From To:<b><?php
                    $sql4 = "SELECT * FROM `tariff` WHERE id='" . $applypass['stopfromto'] . "'";
                    $result4 = $conn->query($sql4);
                    $tariff = $result4->fetch_assoc();



                    echo $tariff['stopfromto']; ?> </b></h5>
                    <h5>Expiry Date:<b><?php echo $applypass['enddate']; ?> </b></h5>






                  </td>
                </tr>

              </table><br />
              <center>
                <h2> <?php



                $amt_words = $duration[1];
                // nummeric value in variable
                
                $get_amount = AmountInWords($amt_words);
                echo $get_amount;
                ?></h2>
              </center>

              <hr>
            </div>
            <a href="#"><button class="btn btn-primary" id='btn' value='Print' onclick='printFunc();'>Print</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include ('footer.php'); ?>
<script>function printFunc() {
    var divToPrint = document.getElementById('printarea');
    /*var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding;0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;*/
    htmlToPrint = divToPrint.outerHTML;
    newWin = window.open("");/*
    newWin.document.write("<h3 align='center'>SRI RAMAKRISHNA COLLEGE OF ARTS AND SCIENCE</h3>");*/
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
  }</script>