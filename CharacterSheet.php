<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="css/favicon.ico">

    <title>Theme Template for Bootstrap</title>
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/theme.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<?php
require_once 'database.php';
$con=mysqli_connect($db_host, $db_username, $db_password,$db_name);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$survivor_id = 1;

$name = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM survivors WHERE ID_SURVIVOR = $survivor_id"));

$sexe = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM sexe WHERE ID_SURVIVOR = $survivor_id"));

$born = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM born WHERE ID_SURVIVOR = $survivor_id"));

$survivol = mysqli_fetch_assoc(mysqli_query($con, "SELECT SURVIVOL FROM survivol WHERE ID_SURVIVOR = $survivor_id"));

$hunt_xp = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM hunt_xp WHERE ID_SURVIVOR = $survivor_id"));

$courage = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM courage WHERE ID_SURVIVOR = $survivor_id"));

$understanding = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM understanding WHERE ID_SURVIVOR = $survivor_id"));

$w_proficiency = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM w_proficiency WHERE ID_SURVIVOR = $survivor_id"));

?>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Kingdom Death: Monster</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">KD:M - <?php echo $name["NAME_SURVIVORS"]; ?></a></li>
            <li><a href="#about">Settlement Sheet</a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Character sheet<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">John Snow</a></li>
                <li><a href="#">Rob Stark</a></li>
                <li><a href="#">Missandei</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Dead Characters</li>
                <li><a href="#">Aria Stark</a></li>
                <li><a href="#">Jeoffrey</a></li>
              </ul>
            </li>
            <li><a href="#contact">Ressources</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<form class="form-horizontal">
    <div class="container theme-showcase" role="main">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Character Name
            </a>
          </h4>
        </div>
       
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <div class="col-sm-1">
                    <div class="radio">
                        <label>
                            <input type="radio" name="inlineRadioOptions" value="Male" id="CharacterInfoSex1" <?php if($sexe['SEXE'] =='H'){echo'checked';}  ?>> Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="inlineRadioOptions" value="Female" id="CharacterInfoSex2" <?php if($sexe['SEXE'] =='F'){echo'checked';}  ?>> Female
                        </label>
                    </div>
                </div>
                <div class="col-sm-9" style="padding-top:12px;">
                    <label for="CharcterInfoName"  class="col-sm-1">Name: </label>
                        <div class="col-sm-5">
                           <input type="name" class="form-control" name="name" id="CharcterInfoName" value= <?php echo $name["NAME_SURVIVORS"] ?>>
                        </div>
                    <label for="CharcterInfoBirth"  class="col-sm-2 ">Year of birth: </label>
                        <div class="col-sm-2">
                            <input type="YoB" class="form-control" id="CharcterInfoBirth" placeholder="Year of Birth" value=<?php echo $born['YEARS']; ?>>
                        </div>
                </div>
                <div class="col-sm-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"  value="Dead" id="CharacterInfoStatus1"> Dead
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
  	<div class="panel panel-default">
    	<div class="panel-heading" role="tab" id="headingTwo">
      		<h4 class="panel-title">
        		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Survivals
        		</a>
      		</h4>
    	</div>
		<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      		<div class="panel-body">
        		 <div class="col-sm-4 ">
                 	<label for="SurvivalPts"  class="col-sm-5">Survival Points: </label>
                        <div class="col-sm-3 ">
                            <input type="SurvivalPts" class="form-control" id="SurvivalPts" placeholder=" # " value=<?php echo $survivol['SURVIVOL'];?> >
                        </div>
                 </div>
                  <div class="col-sm-2">
                 	<div class="checkbox">
                        <label>
                            <input type="checkbox"  value="Dodge" id="SurvivalDodge"> Dodge
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"  value="Dash" id="SurvivalDash"> Dash
                        </label>
                    </div>
                 </div>
                 <div class="col-sm-2">
                 	<div class="checkbox">
                        <label>
                            <input type="checkbox"  value="Encourage" id="SurvivalEncourage"> Encourage
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"  value="Surge" id="SurvivalSurge"> Surge
                        </label>
                    </div>
                 </div>
                 <div class="col-sm-4">
                 	<div class="checkbox">
                        <label>
                            <input type="checkbox"  value="NoSurvival" id="NoSurvival"> Cannot spend survivals.
                        </label>
                    </div>
            	</div>        
      		</div>
    	</div>
	</div>
  	<div class="panel panel-default">
    	<div class="panel-heading" role="tab" id="headingThree">
      		<h4 class="panel-title">
        		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Experience
        		</a>
      		</h4>
    	</div>
		<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      		<div class="panel-body">
            <div class="row">
            
				<div class="col-sm-6">
                    <label class="checkbox">Hunt XP:  </label>
                    <?php
                    for ($i = 1; $i <= $hunt_xp['XP']; $i++) {
    
                        echo ' <input type="checkbox"  value="Option1" id="HuntXP'.$i.'" aria-label="..." checked> ';
}

