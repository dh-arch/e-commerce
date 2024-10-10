<?php
// Constant Variable
define('BASE_URL', 'http://localhost/feane-1.0.0/Blog_project/');

// database Connection
$con = new mysqli('localhost', 'root', '', 'dbshopping');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Admin Table
$sql = 'CREATE TABLE IF NOT EXISTS `admin` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `email` VARCHAR(255) NOT NULL ,`phone` VARCHAR(255) NOT NULL ,`password` VARCHAR(255) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = MyISAM;';
mysqli_query($con, $sql);

// company Table
$sql = 'CREATE TABLE IF NOT EXISTS `company` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = MyISAM;';
mysqli_query($con, $sql);

// modal Table
$sql = 'CREATE TABLE IF NOT EXISTS `modal` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `company_id` INT(11) NOT NULL , `name` VARCHAR(255) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = MyISAM;';
mysqli_query($con, $sql);
 
// color Table
$sql = 'CREATE TABLE IF NOT EXISTS `color` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = MyISAM;';
mysqli_query($con, $sql);

// Mobile Table
$sql = 'CREATE TABLE IF NOT EXISTS Mobile ( 
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            MobileName TEXT,
            MobilePrice DECIMAL(10, 2),
            MobileImages TEXT,
            WarrantyAndGuarantee TEXT,
            Storage TEXT,
            Highlights TEXT,
            Seller TEXT,
            ProductDescription TEXT,
            General_InTheBox TEXT,
            General_ModelNumber TEXT,
            General_ModelName TEXT,
            General_Color TEXT,
            General_BrowseType TEXT,
            General_SIMType TEXT,
            General_HybridSimSlot TEXT,
            General_Touchscreen TEXT,
            General_OTGCompatible TEXT,
            General_QuickCharging TEXT,
            DisplayFeatures_DisplaySize TEXT,
            DisplayFeatures_Resolution TEXT,
            DisplayFeatures_ResolutionType TEXT,
            DisplayFeatures_GPU TEXT,
            DisplayFeatures_DisplayType TEXT,
            DisplayFeatures_HDGameSupport TEXT,
            DisplayFeatures_DisplayColors TEXT,
            DisplayFeatures_RefreshRate TEXT,
            DisplayFeatures_OtherDisplayFeatures TEXT,
            OsAndProcessorFeatures_OperatingSystem TEXT,
            OsAndProcessorFeatures_ProcessorBrand TEXT,
            OsAndProcessorFeatures_ProcessorType TEXT,
            OsAndProcessorFeatures_ProcessorCore TEXT,
            OsAndProcessorFeatures_PrimaryClockSpeed TEXT,
            OsAndProcessorFeatures_SecondaryClockSpeed TEXT,
            OsAndProcessorFeatures_TertiaryClockSpeed TEXT,
            OsAndProcessorFeatures_OperatingFrequency TEXT,
            MemoryAndStorageFeatures_InternalStorage TEXT,
            MemoryAndStorageFeatures_RAM TEXT,
            MemoryAndStorageFeatures_TotalMemory TEXT,
            MemoryAndStorageFeatures_PhoneBookMemory TEXT,
            CameraFeatures_PrimaryCameraAvailable TEXT,
            CameraFeatures_PrimaryCamera TEXT,
            CameraFeatures_PrimaryCameraFeatures TEXT,
            CameraFeatures_OpticalZoom TEXT,
            CameraFeatures_SecondaryCameraAvailable TEXT,
            CameraFeatures_SecondaryCamera TEXT,
            CameraFeatures_SecondaryCameraFeatures TEXT,
            CameraFeatures_Flash TEXT,
            CameraFeatures_HDRecording TEXT,
            CameraFeatures_FullHDRecording TEXT,
            CameraFeatures_VideoRecording TEXT,
            CameraFeatures_VideoRecordingResolution TEXT,
            CameraFeatures_DigitalZoom TEXT,
            CameraFeatures_FrameRate TEXT,
            CameraFeatures_ImageEditor TEXT,
            CameraFeatures_DualCameraLens TEXT,
            CallFeatures_CallWaitHold TEXT,
            CallFeatures_ConferenceCall TEXT,
            CallFeatures_HandsFree TEXT,
            CallFeatures_VideoCallSupport TEXT,
            CallFeatures_CallDivert TEXT,
            CallFeatures_PhoneBook TEXT,
            CallFeatures_CallTimer TEXT,
            CallFeatures_SpeakerPhone TEXT,
            CallFeatures_SpeedDialing TEXT,
            CallFeatures_CallRecords TEXT,
            CallFeatures_Logs TEXT,
            ConnectivityFeatures_NetworkType TEXT,
            ConnectivityFeatures_SupportedNetworks TEXT,
            ConnectivityFeatures_InternetConnectivity TEXT,
            ConnectivityFeatures_GPRS TEXT,
            ConnectivityFeatures_PreinstalledBrowser TEXT,
            ConnectivityFeatures_MicroUSBPort TEXT,
            ConnectivityFeatures_MicroUSBVersion TEXT,
            ConnectivityFeatures_MiniUSBPort TEXT,
            ConnectivityFeatures_BluetoothSupport TEXT,
            ConnectivityFeatures_BluetoothVersion TEXT,
            ConnectivityFeatures_WiFi TEXT,
            ConnectivityFeatures_WiFiVersion TEXT,
            ConnectivityFeatures_WiFiHotspot TEXT,
            ConnectivityFeatures_MiniHDMIPort TEXT,
            ConnectivityFeatures_NFC TEXT,
            ConnectivityFeatures_USBTethering TEXT,
            ConnectivityFeatures_TVOut TEXT,
            ConnectivityFeatures_Infrared TEXT,
            ConnectivityFeatures_USBConnectivity TEXT,
            ConnectivityFeatures_EDGE TEXT,
            ConnectivityFeatures_AudioJack TEXT,
            ConnectivityFeatures_MapSupport TEXT,
            ConnectivityFeatures_GPSSupport TEXT,
            OtherDetails_Smartphone TEXT,
            OtherDetails_TouchscreenType TEXT,
            OtherDetails_SIMSize TEXT,
            OtherDetails_MobileTracker TEXT,
            OtherDetails_UserInterface TEXT,
            OtherDetails_SocialNetworkingPhone TEXT,
            OtherDetails_InstantMessage TEXT,
            OtherDetails_BusinessPhone TEXT,
            OtherDetails_JavaApplication TEXT,
            OtherDetails_RemovableBattery TEXT,
            OtherDetails_JAVASupport TEXT,
            OtherDetails_MMS TEXT,
            OtherDetails_SMS TEXT,
            OtherDetails_Keypad TEXT,
            OtherDetails_VoiceInput TEXT,
            OtherDetails_GraphicsPPI TEXT,
            OtherDetails_PredictiveTextInput TEXT,
            OtherDetails_UserMemory TEXT,
            OtherDetails_SIMAccess TEXT,
            OtherDetails_Sensors TEXT,
            OtherDetails_UpgradableOperatingSystem TEXT,
            OtherDetails_Series TEXT,
            OtherDetails_Browser TEXT,
            OtherDetails_RingtonesFormat TEXT,
            MultimediaFeatures_FMRadio TEXT,
            MultimediaFeatures_FMRadioRecording TEXT,
            MultimediaFeatures_DLNASupport TEXT,
            MultimediaFeatures_AudioFormats TEXT,
            MultimediaFeatures_MusicPlayer TEXT,
            MultimediaFeatures_VideoFormats TEXT,
            BatteryAndPowerFeatures_BatteryCapacity TEXT,
            BatteryAndPowerFeatures_BatteryType TEXT,
            BatteryAndPowerFeatures_DualBattery TEXT,
            Dimensions_Width TEXT,
            Dimensions_Height TEXT,
            Dimensions_Depth TEXT,
            Dimensions_Weight TEXT,
            Warranty_WarrantySummary TEXT,
            Warranty_WarrantyServiceType TEXT,
            Warranty_CoveredInWarranty TEXT,
            Warranty_DomesticWarranty TEXT,
            `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = MyISAM;';
mysqli_query($con, $sql);

?>