set actual=W

for /f "tokens=*" %%G in ('dir /b /s /a:d "C:\Users\%USERNAME%\Documents\a\*%actual%*"') do move "%%G" "C:\Users\%USERNAME%\Documents\b"

pause