<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
            Benvenuto in Fare 2.0, hai creato il tuo account, per il momento solo in modalitа' di LETTURA: così potrai fare un giro sul sito e scoprire le funzionalità presenti. Per poter usufrire anche della modalitа di SCRITTURA, ad esempio nelle sezioni Forum e per i Commenti, dovrai validare il tuo indirizzo email cliccando su <a href="{{ URL::to('checkmail', $token) }}">questo</a> link o se non funzionasse andando all'indirizzo <a href="{{ URL::to('checkmail', $token) }}">{{ URL::to('checkmail', $token) }}</a>.
{{--        La sezione di Voto elettronico è attualmente in fase sperimentale; se vuoi ricevere un invito per provarne le funzionalità clicca qui.i --}}
            Nella sezione REGOLAMENTI &amp; GUIDE troverai utili informazioni su come utilizzare i servizi a disposizione nel sito.

            <small>Questa mail ti viene mandata per assicurarti che nessuno utilizzi il tuo indirizzo per registrazioni non autorizzate. Se tu non hai effettuato da poco la procedura di registrazione sul sito di FAREinRETE.org invia una mail a <a href="mailto:lqfbtestapp@gmail.com">lqfbtestapp@gmail.com</a> e nell'oggetto indica "Cancellate il mio indirizzo email perché usato fraudolentemente".</small>

            A presto

            Fare 2.0NET
		</div>
	</body>
</html>
