<?php


use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class AWSBucketS3{
public $_S3Bucket;
public $_result;
public function __construct()
  {
    $this->connect();
  }

  private function connect(){
    $this->_S3Bucket= S3Client::factory(array(
        'credentials' => array(
            'key' => _ACCESS_KEY_,
            'secret' => _SECRET_ACCESS_KEY_,
        ), 'region' => _REGION_,
        'version' => 'latest'
    ));
  }

  public function uploadImgtoAWS($fileName){
    $this->_result = $this->_S3Bucket->putObject([
        'Bucket' => _BUCKET_NAME_,
        'Key'    => $fileName,
        'SourceFile' => $_FILES['fileToUpload']['tmp_name'],
        'ACL' => 'public-read'		
    ]);
    return $this->_result;
  }
}