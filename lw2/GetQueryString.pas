PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  DOS;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  Query, Param, Cropped: STRING;
  Position, AmperPosition: INTEGER;
BEGIN {PrintHello}
  Query := GetEnv('QUERY_STRING');
  Position := Pos(Key, Query);
  Cropped := Copy(Query, Position, Length(Query) - Position + 1);
  AmperPosition := Pos('&', Cropped);
  IF (Position <> 0)
  THEN
    BEGIN
      IF (AmperPosition = 0)
      THEN
        BEGIN
          Param := Copy(Cropped, Length(Key) + 2, Length(Cropped) - Length(Key));
        END
      ELSE  
        BEGIN
          Param := Copy(Cropped, Length(Key) + 2, AmperPosition - Length(Key) - 2);
        END;
    END;
    GetQueryStringParameter := Param;
END; {PrintHello}

BEGIN {WorkWithQueryString}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}

