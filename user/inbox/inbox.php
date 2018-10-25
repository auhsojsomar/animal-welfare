<?php require_once("../../core/session.php"); ?>
<?php require_once("../../core/config.php"); ?>
<?php include("../../layout/head2.php");  ?>

  <style>
        .avatar-sm {
            width: 56px;
            border-radius: 50%;
        }
        .scrollbar-deep-purple::-webkit-scrollbar-track {
          -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px; }

            .scrollbar-deep-purple::-webkit-scrollbar {
              width: 12px;
              background-color: #F5F5F5; }

              .scrollbar-deep-purple::-webkit-scrollbar-thumb {
                border-radius: 10px;
                  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
                  background-color: #512da8; }


    </style>

  <!-- Navbar -->

  <main class="mt-5 pt-5 pb-5">
      <div class="container">
          <!--Section: Post-->
          <section class="mt-4">
              <!--Grid row-->
              <div class="row">
                <div class="col-md-3 mb-4">
                  <div class=" mb-4 wow fadeIn">
                      <?php include("side.php"); ?>
                  </div>
                </div>

                  <!--Grid column-->
                  <div class="col-md-9 mb-4 example-1">

                      <!--Featured Image-->

                      <div class="card wow fadeIn thin">
                          <div class="card-body table-responsive">
                            <table class="table table-sm">
                              <thead class="grey lighten-2">
                                <tr>
                                  <th scope="col"></th>
                                  <th scope="col" class="text-center">Sender</th>
                                  <th scope="col" class="text-center">Subject</th>
                                  <th scope="col" class="text-center">Datetime</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                              </thead>
                              <tbody>

                                  <?php
                                  require_once ("../../core/config.php");
                                  $sql = "SELECT * FROM tbl_mail WHERE receiver_user_id = $user";
                                  $resultset = mysqli_query($connect, $sql) or die("database error:". mysqli_error($connect));
                                  while( $record = mysqli_fetch_assoc($resultset) ) {
                                ?>
                                <?php echo  "
                                <tr>
                                <td style='width:15%' class='text-center' ><a href='info_chat_box.php?id=".$record['mail_id']."'><i class='fas fa-sign-out-alt'></i>Read</a></td>
                                  <td style='width:20%' class='text-center'>".$record['user_id']."</td>
                                  <td style='width:50%' class='text-center'>".$record['mail_subject']."</td>
                                  <td style='width:20%' class='text-center'>".$record['mail_date']."</td>
                                    </tr>"; ?>

                              <?php } ?>
                              </tbody>
                            </table>

                              <!-- Default form reply -->

                          </div>
                      </div>
                  </div>
              </div>
              <!--Grid row-->

          </section>
          <!--Section: Post-->

      </div>
  </main>

<?php include("../../layout/foot.php"); ?>
