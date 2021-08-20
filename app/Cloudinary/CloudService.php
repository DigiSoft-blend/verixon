<?php 

namespace App\Cloudinary;

use Cloudinary\Cloudinary;
use Cloudinary\Uploader;
use Cloudinary\Transformation\Resize;
use App\EnvLoader\Env;

class CloudService{

    private $cloudinary;
    private $filePath;
    private $connected;
    private $secure_Url;
    private $public_id;

    public function prepare(){
     
      $cloud = include './config/cloud-services.php';

      $cloudName = $cloud['CLOUD_NAME']['cloud_name'];
      $apiKey = $cloud[$cloudName]['api_key'];
      $apiSecret = $cloud[$cloudName]['api_secret'];

      $this->cloudinary = new Cloudinary(
          [
             'cloud'=> [
                'cloud_name'=> $cloudName,
                'api_key'   => $apiKey,
                'api_secret'=> $apiSecret
             ]
          ]
        );
    }


    public function send($name, $target_file,  $options = [])
    {
      try{
       if(!file_exists($target_file)){
          copy($_FILES[$name]["tmp_name"], $target_file);
          $imgUrl = $this->cloudinary->uploadApi()->upload($target_file, $options);
          $this->secure_Url = $imgUrl['secure_url']; 
          $this->public_id = $imgUrl['public_id']; 
        }else{
          return 'file_exist';
        }
      }catch(\GuzzleHttp\Exception\ConnectException $e){
        return 'connection_error';
      }
    }

    public function getSecureUrl(){
      return $this->secure_Url;
    }

    public function getPublicID(){
      return $this->public_id;
    }

    public function deletFileWithID($file_name, $public_id, $options = []){
        if(!empty($public_id)){
          $status = $this->cloudinary->uploadApi()->destroy($public_id, $options);
          if($status['result'] == 'ok'){
            unlink(FILE_PATH.$file_name);
            echo 'file deleted from cloudinary';
            exit;
          }else{
            throw new CakeException(__d('cake_dev', $public_id.'is not found or already deleted.'));
          }
        }else{
          throw new CakeException(__d('cake_dev', 'Public id missing'));
        }
    }

     

   
}