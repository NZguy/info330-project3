<?php
namespace i330p2\template;
require_once PHP_ROOT . '/i330p2/Setup.php';
use common\template\component\TemplateField;
use common\template\Content;


/**
 * Class EmptyStaticPage
 */
class StaticPage extends Content{
	const FIELD_BODY = "body";
	const FIELD_TITLE = "title";

	public static function getTemplateRenderContents(array $fields): string {
		return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
	<title>The Title {$fields[self::FIELD_TITLE]}</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="/css/d_global.css" />
	<link rel="stylesheet" type="text/css" href="/css/global.css" />
</head>
<body>

<input type="checkbox" class="k-controller" id="global-sidebar-controller" />
<div id="global-sidebar">
	<div id="global-sidebar-header">
		<div id="global-sidebar-header-avatar"><img src="https://s3-us-west-1.amazonaws.com/fm-msc/i330/user-avatar.gif" alt="Profile Picture" /></div>
		<div>
			<div id="global-sidebar-header-username">adunkman330@ccruises.com</div>
			<div id="global-sidebar-header-name">Duncan Andrew</div>
		</div>
	</div>
	<ul id="global-sidebar-links">
		<li><a href="/"><i class="fa fa-home"></i>Home</a></li>
		<li><a href="/recommendations"><i class="fa fa-users"></i>Recommendations</a></li>
		<li><a href="/bookmarks"><i class="fa fa-ship"></i>Bookmarks</a></li>
		<li><a href="/questionnaire"><i class="fa fa-exclamation-triangle"></i>Questionnaire</a></li>
		<li><a href="/personality-quiz"><i class="fa fa-cog"></i>Personality Quiz</a></li>
		<li><a href="/imports"><i class="fa fa-cog"></i>Imports</a></li>
		<li><a href="/settings"><i class="fa fa-cog"></i>Settings</a></li>
	</ul>
	<div id="global-sidebar-author">
		Made with love,<br />By Duncan Andrew and Kodlee Yin
	</div>
</div>
<label id="global-sidebar-closer" for="global-sidebar-controller"></label>

<div id="global-nav">
	<label for="global-sidebar-controller"><i class="fa fa-bars"></i></label>
	<div>{$fields[self::FIELD_TITLE]}</div>
</div>
<div class="global-nav-push"></div>

{$fields[self::FIELD_BODY]}


<div class="global-nav-push"></div>
</body>
</html>
HTML;
	}

	public static function getTemplateFields_Internal(): array {
		return [
				TemplateField::newBuilder()->called(self::FIELD_BODY)->asRequired()->build(),
				TemplateField::newBuilder()->called(self::FIELD_TITLE)->asRequired()->build()
		];
	}
}
