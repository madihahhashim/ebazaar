<!DOCTYPE html>
<?php
function modalTitle($op)
{
	if($op == 'success')
		$title = 'Berjaya!';
	else
		$title = 'Amaran!';

	return $title;
}
function modalMessage($op)
{
	if($op == 'success')
		$msg = 'Data subjek telah berjaya disimpan.';
	else if($op == 'errkod')
		$msg = 'Data subjek telah ada. Sila tetapkan subjek yang lain.';

	return $msg;
}

if(isset($_POST['simpan']))
{
  include("connection/connection.php");


$sbjcode =strtoupper($_POST['sbjcode']);
$sbjname =strtoupper($_POST['sbjname']);


$duplicate = "SELECT sbjcode FROM subjects WHERE sbjcode = '$sbjcode'";
$check = mysqli_query($conn,$duplicate);
$checkrows = mysqli_num_rows($check);

if ($checkrows > 0)
{
  header("Location: tambah_subjek?op=errkod");
  return false;
}
else
{
  $query = "INSERT INTO subjects(sbjcode, sbjname)VALUES('$sbjcode', '$sbjname')";
}

if (!mysqli_query($conn, $query)) 
{
  echo "<script>
  $(document).ready(function(){
    $('#myModal').modal('show');
  });
    </script>";

header("Location: tambah_subjek?op=errkod");
} 
else 
{
  echo "<script>
  $(document).ready(function(){
    $('#myModal').modal('show');
  });
    </script>";

header("Location: tambah_subjek?op=success");
}

//echo $query;
}

?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>e-SPBTSKRIP</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script language="javascript">
    function checkic()
    {
      var found = false;
      var ic = document.login.icno.value;
      if(ic =="")
      {
        alert("Please enter your ic no!");
        found = true;
      }
      return found;
      //alert(ic);
    }
  </script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script type='text/javascript'>
	<?php if(isset($_GET['op'])) { ?>
			var document;
			$(document).ready(function(){
				$('#myModal').modal('show');
			});
	<?php } ?>
	</script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->  
<?php
include('pagesfunction/sidebarmenu.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          
          <!-- DataTales Example -->
          <div class="shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-warning">TAMBAH MATA PELAJARAN</h6>
              
           
            </div>
            <div class="card-body">
            
            <form name="datastudent" class="user" method="post" action = "tambah_subjek">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="sbjcode" placeholder="Kod Subjek">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="sbjname" placeholder="Mata Pelajaran" required>
                  </div>
              <input type="submit" name="simpan" value="Simpan" class="btn bg-warning text-white btn-block" />

              </form>
              
</div>
              

            </div>
                
              </div>
            </div>
          </div>
 <!--Contoh modal -->

<!-- Logout Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">
									<?php if(isset($_GET['op'])) { echo modalTitle($_GET['op']); } ?>
								</h4>
							</div>
							<div class="modal-body">
								<p><?php if(isset($_GET['op'])) { echo modalMessage($_GET['op']); } ?></p>
							</div>
          </button>
          <div class="modal-footer">
          <button class="btn btn-warning" type="button" data-dismiss="modal">OK</button>
        </div>
        </div>
       
    </div>
  </div>
      <!--End modal -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


</body>

</html>
