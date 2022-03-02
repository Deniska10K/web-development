PROGRAM HelloName(INPUT, OUTPUT);
USES DOS;
CONST 
  Max_len = 255;
  Start_pos = 6;
VAR 
  Parameters, Name: STRING;
  CopyLen: integer;
BEGIN {HelloName}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Parameters := GetEnv('QUERY_STRING');
  IF POS('name=', Parameters) = 1
  THEN
    BEGIN
      IF POS('&', Parameters) <> 0
      THEN
        CopyLen := POS('&', Parameters) - 6
      ELSE
        CopyLen := Max_len;
      Name := COPY(Parameters, Start_pos, CopyLen);
      WRITELN('Hello dear, ', Name, '!')
    END
  ELSE
    WRITELN('Hello Anonymous!')
END. {HelloName}
