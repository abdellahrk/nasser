<?php 

namespace App\Service;

use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class FileUploader 
{ 
    public function __construct(private $destinationPath, private SluggerInterface $slugger) {} 

    public function upload(UploadedFile $file, string $userName) 
    { 
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $filename = $safeFilename.'-'.$file->guessExtension();

        try { 
            $file->move($this->getTargetDirectory() . '/' . $userName , $filename);
        } catch(FileException $e) { 

        }

        return $filename;
    }

    public function getTargetDirectory()
    { 
        return $this->destinationPath;
    }
}