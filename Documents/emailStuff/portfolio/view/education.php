<?php
session_start();
echo 'Session ID = ' . session_id();
if (isset($_SESSION["personId"])) {
    echo 'personId = ' . $_SESSION["personId"];
}
?>
<!DOCTYPE html>
<html lang="en">
    <!--
    To change this license header, choose License Headers in Project Properties.
    <script src="signupValidation.js" type="text/javascript"></script>
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->

    <head>
        <title>Euducation Form</title>
        <meta charset="utf-8">
        <meta name="theme-color" content="#99ffd6"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Keywords" content="HTML,  CSS, SQL, JavaScript, How to, PHP, Java, C++, jQuery, Bootstrap, Colors, Programming, Web Development, Training, Learning, Quiz, Courses, Lessons, References, Examples, Source code">
        <meta name="Description" content="Well organized and easy to understand Web building tutorials to use HTML, CSS, JavaScript, SQL, PHP, Bootstrap, XML and more.">
        <link rel="stylesheet" href="css/education.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" crossorigin="anonymous">
        </script><script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" crossorigin="anonymous">
        </script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <script src="js/educationValidation.js"></script>

    </head>
    <body class="body">
        <div class="jumbotron text-center">
            <h1>Euducation Form</h1>
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
                <form id="userEducationform" name="educationform" onsubmit="return test()"  method="POST" action="adapters/ControllerEducationAdapter.php" >
                    <input name="personId" id="personId" class="form-control" type="hidden"  value=<?php echo $_SESSION["personId"]; ?> >
                    <tr class="success">
                        <td>
                            <div id="programTitle_div" class="form-group">
                                <label for="programTitle">Program Title (*)</label>
                                <input name="programTitle" id="programTitle" class="form-control" type="text" placeholder="Program Title" value="" >
                                <div class="input_error" id="programTitle_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="startDate_div" class="form-group">
                                <label for="startDate"> Start Date (*)</label>
                                <input name="startDate" id="startDate" class="form-control" type="date" min="1921-01-01" max="2021-06-31" required>
                                <div class="input_error" id="startDate_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="endDate_div" class="form-group">
                                <label for="endDate"> End Date (*)</label>
                                <input name="endDate" id="endDate" class="form-control" type="date" min="1921-01-01" max="2021-06-31" required>
                                <div class="input_error" id="endDate_error"></div>
                            </div>

                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            <div id="institute_div" class="form-group">
                                <label for="institute">Institute Name (*)</label>
                                <input name="institute" id="institute" class="form-control" type="text" placeholder="Institute Name" value="" >
                                <div class="input_error" id="institute_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="majorSubjects_div" class="form-group">
                                <label for="majorSubjects">Major Subjects (*)</label>
                                <input name="majorSubjects" id="majorSubjects" class="form-control" type="text" placeholder="Major Subjects" value="" >
                                <div class="input_error" id="majorSubjects_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="grade_div" class="form-group">
                                <label for="grade"> Grade (*)</label><br>
                                <select class="btn btn-secondary dropdown-toggle" id="grade" name="grade" required>
                                    <option value=""></option>
                                    <option value="A">Grade A</option>
                                    <option value="B">Grade B</option>
                                    <option value="C">Grade C</option>
                                    <option value="D">Grade D</option>
                                </select>
                                <div class="input_error" id="grade_error"></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="success">

                        <td colspan="2">
                            <div id="description_div" class="form-group">
                                <label for="description"> Description</label>
                                <textarea rows="5" name="description" id="description" class="form-control" type="url" placeholder="Description about course."></textarea>
                                <div class="input_error" id="description_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="submit_div" class="form-group">
                                <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <button id="addNewEducation" name="addNewEducation" type="submit" value="Submit" form="userEducationform" class="btn btn-lg btn-info ">Add More Skills</button>
                                <button id="submit" name="submitted" type="submit" value="Submit" form="userEducationform" class="btn btn-lg btn-success ">Next</button>
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