<?php
    session_start();
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
        <title>Sign Up Form</title>
        <meta charset="utf-8">
        <meta name="theme-color" content="#99ffd6"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Keywords" content="HTML,  CSS, SQL, JavaScript, How to, PHP, Java, C++, jQuery, Bootstrap, Colors, Programming, Web Development, Training, Learning, Quiz, Courses, Lessons, References, Examples, Source code">
        <meta name="Description" content="Well organized and easy to understand Web building tutorials to use HTML, CSS, JavaScript, SQL, PHP, Bootstrap, XML and more.">
        <link rel="stylesheet" href="css/signup.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" crossorigin="anonymous">
        </script><script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" crossorigin="anonymous">
        </script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <script src="js/signupValidation.js"></script>

    </head>
    <body class="body">
        <div class="jumbotron text-center">
            <h1>Sign Up Form</h1>
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
                <form id="userSignupform" name="signupform" onsubmit="return test()"  method="POST" action="adapters/ControllerPersonAdapter.php" >
                    <tr class="success">
                        <td>
                            <div id="personName_div" class="form-group">
                                <label for="personName">Person Name (*)</label>
                                <input name="fullName" id="personName" class="form-control" type="text" placeholder="Name" value="" >
                                <div class="input_error" id="personName_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="dateOfBirth_div" class="form-group">
                                <label for="dateOfBirth"> Date Of Birth (*)</label>
                                <input name="dob" id="dateOfBirth" class="form-control" type="date" min="1921-01-01" max="2003-12-31" required>
                                <div class="input_error" id="dateOfBirth_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="address_div" class="form-group">
                                <label for="address"> Address (*)</label>
                                <input name="address" id="address" class="form-control" type="text" placeholder="Address" required>
                                <div class="input_error" id="address_error"></div>
                            </div>

                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            <div id="landlineNumber_div" class="form-group">
                                <label for="landlineNumber"> Landline Number</label>
                                <input name="landlineNumber" id="landlineNumber" class="form-control" type="tel" placeholder="001 903 451 1234">
                            </div>
                        </td>
                        <td>
                            <div id="cellNumber_div" class="form-group">
                                <label for="cellNumber"> Cell Number (*)</label>
                                <input name="cellNumber" id="cellNumber" class="form-control" type="tel" placeholder="03004407087" pattern="[0-9]{4}[0-9]{4}[0-9]{3}" required>
                                <div class="input_error" id="cellNumber_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="email_div" class="form-group">
                                <label for="email"> Email (*)</label>
                                <input name="email" id="email" class="form-control" type="email" placeholder="example@domain.domainExtension" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" required>
                                <div class="input_error" id="email_error"></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            <div id="youtubeLink_div" class="form-group">
                                <label for="youtubeLink"> Youtube Link</label>
                                <input name="youtubeLink" id="youtubeLink" class="form-control" type="url" placeholder="https://www.youtube.com/yourChannel or video">
                            </div>
                        </td>
                        <td>
                            <div id="facebookLink_div" class="form-group">
                                <label for="facebookLink"> Facebook Profile Link</label>
                                <input name="facebookLink" id="facebookLink" class="form-control" type="url" placeholder="https://www.facebook.com/people/yourProfile">
                            </div>
                        </td>
                        <td>
                            <div id="linkedinLink_div" class="form-group">
                                <label for="linkedinLink"> Linkedin Profile Link</label>
                                <input name="linkedinLink" id="linkedinLink" class="form-control" type="url" placeholder="https://linkedin.com/yourProfile">
                            </div>
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            <div id="githubLink_div" class="form-group">
                                <label for="githubLink"> Github Link</label>
                                <input name="githubLink" id="githubLink" class="form-control" type="url" placeholder="https://github.com/yourProfile">
                            </div>
                        </td>
                        <td>
                            <div id="twitterlink_div" class="form-group">
                                <label for="twitterlink"> Twitter Link</label>
                                <input name="twitterLink" id="twitterlink" class="form-control" type="url" placeholder="https://twitter.com/yourProfile">
                            </div>
                        </td>
                        <td>
                            <div id="websiteLink_div" class="form-group">
                                <label for="websiteLink"> Website Link </label>
                                <input name="websiteLink" id="websiteLink" class="form-control" type="url" placeholder="www.yourDomaineName.domainExtension">
                            </div>
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            <div id="profilelink_div" class="form-group">
                                <label for="profilelink"> Profile Link</label>
                                <input name="profileLink" id="profilelink" class="form-control" type="url" placeholder="www.yourProfessionalProfile.domainExtension">
                            </div>
                        </td>
                        <td>
                            <div id="nationality_div" class="form-group">
                                <label for="nationality"> Nationality (*)</label><br>
                                <select class="btn btn-secondary dropdown-toggle" id="nationality" name="country" required>
                                    <option value=""></option>
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                                <div class="input_error" id="nationality_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="gender_div" class="form-group">
                                <label for="gender"> Gender (*)</label><br>
                                <select class="btn btn-secondary dropdown-toggle" id="gender" name="gender" required>
                                    <option value=""></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="input_error" id="gender_error"></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            <div id="password_div" class="form-group">
                                <label for="passwords"> Password (*)</label>
                                <input name="password" type="password" id="passwords" class="form-control" placeholder="enter minimum six chareter length" required>
                                <div class="input_error" id="passwords_error"></div>
                            </div>
                        </td>
                        <td>
                            <div id="retypePassword_div" class="form-group">
                                <label for="retypePassword"> Retype password (*)</label>
                                <input type="password" id="retypePassword" class="form-control" placeholder="enter minimum six chareter length" required>
                            </div>
                        </td>

                        <td>
                            <div id="submit_div" class="form-group">
                            <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <button id="submit" name="submitted" type="submit" value="Submit" form="userSignupform" class="btn btn-lg btn-success ">Submit</button>
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
