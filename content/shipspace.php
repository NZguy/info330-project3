<?php
require_once PHP_ROOT . '/i330p2/Setup.php';
use common\session\Session;
use i330p2\SessionKVs;
use i330p2\template\StaticPage;

if (!Session::exists(SessionKVs::CONNECT_KEY)) {
    header("Location: /shipspace/connect-optin");
    exit;
}

$storyContents = array(
    array("http://carnival-news.com/wp-content/uploads/2011/05/Glorysea2.jpg", "3rd Place", "Achieved 3rd place in the competition for points."),
    array("http://static.carnivalcloud.com/~/media/Images/explore/onboard/outdoor/skyride-2.ashx", "SkyRide", "SkyRide is a bit like riding a bike you’ll never forget it."),
    array("http://static.carnivalcloud.com/~/media/Images/explore/onboard/outdoor/twister-waterslide-3.ashx", "Slid", "Took a ride down the legendary twister water slide."),
    array("http://static.carnivalcloud.com/~/media/Images/explore/onboard/cruise-entertainment/carnival-seaside-theater-1.ashx", "Seaside Theatre", "Watched Star Wars Episode VIII at the carnival seaside theatre"),
    array("http://static.carnivalcloud.com/~/media/Images/explore/onboard/spa-fitness/jogging-track-1.ashx", "Went Jogging", "Went for an early morning open air jog around the deck.")
);

// Make the events div first and store the HTML in a variable
$storyHtml = "";
for ($i = 0; $i <= 4; $i++) {
    $storyHtml .= '
<div class="shipspace-story">
    <div class="shipspace-story-image"><img src="'.$storyContents[$i][0].'" alt="story image" /></div>
    <div class="shipspace-story-text">
        <h2>'.$storyContents[$i][1].'</h2>
        <p>'.$storyContents[$i][2].'</p>
    </div>
    <label class="shipspace-story-share" for="shipspace-story-share-button">
        <i class="fa fa-share-alt fa-2x" aria-hidden="true"></i>
    </label>
</div>';

}

$body = <<<HTML

<div id="shipspace-content">
    <div id="shipspace-profile-pic-container">
        <img src="https://s3-us-west-1.amazonaws.com/fm-msc/i330/user-avatar.gif" alt="Profile Picture" />
    </div>
    
    <h2>Duncan Andrew</h2>
    
    <a href="/shipspace/connect"><div id="shipspace-connect-button">Connect Accounts</div></a>
    
    $storyHtml
    
    <input type="checkbox" id="shipspace-story-share-button" /> 
    
    <label id="shipspace-story-share-close" for="shipspace-story-share-button"></label>
    
    <div id="shipspace-share-container">
        <h2>Share to</h2>
        <div id="shipspace-share-container-soc">
            <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
            <i class="fa fa-tumblr-square fa-2x" aria-hidden="true"></i>
            <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
            <i class="fa fa-snapchat-square fa-2x" aria-hidden="true"></i>
            <i class="fa fa-pinterest-square fa-2x" aria-hidden="true"></i>
            <i class="fa fa-vimeo-square fa-2x" aria-hidden="true"></i>
            <i class="fa fa-youtube-square fa-2x" aria-hidden="true"></i>
            <i class="fa fa-pied-piper-pp fa-2x" aria-hidden="true"></i>
            <i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
            <i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i>
            <i class="fa fa-git-square fa-2x" aria-hidden="true"></i>
            <i class="fa fa-bitbucket-square fa-2x" aria-hidden="true"></i>
        </div>
    </div>
    
</div>

HTML;

StaticPage::createContent()
    ->with(StaticPage::FIELD_TITLE, "ShipSpace")
    ->with(StaticPage::FIELD_BODY, $body)
    ->render();