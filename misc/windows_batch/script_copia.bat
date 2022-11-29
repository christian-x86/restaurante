set actual=W

for /f "tokens=*" %%G in ('dir /b /s /a:d "C:\Users\%USERNAME%\Documents\a\*%actual%*"') do (
for /F "tokens=6 delims=\" %%F in ("%%G") do (
set "pre=%%F"
)
echo %pre%
xcopy "%%G" "C:\Users\%USERNAME%\Documents\b" /s /i /e
echo %%G
echo C:\Users\%USERNAME%\Documents\b\%pre%
)
echo %pre%
echo C:\Users\%USERNAME%\Documents\b\%pre%
set "SERVERNAME=VKR\SQL2012"
for /F "tokens=1 delims=\" %%F in ("%SERVERNAME%") do set "pre=%%F"
echo %pre%

pause