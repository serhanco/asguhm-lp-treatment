<?php
get_header("lptr");
$plugin_dir = plugins_url() . "/asguhm-lp-treatment/";
$current_url = get_permalink();
$uhmmail = "apply@acibadem.com";
$domain = $_SERVER['HTTP_HOST'];
switch ($domain) {
    case 'acibademinternational.com':
        $site = 'en';
        break;
    case 'acibadem.com.ro':
        $site = 'ro';
        break;
    case 'acibadem.com.az':
        $site = 'az';
        break;
    case 'acibadem.com.ru':
        $site = 'ru';
        break;
    default:
        $site = 'en';
        break;
}
$translations = array(
    "Home" => array(
        "en" => "Home",
        "ro" => "Acasa",
        "az" => "",
        "ru" => "",
    ),
    "The Center" => array(
        "en" => "The Center",
        "ro" => "Centrul",
        "az" => "",
        "ru" => "",
    ),
    "Procedures" => array(
        "en" => "Procedures",
        "ro" => "Tratamente",
        "az" => "",
        "ru" => "",
    ),
    "Doctors" => array(
        "en" => "Doctors",
        "ro" => "Medicii",
        "az" => "",
        "ru" => "",
    ),
    "Contact" => array(
        "en" => "Contact",
        "ro" => "Contact",
        "az" => "",
        "ru" => "",
    ),
    "Appointment" => array(
        "en" => "Appointment",
        "ro" => "Programare",
        "az" => "",
        "ru" => "",
    ),
    "Appointment Description" => array(
        "en" => "Our team is ready to assist you with personalized care and expert guidance every step of the way.",
        "ro" => "Echipa noastră este pregătită să vă ajute cu îngrijire personalizată și îndrumări de specialitate la fiecare pas.",
        "az" => "",
        "ru" => "",
    ),
    "Preferred Date" => array(
        "en" => "Preferred Date",
        "ro" => "Data",
        "az" => "",
        "ru" => "",
    ),
    "Get Started" => array(
        "en" => "Get Started",
        "ro" => "Începe acum",
        "az" => "",
        "ru" => "",
    ),
    "Get Answers" => array(
        "en" => "Get Answers",
        "ro" => "Obține răspunsul",
        "az" => "",
        "ru" => "",
    ),
    "Video Title" => array(
        "en" => "Explore Our Center",
        "ro" => "Descoperă Centrul Nostru",
        "az" => "",
        "ru" => "",
    ),
    "Optional" => array(
        "en" => "Optional",
        "ro" => "opțional",
        "az" => "",
        "ru" => "",
    ),
    "Make an Appointment" => array(
        "en" => "Make an Appointment",
        "ro" => "Fă-ți o programare",
        "az" => "",
        "ru" => "",
    ),
    "Doctors Description" => array(
        "en" => "Meet our dedicated team of experts at Acibadem Healthcare Group Hospitals, each specializing in cancer treatment. These skilled professionals are committed to offering compassionate, patient-focused care, combining their extensive knowledge with the latest technology.",
        "ro" => "Faceți cunoștință cu echipa noastră de experți de la Spitalele Acibadem Healthcare Group. Fiecare dintre aceşti doctori este specializat în tratamentul cancerului de sân. Acești profesioniști se angajează să ofere îngrijire, empatie,  combinând cunoștințele lor vaste cu cea mai recentă tehnologie.",
        "az" => "",
        "ru" => "",
    ),
    "Schedule Appointment" => array(
        "en" => "Schedule Appointment",
        "ro" => "Fă-ți o programare",
        "az" => "",
        "ru" => "",
    ),
    "Talk to Doctor" => array(
        "en" => "Talk to Doctor",
        "ro" => "Vorbeste cu Medicul",
        "az" => "",
        "ru" => "",
    ),
    "Frequently Asked Questions" => array(
        "en" => "Frequently Asked Questions",
        "ro" => "Întrebări frecvente",
        "az" => "",
        "ru" => "",
    ),
    "Gallery" => array(
        "en" => "Gallery",
        "ro" => "Galerie",
        "az" => "",
        "ru" => "",
    ),
    "Contact Description" => array(
        "en" => "Acıbadem is one of the few extensive breast cancer centers worldwide that offers service to the most complex cancer cases. If you would like to learn more, you are encouraged to talk with us.",
        "ro" => "Acıbadem este unul dintre puținele centre extinse de cancer de sân din întreaga lume care oferă servicii pentru cele mai complexe cazuri de cancer. Dacă doriți să aflați mai multe, sunteți încurajat să ne contactați.",
        "az" => "",
        "ru" => "",
    ),
    "Whatsapp" => array(
        "en" => "Whatsapp",
        "ro" => "Whatsapp",
        "az" => "",
        "ru" => "",
    ),
    "Call" => array(
        "en" => "Call",
        "ro" => "Telefon",
        "az" => "",
        "ru" => "",
    ),
    "Subject" => array(
        "en" => "Subject",
        "ro" => "Subiect",
        "az" => "",
        "ru" => "",
    ),
    "Send Message" => array(
        "en" => "Send Message",
        "ro" => "Trimite Mesajul",
        "az" => "",
        "ru" => "",
    ),
);

$lp_stats_numbers = get_field("lp_stats_numbers");
$lp_stats_numbers = explode("|", $lp_stats_numbers);
$lp_stats_texts = get_field("lp_stats_texts");
$lp_stats_texts = explode("|", $lp_stats_texts);

$lp_icons_titles0 = get_field("lp_icons_titles");
$lp_icons_titles = explode("|", $lp_icons_titles0);
$lp_icons_descriptions = get_field("lp_icons_descriptions");
$lp_icons_descriptions = explode("|", $lp_icons_descriptions);

// Get the related doctors from the ACF field
$related_doctors = get_field('lp_related_doctors');
// Check if there are related doctors
//if ($related_doctors) {


?>
<style>
    /*@media (min-width: 992px) {
        #header .logo img {
            max-height: 100%;
        }
    }

    @media (min-width: 1200px) {
        /*#hero h1 {
            font-size: 2.5rem;
        }
    }*/

    #header .logo img {
        max-width: fit-content;
    }

    #header{
        background-color: rgba(255, 255, 255, 0.9)
    }

    #header {
        top:0px;
    }

    section {
        /*padding: 30px;serhan*/
    }

    @media only screen and (min-width: 768px) {
        .count-box p {
            min-height: 42px;
        }
    }

    @media only screen and (max-width: 768px) {
        section {
            padding: 15px;/*serhan*/
        }
        .doctors .member {
            
        }
        /*.logo a img {
            max-width: 85%;
        } */       
    }

    .container-fluid img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
    
    .testimonials .testimonial-item .testimonial-img {
        width: 90px;
        height: 90px;
    }

    #site-footer>div>div>div.col-md-9.align-self-center>p {
        color: #FFFFFF !important;
    }
