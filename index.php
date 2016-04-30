<!DOCTYPE html>
<html>
<head lang="cs">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Roští.cz</title>
	<style>
		body {
			font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
			color: #2a303c;
			background: #54af46;
		}
		.header {
			text-align: center;
		}
		pre, .row p {
			text-align: left;
		}
		.container {
			width: 800px;
			margin: 50px auto;
			background: #fff;
			padding: 20px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			text-align: center;
		}
		a {
			color: #54af46;
		}
		.project-domain {
			color: #54af46;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="header" role="banner">
		<a href="https://rosti.cz"><img src="data:image/png;base64,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"></a>
	</div>
	<div class="row">
		<div>
			<h2>Kde to jsem?</h2>
			<h3 class="project-domain"></h3>
			<p >
				Na <a href="https://rosti.cz">Roští.cz</a> a prostředí pro vaši aplikaci je připraveno. Nyní můžete svůj web nahrát do složky <code>/srv/webroot</code>. Použijte k tomu SSH či SFTP přístup uvedený v administraci.
			</p>
			<p>V případě použití nejrůznějších php frameworků (<a href="http://symfony.com/">Symfony</a>, <a href="http://nette.org/cs/">Nette</a> atd...) nahrajte applikaci do adresáře <i>/srv/app</i> a na místo <i>/srv/webroot</i> vytvořte symlink na příslušné místo ve vaší applikaci.<br>
				Pokud bude v dostupný soubor <i>/srv/app/composer.json</i> bude docházet k automatickému update po startu kontejneru.
			</p>
			<p>Verzi PHP jste měli možnost si vybrat při zakládání kontejneru pro vaši aplikaci, ale ještě asi nemáte uplnou představu o tom, co tu najdete. Takže určitě mrkněte na <a href="/info.php">phpinfo</a>.</p>
			<p>Chcete-li upravit konfiguraci <code>php.ini</code>, napište ji do souboru <code>/srv/conf/php.ini</code> a v administraci restartujte aplikaci. Po spuštění bude tento soubor nakopírován na správné místo a s vašimi úpravami naběhne.</p>
			<p>Do souboru <code>/srv/app/init.sh</code> můžete napsat příkazy, které se mají spustit po každém restart kontejneru. Můžete si tak usnadnit třeba deployment.</p>
		</div>
		<p>V případě problémů se prosím obraťte na <a href="mailto:podpora@rosti.cz">technickou podporu</a> nebo na <a href="https://docs.rosti.cz/apps/php/" target="_blank">dokumentaci</a>.</p>
		<p>Tým <a href="https://rosti.cz">Roští.cz</a> | <a href="http://twitter.com/rosti_cz">@rosti_cz</a></p>
	</div>
</div>
<script type="application/javascript">
	var index, len;
	var places = document.getElementsByClassName('project-domain');
	var domain = document.domain;

	for (index = 0, len = places.length; index < len; ++index) {
		places[index].innerHTML = domain;
	}
</script>
</body>
</html>