$uncheck_huntXP = 15 - $hunt_xp['XP'];
                    for ($s = 1; $s <= $uncheck_huntXP; $s++) {
    
                        echo ' <input type="checkbox"  value="Option'.$s.'" id="HuntXP'.$i.'" aria-label="..." > ';
}
                    ?>
                 	 
                        <?php $weapon = array("1" => "Dagger","2" => "Sword", "3" => "Club", "4" => "Bow","5" =>"Catar") ?>
                            
                            <br/>
                            <label >Weapon proficiency type: </label>
                                <select class="form-control">
                                    <?php foreach($weapon as $key => $name){
                                        if ($w_proficiency['TYPE'] == $key){
                                            echo '<option value="'.$key.' "selected>'.$name.'</option>'; //close your tags!!
                                        }else{
                                            echo '<option value="'.$key.'">'.$name.'</option>'; //close your tags!!
                                            
                                        }
                                        
                                    } ?>
                                   
                                </select>
                                         
                    		<label class="checkbox">Weapon proficiency:  </label>
                            <?php
                            for ($i = 1; $i <= $w_proficiency['PROFICIENCY']; $i++) {
            
                                echo ' <input type="checkbox"  value="Option1" id="proficiency'.$i.'" aria-label="..." checked> ';
        }
        
        $uncheck_proficiency = 15 - $w_proficiency['PROFICIENCY'];
                            for ($s = 1; $s <= $uncheck_proficiency; $s++) {
            
                                echo ' <input type="checkbox"  value="Option'.$s.'" id="proficiency'.$i.'" aria-label="..." > ';
        }
                            ?>
                </div>
               
                 <div class="col-sm-6">
                 	<div class="row">
                    	<div class="col-sm-12">
                            <label class="checkbox">Courage  </label>
                            
                            <?php
                    for ($i = 1; $i <= $courage['COURAGE']; $i++) {
    
                        echo ' <input type="checkbox"  value="Option1" id="Courage'.$i.'" aria-label="..." checked> ';
}

$uncheck_courage = 10 - $courage['COURAGE'];
                    for ($s = 1; $s <= $uncheck_courage; $s++) {
    
                        echo ' <input type="checkbox"  value="Option'.$s.'" id="Courage'.$i.'" aria-label="..." > ';
}
                    ?>

                		</div>
                        <div class="col-sm-3">                    
                            <div class="radio">
                                  <label>
                                        <input type="radio" name="courage_1" id="courage_1" value="1" <?php echo ($courage['OPTION_COURAGE'] == 1 ? 'checked': ""); ?>>
                                    Stalwart
                                  </label>
                            </div>    
                            <div class="radio">
                                  <label>
                                        <input type="radio" name="courage_2" id="courage_2" value="2" <?php echo ($courage['OPTION_COURAGE'] == 2 ? 'checked' : ""); ?>>
                                    Prepared
                                  </label>
                            </div>     
                             <div class="radio">
                                  <label>
                                        <input type="radio" name="courage_3" id="courage_3" value="3" <?php echo ($courage['OPTION_COURAGE'] == 3 ? 'checked' : ""); ?>>
                                    Matchmaker
                                  </label>
                            </div>
                 		</div>                   
                         <div class="col-sm-8">
                         <textarea class="form-control" rows="3"><?php echo $courage['OTHER']?></textarea>
                         </div>
                         <hr/>
                         <div class="col-sm-12">
                            <label class="checkbox">Understanding  </label>
                             
                                  <?php
                    for ($i = 1; $i <= $understanding['Understanding']; $i++) {
    
                        echo ' <input type="checkbox"  value="Option'.$i.'" id="Understanding'.$i.'" aria-label="..." checked> ';
}

