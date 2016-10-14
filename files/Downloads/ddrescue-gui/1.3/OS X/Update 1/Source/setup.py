"""
This is a setup.py script generated by py2applet

Usage:
    python setup.py py2app
"""

from setuptools import setup

APP = ['./DDRescue-GUI.py']
DATA_FILES = ['./ddrescue',
 './displayoutput.sh',
 './getblocksize.sh',
 './listdevices.sh',
 './startddrescue.sh',
 './runasroot.sh',
 './PViewWindow.py',
 './ddgoestotherescue.jpg']
OPTIONS = {'arch': 'i386',
 'argv_emulation': True,
 'iconfile': '/usr/share/ddrescue-gui/48x48logo.icns',
 'includes': 'wx,platform,subprocess,time,shutil,sys,os',
 'packages': 'wx.lib.pubsub'}

setup(
    app=APP,
    data_files=DATA_FILES,
    options={'py2app': OPTIONS},
    setup_requires=['py2app'],
)
