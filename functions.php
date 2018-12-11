<?php
	include("connect.php");
	function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
        array(1 , 'second')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
	}
    function displayTweets($type) {
        
        global $link;
        
        if($type=="yourtweets")
        {
        $query = "SELECT * FROM TWEETS where USER_ID='".$_SESSION['user']."' ORDER BY `DATE_TIME` DESC LIMIT 10";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 0) 
        {
            echo "There are no tweets to display."; 
        } 
      	else 
        { 
            while ($row = mysqli_fetch_assoc($result))
            {
                
                $userQuery = "SELECT * FROM USER WHERE USER_ID ='".$_SESSION['user']."' LIMIT 1";
                $userQueryResult = mysqli_query($link, $userQuery);
                $user = mysqli_fetch_assoc($userQueryResult);
              
              	  
              echo '<li class="media list-group-item p-a"> <a class="media-left" href="#"> <img class="media-object img-circle" src="'.$user['BIO_IMG'].'"> </a>
          <div class="media-body">
            <div class="media-heading">
              <small class="pull-right text-muted">'.time_since(time()-strtotime($row['DATE_TIME'])).'</small>
              <h4>'.$user['NAME'].'</h4>
            </div>
            <p>
              '.$row['CONTENT'].'
            </p>

            <div class="media-body-inline-grid" data-grid="images">
              <img style="display: none" data-width="640" data-height="640" data-action="zoom" src="'.$row['IMG'].'">
            </div>
            <button class="glyphicon glyphicon-trash btn btn-primary delete pull-right text-muted"  data-tweet="'.$row["TWEET_ID"].'"></button>
			<button class="glyphicon glyphicon-thumbs-up btn btn-primary like pull-right text-muted"  data-tweet="'.$row["TWEET_ID"].'"></button>
        
            <p></p>
            <form action="comment.php" method="POST">
           <div class="input-group">
            <input type="textbox" class="form-control" placeholder="Comment" name="comment">
             	<input type="hidden" value="'.$row["TWEET_ID"].'" name="id">
          	<button class="btn btn-primary" align="center" type="Submit">Comment</button>
          	</div>
         	</form>
            <p></p>
            <h4>Comments-</h4>
            <p></p>';
              $query6 = "SELECT * FROM `REPLY` where TWEET_ID ='".$row['TWEET_ID']."' ORDER BY `DATE_TIME` DESC LIMIT 3";
        		$result6 = mysqli_query($link, $query6);
        		if (mysqli_num_rows($result6) == 0) 
       			 {
            	echo "There are no Comments to Display"; 
        		} 
      			else 
        		{
               while ($row3 = mysqli_fetch_assoc($result6))
            	{
              	$query4="SELECT * FROM `USER` WHERE USER_ID='".$row3['USER_ID']."';";
              	$result4=mysqli_query($link,$query4);
              	$row4=mysqli_fetch_assoc($result4);
              
           		 echo'<ul class="media-list">
              <li class="media">
                <a class="media-left" href="#">
                  <img
                    class="media-object img-circle"
                    src="'.$row4['BIO_IMG'].'">
                </a>
                <div class="media-body">
                  <strong>'.$row4['NAME'].': </strong>
                 	'.$row3['CONTENT'].'
                </div>
              </li>
            </ul>
            <p></p>';
            }
                }
            
            }
        }
        }
        else if($type=="notify")
        {
        $query = "SELECT * FROM NOTIFICATION where NOTIFIER_ID='".$_SESSION['user']."' ORDER BY `DATE_TIME` DESC LIMIT 5";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 0) 
        {
            echo "There are no Notifications to display."; 
        } 
      	else 
        { 
            while ($row = mysqli_fetch_assoc($result)) {
              $query2="SELECT * FROM USER WHERE USER_ID='".$row['USER_ID']."';";
              $result2=mysqli_query($link,$query2);
              $row2=mysqli_fetch_assoc($result2);
              echo
                '<li class="media list-group-item p-a"> <a class="media-left" href="#"> <img class="media-object img-circle" src="'.$row2['BIO_IMG'].'"> </a>
          <div class="media-body">
            <div class="media-heading">
              <h4>'.$row['STATUS'].'</h4>
            </div>
            </div>
            </li>
            ';
        	}

        }
        }
    
	else if($type=="users")
    {
      $query = "SELECT * FROM USER LIMIT 7";
        
        $result = mysqli_query($link, $query);
         if (mysqli_num_rows($result) == 0) 
        {
            echo "There are no Users to display."; 
        }
      else
      {
        while ($row = mysqli_fetch_assoc($result)) {
      
      	if($row['USER_ID']==$_SESSION['user'])
        {
        }
          else
          {
      echo '<div class="panel panel-default m-b-md hidden-xs">
        <div class="panel-body">
        
        <ul class="media-list media-list-stream">
          <li class="media m-b">
            <a class="media-left" href="#">
              <img
                class="media-object img-circle"
                src="'.$row['BIO_IMG'].'">
            </a>
            <div class="media-body">
              <strong>'.$row['NAME'].'</strong> @'.$row['USER_ID'].'
              <div class="media-body-actions">
                <button class="btn btn-primary-outline btn-sm">
                  <span class="icon icon-add-user"></span> <button class="toggleFollow btn btn-primary" data-userId="'.$row['USER_ID'].'">Follow</button> </button>
              </div>
            </div>
          </li>
        </ul>
        </div>';
          }
       }
    }
    }
      else if($type=="users2")
    {
      $query = "SELECT * FROM USER LIMIT 3";
        
        $result = mysqli_query($link, $query);
         if (mysqli_num_rows($result) == 0) 
        {
            echo "There are no Users to display."; 
        }
      else
      {
        while ($row = mysqli_fetch_assoc($result)) {
      
      	if($row['USER_ID']==$_SESSION['user'])
        {
        }
          else
          {
      echo '<div class="panel panel-default m-b-md hidden-xs">
        <div class="panel-body">
        
        <ul class="media-list media-list-stream">
          <li class="media m-b">
            <a class="media-left" href="#">
              <img
                class="media-object img-circle"
                src="'.$row['BIO_IMG'].'">
            </a>
            <div class="media-body">
              <strong>'.$row['NAME'].'</strong> @'.$row['USER_ID'].'
              <div class="media-body-actions">
                <button class="btn btn-primary-outline btn-sm">
                  <span class="icon icon-add-user"></span> <button class="toggleFollow btn btn-primary" data-userId="'.$row['USER_ID'].'">Follow</button> </button>
              </div>
            </div>
          </li>
        </ul>
        </div>';
          }
       }
    }
    }
      else if($type=="message")
    {
      $query = "SELECT * FROM MESSAGES WHERE RECIEVER_ID='".$_SESSION['user']."'";
        
        $result = mysqli_query($link, $query);
         if (mysqli_num_rows($result) == 0) 
        {
            echo '<p>  There are no Messages to display.</p>'; 
        }
      else
      {
        while ($row = mysqli_fetch_assoc($result)) {
      
          $query2="SELECT * FROM USER WHERE USER_ID='".$row['SENDER_ID']."';";
          $result2=mysqli_query($link,$query2);
          $row2=mysqli_fetch_assoc($result2);
          
      echo '<a href="#" class="list-group-item">
              <div class="media">
                <span class="media-left">
                <img class="img-circle media-object" src="'.$row2['BIO_IMG'].'">
                </span>
                <div class="media-body">
                  <strong>'.$row2['NAME'].'</strong>
                  <div class="media-body-secondary">
                    '.$row['CONTENT'].'<small class="pull-right text-muted">'.time_since(time()-strtotime($row['DATE_TIME'])).'</small>
                  </div>
                  
                </div>
              </div>
            </a>';
          }
    }
    }
      else if($type=="images")
      {
        $usern=$_SESSION['user'];
          $query="SELECT IMG FROM TWEETS WHERE USER_ID='".$usern."';";
         $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 0) 
        {
            echo "There are no Images to display."; 
        }
        else
        {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div><img data-width="640" data-height="640" data-action="zoom" src="'.$row['IMG'].'"></div>';
    	}
      	}
      }
      else if($type="followtweets")
      {
       
        $query = "SELECT FOLLOWER_ID FROM `FOLLOWER` where USER_ID='".$_SESSION['user']."' ORDER BY `START_DATE` DESC LIMIT 5";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 0) 
        {
            echo "There are no tweets to display.Try Following People"; 
        } 
      	else 
        { 
            while ($row = mysqli_fetch_assoc($result))
            {
                $r=rand(1,3);
                $userQuery = "SELECT * FROM TWEETS WHERE USER_ID ='".$row['FOLLOWER_ID']."' LIMIT ".$r.";";
                $userQueryResult = mysqli_query($link, $userQuery);
                $user = mysqli_fetch_assoc($userQueryResult);
              
              	$query2="SELECT * FROM USER WHERE USER_ID ='".$row['FOLLOWER_ID']."' LIMIT 1";
              	$result2 = mysqli_query($link, $query2);
                $user2 = mysqli_fetch_assoc($result2);
              	  
              echo '<li class="media list-group-item p-a"> <a class="media-left" href="#"> <img class="media-object img-circle" src="'.$user2['BIO_IMG'].'"> </a>
          <div class="media-body">
            <div class="media-heading">
              <small class="pull-right text-muted">'.time_since(time()-strtotime($user['DATE_TIME'])).'</small>
              <h4>'.$user2['NAME'].'</h4>
            </div>
            <p>
              '.$user['CONTENT'].'
            </p>

            <div class="media-body-inline-grid" data-grid="images">
              <img style="display: none" data-width="640" data-height="640" data-action="zoom" src="'.$user['IMG'].'">
            </div>
            <button class="glyphicon glyphicon-retweet btn btn-primary retweet pull-right text-muted"  data-tweet="'.$user["TWEET_ID"].'"></button>
			<button class="glyphicon glyphicon-thumbs-up btn btn-primary like pull-right text-muted"  data-tweet="'.$user["TWEET_ID"].'"></button>
        
            <p></p>
            <form action="comment.php" method="POST">
           <div class="input-group">
            <input type="textbox" class="form-control" placeholder="Comment" name="comment">
             	<input type="hidden" value="'.$user["TWEET_ID"].'" name="id">
          	<button class="btn btn-primary" align="center" type="Submit">Comment</button>
          	</div>
         	</form>
            <p></p>
            <h4>Comments-</h4>
            <p></p>';
                $query6 = "SELECT * FROM `REPLY` where TWEET_ID='".$user['TWEET_ID']."' ORDER BY `DATE_TIME` DESC LIMIT 3";
        		$result6 = mysqli_query($link, $query6);
        		if (mysqli_num_rows($result6) == 0) 
       			 {
            	echo "There are no Comments to Display"; 
        		} 
      			else 
        		{
               while ($row3 = mysqli_fetch_assoc($result6))
            	{
              	$query4="SELECT * FROM `USER` WHERE USER_ID='".$row3['USER_ID']."';";
              	$result4=mysqli_query($link,$query4);
              	$row4=mysqli_fetch_assoc($result4);
              
           		 echo'<ul class="media-list">
              <li class="media">
                <a class="media-left" href="#">
                  <img
                    class="media-object img-circle"
                    src="'.$row4['BIO_IMG'].'">
                </a>
                <div class="media-body">
                  <strong>'.$row4['NAME'].': </strong>
                 	'.$row3['CONTENT'].'
                </div>
              </li>
            </ul>
            <p></p>';
            }
                }
            
            }
        }
        
    }
    }

      function displayTweets2($type,$para)
      {
        global $link;
        
        if($type=="searchtweets" && $para!=="")
        {
       		$query = "SELECT * FROM `TWEETS` WHERE `CONTENT` LIKE '%".$para."%' LIMIT 10";
        	$result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 0) 
        {
            echo "There are no tweets to display.Try Alternative Search"; 
        } 
      	else 
        { 
            while ($row = mysqli_fetch_assoc($result))
            {
                
              	$query2="SELECT * FROM USER WHERE USER_ID ='".$row['USER_ID']."' LIMIT 1";
              	$result2 = mysqli_query($link, $query2);
                $user2 = mysqli_fetch_assoc($result2);
              	  
              echo '<li class="media list-group-item p-a"> <a class="media-left" href="#"> <img class="media-object img-circle" src="'.$user2['BIO_IMG'].'"> </a>
          <div class="media-body">
            <div class="media-heading">
              <small class="pull-right text-muted">'.time_since(time()-strtotime($row['DATE_TIME'])).'</small>
              <h4>'.$user2['NAME'].'</h4>
            </div>
            <p>
              '.$row['CONTENT'].'
            </p>

            <div class="media-body-inline-grid" data-grid="images">
              <img style="display: none" data-width="640" data-height="640" data-action="zoom" src="'.$row['IMG'].'">
            </div>
            <button class="glyphicon glyphicon-retweet btn btn-primary retweet pull-right text-muted"  data-tweet="'.$row["TWEET_ID"].'"></button>
			<button class="glyphicon glyphicon-thumbs-up btn btn-primary like pull-right text-muted"  data-tweet="'.$row["TWEET_ID"].'"></button>
        
            <p></p>
            <form action="comment.php" method="POST">
           <div class="input-group">
            <input type="textbox" class="form-control" placeholder="Comment" name="comment">
             	<input type="hidden" value="'.$row["TWEET_ID"].'" name="id">
          	<button class="btn btn-primary" align="center" type="Submit">Comment</button>
          	</div>
         	</form>
            <p></p>
            <h4>Comments-</h4>
            <p></p>';
                $query6 = "SELECT * FROM `REPLY` where TWEET_ID='".$row['TWEET_ID']."' ORDER BY `DATE_TIME` DESC LIMIT 3";
        		$result6 = mysqli_query($link, $query6);
        		if (mysqli_num_rows($result6) == 0) 
       			 {
            	echo "There are no Comments to Display"; 
        		} 
      			else 
        		{
               while ($row3 = mysqli_fetch_assoc($result6))
            	{
              	$query4="SELECT * FROM `USER` WHERE USER_ID='".$row3['USER_ID']."';";
              	$result4=mysqli_query($link,$query4);
              	$row4=mysqli_fetch_assoc($result4);
              
           		 echo'<ul class="media-list">
              <li class="media">
                <a class="media-left" href="#">
                  <img
                    class="media-object img-circle"
                    src="'.$row4['BIO_IMG'].'">
                </a>
                <div class="media-body">
                  <strong>'.$row4['NAME'].': </strong>
                 	'.$row3['CONTENT'].'
                </div>
              </li>
            </ul>
            <p></p>';
            }
                }
            }
            }
        }
        
        else if($type=="searchusers" && $para!=="")
        {
          
          $para= mysqli_real_escape_string($link, $para);
           $query = "SELECT * FROM USER where NAME LIKE '%".$para."%' LIMIT 5";
        $result = mysqli_query($link, $query);
         if (mysqli_num_rows($result) == 0) 
        {
            echo "There are no Users to display."; 
        }
      	else
      	{
        while ($row = mysqli_fetch_assoc($result)) 
        {
      
      	if($row['USER_ID']==$_SESSION['user'])
        {
        }
          else
          {
      echo '<div class="panel panel-default m-b-md hidden-xs">
        <div class="panel-body">
        
        <ul class="media-list media-list-stream">
          <li class="media m-b">
            <a class="media-left" href="#">
              <img
                class="media-object img-circle"
                src="'.$row['BIO_IMG'].'">
            </a>
            <div class="media-body">
              <strong>'.$row['NAME'].'</strong> @'.$row['USER_ID'].'
              <div class="media-body-actions">
                <button class="btn btn-primary-outline btn-sm">
                  <span class="icon icon-add-user"></span> <button class="toggleFollow btn btn-primary" data-userId="'.$row['USER_ID'].'">Follow</button> </button>
              </div>
            </div>
          </li>
        </ul>
        </div>';
          }
       }
    }       
        }
        else if($type=="messageusers" && $para!=="")
        {
          
          $para= mysqli_real_escape_string($link, $para);
           $query = "SELECT * FROM USER where NAME LIKE '%".$para."%' LIMIT 5";
        $result = mysqli_query($link, $query);
         if (mysqli_num_rows($result) == 0) 
        {
            echo "There are no Users to display."; 
        }
      	else
      	{
        while ($row = mysqli_fetch_assoc($result)) 
        {
      
      	if($row['USER_ID']==$_SESSION['user'])
        {
        }
          else
          {
      echo '<div class="panel panel-default m-b-md hidden-xs">
        <div class="panel-body">
        
        <ul class="media-list media-list-stream">
          <li class="media m-b">
            <a class="media-left" href="#">
              <img
                class="media-object img-circle"
                src="'.$row['BIO_IMG'].'">
            </a>
            <div class="media-body">
              <strong>'.$row['NAME'].'</strong> @'.$row['USER_ID'].'
              
              <form class="navbar-form navbar-right app-search" id="form1" action="send.php" role="search" method="POST">
          <div class="form-group">
          	<input type="hidden" class="form-control" name="to" value="'.$row['USER_ID'].'">
            <span class="icon icon-add-user"></span> <button type="submit" form="form1" class="message btn btn-primary" data-			userId="'.$row['USER_ID'].'">Message</button> 				</button>
            <input type="text" class="form-control" data-action="grow" name="message" placeholder="Message">
            
          </div>
        </form>
            </div>
          </li>
        </ul>
        </div>';
          }
       }
    }       
        }   
    }
      function displaycomment($type,$tweet) {
        global $link;
      if($type=="comments")
      {
       	$query = "SELECT * FROM `REPLY` where TWEET_ID='".$tweet."' ORDER BY `DATE_TIME` DESC LIMIT 3";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 0) 
        {
            echo "There are no Comments to Display"; 
        } 
      	else 
        {
           while ($row = mysqli_fetch_assoc($result))
            {
              $query2="SELECT * FROM `USER` WHERE USER_ID='".$row['USER_ID']."';";
              $result2=mysqli_query($link,$query2);
              $row2=mysqli_fetch_assoc($result2);
              
           echo '<ul class="media-list">
              <li class="media">
                <a class="media-left" href="#">
                  <img
                    class="media-object img-circle"
                    src="'.$row2['BIO_IMG'].'">
                </a>
                <div class="media-body">
                  <strong>'.$row2['NAME'].': </strong>
                 	'.$row['CONTENT'].'
                </div>
              </li>
            </ul>';
            }
        }
      }
    }

?>