<?php

	$screen_shot_image = '';

	if (isset($_POST['screen_shot'])) {
		
		$url = $_POST['url'];
		$screen_shot_json_data = file_get_contents("https://www.googleapis.com/pagespeedonline/v4/runPagespeed?url=$url&screenshot=true");

		$screen_shot_result = json_decode($screen_shot_json_data, true);
		$screen_shot = $screen_shot_result['screenshot']['data'];
		$screen_shot = str_replace(array('_','-'), array('/','+'), $screen_shot);

		$screen_shot_image = '<img src="data:image/jpeg;base64,'.$screen_shot.'" class="img-responsive img-thumnail">';

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title> Website Screen Shot From URL </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron">
  <h1>  Take Website Screen Shot From URL in PHP </h1>
</div>

<div class="container">
  <form method="post">
    <div class="form-group">
      <label for="url">Enter url:</label>
      <input type="text" class="form-control" id="url" name="url" required="" />
    </div>
    <button type="submit" name="screen_shot" class="btn btn-primary"> Take a Screenshot </button>
  </form>
  <br />
  <?php

  	echo $screen_shot_image;

  ?>

</div>

</body>
</html>
