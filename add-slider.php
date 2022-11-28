<?php require_once 'inc/header.php';?>

<section class="p-2 main-section mb-5">
    <main class="container">

        <div class="row mb-3 ">
            <div class="col-md-6 float-start">
                <h2>Add New Slider</h2>

            </div>

            <div class="col-md-6 ">
                <a class="btn btn-primary float-end" href="add-slider.php"> Manage Slider</a>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header bg-primary">

                    </div>
                    <div class="card-body">
                        <h3 class="card-title ">Add Slider Form</h3>
                        <hr>
                        <form action="" method="post" enctype="multipart/form-data" id="add-form">

                            <div class="mb-3 row">
                                <label for="slider-title" class="col-sm-2 col-form-label">Slider Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="slider-title" class="form-control" placeholder="Type Slider Title">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="slider-sub-title" class="col-sm-2 col-form-label"> Sub Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="slider-sub-title" class="form-control" placeholder="Type  Sub Title">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="start_date" class="col-sm-2 col-form-label"> Start Date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="start_date" class="form-control  datePicker" placeholder="Select Date : mm/dd/YYYY">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="end_date" class="col-sm-2 col-form-label"> End Date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="end_date" class="form-control datePicker" placeholder="Select Date : mm/dd/YYYY" >
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="url_1" class="col-sm-2 col-form-label">Slider URL 1</label>
                                <div class="col-sm-10">
                                    <input type="url" name="url_1" class="form-control" placeholder="https://www.example.com">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="image" class="col-sm-2 col-form-label">Slider Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="float-start" onchange="imageView(this)" >
                                    <img src="https://via.placeholder.com/80" class="imageView" alt="image" >
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10 p-2 ">
                                    <div class="form-check form-check-inline float-start">
                                        <input class="form-check-input" type="radio" name="status" id="active" value="1" checked>
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline float-start">
                                        <input class="form-check-input" type="radio" name="status" id="inactive" value="0">
                                        <label class="form-check-label" for="inactive">Inactive</label>
                                    </div>
                                </div>
                            </div>



                            <button class="btn btn-primary float-end" name="submit" id="add_slider" type="submit"><i class="fa fa-check">&nbsp;</i>Add Slider</button>

                        </form>
                    </div>
                    <div class="card-footer text-muted bg-warning">

                    </div>
                </div>

            </div>
        </div>

    </main>

</section>




<?php require_once 'inc/footer.php';?>