$uncheck_understanding = 10 - $understanding['Understanding'];
                    for ($s = 1; $s <= $uncheck_understanding; $s++) {
    
                        echo ' <input type="checkbox"  value="Option'.$s.'" id="Understanding'.$i.'" aria-label="..." > ';
}
                    ?>

                         </div> 
                          <div class="col-sm-3">                    
                            <div class="radio">
                                  <label>
                                        <input type="radio" name="understanding_1" id="understanding_1" value="1" <?php echo ($understanding['OPTION_UNDERSTANDING'] == 1 ? 'checked': ""); ?>>
                                    Analyse
                                  </label>
                            </div>    
                            <div class="radio">
                                  <label>
                                        <input type="radio" name="understanding_2" id="understanding_2" value="2" <?php echo ($understanding['OPTION_UNDERSTANDING'] == 2 ? 'checked': ""); ?>>
                                    Explore
                                  </label>
                            </div>     
                             <div class="radio">
                                  <label>
                                        <input type="radio" name="understanding_3" id="understanding_3" value="3" <?php echo ($understanding['OPTION_UNDERSTANDING'] == 3 ? 'checked': ""); ?>>
                                    Tinker
                                  </label>
                            </div>
                 		</div>         
                          <div class="col-sm-8">
                         <textarea class="form-control" rows="3"><?php echo $understanding['OTHER']?></textarea>
                         </div>  
                        </div> 
                  </div>
     		</div>
            </div>
    	</div>
	</div>

	<div class="panel panel-default">
    	<div class="panel-heading" role="tab" id="headingFour">
     		<h4 class="panel-title">
        		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Stats + Armor
        		</a>
      		</h4>
    	</div>
    	<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      		<div class="panel-body">
            	<div class="col-sm-1">
                 <div class="form-group col-md-2 stats">
      <label for="movement">Movement</label>
      <input type="text" class="form-control"  id="movement">
    </div>
                
              </div>
              <div class="col-sm-5">
               
    <div class="form-group col-md-2" style='margin:0px;'>
      <label for="accuracy">Accuracy</label>
      <input type="text" class="form-control" id="accuracy">
    </div>
    <div class="form-group col-md-2" style='margin:0px;'>
      <label for="strengh">Strengh</label>
      <input type="text" class="form-control" id="strengh">
    </div>
    <div class="form-group col-md-2" style='margin:0px;'>
      <label for="evasion">Evasion</label>
      <input type="text" class="form-control" id="evasion">
    </div>
    <div class="form-group col-md-2" style='margin:0px;'>
      <label for="luck">Luck</label>
      <input type="text" class="form-control" id="luck">
    </div>
    <div class="form-group col-md-2" style='margin:0px;'>
      <label for="speed">Speed</label>
      <input type="text" class="form-control" id="speed">
    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group col-md-2" style='margin:0px;'>
      <label for="head">Head</label>
      <input type="text" class="form-control" id="head">
      <input class=".form-check-inline" type="checkbox" id="box_head_1">
    </div>
        
    <div class="form-group col-md-2" style='margin:0px;'>
      <label for="arm">Arms</label>
      <input type="text" class="form-control" id="arm">
      <input class="form-check-input" type="checkbox" class="arm_box_1">
      <input class="form-check-input" type="checkbox" class="arm_box_2">
    </div>

    <div class="form-group col-md-2" style='margin:0px;'>
      <label for="body">Body</label>
      <input type="text" class="form-control" id="body">
       <input class="form-check-input" type="checkbox" class="body_box_1">
        <input class="form-check-input" type="checkbox" class="body_box_1">
    </div>

    <div class="form-group col-md-2" style='margin:0px;'>
      <label for="waist">Waist</label>
      <input type="text" class="form-control" id="waist">
      <input class="form-check-input" type="checkbox" class="waist_box_1">
      <input class="form-check-input" type="checkbox" class="waist_box_1">
    </div>

    <div class="form-group col-md-2" style='margin:0px;'>
      <label for="legs">Legs</label>
      <input type="text" class="form-control" id="legs">
      <input class="form-check-input" type="checkbox" class="legs_box_1">
      <input class="form-check-input" type="checkbox" class="legs_box_1">
    </div>

                </div>
      		</div>
    	</div>
  	</div>
  	<div class="panel panel-default">
    	<div class="panel-heading" role="tab" id="headingFive">
      		<h4 class="panel-title">
        		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Fighting Arts + Secret Fighting Arts
        		</a>
      		</h4>
    	</div>
    	<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
      		<div class="panel-body">
             
        <div class="form-group col-sm-4">
    <label for="fighting_art_1">#1</label>
    <textarea class="form-control" id="fighting_art_1" rows="3"></textarea>
  </div>

   <div class="col-sm-4 spacing-textera">
    <label for="fighting_art_2">#2</label>
    <textarea class="form-control" id="fighting_art_2" rows="3"></textarea>
  </div>

   <div class="col-sm-4 spacing-textera">
    <label for="fighting_art_3">#3</label>
    <textarea class="form-control" id="fighting_art_3" rows="3"></textarea>
  </div>
      		</div>
    	</div>
  	</div>
  	<div class="panel panel-default">
    	<div class="panel-heading" role="tab" id="headingSix">
      		<h4 class="panel-title">
        		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Disorders
        		</a>
      		</h4>
    	</div>
    	<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
      		<div class="panel-body">
              <div class="form-group col-sm-4">
              <label for="disorder_1">#1</label>
              <textarea class="form-control" id="disorder_1" rows="3"></textarea>
            </div>
          
             <div class="col-sm-4 spacing-textera">
              <label for="disorder_2">#2</label>
              <textarea class="form-control" id="disorder_2" rows="3"></textarea>
            </div>
          
             <div class="col-sm-4 spacing-textera">
              <label for="disorder_3">#3</label>
              <textarea class="form-control" id="disorder_3" rows="3"></textarea>
            </div></div>
    	</div>
  	</div>
	<div class="panel panel-default">
    	<div class="panel-heading" role="tab" id="headingSeven">
      		<h4 class="panel-title">
        		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">Abilities + Impairements
        		</a>
      		</h4>
    	</div>
    	<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
      		<div class="panel-body">
              <div class="col-md-offset-1 col-sm-5">
              <label for="abilities">Abilities</label>
              <textarea class="form-control" id="abilities" rows="3"></textarea>
            </div>
            <div class="col-sm-5">
              <label for="impairements">Impairements</label>
              <textarea class="form-control" id="impairements" rows="3"></textarea>
            </div>
        
        </div>
    	</div>
	</div>
  	<div class="panel panel-default">
    	<div class="panel-heading" role="tab" id="headingEight">
      		<h4 class="panel-title">
        		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">Other
        		</a>
      		</h4>
    	</div>
    	<div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
      		<div class="panel-body">
              <div class="col-md-offset-1 col-sm-10">
              <label for="other">Other</label>
              <textarea class="form-control" id="other" rows="3"></textarea>
            </div></div>
    	</div>
	</div>
</div>
   <button type="button" class="btn btn-success">Submit</button>
   <button type="button" class="btn btn-danger">Cancel</button>
    </div> <!-- /container -->
</form>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
