/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// GETTTING ALL TEXT ELEMENTS FROM SIGNUP.PHP
// GETTTING  ALL ERROR DISPLAY ELEMENTS FROM SIGNUP.PHP
// SETTING ALL EVENT LISTENERS ON REQUIRED ELEMENTS
let boolx = false;
function titleCheck() {

    var programTitle = document.getElementById("userEducationform").elements.namedItem("programTitle");
    var programTitle_error = document.getElementById('programTitle_error');
    programTitle.addEventListener('blur', titleVerify, true);

    NameCheck:{
        if (programTitle.value.toString().trim() == "") {
            programTitle_error.innerHTML = " Name field required!";
            return false;
        } else if (programTitle.value.length < 2) {
            programTitle_error.innerHTML = " Name field length must be greater than 2 charecters!";
            return false;
        } else {
            programTitle_error.innerHTML = " Looks Good!";
            return true;
        }

    }

}
function startDate() {
    var startDate = document.getElementById("userEducationform").elements.namedItem('startDate');
    var startDate_error = document.getElementById('startDate_error');
    startDate.addEventListener('blur', startDateVerify, true);
    var today = new Date();
    var startDate = new Date(startDate.value.toString());

    if (today < startDate)
    {
        startDate_error.innerHTML = " Future date not allowed!";
        return false;
    } else {
        startDate_error.innerHTML = " Looks Good!";
        return true;
    }
}
function dateDifference(date2, date1) {
    //const date1 = new Date('7/13/2010');
    //const date2 = new Date('12/15/2010');
    const diffTime = Math.abs(date2 - date1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    //console.log(diffTime + " milliseconds");
    //console.log(diffDays + " days");
    return diffDays ;
}
function endDate() {
    var startDate = document.getElementById("userEducationform").elements.namedItem('startDate');
    var endDate = document.getElementById("userEducationform").elements.namedItem('endDate');
    var endDate_error = document.getElementById('endDate_error');
    endDate.addEventListener('blur', endDateVerify, true);
    var today = new Date();
    var startDate = new Date(startDate.value.toString());
    var endDate = new Date(endDate.value.toString());
    var startEndDiff = dateDifference(endDate,startDate );
    var futureDate = dateDifference(endDate, today );

    if (futureDate < 1)
    {   alert(futureDate);
        endDate_error.innerHTML = "Future date not allowed";
        return false;
    } else if (startEndDiff < 1) {
        alert(startEndDiff);
        endDate_error.innerHTML = " End date must be greater than start date!";
        return false;
    } else if (startEndDiff === 0) {
        alert(startEndDiff);
        endDate_error.innerHTML = " End date and start date are same!";
        return false;
    } else {
        alert(futureDate);
        alert(startEndDiff);
        endDate_error.innerHTML = " Looks Good!";
        return true;
    }
}
function instituteCheck() {

    var institute = document.getElementById("userEducationform").elements.namedItem("institute");
    var institute_error = document.getElementById('institute_error');
    institute.addEventListener('blur', instituteVerify, true);


    if (institute.value.toString().trim() == "") {
        institute_error.innerHTML = " Institute name required!";
        return false;
    } else if (institute.value.length < 4) {
        institute_error.innerHTML = " Institute name must be atleast 4 charecters!";
        return false;
    } else {
        institute_error.innerHTML = " Looks Good!";
        return true;
    }
}

function majorSubjectsCheck() {

    var majorSubjects = document.getElementById("userEducationform").elements.namedItem("majorSubjects");
    var majorSubjects_error = document.getElementById('majorSubjects_error');
    majorSubjects.addEventListener('blur', majorSubjectsVerify, true);


    if (majorSubjects.value.toString().trim() == "") {
        majorSubjects_error.innerHTML = " Major Subjects are required!";
        return false;
    } else if (majorSubjects.value.length < 4) {
        majorSubjects_error.innerHTML = " Subject name must be atleast 4 charecters!";
        return false;
    } else {
        majorSubjects_error.innerHTML = " Looks Good!";
        return true;
    }
}

function gradeCheck() {
    var grade = document.getElementById("userEducationform").elements.namedItem('grade');
    var grade_error = document.getElementById('grade_error');
    grade.addEventListener('blur', gradeVerify, true);
    if (grade.value == "") {
        grade_error.innerHTML = "select your grade!";
        return false;
    } else {
        grade_error.innerHTML = "Looks Good!";
        return true;
    }
}

function descriptionCheck() {
    var description = document.getElementById("userEducationform").elements.namedItem('description');
    var description_error = document.getElementById('description_error');
    description.addEventListener('blur', descriptionVerify, true);
    if (description.value.toString().length < 10 || description.value.toString().length > 200) {
        description_error.innerHTML = " Description length Must be in between 10 to 200 characters!";
        return false;
    } else {
        description_error.innerHTML = " Looks Good!";
        return true;
    }
}

function submit() {
    var submit = document.getElementById("userEducationform").elements.namedItem('submit');
    var submit_error = document.getElementById('submit_error');
    submit.addEventListener('blur', submitVerify, true);
    if (boolx) {
        submit.style.color = "#EEF733";
        submit_error.innerHTML = "Alert ! form submitted successfully.";
        alert("submited!");
        return true;
    } else if (!boolx) {
        submit.style.color = "#FF5733";
        submit_error.innerHTML = "Alert ! form submittion failed.";
        alert("submittion Error!");
        return false;
    }
}

function test() {
    if (titleCheck() && startDate() && endDate() && instituteCheck() && majorSubjectsCheck() && gradeCheck() && descriptionCheck()) {
        boolx = true;
        submit();
        return true;
    } else {
        boolx = false;
        submit();
        return false;
    }

}
function titleVerify() {
    if (titleCheck()) {
        programTitle.style.border = "1px solid #2E8B57";
        document.getElementById('programTitle').style.color = "#2E8B57";
        document.getElementById('programTitle_div').style.color = "#2E8B57";
        return true;
    } else if (!titleCheck()) {
        programTitle.style.border = "1px solid #FF5733";
        document.getElementById('programTitle').style.color = "#FF5733";
        document.getElementById('programTitle_div').style.color = "#FF5733";
        return false;
    }
}

function startDateVerify() {
    if (startDate()) {
        startDate.style.border = "1px solid #2E8B57";
        document.getElementById('startDate').style.color = "#2E8B57";
        document.getElementById('startDate_div').style.color = "#2E8B57";
        return true;
    } else if (!startDate()) {
        startDate.style.border = "1px solid #FF5733";
        document.getElementById('startDate').style.color = "#FF5733";
        document.getElementById('startDate_div').style.color = "#FF5733";
        return false;
    }
}

function endDateVerify() {
    if (endDate()) {
        endDate.style.border = "1px solid #2E8B57";
        document.getElementById('endDate').style.color = "#2E8B57";
        document.getElementById('endDate_div').style.color = "#2E8B57";
        return true;
    } else if (!endDate()) {
        endDate.style.border = "1px solid #FF5733";
        document.getElementById('endDate').style.color = "#FF5733";
        document.getElementById('endDate_div').style.color = "#FF5733";
        return false;
    }
}

function instituteVerify() {
    if (instituteCheck()) {
        institute.style.border = "1px solid #2E8B57";
        document.getElementById('institute').style.color = "#2E8B57";
        document.getElementById('institute_div').style.color = "#2E8B57";
        return true;
    } else if (!instituteCheck()) {
        institute.style.border = "1px solid #FF5733";
        document.getElementById('institute').style.color = "#FF5733";
        document.getElementById('institute_div').style.color = "#FF5733";
        return false;
    }
}

function majorSubjectsVerify() {
    if (majorSubjectsCheck()) {
        majorSubjects.style.border = "1px solid #2E8B57";
        document.getElementById('majorSubjects').style.color = "#2E8B57";
        document.getElementById('majorSubjects_div').style.color = "#2E8B57";
        return true;
    } else if (!majorSubjectsCheck()) {
        majorSubjects.style.border = "1px solid #FF5733";
        document.getElementById('majorSubjects').style.color = "#FF5733";
        document.getElementById('majorSubjects_div').style.color = "#FF5733";
        return false;
    }
}

function gradeVerify() {
    if (emailCheck()) {
        grade.style.border = "1px solid #2E8B57";
        document.getElementById('grade').style.color = "#2E8B57";
        document.getElementById('grade_div').style.color = "#2E8B57";
        return true;
    } else if (!emailCheck()) {
        grade.style.border = "1px solid #FF5733";
        document.getElementById('grade').style.color = "#FF5733";
        document.getElementById('grade_div').style.color = "#FF5733";
        return false;
    }
}

function descriptionVerify() {
    if (descriptionCheck()) {
        description.style.border = "1px solid #2E8B57";
        document.getElementById('description').style.color = "#2E8B57";
        document.getElementById('description_div').style.color = "#2E8B57";
        return true;
    } else if (!descriptionCheck()) {
        description.style.border = "1px solid #FF5733";
        document.getElementById('description').style.color = "#FF5733";
        document.getElementById('description_div').style.color = "#FF5733";
        return false;
    }
}

function submitVerify() {
    if (boolx) {
        submit.style.border = "1px solid #EEF733";
        document.getElementById('submit').style.color = "#EEF733";
        document.getElementById('submit_div').style.color = "#EEF733";
    } else if (!boolx) {
        submit.style.border = "1px solid #FF5733";
        document.getElementById('submit').style.color = "#FF5733";
        document.getElementById('submit_div').style.color = "#FF5733";
    }

}
