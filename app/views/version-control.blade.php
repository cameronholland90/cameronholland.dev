
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
		<title>GIT, Version Control</title>

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
						<li class=""><a href="/html-forms">Lesson 1 - HTML Forms</a></li>
						<li class="active"><a href="/version-control">Lesson 2 - GIT, Version Control</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- end navbar -->

	<div class="container main-container">
		<div class="row">
			<h1 class="text-center">GIT, Version Control</h1>
		</div>
	</div>
	<div class='container second-container'>
		<div class="row">
			<h2 class="text-left">Version Control</h2>
			<p class="text-justify">Version control is used to keep track of changes to a file or group of files. These changes will be saved so you can reference a specific version in the history of the files.</p>
			<p class="text-justify">There are different types of version control systems that are used. Local, Centralized and Distributed.</p>
			<br>

			<h3 class="text-left">Local Verison Control</h3>
			<p class="text-justify">Local version control is when you copy the file you are working on into a separate folder that holds the older versions of a file. This is a very simple type of version control but can easily lead to problems. With this it is possible for you to modify the wrong file or overwrite a file in the separate folder.</p>
			<p class="text-justify">To solve the issue of writing over the wrong file, local version control systems with an attached database to hold the history of changes was developed. This allowed the simplicity of having it on your local device but limited the ability to mess up the older versions of a file.</p>
			<br>

			<h3 class="text-left">Centralized Version Control</h3>
			<p class="text-justify">Centralized version control systems were developed because the need to collaborate with other developers on a project. This system uses a server that holds all of the versions of the modified files. This helped everyone working on the project to have an idea of what they all were working on, but it also had issues of its own.</p>
			<p class="text-justify">Centralized version control systems revolved around a master version that is held only in one place. If the server that held the files went down, it would prevent anyone from working with each other or updating the master version with the changes they made. Also having the master files in one location allowed it to be too easy for it to be lost or corrupted.</p>
			<br>

			<h3 class="text-left">Distributed Version Control</h3>
			<p class="text-justify">Distributed version control combines the best features from local and centralized version control systems. This system not only uses a server to keep the version database, it makes a mirror image of the version database on each contributors computer. This makes it so if the master server crashes or is corrupted, it can be fixed using one of version databases on the contributors computers.</p>
			<p class="text-justify">Many of these systems also make it simple to have multiple groups working on the same project at the same time and allow them to combine all of the groups changes when they are complete.</p>
			<br>

			<h2 class="text-left">GIT</h2>
			<p class="text-justify">GIT is an example of a distributed version control system. It allows each developer working on a project to have a version of the entire history of the file changes. It also uses branches to allow different flows of work happen on the same project simultaneously and makes the combining of this work simple. The GIT service we will be using is GitHub.</p>
			<br>

			<h3 class="text-left">Installing GIT</h3>
			<p class="text-justify">To make your project into a GIT project, you will first need to install GIT on your computer. Visit <a href="http://git-scm.com/download/mac">http://git-scm.com/download/mac</a> to install GIT.</p>
			<p class="text-justify">Once you have GIT installed on your computer, use the commands shown below in your terminal to sign into your GitHub account. If you have not created your account yet, visit <a href="https://github.com">https://github.com</a> and sign up.</p>
			<div class="well">
				<p>git config --global user.name "YOUR NAME"</p>
				<p>git config --global user.email "YOUR EMAIL ADDRESS"</p>
			</div>
			<p class="text-justify">Remember to replace YOUR NAME with your name and YOUR EMAIL ADDRESS with your email address for your GitHub account.</p>
			<p class="text-justify">Once you have finished that, you will need to connect your computer to your GitHub account with you SSH key. Visit, <a href="https://help.github.com/articles/generating-ssh-keys/">https://help.github.com/articles/generating-ssh-keys/</a> and follow the instructions shown.</p>
			<br>

			<h3 class="text-left">Create Repository on GitHub</h3>
			<p class="text-justify">Before you can track your projects changes, you will need to create a repository on GitHub.com. Follow the instructions on <a href="https://help.github.com/articles/create-a-repo/">https://help.github.com/articles/create-a-repo/</a> to create a repository on GitHub.</p>

			<h3 class="text-left">Setting Up Your Local GIT Repository</h3>
			<p class="text-justify">We are going to make you exisiting work's directory into a GIT repository so you can keep track of the changes you make to your work. First thing you will need to do is open your terminal and make sure you are inside of the correct directory.</p>
			<p class="text-justify">Once you are in the correct directory, you will need to run the command below to turn it into a GIT repository.</p>
			<div class="well">
				<p>git init</p>
			</div>
			<br>

			<h3 class="text-left">Connecting To GitHub</h3>
			<p class="text-justify">Now that you have setup your project to be a Git repository, we need to connect it to GitHub. To do that you will need to enter the command below while in the root directory of the GIT repository.</p>
			<div class="well">
				<p>git remote add origin GIT_REPO_URL</p>
			</div>
			<p class="text-justify">You will need to replace GIT_REPO_URL with the URL for the repository you created on GitHub.com</p>
			<br>

			<h3 class="text-left">Staging, Commiting and Pushing Your Repository</h3>
			<p class="text-justify">Next what you will need to do is "stage" the files in the directory to be pushed to GitHub so it can start tracking any changes. The command below is what you will need to run to "stage" files.</p>
			<div class="well">
				<p>// this will "stage" one file</p>
				<p>git add FILE_NAME</p>
				<p>// this will "stage" and entire directory</p>
				<p>git add DIRECTORY_NAME</p>
				<p>// this will "stage" all files in the current directory you are in</p>
				<p>git add -p</p>
			</div>
			<p class="text-justify">Once you have "staged" all of the files, you are ready to do a "commit." A commit allows you to place a message along with the changes you staged. The command below is what you will need to commit the changes and include your message</p>
			<div class="well">
				<p>git commit -m "MESSAGE"</p>
			</div>
			<p class="text-justify">Now that you have all of your files commited, you are ready to push them to the repository on GitHub.com. To do this, you will need to use the command below.</p>
			<div class="well">
				<p>git push REMOTENAME BRANCHNAME</p>
			</div>
			<p>Since this will be your first push, you will replace REMOTENAME with origin and BRANCHNAME with master. Now you will be able to keep track of all the changes you make to this directory.</p>
		</div>
	</div>

	<div class="container second-container">
		<div class="row">
			<h2 class="text-left">Exercises</h2>
			<ol>
				<li>Using the commands listed above, setup your first GIT repository.</li>
				<li>After you have made your first push to GitHub, make some changes to a file within the GIT repository and push it to GitHub.</li>
				<li>Now, go to GitHub.com and look at the commit history to see how GitHub tracks your changes.</li>
			</ol>
		</div>
	</div>
	    
	</body>
</html>