<?php 
session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");
include("classes/profile.php");


$login = new Login();
$userdata = $login->check_user($_SESSION['juan4hire_userid']);

$user = new User();
$id = $_SESSION['juan4hire_userid'];
$users = $user->get_users($id);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service || Juan4Hire</title>
<style>
:root {
    font-size: 12px;
}
*,
*::before,
*::after {
    box-sizing: border-box;
}
body{
    background-color:#CAFA84 ;
}
.terms 
{   
    display: flex;
    margin-left: 20%;
    margin-right: 20%;
    flex-direction: column;
}
.terms h1 
{   margin: auto;
    text-align: center;
    margin-top: 100px;
    margin-bottom: -50px;
}

.terms p{
    font-size: 15px;
    text-align: justify;
}
</style>

</head>
<body>
<?php include("logoutheader.php"); ?>  
<div class="terms">
<h1>TERMS AND CONDITIONS<h1>
    <h2>1. Introduction</h2>
<p>Welcome to Juan4Hire!
<br><br>
These Terms of Service govern your use of our website located at  hiringjuan.000webhostapp.com operated by Juan4Hire.
<br><br>
Our Privacy Policy also governs your use of our Service and explains how we collect, safeguard 
and disclose information that results from your use of our web pages.
<br><br>
Your agreement with us includes these Terms and our Privacy Policy (“Agreements”). You acknowledge that you have read and understood Agreements, and agree to be bound of them.
<br><br>
If you do not agree with (or cannot comply with) Agreements, then you may not use the Service, but please let us know by emailing at hiringjuan@gmail.com so we can try to find a solution. These Terms apply to all visitors, users and others who wish to access or use Service.
</p>
<br>
<h2>2. Communications</h2>
<p>
By using our Service, you agree to subscribe to newsletters, marketing or promotional materials and other information we may send. However, you may opt out of receiving any, or all, of these communications from us by following the unsubscribe link or by emailing at hiringjuan@gmail.com.
</p>
<h2>3. Content</h2>
<p>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (“Content”). You are responsible for Content that you post on or through Service, including its legality, reliability, and appropriateness.
<br><br>
By posting Content on or through Service, You represent and warrant that: (i) Content is yours (you own it) and/or you have the right to use it and the right to grant us the rights and license as provided in these Terms, and (ii) that the posting of your Content on or through Service does not violate the privacy rights, publicity rights, copyrights, contract rights or any other rights of any person or entity. We reserve the right to terminate the account of anyone found to be infringing on a copyright.
<br><br>
You retain any and all of your rights to any Content you submit, post or display on or through Service and you are responsible for protecting those rights. We take no responsibility and assume no liability for Content you or any third-party posts on or through Service. However, by posting Content using Service you grant us the right and license to use, modify, publicly perform, publicly display, reproduce, and distribute such Content on and through Service. You agree that this license includes the right for us to make your Content available to other users of Service, who may also use your Content subject to these Terms.
<br><br>
Juan4Hire has the right but not the obligation to monitor and edit all Content provided by users.
<br><br>
In addition, Content found on or through this Service are the property of Juan4Hire or used with permission. You may not distribute, modify, transmit, reuse, download, repost, copy, or use said Content, whether in whole or in part, for commercial purposes or for personal gain, without express advance written permission from us.
</p>
<h2>4. Prohibited Uses</h2>
<p>
You may use Service only for lawful purposes and in accordance with Terms. You agree not to use Service:
<br><br>0.1. In any way that violates any applicable national or international law or regulation.
<br><br>0.2. For the purpose of exploiting, harming, or attempting to exploit or harm minors in any way by exposing them to inappropriate content or otherwise.
<br><br>0.3. To transmit, or procure the sending of, any advertising or promotional material, including any “junk mail”, “chain letter,” “spam,” or any other similar solicitation.
<br><br>0.4. To impersonate or attempt to impersonate Company, a Company employee, another user, or any other person or entity.
<br><br>0.5. In any way that infringes upon the rights of others, or in any way is illegal, threatening, fraudulent, or harmful, or in connection with any unlawful, illegal, fraudulent, or harmful purpose or activity.
<br><br>0.6. To engage in any other conduct that restricts or inhibits anyone’s use or enjoyment of Service, or which, as determined by us, may harm or offend Company or users of Service or expose them to liability.
<br><br>Additionally, you agree not to:
<br><br>0.1. Use Service in any manner that could disable, overburden, damage, or impair Service or interfere with any other party’s use of Service, including their ability to engage in real time activities through Service.
<br><br>0.2. Use any robot, spider, or other automatic device, process, or means to access Service for any purpose, including monitoring or copying any of the material on Service.
<br><br>0.3. Use any manual process to monitor or copy any of the material on Service or for any other unauthorized purpose without our prior written consent.
<br><br>0.4. Use any device, software, or routine that interferes with the proper working of Service.
<br><br>0.5. Introduce any viruses, trojan horses, worms, logic bombs, or other material which is malicious or technologically harmful.
<br><br>0.6. Attempt to gain unauthorized access to, interfere with, damage, or disrupt any parts of Service, the server on which Service is stored, or any server, computer, or database connected to Service.
<br><br>0.7. Attack Service via a denial-of-service attack or a distributed denial-of-service attack.
<br><br>0.8. Take any action that may damage or falsify Company rating.
<br><br>0.9. Otherwise attempt to interfere with the proper working of Service.

