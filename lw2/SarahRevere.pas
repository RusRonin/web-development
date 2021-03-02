PROGRAM SarahRevere(INPUT, OUTPUT);
USES
  DOS;
VAR
  Query, Lantern: STRING;
  Position: INTEGER;
BEGIN {PrintHello}
  Query := GetEnv('QUERY_STRING');
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Position := Pos('lanterns', Query);
  IF (Position <> 0)
  THEN
    BEGIN
      Lantern := Copy(Query, Position + 9, 1);
      IF (Lantern = '1')
      THEN
        WRITELN('Land');
      IF (Lantern = '2')
      THEN
        WRITELN('Sea');
    END;
END. {PrintHello}