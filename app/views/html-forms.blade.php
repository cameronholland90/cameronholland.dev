
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src='/js/jquery.tagsinput.min.js'></script>
	<script src="/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="/css/lesson-stylesheet.css">
		<title>HTML Forms, GET and POST Data</title>

</head>
<body>
	<!-- navbar -->
	<div id="navbar" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="row">
				<div class="navbar-header">
					<a href="/resume" class="navbar-brand">CameronHolland.me</a>
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse navHeaderCollapse nav-pills">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="/html-forms">Lesson 1 - HTML Forms</a></li>
						<li class=""><a href="/version-control">Lesson 2 - GIT, Version Control</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- end navbar -->

	<div class="container main-container">
		<div class="row">
			<h1 class="text-center">HTML Forms, GET and POST Data</h1>
		</div>
	</div>
	<div class='container second-container'>
		<div class="row">
			<h2 class="text-left">HTML Forms</h2>
			<br>
			<p class="text-justify">HTML forms are made up of different types of HTML elements that allow you to gather user inputed information on your webpage. They can be used for website logins, sign ups, order forms and more.</p>
			<p class="text-justify">Here is a basic example of the open and close tags for an HTML form:</p>
			<br>
			<div class="well">
				<p>&lt;form></p>
				<p>...</p>
				<p>&lt;/form></p>
			</div>
			<p class="text-justify">The elements that are used inside of a form to get user input are text, textarea, checkboxes, radio buttons, selects and buttons</p>
			<ul>
				<li>Text inputs allow a user to type in the information</li>
				<li>Textarea inputs are similar to text inputs but give a bigger area for the user to type the information</li>
				<li>Checkboxes allow you to send a specified <span class="value-attribute">value</span> if the input is checked</li>
				<ul>
					<li>Often times this is used for a boolean value (ex: agree to terms and service agreements)</li>
				</ul>
				<li>Radio buttons allows a user to select one of a group of values specified by you</li>
				<li>Select inputs are similar to radio buttons in that they give a list of options with a specified <span class="value-attribute">value</span> they can choose one of but it is a dropdown.</li>
				<ul>
					<li>These can also be used to select multiple of the given options if you specify the <span class="multiple-attribute">multiple</span> attribute</li>
				</ul>
				<li>Buttons are used to submit the form once all the information has been entered</li>
			</ul>
			<p>Each input element can have a label tied to it by putting the value of the input's "<span class="id-attribute">id</span>" attribute in the label's "<span class="for-attribute">for</span>" attribute.</p>
			<p class="text-justify">Here is an example of how that code looks and what the elements look like themselves:</p>
			<br>
			<h5 class="text-left">Text</h5>
			<div class="well">
				<p>&lt;label <span class="for-attribute">for</span>="text_input_name">Text Input Label&lt;/label></p>
				<p>&lt;input type="text" placeholder="Text" name="text_input_name" <span class="id-attribute">id</span>="text_input_id" /></p>
			</div>
			<div>
				<label for="text_input_name">Text Input Label</label>
				<input type="text" placeholder="Text" name="text_input_name" id="text_input_name" />
			</div>
			<br>
			<h5 class="text-left">Textarea</h5>
			<div class="well">
				<p>&lt;label <span class="for-attribute">for</span>="textarea_input_name">Textarea Input Label&lt;/label></p>
				<p>&lt;textarea placeholder="Textarea" name="textarea_input_name" <span class="id-attribute">id</span>="textarea_input_id">&lt;/textarea></p>
			</div>
			<div>
				<span>
					<label for="textarea_input_name">Textarea Input Label</label>
					<textarea placeholder="Textarea" name="textarea_input_name" id="textarea_input_name" style="vertical-align: top;"></textarea>
				</span>
			</div>
			<br>
			<h5 class="text-left">Checkbox</h5>
			<div class="well">
				<p>&lt;label <span class="for-attribute">for</span>="checkbox_input_name">Checkbox Input Label&lt;/label></p>
				<p>&lt;input type="checkbox" <span class="value-attribute">value</span>="1" name="checkbox_input_name" <span class="id-attribute">id</span>="checkbox_input_id" /></p>
			</div>
			<div>
				<label for="checkbox_input_name">Checkbox Input Label</label>
				<input type="checkbox" value="1" name="checkbox_input_name" id="checkbox_input_name" />
			</div>
			<br>
			<h5 class="text-left">Radio Buttons</h5>
			<div class="well">
				<p>&lt;label <span class="for-attribute">for</span>="radio_input_name">Radio Input Label&lt;/label></p>
				<p>&lt;input type="radio" name="radio_input_name" <span class="id-attribute">id</span>="radio_input_id" <span class="value-attribute">value</span>="radio_input_value"/></p>
			</div>
			<div>
				<label for="radio_example1">Radio Button 1 Label</label>
				<input type="radio" name="radio_example" id="radio_example1" value="1"/><br>
				<label for="radio_example2">Radio Button 2 Label</label>
				<input type="radio" name="radio_example" id="radio_example2" value="2"/><br>
				<label for="radio_example3">Radio Button 3 Label</label>
				<input type="radio" name="radio_example" id="radio_example3" value="3"/>
			</div>
			<br>
			<h5 class="text-left">Selects</h5>
			<div class="well">
				<p>&lt;label <span class="for-attribute">for</span>="single_select">Single Choice Select&lt;/label></p>
				<span>&lt;select name="single_select" <span class="id-attribute">id</span>="single_select"></span>
					<span class="code-indent">&lt;option <span class="value-attribute">value</span>="1">Option 1&lt;/option></span>
					<span class="code-indent">&lt;option <span class="value-attribute">value</span>="2">Option 2&lt;/option></span>
					<span class="code-indent">&lt;option <span class="value-attribute">value</span>="3">Option 3&lt;/option></span>
				<span>&lt;/select></span>
			</div>
			<div>
				<label for="single_select">Single Choice Select</label>
				<select name="single_select" id="single_select">
					<option value="1">Option 1</option>
					<option value="2">Option 2</option>
					<option value="3">Option 3</option>
				</select>
			</div>
			<br>
			<div class="well">
				<p>&lt;label <span class="for-attribute">for</span>="multiple_select">Single Choice Select&lt;/label></p>
				<span>&lt;select name="multiple_select[]" <span class="id-attribute">id</span>="single_select" <span class="multiple-attribute">multiple</span>></span>
					<span class="code-indent">&lt;option <span class="value-attribute">value</span>="1">Option 1&lt;/option></span>
					<span class="code-indent">&lt;option <span class="value-attribute">value</span>="2">Option 2&lt;/option></span>
					<span class="code-indent">&lt;option <span class="value-attribute">value</span>="3">Option 3&lt;/option></span>
				<span>&lt;/select></span>
			</div>
			<div>
				<span>
					<label for="multiple_select">Multiple Choice Select</label>
					<select multiple name="multiple_select" id="multiple_select" style="vertical-align: top;">
						<option value="1">Option 1</option>
						<option value="2">Option 2</option>
						<option value="3">Option 3</option>
					</select>
				</span>
			</div>
			<br>
			
			<p class="text-justify">HTML form tags have a couple attributes that you can use to change how and where your form will send the information. These attributes are action and method.</p>
			<br>

			<h3 class="text-left">Action Attribute</h3>
			<p class="text-justify">The action attribute is used to specify where the information submitted in the form will be sent to. Typically, a server side file is named in the action attribute that will perform an action with the data. If this attribute is left blank it will be submitted to the current page.</p>
			<br>

			<h3 class="text-left">Method Attribute</h3>
			<p class="text-justify">The method attribute is used to specify what type of submission the form will use. There are four options, GET, POST, PUT and DELETE. We will be talking about handling GET and POST today and will talk about PUT and DELETE later but they are good to know about. If the method attribute is left blank it will default to POST.</p>
			<br>

			<h4 class="text-left">GET method</h4>
			<p class="text-justify">The GET method is used to "get" information. In the specific case of a form, you would be using the information submitted in the form to filter what you are getting for the user. This information will be displayed in the webpage address like this:</p>
			<div class="well">
				<p>http://yourdomain.com/yourpage<span class="question-mark">?</span>get_var1<span class="equal-sign">=</span>value1<span class="ampersand">&amp;</span>get_var2<span class="equal-sign">=</span>value2</p>
			</div>
			<ul>
				<li>The '<span class="question-mark">?</span>' in the page address marks the beginning of the GET variables</li>
				<li>The '<span class="ampersand">&amp;</span>' seperates each variable from the previous</li>
				<li>The '<span class="equal-sign">=</span>' seperates the variable name(left of '<span class="equal-sign">=</span>') and the variable value(right of '<span class="equal-sign">=</span>'). So in the example page address, get_var1 is equal to 'value1' and get_var2 is equal to 'value2'</li>
			</ul>
			<p class="text-justify">Since a GET method request uses the URL to submit the data, it can be saved in the browser's history and can be bookmarked for later use.</p>
			<br>

			<h4 class="text-left">POST method</h4>
			<p class="text-justify">The POST method is used to submit information to be saved or updated. You also would want to use this when the information being submitted is something you want to keep secure like a password. This is because the information you submitted in the form is not displayed in the page address.</p>

			<h2 class="text-left">Handling GET and POST Data</h2>
			<br>

			<p class="text-justify">When you submit GET and POST data, php has array variables that will automatically be populated with the data that was submitted. The key for the array is the name of the input the data was submitted from.</p>
			<ul>
				<li>The POST variable for php is $_POST['input_name']</li>
				<li>The GET variable for php is $_GET['input_name']</li>
			</ul>
			<p class="text-justify">You can use these variables in your server side php to save the data in a database, login a user, filter information, etc.</p>
		</div>
	</div>
	<div class="container second-container">
		<div class="row">
			<h2 class="text-left">Exercises</h2>
			<ol>
				<li>Create two new files, one named form.html and the other named display.php.</li>
				<li>In form.html, make a basic html form with a text input and a label that you can submit your name in.</li>
				<li>Set the method attribute of the form to POST and set the action attribute to display.php.</li>
				<li>Now open display.php and use the php POST variables to echo the information sent from the form in form.html.</li>
				<li>Add other inputs to the form and use those in the display.php to change what is being displayed.</li>
			</ol>
		</div>
	</div>
	    
	</body>
</html>