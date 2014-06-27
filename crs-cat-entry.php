<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
          "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <?php
    ini_set('display_errors','1');
    ini_set('display_startup_errors','1');
  ?>
  <head>
  <title> Course Catalogue System </title>
  <script type = "text/javascript">
	//this function is to be called when the submit button is clicked. it will return false if the validation finds an error
  	function isValid()
  	{
  		var valid = true;

  		//these two variables hold the regular expressions for the input validation
  		var namePattern = "^[A-Z|a-z]+-*";
  		var courseNumPattern = "^[1-5][0-9][0-9]$";

  		regexpname = new RegExp(namePattern);
  		regexpcoursenum = new RegExp(courseNumPattern);


		//these variables hold references to the multiple checkboxes within the form
		var chCSAT = document.myform.csat.checked;
		var chISAS = document.myform.isas.checked;
		var chCS = document.myform.cs.checked;
		var chDB = document.myform.db.checked;
  		var chSE = document.myform.se.checked;
  		var chN =  document.myform.n.checked;
		var chIS = document.myform.is.checked;
  		var chWD = document.myform.wd.checked;

		//these variables hold references to the multiple textboxes within the form
  		var first = document.getElementById('first');
  		var last = document.getElementById('last');
		var coursenum = document.getElementById('coursenum');
		var coursetitle = document.getElementById('coursetitle');
		var coursedesc = document.getElementById('coursedesc');
		var dept = document.getElementById('dept');

		//these if statements check for valid format within the first name, last name, course number, course title, and course description
		if(!(first.value.match(namePattern)))
		{
			alert("first name has incorrect format.");
			valid = false;
		}
		if(!(last.value.match(namePattern)))
		{
			alert("last name has incorrect format.");
			valid = false;
		}
		if(dept.value == "")
		{
			alert("you must select a department");
			valid = false;
		}
		if(!(coursenum.value.match(courseNumPattern)))
		{
			alert("course number has incorrect format.");
			valid = false;
		}
		if(!(coursetitle.value.match(namePattern)))
		{
			alert("course title has incorrect format.");
			valid = false;
		}
		if(coursedesc.value.length > 400)
		{
			alert("course description has too many characters");
			valid = false;
		}

		//This if statement checks for validation within the checkboxes for the major concentrations
		if(chCSAT == true)
		{
			if(chISAS == true)
			{
				if(!((chCS == true || chDB == true || chSE == true || chN == true) && (chIS == true || chWD == true)))
				{
					alert("not enough concentrations selected.");
					valid = false;
				}
			}
			else
			{
				if(!(chCS == true || chDB == true || chSE == true || chN == true))
				{
					alert("you must select a concentration.");
					valid = false;
				}
			}
		}
		else if(chISAS == true)
		{
			if(chISAS == true)
			{
				if(!(chIS == true || chWD == true))
				{
					alert("you must select a concentration.");
					valid = false;
				}
			}
		}
		else
		{
			alert("you must select a major");
			valid = false;
		}



  		return valid;
  	}

	//this function is to be called when the 'CSAT' checkbox is clicked. It will either disable or enable the associated
  	     //concentration checkboxes depending on if the 'CSAT' checkbox is checked
  	function checkedCS()
  	{
  		var chCSAT = document.myform.csat.checked;
  		if(chCSAT == true)
  		{
			document.myform.cs.disabled = false;
			document.myform.db.disabled = false;
			document.myform.se.disabled = false;
			document.myform.n.disabled = false;
		}
		else
		{
			document.myform.cs.disabled = true;
			document.myform.cs.checked = false;
			document.myform.db.disabled = true;
			document.myform.db.checked = false;
			document.myform.se.disabled = true;
			document.myform.se.checked = false;
			document.myform.n.disabled = true;
			document.myform.n.checked = false;
		}
	}

	//this function is to be called when the 'ISAS' checkbox is clicked. It will either disable or enable the associated
  	     //concentration checkboxes depending on if the 'ISAS' checkbox is checked
	function checkedIS()
	{
		var chISAS = document.myform.isas.checked;
		if(chISAS == true)
		{
			document.myform.is.disabled = false;
			document.myform.wd.disabled = false;
		}
		else
		{
			document.myform.is.disabled = true;
			document.myform.is.checked = false;
			document.myform.wd.disabled = true;
			document.myform.wd.checked = false;
		}
	}
  </script>
  <style type = "text/css">
  	p.head { color: black;
    	margin-top: 50px;
        margin-left: 150px;
        margin-right: 150px;
        border-style: solid;
        border-color: black;
        border-width: 10px;
        padding: 30px;
        text-align: center;
        font-size: 25pt;
        }
  </style>
  </head>
  <body>
    <form name = "myform"
    	onSubmit = "return isValid();"
    	action="https://php.radford.edu/~aherr4/itec325/hw01/crs-cat-resp.php"
    	method="post">
    <p class = "head">
    	Course Catalog Data Entry Page
    </p>
    <p>
	    Enter your first name:
	    <input type="text" name="first" size="25" id = "first" maxlength="25" /><br />
	    Enter your last name:
	    <input type="text" name="last" size="25" id = "last" maxlength="25" /><br /><br />
	    Select the department:
	    <select name="selectdept" id = "dept">
	      <option></option>
		  <option>ITEC</option>
		  <option>MATH</option>
		  <option>STAT</option>
		  <option>MGMT</option>
		  <option>MKTG</option>
        </select><br /><br />
        Enter the course number:
	    <input type="text" name="coursenum" id = "coursenum" size="5" maxlength="5" /><br />
	    Enter the course title:
	    <input type="text" name="coursetitle" id = "coursetitle" size="30" maxlength="30" /><br /><br />
	    Enter the course description: (max 400 characters) <br /><br />
	    <textarea name="coursedesc" id = "coursedesc" rows="8" cols="50">
	    </textarea>
	    <table border = "border">
	    <tr>
	       <td colspan = "2" align = "center">Select the major(s) that require this course</td>
	    </tr>
	    <tr>
	       <td align = "center">CSAT <input type="checkbox" name="checkcsat" value="CSAT" id="csat" onClick = "checkedCS()"/><br /></td>
	       <td align = "center">ISAS <input type="checkbox" name="checkisas" value="ISAS" id="isas" onClick = "checkedIS()"/><br /></td>
	    </tr>
	    <tr>
	       <td colspan = "2" align = "center"> Areas of Concentration</td>
	    </tr>
	    <tr>
	       <td align = "right"> Computer Science <input type="checkbox" name="checkcs" value="CS" id="cs" disabled/><br />
	                           Database 		 <input type="checkbox" name="checkdb" value="DB" id="db" disabled/><br />
	                           Software Engineering <input type="checkbox" name="checkse" value="SE" id="se" disabled/><br />
	                           Networks 			<input type="checkbox" name="checkn" value="N" id="n" disabled/></td>
	       <td align = "right"> Information Systems <input type="checkbox" name="checkis" value="IS" id="is" disabled/><br />
	            				Web Development <input type="checkbox" name="checkwd" value="WD" id="wd" disabled/></td>
	    </tr>
	    </table>
	    <br /><br />
	    <input type ="submit" value = "Submit New Course Entry" />
	    <input type = "reset"  value = "Reset Form" />

    </p>
    	</form>
    <h2>Source Code</h2>
    <?php
      ini_set('date.timezone','America/New_York');
      echo "Last modified: ", date("Y.M.d (D) H:i.", filemtime(__FILE__)), "<br />\n";
      error_reporting (E_ALL|E_WARNING|E_PARSE);
      show_source(__FILE__);
 
 	  include 'logging.php';
	  ?>
    ?>
  <body>
<html>
