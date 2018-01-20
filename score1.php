<!DOCTYPE html>
<?php
include_once 'dbconn.php';
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 
</head>

<body>
<div class="container">
<h3>SCI</h3>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active">
  <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Donor <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#dface" role="tab" data-toggle="tab">Facebook</a></li>
                <li><a href="#dtwit" role="tab" data-toggle="tab">Twitter</a></li>
                <li><a href="#davg" role="tab" data-toggle="tab">Average</a></li>
            </ul>
  </li>  
  </li>
   <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Promoter <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#pface" role="tab" data-toggle="tab">Facebook</a></li>
                <li><a href="#ptwit" role="tab" data-toggle="tab">Twitter</a></li>
                <li><a href="#pavg" role="tab" data-toggle="tab">Average</a></li>
            </ul>
  </li>  
   <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Prospective <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#facebook" role="tab" data-toggle="tab">Facebook</a></li>
                <li><a href="#twitter" role="tab" data-toggle="tab">Twitter</a></li>
               
            </ul>
  </li>  
  
</ul>
</li>

<!-- Tab panes -->
<!-- Donor -->
<div class="tab-content">
  <div class="tab-pane active" id="davg">
  <br>
  <table class="table table-bordered">
	 <tr><th>Rank</th>
	 <th>Name</th>
<th>Facebook</th>
<th>Twitter</th>
<th>Average</th>
	 </tr>
	  <?php
          $abcd=mysqli_query($conn,"SELECT u_id,SUM(score) from user_scores as u1, user_extended as u2 where u1.ue_id=u2.ue_id AND ut_id=1  GROUP by u_id ORDER by sum(score) DESC");
            if(mysqli_num_rows($abcd)>0)
            {
				$i=1;
                while($row=mysqli_fetch_row($abcd))
                {
					?>
                    <tr>
                    	<td><?php echo $i; ?></td>
						
						<td>
						<?php $pq=mysqli_query($conn,"SELECT name from user where u_id='$row[0]'");										
						$arr=mysqli_fetch_row($pq);
						?>
						<?php echo $arr[0]; ?>
						</td>
						<td>
						<?PHP $ab=mysqli_query($conn,"SELECT score from user_scores as s,user_extended as e where e.u_id ='$row[0]' and st_id=1 AND e.ut_id=1 AND e.ue_id=s.ue_id");
						$array=mysqli_fetch_row($ab);
						?>
						<?php echo $array[0]; ?></td>
						<td>
						<?PHP $cb=mysqli_query($conn,"SELECT score from user_scores as s,user_extended as e where e.u_id='$row[0]' and st_id=2 AND e.ut_id=1 AND e.ue_id=s.ue_id");
						$abc=mysqli_fetch_row($cb);
						?>
						<?php echo $abc[0]; ?></td>
						
						<td><?php echo $row[1]; ?></td>
						 
						</tr>
                    <?php
					$i++;
				}
			}?>
	</table>
    </div>
	
	<div class="tab-pane " id="dface">
  <br>
  <table class="table table-bordered">
	 <tr><th>Rank</th>
	 <th>Name</th>
<th>Facebook</th>
<th>Twitter</th>
<th>Average</th>
	 </tr>
	  <?php
          $abcd=mysqli_query($conn,"SELECT u_id,score from user_scores as s,user_extended as e where e.u_id=u_id and st_id=1 AND e.ut_id=1 AND e.ue_id=s.ue_id order by score desc");
            if(mysqli_num_rows($abcd)>0)
            {
				$i=1;
                while($row=mysqli_fetch_row($abcd))
                {
					?>
                    <tr>
                    	<td><?php echo $i; ?></td>
						
						<td>
						<?php $pq=mysqli_query($conn,"SELECT name from user where u_id='$row[0]'");										
						$arr=mysqli_fetch_row($pq);
						?>
						<?php echo $arr[0]; ?>
						</td>
						<td><?php echo $row[1]; ?></td>
						<td>
						<?PHP $cb=mysqli_query($conn,"SELECT score from user_scores as s,user_extended as e where e.u_id='$row[0]' and st_id=2 AND e.ut_id=1 AND e.ue_id=s.ue_id");
						$abc=mysqli_fetch_row($cb);
						?>
						<?php echo $abc[0]; ?></td>
						<td>
						<?PHP $ab=mysqli_query($conn,"SELECT SUM(score) from user_scores as u1, user_extended as u2 where  u2.u_id='$row[0]' and u1.ue_id=u2.ue_id AND ut_id=1  GROUP by u_id ORDER by sum(score) DESC");
						$array=mysqli_fetch_row($ab);
						?>
						<?php echo $array[0]; ?></td>
						
						 
						</tr>
                    <?php
					$i++;
				}
			}?>
	</table>
    </div>
	
	<div class="tab-pane " id="dtwit">
  <br>
  <table class="table table-bordered">
	 <tr><th>Rank</th>
	 <th>Name</th>
