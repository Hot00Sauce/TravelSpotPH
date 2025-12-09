@echo off
title TravelSpotPH - Quick Access
color 0A

echo.
echo ========================================
echo    TravelSpotPH - Quick Access Menu
echo ========================================
echo.
echo 1. Open Project Summary (home.php)
echo 2. Open Image Guide
echo 3. Open in Browser (Home Page)
echo 4. Open in Browser (Login Page)
echo 5. Open phpMyAdmin
echo 6. Open Project Folder
echo 7. Exit
echo.
echo ========================================
echo.

set /p choice="Enter your choice (1-7): "

if "%choice%"=="1" (
    start index.html
    echo Opening Project Summary...
    timeout /t 2 >nul
    goto menu
)

if "%choice%"=="2" (
    start image-guide.html
    echo Opening Image Guide...
    timeout /t 2 >nul
    goto menu
)

if "%choice%"=="3" (
    start http://localhost/TravelSpotPH/home.php
    echo Opening Home Page...
    timeout /t 2 >nul
    goto menu
)

if "%choice%"=="4" (
    start http://localhost/TravelSpotPH/login.php
    echo Opening Login Page...
    timeout /t 2 >nul
    goto menu
)

if "%choice%"=="5" (
    start http://localhost/phpmyadmin
    echo Opening phpMyAdmin...
    timeout /t 2 >nul
    goto menu
)

if "%choice%"=="6" (
    start .
    echo Opening Project Folder...
    timeout /t 2 >nul
    goto menu
)

if "%choice%"=="7" (
    echo.
    echo Goodbye!
    timeout /t 1 >nul
    exit
)

echo Invalid choice! Please try again.
timeout /t 2 >nul

:menu
echo.
echo Press any key to return to menu...
pause >nul
cls
goto :EOF