</style>
<!--<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center"><i class="bi bi-envelope"></i><a href="mailto:<?= $uhmmail ?>"><?= $uhmmail ?></a><i class="bi bi-phone"></i><a href="tel:+90 216 544 4664">+90 216 544 4664</a></div>
        <div class="d-none d-lg-flex social-links align-items-center"><a href="https://www.facebook.com/AcibademHospitalsGroup/" class="facebook"><i class="bi bi-facebook"></i></a><a href="https://instagram.com/acibadem.international" class="instagram"><i class="bi bi-instagram"></i></a>
        </div>
    </div>
</div>-->
<header id="header" class="fixed-top" style="height: 79px; margin-bottom:0px;">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="#"><img src="<?= get_template_directory_uri() ?>/assets/transparent-bg-blueface.png" alt=""></a></h1>
        <nav class="navbar order-last order-lg-0" id=navbar>
            <ul>
                <li><a class="nav-link scrollto active" href="#hero"><?= $translations["Home"][$site] ?></a></li>
                <li><a class="nav-link scrollto" href="#about"><?= $translations["The Center"][$site] ?></a></li>
                <li><a class="nav-link scrollto" href="#departments"><?= $translations["Procedures"][$site] ?></a></li>
                <?php if ($related_doctors) { ?><li><a class="nav-link scrollto" href="#doctors"><?= $translations["Doctors"][$site] ?></a></li><?php } ?>
                <li><a class="nav-link scrollto" href="#contact"><?= $translations["Contact"][$site] ?></a></li>
            </ul>
        </nav><a class="appointment-btn scrollto" href=#appointment><span class="d-md-inline"><?= $translations["Appointment"][$site] ?></a>
    </div>
</header>
<section id="hero" class="d-flex align-items-center" style="background: url('<?php the_post_thumbnail_url(); ?>') top center; background-size: cover;">
    <div class="container">
    <?php
        $slug = get_post_field( 'post_name', get_post() );
        $text_white_class = ($slug === 'acibadem-healthcare-group') ? 'text-white' : '';
    ?>
    <h1 class="<?= $text_white_class ?>"><?php the_title(); ?></h1>
    <h2 class="<?= $text_white_class ?>" style="max-width:55%"><?= get_field('lp_spot_text'); ?></h2>
    <a href="#why-us" class="btn-get-started scrollto"><?= $translations["Get Started"][$site] ?></a>
    </div>
