function make_hidden( name, value, formname ){
    var q = document.createElement('input');
    q.type = 'hidden';
    q.name = name;
    q.value = value;
    if (formname){ document.forms[formname].appendChild(q); }
    else{ document.forms[0].appendChild(q); }
}
