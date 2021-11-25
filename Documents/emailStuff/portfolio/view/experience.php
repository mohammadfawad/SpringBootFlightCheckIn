<?php
session_start();
echo 'Session ID = ' . session_id() . "  ";
if (isset($_SESSION["personId"])) {
    echo 'personId = ' . $_SESSION["personId"];
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Experience Form</title>
        <meta charset="utf-8">
        <meta name="theme-color" content="#99ffd6"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Keywords" content="HTML,  CSS, SQL, JavaScript, How to, PHP, Java, C++, jQuery, Bootstrap, Colors, Programming, Web Development, Training, Learning, Quiz, Courses, Lessons, References, Examples, Source code">
        <meta name="Description" content="Well organized and easy to understand Web building tutorials to use HTML, CSS, JavaScript, SQL, PHP, Bootstrap, XML and more.">
        <link rel="stylesheet" href="css/experience.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" crossorigin="anonymous">
        </script><script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" crossorigin="anonymous">
        </script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <script src="js/experienceValidation.js"></script>
    </head>
    <body>
    <body class="body">
        <div class="jumbotron text-center">
            <h1>Experience Form</h1>
            <p>Fill all the details and submit</p>
        </div>
        <div class="container">

            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <form id="userExperienceform" name="userExperienceform" onsubmit="return test()"  method="POST" action="adapters/ControllerExperienceAdapter.php" >
                    <input name="personId" id="personId" class="form-control" type="hidden"  value=<?php echo $_SESSION["personId"]; ?> >
                    <tr class="success">
                        <td>
                            <div id="companyName_div" class="form-group">
                                <label for="companyName">Company Name (*)</label>
                                <input name="companyName" id="companyName" class="form-control" type="text" placeholder="Company Name" value="" >
                                <div class="input_error" id="companyName_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="companyAddress_div" class="form-group">
                                <label for="companyAddress">Company Location(*)</label>
                                <input name="companyAddress" id="companyAddress" class="form-control" type="text" placeholder="Company Location" value="" >
                                <div class="input_error" id="companyAddress_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="jobTitle_div" class="form-group">
                                <label for="jobTitle">Job Title(*)</label>
                                <input name="jobTitle" id="jobTitle" class="form-control" type="text" placeholder="Job Title" value="" >
                                <div class="input_error" id="jobTitle_error"></div>
                            </div>
                        </td>
                        
                    </tr>

                    <tr class="success">
                        <td>
                            <div id="startDate_div" class="form-group">
                                <label for="startDate"> Start Date (*)</label>
                                <input name="startDate" id="startDate" class="form-control" type="date" min="1940-01-01" max="2021-06-31" required>
                                <div class="input_error" id="startDate_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="endDate_div" class="form-group">
                                <label for="endDate"> End Date (*)</label>
                                <input name="endDate" id="endDate" class="form-control" type="date" min="1940-01-01" max="2021-06-31" required>
                                <div class="input_error" id="endDate_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="jobDescription_div" class="form-group">
                                <label for="jobDescription">Job Description (*)</label>
                                <input name="jobDescription" id="jobDescription" class="form-control" type="text" placeholder="Job Description" value="" >
                                <div class="input_error" id="jobDescription_error"></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            <div id="toolsUsed_div" class="form-group">
                                <label for="toolsUsed">Tools Used (*)</label>
                                <input name="toolsUsed" id="toolsUsed" class="form-control" type="text" placeholder="Tools Used" value="" >
                                <div class="input_error" id="toolsUsed_error"></div>
                            </div>
                        </td>
                        <td colspan="2">
                            <div id="majorResponsibilities_div" class="form-group">
                                <label for="majorResponsibilities">Job Responsibilities</label>
                                <textarea rows="5" name="majorResponsibilities" id="majorResponsibilities" class="form-control" type="url" placeholder="Description about Job Responsibilities."></textarea>
                                <div class="input_error" id="majorResponsibilities_error"></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="success">
                        <td></td>
                        <td></td>
                        <td>
                            <div id="submit_div" class="form-group">
                                <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <button id="addNewExperience" name="addNewExperience" type="submit" value="Submit" form="userExperienceform" class="btn btn-lg btn-info ">Add More Experience</button>
                                <button id="submit" name="submitted" type="submit" value="Submit" form="userExperienceform" class="btn btn-lg btn-success ">Next</button>
                                <div class="input_error" id="submit_error"></div>
                            </div>
                        </td>
                    </tr>                                     
                </form>
                </tbody>

            </table>

        </div>

    </body>
</html>
<?php
//}
?>