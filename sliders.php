<?php require_once 'inc/header.php';?>

<section class="p-2 main-section mb-5">
    <main class="container">
       <div class="row ">
           <div class="col-md-6 float-start">
               <h2>Manage Sliders</h2>

           </div>
           <div class="col-md-6 ">
             
               <a class="btn btn-primary float-end" <?php echo (basename($_SERVER['PHP_SELF'])==='add-slider.php'? 'active':'')?>" href="add-slider.php"> <i class="fa fa-plus">&nbsp;</i>Add New Slider</a>
           </div>
       </div>
        <hr>
        <div class="table-responsive" >
            <table class="table table-bordered table-striped" id="tbldata">
               <thead>
                   <tr>
                       <th>Serial No.</th>
                       <th>Title</th>
                       <th>Image</th>
                       <th>Time Lt</th>
                       <th>Status</th>
                       <th>Action</th>
                   </tr>
               </thead>
                <tbody>
                        <tr>
                            <td>a</td>
                            <td>a</td>
                            <td>a</td>
                            <td>a</td>
                            <td>a</td>
                            <td>a</td>

                        </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>Serial No.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Time Lt</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                </tfoot>
            </table>

        </div>
    </main>

</section>




<?php require_once 'inc/footer.php';?>

