 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>


            <?php

            $user_ob = new User();

            $user_ob->usr_username  = "Student";
            $user_ob->usr_password  = "student_password";
            $user_ob->usr_firstname = "The Student";
            $user_ob->usr_lastname  = "Oldboy";

            echo $user_ob->save() ? "User created/updated." : "Failed";

            // $user = User::find_user_by_id(5);

            // $user->usr_username = "pekom01";
            // $user->usr_password = "BigBroKatakuri";
            // $user->usr_firstname = "Pekom as";
            // $user->usr_lastname = "Bigmom's pirates";

            // echo $user->save() ? "User created/updated." : "Failed";


            // $user->delete();


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