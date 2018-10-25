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
                  <div class="col-md-9 mb-4">

                      <!--Featured Image-->


                            <?php
                            require_once '../../core/config.php';
                            if($_GET['user_id']) {
                                $id = $_GET['user_id'];
                                $sql = "SELECT * FROM user_tbl WHERE user_id = $user";
                                $result = $connect->query($sql);
                                $data = $result->fetch_assoc();
                                ?>
                                <form method="post" action="action/send.php">
                                <div class="card wow fadeIn thin" >
                                    <div class="card-body">
                                      <div class="form-group">
                                          <label for="postForm">From</label>
                                          <input class="form-control" id="from" name="from" type="hidden" value="<?php echo $data['user_id']?>" ></input>
                                          <input class="form-control" type="text" value="<?php echo $data['username']; ?>" disabled></input>
                                      </div>
                                      <div class="form-group">
                                          <label for="postForm">To</label>
                                          <input class="form-control" id="receiver" name="receiver" type="text" required value="<?php echo $data['user_id']?>"></input>
                                      </div>
                                      <div class="form-group">
                                          <label for="postForm">Subject</label>
                                          <input class="form-control" id="subject" name="subject" type="text" required></input>
                                      </div>


                                    </div>
                                    <div class="card-footer">
                                      <div class="form-group">
                                        <textarea name="editor1" id="content"></textarea>
                                    </div>
                                         <button class="btn btn-info " type="submit">Send</button>
                                    </div>
                                </div>
                              </form>
                              <?php } ?>
                          </div>




                      </div>
                  </div>
              </div>
              <!--Grid row-->

          </section>
          <!--Section: Post-->

      </div>
  </main>
  <script>
  ClassicEditor
  .create( document.querySelector( '#content' ),
  {
      cloudServices: {
          tokenUrl: 'https://35508.cke-cs.com/token/dev/HsFzvs1xgvvwdno5qQLXFAfumf92hTtKYEzcY1yYH3KIFtf4a8RzpfNShoVM',
          uploadUrl: 'https://35508.cke-cs.com/easyimage/upload/'
      }
  }
 )
  .then( editor => {
      console.log( editor );
  } )
  .catch( error => {
      console.error( error );
  } );

  </script>
<?php include("../../layout/foot.php"); ?>
