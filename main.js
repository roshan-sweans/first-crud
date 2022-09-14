function show(r) {
    session = "<?php $_SESSION['id']=";
    s = r.toString();
    php = session.concat(s);
    url = ';header("Location : show.php");?>';
    phpresult=php.concat(url);
    n="hello world"
    document.getElementById("fn-runner").innerHTML = phpresult;
}