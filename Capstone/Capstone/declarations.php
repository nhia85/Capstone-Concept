<!DOCTYPE html> 
<html>
	<!-- Background patterns from subtlepatterns.com -->
<head>
	<title>Code Plateau</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link href="styles.css" rel="stylesheet" type="text/css" />
	<script src="vendor/jquery-1.7.1.min.js" type="text/javascript"></script> 
  <script src="vendor/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="lib/jquery.easytabs.min.js" type="text/javascript"></script>
	<style type="text/css">
		/* Example Styles for Demo */
    .etabs { 
			margin: 0; 
			padding: 0; 
			}
    .tab { 
			display: inline-block; 
			zoom:1; 
			*display:inline; 
			background: #eee; 
			border: solid 1px #999; 
			border-bottom: none; 
			-moz-border-radius: 4px 4px 0 0; 
			-webkit-border-radius: 4px 4px 0 0; 
			}
    .tab a { 
			font-size: 14px; 
			line-height: 2em; 
			display: block; 
			padding: 0 10px; 
			outline: none; 
			}
    .tab a:hover { 
			text-decoration: underline; 
			}
    .tab.active { 
			background: #fff; 
			padding-top: 6px; 
			position: relative; 
			top: 1px; 
			border-color: #666; 
			}
    .tab a.active { 
			font-weight: bold; 
			}
    .tab-container .panel-container { 
			background: #fff; 
			border: solid #666 1px; 
			padding: 10px; 
			-moz-border-radius: 0 4px 4px 4px; 
			-webkit-border-radius: 0 4px 4px 4px; 
			}
    .panel-container { 
			margin-bottom: 10px; 
			}
		.tab a:visited {
			text-decoration: none;
			color: inherit;
		}

	</style>
	<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
    });
  </script>

</head>
<body>
	<div id="wrapper">
	<!-- the header and top navigation -->
		<div id="header">
		
			<div id="logo">
				<a href="index.html">
					Code Plateau
				</a>
			</div>
			
			<div id="navigation">
				<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href=".html">text</a></li>
				<li><a href=".html">text</a></li>
				</ul>
			</div>
			
		</div> <!-- end header -->
		
		<!-- the sideNav -->
		<div id="sideNav">
				<ul>
					<h2>Tutorial</h2>
					<li><a href=".html">Declarations</a></li>
					<li><a href=".html">Looping</a></li>
					<li><a href=".html">Arrays</a></li>
					<li><a href=".html">Methods</a></li>
				</ul>
		</div> <!-- end sideNav -->
		
		<!-- content 1 -->
		<div id="content1">
			<h3>Declarations</h3>
			<p>definition: fkja; fdajlkf fdajslkfj fkadsjf</p>
		
		</div> <!-- end of content1 -->
		
		<!-- content2-->
		<div id="content2">
			<div id="tab-container" class='tab-container'>
				<ul class='etabs'>
					<li class='tab'><a href="#tabs1-html">Pseudocode</a></li>
					<li class='tab'><a href="#tabs1-js">Python</a></li>
					<li class='tab'><a href="#tabs1-html">C#</a></li>
					<li class='tab'><a href="#tabs1-css">Java</a></li>
					<li class='tab'><a href="#tabs1-css">Php</a></li>
				</ul>
				<div class='panel-container'>
					<div id="tabs1-html">

						<pre>
						<code>
&lt;div id="tab-container" class="tab-container"&gt;
&lt;ul class='etabs'&gt;
	&lt;li class='tab'&gt;&lt;a href="#tabs1-html"&gt;HTML Markup&lt;/a&gt;&lt;/li&gt;
	&lt;li class='tab'&gt;&lt;a href="#tabs1-js"&gt;Required JS&lt;/a&gt;&lt;/li&gt;
	&lt;li class='tab'&gt;&lt;a href="#tabs1-css"&gt;Example CSS&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;
&lt;div id="tabs1-html"&gt;
	&lt;h2&gt;HTML Markup for these tabs&lt;/h2&gt;
	&lt;!-- content --&gt;
&lt;/div&gt;
&lt;div id="tabs1-js"&gt;
	&lt;h2&gt;JS for these tabs&lt;/h2&gt;
	&lt;!-- content --&gt;
&lt;/div&gt;
&lt;div id="tabs1-css"&gt;
	&lt;h2&gt;CSS Styles for these tabs&lt;/h2&gt;
	&lt;!-- content --&gt;
&lt;/div&gt;
&lt;/div&gt;
						</code>
						</pre>

						<p>
							The HTML markup for your tabs and content can be arranged however you want. At the minimum, you need a container, a collection of links for your tabs (an unordered list by default), and matching divs for your tabbed content. Make sure the tab <code>href</code> attributes match the
							<code>id</code> of the target panel. This is standard semantic markup for in-page anchors.
						</p>
					 <p>The class names above are just to make it easy to style. You can make them whatever you want, there's no magic here.</p>
					</div>
					<div id="tabs1-js">

					<pre>
					<code>
&lt;script src="/javascripts/jquery.js" type="text/javascript"&gt;&lt;/script&gt;
&lt;script src="/javascripts/jquery.hashchange.js" type="text/javascript"&gt;&lt;/script&gt;
&lt;script src="/javascripts/jquery.easytabs.js" type="text/javascript"&gt;&lt;/script&gt;
					</code>
					</pre>

					<p>
						Optionally include the jquery <a href="http://benalman.com/projects/jquery-hashchange-plugin/">hashchange plugin</a> (recommended) or <a href="http://www.asual.com/jquery/address/docs/">address plugin</a> to enable forward-
						and back-button functionality.
					</p>

					<pre>
						<code>
			$('#tab-container').easytabs();
						</code>
					</pre>

					</div>
					<div id="tabs1-css">

						<code>
						<pre>
.etabs { margin: 0; padding: 0; }
.tab { display: inline-block; zoom:1; *display:inline; background: #eee; border: solid 1px #999; 
  border-bottom: none; -moz-border-radius: 4px 4px 0 0; -webkit-border-radius: 4px 4px 0 0; }
.tab a { font-size: 14px; line-height: 2em; display: block; padding: 0 10px; outline: none; }
.tab a:hover { text-decoration: underline; }
.tab.active { background: #fff; padding-top: 6px; position: relative; top: 1px; border-color: #666; }
.tab a.active { font-weight: bold; }
.tab-container .panel-container { background: #fff; border: solid #666 1px; padding: 10px; 
  -moz-border-radius: 0 4px 4px 4px; -webkit-border-radius: 0 4px 4px 4px; }
						</pre>
						</code>

					</div>
				</div>
			</div>
		
		</div> <!-- end content2 -->
	
		<!-- the footer -->
		<div id="footer">
			<p style="color: red;">text</p>
		</div>
	</div> <!-- end wrapper -->

</body>
</html>