</section>
<main id="main">
    <section id="why-us" class="why-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="content">
                        <h3><?= $translations["Get Answers"][$site] ?>!</h3>
                        <form action="https://internationalapp.net/formi/" method="post" role="form" id="form1">
                            <div class="row">
                                <div class="col-xl-6 form-group"><input type="text" name="FirstName" class="form-control" id="f1name" placeholder="<?= the_field('f_name', 'option'); ?>" required=""></div>
                                <div class="col-xl-6 form-group mt-3 mt-xl-0"><input type="text" class="form-control" name="LastName" id="f1last" placeholder="<?= the_field('f_last', 'option'); ?>" required=""></div>
                            </div>
                            <div class="form-group mt-3"><select name="CountryId" id="f1country" class="form-select" required="">
                                    <option value=""><?= the_field('f_country', 'option'); ?></option>
                                    <option value="1">Afghanistan</option><option value="2">Albania</option><option value="3">Algeria</option><option value="4">American Samoa</option><option value="5">Andorra</option><option value="6">Angola</option><option value="7">Anguilla</option><option value="8">Antarctica</option><option value="9">Antigua and Barbuda</option><option value="10">Argentina</option><option value="11">Armenia</option><option value="12">Aruba</option><option value="13">Australia</option><option value="14">Austria</option><option value="15">Azerbaijan</option><option value="16">Bahamas</option><option value="17">Bahrain</option><option value="18">Bangladesh</option><option value="19">Barbados</option><option value="20">Belarus</option><option value="21">Belgium</option><option value="22">Belize</option><option value="23">Benin</option><option value="24">Bermuda</option><option value="25">Bhutan</option><option value="26">Bolivia</option><option value="265">Bosnia and Herzegovina</option><option value="28">Botswana</option><option value="30">Brazil</option><option value="31">British Indian Ocean Territory</option><option value="32">Brunei Darussalam</option><option value="33">Bulgaria</option><option value="34">Burkina Faso</option><option value="35">Burundi</option><option value="39">Cabo Verde</option><option value="36">Cambodia</option><option value="37">Cameroon</option><option value="38">Canada</option><option value="40">Cayman Islands</option><option value="41">Central African Republic</option><option value="42">Chad</option><option value="43">Chile</option><option value="271">China</option><option value="45">Christmas Island</option><option value="46">Cocos (Keeling) Islands</option><option value="47">Colombia</option><option value="48">Comoros</option><option value="49">Congo</option><option value="50">Cook Islands</option><option value="51">Costa Rica</option><option value="52">Cote d'Ivoire</option><option value="53">Croatia</option><option value="54">Cuba</option><option value="155">Curaçao</option><option value="55">Cyprus</option><option value="56">Czechia</option><option value="246">Democratic Republic of the Congo</option><option value="57">Denmark</option><option value="58">Djibouti</option><option value="59">Dominica</option><option value="60">Dominican Republic</option><option value="62">Ecuador</option><option value="63">Egypt</option><option value="64">El Salvador</option><option value="65">England</option><option value="66">Equatorial Guinea</option><option value="67">Eritrea</option><option value="68">Estonia</option><option value="210">Eswatini</option><option value="69">Ethiopia</option><option value="70">Falkland Islands</option><option value="71">Faroe Islands</option><option value="72">Fiji</option><option value="74">Finland</option><option value="75">France</option><option value="77">French Guiana</option><option value="78">French Polynesia</option><option value="80">Gabon</option><option value="81">Gambia</option><option value="82">Georgia</option><option value="83">Germany</option><option value="84">Ghana</option><option value="85">Gibraltar</option><option value="86">Greece</option><option value="87">Greenland</option><option value="88">Grenada</option><option value="89">Guadeloupe</option><option value="90">Guam</option><option value="91">Guatemala</option><option value="92">Guinea</option><option value="93">Guinea-Bissau</option><option value="94">Guyana</option><option value="95">Haiti</option><option value="97">Honduras</option><option value="98">Hong Kong</option><option value="99">Hungary</option><option value="100">Iceland</option><option value="101">India</option><option value="102">Indonesia</option><option value="104">Iraq</option><option value="105">Ireland</option><option value="103">Islamic Republic of Iran</option><option value="106">Israel</option><option value="107">Italy</option><option value="108">Jamaica</option><option value="278">Japan</option><option value="110">Jordan</option><option value="111">Kazakhstan</option><option value="112">Kenya</option><option value="113">Kiribati</option><option value="250">Kosovo</option><option value="116">Kuwait</option><option value="117">Kyrgyzstan</option><option value="119">Lao People's Democratic Republic</option><option value="120">Latvia</option><option value="121">Lebanon</option><option value="122">Lesotho</option><option value="124">Liberia</option><option value="125">Libya</option><option value="126">Liechtenstein</option><option value="127">Lithuania</option><option value="128">Luxembourg</option><option value="129">Macao</option><option value="131">Madagascar</option><option value="132">Malawi</option><option value="133">Malaysia</option><option value="277">Maldives</option><option value="135">Mali</option><option value="136">Malta</option><option value="137">Marshall Islands</option><option value="138">Martinique</option><option value="139">Mauritania</option><option value="276">Mauritius</option><option value="141">Mayotte</option><option value="142">Mexico</option><option value="143">Micronesia</option><option value="144">Moldova</option><option value="145">Monaco</option><option value="146">Mongolia</option><option value="249">Montenegro</option><option value="147">Montserrat</option><option value="148">Morocco</option><option value="149">Mozambique</option><option value="150">Myanmar</option><option value="151">Namibia</option><option value="152">Nauru</option><option value="153">Nepal</option><option value="154">Netherlands</option><option value="156">New Caledonia</option><option value="157">New Zealand</option><option value="158">Nicaragua</option><option value="159">Niger</option><option value="160">Nigeria</option><option value="161">Niue</option><option value="162">Norfolk Island</option><option value="114">North Korea (Democratic People's Republic of Korea)</option><option value="130">North Macedonia</option><option value="163">Northern Cyprus (Turkish Republic of Northern Cyprus)</option><option value="164">Northern Mariana Islands</option><option value="165">Norway</option><option value="166">Oman</option><option value="167">Pakistan</option><option value="168">Palau</option><option value="73">Palestine</option><option value="169">Panama</option><option value="170">Papua New Guinea</option><option value="171">Paraguay</option><option value="172">Peru</option><option value="173">Philippines</option><option value="175">Poland</option><option value="176">Portugal</option><option value="177">Puerto Rico</option><option value="178">Qatar</option><option value="115">Republic of Korea</option><option value="179">Reunion</option><option value="180">Romania</option><option value="181">Russian Federation</option><option value="183">Rwanda</option><option value="205">Saint Helena, Ascension and Tristan da Cunha</option><option value="184">Saint Kitts and Nevis</option><option value="185">Saint Lucia</option><option value="206">Saint Pierre and Miquelon</option><option value="186">Saint Vincent and the Grenadines</option><option value="187">Samoa</option><option value="188">San Marino</option><option value="189">Sao Tome and Principe</option><option value="190">Saudi Arabia</option><option value="191">Scotland</option><option value="192">Senegal</option><option value="251">Serbia</option><option value="194">Seychelles</option><option value="195">Sierra Leone</option><option value="196">Singapore</option><option value="197">Slovakia</option><option value="198">Slovenia</option><option value="199">Solomon Islands</option><option value="200">Somalia</option><option value="201">South Africa</option><option value="279">South Sudan</option><option value="203">Spain</option><option value="204">Sri Lanka</option><option value="207">Sudan</option><option value="208">Suriname</option><option value="209">Svalbard and Jan Mayen</option><option value="211">Sweden</option><option value="212">Switzerland</option><option value="213">Syrian Arab Republic</option><option value="214">Taiwan</option><option value="215">Tajikistan</option><option value="216">Tanzania</option><option value="217">Thailand</option><option value="61">Timor-Leste</option><option value="218">Togo</option><option value="219">Tokelau</option><option value="220">Tonga</option><option value="221">Trinidad and Tobago</option><option value="222">Tunisia</option><option value="224">Turkmenistan</option><option value="225">Turks and Caicos Islands</option><option value="226">Tuvalu</option><option value="223">Türkiye</option><option value="228">Uganda</option><option value="229">Ukraine</option><option value="230">United Arab Emirates</option><option value="231">United Kingdom</option><option value="227">United States of America</option><option value="233">Uruguay</option><option value="235">Uzbekistan</option><option value="236">Vanuatu</option><option value="238">Venezuela</option><option value="239">Viet Nam</option><option value="240">Virgin Islands (British)</option><option value="241">Virgin Islands (U.S.)</option><option value="242">Wales</option><option value="243">Wallis and Futuna</option><option value="245">Yemen</option><option value="247">Zambia</option><option value="248">Zimbabwe</option>
                                </select></div>
                            <div class="form-group mt-3"><input type="text" class="form-control" name="Phone" id="f1phone" placeholder="<?= the_field('f_phone', 'option'); ?>"></div>
                            <div class="form-group mt-3"><input type="text" class="form-control" name="Mail" id="f1mail" placeholder="<?= the_field('f_email', 'option'); ?>"></div>
                            <div class="form-group mt-3"><textarea class="form-control" name="Message" rows="5" placeholder="<?= the_field('f_message', 'option'); ?>" required=""></textarea></div>
                            <div class="text-center"><button id="f1submit" type="submit" class="form-control more-btn mt-3"><?= the_field('f_send', 'option'); ?><i class="bx bx-chevron-right"></i></button></div>
                        </form>
                        <script>
document.getElementById('form1').addEventListener('submit', function(event) {
    var phoneValue = document.getElementById('f1phone').value;
    var emailValue = document.getElementById('f1mail').value;
    var submitButton = document.getElementById('f1submit');

    // Check if at least one of them is filled with at least 6 characters
    if ((phoneValue.length < 6 && emailValue.length < 6) || (!phoneValue && !emailValue)) {
        event.preventDefault();
        alert('Please fill at least one of the phone or email fields with at least 6 characters.');
    } else {
        // Prevent double submission by disabling the submit button
        submitButton.disabled = true;
        submitButton.innerHTML = 'Submitting...';
    }
});
</script>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0"><i class="bx bx-task"></i>
                                    <h4><?= $lp_icons_titles[0] ?></h4>
                                    <p><?= $lp_icons_descriptions[0] ?></p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0"><i class="bx bx-heart"></i>
                                    <h4><?= $lp_icons_titles[1] ?></h4>
                                    <p><?= $lp_icons_descriptions[1] ?></p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0"><i class="bx bx-star"></i>
                                    <h4><?= $lp_icons_titles[2] ?></h4>
                                    <p><?= $lp_icons_descriptions[2] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center d-sm-block d-xs-block d-md-none"><a target="_blank" href="https://api.whatsapp.com/send/?phone=<?= the_field('lp_whatsapp_number') ?>&text&type=phone_number&app_absent=0"><img class="img-fluid my-4" src="<?= $plugin_dir ?>assets/img/banner/<?= $site ?>.png" alt=""></a>
    </div>
    <section id="about" class="about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative" style="background:url(<?= the_field('lp_center_bg_image') ?>) center center no-repeat"><a href="<?= the_field('lp_youtube_url') ?>" class="glightbox play-btn mb-4"></a>
                </div>
                <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                    <?= the_field('lp_center_wysiwyg') ?>
                </div>
            </div>
        </div>
    </section>
    <section id="counts" class="counts">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="count-box"><i class="fas fa-user-md"></i><span data-purecounter-start="0" data-purecounter-end="<?= $lp_stats_numbers[0] ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p><?= $lp_stats_texts[0] ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="count-box"><i class="far fa-hospital"></i><span data-purecounter-start="0" data-purecounter-end="<?= $lp_stats_numbers[1] ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p><?= $lp_stats_texts[1] ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-5 mt-lg-0">
                    <div class="count-box"><i class="fas fa-flask"></i><span data-purecounter-start="0" data-purecounter-end="<?= $lp_stats_numbers[2] ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p><?= $lp_stats_texts[2] ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-5 mt-lg-0">
                    <div class="count-box"><i class="fas fa-award"></i><span data-purecounter-start="0" data-purecounter-end="<?= $lp_stats_numbers[3] ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p><?= $lp_stats_texts[3] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="departments" class="departments">
        <div class="container">
            <?php 
            // Check if the page type is 'check-up'
            if (function_exists('get_field') && get_field('treatment_page_type') == 'check-up') :
                // Load the check-up packages partial
                get_template_part('templates/partials/section-checkup-packages');
            else : 
                // This is not a check-up page, so display the default content
            ?>
            <div class="section-title">
                <h2><?= $translations["Procedures"][$site] ?></h2>
                <p><?= the_field("lp_procedures_description") ?></p>
            </div>
            <div class="row">
                <div class="col-lg-6 container-fluid">
                    <?= the_content() ?>
                </div>
                <div class="col-lg-6  container-fluid d-flex align-items-center" style="flex-direction: column;"><a href="#contact"><img  class="img-fluid center-block" src="<?= the_field('lp_procedures_image') ?>" alt=""></a></div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <section id="appointment" class="appointment section-bg">
        <div class="container">
            <div class="section-title">
                <h2><?= $translations["Appointment"][$site] ?></h2>
                <p><?= $translations["Appointment Description"][$site] ?></p>
            </div>
            <form action="https://internationalapp.net/formi/" method="post" role="form" class="php-email-form" id="form2">
                <div class="row">
                    <div class="col-md-4 form-group"><input required type="text" name="FirstName" class="form-control" id="f2name" placeholder="<?= the_field('f_name', 'option'); ?>" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0"><input required type="text" class="form-control" name="LastName" id="f2lname" placeholder="<?= the_field('f_last', 'option'); ?>" data-rule="email" data-msg="Please enter a valid email">
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0"><input type="tel" class="form-control" name="Phone" id="f2phone" placeholder="<?= the_field('f_phone', 'option'); ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group mt-3"><input type="email" class="form-control" name="Mail" id="f2email" placeholder="<?= the_field('f_email', 'option'); ?>" data-rule="email" data-msg="Please enter a valid email">
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3"><select required name="CountryId" id="f2country" class="form-select">
                            <option value=""><?= the_field('f_country', 'option'); ?></option>
                            <option value="" selected="" disabled="">Country</option><option value="1">Afghanistan</option><option value="2">Albania</option><option value="3">Algeria</option><option value="4">American Samoa</option><option value="5">Andorra</option><option value="6">Angola</option><option value="7">Anguilla</option><option value="8">Antarctica</option><option value="9">Antigua and Barbuda</option><option value="10">Argentina</option><option value="11">Armenia</option><option value="12">Aruba</option><option value="13">Australia</option><option value="14">Austria</option><option value="15">Azerbaijan</option><option value="16">Bahamas</option><option value="17">Bahrain</option><option value="18">Bangladesh</option><option value="19">Barbados</option><option value="20">Belarus</option><option value="21">Belgium</option><option value="22">Belize</option><option value="23">Benin</option><option value="24">Bermuda</option><option value="25">Bhutan</option><option value="26">Bolivia</option><option value="265">Bosnia and Herzegovina</option><option value="28">Botswana</option><option value="30">Brazil</option><option value="31">British Indian Ocean Territory</option><option value="32">Brunei Darussalam</option><option value="33">Bulgaria</option><option value="34">Burkina Faso</option><option value="35">Burundi</option><option value="39">Cabo Verde</option><option value="36">Cambodia</option><option value="37">Cameroon</option><option value="38">Canada</option><option value="40">Cayman Islands</option><option value="41">Central African Republic</option><option value="42">Chad</option><option value="43">Chile</option><option value="271">China</option><option value="45">Christmas Island</option><option value="46">Cocos (Keeling) Islands</option><option value="47">Colombia</option><option value="48">Comoros</option><option value="49">Congo</option><option value="50">Cook Islands</option><option value="51">Costa Rica</option><option value="52">Cote d'Ivoire</option><option value="53">Croatia</option><option value="54">Cuba</option><option value="155">Curaçao</option><option value="55">Cyprus</option><option value="56">Czechia</option><option value="246">Democratic Republic of the Congo</option><option value="57">Denmark</option><option value="58">Djibouti</option><option value="59">Dominica</option><option value="60">Dominican Republic</option><option value="62">Ecuador</option><option value="63">Egypt</option><option value="64">El Salvador</option><option value="65">England</option><option value="66">Equatorial Guinea</option><option value="67">Eritrea</option><option value="68">Estonia</option><option value="210">Eswatini</option><option value="69">Ethiopia</option><option value="70">Falkland Islands</option><option value="71">Faroe Islands</option><option value="72">Fiji</option><option value="74">Finland</option><option value="75">France</option><option value="77">French Guiana</option><option value="78">French Polynesia</option><option value="80">Gabon</option><option value="81">Gambia</option><option value="82">Georgia</option><option value="83">Germany</option><option value="84">Ghana</option><option value="85">Gibraltar</option><option value="86">Greece</option><option value="87">Greenland</option><option value="88">Grenada</option><option value="89">Guadeloupe</option><option value="90">Guam</option><option value="91">Guatemala</option><option value="92">Guinea</option><option value="93">Guinea-Bissau</option><option value="94">Guyana</option><option value="95">Haiti</option><option value="97">Honduras</option><option value="98">Hong Kong</option><option value="99">Hungary</option><option value="100">Iceland</option><option value="101">India</option><option value="102">Indonesia</option><option value="104">Iraq</option><option value="105">Ireland</option><option value="103">Islamic Republic of Iran</option><option value="106">Israel</option><option value="107">Italy</option><option value="108">Jamaica</option><option value="278">Japan</option><option value="110">Jordan</option><option value="111">Kazakhstan</option><option value="112">Kenya</option><option value="113">Kiribati</option><option value="250">Kosovo</option><option value="116">Kuwait</option><option value="117">Kyrgyzstan</option><option value="119">Lao People's Democratic Republic</option><option value="120">Latvia</option><option value="121">Lebanon</option><option value="122">Lesotho</option><option value="124">Liberia</option><option value="125">Libya</option><option value="126">Liechtenstein</option><option value="127">Lithuania</option><option value="128">Luxembourg</option><option value="129">Macao</option><option value="131">Madagascar</option><option value="132">Malawi</option><option value="133">Malaysia</option><option value="277">Maldives</option><option value="135">Mali</option><option value="136">Malta</option><option value="137">Marshall Islands</option><option value="138">Martinique</option><option value="139">Mauritania</option><option value="276">Mauritius</option><option value="141">Mayotte</option><option value="142">Mexico</option><option value="143">Micronesia</option><option value="144">Moldova</option><option value="145">Monaco</option><option value="146">Mongolia</option><option value="249">Montenegro</option><option value="147">Montserrat</option><option value="148">Morocco</option><option value="149">Mozambique</option><option value="150">Myanmar</option><option value="151">Namibia</option><option value="152">Nauru</option><option value="153">Nepal</option><option value="154">Netherlands</option><option value="156">New Caledonia</option><option value="157">New Zealand</option><option value="158">Nicaragua</option><option value="159">Niger</option><option value="160">Nigeria</option><option value="161">Niue</option><option value="162">Norfolk Island</option><option value="114">North Korea (Democratic People's Republic of Korea)</option><option value="130">North Macedonia</option><option value="163">Northern Cyprus (Turkish Republic of Northern Cyprus)</option><option value="164">Northern Mariana Islands</option><option value="165">Norway</option><option value="166">Oman</option><option value="167">Pakistan</option><option value="168">Palau</option><option value="73">Palestine</option><option value="169">Panama</option><option value="170">Papua New Guinea</option><option value="171">Paraguay</option><option value="172">Peru</option><option value="173">Philippines</option><option value="175">Poland</option><option value="176">Portugal</option><option value="177">Puerto Rico</option><option value="178">Qatar</option><option value="115">Republic of Korea</option><option value="179">Reunion</option><option value="180">Romania</option><option value="181">Russian Federation</option><option value="183">Rwanda</option><option value="205">Saint Helena, Ascension and Tristan da Cunha</option><option value="184">Saint Kitts and Nevis</option><option value="185">Saint Lucia</option><option value="206">Saint Pierre and Miquelon</option><option value="186">Saint Vincent and the Grenadines</option><option value="187">Samoa</option><option value="188">San Marino</option><option value="189">Sao Tome and Principe</option><option value="190">Saudi Arabia</option><option value="191">Scotland</option><option value="192">Senegal</option><option value="251">Serbia</option><option value="194">Seychelles</option><option value="195">Sierra Leone</option><option value="196">Singapore</option><option value="197">Slovakia</option><option value="198">Slovenia</option><option value="199">Solomon Islands</option><option value="200">Somalia</option><option value="201">South Africa</option><option value="279">South Sudan</option><option value="203">Spain</option><option value="204">Sri Lanka</option><option value="207">Sudan</option><option value="208">Suriname</option><option value="209">Svalbard and Jan Mayen</option><option value="211">Sweden</option><option value="212">Switzerland</option><option value="213">Syrian Arab Republic</option><option value="214">Taiwan</option><option value="215">Tajikistan</option><option value="216">Tanzania</option><option value="217">Thailand</option><option value="61">Timor-Leste</option><option value="218">Togo</option><option value="219">Tokelau</option><option value="220">Tonga</option><option value="221">Trinidad and Tobago</option><option value="222">Tunisia</option><option value="224">Turkmenistan</option><option value="225">Turks and Caicos Islands</option><option value="226">Tuvalu</option><option value="223">Türkiye</option><option value="228">Uganda</option><option value="229">Ukraine</option><option value="230">United Arab Emirates</option><option value="231">United Kingdom</option><option value="227">United States of America</option><option value="233">Uruguay</option><option value="235">Uzbekistan</option><option value="236">Vanuatu</option><option value="238">Venezuela</option><option value="239">Viet Nam</option><option value="240">Virgin Islands (British)</option><option value="241">Virgin Islands (U.S.)</option><option value="242">Wales</option><option value="243">Wallis and Futuna</option><option value="245">Yemen</option><option value="247">Zambia</option><option value="248">Zimbabwe</option>
                        </select>
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3"><input type="text" name="pdate" class="form-control" id="f2pdate" placeholder="<?= $translations["Preferred Date"][$site] ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <textarea id="f2message" class="form-control" name="Message" rows="5" placeholder="<?= the_field("f_message", "option") . " (" . $translations['Optional'][$site]; ?>)"></textarea>
                </div>
                <div class="text-center"><button id="f2submit" type="submit"><?= $translations["Make an Appointment"][$site] ?></button></div>
            </form>
            <script>
document.getElementById('form2').addEventListener('submit', function(event) {
    // Prevent form submission
    event.preventDefault();

    var firstName = document.getElementById('f2name').value;
    var lastName = document.getElementById('f2lname').value;
    var phone = document.getElementById('f2phone').value;
    var email = document.getElementById('f2email').value;
    var pdate = document.getElementById('f2pdate').value;
    var message = document.getElementById('f2message').value;
    var submitButton = document.getElementById('f2submit');

    // Check if either phone or email is provided with at least 6 characters
    if ((phone.length < 6 && email.length < 6)) {
        alert('Please provide either a valid phone number or email address with at least 6 characters.');
        return;
    }

    // Append pdate to the message
    message += ' Preferred Date: ' + pdate;

    // Update the message field value
    document.getElementById('f2message').value = message;

    // Disable the submit button to prevent double submissions
    submitButton.disabled = true;
    submitButton.innerHTML = 'Submitting...';

    // Submit the form
    this.submit();
});
</script>             
        </div>
    </section>

    <?php
        // Check if there are related doctors
        if ($related_doctors) {
    ?>
    <section id="doctors" class="doctors">
        <div class="container">
            <div class="section-title">
                <h2><?= $translations["Doctors"][$site] ?></h2>
                <?php /* <p><?= $translations["Doctors Description"][$site] ?></p> */ ?>
            </div>
            <div class="row">
            <?php
                // Loop through each related doctor
                foreach ($related_doctors as $doctor) {
                    // Get doctor details
                    $doctor_name = $doctor->post_title;
                    $doctor_title = get_field('d_medical_title', $doctor->ID); // Assuming 'position' is the custom field for the doctor's position
                    $doctor_specialty = get_field('d_profession', $doctor->ID); // Assuming 'specialty' is the custom field for the doctor's specialty
                    $doctor_image = get_the_post_thumbnail_url($doctor->ID, 'medium'); // Assuming 'thumbnail' is the image size

                    // Output doctor information
            ?>
                    <div class="col-lg-4 mt-4">
                        <div class="member d-flex align-items-start">
                            <div class="pic col-5"><img src="<?php echo $doctor_image; ?>" class="img-fluid" alt=""></div>
                            <div class="member-info col-7">
                                <h4><?php echo $doctor_name; ?></h4><span><?php echo $doctor_title; ?></span>
                                <p><?php echo $doctor_specialty; ?></p>
                                <div class="social">
                                    <div class="col details order-2 order-lg-1">
                                        <a href="https://api.whatsapp.com/send/?phone=<?= the_field('lp_whatsapp_number') ?>&text&type=phone_number&app_absent=0" target="_blank" style="all:unset!important" href="">
                                            <button type="button" class="btn btn-success"><?= $translations["Contact"][$site] ?></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                } // End foreach
            ?>        
        </div>
    </section>
    <?php
    } // End if for doctors section
    ?>
    <section id="faq" class="faq section-bg">
        <div class="container">
            <div class="section-title">
                <h2><?= $translations["Frequently Asked Questions"][$site] ?></h2>
                <p><?= the_field("lp_faq_intro") ?></p>
            </div>
            <div class="faq-list">
                <ul>
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <?php
                        // Get the ACF field values
                        $field_key = "lp_faq_q$i";
                        $field_value = get_field($field_key);

                        // If the field is empty, skip this iteration
                        if (empty($field_value)) {
                            continue;
                        }

                        // Split the string into question and answer
                        $question_answer = explode("|", $field_value);
                        $question = isset($question_answer[0]) ? $question_answer[0] : '';
                        $answer = isset($question_answer[1]) ? $question_answer[1] : '';
                        ?>

                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i>
                            <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-<?php echo $i; ?>">
                                <?php echo $question; ?>
                                <i class="bx bx-chevron-down icon-show"></i>
                                <i class="bx bx-chevron-up icon-close"></i>
                            </a>
                            <div id="faq-list-<?php echo $i; ?>" class="<?php echo ($i === 1) ? 'collapse show' : 'collapse'; ?>" data-bs-parent=".faq-list">
                                <p><?php echo $answer; ?></p>
                            </div>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </section>
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    <?php for ($i = 1; $i <= 3; $i++) : ?>
                        <?php
                        // Get the ACF field value for each testimonial
                        $testimonial_key = "lp_testimonial_$i";
                        $testimonial_value = get_field($testimonial_key);

                        // Check if the testimonial field is empty
                        if (empty($testimonial_value)) {
                            continue; // Skip this testimonial if it's empty
                        }

                        // Split the testimonial string into name, country, and text
                        $testimonial_parts = explode("|", $testimonial_value);
                        $name = isset($testimonial_parts[0]) ? $testimonial_parts[0] : '';
                        $country = isset($testimonial_parts[1]) ? $testimonial_parts[1] : '';
                        $text = isset($testimonial_parts[2]) ? $testimonial_parts[2] : '';
                        ?>
                        <div class="swiper-slide" data-swiper-slide-index="<?php echo $i - 1; ?>" role="group" aria-label="<?php echo $i; ?> / 5" style="width:936px;margin-right:20px">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="<?= $plugin_dir ?>assets/img/testimonials/<?php echo the_field('lp_subject') . '-' . $i; ?>.webp" class="testimonial-img" alt="">
                                    <h3><?php echo $name; ?></h3>
                                    <h4><?php echo $country; ?></h4>
                                    <p><i class="bx bxs-quote-alt-left quote-icon-left"></i><?php echo $text; ?><i class="bx bxs-quote-alt-right quote-icon-right"></i></p>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section id="gallery" class="gallery">
        <div class="container">
            <div class="section-title">
                <h2><?= $translations["Gallery"][$site] ?></h2>
                <p><?= the_field("lp_gallery_intro") ?></p>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row g-0">
                <div class="col-6 col-md-4">
                    <div class="gallery-item"><a href="<?php echo $plugin_dir; ?>/assets/img/gallery/1.jpg" class="galelry-lightbox"><img loading="lazy" src="<?php echo $plugin_dir; ?>assets/img/gallery/1.jpg" alt="" class="img-fluid"></a></div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="gallery-item"><a href="<?php echo $plugin_dir; ?>assets/img/gallery/2.jpg" class="galelry-lightbox"><img loading="lazy" src="<?php echo $plugin_dir; ?>assets/img/gallery/2.jpg" alt="" class="img-fluid"></a></div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="gallery-item"><a href="<?php echo $plugin_dir; ?>assets/img/gallery/3.jpg" class="galelry-lightbox"><img loading="lazy" src="<?php echo $plugin_dir; ?>assets/img/gallery/3.jpg" alt="" class="img-fluid"></a></div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="gallery-item"><a href="<?php echo $plugin_dir; ?>/assets/img/gallery/4.jpg" class="galelry-lightbox"><img loading="lazy" src="<?php echo $plugin_dir; ?>assets/img/gallery/4.jpg" alt="" class_="img-fluid"></a></div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="gallery-item"><a href="<?php echo $plugin_dir; ?>/assets/img/gallery/5.jpg" class="galelry-lightbox"><img loading="lazy" src="<?php echo $plugin_dir; ?>assets/img/gallery/5.jpg" alt="" class="img-fluid"></a></div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="gallery-item"><a href="<?php echo $plugin_dir; ?>/assets/img/gallery/6.jpg" class="galelry-lightbox"><img loading="lazy" src="<?php echo $plugin_dir; ?>assets/img/gallery/6.jpg" alt="" class="img-fluid"></a></div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="gallery-item"><a href="<?php echo $plugin_dir; ?>/assets/img/gallery/7.jpg" class="galelry-lightbox"><img loading="lazy" src="<?php echo $plugin_dir; ?>assets/img/gallery/7.jpg" alt="" class="img-fluid"></a></div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="gallery-item"><a href="<?php echo $plugin_dir; ?>/assets/img/gallery/8.jpg" class="galelry-lightbox"><img loading="lazy" src="<?php echo $plugin_dir; ?>assets/img/gallery/8.jpg" alt="" class="img-fluid"></a></div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2><?= $translations["Contact"][$site] ?></h2>
                <p><?= the_field("lp_contact_intro") ?></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="info">
                    <?php
                    $whatsapp_number = get_field('lp_whatsapp_number');
                    if (!empty($whatsapp_number)) {
                    ?>
                        <div class="email"><i class="bi bi-whatsapp"></i>
                            <h4><?= $translations["Whatsapp"][$site] ?>:</h4>
                            <p><a target="_blank" href="https://api.whatsapp.com/send/?phone=<?= the_field('lp_whatsapp_number') ?>&text&type=phone_number&app_absent=0"><?= the_field('lp_whatsapp_number') ?></a></p>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="email"><i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p><a href="tel:<?= the_field('lp_phone_number') ?>"><?= the_field('lp_phone_number') ?></a></p>
                        </div>
                        <div class="email"><i class="bi bi-envelope"></i>
                            <h4><?= the_field("f_email", "option") ?>:</h4>
                            <p><a href="mailto:apply@acibadem.com">apply@acibadem.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <form action="https://internationalapp.net/formi/" method="post" role="form" class="php-email-form" id="form3">
                        <div class="row">
                            <div class="col-md-6 form-group"><input type="text" name="FirstName" class="form-control" id="f3name" placeholder="<?= the_field('f_name', 'option'); ?>" required></div>
                            <div class="col-md-6 form-group"><input type="text" name="LastName" class="form-control" id="f3last" placeholder="<?= the_field('f_last', 'option'); ?>" required></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 form-group"><input type="text" name="Phone" class="form-control" id="f3phone" placeholder="<?= the_field('f_phone', 'option'); ?>"></div>
                            <div class="col-md-6 form-group"><input type="text" name="Mail" class="form-control" id="f3mail" placeholder="<?= the_field('f_email', 'option'); ?>"></div>
                        </div>
                        <div class="form-group mt-3">
                            <select name="CountryId" id="country" class="form-select form-control" required="">
                                <option value=""><?= the_field('f_country', 'option'); ?></option>
                                <option value="" selected="" disabled="">Country</option><option value="1">Afghanistan</option><option value="2">Albania</option><option value="3">Algeria</option><option value="4">American Samoa</option><option value="5">Andorra</option><option value="6">Angola</option><option value="7">Anguilla</option><option value="8">Antarctica</option><option value="9">Antigua and Barbuda</option><option value="10">Argentina</option><option value="11">Armenia</option><option value="12">Aruba</option><option value="13">Australia</option><option value="14">Austria</option><option value="15">Azerbaijan</option><option value="16">Bahamas</option><option value="17">Bahrain</option><option value="18">Bangladesh</option><option value="19">Barbados</option><option value="20">Belarus</option><option value="21">Belgium</option><option value="22">Belize</option><option value="23">Benin</option><option value="24">Bermuda</option><option value="25">Bhutan</option><option value="26">Bolivia</option><option value="265">Bosnia and Herzegovina</option><option value="28">Botswana</option><option value="30">Brazil</option><option value="31">British Indian Ocean Territory</option><option value="32">Brunei Darussalam</option><option value="33">Bulgaria</option><option value="34">Burkina Faso</option><option value="35">Burundi</option><option value="39">Cabo Verde</option><option value="36">Cambodia</option><option value="37">Cameroon</option><option value="38">Canada</option><option value="40">Cayman Islands</option><option value="41">Central African Republic</option><option value="42">Chad</option><option value="43">Chile</option><option value="271">China</option><option value="45">Christmas Island</option><option value="46">Cocos (Keeling) Islands</option><option value="47">Colombia</option><option value="48">Comoros</option><option value="49">Congo</option><option value="50">Cook Islands</option><option value="51">Costa Rica</option><option value="52">Cote d'Ivoire</option><option value="53">Croatia</option><option value="54">Cuba</option><option value="155">Curaçao</option><option value="55">Cyprus</option><option value="56">Czechia</option><option value="246">Democratic Republic of the Congo</option><option value="57">Denmark</option><option value="58">Djibouti</option><option value="59">Dominica</option><option value="60">Dominican Republic</option><option value="62">Ecuador</option><option value="63">Egypt</option><option value="64">El Salvador</option><option value="65">England</option><option value="66">Equatorial Guinea</option><option value="67">Eritrea</option><option value="68">Estonia</option><option value="210">Eswatini</option><option value="69">Ethiopia</option><option value="70">Falkland Islands</option><option value="71">Faroe Islands</option><option value="72">Fiji</option><option value="74">Finland</option><option value="75">France</option><option value="77">French Guiana</option><option value="78">French Polynesia</option><option value="80">Gabon</option><option value="81">Gambia</option><option value="82">Georgia</option><option value="83">Germany</option><option value="84">Ghana</option><option value="85">Gibraltar</option><option value="86">Greece</option><option value="87">Greenland</option><option value="88">Grenada</option><option value="89">Guadeloupe</option><option value="90">Guam</option><option value="91">Guatemala</option><option value="92">Guinea</option><option value="93">Guinea-Bissau</option><option value="94">Guyana</option><option value="95">Haiti</option><option value="97">Honduras</option><option value="98">Hong Kong</option><option value="99">Hungary</option><option value="100">Iceland</option><option value="101">India</option><option value="102">Indonesia</option><option value="104">Iraq</option><option value="105">Ireland</option><option value="103">Islamic Republic of Iran</option><option value="106">Israel</option><option value="107">Italy</option><option value="108">Jamaica</option><option value="278">Japan</option><option value="110">Jordan</option><option value="111">Kazakhstan</option><option value="112">Kenya</option><option value="113">Kiribati</option><option value="250">Kosovo</option><option value="116">Kuwait</option><option value="117">Kyrgyzstan</option><option value="119">Lao People's Democratic Republic</option><option value="120">Latvia</option><option value="121">Lebanon</option><option value="122">Lesotho</option><option value="124">Liberia</option><option value="125">Libya</option><option value="126">Liechtenstein</option><option value="127">Lithuania</option><option value="128">Luxembourg</option><option value="129">Macao</option><option value="131">Madagascar</option><option value="132">Malawi</option><option value="133">Malaysia</option><option value="277">Maldives</option><option value="135">Mali</option><option value="136">Malta</option><option value="137">Marshall Islands</option><option value="138">Martinique</option><option value="139">Mauritania</option><option value="276">Mauritius</option><option value="141">Mayotte</option><option value="142">Mexico</option><option value="143">Micronesia</option><option value="144">Moldova</option><option value="145">Monaco</option><option value="146">Mongolia</option><option value="249">Montenegro</option><option value="147">Montserrat</option><option value="148">Morocco</option><option value="149">Mozambique</option><option value="150">Myanmar</option><option value="151">Namibia</option><option value="152">Nauru</option><option value="153">Nepal</option><option value="154">Netherlands</option><option value="156">New Caledonia</option><option value="157">New Zealand</option><option value="158">Nicaragua</option><option value="159">Niger</option><option value="160">Nigeria</option><option value="161">Niue</option><option value="162">Norfolk Island</option><option value="114">North Korea (Democratic People's Republic of Korea)</option><option value="130">North Macedonia</option><option value="163">Northern Cyprus (Turkish Republic of Northern Cyprus)</option><option value="164">Northern Mariana Islands</option><option value="165">Norway</option><option value="166">Oman</option><option value="167">Pakistan</option><option value="168">Palau</option><option value="73">Palestine</option><option value="169">Panama</option><option value="170">Papua New Guinea</option><option value="171">Paraguay</option><option value="172">Peru</option><option value="173">Philippines</option><option value="175">Poland</option><option value="176">Portugal</option><option value="177">Puerto Rico</option><option value="178">Qatar</option><option value="115">Republic of Korea</option><option value="179">Reunion</option><option value="180">Romania</option><option value="181">Russian Federation</option><option value="183">Rwanda</option><option value="205">Saint Helena, Ascension and Tristan da Cunha</option><option value="184">Saint Kitts and Nevis</option><option value="185">Saint Lucia</option><option value="206">Saint Pierre and Miquelon</option><option value="186">Saint Vincent and the Grenadines</option><option value="187">Samoa</option><option value="188">San Marino</option><option value="189">Sao Tome and Principe</option><option value="190">Saudi Arabia</option><option value="191">Scotland</option><option value="192">Senegal</option><option value="251">Serbia</option><option value="194">Seychelles</option><option value="195">Sierra Leone</option><option value="196">Singapore</option><option value="197">Slovakia</option><option value="198">Slovenia</option><option value="199">Solomon Islands</option><option value="200">Somalia</option><option value="201">South Africa</option><option value="279">South Sudan</option><option value="203">Spain</option><option value="204">Sri Lanka</option><option value="207">Sudan</option><option value="208">Suriname</option><option value="209">Svalbard and Jan Mayen</option><option value="211">Sweden</option><option value="212">Switzerland</option><option value="213">Syrian Arab Republic</option><option value="214">Taiwan</option><option value="215">Tajikistan</option><option value="216">Tanzania</option><option value="217">Thailand</option><option value="61">Timor-Leste</option><option value="218">Togo</option><option value="219">Tokelau</option><option value="220">Tonga</option><option value="221">Trinidad and Tobago</option><option value="222">Tunisia</option><option value="224">Turkmenistan</option><option value="225">Turks and Caicos Islands</option><option value="226">Tuvalu</option><option value="223">Türkiye</option><option value="228">Uganda</option><option value="229">Ukraine</option><option value="230">United Arab Emirates</option><option value="231">United Kingdom</option><option value="227">United States of America</option><option value="233">Uruguay</option><option value="235">Uzbekistan</option><option value="236">Vanuatu</option><option value="238">Venezuela</option><option value="239">Viet Nam</option><option value="240">Virgin Islands (British)</option><option value="241">Virgin Islands (U.S.)</option><option value="242">Wales</option><option value="243">Wallis and Futuna</option><option value="245">Yemen</option><option value="247">Zambia</option><option value="248">Zimbabwe</option>
                            </select>
                        </div>
                        <div class="form-group mt-3"><textarea class="form-control" name="Message" rows="5" placeholder="<?= the_field('f_message', 'option'); ?>"></textarea></div>
                        <div class="mt-3 text-center"><button id="f3submit" type="submit"><?= the_field('f_send', 'option'); ?> <i class="bx bx-chevron-right"></i></button></div>
                    </form>
                    <script>
document.getElementById('form3').addEventListener('submit', function(event) {
    // Prevent form submission
    event.preventDefault();

    var firstName = document.getElementById('f3name').value;
    var lastName = document.getElementById('f3last').value;
    var phone = document.getElementById('f3phone').value;
    var email = document.getElementById('f3mail').value;
    var submitButton = document.getElementById('f3submit');

    // Check if either phone or email is provided with at least 6 characters
    if ((phone.length < 6 && email.length < 6) || (!phone && !email)) {
        alert('Please provide either a valid phone number or email address with at least 6 characters.');
        return;
    }

    // Disable the submit button to prevent double submissions
    submitButton.disabled = true;
    submitButton.innerHTML = 'Submitting...';

    // Submit the form
    this.submit();
});
</script>

                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer("lp"); ?>