<th>Facebook</th>
<th>Twitter</th>
<th>Average</th>
	 </tr>
	  <?php
          $abcd=mysqli_query($conn,"SELECT u_id,score from user_scores as s,user_extended as e where e.u_id=u_id and st_id=2 AND e.ut_id=1 AND e.ue_id=s.ue_id order by score desc");
            if(mysqli_num_rows($abcd)>0)
            {
				$i=1;
                while($row=mysqli_fetch_row($abcd))
                {
					?>
                    <tr>
                    	<td><?php echo $i; ?></td>
						
						<td>
						<?php $pq=mysqli_query($conn,"SELECT name from user where u_id='$row[0]'");										
						$arr=mysqli_fetch_row($pq);
						?>
						<?php echo $arr[0]; ?>
						</td>
						
						<td>
						<?PHP $cb=mysqli_query($conn,"SELECT score from user_scores as s,user_extended as e where e.u_id='$row[0]' and st_id=1 AND e.ut_id=1 AND e.ue_id=s.ue_id");
						$abc=mysqli_fetch_row($cb);
						?>
						<?php echo $abc[0]; ?></td>
						<td><?php echo $row[1]; ?></td>
						<td>
						<?PHP $ab=mysqli_query($conn,"SELECT SUM(score) from user_scores as u1, user_extended as u2 where  u2.u_id='$row[0]' and u1.ue_id=u2.ue_id AND ut_id=1  GROUP by u_id ORDER by sum(score) DESC");
						$array=mysqli_fetch_row($ab);
						?>
						<?php echo $array[0]; ?></td>
						
						 
						</tr>
                    <?php
					$i++;
				}
			}?>
	</table>
    </div>
	
<!-- Promoter -->	
<div class="tab-pane" id="pavg">
  <br>
  <table class="table table-bordered">
	 <tr><th>Rank</th>
	 <th>Name</th>
<th>Facebook</th>
<th>Twitter</th>
<th>Average</th>
	 </tr>
	  <?php
          $abcd=mysqli_query($conn,"SELECT u_id,SUM(score) from user_scores as u1, user_extended as u2 where u1.ue_id=u2.ue_id AND ut_id=2  GROUP by u_id ORDER by score DESC");
            if(mysqli_num_rows($abcd)>0)
            {
				$i=1;
                while($row=mysqli_fetch_row($abcd))
                {
					?>
                    <tr>
                    	<td><?php echo $i; ?></td>
						
						<td>
						<?php $pq=mysqli_query($conn,"SELECT name from user where u_id='$row[0]'");										
						$arr=mysqli_fetch_row($pq);
						?>
						<?php echo $arr[0]; ?>
						</td>
						<td>
						<?PHP $ab=mysqli_query($conn,"SELECT score from user_scores as s,user_extended as e where e.u_id ='$row[0]' and st_id=1 AND e.ut_id=2 AND e.ue_id=s.ue_id");
						$array=mysqli_fetch_row($ab);
						?>
						<?php echo $array[0]; ?></td>
						<td>
						<?PHP $cb=mysqli_query($conn,"SELECT score from user_scores as s,user_extended as e where e.u_id='$row[0]' and st_id=2 AND e.ut_id=2 AND e.ue_id=s.ue_id");
						$abc=mysqli_fetch_row($cb);
						?>
						<?php echo $abc[0]; ?></td>
						
						<td><?php echo $row[1]; ?></td>
						 
						</tr>
                    <?php
					$i++;
				}
			}?>
	
	</table>
    </div>
	
	<div class="tab-pane " id="pface">
  <br>
  <table class="table table-bordered">
	 <tr><th>Rank</th>
	 <th>Name</th>
<th>Facebook</th>
<th>Twitter</th>
<th>Average</th>
	 </tr>
	  <?php
          $abcd=mysqli_query($conn,"SELECT u_id,score from user_scores as s,user_extended as e where e.u_id=u_id and st_id=1 AND e.ut_id=2 AND e.ue_id=s.ue_id order by score desc");
            if(mysqli_num_rows($abcd)>0)
            {
				$i=1;
                while($row=mysqli_fetch_row($abcd))
                {
					?>
                    <tr>
                    	<td><?php echo $i; ?></td>
						
						<td>
						<?php $pq=mysqli_query($conn,"SELECT name from user where u_id='$row[0]'");										
						$arr=mysqli_fetch_row($pq);
						?>
						<?php echo $arr[0]; ?>
						</td>
						<td><?php echo $row[1]; ?></td>
						<td>
						<?PHP $cb=mysqli_query($conn,"SELECT score from user_scores as s,user_extended as e where e.u_id='$row[0]' and st_id=2 AND e.ut_id=2 AND e.ue_id=s.ue_id");
						$abc=mysqli_fetch_row($cb);
						?>
						<?php echo $abc[0]; ?></td>
						<td>
						<?PHP $ab=mysqli_query($conn,"SELECT SUM(score) from user_scores as u1, user_extended as u2 where  u2.u_id='$row[0]' and u1.ue_id=u2.ue_id AND ut_id=2  GROUP by u_id ORDER by sum(score) DESC");
						$array=mysqli_fetch_row($ab);
						?>
						<?php echo $array[0]; ?></td>
						
						 
						</tr>
                    <?php
					$i++;
				}
			}?>
	</table>
    </div>

