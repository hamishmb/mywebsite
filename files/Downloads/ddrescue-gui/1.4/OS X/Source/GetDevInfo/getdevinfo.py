#!/usr/bin/env python
# -*- coding: utf-8 -*- 
# Device Information Obtainer for DDRescue-GUI Version 1.4
# This file is part of DDRescue-GUI.
# Copyright (C) 2013-2015 Hamish McIntyre-Bhatty
# DDRescue-GUI is free software: you can redistribute it and/or modify it
# under the terms of the GNU General Public License version 3 or,
# at your option, any later version.
#
# DDRescue-GUI is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with DDRescue-GUI.  If not, see <http://www.gnu.org/licenses/>.

#Do future imports to prepare to support python 3. Use unicode strings rather than ASCII strings, as they fix potential problems.
from __future__ import absolute_import
from __future__ import division
from __future__ import print_function
from __future__ import unicode_literals

#Begin Main Class.
class Main():
    def FoundExactMatch(self, Item, Text, Log=True):
        """Check if an exact match of "Item" (arg) can be found in "Text" (arg), seperated by commas or spaces."""
        if Log == True:
            logger.debug("GetDevInfo: Main().FoundExactMatch(): Looking for: "+Item+" in: "+Text+"...")

        Result = re.findall('\\'+Item+'\\b', Text)

        if len(Result) > 0:
            Result =  True
        else:
            Result =  False

        if Log == True:
            logger.info("GetDevInfo: Main().FoundExactMatch(): Result: "+str(Result)+"...")

        return Result

    def IsPartition(self, Disk, DiskList=None):
        """Check if the given Disk is a partition"""
        logger.debug("GetDevInfo: Main().IsPartition(): Checking if Disk: "+Disk+" is a partition...")

        if Linux:
            if Disk[0:7] not in ["/dev/sr", "/dev/fd"] and Disk[-1].isdigit() and Disk[0:8] in DiskList:
                Result =  True
            else:
                Result = False
        else:
            if Disk[-2] == "s":
                Result =  True
            else:
                Result = False

        logger.info("GetDevInfo: Main().IsPartition(): Result: "+str(Result)+"...")
        return Result

    def GetPartitions(self, Device, DiskList):
        """Find and return all partitions contained by the given device"""
        logger.debug("GetDevInfo: Main().GetPartitions(): Finding all partitions contained by "+Device+" using the given disk list...")
        PartitionsList = []

        for Disk in DiskList:
            if Device != Disk and Device in Disk:
                PartitionsList.append(Disk)

        #Return the results.
        logger.info("GetDevInfo: Main().GetPartitions(): Results: "+str(PartitionsList)+"...")
        return PartitionsList

    def DeduplicateList(self, ListToDeduplicate):
        """Deduplicate the given list."""
        logger.debug("GetDevInfo: Main().DeduplicateList(): Deduplicating list: "+str(ListToDeduplicate)+"...")
        ResultsList = []

        for Element in ListToDeduplicate:
            if Element not in ResultsList:
                ResultsList.append(Element)

        #Return the results.
        logger.info("GetDevInfo: Main().DeduplicateList(): Results: "+str(ResultsList)+"...")
        return ResultsList

    def GetVendor(self, Disk, DiskLineNumber=None):
        """Find vendor information for the given Disk."""
        logger.info("GetDevInfo: Main().GetVendor(): Getting vendor info for Disk: "+Disk+"...")

        if Linux:
            #Look for the information using the Disk's line number.
            for Number in self.VendorLinesList:
                #Ignore the line number if it is before the Disk name...
                if Number < DiskLineNumber:
                    if self.VendorLinesList[-1] != Number:
                        continue
                    else:
                        #...unless it is the last line.
                        VendorLineNumber = Number
                else:
                    #The first time this is run, we know the last line number was the right one!
                    #Now we just have to grab that line, and format it.
                    VendorLineNumber = self.VendorLinesList[self.VendorLinesList.index(Number)-1]

                #Return the Vendor info. Use the found line if it is less than ten lines apart from the Disk line. Otherwise it's probably bogus.
                if DiskLineNumber - VendorLineNumber < 10:
                    Vendor = ' '.join(self.Output[VendorLineNumber].split()[1:])
                    logger.info("GetDevInfo: Main().GetVendor(): Found vendor info: "+Vendor)
                    return Vendor
                else:
                    logger.warning("GetDevInfo: Main().GetVendor(): Found probable wrong vendor: "+' '.join(self.Output[VendorLineNumber].split()[1:])+". Ignoring it and returning 'Unknown'...")
                    return "Unknown"
        else:
            #Since self.Output on OS X is info for this particular Disk, don't bother with the line number stuff, just grab the line that begins with "Disk / Media Name:".
            for Line in self.Output:
                if "Device / Media Name:" in Line:
                    Vendor = Line.split()[4]
                    logger.info("GetDevInfo: Main().GetVendor(): Found vendor info: "+Vendor)
                    return Vendor

    def GetProduct(self, Disk, DiskIsPartition, DiskLineNumber=None, DiskLinesList=None, ProductInfoList=None):
        """Find product information for the given Disk."""
        logger.info("GetDevInfo: Main().GetProduct(): Getting product info for Disk: "+Disk+"...")

        if Linux:
            #Check if the Disk is actually a partition.
            if DiskIsPartition:
                #Temporarily reset DiskLineNumber to the partition's host DiskLineNumber, so we can grab product info, and keep the old DiskLineNumber.
                logger.debug("GetDevInfo: Main().GetProduct(): Using product info from host Disk, because this is a partition...")
                OldDiskLineNumber = DiskLineNumber

                #Find the line number that the host Disk is on.
                for Number in DiskLinesList:
                    if self.FoundExactMatch(Disk[0:8], self.Output[Number]):
                        DiskLineNumber = Number
                        break

            #Look for the information using the Disk's line number.
            for Number in self.ProductLinesList:
                if Number < DiskLineNumber:
                    #Ignore the line number if it is before the Disk name...
                    if self.ProductLinesList[-1] != Number:
                        continue
                    else:
                        #...unless it is the last line.
                        ProductLineNumber = Number
                else:
                    #The first time this is run, we know the last line num was the right one!
                    #Now we just have to grab that line, and format it.
                    ProductLineNumber = self.ProductLinesList[self.ProductLinesList.index(Number)-1]

                #Save the Vendor info. Use the found line if it is less than ten lines apart from the Disk line. Otherwise it's probably bogus.
                if DiskLineNumber - ProductLineNumber < 10:
                    Product = ' '.join(self.Output[ProductLineNumber].split()[1:])
                    logger.info("GetDevInfo: Main().GetProduct(): Found product info: "+Product+"...")
                else:
                    Product = "Unknown"
                    logger.warning("GetDevInfo: Main().GetProduct(): Found probable wrong product: "+' '.join(self.Output[ProductLineNumber].split()[1:])+". Ignoring it and returning 'Unknown'...")

                #Break out of the loop to save time.
                break

            if DiskIsPartition:
                #Reset the Disk line number to the original value so the rest of the code works properly, and return the value.
                DiskLineNumber = OldDiskLineNumber
                return "Host Device: "+Product
            else:
                #Return the value.
                return Product
        else:
            #Since self.Output on OS X is info for this particular Disk, don't bother with the line number stuff, just grab the line that begins with "Disk / Media Name:".
            if DiskIsPartition:
                #We need to use the info from the host Disk, which will be whatever came before.
                logger.debug("GetDevInfo: Main().GetProduct(): Using product info from host Disk, because this is a partition...")
                Product = ProductInfoList[-1]

                if "Host Device:" not in Product:
                    Product = "Host Device: "+Product

                return Product
            else:
                for Line in self.Output:
                    if "Device / Media Name:" in Line:
                        Product = ' '.join(Line.split()[5:])
                        logger.info("GetDevInfo: Main().GetProduct(): Found product info: "+Product+"...")
                        return Product

    def GetSize(self, Disk, DiskLineNumber=None):
        """Find size information for the given Disk."""
        logger.info("GetDevInfo: Main().GetSize(): Getting size info for Disk: "+Disk+"...")

        if Linux:
            #Look for the information using the Disk's line number.
            for Number in self.SizeLinesList:
                if Number < DiskLineNumber:
                    #Ignore the line number if it is before the Disk name...
                    if self.SizeLinesList[-1] != Number:
                        continue
                    else:
                        #...unless it is the last line. Keep going rather than reiterating the loop.
                        pass
                else:
                    #The first time this is run, we know this line num is the right one!
                    #Now we just have to grab this line, check it is within 10 lines, and format it. Keep going and don't use SizeLineNumber, becuase we don't need it.
                    pass

                #Return the Size info. Use the found line if it is less than ten lines apart from the Disk line. Otherwise it's probably bogus.
                if Number - DiskLineNumber < 10:
                    Size = ' '.join(self.Output[Number].split()[1:])
                    logger.info("GetDevInfo: Main().GetSize(): Found size info: "+Size+"...")
                    return Size
                else:
                    if Disk[0:7] == "/dev/sr":
                        #Report size information in a more friendly way for optical drives.
                        logger.info("GetDevInfo: Main().GetSize(): Disk is an optical drive, and getting size info isn't supported for optical drives. Returning 'N/A'...")
                        return "N/A"
                    else:
                        logger.warning("GetDevInfo: Main().GetSize(): Found probable wrong size: "+' '.join(self.Output[Number].split()[1:])+". Ignoring it and returning 'Unknown'...")
                        return "Unknown"

        else:
            #Since self.Output on OS X is info for this particular Disk, don't bother with the line number stuff, just grab the line that begins with "Total Size:".
            for Line in self.Output:
                if "Total Size:" in Line:
                    Size = ' '.join(Line.split()[2:4])
                    logger.info("GetDevInfo: Main().GetSize(): Found size info: "+Size+"...")
                    return Size

    def GetDescription(self, Disk, DiskLineNumber=None, DiskList=None, VendorInfoList=None, ProductInfoList=None):
        """Find description information for the given Disk."""
        logger.info("GetDevInfo: Main().GetDescription(): Getting description info for Disk: "+Disk+"...")

        if Linux:
            #Look for the information using the Disk's line number.
            for Number in self.DescriptionLinesList:
                if Number < DiskLineNumber:
                    #Ignore the line number if it is before the Disk name...
                    if self.DescriptionLinesList[-1] != Number:
                        continue
                    else:
                        #...unless it is the last line.
                        DescriptionLineNumber = Number
                else:
                    #The first time this is run, we know the last line num is the right one!
                    #Now we just have to grab this line, check it is within 10 lines, and format it.
                    DescriptionLineNumber = self.DescriptionLinesList[self.DescriptionLinesList.index(Number)-1]

                #Return the Description info. Use the found line if it is less than ten lines apart from the Disk line. Otherwise it's probably bogus.
                if DiskLineNumber - DescriptionLineNumber < 10:
                    Description = ' '.join(self.Output[DescriptionLineNumber].split()[1:])
                    logger.info("GetDevInfo: Main().GetDescription(): Found description info: "+Description+"...")
                    return Description
                else:
                    logger.warning("GetDevInfo: Main().GetDescription(): Found probable wrong description: "+' '.join(self.Output[DescriptionLineNumber].split()[1:])+". Ignoring it and returning 'Unknown'...")
                    return "Unknown"

        else:
            #diskutil doesn't give any descriptions, so let's try to make some ourselves.
            DiskNum = DiskList.index(Disk)
            Vendor = VendorInfoList[DiskNum]
            Product = ProductInfoList[DiskNum]

            if "HDD" in Product or "HDD" in Vendor:
                Description = "Hard Disk Drive"
            elif "SSD" in Product or "SSD" in Vendor:
                Description = "Solid State Drive"
            elif "CD" in Product or "CD" in Vendor:
                Description = "CD Drive"
            elif "DVD" in Product or "DVD" in Vendor:
                Description = "DVD Drive"
            elif "Floppy" in Product or "FDD" in Product or "Floppy" in Vendor or "FDD" in Vendor:
                Description = "Floppy Disk Drive"
            elif "USB" in Product  or "USB" in Vendor:
                Description = "USB Disk"
            else:
                Description = "N/A"

            return Description

    def GetInfo(self):
    	"""Get Disk information."""
        logger.info("GetDevInfo: Main().GetInfo(): Preparing to get Disk info...")

    	if Linux:
    	    #Run lshw to try and get disk information.
            logger.debug("GetDevInfo: Main().GetInfo(): Running 'lshw -sanitize'...")
            runcmd = subprocess.Popen("lshw -sanitize", stdout=subprocess.PIPE, stderr=subprocess.STDOUT, shell=True)
        else:
            #Run diskutil list to get Disk names.
            logger.debug("GetDevInfo: Main().GetInfo(): Running 'diskutil list'...")
            runcmd = subprocess.Popen("diskutil list", stdout=subprocess.PIPE, stderr=subprocess.STDOUT, shell=True)

        #Get the output.
        stdout, stderr = runcmd.communicate()
        self.Output = stdout.split("\n")
        DiskList = []
        logger.debug("GetDevInfo: Main().GetInfo(): Done.")

        if Linux:
            #Now we should be able to grab the names of all Disks, and detailed info on each Disk we find.
            #Use rather a lot of lists to keep track of the line numbers of each Disk, Vendor, Product, Size, Description, and Capability line.
            #I'm using my own counter here to make sure I get the right line number, not the first line with similar contents.
            DiskLinesList = []
            self.VendorLinesList = []
            self.ProductLinesList = []
            self.SizeLinesList = []
            self.DescriptionLinesList = []
            TempLineCount = -1

            for Line in self.Output:
                TempLineCount += 1

                #Try to grab info.
                if "logical name:" in Line:
                    try:
                        Disk = Line.split()[2]
                        DiskLinesList.append(TempLineCount)
                    except IndexError as e:
                        continue

                    #See if it's a Disk that's in our categories, and add it to the list if it is.
                    if '/dev/sd' in Disk or '/dev/sr' in Disk or '/dev/fd' in Disk or '/dev/hd' in Disk:
                        DiskList.append(Disk)

                elif "vendor:" in Line:
                    self.VendorLinesList.append(TempLineCount)
                elif "product:" in Line:
                    self.ProductLinesList.append(TempLineCount)
                elif "size:" in Line or "capacity:" in Line:
                    self.SizeLinesList.append(TempLineCount)
                elif "description:" in Line:
                    self.DescriptionLinesList.append(TempLineCount)

        else:
            #Grab all the Disks.
            for Line in self.Output:
                if "disk" in Line:
                    try:
                        Disk = Line.split()[-1]

                        if "/dev/" not in Disk:
                            Disk = "/dev/"+Disk

                        DiskList.append(Disk)
                    except IndexError:
                        continue

        #Deduplicate the Disk list.
        DiskList = self.DeduplicateList(DiskList)

        #Use a final set of lists to store the info, making it easier to input into a multi-column wx.ListCtrl as used in the new Disk information dialogs.
        VendorInfoList = []
        DiskTypeInfoList = []
        ProductInfoList = []
        SizeInfoList = []
        DescriptionInfoList = []

        logger.info("GetDevInfo: Main().GetInfo(): Getting Disk info...")

        for Disk in DiskList:
            #Get the Vendor, Product, Size and Description for each drive.
            if Linux:
                #First find the line number where the Disk is. Don't log the output here, because it will waste lots of time and fill the log file with junk.
                logger.debug("GetDevInfo: Main().GetInfo(): Finding Disk line number (number of line where Disk name is)...")
                for Line in self.Output:
                    if self.FoundExactMatch(Item=Disk, Text=Line, Log=False):
                        DiskLineNumber = self.Output.index(Line)
                        break

            else:
                #Run diskutil info to get Disk names.
                logger.debug("GetDevInfo: Main().GetInfo(): Running 'diskutil info "+Disk+"'...")
                runcmd = subprocess.Popen("diskutil info "+Disk, stdout=subprocess.PIPE, stderr=subprocess.STDOUT, shell=True)
                stdout, stderr = runcmd.communicate()
                self.Output = stdout.split("\n")

            #Check if the Disk is a partition.
            DiskIsPartition = self.IsPartition(Disk, DiskList)
            if DiskIsPartition:
                DiskTypeInfoList.append("Partition")
            else:
                DiskTypeInfoList.append("Device")

            #Get all other information, making sure it remains stable even if we found no info at all.
            #Vendor.
            if Linux:
                if len(self.VendorLinesList) > 0:
                    Vendor = self.GetVendor(Disk, DiskLineNumber)
                else:
                    Vendor = "Unknown"

            else:
                Vendor = self.GetVendor(Disk)

            if Vendor != None:
                VendorInfoList.append(Vendor)
            else:
                VendorInfoList.append("Unknown")

            #Product.
            if Linux:
                if len(self.ProductLinesList) > 0:
                    Product = self.GetProduct(Disk, DiskIsPartition, DiskLineNumber, DiskLinesList)
                else:
                    Product = "Unknown"

            else:
                Product = self.GetProduct(Disk, DiskIsPartition, ProductInfoList=ProductInfoList)

            if Product != None:
                ProductInfoList.append(Product)
            else:
                ProductInfoList.append("Unknown")

            #Size.
            if Linux:
                if len(self.SizeLinesList) > 0:
                    Size = self.GetSize(Disk, DiskLineNumber)
                else:
                    Size = "Unknown"

            else:
                Size = self.GetSize(Disk)

            if Size != None:
                SizeInfoList.append(Size)
            else:
                SizeInfoList.append("Unknown")

            #Description.
            if Linux:
                if len(self.DescriptionLinesList) > 0:
                    Description = self.GetDescription(Disk, DiskLineNumber=DiskLineNumber)
                else:
                    Description = "Unknown"

            else:
                Description = self.GetDescription(Disk, DiskList=DiskList, VendorInfoList=VendorInfoList, ProductInfoList=ProductInfoList)

            if Description != None:
                DescriptionInfoList.append(Description)
            else:
                DescriptionInfoList.append("Unknown")

        #Return the info.
        logger.info("GetDevInfo: Main().GetInfo(): Finished!")
        return [DiskList, DiskTypeInfoList, VendorInfoList, ProductInfoList, SizeInfoList, DescriptionInfoList]

    def GetBlockSize(self, Disk):
        """Find the given Disk's blocksize, and return it"""
        logger.debug("GetDevInfo: Main().GetBlockSize(): Finding blocksize for Disk: "+Disk+"...")

        if Linux:
    	    #Run /sbin/blockdev to try and get blocksize information.
            logger.debug("GetDevInfo: Main().GetBlockSize(): Running 'blockdev --getbsz "+Disk+"'...")
            runcmd = subprocess.Popen("blockdev --getbsz "+Disk, stdout=subprocess.PIPE, stderr=subprocess.STDOUT, shell=True)
        else:
            #Run diskutil list to get Disk names.
            logger.debug("GetDevInfo: Main().GetBlockSize(): Running 'diskutil info "+Disk+"'...")
            runcmd = subprocess.Popen("diskutil info "+Disk, stdout=subprocess.PIPE, stderr=subprocess.STDOUT, shell=True)

        #Get the output.
        stdout, stderr = runcmd.communicate()

        if Linux:
            Result = stdout.replace('\n', '')

            #Check it worked (it should be convertable to an integer if it did).
            try:
                tmp = int(Result)
            except ValueError:
                #It didn't, this is probably a file, not a Disk.
                logger.warning("GetDevInfo: Main().GetBlockSize(): Couldn't get blocksize for Disk: "+Disk+"! Returning None...")
                return None
            else:
                #It did.
                logger.info("GetDevInfo: Main().GetBlockSize(): Blocksize for Disk: "+Disk+": "+Result+". Returning it...")
                return Result

        else:
            Output = stdout.split("\n")

            for Line in Output:
                Result = None

                if "Device Block Size:" in Line:
                    Result = Line.split()[3]

                    #Check it's actually a blocksize.
                    try:
                        tmp = int(Result)
                    except ValueError:
                        #It isn't.
                        Result = None
                    else:
                        #It is.
                        break

            #Check it worked.
            if Result == None:
                #It didn't.
                logger.warning("GetDevInfo: Main().GetBlockSize(): Couldn't get blocksize for Disk: "+Disk+"! Returning None...")
                return None
            else:
                #It did.
                logger.info("GetDevInfo: Main().GetBlockSize(): Blocksize for Disk: "+Disk+": "+Result+". Returning it...")
                return Result

#End Main Class.

if __name__ == "__main__":
    #Import modules.
    import subprocess
    import re
    import platform
    import logging

    #Set up basic logging to stdout.
    logger = logging
    logging.basicConfig(format='%(asctime)s - %(name)s - %(levelname)s: %(message)s', datefmt='%d/%m/%Y %I:%M:%S %p', level=logging.DEBUG)

    #Determine if running on Linux or Mac.
    global Linux
    if platform.system() == 'Linux':
        Linux = True

    elif platform.system() == "Darwin":
        Linux = False

    logger.info("Running on Linux: "+str(Linux))

    Info = Main().GetInfo()

    #Get blocksizes.
    BlockSizeList = []
    for Disk in Info[0]:
        BlockSizeList.append(Main().GetBlockSize(Disk))

    #Print the info in a readable way.
    print("\nDisk: "+str(Info[0])+"\n")
    print("\nBlocksize: "+str(BlockSizeList)+"\n")
    print("\nType: "+str(Info[1])+"\n")
    print("\nVendor: "+str(Info[2])+"\n")
    print("\nProduct: "+str(Info[3])+"\n")
    print("\nSize: "+str(Info[4])+"\n")
    print("\nDescription: "+str(Info[5])+"\n")