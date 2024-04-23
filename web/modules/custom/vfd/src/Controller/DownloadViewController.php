<?php

namespace Drupal\vfd\Controller;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\File\FileSystem;
use Drupal\Core\File\FileSystemInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * The controller class to respond to file download link.
 */
class DownloadViewController extends ControllerBase {

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The file_system service.
   *
   * @var \Drupal\Core\File\FileSystem
   */
  protected $fileSystem;

  /**
   * Constructs a NotFound object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The configuration factory.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity manager.
   * @param \Drupal\Core\File\FileSystem $file_system
   *   The file system manager.
   */
  public function __construct(ConfigFactoryInterface $config_factory, EntityTypeManagerInterface $entity_type_manager, FileSystem $file_system) {
    $this->configFactory = $config_factory;
    $this->entityTypeManager = $entity_type_manager;
    $this->fileSystem = $file_system;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('entity_type.manager'),
      $container->get('file_system')
    );
  }

  /**
   * Callback function for the file download controller.
   */
  public function download($path) {
    $field_machine_name = '';
    $field_type = '';
    $views_list = $this->configFactory->get('vfd.settings')->get('vfd_table');

    foreach ($views_list as $view) {
      if ($path == $view['view']) {
        $field_machine_name = $view['field'];
        $field_type = $view['field_type'];
        break;
      }
    }

    if ($field_machine_name == '' && $field_type == '') {
      return [
        '#markup' => $this->t('No downloadable files associated with this listing.'),
      ];
    }

    $dir = $this->fileSystem->getTempDirectory() . '/Downloads';
    mkdir($dir);

    if ($field_type == 'media') {
      foreach ((views_get_view_result($path)) as $value) {
// Load the media entity using the entity type manager.
$media = $this->entityTypeManager->getStorage('media')->load($value->nid);

if ($media) {
    // Check the type of media and access the appropriate field.
    switch ($media->bundle()) {
        case 'image':
            // For image media, get the file URI from the image field.
            $file_uri = $media->field_media_image->entity->getFileUri();
            break;
        case 'audio':
            // For audio media, get the file URI from the audio field.
            $file_uri = $media->field_media_audio_file->entity->getFileUri();
         
            break;
        case 'video':
            // For video media, get the file URI from the video field.
            $file_uri = $media->field_media_video_file->entity->getFileUri();
            break;
        default:
            // Handle other types of media if needed.
            $file_uri = '';
            break;
    }
} else {
    // Handle case where media entity is not loaded.
    $file_uri = '';
}
        $this->fileSystem->copy($file_uri, $this->fileSystem->realpath($dir), FileSystemInterface::EXISTS_REPLACE);
      }
    }
   
    $this->createZip($this->fileSystem->realpath($dir));
    $zip->close();
    
  }

  /**
   * Generates the required zip file.
   */
  private function createZip($dir) {
    
    if (is_dir($dir)) {
   if ($dh = opendir($dir)) {

    // Set the name of the downloaded zip file with current date
   
    $zip_file = "favorites.zip";
    

    // Create a new zip archive
    $zip = new \ZipArchive();
    $fileSystem = \Drupal::service('file_system');

    // Open the zip archive
    if ($zip->open($zip_file, \ZipArchive::CREATE) !== TRUE) {
      die("Could not open archive");
    }

    // Loop through each file path and add the file to the zip archive
    while (($file = readdir($dh)) !== FALSE) {
      $file = $dir . '/' . $file;
     
      // Get the file name from the file path
      $file_name = str_replace('-', '', basename($file));

      $tempDirectory = $fileSystem->realpath($fileSystem->getTempDirectory()). "Downloads.zip";

      // Check if the file path is a URL
      if (filter_var($file, FILTER_VALIDATE_URL)) {
        // If it's a URL, download the file and get the local file path
        $temp_file = file_get_contents($file);

        $local_file_path = $tempDirectory . '/' . $file_name;
        file_put_contents($local_file_path, $temp_file);
      } else {
        // If it's a local file path, use it directly
        $local_file_path = $file;
        
      }
      // Check if the file exists
      if (!file_exists($local_file_path)) {
        die("File does not exist at $local_file_path");
      }
      // Check if the file is readable
      if (!is_readable($local_file_path)) {
        die("File is not readable at $local_file_path");
      }
      // Add the file to the zip archive
      $zip->addFromString($file_name, file_get_contents($local_file_path));
      // If the file path was a URL, delete the temporary file
      if (isset($temp_file)) {
        unlink($local_file_path);
      }
    }
    
    
   
      // Close the zip archive
       $zip->close();
      
      // Set the content type for the download
      header('Content-Type: application/zip');

      // Set the content disposition header for the download
      header("Content-Disposition: attachment; filename=$zip_file");
      // Read the zip file and send it to the browser for download
      readfile($zip_file);
      
      // Delete the zip file from the server
       unlink($zip_file);
       $command = "rm -rf /var/www/html/web/sites/default/files/temp/Downloads";
       $output = shell_exec($command . ' 2>&1');
    
  }
}

}


 }