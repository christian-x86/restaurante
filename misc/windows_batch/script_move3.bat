@echo off

for /f "usebackq tokens=* delims=," %%a in ("C:\Users\%USERNAME%\Documents\lunes.csv") do (
      echo %%a
      for /f "tokens=*" %%G in ('dir /b /s /a:d "C:\Users\%USERNAME%\Downloads\*%%a*"') do move "%%G" "C:\Users\%USERNAME%\Documents\b"
       )