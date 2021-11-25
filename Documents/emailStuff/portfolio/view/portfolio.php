<?php

namespace view;

include '../includes/includeAuto.php';
include '../view/adapters/ControllerPortfolioAdapter.php';

use adapters;
session_start();
//echo 'Session ID = ' . session_id() . '<br>';
if (isset($_SESSION["personId"])) {
    //echo 'personId = ' . $_SESSION["personId"];
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Personal Online CV</title>
    </head>

    <body>
        <?php
        // put your code here


        $personId = "4c4bf2ecd9f3f236eb11a7cce436f2e5";
        $portfolio = new adapters\ControllerPortfolioAdapter($personId);
        ?>
        <section class="menu">
            <a class="menu-item active" id="about"><i class="fa fa-user"></i>About</a>
            <a class="menu-item" id="skills"><i class="fa fa-feather-alt"></i>Skills</a>
            <a class="menu-item" id="resume"><i class="fa fa-list-alt"></i>Resume</a>
            <a class="menu-item" id="works"><i class="fa fa-tasks"></i>Works</a>
        </section>
        <section class="profile">
            <div class="img-container"></div>
            <div class="profile-body">
                <p class="name"> <?php echo $portfolio->getPortfolio()->getPerson()->get_personName(); ?></p>
                <p class="role">Web Developer</p>
                <div class="socials">
                    <a href="<?php echo $portfolio->getPortfolio()->getPerson()->get_youtubeLink(); ?>"> <i class="fab fa-youtube"></i></a>
                    <a href="<?php echo $portfolio->getPortfolio()->getPerson()->get_facebookLink(); ?>"> <i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo $portfolio->getPortfolio()->getPerson()->get_linkedinLink(); ?>"> <i class="fab fa-linkedin-in"></i></a>
                    <a href="<?php echo $portfolio->getPortfolio()->getPerson()->get_githubLink(); ?>"> <i class="fab fa-github"></i></a>
                    <a href="<?php echo $portfolio->getPortfolio()->getPerson()->get_twitterlink(); ?>"> <i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="actions">
                <button><a href="https://drive.google.com/file/d/1B6DN4wDaUIr_c9BvZDKvk7YDBsS8A0H8/view?usp=sharing">Download cv</a></button>
                <button><a href="<?php echo $portfolio->getPortfolio()->getPerson()->get_email(); ?>">Contact me</a></button>
            </div>
        </section>
        <section class="main">
            
            <section class="asset split about" id="about-section">
                <p class="title section-item"><span>About </span> Me</p>
                <div class="asset-body">
                    <div class="section-item">
                        <p>
                            Seeking professional job environment,
                            that provide a challenging atmosphere
                            where I can utilize and improve my skills and knowledge in IT field.
                        </p>
                    </div>
                    <div class="section-item">
                        <div class="item">
                            <label>Current Age <span></span></label>
                            <p class="value"><?php echo substr($portfolio->getPortfolio()->getPerson()->get_age(), 8, 4); ?></p>
                        </div>
                        <div class="item">
                            <label>Country<span></span></label>
                            <p class="value"><?php echo $portfolio->getPortfolio()->getPerson()->get_nationality(); ?></p>
                        </div>
                        <div class="item">
                            <label>Remote<span></span></label>
                            <p class="value">Available</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="asset">
                <p class="title section-item"><span>Main </span> Domains</p>
                <div class="asset-body">
                    <div class="domains section-item">
                        <?php
                        echo '<div class="domain-item">';
                        echo '<i class="fas fa-server"></i>';
                        foreach ($portfolio->getPortfolio()->getArraySkills() as $skills) {

                            echo '<p class="domain-name">' . $skills->getSkillCatagory() . '</p>';
                            echo '<p>' . $skills->getSkillDescription() . '</p>';
                        }
                        echo '</div>';
                        ?>
                    </div>
                </div>
            </section>
            
            <section class="asset split" id="skills-section">
                <p class="title section-item"><span>S</span>kills</p>
                <div class="asset-body">
                    <div class="section-item">
                        <?php
                        foreach ($portfolio->getPortfolio()->getArraySkills() as $skills) {
                            echo '<p class="title"><i class="fas fa-code"></i>' . $skills->getSkillName() . '</p>';
                            echo '<ul>';
                            echo '<li><i class="fas fa-check"></i>' . $skills->getToolsUsed() . '</li>';
                            echo '</ul>';
                        }
                        ?>
                    </div>

                    <section class="section-item">
                        <?php
                        foreach ($portfolio->getPortfolio()->getArrayExperience() as $experience) {
                            echo '<p class="title"><i class="fas fa-tools"></i>TOOLS</p>';
                            echo '<ul>';
                            echo '<li class="ide"><i class="fas fa-check"></i>' . $experience->getToolsUsed() . '</li>';
                            echo '</ul>';
                        }
                        ?>
                    </section>
                </div>
            </section>

            <section class="asset split" id="resume-section">
                <p class="title section-item"><span>R</span>esume</p>
                <div class="asset-body">
                    <div class="section-item">
                        <p class="title">EXPERIENCE</p>
                        <?php
                        foreach ($portfolio->getPortfolio()->getArrayExperience() as $experience) {
                            echo '<div class="section-sub-item">';
                            echo '<p class="time current">' . $experience->getStartDate() . '<b> @ </b>' . $experience->getEndDate() . '</p>';
                            echo '<p class="item-name">' . $experience->getJobTitle() . '</p>';
                            echo '<p class="additional-info"><b>' . $experience->getCompanyName() . '</b></p>';
                            echo '<p class="additional-info">' . $experience->getMajorResponsibilities() . '</p>';
                            echo '<p class="description">' . $experience->getJobDescription() . '</i></p></div>';
                        }
                        ?>
                    </div>
                    <div class="section-item">
                        <p class="title">EDUCATION</p>
                        <?php
                        foreach ($portfolio->getPortfolio()->getArrayEducation() as $education) {
                            echo '<div class="section-sub-item">';
                            echo '<p class="time">' . $education->getStartDate() . '<b> @ </b>' . $education->getEndDate() . '</p>';
                            echo '<p class="item">' . $education->getProgramTitle() . '</p>';
                            echo '<p class="item-name">' . $education->getInstitute() . '</p>';
                            echo '<p class="additional-info"><b>' . $education->getMajorSubjects() . '</b></p>';
                            echo '<p class="description"><i>' . $education->getDescription() . '</i></p></div>';
                        }
                        ?>
                    </div>
                </div>
            </section>
            
            <section class="asset" id="works-section">
                <p class="title section-item"><span>P</span>ROJECTS</p>
                <div class="asset-body grid">
                    <?php
                    $i = 5;
                    foreach ($portfolio->getPortfolio()->getArrayProjects() as $projects) {
                        echo ' <div class="work-item">';
                        echo '<div class="img-content">';
                        echo '<img src="./images/proj' . $i . '.jpg" alt="Project image">';
                        echo '<a href="' . $projects->getProjectLink() . '" class="more-overlay">More Info...</a></div>';
                        echo '<p class="project-name"><u>' . $projects->getProjectName() . '</u></p>';
                        echo '<p class="additional-info">' . $projects->getProjectDescription() . '</p>';
                        echo '<p class="description"><i>' . $projects->getProjectDetails() . '</i></p></div>';
                        $i--;
                        if ($i == 0) {
                            $i = 5;
                        }
                    }
                    ?>   
                </div>
            </section>
        </section>
        <script>
            var aboutSection = document.getElementById("about-section");
            var skillsSection = document.getElementById("skills-section");
            var resumeSection = document.getElementById("resume-section");
            var worksSection = document.getElementById("works-section");

            const menuLinks = document.querySelectorAll('.menu .menu-item');
            menuLinks.forEach(el => {
                el.addEventListener('click', function() {

                    let sectionToGo = aboutSection;

                    switch (this.id) {
                        case 'skills':
                            sectionToGo = skillsSection;
                            break;
                        case 'resume':
                            sectionToGo = resumeSection;
                            break;
                        case 'works':
                            sectionToGo = worksSection;
                            break;
                    }
                    // Scroll smoothly to section
                    sectionToGo.scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        </script>
    </body>
</html>