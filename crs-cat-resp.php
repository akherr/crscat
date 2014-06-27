<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
          "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
  <?php
    ini_set('display_errors','1');
    ini_set('display_startup_errors','1');
  ?>
  <head>
  <title> Course Catalogue System </title>
  <style type = "text/css">
    	p.head { color: black;
      			 margin-top: 50px;
          		 margin-left: 150px;
          	   	 margin-right: 150px;
          		 border-style: solid;
          		 border-color: red;
          		 border-width: 10px;
          		 padding: 30px;
          		 text-align: center;
          		 font-size: 25pt;
          		 }
        p.second { color: black;
    	         margin-top: 50px;
        		 margin-left: 150px;
        		 margin-right: 150px;
        		 border-style: solid;
        		 border-color: black;
        		 border-width: 10px;
        		 padding: 30px;
        		 text-align: left;
        		 font-size: 20pt;
        }
        p.third { color: black;
	    	     margin-top: 50px;
		         margin-left: 150px;
		       	 margin-right: 150px;
	     		 border-style: solid;
	     		 border-color: black;
	      		 border-width: 10px;
	      		 padding: 30px;
	      		 text-align: left;
	      		 font-size: 20pt;
        }
  </style>
  </head>
  <body>
  <?php
  function isValid()
  {
  	$valid = true;
  	$ret = " idid \n jj";
  	$printReturn = "<script type = \"text/javascript\"> alert(\"$ret\");</script>";

  	if(preg_match( '/^[A-Z|a-z]+-*/', $_POST["first"]) != 1)
  	{

  		$valid = false;
  		$ret .= "First name invalid\n";
  	}
  	if(preg_match( '/^[A-Z|a-z]+-*/', $_POST["last"]) != 1)
  	{
  		$valid = false;
  		$ret .= "Last name invalid\n";
  	}
  	#if(strlen($_POST["selectdept"])< 4)
  	#{
  	#	$valid = false;
  	#	$ret .= "Department not selected\n";
  	#}
	echo $printReturn;
  	#echo "<script>var prin ='j";
  	#echo $printReturn;
    #echo "';"
  	#echo "alert(prin);";
  	#echo "</script>";
  }
  isValid();
  ?>
  <p class = "head">
     Course Catalog System
  </p>
  <p class = "second">
     <?php
        echo "", $_POST["selectdept"], " ";
        echo "", $_POST["coursenum"], "\n <br />";
        echo strtoupper($_POST["coursetitle"]);
     ?>
  </p>
  <p class = "third">
     <?php
        print("<u>Course Description</u><br />");
        echo "", $_POST["coursedesc"], " ";
     ?>
  </p>
  <p>
     IT Major and Areas of Concentrations that require this course <br />
     <?php
        if(array_key_exists("checkcsat", $_POST))
        {
        	print("<b><u>CSAT</u></b> - ");
        	if(array_key_exists("checkcs", $_POST))
        	{
        		print("<b>Computer Science</b><br />");
        	}
        	if(array_key_exists("checkdb", $_POST))
        	{
        		print("<b>Database</b><br />");
        	}
        	if(array_key_exists("checkse", $_POST))
        	{
        		print("<b>Software Engineering</b><br />");
        	}
        	if(array_key_exists("checkn", $_POST))
        	{
        		print("<b>Networks</b><br />");
        	}

        }
        if(array_key_exists("checkisas", $_POST))
        {
            print("<b><u>ISAS</u></b> - ");
            if(array_key_exists("checkis", $_POST))
            {
            	print("<b>Information Science</b><br />");
            }
            if(array_key_exists("checkwd", $_POST))
            {
            	print("<b>Web Development</b><br />");
            }
        }
     ?>
  </p>

  <h2>Source Code</h2>
  <?php
        ini_set('date.timezone','America/New_York');
        echo "Last modified: ", date("Y.M.d (D) H:i.", filemtime(__FILE__)), "<br />\n";
        error_reporting (E_ALL|E_WARNING|E_PARSE);
        show_source(__FILE__);
		
		include 'logging.php';
    ?>
  </body>
</html>