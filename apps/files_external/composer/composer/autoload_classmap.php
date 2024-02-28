<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(__DIR__);
$baseDir = $vendorDir;

return array(
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'OCA\\Files_External\\AppInfo\\Application' => $baseDir . '/../lib/AppInfo/Application.php',
    'OCA\\Files_External\\BackgroundJob\\CredentialsCleanup' => $baseDir . '/../lib/BackgroundJob/CredentialsCleanup.php',
    'OCA\\Files_External\\Command\\Applicable' => $baseDir . '/../lib/Command/Applicable.php',
    'OCA\\Files_External\\Command\\Backends' => $baseDir . '/../lib/Command/Backends.php',
    'OCA\\Files_External\\Command\\Config' => $baseDir . '/../lib/Command/Config.php',
    'OCA\\Files_External\\Command\\Create' => $baseDir . '/../lib/Command/Create.php',
    'OCA\\Files_External\\Command\\Delete' => $baseDir . '/../lib/Command/Delete.php',
    'OCA\\Files_External\\Command\\Export' => $baseDir . '/../lib/Command/Export.php',
    'OCA\\Files_External\\Command\\Import' => $baseDir . '/../lib/Command/Import.php',
    'OCA\\Files_External\\Command\\ListCommand' => $baseDir . '/../lib/Command/ListCommand.php',
    'OCA\\Files_External\\Command\\Notify' => $baseDir . '/../lib/Command/Notify.php',
    'OCA\\Files_External\\Command\\Option' => $baseDir . '/../lib/Command/Option.php',
    'OCA\\Files_External\\Command\\Verify' => $baseDir . '/../lib/Command/Verify.php',
    'OCA\\Files_External\\Config\\ConfigAdapter' => $baseDir . '/../lib/Config/ConfigAdapter.php',
    'OCA\\Files_External\\Config\\ExternalMountPoint' => $baseDir . '/../lib/Config/ExternalMountPoint.php',
    'OCA\\Files_External\\Config\\IConfigHandler' => $baseDir . '/../lib/Config/IConfigHandler.php',
    'OCA\\Files_External\\Config\\SimpleSubstitutionTrait' => $baseDir . '/../lib/Config/SimpleSubstitutionTrait.php',
    'OCA\\Files_External\\Config\\SystemMountPoint' => $baseDir . '/../lib/Config/SystemMountPoint.php',
    'OCA\\Files_External\\Config\\UserContext' => $baseDir . '/../lib/Config/UserContext.php',
    'OCA\\Files_External\\Config\\UserPlaceholderHandler' => $baseDir . '/../lib/Config/UserPlaceholderHandler.php',
    'OCA\\Files_External\\Controller\\AjaxController' => $baseDir . '/../lib/Controller/AjaxController.php',
    'OCA\\Files_External\\Controller\\ApiController' => $baseDir . '/../lib/Controller/ApiController.php',
    'OCA\\Files_External\\Controller\\GlobalStoragesController' => $baseDir . '/../lib/Controller/GlobalStoragesController.php',
    'OCA\\Files_External\\Controller\\StoragesController' => $baseDir . '/../lib/Controller/StoragesController.php',
    'OCA\\Files_External\\Controller\\UserGlobalStoragesController' => $baseDir . '/../lib/Controller/UserGlobalStoragesController.php',
    'OCA\\Files_External\\Controller\\UserStoragesController' => $baseDir . '/../lib/Controller/UserStoragesController.php',
    'OCA\\Files_External\\Lib\\Auth\\AmazonS3\\AccessKey' => $baseDir . '/../lib/Lib/Auth/AmazonS3/AccessKey.php',
    'OCA\\Files_External\\Lib\\Auth\\AuthMechanism' => $baseDir . '/../lib/Lib/Auth/AuthMechanism.php',
    'OCA\\Files_External\\Lib\\Auth\\Builtin' => $baseDir . '/../lib/Lib/Auth/Builtin.php',
    'OCA\\Files_External\\Lib\\Auth\\IUserProvided' => $baseDir . '/../lib/Lib/Auth/IUserProvided.php',
    'OCA\\Files_External\\Lib\\Auth\\InvalidAuth' => $baseDir . '/../lib/Lib/Auth/InvalidAuth.php',
    'OCA\\Files_External\\Lib\\Auth\\NullMechanism' => $baseDir . '/../lib/Lib/Auth/NullMechanism.php',
    'OCA\\Files_External\\Lib\\Auth\\OAuth1\\OAuth1' => $baseDir . '/../lib/Lib/Auth/OAuth1/OAuth1.php',
    'OCA\\Files_External\\Lib\\Auth\\OAuth2\\OAuth2' => $baseDir . '/../lib/Lib/Auth/OAuth2/OAuth2.php',
    'OCA\\Files_External\\Lib\\Auth\\OpenStack\\OpenStackV2' => $baseDir . '/../lib/Lib/Auth/OpenStack/OpenStackV2.php',
    'OCA\\Files_External\\Lib\\Auth\\OpenStack\\OpenStackV3' => $baseDir . '/../lib/Lib/Auth/OpenStack/OpenStackV3.php',
    'OCA\\Files_External\\Lib\\Auth\\OpenStack\\Rackspace' => $baseDir . '/../lib/Lib/Auth/OpenStack/Rackspace.php',
    'OCA\\Files_External\\Lib\\Auth\\Password\\GlobalAuth' => $baseDir . '/../lib/Lib/Auth/Password/GlobalAuth.php',
    'OCA\\Files_External\\Lib\\Auth\\Password\\LoginCredentials' => $baseDir . '/../lib/Lib/Auth/Password/LoginCredentials.php',
    'OCA\\Files_External\\Lib\\Auth\\Password\\Password' => $baseDir . '/../lib/Lib/Auth/Password/Password.php',
    'OCA\\Files_External\\Lib\\Auth\\Password\\SessionCredentials' => $baseDir . '/../lib/Lib/Auth/Password/SessionCredentials.php',
    'OCA\\Files_External\\Lib\\Auth\\Password\\UserGlobalAuth' => $baseDir . '/../lib/Lib/Auth/Password/UserGlobalAuth.php',
    'OCA\\Files_External\\Lib\\Auth\\Password\\UserProvided' => $baseDir . '/../lib/Lib/Auth/Password/UserProvided.php',
    'OCA\\Files_External\\Lib\\Auth\\PublicKey\\RSA' => $baseDir . '/../lib/Lib/Auth/PublicKey/RSA.php',
    'OCA\\Files_External\\Lib\\Auth\\PublicKey\\RSAPrivateKey' => $baseDir . '/../lib/Lib/Auth/PublicKey/RSAPrivateKey.php',
    'OCA\\Files_External\\Lib\\Auth\\SMB\\KerberosApacheAuth' => $baseDir . '/../lib/Lib/Auth/SMB/KerberosApacheAuth.php',
    'OCA\\Files_External\\Lib\\Auth\\SMB\\KerberosAuth' => $baseDir . '/../lib/Lib/Auth/SMB/KerberosAuth.php',
    'OCA\\Files_External\\Lib\\Backend\\AmazonS3' => $baseDir . '/../lib/Lib/Backend/AmazonS3.php',
    'OCA\\Files_External\\Lib\\Backend\\Backend' => $baseDir . '/../lib/Lib/Backend/Backend.php',
    'OCA\\Files_External\\Lib\\Backend\\DAV' => $baseDir . '/../lib/Lib/Backend/DAV.php',
    'OCA\\Files_External\\Lib\\Backend\\FTP' => $baseDir . '/../lib/Lib/Backend/FTP.php',
    'OCA\\Files_External\\Lib\\Backend\\InvalidBackend' => $baseDir . '/../lib/Lib/Backend/InvalidBackend.php',
    'OCA\\Files_External\\Lib\\Backend\\LegacyBackend' => $baseDir . '/../lib/Lib/Backend/LegacyBackend.php',
    'OCA\\Files_External\\Lib\\Backend\\Local' => $baseDir . '/../lib/Lib/Backend/Local.php',
    'OCA\\Files_External\\Lib\\Backend\\OwnCloud' => $baseDir . '/../lib/Lib/Backend/OwnCloud.php',
    'OCA\\Files_External\\Lib\\Backend\\SFTP' => $baseDir . '/../lib/Lib/Backend/SFTP.php',
    'OCA\\Files_External\\Lib\\Backend\\SFTP_Key' => $baseDir . '/../lib/Lib/Backend/SFTP_Key.php',
    'OCA\\Files_External\\Lib\\Backend\\SMB' => $baseDir . '/../lib/Lib/Backend/SMB.php',
    'OCA\\Files_External\\Lib\\Backend\\SMB_OC' => $baseDir . '/../lib/Lib/Backend/SMB_OC.php',
    'OCA\\Files_External\\Lib\\Backend\\Swift' => $baseDir . '/../lib/Lib/Backend/Swift.php',
    'OCA\\Files_External\\Lib\\Config\\IAuthMechanismProvider' => $baseDir . '/../lib/Lib/Config/IAuthMechanismProvider.php',
    'OCA\\Files_External\\Lib\\Config\\IBackendProvider' => $baseDir . '/../lib/Lib/Config/IBackendProvider.php',
    'OCA\\Files_External\\Lib\\DefinitionParameter' => $baseDir . '/../lib/Lib/DefinitionParameter.php',
    'OCA\\Files_External\\Lib\\DependencyTrait' => $baseDir . '/../lib/Lib/DependencyTrait.php',
    'OCA\\Files_External\\Lib\\FrontendDefinitionTrait' => $baseDir . '/../lib/Lib/FrontendDefinitionTrait.php',
    'OCA\\Files_External\\Lib\\IFrontendDefinition' => $baseDir . '/../lib/Lib/IFrontendDefinition.php',
    'OCA\\Files_External\\Lib\\IIdentifier' => $baseDir . '/../lib/Lib/IIdentifier.php',
    'OCA\\Files_External\\Lib\\IdentifierTrait' => $baseDir . '/../lib/Lib/IdentifierTrait.php',
    'OCA\\Files_External\\Lib\\InsufficientDataForMeaningfulAnswerException' => $baseDir . '/../lib/Lib/InsufficientDataForMeaningfulAnswerException.php',
    'OCA\\Files_External\\Lib\\LegacyDependencyCheckPolyfill' => $baseDir . '/../lib/Lib/LegacyDependencyCheckPolyfill.php',
    'OCA\\Files_External\\Lib\\MissingDependency' => $baseDir . '/../lib/Lib/MissingDependency.php',
    'OCA\\Files_External\\Lib\\Notify\\SMBNotifyHandler' => $baseDir . '/../lib/Lib/Notify/SMBNotifyHandler.php',
    'OCA\\Files_External\\Lib\\PersonalMount' => $baseDir . '/../lib/Lib/PersonalMount.php',
    'OCA\\Files_External\\Lib\\PriorityTrait' => $baseDir . '/../lib/Lib/PriorityTrait.php',
    'OCA\\Files_External\\Lib\\SessionStorageWrapper' => $baseDir . '/../lib/Lib/SessionStorageWrapper.php',
    'OCA\\Files_External\\Lib\\StorageConfig' => $baseDir . '/../lib/Lib/StorageConfig.php',
    'OCA\\Files_External\\Lib\\StorageModifierTrait' => $baseDir . '/../lib/Lib/StorageModifierTrait.php',
    'OCA\\Files_External\\Lib\\Storage\\AmazonS3' => $baseDir . '/../lib/Lib/Storage/AmazonS3.php',
    'OCA\\Files_External\\Lib\\Storage\\FTP' => $baseDir . '/../lib/Lib/Storage/FTP.php',
    'OCA\\Files_External\\Lib\\Storage\\FtpConnection' => $baseDir . '/../lib/Lib/Storage/FtpConnection.php',
    'OCA\\Files_External\\Lib\\Storage\\OwnCloud' => $baseDir . '/../lib/Lib/Storage/OwnCloud.php',
    'OCA\\Files_External\\Lib\\Storage\\SFTP' => $baseDir . '/../lib/Lib/Storage/SFTP.php',
    'OCA\\Files_External\\Lib\\Storage\\SFTPReadStream' => $baseDir . '/../lib/Lib/Storage/SFTPReadStream.php',
    'OCA\\Files_External\\Lib\\Storage\\SFTPWriteStream' => $baseDir . '/../lib/Lib/Storage/SFTPWriteStream.php',
    'OCA\\Files_External\\Lib\\Storage\\SMB' => $baseDir . '/../lib/Lib/Storage/SMB.php',
    'OCA\\Files_External\\Lib\\Storage\\StreamWrapper' => $baseDir . '/../lib/Lib/Storage/StreamWrapper.php',
    'OCA\\Files_External\\Lib\\Storage\\Swift' => $baseDir . '/../lib/Lib/Storage/Swift.php',
    'OCA\\Files_External\\Lib\\VisibilityTrait' => $baseDir . '/../lib/Lib/VisibilityTrait.php',
    'OCA\\Files_External\\Listener\\GroupDeletedListener' => $baseDir . '/../lib/Listener/GroupDeletedListener.php',
    'OCA\\Files_External\\Listener\\LoadAdditionalListener' => $baseDir . '/../lib/Listener/LoadAdditionalListener.php',
    'OCA\\Files_External\\Listener\\StorePasswordListener' => $baseDir . '/../lib/Listener/StorePasswordListener.php',
    'OCA\\Files_External\\Listener\\UserDeletedListener' => $baseDir . '/../lib/Listener/UserDeletedListener.php',
    'OCA\\Files_External\\Migration\\DummyUserSession' => $baseDir . '/../lib/Migration/DummyUserSession.php',
    'OCA\\Files_External\\Migration\\Version1011Date20200630192246' => $baseDir . '/../lib/Migration/Version1011Date20200630192246.php',
    'OCA\\Files_External\\Migration\\Version1015Date20211104103506' => $baseDir . '/../lib/Migration/Version1015Date20211104103506.php',
    'OCA\\Files_External\\Migration\\Version1016Date20220324154536' => $baseDir . '/../lib/Migration/Version1016Date20220324154536.php',
    'OCA\\Files_External\\Migration\\Version22000Date20210216084416' => $baseDir . '/../lib/Migration/Version22000Date20210216084416.php',
    'OCA\\Files_External\\MountConfig' => $baseDir . '/../lib/MountConfig.php',
    'OCA\\Files_External\\NotFoundException' => $baseDir . '/../lib/NotFoundException.php',
    'OCA\\Files_External\\ResponseDefinitions' => $baseDir . '/../lib/ResponseDefinitions.php',
    'OCA\\Files_External\\Service\\BackendService' => $baseDir . '/../lib/Service/BackendService.php',
    'OCA\\Files_External\\Service\\DBConfigService' => $baseDir . '/../lib/Service/DBConfigService.php',
    'OCA\\Files_External\\Service\\GlobalStoragesService' => $baseDir . '/../lib/Service/GlobalStoragesService.php',
    'OCA\\Files_External\\Service\\ImportLegacyStoragesService' => $baseDir . '/../lib/Service/ImportLegacyStoragesService.php',
    'OCA\\Files_External\\Service\\LegacyStoragesService' => $baseDir . '/../lib/Service/LegacyStoragesService.php',
    'OCA\\Files_External\\Service\\StoragesService' => $baseDir . '/../lib/Service/StoragesService.php',
    'OCA\\Files_External\\Service\\UserGlobalStoragesService' => $baseDir . '/../lib/Service/UserGlobalStoragesService.php',
    'OCA\\Files_External\\Service\\UserStoragesService' => $baseDir . '/../lib/Service/UserStoragesService.php',
    'OCA\\Files_External\\Service\\UserTrait' => $baseDir . '/../lib/Service/UserTrait.php',
    'OCA\\Files_External\\Settings\\Admin' => $baseDir . '/../lib/Settings/Admin.php',
    'OCA\\Files_External\\Settings\\Personal' => $baseDir . '/../lib/Settings/Personal.php',
    'OCA\\Files_External\\Settings\\PersonalSection' => $baseDir . '/../lib/Settings/PersonalSection.php',
    'OCA\\Files_External\\Settings\\Section' => $baseDir . '/../lib/Settings/Section.php',
);
