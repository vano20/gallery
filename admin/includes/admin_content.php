 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>


            <?php

            $add_photo = new Photo();

            $add_photo->pht_title = "test title";
            $add_photo->pht_description = "desc";
            $add_photo->pht_filename = "gogo.png";
            $add_photo->pht_type = "image";
            $add_photo->pht_size = "5000";

            echo $add_photo->save() ? "User created/updated." : "Failed";

            // $photos = Photo::find_all();

            // $user->usr_username = "pekom01";
            // $user->usr_password = "BigBroKatakuri";
            // $user->usr_firstname = "Pekom as";
            // $user->usr_lastname = "Bigmom's pirates";

            // echo $user->save() ? "User created/updated." : "Failed";

            // foreach ($photos as $key => $value) {
                
            //     echo $value->pht_title . "<br>";

            // }

            ?>




            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->