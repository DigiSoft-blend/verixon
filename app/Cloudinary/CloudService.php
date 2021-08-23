<?php 

namespace App\Cloudinary;

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
 */

use Cloudinary\Cloudinary;
use Cloudinary\Uploader;
use Cloudinary\Transformation\Resize;
use App\EnvLoader\Env;


/**
 * Class CloudService
 *
 * @internal @verixon
 */
class CloudService{

    /**
     * @var object Cloudinary $cloudinary instance.
     */

    private $cloudinary;

     /**
     * @var string $filepath
     */
    private $filePath;

     /**
     * @var string $secure_url
     */
    private $secure_Url;

     /**
     * @var string $public_id
     */
    private $public_id;


    /**
     * prepares cloudinary connection with config params
     * 
     * @return Cloudinary instance
     *
     * @see http://Digisoft-blend/verixon/
     */

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

    /**
     * uploads files to cloudinary cloudinary 
     * 
     * @param $options
     * @param $target_file
     * @param array $options
     * 
     * @return mixed
     *
     * @throws \GuzzleHttp\Exception\ConnectException
     *
     */


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

     /**
     * gets file Secure url from cloudinary
     * 
     * @return $secure_Url
     *
     */

    public function getSecureUrl(){
      return $this->secure_Url;
    }

    /**
     * gets file public id from cloudinary
     * 
     * @return $public_id
     *
     */

    public function getPublicID(){
      return $this->public_id;
    }

    /**
     * deletes uploaded file from cloudinary
     * 
     * @param $file_name
     * @param $public_id
     * @param array $options
     * 
     * @return mixed
     *
     * @throws  CakeException
     *
     */

    public function deletFileWithID($file_name, $public_id, $options = []){
        if(!empty($public_id)){
          $status = $this->cloudinary->uploadApi()->destroy($public_id, $options);
          if($status['result'] == 'ok'){
            unlink(FILE_PATH.$file_name);
            echo 'file deleted from cloudinary';
          }else{
            throw new CakeException(__d('cake_dev', $public_id.'is not found or already deleted.'));
          }
        }else{
          throw new CakeException(__d('cake_dev', 'Public id missing'));
        }
    } 
}