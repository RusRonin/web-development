PROGRAM PrintHelloName(INPUT, OUTPUT);
USES
  DOS;
VAR
  Query, Name: STRING;
  Position, AmperPosition: INTEGER;
BEGIN {PrintHello}
  Query := GetEnv('QUERY_STRING');
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Position := Pos('name', Query);
  AmperPosition := Pos('&', Query);
  IF (Position <> 0)
  THEN
    BEGIN
      IF (AmperPosition = 0)
      THEN
        BEGIN
          Name := Copy(Query, Position + 5, Length(Query) - 5);
        END
      ELSE  
        BEGIN
          Name := Copy(Query, Position + 5, AmperPosition - 6);
        END;
      WRITELN('Hello dear, ', Name, '!');
    END
  ELSE
    WRITELN('Hello Anonymous!');
END. {PrintHello}