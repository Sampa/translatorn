<?php
/**
 * Created by PhpStorm.
 * User: Happyjuiced
 * Date: 2017-05-22
 * Time: 16:26
 */

namespace app\models;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;
use yii\helpers\Inflector;
use yii\helpers\Url;
use yii\helpers\FileHelper;
use yii\helpers\StringHelper;

class Response extends yii\web\Response
{
    /**
     * Sends the response content to the client
     */
    protected function sendContent()
    {
        if ($this->stream === null) {
            echo $this->content;

            return;
        }

        set_time_limit(0); // Reset time limit for big files
        $chunkSize = 8 * 1024 * 1024; // 8MB per chunk

        if (is_array($this->stream)) {
            list ($handle, $begin, $end) = $this->stream;
            fseek($handle, $begin);
            while (!feof($handle) && ($pos = ftell($handle)) <= $end) {
                if ($pos + $chunkSize > $end) {
                    $chunkSize = $end - $pos + 1;
                }
                echo fread($handle, $chunkSize);
                flush(); // Free up memory. Otherwise large files will trigger PHP's memory limit.
            }
            fclose($handle);
        } else {
            while (!feof($this->stream)) {
                echo fread($this->stream, $chunkSize);
                flush();
            }
            fclose($this->stream);
        }
    }
}