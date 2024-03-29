<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = $_POST['Email'];
    $email_from ="form@projectDoBot.com";
    $email_tobot = "jarnepeeters6@gmail.com";
    $email_subject = "Aanvraag";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required



    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'Het opgegeven Email adress lijkt niet te bestaan.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'De naam die je hebt opgegeven is niet in orde.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'Het opgegeven bericht is niet in orde.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Je bezorgde ons volgende gegevens.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Naam: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Vraag: " . clean_string($message) . "\n\n";
    $email_message .= "Bedankt voor de vraag, we zullen contact opnemen met U om de vraag te beantwoorden. " . "\n";

    // create email headers
    $headers = 'From: ' . $email_from . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/uikit.min.js"></script>
        <script src="css/uikit.min.css"></script>
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/leaflet.css"/>
        <script src="js/leaflet.js"></script>
        <script src="js/GridLayer.js"></script>
        <script src="js/map.js"></script>
        <meta name="robots" content="noindex, nofollow">
        <link rel="icon" href="/images/logo/fav.png" sizes="any">
        <link rel="apple-touch-icon" href="/images/logo/apple_touch_icon.png">
        <title>Bedankje</title>
</head>
    <body>
        <div class="uk-navbar-container uk-visible@m">

            <div class="uk-container">
                <nav class="uk-navbar" uk-navbar="{&quot;align&quot;:&quot;left&quot;,&quot;boundary&quot;:&quot;!.uk-navbar-container&quot;}">

                                        <div class="uk-navbar-left">

                        
										<a href="index.html" class="uk-navbar-item uk-logo">
										<img src="/images/logo/logo.jpg" srcset="/images/logo/logo.jpg 216w" sizes="(min-width: 216px) 216px" data-width="216" data-height="56" class="uk-responsive-height" alt=""></a>                       
										</div>                   
                                        <div class="uk-navbar-right">

                                                    
										<ul class="uk-navbar-nav">

										<li class="uk-active uk-button uk-button-text"><a href="/">Home</a></li>
										<li><a class="uk-button uk-button-link" href="/Pagina2.html">Contact</a></li></ul>

										

										<div class="custom"><a href="tel:+3161234567" class="uk-button uk-button-primary uk-button-medium">06 1234567</a></div>

										</div>
					                    
                    
                </nav>
            </div>

        </div>
        <div class="tm-header-mobile uk-hidden@m" uk-header="">


    
            <div class="uk-navbar-container">

                <div class="uk-container uk-container-expand">
                    <nav class="uk-navbar" uk-navbar="{&quot;container&quot;:&quot;.tm-header-mobile&quot;}">

                        <div class="uk-navbar-left">

                        
                                <a uk-toggle="" aria-label="Open Menu" href="#tm-dialog-mobile" class="uk-navbar-toggle" aria-expanded="false">

        
                                    <div uk-navbar-toggle-icon="" class="uk-icon uk-navbar-toggle-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><style>.uk-navbar-toggle-animate svg&gt;[class*=line-]{transition:.2s ease-in-out;transition-property:transform,opacity,;transform-origin:center;opacity:1}.uk-navbar-toggle svg&gt;.line-3{opacity:0}.uk-navbar-toggle-animate[aria-expanded=true] svg&gt;.line-3{opacity:1}.uk-navbar-toggle-animate[aria-expanded=true] svg&gt;.line-2{transform:rotate(45deg)}.uk-navbar-toggle-animate[aria-expanded=true] svg&gt;.line-3{transform:rotate(-45deg)}.uk-navbar-toggle-animate[aria-expanded=true] svg&gt;.line-1,.uk-navbar-toggle-animate[aria-expanded=true] svg&gt;.line-4{opacity:0}.uk-navbar-toggle-animate[aria-expanded=true] svg&gt;.line-1{transform:translateY(6px) scaleX(0)}.uk-navbar-toggle-animate[aria-expanded=true] svg&gt;.line-4{transform:translateY(-6px) scaleX(0)}</style><rect class="line-1" y="3" width="20" height="2"></rect><rect class="line-2" y="9" width="20" height="2"></rect><rect class="line-3" y="9" width="20" height="2"></rect><rect class="line-4" y="15" width="20" height="2"></rect></svg></div>

        
                                </a>
                        
                        </div>
                    
                                <div class="uk-navbar-center">

                                        <a href="/" aria-label="Back to home" class="uk-logo uk-navbar-item">
                                            <picture>
                                                <source type="image/webp" srcset="/images/logo/logo.jpg 216w" sizes="(min-width: 216px) 216px">
                                                    <img alt="" loading="eager" src="/images/logo/logo.jpg" width="216" height="56">
                                            </picture>
                                        </a>
                        
                        
                                </div>
                    
                    
                    </nav>
                 </div>

            </div>

    




            <div id="tm-dialog-mobile" uk-offcanvas="container: true; overlay: true" mode="slide" class="uk-offcanvas">
                <div class="uk-offcanvas-bar uk-flex uk-flex-column">

                    <button class="uk-offcanvas-close uk-icon uk-close" type="button" uk-close="" uk-toggle="cls: uk-close-large; mode: media; media: @s"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button>
            
                        <div class="uk-margin-auto-bottom">
                
                            <div class="uk-grid uk-child-width-1-1 uk-grid-stack" uk-grid="">    
                                <div>
                                    <div class="uk-panel" id="module-menu-dialog-mobile">
                                    
                                        <ul class="uk-nav uk-nav-default">
    
	                                        <li class="item-101 uk-active"><a href="/index.html"> Home</a></li>
	                                        <li class="item-113"><a href="/Pagina2.html"> Contact</a></li>
                                        </ul>

                                    </div>
                                </div>    
                                <div>
                                    <div class="uk-panel" id="module-92">

    
    
                                        <div class="uk-margin-remove-last-child custom"><p class="uk-text-center"><a href="tel:+3161234567" class="uk-button uk-button-primary uk-button-large">06 1234567</a></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
            
            
                </div>
            </div>
    
    
    

        </div>
      



        <div class="uk-flex-middle uk-section-default uk-section uk-section-large">
                
            <div class="uk-container uk-container-large">                

                <div class="tm-grid-expand uk-child-width-1-1 uk-grid-margin uk-grid uk-grid-stack" uk-grid="">

                    <div class="uk-width-1-1@m uk-first-column">

                        <h2 class="uk-h3 uk width-large uk-margin-auto uk-text-center"> Bedankt voor de aanvraag</h2> <hr class="uk-divider-icon">
                        <h3 class="uk-h3 uk width-medium uk-margin-auto uk-text-center"> U zal snel antwoord terug ontvangen </h3>


                    </div>
                </div>
            </div>
        </div>

        </div>

                 
                
            
        
        </div>
        </div>
        </div>

        <div class="rsform-block rsform-block-footer">

            <div class="formControlLabel"></div>

                <div class="formControls">

                    <div class="formBody"><a href="Pagina3.html" target="_blank"></a><span class="formValidation"></span></div>

                    <p class="formDescription"></p>
                </div>
        </div>


        <input type="hidden" name="form[formId]" value="1"><input type="hidden" name="2d0e3e40e94f3a5bd2b7efca38fa2828" value="1"></form></div>




    


            <div class="uk-section-primary uk-section-large" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-fade; repeat: true">
    
        
        
        
            
                <div class="uk-container uk-container-large">                

                    <div class="tm-grid-expand uk-grid-margin uk-grid uk-grid-stack" uk-grid="">
                        <div class="uk-width-1-4@m uk-first-column">
                            <div class="uk-margin" uk-scrollspy-class="" style="opacity: 0;">

                                <picture>
                                    <img src="/images/logo/logo-wit.jpg" width="216" height="56" class="el-image" alt="" loading="lazy">
                                </picture>    

                            </div>
                        </div>

                        <div class="uk-width-1-2@m uk-grid-margin uk-first-column">

                        </div>

                        <div class="uk-width-1-4@m uk-grid-margin uk-first-column">

                            <div class="uk-margin" uk-scrollspy-class="" style="opacity: 0;">    <div class="uk-child-width-auto uk-grid-medium uk-flex-inline uk-grid" uk-grid="">

                                <div class="uk-first-column">

                                    <a class="el-link" href="https://twitter.com" rel="noreferrer"><span uk-icon="icon: twitter; width: 30; height: 30;" class="uk-icon"><svg width="30" height="30" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M19,4.74 C18.339,5.029 17.626,5.229 16.881,5.32 C17.644,4.86 18.227,4.139 18.503,3.28 C17.79,3.7 17.001,4.009 16.159,4.17 C15.485,3.45 14.526,3 13.464,3 C11.423,3 9.771,4.66 9.771,6.7 C9.771,6.99 9.804,7.269 9.868,7.539 C6.795,7.38 4.076,5.919 2.254,3.679 C1.936,4.219 1.754,4.86 1.754,5.539 C1.754,6.82 2.405,7.95 3.397,8.61 C2.79,8.589 2.22,8.429 1.723,8.149 L1.723,8.189 C1.723,9.978 2.997,11.478 4.686,11.82 C4.376,11.899 4.049,11.939 3.713,11.939 C3.475,11.939 3.245,11.919 3.018,11.88 C3.49,13.349 4.852,14.419 6.469,14.449 C5.205,15.429 3.612,16.019 1.882,16.019 C1.583,16.019 1.29,16.009 1,15.969 C2.635,17.019 4.576,17.629 6.662,17.629 C13.454,17.629 17.17,12 17.17,7.129 C17.17,6.969 17.166,6.809 17.157,6.649 C17.879,6.129 18.504,5.478 19,4.74"></path></svg></span></a></div>

                                        <div>

                                            <a class="el-link" href="https://facebook.com" rel="noreferrer"><span uk-icon="icon: facebook; width: 30; height: 30;" class="uk-icon"><svg width="30" height="30" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11,10h2.6l0.4-3H11V5.3c0-0.9,0.2-1.5,1.5-1.5H14V1.1c-0.3,0-1-0.1-2.1-0.1C9.6,1,8,2.4,8,5v2H5.5v3H8v8h3V10z"></path></svg></span></a></div>

                                                <div>

                                                    <a class="el-link" href="https://www.youtube.com" rel="noreferrer"><span uk-icon="icon: youtube; width: 30; height: 30;" class="uk-icon"><svg width="30" height="30" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M15,4.1c1,0.1,2.3,0,3,0.8c0.8,0.8,0.9,2.1,0.9,3.1C19,9.2,19,10.9,19,12c-0.1,1.1,0,2.4-0.5,3.4c-0.5,1.1-1.4,1.5-2.5,1.6 c-1.2,0.1-8.6,0.1-11,0c-1.1-0.1-2.4-0.1-3.2-1c-0.7-0.8-0.7-2-0.8-3C1,11.8,1,10.1,1,8.9c0-1.1,0-2.4,0.5-3.4C2,4.5,3,4.3,4.1,4.2 C5.3,4.1,12.6,4,15,4.1z M8,7.5v6l5.5-3L8,7.5z"></path></svg></span></a></div>

                                                    </div></div>
                        </div>
                    </div>
                </div>
            </div>

    </body>
</html>

<?php
}

?>