<?php
$db = new PDO('sqlite:db/messagedb.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$message_sent = false;
if (isset($_REQUEST['name']) && isset($_REQUEST['message']) && $_REQUEST['name'] != '' && $_REQUEST['message'] != '') {
    $stmt = $db->prepare("INSERT INTO messages (user, message, dt) VALUES (:username, :message, datetime('now'))");
    $stmt->bindParam(':username', $_REQUEST['name']);
    $stmt->bindParam(':message', $_REQUEST['message']);
    $stmt->execute();
    $message_sent = true;
}


?>
<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="/icon.png" />
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Message Platform</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">
    <div class="row">
    <div class="col-md-12">
       <h1>Send your message.</h1>
        <p>

<?php if ($message_sent) { ?>
<div class="alert alert-success" role="alert"><strong>Very good!<strong> You sent your message correctly.</div>
<?php } ?>


        <form method="post">
        <div class="form-group">
            <label for="name">Nom</label>
             <input type="text" class="form-control" id="name" name="name" placeholder="Escriugui el seu nom"
        </div>
        <div class="form-group">
            <label for="message">Missatge</label>
            <textarea maxlength="119" class="form-control" id="message" name="message" rows="3" placeholder="Escrigui el missatge"></textarea>
        </div>
       <button type="submit" class="btn btn-default">Entra</button>
      </form>



<br></br>




  <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Message History</a></li>
      <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Commands</a></li>
      
    </ul>
    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledBy="home-tab">
        <p><?php
$stmt = $db->query('SELECT user, message, dt FROM messages ORDER BY dt DESC LIMIT 10');

foreach($stmt as $row) {
?>
<div class="media">
  <a class="media-left" href="#">
    <img src="/icon.png" alt="">
  </a>
  <div class="media-body">
    <h4 class="media-heading"><?php echo(htmlspecialchars($row['user'])); ?></h4>
    <?php echo(htmlspecialchars($row['message'])); ?>
  </div>
</div>
<?php
}
?></p>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledBy="profile-tab">
        <p> <table class="table table-condensed">
    <thead>
      <tr>
        <th>Commands</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>/command 1 on</td>

      </tr>
      <tr>
        <td>/command 1 off</td>

      </tr>
      <tr>
        <td>/command 2 on</td>

      </tr>
      <tr>
        <td>/command 2 off</td>

      </tr>
      <tr>
        <td>/command 3 on</td>

      </tr>
      <tr>
        <td>/command 3 off</td>

      </tr>
      <tr>
        <td>/command 4 on</td>

      </tr>
      <tr>
        <td>/command 4 off</td>

      </tr>
      <tr>
        <td>/command 5 on</td>

      </tr>
      <tr>
        <td>/command 5 off</td>

      </tr>
      <tr>
        <td>/command 6 on</td>

      </tr>
      <tr>
        <td>/command 6 off</td>

      </tr>
      <tr>
        <td>/command garaig on</td>

      </tr>
      <tr>
        <td>/command garaig off</td>

      </tr>
      <tr>
        <td>/command on</td>

      </tr>
      <tr>
        <td>/command off</td>

      </tr>
      <tr>
        <td>/command on</td>
        
      </tr>
      <tr>
        <td>/command off</td>

      </tr>
      <tr>
        <td>/command on</td>

      </tr>
      <tr>
        <td>/command off</td>

      </tr>
    </tbody>
  </table></p>
      </div>
      
  </div>
</body>
        </p>
    </div>
  </div>
</div>   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
