PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  DOS;  
FUNCTION GetQueryStringParameter(param: STRING): STRING;
VAR
  QueryString: STRING;
BEGIN {GetQueryStringParameter}
  QueryString := GetEnv('QUERY_STRING');
  {Проверка вхождения в QueryString подстроки param= или &param=}
  IF (POS(param + '=', QueryString) = 1) OR (POS('&' + param + '=', QueryString) <> 0)
  THEN
    BEGIN
      QueryString := COPY(QueryString, POS(param + '=', QueryString) + LENGTH(param + '='), 255);
      IF POS('&', QueryString) <> 0
      THEN
        QueryString := COPY(QueryString, 1, POS('&', QueryString) - 1);
      GetQueryStringParameter := QueryString
    END
  ELSE      
    GetQueryStringParameter := ''    
END; {GetQueryStringParameter}
BEGIN {WorkWithQueryString}
  WRITELN('Content-Type: text/plain');
  WRITELN;     
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}
