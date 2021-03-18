<?php
$message = '';
echo "11111";
if (isset($_POST['uploadBtn']))
{
    echo "here";
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
    {
        // get details of the uploaded file
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // sanitize file-name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // check if file has one of the following extensions
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

        if (in_array($fileExtension, $allowedfileExtensions))
        {
            // directory in which the uploaded file will be moved
            $uploadFileDir = 'C:\Users\Henrique\Videos\gitWeb';
            $dest_path = $uploadFileDir . $newFileName;

            if(move_uploaded_file($fileTmpPath, $dest_path))
            {
                $message ='File is successfully uploaded.';
            }
            else
            {
                $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        }
        else
        {
            $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        }
    }
    else
    {
        $message = 'There is some error in the file upload. Please check the following error.<br>';
        $message .= 'Error:' . $_FILES['uploadedFile']['error'];
    }
}
$_SESSION['message'] = $message;
?>

<?php echo $message; ?>


<html lang="EN">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>


		<!-- Bootstrap.css -->
		<link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/public.css" />
		<link rel="stylesheet" type="text/css" href="css/topic.css" />
		<style>
			#uploading{
				margin-top: 20px;
				margin-left: -60px;
				overflow:hidden;
				position:absolute;
			}
			#file{
				opacity:0;
				filter:alpha(opacity=0);
				position:absolute;
			}
		</style>
	</head>

	<body style="background-color: #F6F6F6;">
		<div class="container" id="linear">
			<header style="background-color: white">
				<div class="flex-between">
					<img src="./img/logo.PNG" style="width: 170px; height: 70px;">
					<h3 class="Topicfont">Idea Forum</h3>
					<div class="right flex-center">
						<a class="btn btn-primary btn-sm" href="register.html.php" role="button" style="background-color: #606EB2;">Log out</a>
					</div>
				</div>
			</header>
			<!-- Navigation bar nav bootstrap component -->
			<ul class="nav nav-pills nav-justified">
				<!-- Click the jump page, add the active attribute to display the background color -->
				<li role="presentation"><a href="personalInfo.html.php" class=" color-000">Personal page</a></li>
				<li role="presentation"><a href="Mainpage.html" class=" color-000">Mainpage</a></li>
				<li role="presentation"><a href="ideas.html.php" class=" color-000">Ideas</a></li>
			</ul>
			<div class="flex-between report-title">
				<span class="fz-18">Title：xxxx</span>
				<span class="fz-16">Deadline：xx/xx/xx</span>
			</div>
			<div class="row flex-between kill-margin">
				<div class="login_box col-lg-9 col-md-10 col-sm-10 col-xs-12 kill-padding">
					<div class="login panel panel-info">
						<div class="panel-body">
							<form class="form">
								<div class="form-group">
									<label class="font-weight">Title：</label>
									<input class="form-control">
								</div>
								<div class="form-group">
									<label class="font-weight">Concrete idea：</label>
									<textarea class="form-control" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label class="font-weight">Topic：</label>
									<input class="form-control">
								</div>
								<div class="form-group">
                                    <form method="POST" action="upload.php" enctype="multipart/form-data">
                                        <div class="upload-wrapper">
                                            <span class="file-name">Choose a file...</span>
                                            <label for="file-upload">Browse<input type="file" id="file-upload" name="uploadedFile"></label>
                                        </div>

                                    </form>
								</div>
								<div class="form-group">
									<label class="font-weight">Submit anonymously：</label>
									<div class="radio">
										<label class="radio-inline">
											<input type="radio" name="boolean" value="1"> Yes
										</label>
										<label class="radio-inline">
											<input type="radio" name="boolean" value="1"> No
										</label>
									</div>
								</div>
								<input id="clause-btn" class="btn btn-default btn-sm" type="button" value="Show terms"  style="background-color: #606EB2;">
								<div id="clause" class="fz-16">
									<p>1:xxxxxxxxx</p>
									<p>2:xxxxxxxxx</p>
									<p>3:xxxxxxxxx</p>
									<p>4:xxxxxxxxx</p>
									<p>5:xxxxxxxxx</p>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="">Agree to all the above terms
									</label>
								</div>
								<button class="btn btn-primary btn-lg btn-block"  name="uploadBtn" value="Upload" style="background-color: #606EB2;">Upload</button>
							</form>
						</div>
					</div>
				</div>
			</div>








			<footer>
				<h4 class="textCenter">Copyright:XXX</h4>
				<h5 class="textCenter">Contant:XXX</h5>
			</footer>
		</div>



		<!-- jQuery.js -->
		<script src="./lib/jQuery/jquery-3.4.1.min.js"></script>
		<!-- Bootstrap.js -->
		<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

		<script>
			$("#clause-btn").click(function() {
				console.log($("#clause-btn").val())
				if ($("#clause-btn").val() == "Show terms") {
					$("#clause-btn").val("Hidden terms");
					$("#clause").css("display", "block");
				} else {
					$("#clause-btn").val("Show terms");
					$("#clause").css("display", "none");
				}
			})
		</script>

	</body>
</html>
