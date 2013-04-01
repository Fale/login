@extends('layouts.default')

@section('title')Login @stop

@section('content')
    @if (Session::has('flash_error'))
        <div id="flash_error">{{ Session::get('flash_error') }}</div>
    @endif

    {{ Form::open(array('action' => 'login', 'method' => 'POST')) }}
        <!-- username field -->
        <p>
            {{ Form::label('username', 'Username') }}<br/>
            {{ Form::text('username', Input::old('username')) }}
        </p>
        <!-- password field -->
        <p>
            {{ Form::label('password', 'Password') }}<br/>
            {{ Form::password('password') }}
        </p>
        <!-- submit button -->
        <p>{{ Form::submit('Login') }}</p>
    {{ Form::close() }}
    <form action="index.php" method="post" name="form1" id="form1" accept-charset="UTF-8" onSubmit="doSubmit(); return false;">
      <table width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr>
          <td height="75" valign="top"><strong> Indirizzo e-mail <font color="#CC0000">*</font></strong><br>
            <input name="email" type="text" id="email" value="" size="60" maxlength="60" onFocus="this.style.backgroundColor='#FFFFFF';">
            <br>
            <span class="gray">Puoi accedere usando il tuo indirizzo e-mail</span></td>
        </tr>
        <tr>
          <td height="75" valign="top"><strong>Password <span ><font color="#CC0000">*</font></span></strong><br>
            <input id="pass" maxlength="60" size="60" type="password" name="pass" onFocus="this.style.backgroundColor='#FFFFFF';"></td>
        </tr>
        <tr>
          <td valign="top"><p><a href="lostpwd">Hai dimenticato la password  ? Clicca qui</a></p>
            <p>
              <script language="JavaScript" type="text/JavaScript">
var whitespace = " \t\n\r";
function isEmpty(s) {
// Check whether string s is empty.
    return ((s == null) || (s.length == 0))
}
function isWhitespace (s) {
// Returns true if string s is empty or whitespace characters only.
    if (isEmpty(s)) return true;
    for (var i = 0; i < s.length; i++) {   
        var c = s.charAt(i);
        if (whitespace.indexOf(c) == -1) return false;
    }
    return true;
} 
function isEmail (s) { 
var i = 1;
var sLength = s.length;
    if (isWhitespace(s)) return false;
    while ((i < sLength) && (s.charAt(i) != "@")) { i++ }
    if ((i >= sLength) || (s.charAt(i) != "@")) return false;
    else i += 2;
    while ((i < sLength) && (s.charAt(i) != ".")) { i++ }
    if ((i >= sLength - 1) || (s.charAt(i) != ".")) return false;
    else return true;
}


function doSubmit() {
if(isWhitespace(document.form1.user.value) == true) {
this.user.style.backgroundColor="#FFCCFF";
return;
}
if(isWhitespace(document.form1.pass.value) == true) {
this.pass.style.backgroundColor="#FFCCFF";
return;
}
document.form1.submit();
}
</script>
              <input name="Submit" type="submit" class="button" value=" ACCEDI ">
              &nbsp;
              <input name="Submit2" type="button" class="button" value="VOGLIO REGISTRARMI AL SITO" onClick="self.location='register.php';">
            </p></td>
        </tr>
      </table>
    </form>
@stop
