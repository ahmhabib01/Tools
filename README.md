# Fixing APT Source List Issue in Kali Linux

If you see this message:

    It seems that you don't have any APT data sources configured.

It means your **sources.list file is empty or broken**.

------------------------------------------------------------------------

## ✅ Step 1: Open sources.list

``` bash
sudo nano /etc/apt/sources.list
```

------------------------------------------------------------------------

## ✅ Step 2: Add the official Kali Linux repositories

Delete everything inside the file and paste these lines:

    deb http://http.kali.org/kali kali-rolling main contrib non-free non-free-firmware
    deb http://http.kali.org/kali kali-last-snapshot main contrib non-free non-free-firmware
    deb http://security.kali.org/kali-security kali-security main contrib non-free non-free-firmware

------------------------------------------------------------------------

## ✅ Step 3: Save the file

In nano:

-   Press `CTRL + O` then Enter\
-   Press `CTRL + X`

------------------------------------------------------------------------

## ✅ Step 4: Update your system

``` bash
sudo apt update
sudo apt upgrade -y
```

------------------------------------------------------------------------

## 🎉 Done!

Your APT sources are now fixed. You can install and update packages
without errors.
