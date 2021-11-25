<?php
session_start();
echo 'Session ID = ' . session_id();
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
        <title>Skills Form</title>
        <meta charset="utf-8">
        <meta name="theme-color" content="#99ffd6"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Keywords" content="HTML,  CSS, SQL, JavaScript, How to, PHP, Java, C++, jQuery, Bootstrap, Colors, Programming, Web Development, Training, Learning, Quiz, Courses, Lessons, References, Examples, Source code">
        <meta name="Description" content="Well organized and easy to understand Web building tutorials to use HTML, CSS, JavaScript, SQL, PHP, Bootstrap, XML and more.">
        <link rel="stylesheet" href="css/skills.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" crossorigin="anonymous">
        </script><script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" crossorigin="anonymous">
        </script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <script src="js/skillsValidation.js"></script>
    </head>
    <body>
    <body class="body">
        <div class="jumbotron text-center">
            <h1>SKills Form</h1>
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
                <form id="userSkillsform" name="userSkillsform" onsubmit="return test()"  method="POST" action="adapters/ControllerSkillsAdapter.php" >
                    <input name="personId" id="personId" class="form-control" type="hidden"  value=<?php echo $_SESSION["personId"]; ?> >
                    <tr class="success">
                        <td>
                            <div id="skillName_div" class="form-group">
                                <label for="skillName">Skill Name (*)</label>
                                <input name="skillName" id="skillName" class="form-control" type="text" placeholder="Skill Name" value="" >
                                <div class="input_error" id="skillName_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="skillCategory_div" class="form-group">
                                <label for="skillCategory">Skill Category(*)</label>
                                <input name="skillCategory" id="skillCategory" class="form-control" type="text" placeholder="Skill Category" value="" >
                                <div class="input_error" id="skillCatagory_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="toolsUsed_div" class="form-group">
                                <label for="toolsUsed">Tools Used(*)</label>
                                <input name="toolsUsed" id="toolsUsed" class="form-control" type="text" placeholder="Tools Used" value="" >
                                <div class="input_error" id="skillCatagory_error"></div>
                            </div>
                        </td>
                    </tr>

                    <tr class="success">

                        <td colspan="2">
                            <div id="description_div" class="form-group">
                                <label for="description">Skill Description</label>
                                <textarea rows="5" name="description" id="description" class="form-control" type="url" placeholder="Description about Skill."></textarea>
                                <div class="input_error" id="description_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="submit_div" class="form-group">
                                <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <button id="addNewSkill" name="addNewSkill" type="submit" value="Submit" form="userSkillsform" class="btn btn-lg btn-info ">Add More Skills</button>
                                <button id="submit" name="submitted" type="submit" value="Submit" form="userSkillsform" class="btn btn-lg btn-success ">Next</button>
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