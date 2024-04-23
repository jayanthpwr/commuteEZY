<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

?>

        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Tariff Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Tariff Management</li>
                    </ol>
                </div>
            </div>
           
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" action="pages/save_tariff.php" name="classform" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">
  <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Route</label>
                                                <div class="col-sm-9">
                                                    <select type="text" name="route" class="form-control"   placeholder="Class" required="">
                                                        <option value="">--Select Route--</option>
                                                            <?php  
                                                            $c1 = "SELECT * FROM `route`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"];?>">
                                                                        <?php echo $row['start'].'-'.$row['end'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"> Stop From To</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="stopfromto" class="form-control" placeholder="Stop From To" id="event" onkeydown="" required="">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Monthly</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="monthly" class="form-control" placeholder="Monthly" id="event" onkeydown="" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"> Quarterly</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="quartly" class="form-control" placeholder="Quaterly" id="event" onkeydown="" required="">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Half Yearly</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="halfyearly" class="form-control" placeholder="Half Yearly" id="event" onkeydown="" required="">
                                                </div>
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">  Yearly</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="yearly" class="form-control" placeholder="Yearly" id="event" onkeydown="" required="">
                                                </div>
                                            </div>
                                        </div>
                                        
                                         
                                       
                                        <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>

<?php include('footer.php');?>