</p>
<h2>5. Analytics</h2>
<p>We may use third-party Service Providers to monitor and analyze the use of our Service.</p>
<h2>6. Accounts</h2>
<p>
When you create an account with us, you guarantee that you are above the age of 18, and that the information you provide us is accurate, complete, and current at all times. Inaccurate, incomplete, or obsolete information may result in the immediate termination of your account on Service.
<br><br>You are responsible for maintaining the confidentiality of your account and password, including but not limited to the restriction of access to your computer and/or account. You agree to accept responsibility for any and all activities or actions that occur under your account and/or password, whether your password is with our Service or a third-party service. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.
<br><br>You may not use as a username the name of another person or entity or that is not lawfully available for use, a name or trademark that is subject to any rights of another person or entity other than you, without appropriate authorization. You may not use as a username any name that is offensive, vulgar or obscene.
<br><br>We reserve the right to refuse service, terminate accounts, remove or edit content, or cancel orders in our sole discretion.
</p>
<h2>7. Intellectual Property</h2>
<p>Service and its original content (excluding Content provided by users), features and functionality are and will remain the exclusive property of Juan4Hire and its licensors. Service is protected by copyright, trademark, and other laws of and foreign countries. Our trademarks may not be used in connection with any product or service without the prior written consent of Juan4Hire.</p>
<h2>8. Copyright Policy</h2>
<p>We respect the intellectual property rights of others. It is our policy to respond to any claim that Content posted on Service infringes on the copyright or other intellectual property rights (“Infringement”) of any person or entity.
<br><br>If you are a copyright owner, or authorized on behalf of one, and you believe that the copyrighted work has been copied in a way that constitutes copyright infringement, please submit your claim via email to hiringjuan@gmail.com, with the subject line: “Copyright Infringement” and include in your claim a detailed description of the alleged Infringement as detailed below, under “DMCA Notice and Procedure for Copyright Infringement Claims”
<br><br>You may be held accountable for damages (including costs and attorneys’ fees) for misrepresentation or bad-faith claims on the infringement of any Content found on and/or through Service on your copyright.
</p>
<h2>9. Error Reporting and Feedback</h2>
<p>You may provide us directly at hiringjuan@gmail.com with information and feedback concerning errors, suggestions for improvements, ideas, problems, complaints, and other matters related to our Service (“Feedback”). You acknowledge and agree that: (i) you shall not retain, acquire or assert any intellectual property right or other right, title or interest in or to the Feedback; (ii) Company may have development ideas similar to the Feedback; (iii) Feedback does not contain confidential information or proprietary information from you or any third party; and (iv) Company is not under any obligation of confidentiality with respect to the Feedback. In the event the transfer of the ownership to the Feedback is not possible due to applicable mandatory laws, you grant Company and its affiliates an exclusive, transferable, irrevocable, free-of-charge, sub-licensable, unlimited and perpetual right to use (including copy, modify, create derivative works, publish, distribute and commercialize) Feedback in any manner and for any purpose.</p>
<h2>10. Termination</h2>
<p>We may terminate or suspend your account and bar access to Service immediately, without prior notice or liability, under our sole discretion, for any reason whatsoever and without limitation, including but not limited to a breach of Terms.
<br><br>If you wish to terminate your account, you may simply discontinue using Service.
<br><br>All provisions of Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.
</p>
<h2>11. Governing Law</h2>
<p>These Terms shall be governed and construed in accordance with the laws of Philippines, which governing law applies to agreement without regard to its conflict of law provisions.
<br><br>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service and supersede and replace any prior agreements we might have had between us regarding Service.
</p>
<h2>12. Changes To Service</h2>
<p>We reserve the right to withdraw or amend our Service, and any service or material we provide via Service, in our sole discretion without notice. We will not be liable if for any reason all or any part of Service is unavailable at any time or for any period. From time to time, we may restrict access to some parts of Service, or the entire Service, to users, including registered users.</p>
<h2>13. Amendments To Terms</h2>
<p>We may amend Terms at any time by posting the amended terms on this site. It is your responsibility to review these Terms periodically.
<br><br>Your continued use of the Platform following the posting of revised Terms means that you accept and agree to the changes. You are expected to check this page frequently so you are aware of any changes, as they are binding on you.
<br><br>By continuing to access or use our Service after any revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, you are no longer authorized to use Service.
</p>
<h2>14. Acknowledgement</h2>
<p>BY USING SERVICE OR OTHER SERVICES PROVIDED BY US, YOU ACKNOWLEDGE THAT YOU HAVE READ THESE TERMS OF SERVICE AND AGREE TO BE BOUND BY THEM.</p>
<h2>15. Contact Us</h2>
<p>Please send your feedback, comments, requests for technical support by email: <b>hiringjuan@gmail.com.</b></p>
</div>
</body>
</html>