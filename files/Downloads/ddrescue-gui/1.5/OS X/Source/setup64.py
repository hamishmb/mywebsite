"""
This is a setup.py script written for DDRescue-GUI v1.5 (64-bit) 
by Hamish McIntyre-Bhatty.

Usage:
    python setup.py py2app
"""

from setuptools import setup

APP = ['./DDRescue-GUI.py']

DATA_FILES = ['./AuthenticationDialog.py', './ddrescue', './images', './other']

OPTIONS = {'arch': 'x86_64', 'argv_emulation': True, 'no_strip': True, 'iconfile': './images/Logo.icns', 'includes': 'wx,wx.animate,wx.lib.stattext,wx.lib.statbmp,threading,getopt,logging,time,subprocess,re,os,sys,plistlib', 'packages': 'GetDevInfo,Tools'}

setup(
    app=APP,
    data_files=DATA_FILES,
    options={'py2app': OPTIONS},
    setup_requires=['py2app'],
)
