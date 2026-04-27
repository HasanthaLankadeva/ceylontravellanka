<?php

require_once __DIR__ . '/config/config.php';

$currentpage = 'tailormade';
$page = basename($_SERVER['PHP_SELF'], '.php');
$siteName = "Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$pageTitle =  "Tailor-Made Sri Lanka Tours | Custom Travel Packages | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Create your perfect Sri Lanka holiday with our tailor-made tours. Fully customizable itineraries, private drivers, and personalized travel experiences.";
$metaKeywords = "tailor made Sri Lanka tours, custom Sri Lanka itinerary, private tours Sri Lanka, Sri Lanka travel packages, personalized tours";

$OGTitle = "Tailor-Made Sri Lanka Tours | Custom Travel Packages | " . $siteName;
$OGdescription = "Plan your perfect Sri Lanka trip with fully customized tours designed just for you.";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php require_once BASE_PATH . '/includes/head.php';?>
    
</head>

<body class="subpage">

<div id="preloader">
    <div id="status"></div>
</div>

<?php require_once BASE_PATH . '/includes/header.php';?>

<section class="intro-section about-us pt-6 pb-6">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h1 class="mb-1">Tailor-Made Sri Lanka Tours</h1>
            <p>Create your perfect journey with our tailor-made Sri Lanka tours, designed entirely around your preferences, travel style, and budget. Whether you dream of exploring ancient cultural sites, relaxing on pristine beaches, discovering wildlife, or experiencing scenic hill country, we craft personalized itineraries to match your expectations.</p>
            <p>At Ceylon Travel Lanka, we specialize in flexible travel planning with private drivers, handpicked accommodations, and carefully curated experiences. Your trip is fully customizable, ensuring a unique and unforgettable Sri Lanka holiday.</p>
        </div>
    </div>
</section>

