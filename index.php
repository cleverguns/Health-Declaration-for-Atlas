<?php session_start(); ?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<body>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img alt="Brand" src="assets/img/e-trackr.png" height="35px"></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                    
                    <ul class="nav navbar-nav navbar-right">
                        

                        <li><a href="" data-toggle="modal">Home</a></li>
                        <li><a href="" data-toggle="modal">About</a></li>
                        <li class="dropdown">
                            <a href="admin/index.php" class="" data-toggle=""><b>Login</b></a>
                          
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</body>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
      <p id="date"></p>
      <p id="time" class="bold"></p>
    </div>
  
    <div class="login-box-body">
      <h4 class="login-box-msg">Enter Employee ID</h4>

      <form id="attendance">
          <div class="form-group">
            <select class="form-control" name="status">
              <option value="in">Time In</option>
              <option value="out">Time Out</option>
            </select>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control input-lg" id="employee" name="employee" required>
            <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
          </div>
                        <!-- health declaration here  -->

                        <div id="wrapper">
                          <label for="yes_no_radio">Do you agree to the terms?</label>
                        <p>
                        <input type="radio"  id = "Health" name="health" checked>Yes</input>
                        </p>
                        <p>
                        <input type="radio"  id = "Health" name="health">No</input>
                        </p>
                        </div>

                          

          <div class="row">
          <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="signin"><i class="fa fa-sign-in"></i> Sign In</button>
            </div>
          </div>
      </form>
    </div>


    <div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
    </div>
    <div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
    </div>
      
</div>

<?php include 'scripts.php' ?>
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  $('#attendance').submit(function(e){ 
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'attendance.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
        }
      }
    });
  });
    
});
</script>
</body>
</html>