<div class="tab-pane " id="ptwit">
  <br>
  <table class="table table-bordered">
	 <tr><th>Rank</th>
	 <th>Name</th>
<th>Facebook</th>
<th>Twitter</th>
<th>Average</th>
	 </tr>
	  <?php
          $abcd=mysqli_query($conn,"SELECT u_id,score from user_scores as s,user_extended as e where e.u_id=u_id and st_id=2 AND e.ut_id=2 AND e.ue_id=s.ue_id order by score desc");
            if(mysqli_num_rows($abcd)>0)
            {
				$i=1;
                while($row=mysqli_fetch_row($abcd))
                {
					?>
                    <tr>
                    	<td><?php echo $i; ?></td>
						
						<td>
						<?php $pq=mysqli_query($conn,"SELECT name from user where u_id='$row[0]'");										
						$arr=mysqli_fetch_row($pq);
						?>
						<?php echo $arr[0]; ?>
						</td>
						
						<td>
						<?PHP $cb=mysqli_query($conn,"SELECT score from user_scores as s,user_extended as e where e.u_id='$row[0]' and st_id=1 AND e.ut_id=2 AND e.ue_id=s.ue_id");
						$abc=mysqli_fetch_row($cb);
						?>
						<?php echo $abc[0]; ?></td>
						<td><?php echo $row[1]; ?></td>
						<td>
						<?PHP $ab=mysqli_query($conn,"SELECT SUM(score) from user_scores as u1, user_extended as u2 where  u2.u_id='$row[0]' and u1.ue_id=u2.ue_id AND ut_id=2  GROUP by u_id ORDER by sum(score) DESC");
						$array=mysqli_fetch_row($ab);
						?>
						<?php echo $array[0]; ?></td>
						
						 
						</tr>
                    <?php
					$i++;
				}
			}?>
	</table>
    </div>

<!-- Prospective -->	
<div class="tab-pane " id="facebook">
  <br>
  <table class="table table-bordered">
	 <tr><th>Rank</th>
	 <th>Name</th>
<th>Facebook</th>
	 </tr>
	  <?php
          $abcd=mysqli_query($conn,"SELECT u_id,score from user_scores as s,user_extended as e where e.u_id=u_id and st_id=1 AND e.ut_id=3 AND e.ue_id=s.ue_id order by score desc");
            if(mysqli_num_rows($abcd)>0)
            {
				$i=1;
                while($row=mysqli_fetch_row($abcd))
                {
					?>
                    <tr>
                    	<td><?php echo $i; ?></td>
						
						<td>
						<?php $pq=mysqli_query($conn,"SELECT name from user where u_id='$row[0]'");
						$arr=mysqli_fetch_row($pq);
						?>
						<?php echo $arr[0]; ?>
						</td>
						<td><?php echo $row[1]; ?></td>

						
						 
						</tr>
                    <?php
					$i++;
				}
			}?>
	</table>
    </div>

<div class="tab-pane " id="twitter">
  <br>
  <table class="table table-bordered">
	 <tr><th>Rank</th>
	 <th>Name</th>

<th>Twitter</th>

	 </tr>
	  <?php
          $abcd=mysqli_query($conn,"SELECT u_id,score from user_scores as s,user_extended as e where e.u_id=u_id and st_id=2 AND e.ut_id=3 AND e.ue_id=s.ue_id order by score desc");
            if(mysqli_num_rows($abcd)>0)
            {
				$i=1;
                while($row=mysqli_fetch_row($abcd))
                {
					?>
                    <tr>
                    	<td><?php echo $i; ?></td>
						
						<td>
						<?php $pq=mysqli_query($conn,"SELECT name from user where u_id='$row[0]'");										
						$arr=mysqli_fetch_row($pq);
						?>
						<?php echo $arr[0]; ?>
						</td>
						

						<td><?php echo $row[1]; ?></td>

						 
						</tr>
                    <?php
					$i++;
				}
			}?>
	</table>
    </div>
</div>
</div>

</body>
</html>

	