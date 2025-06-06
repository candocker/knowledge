<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile as SymfonyUploadedFile;
use Swoolecan\Foundation\Helpers\CommonTool;

class DealResourceService extends AbstractService
{
    public function createFileHash($file, $isRemote = false)
    {
        if (empty($isRemote) && !file_exists($file)) {
            return '';
        }
        return hash_file('md5', $file);
    }

    public function dealLocalFiles($path)
    {
        $driver = \Storage::disk('local');
        $files = $driver->listContents($path, true);

        $i = 1;
        $command = '';
        $fHashs = [];
        $sql = "INSERT INTO `wp_resourceold` (`file_hash`, `basepath`, `name`, `filepath`) VALUES \n";
        foreach ($files as $file) {
            //echo $file['type'];
            //var_dump($file->isFile());
            //echo get_class($file);exit();
            if (!$file->isFile()) {
                continue;
            }
            $fPath = $file->path();
            $fullFile = $driver->path($fPath);
            $fileHash = $this->createFileHash($fullFile);
            $baseName = basename($fullFile);
            $sql .= "('{$fileHash}', '{$path}', '{$baseName}', '{$fullFile}'),\n";
        }
        echo $sql;
        echo $command;
        return true;
        //print_r($files);exit();
    }

    public function checkLocalFiles($path)
    {
        $driver = \Storage::disk('local');
        $files = $driver->files($path);
        $files = $driver->allFiles($path);
        $files = $driver->listContents($path, true);
        //print_r($files);exit();

        $i = 1;
        $command = '';
        $fHashs = [];
        foreach ($files as $file) {
            //echo $file['type'];
            //var_dump($file->isFile());
            //echo get_class($file);exit();
            if (!$file->isFile()) {
                continue;
            }
            $fPath = $file->path();
            $fullFile = $driver->path($fPath);
            $fileHash = $this->createFileHash($fullFile);
            $exist = $this->getModelObj('resourceDetail')->where(['file_hash' => $fileHash])->first();

            /*if (in_array($fileHash, array_keys($fHashs)) && $fPath != $fHashs[$fileHash]) {
                var_dump($fileHash . '--' . $fPath . '--' . $fHashs[$fileHash]);
                //echo "<br /><img src='http://39.106.102.45/resource/{$fPath}' width='200px' height='200px' /><img src='http://39.106.102.45/resource/{$fHashs[$fileHash]}' width='200px' height='200px' /><br />";
                //$command .= "rm -f {$fullFile};\n";
            }
            $fHashs[$fileHash] = $fPath;
            continue;*/

            if ($exist) {
                continue;
                if ($exist->filepath != $fPath) {
                    var_dump($fileHash . '--' . $fPath . '--' . $exist['filepath']);
                    $exist->filepath = $fPath;
                    //echo "<br /><img src='http://39.106.102.45/resource/{$fPath}' width='200px' height='200px' />"
                    //echo "<img src='http://39.106.102.45/resource/{$exist['filepath']}' width='200px' height='200px' /><br />";
                    //$command .= "rm -f {$fullFile};\n";
                }
                $exist->extfield1 = 'yes';
                $exist->save();
                continue;
            }

            //var_dump($fullFile);
            //echo "<br /><img src='http://39.106.102.45/resource/{$fPath}' width='200px' height='200px' /><br />";
            $baseData = [
                'last_modify' => date('Y-m-d H:i:s', $file->lastModified()),
                'filepath' => $fPath,
                'file_hash' => $fileHash,
            ];
            $baseName = basename($fullFile);
            //var_dump($fullFile);
            $fileObj = new SymfonyUploadedFile($fullFile, $baseName);
            $this->saveFile($baseData, $fullFile, $fileObj);
            //print_r($fileObj);exit();

            $i++;
        }
        echo $command;
        return true;
        //print_r($files);exit();
    }

    public function saveFile($baseData, $fullFile, $file)
    {
        $extension = $file->getClientOriginalExtension();
        $data = array_merge($baseData, [
            'size' => $file->getSize(),
            'name' => str_replace(".{$extension}", '', $file->getClientOriginalName()),
            'filename' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'extension' => $extension,
            'extfield1' => 'new',
        ]);
        $data = $this->fillImageAttrs($fullFile, $data);
        //print_r($data);exit();
        //return false;
        $this->getModelObj('resourceDetail')->create($data);
        return $data;
    }

    public function fillImageAttrs($fullFile, $data)
    {
        $eData = @ \exif_read_data($fullFile);
        if (empty($eData)) {
            return $data;
        }
        if (isset($eData['FileDateTime'])) {
            $data['last_at'] = date('Y-m-d H:i:s', $eData['FileDateTime']);
        }
        if (isset($eData['COMPUTED']) && isset($eData['COMPUTED']['Width'])) {
            $data['image_width'] = $eData['COMPUTED']['Width'];
        }
        if (isset($eData['COMPUTED']) && isset($eData['COMPUTED']['Height'])) {
            $data['image_length'] = $eData['COMPUTED']['Height'];
        }
        return $data;
    }

    public function getResourceUrl($app, $infoTable, $infoField, $infoId)
    {
        $info = $this->getResourceData($app, $infoTable, $infoField, $infoId);
        if (empty($info)) {
            return '';
        }
        return 'http://39.106.102.45/resource/' . $info->resourceDetailInfo->filepath;
    }

    public function getResourceData($app, $infoTable, $infoField, $infoId, $onlyOne = true)
    {
        $where = [
            'app' => $app,
            'info_table' => $infoTable,
            'info_field' => $infoField,
            'info_id' => $infoId
        ];
        $query = $this->getModelObj('resourceInfo')->where($where);
        if ($onlyOne) {
            return $query->first();
        }
        return $query->get();
    }
}
