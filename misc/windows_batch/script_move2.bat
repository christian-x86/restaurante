
for /f "usebackq tokens=* delims=," %%a in ("C:\Users\CRISTIAN GARCIA\Documents\lunes.csv") do (
      echo %%a
      for /f "tokens=*" %%G in ('dir /b /s /a:d "C:\Users\%USERNAME%\Documents\a\*%%a*"') do move "%%G" "C:\Users\%USERNAME%\Documents\b"
       )

pause