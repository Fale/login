<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
            <p>Clicca <a href="{{ URL::to('delete', $token) }}">qui</a> per eliminare il tuo account. Se il link non funzionasse, copia e incolla questo link: <a href="{{ URL::to('delete', $token) }}">{{ URL::to('delete', $token) }}</a>.</p>
            <p>Il team di<br />
            Fare 2.0NET</p>
		</div>
	</body>
</html>
