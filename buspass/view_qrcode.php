

<?php include('head.php');?>
<?php include('header1.php');?>

<?php include('stud_sidebar.php');?>   
<?php
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
 include('connect.php');

 $sql_currency = "select * from admin"; 
 $result_currency = $conn->query($sql_currency);
 $admin = mysqli_fetch_array($result_currency);

 $sql = "SELECT * FROM `tbl_student` where id='".$_SESSION['id']."'";
 $result = $conn->query($sql);
 $mydetail = $result->fetch_assoc();

 $sql2 = "SELECT * FROM `applypass` WHERE studentid='".$_SESSION['id']."'";
 $result2=$conn->query($sql2);
 $applypass=$result2->fetch_assoc();
$duration=explode('-',$applypass['durationfees']);

?>  
  <?php
// Create a function for converting the amount in words
function AmountInWords( $amount)
{
   $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
   // Check if there is any number after decimal
   $amt_hundred = null;
   $count_length = strlen($num);
   $x = 0;
   $string = array();
   $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $x < $count_length ) {
      $get_divider = ($x == 2) ? 10 : 100;
      $amount = floor($num % $get_divider);
      $num = floor($num / $get_divider);
      $x += $get_divider == 10 ? 1 : 2;
      if ($amount) {
       $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
       $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
       $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
       '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
       '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
        }
   else $string[] = null;
   }
   $implode_to_Rupees = implode('', array_reverse($string));
   $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
   return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
}
?>


<style>
  .table {
           
        }
        .table td, th {
            
        }
</style> 
<div class="page-wrapper">
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-primary">View QR Code</h3> </div>
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
              <?php 
                                    include 'connect.php';
                                    $sql = "SELECT * FROM `tbl_student` where id='".$_SESSION["id"]."'";
                                     $result = $conn->query($sql);
$i=0;
                                  $row = $result->fetch_assoc();
                                                  $qrcodetxt =$row['id'];

                                      ?>
                                      <center>
              <img src="qrcode/qr_img.php?d=<?php echo $qrcodetxt; ?>" width="200" height="200" />
            </center>
            </div>
            <a href="#"><button class="btn btn-primary" id='btn' value='Print' onclick='printDiv();'>Print</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php');?>
<script >function printFunc() {
    var divToPrint = document.getElementById('printarea');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding;0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    htmlToPrint = divToPrint.outerHTML;
    newWin = window.open("");
    //newWin.document.write("<h3 align='center'>SRI RAMAKRISHNA COLLEGE OF ARTS AND SCIENCE</h3>");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
    }</script>
    <script type="text/javascript">
  function printDiv()
{

    var divToPrint=document.getElementById('printarea');

 var newWin=window.open('','Print-Window');

 newWin.document.open();

 newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

 newWin.document.close();

 
}
</script>