<div class="form-wrapper">
    <div class="container">
        <div class="w-50 mx-auto text-center mb-6 contactform-msg"></div>
        <form id="enquiry_form">
            <div class="row mb-6 w-75 mx-auto">
                <div class="col-lg-6 col-md-6 mb-4 wpforms-field">
                    <label class="forms-field-label" for="first_name">First Name <span class="wpforms-required-label">*</span></label>
                    <input type="text" id="first_name" class="forms-field" name="first_name" required="">
                </div>
                <div class="col-lg-6 col-md-6 mb-4 wpforms-field">
                    <label class="forms-field-label" for="last_name">Last Name</label>
                    <input type="text" id="last_name" class="forms-field" name="last_name">
                </div>
                <div class="col-lg-6 col-md-6 mb-4 wpforms-field">
                    <label class="forms-field-label" for="country">Country</label>
                    <!-- Select All countries -->
                    <!-- Name and Name -->
                    <select class="forms-field" autocomplete="country" id="country" name="country">
                        <option>select country</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Åland Islands">Åland Islands</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
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
                        <option value="Bolivia (Plurinational State of)">Bolivia (Plurinational State of)</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cabo Verde">Cabo Verde</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Caribbean Netherlands">Caribbean Netherlands</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curaçao">Curaçao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Eswatini (Swaziland)">Eswatini (Swaziland)</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guernsey">Guernsey</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, North">Korea, North</option>
                        <option value="Korea, South">Korea, South</option>
                        <option value="Kosovo">Kosovo</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Macedonia North">Macedonia North</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia">Micronesia</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn Islands">Pitcairn Islands</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Barthelemy">Saint Barthelemy</option>
                        <option value="Saint Helena">Saint Helena</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Martin">Saint Martin</option>
                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Sint Maarten">Sint Maarten</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                        <option value="South Sudan">South Sudan</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-Leste">Timor-Leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey (Türkiye)">Turkey (Türkiye)</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="U.S. Outlying Islands">U.S. Outlying Islands</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City Holy See">Vatican City Holy See</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S">Virgin Islands, U.S</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                    <!-- total - 252 -->
                </div>
                <div class="col-lg-6 col-md-6 mb-4 wpforms-field">
                    <label class="forms-field-label" for="mobile">Mobile Number <span class="forms-required-label">*</span></label>
                    <input type="text" id="mobile" class="forms-field-large forms-field-required" name="mobile" required="">
                </div>
                <div id="wpforms-3896-field_8-container" class="wpforms-field wpforms-field-email wpforms-one-half wpforms-first wpforms-mobile-full col-lg-6 col-md-6 mb-4" data-field-id="8">
                    <label class="wpforms-field-label" for="wpforms-3896-field_8">Email <span class="wpforms-required-label">*</span></label>
                    <input type="email" id="wpforms-3896-field_8" class="wpforms-field-large wpforms-field-required" name="email" required="">
                </div>
                <div id="wpforms-3896-field_9-container" class="wpforms-field wpforms-field-text wpforms-one-half wpforms-mobile-full col-lg-6 col-md-6 mb-4" data-field-id="9">
                    <label class="wpforms-field-label" for="wpforms-3896-field_9">Prefer Vehicle Type</label>
                    <input type="text" id="wpforms-3896-field_9" class="wpforms-field-large" name="vehicle_type">
                </div>
                <div id="wpforms-3896-field_10-container" class="wpforms-field wpforms-field-checkbox wpforms-list-3-columns mb-4" data-field-id="10">
                    <label class="wpforms-field-label">Select Your Interests:</label>
                    <ul id="wpforms-3896-field_10" class="flex-wrapper">
                        <li class="choice-1 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_1" name="interests[]" value="Beach stays">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_1">Beach stays</label>
                        </li>
                        <li class="choice-2 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_2" name="interests[]" value="Wildlife Safaris">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_2">Wildlife Safaris</label>
                        </li>
                        <li class="choice-3 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_3" name="interests[]" value="Visiting Cultural sights">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_3">Visiting Cultural sights</label>
                        </li>
                        <li class="choice-7 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_7" name="interests[]" value="Adventure activities">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_7">Adventure activities</label>
                        </li>
                        <li class="choice-4 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_4" name="interests[]" value="Nature explorations">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_4">Nature explorations</label>
                        </li>
                        <li class="choice-6 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_6" name="interests[]" value="Whale and Dolphin Watching">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_6">Whale and Dolphin Watching</label>
                        </li>
                        <li class="choice-8 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_8" name="interests[]" value="Hot Air Ballooning">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_8">Hot Air Ballooning</label>
                        </li>
                        <li class="choice-9 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_9" name="interests[]" value="Visiting Veddhas">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_9">Visiting Veddhas</label>
                        </li>
                        <li class="choice-10 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_10" name="interests[]" value="Tea Estate stays">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_10">Tea Estate stays</label>
                        </li>
                        <li class="choice-11 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_11" name="interests[]" value="Diving and snorkelling">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_11">Diving and snorkelling</label>
                        </li>
                        <li class="choice-12 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_12" name="interests[]" value="Water adventures">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_12">Water adventures</label>
                        </li>
                        <li class="choice-13 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_13" name="interests[]" value="I am on honeymoon">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_13">I am on honeymoon</label>
                        </li>
                        <li class="choice-14 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_14" name="interests[]" value="Host wedding in Sri Lanka">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_14">Host wedding in Sri Lanka</label>
                        </li>
                        <li class="choice-15 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_10_15" name="interests[]" value="Train journeys">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_10_15">Train journeys</label>
                        </li>
                    </ul>
                </div>
                <div id="wpforms-3896-field_11-container" class="wpforms-field wpforms-field-checkbox wpforms-one-half wpforms-first wpforms-mobile-full mb-4" data-field-id="11">
                    <label class="wpforms-field-label">Type of Hotels you would like to stay during the tour(Cost shown per night):</label>
                    <ul id="wpforms-3896-field_11" class="flex-wrapper">
                        <li class="choice-1 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_11_1" name="hotel_type[]" value="Budget Hotels (US $45 to $75)">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_11_1">Budget Hotels (US $45 to $75)</label>
                        </li>
                        <li class="choice-2 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_11_2" name="hotel_type[]" value="Moderate (US $80 to $120)">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_11_2">Moderate (US $80 to $120)</label>
                        </li>
                        <li class="choice-3 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_11_3" name="hotel_type[]" value="Luxury (US $130 to $250)">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_11_3">Luxury (US $130 to $250)</label>
                        </li>
                        <li class="choice-4 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_11_4" name="hotel_type[]" value="Boutiques (US $260 to $800)">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_11_4">Boutiques (US $260 to $800)</label>
                        </li>
                        <li class="choice-5 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_11_5" name="hotel_type[]" value="Eco Lodges (US $150 to $800)">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_11_5">Eco Lodges (US $150 to $800)</label>
                        </li>
                    </ul>
                </div>
                <div id="wpforms-3896-field_12-container" class="wpforms-field wpforms-field-checkbox wpforms-one-half wpforms-mobile-full mb-4" data-field-id="12">
                    <label class="wpforms-field-label">Hotel Star Rating</label>
                    <ul id="wpforms-3896-field_12" class="flex-wrapper">
                        <li class="choice-1 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_12_1" name="hotel_rating[]" value="1 Star">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_12_1">1 Star</label>
                        </li>
                        <li class="choice-2 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_12_2" name="hotel_rating[]" value="2 Star">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_12_2">2 Star</label>
                        </li>
                        <li class="choice-3 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_12_3" name="hotel_rating[]" value="3 Star">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_12_3">3 Star</label>
                        </li>
                        <li class="choice-4 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_12_4" name="hotel_rating[]" value="4 Star">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_12_4">4 Star</label>
                        </li>
                        <li class="choice-5 depth-1">
                            <input type="checkbox" id="wpforms-3896-field_12_5" name="hotel_rating[]" value="5 Star">
                            <label class="wpforms-field-label-inline" for="wpforms-3896-field_12_5">5 Star</label>
                        </li>
                    </ul>
                </div>
                <div id="wpforms-3896-field_13-container" class="wpforms-field wpforms-field-number wpforms-one-half wpforms-first wpforms-mobile-full col-lg-6 col-md-6 mb-4" data-field-id="13">
                    <label class="wpforms-field-label" for="wpforms-3896-field_13">Number of adults <span class="wpforms-required-label">*</span></label>
                    <input type="number" pattern="\d*" id="wpforms-3896-field_13" class="wpforms-field-large wpforms-field-required" name="adults" value="1" required="">
                </div>
                <div id="wpforms-3896-field_14-container" class="wpforms-field wpforms-field-number wpforms-one-half wpforms-mobile-full col-lg-6 col-md-6 mb-4" data-field-id="14">
                    <label class="wpforms-field-label" for="wpforms-3896-field_14">Number of children</label>
                    <input type="number" pattern="\d*" id="wpforms-3896-field_14" class="wpforms-field-large wpforms-field-required" name="childrens" value="0" required="">
                </div>
                <div id="wpforms-3896-field_15-container" class="wpforms-field wpforms-field-text wpforms-one-half wpforms-first walwpf-datepicker wpforms-mobile-full col-lg-6 col-md-6 mb-4" data-field-id="15">
                    <label class="wpforms-field-label" for="wpforms-3896-field_15">Tour start date</label>
                    <input type="date" id="wpforms-3896-field_15" class="wpforms-field-large" name="start_date">
                </div>
                <div id="wpforms-3896-field_17-container" class="wpforms-field wpforms-field-text wpforms-one-half walwpf-datepicker wpforms-mobile-full col-lg-6 col-md-6 mb-4" data-field-id="17">
                    <label class="wpforms-field-label" for="wpforms-3896-field_17">Tour end date</label>
                    <input type="date" id="wpforms-3896-field_17" class="wpforms-field-large" name="end_date">
                </div>
                <div id="wpforms-3896-field_18-container" class="wpforms-field wpforms-field-textarea mb-4" data-field-id="18">
                    <label class="wpforms-field-label" for="wpforms-3896-field_18">Any other requirements or briefly explain your expectations.</label>
                    <textarea id="wpforms-3896-field_18" class="wpforms-field-medium" name="other_requirements"></textarea>
                </div>
                <div class="comment-btn text-center">
                    <input type="submit" class="nir-btn" id="enquiry-submit" value="Send Enquiry" fdprocessedid="ce57wn">
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once BASE_PATH . '/includes/footer.php';?>

</body>
</html>