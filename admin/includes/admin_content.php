 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>


            <?php

            // $user_ob = new User();

            // $user_ob->usr_username  = "random user";
            // $user_ob->usr_password  = "get rekt";
            // $user_ob->usr_firstname = "lel";
            // $user_ob->usr_lastname  = "twitch";

            // $user_ob->create();

            $user = User::find_user_by_id(3);

            // $user->usr_username  = "KABOOM";

            $user->delete();


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